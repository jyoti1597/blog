<?php
    include 'db_connections.php';

    
    // login process

    $userEmail = $_POST['useremail'];
    $password = $_POST['password'];

    $checkLoginQuery = "SELECT * FROM user_table WHERE email = $userEmail AND password = $password";
    $checkLoginResult = mysqli_query($conn, $checkLoginQuery);

    if(mysqli_num_rows($result)>0){

        echo"login successfully";


    }
    else{

        echo"Invaild login user";
    }
    mysqli_close($conn);

?>