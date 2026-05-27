<?php

    header('Content-Type: application/json');

    include 'db_connections.php';

    $result = array();

    if(isset($_POST['category_name'])){
        $categoryName = mysqli_real_escape_string($conn,$_POST['category_name']);

        $insertQuery = "INSERT INTO category_table (category_name) VALUES('$categoryName')";
        $insertResult = mysqli_query($conn, $insertQuery);

        if ($insertResult) {
            $response['status'] = 'success';
            $response['message'] = 'Added Successfully';
        }
        else{
            $response['status'] = 'error';
            $response['message'] = 'Something went wrong !!';
        }
    }

    echo json_encode($response);

?>