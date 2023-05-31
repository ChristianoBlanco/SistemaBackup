<?php
function backupDatabaseAllTables($dbhost, $dbusername, $dbpassword, $dbname, $db_id_bkp, $tables = '*')
{
    $db = new mysqli($dbhost, $dbusername, $dbpassword, $dbname);

    if ($tables == '*') {
        $tables = array();
        $result = $db->query("SHOW TABLES");
        while ($row = $result->fetch_row()) {
            $tables[] = $row[0];
        }
    } else {
        $tables = is_array($tables) ? $tables : explode(',', $tables);
    }

    $return = '';

    foreach ($tables as $table) {
        $result = $db->query("SELECT * FROM $table");
        $numColumns = $result->field_count;

        $result2 = $db->query("SHOW CREATE TABLE $table");
        $row2 = $result2->fetch_row();

        $return .= "\n\n" . $row2[1] . ";\n\n";

        for ($i = 0; $i < $numColumns; $i++) {
            while ($row = $result->fetch_row()) {
                $return .= "INSERT INTO $table VALUES(";
                for ($j = 0; $j < $numColumns; $j++) {
                    $row[$j] = addslashes($row[$j]);
                    $row[$j] = $row[$j];
                    if (isset($row[$j])) {
                        $return .= '"' . $row[$j] . '"';
                    } else {
                        $return .= '""';
                    }
                    if ($j < ($numColumns - 1)) {
                        $return .= ',';
                    }
                }
                $return .= ");\n";
            }
        }

        $return .= "\n\n\n";
    }
    $data = date('d_m_Y_');
    $hora = date('H') . 'h';
    $min = date('i') . 'm';
    $seg = date('s') . 's';
    $bd_name = $dbname;
    $ano = date('Y');
    //$ano = '2024';

    //QUERY PARA SELECIONAR O BD CADASTRADO: tabela bancos
    $result = $db->query("SELECT B.id, B.hostname, B.dbname, B.descricao, C.id AS id_backup , C.banco_id, C.status_bkp FROM bancos B WHERE id_backup = $db_id_bkp");
    $row = $result->fetch_assoc();
    $id_banco = $row['id'];

   
    //CRIA A PASTA RAIZ PARA ARMAZENAR OS BACKUPS
    if (!is_dir('../public/BACKUP_BD/'.$bd_name . $db_id_bkp . '/' . $ano)) {

        mkdir('../public/BACKUP_BD/'.$bd_name . $db_id_bkp . '/' . $ano, 777, true);
    }

    //
    $handle = fopen('../public/BACKUP_BD/' . $bd_name . $db_id_bkp .'/' . $ano . '/' . $bd_name . $data . $hora . $min . $seg . '.sql', 'w+');
    fwrite($handle, $return);
    fclose($handle);
    echo "Database Export Successfully!";
}
