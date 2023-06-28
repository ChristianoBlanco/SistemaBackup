<?php

function backupDatabaseAllTables($dbhost, $dbusername, $dbpassword, $dbname, $db_id_bkp, $tables = '*')
{
    date_default_timezone_set('America/Sao_Paulo');

    $db = new mysqli($dbhost, $dbusername, $dbpassword, $dbname);
    
    /*if (!$db) {
        die('Could not connect: ' . $db->errno);
    } */

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
    $return .= 'SET FOREIGN_KEY_CHECKS=0;'."\n";


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

    //CRIA A PASTA RAIZ PARA ARMAZENAR OS BACKUPS
    if (!is_dir('./BACKUP_BD/' . $db_id_bkp . '#' . $bd_name . '/' . $ano)) {

        mkdir('./BACKUP_BD/' . $db_id_bkp . '#' . $bd_name . '/' . $ano, 777, true);
    }

    //
    $handle = fopen('./BACKUP_BD/' . $db_id_bkp . '#' . $bd_name . '/' . $ano . '/' . $bd_name . $data . $hora . $min . $seg . '.sql', 'w+');
    fwrite($handle, $return);
    fclose($handle);
    //echo "Database Export Successfully!";
}
backupDatabaseAllTables('localhost', 'root', '', 'accountsdb', '1101');

?>

  