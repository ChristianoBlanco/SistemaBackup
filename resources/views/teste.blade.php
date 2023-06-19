<?php

/* 
// Server information
$server   = "127.0.0.1\sqlexpress,1434";
$database = "MeuTeste";
$uid      = ""; 
$pwd      = "";

// Connection
try {
    $conn = new PDO("sqlsrv:server=$server;Database=$database", $uid, $pwd);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch( PDOException $e ) {
    die( "Error connecting to SQL Server".$e->getMessage());
}

$sql = "SELECT * FROM Tabela2";
$stmt = $conn->prepare($sql);
$stmt->execute();
$user = $stmt->fetch();

echo $user['id'].'<br>';
echo $user['teste'];
*/

require_once './myfunctions/classBackupSQLSRV.php';


?>

  