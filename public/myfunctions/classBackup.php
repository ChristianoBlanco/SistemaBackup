<?php
function backupDatabaseAllTables($dbhost, $dbusername, $dbpassword, $dbname, $db_id_bkp, $tables = '*')
{
    date_default_timezone_set('America/Sao_Paulo');

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
/// FIM DA FUNCTION GRAVAR MySQL /////





function backupDatabaseTablesServer($dbserver, $dbdatabase, $dbuid, $dbpwd, $db_id_bkp)
{

    $server = $dbserver;
    $database = $dbdatabase;
    $uid = $dbuid;
    $pwd = $dbpwd;

// Connection
    try {
        $conn = new PDO("sqlsrv:server=$server;Database=$database", $uid, $pwd);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Error connecting to SQL Server" . $e->getMessage());
    }

    $data = date('Y_m_d');
    $hora = date('H') . 'h';
    $min = date('i') . 'm';
    $seg = date('s') . 's';
    $bd_name = $database;
    $ano = date('Y');

    //CRIA A PASTA RAIZ PARA ARMAZENAR OS BACKUPS
    if (!is_dir('c:/backupsSQLSV/' . $db_id_bkp . '_' . $bd_name)) {

        mkdir('c:/backupsSQLSV/' . $db_id_bkp . '_' . $bd_name, 777, true);
    }

    $sql = "
DECLARE @date VARCHAR(19)
SET @date = CONVERT(VARCHAR(19), GETDATE(), 126)
SET @date = REPLACE(@date, ':', '-')
SET @date = REPLACE(@date, 'T', '-')
DECLARE @campo1 VARCHAR(15)
DECLARE @campo2 VARCHAR(15)
SET @campo1 = '" . $db_id_bkp . "_" . "'
SET @campo2 = '" . $bd_name . "'
DECLARE @fileName VARCHAR(100)
SET @fileName = ('c:\backupsSQLSV\'+ @campo1 + @campo2 + '\BackUp_' + @campo2 + '_' + @date + '.bak')

BACKUP DATABASE MeuTeste
TO DISK = @fileName
WITH
    FORMAT,
    STATS = 1,
    MEDIANAME = 'SQLServerBackups',
    NAME = 'Full Backup of MeuTeste';
";

    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    } catch (PDOException $e) {
        die("Error executing query. " . $e->getMessage());
    }

// Clear buffer
    try {
        while ($stmt->nextRowset() != null) {}
        ;
        //echo "Success";
    } catch (PDOException $e) {
        die("Error executing query. " . $e->getMessage());
    }

// End
    $stmt = null;
    $conn = null;

}
//// FIM DA GRAVAÇÃO SQL SERVER ///////


//Função que chama as duas funções para gravações Mysql e SQL SERVER
function rodaGravacao()
{
    date_default_timezone_set('America/Sao_Paulo');

    $mysqli = new mysqli("localhost", "root", "", "sisbackup2");

    if ($mysqli->connect_error) {
        echo "Failed to connect to MySQL: " . $mysqli->connect_error;
        exit();
    }

    $result = $mysqli->query("SELECT B.* , C.id AS id_backup, C.banco_id, C.tipo_bd_id, C.status_bkp, C.status_temp
                              FROM bancos B
                              INNER JOIN backups C ON B.id = C.banco_id
                              WHERE C.status_bkp = '1' ");

    $min = date('i');

    while ($row = $result->fetch_assoc()) {

        if ($row['status_bkp'] == 1 && $row['status_temp'] == "") {

            $id_banco = $row['id'];
            $mysqli->query("UPDATE backups C SET C.status_temp = $min WHERE C.banco_id = $id_banco AND C.status_temp = '' ");

        }

        $temp = intval($row['status_temp']);
        $dif = abs($min - $temp);

        if ($row['status_bkp'] == 1 && $row['tipo_bd_id'] == 1 && $dif >= 10) {

            $id_banco = $row['id'];
            backupDatabaseAllTables($row['hostname'], $row['username'], $row['password'], $row['dbname'], $row['id_backup']);
            $mysqli->query("UPDATE backups C SET C.status_temp = $min WHERE C.banco_id = $id_banco AND c.status_temp >= $dif");
        }

        if($row['status_bkp'] == 1 && $row['tipo_bd_id'] == 2 && $dif >= 10){

            $id_banco = $row['id'];
            backupDatabaseTablesServer($row['hostname'], $row['dbname'], $row['username'], $row['password'], $row['id_backup']);
            $mysqli->query("UPDATE backups C SET C.status_temp = $min WHERE C.banco_id = $id_banco  AND c.status_temp >= $dif");
        }

    }
    // echo "<script>setInterval(function() { $('#setTimePainel').load('/painel'); }, 120000);</script>";
}
rodaGravacao();
