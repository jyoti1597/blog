<?php

header('Content-Type: application/json');

include 'db_connections.php';

$result = array();

if (isset($_POST['email']) && isset($_POST['password'])) {

    $userEmail =  filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_STRING);
    $password = filter_var(trim( $_POST['password'] ?? ''), FILTER_SANITIZE_STRING);;

    $hashpassword = md5($password);
    
    //echo $hashpassword;

    $checkLoginQuery = "SELECT * FROM user_table  WHERE email = '$userEmail' AND password = '$hashpassword'";

    $checkLoginResult = mysqli_query($conn, $checkLoginQuery);

    if (mysqli_num_rows($checkLoginResult) > 0) {

        $response['status'] = 'success';
        $response['message'] = 'Login successfully';

        $fetch_data = mysqli_fetch_assoc($checkLoginResult);
        session_start();
        $_SESSION['username'] = $fetch_data['name'];
        $_SESSION['userId'] = $fetch_data['id'];
    
    
    } else {

        $response['status'] = 'error';
        $response['message'] = 'Invalid username or password';
    }

} else {

    $response['status'] = 'error';
    $response['message'] = 'Email and password required';
}

echo json_encode($response);

?>