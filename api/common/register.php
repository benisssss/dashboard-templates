<?php
include '../common/db_connection.php';
include '../common/system_consts.php';
include '../common/php_functions.php';
header('Content-type: application/json');

// Expected POST values
$post_expected = [
    "user_code"     => null,
    "username"      => null,
    "fullname"      => null,
    "email"         => null,
    "department"    => null,
    "password"      => null,
    "process_owner" => 0,  // Optional field
    "activated"     => 0      // Default as not active
];

// Sanitize input
foreach ($_POST as $key => $value) {
    $post_expected[$key] = sanitize_input($value);
}

$post_expected['email'] = $post_expected['email'] . '@furukawaelectric.com';
$post_expected['user_code'] = gen_code('user_');
// Call stored procedure
$stmt = $conn->prepare('EXEC m_register_account 
    :user_code,
    :username, 
    :fullname, 
    :email, 
    :department, 
    :password, 
    :process_owner, 
    :activated
');

//var_dump($post_expected);
$stmt->execute($post_expected);

$response = [
    "status" => false,
    "message" => null
];

// If insertion was successful, return success
if ($stmt->fetch(PDO::FETCH_ASSOC)) {
    $response['status'] = true;
    $response['message'] = "Registration successful!";
    
    include '../common/db_connection_mailer.php';
    include '../../email/registration/register.php';
    if (send_activation_email(
        $post_expected['user_code'],
        $post_expected['username'],
        $post_expected['fullname'],
        $post_expected['department'],
        $post_expected['email'])
    ) {
    } else {
        $response['status'] = false;
        $response['message'] = "Failed to register.";
    }
} else {
    $response['status'] = false;
    $response['message'] = "Failed to register.";
}
echo json_encode($response);
exit();
