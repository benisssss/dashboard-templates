<?php
    //database
    date_default_timezone_set('Asia/Manila');
    $servername = '172.25.116.188';
    $username = 'sa'; 
    $password = 'SystemGroup@2022';
    $database = 'falp_email';
    try {
        $conn_mailer  = new PDO ("sqlsrv:Server=$servername;Database=$database",$username,$password);
        $conn_mailer -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo 'NO CONNECTION'.$e->getMessage();
    }
    //end database