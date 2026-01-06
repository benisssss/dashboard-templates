<?php
    include '../common/sessions.php';
    include '../common/system_consts.php';
    $_SESSION['user'] = null;

    $notification = [
        "icon" => "info",
        "text" => "Logged Out",
    ];

    $_SESSION['notification'] = json_encode($notification);
    header("location: {$system}/pages/signin");
    exit();