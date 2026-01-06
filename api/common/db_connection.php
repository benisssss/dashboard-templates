<?php
// MS SQL Server Connection

$servername = '172.25.116.188';
$username = 'SA';
$password = 'SystemGroup@2022';
$database = 'live_qms_dashboard';


try {
    $conn = new PDO ("sqlsrv:Server=$servername;Database=$database",$username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'NO CONNECTION'.$e->getMessage();
}

//end database