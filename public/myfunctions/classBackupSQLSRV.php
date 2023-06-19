<?php 
// Server information

function backupDatabaseAllTables($dbserver, $dbdatabase, $dbuid, $dbpwd){

    $server = $dbserver;
    $database = $dbdatabase;
    $uid = $dbuid;
    $pwd = $dbpwd;

// Connection
try {
    $conn = new PDO("sqlsrv:server=$server;Database=$database", $uid, $pwd);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch( PDOException $e ) {
    die( "Error connecting to SQL Server".$e->getMessage());
}

$sql = "
declare 
@path varchar(100),
@fileDate varchar(20),
@fileName varchar(140)

SET @path = 'c:\backupsSQLSV\'   
SELECT @fileDate = CONVERT(VARCHAR(20), GETDATE(), 112)  
SET @fileName = @path + 'ProdDB_' + @fileDate + '.bak' 
BACKUP DATABASE MeuTeste TO DISK = @fileName
";

try {
    $stmt = $conn->prepare($sql);
    $stmt->execute();
} catch (PDOException $e) {
    die ("Error executing query. ".$e->getMessage());
}



}
backupDatabaseAllTables("127.0.0.1\sqlexpress,1434","MeuTeste","sa","123456");
?>