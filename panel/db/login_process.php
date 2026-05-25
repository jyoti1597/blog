<?php
 include 'db_connections.php';
 header('Content-Type: application/json');


$result = array();

if (isset($_POST['email']) && isset($_POST['password'])) {

    $userEmail = $_POST['email'];
    $password = $_POST['password'];

    $hashpassword= password_hash($password, PASSWORD_BCRYPT);

    $checkLoginQuery = "SELECT * FROM user_table 
                        WHERE email = '$userEmail' 
                        AND password = '$hashpassword'";

    $checkLoginResult = mysqli_query($conn, $checkLoginQuery);

    if (mysqli_num_rows($checkLoginResult) > 0) {

        $fetch_data = mysqli_fetch_assoc($checkLoginResult);
        session_start();

        $_SESSION['username'] = $fetch_data['name'];

        $result['status'] = 'success';
        $result['message'] = 'Login successfully';

    } else {

        $result['status'] = 'error';
        $result['message'] = 'Invalid username or password';
    }

} else {

    $result['status'] = 'error';
    $result['message'] = 'Email and password required';
}

echo json_encode($result);
exit;

?>