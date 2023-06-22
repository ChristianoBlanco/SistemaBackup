<?php
// Server information

function backupDatabaseAllTables($dbserver, $dbdatabase, $dbuid, $dbpwd)
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
//$ano = '2024';

//CRIA A PASTA RAIZ PARA ARMAZENAR OS BACKUPS
  
     
    $sql = "
DECLARE @date VARCHAR(19)
SET @date = CONVERT(VARCHAR(19), GETDATE(), 126)
SET @date = REPLACE(@date, ':', '-')
SET @date = REPLACE(@date, 'T', '-')

DECLARE @fileName VARCHAR(100)
SET @fileName = ('c:\backupsSQLSV\BackUp_' + @date + '.bak')

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
        echo "Success";
    } catch (PDOException $e) {
        die("Error executing query. " . $e->getMessage());
    }

// End
    $stmt = null;
    $conn = null;

}
backupDatabaseAllTables("127.0.0.1\sqlexpress,1433", "MeuTeste", "root", "123456");
