<?php

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


?>


  