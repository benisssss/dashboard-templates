<?php
    include '../common/db_connection.php';
    include '../common/sessions.php ';
    include '../common/php_functions.php';
    header('Content-type: application/json');

    //
    $post_expected = [
        "username" => null,
        "password" => null
    ];
    foreach ($_POST as $key => $value) {
        $post_expected[$key] = sanitize_input($value);
    }

    $stmt = $conn -> prepare('EXEC m_accounts_login :username, :password');
    $stmt -> execute($post_expected);
    $response = [
        "status" => false,
        "registered" => null,
    ];
    if ($data = $stmt -> fetch(PDO::FETCH_ASSOC)) {
        $response['status'] = true;
        if ($data['registered'] == '1') {
            $_SESSION['user'] = $data;
            $response['registered'] = true;
        } else {
            $_SESSION['user'] = null;
            $response['registered'] = false;
        }
    } else {
        //login failed
        $_SESSION['user'] = null;
    }

    echo json_encode($response);
    exit();