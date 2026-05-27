<?php

    header('Content-Type: application/json');

    include 'db_connections.php';

    $result = array();

    // category page
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

    // user page
    if(isset($_POST['username'])){
        $userName = mysqli_real_escape_string($conn,$_POST['username']);
        $email = mysqli_real_escape_string($conn,$_POST['email']);
        $password = mysqli_real_escape_string($conn,$_POST['password']);
        $genre = 'user';
        // Check image selected
        if(isset($_FILES['image']) && $_FILES['image']['error'] == 0){

            $imageName = $_FILES['image']['name'];
            $tmpName   = $_FILES['image']['tmp_name'];
            $fileSize  = $_FILES['image']['size'];

            // 5MB
            $maxSize = 5 * 1024 * 1024;

            // Extension
            $extension = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));

            // Allowed types
            $allowed = ['jpg', 'jpeg', 'png'];

            // Check extension
            if(!in_array($extension, $allowed)){

                $response['status'] = 'error';
                $response['message'] = 'Only JPG, JPEG and PNG allowed';

            }
            // Check size
            elseif($fileSize > $maxSize){

                $response['status'] = 'error';
                $response['message'] = 'Image size must be less than 5 MB';

            }
            else{

                // New image name
                $newName = time() . "_" . $imageName;

                // Upload image
                move_uploaded_file($tmpName, "../assets/images/user/" . $newName);

                // Insert query
                $insertQuery = "INSERT INTO user_table(name,email,password,image,genre) VALUES('$userName','$email','$password','$newName','$genre')";

                $insertResult = mysqli_query($conn, $insertQuery);

                if($insertResult){

                    $response['status'] = 'success';
                    $response['message'] = 'Added Successfully';

                }else{

                    $response['status'] = 'error';
                    $response['message'] = 'Database Error';
                }
            }

        }else{

            $response['status'] = 'error';
            $response['message'] = 'Please Select Image';
        }

    }else{

        $response['status'] = 'error';
        $response['message'] = 'Invalid Request';
    }

    // blog page
    if(isset($_POST[''])){
        $userName = mysqli_real_escape_string($conn,$_POST['username']);
        $email = mysqli_real_escape_string($conn,$_POST['email']);
        $password = mysqli_real_escape_string($conn,$_POST['password']);
        $genre = 'user';
        // Check image selected
        if(isset($_FILES['image']) && $_FILES['image']['error'] == 0){

            $imageName = $_FILES['image']['name'];
            $tmpName   = $_FILES['image']['tmp_name'];
            $fileSize  = $_FILES['image']['size'];

            // 5MB
            $maxSize = 5 * 1024 * 1024;

            // Extension
            $extension = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));

            // Allowed types
            $allowed = ['jpg', 'jpeg', 'png'];

            // Check extension
            if(!in_array($extension, $allowed)){

                $response['status'] = 'error';
                $response['message'] = 'Only JPG, JPEG and PNG allowed';

            }
            // Check size
            elseif($fileSize > $maxSize){

                $response['status'] = 'error';
                $response['message'] = 'Image size must be less than 5 MB';

            }
            else{

                // New image name
                $newName = time() . "_" . $imageName;

                // Upload image
                move_uploaded_file($tmpName, "../assets/images/blog/" . $newName);

                // Insert query
                $insertQuery = "INSERT INTO user_table(name,email,password,image,genre) VALUES('$userName','$email','$password','$newName','$genre')";

                $insertResult = mysqli_query($conn, $insertQuery);

                if($insertResult){

                    $response['status'] = 'success';
                    $response['message'] = 'Added Successfully';

                }else{

                    $response['status'] = 'error';
                    $response['message'] = 'Database Error';
                }
            }

        }else{

            $response['status'] = 'error';
            $response['message'] = 'Please Select Image';
        }

    }else{

        $response['status'] = 'error';
        $response['message'] = 'Invalid Request';
    }
    
    
    echo json_encode($response);

?>