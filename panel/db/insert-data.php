<?php

    header('Content-Type: application/json');

    include 'db_connections.php';
   

    $result = array();

    //delete for all table

    if(isset($_POST['type']) && $_POST['type'] == 'delete'){
        $table_name = mysqli_real_escape_string($conn,$_POST['table_name']);
        $id = mysqli_real_escape_string($conn,$_POST['id']);

        $deleteQuery = "UPDATE $table_name SET status = '1' WHERE id = '$id'";
        $deleteResult = mysqli_query($conn, $deleteQuery);

        if($deleteResult){
            $response['status'] = 'success';
            $response['message'] = 'Deleted Successfully';
            $response['id'] = $id;
        }
        else{
            $response['status'] = 'error';
            $response['message'] = 'Something went wrong !!';
            $response['id'] = $id;
        }
    }

    //delete blog post image
    if(isset($_POST['type']) && $_POST['type'] == 'delete-image'){
        $id = mysqli_real_escape_string($conn,$_POST['id']);
        $table_name = mysqli_real_escape_string($conn,$_POST['table_name']);

        $deleteQuery = "UPDATE $table_name SET image = '' WHERE id = '$id'";
        $deleteResult = mysqli_query($conn, $deleteQuery);

        if($deleteResult){
            $response['status'] = 'success';
            $response['message'] = 'Image Deleted Successfully';
        }
        else{
            $response['status'] = 'error';
            $response['message'] = 'Something went wrong !!';
        }
    }

    //approve or not approve blog
    if(isset($_POST['form_name']) && $_POST['form_name'] == 'post-approval'){
        $post_status = mysqli_real_escape_string($conn,$_POST['post_status']);
        $id = mysqli_real_escape_string($conn,$_POST['id']);
        

        if($post_status == 'approve'){

            $status = 1;
            $textMessage = 'Blog post approved successfully';

        }
        else{

            $status = 0;
            $textMessage = 'Blog post unapproved successfully';

        }

        $approvelQuery = "UPDATE blog_table SET post_status = '$status' WHERE id = '$id'";
        $approvelResult = mysqli_query($conn, $approvelQuery);

       

        if($approvelResult){
            $response['status'] = 'success';
            $response['message'] = $textMessage;
        }
        else{
            $response['status'] = 'error';
            $response['message'] = 'Something went wrong !!';
        }
    }


    //add category page
    if(isset($_POST['form_name']) && $_POST['form_name'] == 'add-category'){
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

    //edit category page
    if(isset($_POST['form_name']) && $_POST['form_name'] == 'edit-category'){
        $categoryName = mysqli_real_escape_string($conn,$_POST['category_name']);
        $id = mysqli_real_escape_string($conn,$_POST['id']);

        $insertQuery = "UPDATE category_table SET category_name = '$categoryName' WHERE id = '$id'";
        $insertResult = mysqli_query($conn, $insertQuery);

        if ($insertResult) {
            $response['status'] = 'success';
            $response['message'] = 'Updated Successfully';
        }
        else{
            $response['status'] = 'error';
            $response['message'] = 'Something went wrong !!';
        }
    }

    // user page
    if(isset($_POST['form_name']) && $_POST['form_name'] == 'add-user'){
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

    }

    // blog page
    if(isset($_POST['form_name']) && $_POST['form_name'] == 'blog-post'){

        $categoryId = mysqli_real_escape_string($conn, $_POST['categoryId']);
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        // $status = mysqli_real_escape_string($conn, $_POST['status']);
        $description = mysqli_real_escape_string($conn, $_POST['description']);
        $userId = mysqli_real_escape_string($conn, $_POST['userId']);

        // File data
        $imageName = $_FILES['image']['name'];
        $tmpName   = $_FILES['image']['tmp_name'];
        $fileSize  = $_FILES['image']['size'];
        $fileType  = $_FILES['image']['type'];
        $fileError = $_FILES['image']['error'];

        // Max size 5MB
        $maxSize = 5 * 1024 * 1024;

        // Get extension
        $fileExt = explode('.', $imageName);
        $fileActualExt = strtolower(end($fileExt));

        // Allowed extensions
        $allowed = ['jpg', 'jpeg', 'png'];

        // Check extension
        if(!in_array($fileActualExt, $allowed)){

            $response['status'] = 'error';
            $response['message'] = 'Only JPG, JPEG and PNG allowed';

        }

        // Check size
        elseif($fileSize > $maxSize){

            $response['status'] = 'error';
            $response['message'] = 'Image size must be less than 5 MB';

        }

        else{

            if($fileError == 0){

                // New image name
                $newName = time() . "_" . $imageName;

                // Upload image
                move_uploaded_file($tmpName, "../assets/images/blog/" . $newName);

                // Insert query
                $insertQuery = "INSERT INTO blog_table(category_id, title, image, description, userId) 
                VALUES('$categoryId','$title','$newName','$description','$userId')";

                $insertResult = mysqli_query($conn, $insertQuery);

                if($insertResult){

                    $response['status'] = 'success';
                    $response['message'] = 'Added Successfully';

                }else{

                    $response['status'] = 'error';
                    $response['message'] = 'Database Error';

                }

            }else{

                $response['status'] = 'error';
                $response['message'] = 'There was an error uploading your file!';

            }

        }


    }
    
    // blog page
    if(isset($_POST['form_name']) && $_POST['form_name'] == 'edit-blog-post'){

        $id = mysqli_real_escape_string($conn, $_POST['id']);
        $categoryId = mysqli_real_escape_string($conn, $_POST['categoryId']);
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $description = mysqli_real_escape_string($conn, $_POST['description']);
        $userId = mysqli_real_escape_string($conn, $_POST['userId']);
         $currentDate = date('Y-m-d H:i:s');
        

        $updateQuery = "UPDATE blog_table SET category_id='$categoryId', title='$title', description='$description', userId='$userId', update_date ='$currentDate' WHERE id='$id'";

        $updateResult = mysqli_query($conn, $updateQuery);

        if($updateResult){

            $response['status'] = 'success';
            $response['message'] = 'Updated Successfully';

        }else{

            $response['status'] = 'error';
            $response['message'] = 'Database Error';

        }
    }

    // edit blog post image
    if(isset($_POST['form_name']) && $_POST['form_name'] == 'edit-blog-image'){

        $id = mysqli_real_escape_string($conn, $_POST['id']);

        // File data
        $imageName = $_FILES['image']['name'];
        $tmpName   = $_FILES['image']['tmp_name'];
        $fileSize  = $_FILES['image']['size'];
        $fileType  = $_FILES['image']['type'];
        $fileError = $_FILES['image']['error'];

        // Max size 5MB
        $maxSize = 5 * 1024 * 1024;

        // Get extension
        $fileExt = explode('.', $imageName);
        $fileActualExt = strtolower(end($fileExt));

        // Allowed extensions
        $allowed = ['jpg', 'jpeg', 'png'];

        // Check extension
        if(!in_array($fileActualExt, $allowed)){

            $response['status'] = 'error';
            $response['message'] = 'Only JPG, JPEG and PNG allowed';

        }

        // Check size
        elseif($fileSize > $maxSize){

            $response['status'] = 'error';
            $response['message'] = 'Image size must be less than 5 MB';

        }

        else{

            if($fileError == 0){

                // New image name
                $newName = time() . "_" . $imageName;

                // Upload image
                move_uploaded_file($tmpName, "../assets/images/blog/" . $newName);

                // Update query
                $updateQuery = "UPDATE blog_table SET image='$newName' WHERE id = '$id'";
                $updateResult = mysqli_query($conn, $updateQuery);

                if($updateResult){

                    $response['status'] = 'success';
                    $response['message'] = 'Image updated Successfully';

                }else{

                    $response['status'] = 'error';
                    $response['message'] = 'Database Error';

                }

            }else{

                $response['status'] = 'error';
                $response['message'] = 'There was an error uploading your file!';

            }

        }
    }

    //edit user page
    if(isset($_POST['form_name']) && $_POST['form_name'] == 'edit-user'){
        $id = mysqli_real_escape_string($conn,$_POST['id']);
        $userName = mysqli_real_escape_string($conn,$_POST['username']);
        $email = mysqli_real_escape_string($conn,$_POST['email']);
        // $password = mysqli_real_escape_string($conn,$_POST['password']);
         $currentDate = date('Y-m-d H:i:s');

        $updateQuery = "UPDATE user_table SET name='$userName', email='$email', updated_date ='$currentDate' WHERE id='$id'";
        $updateResult = mysqli_query($conn, $updateQuery);

        if ($updateResult) {
            $response['status'] = 'success';
            $response['message'] = 'Updated Successfully';
        }
        else{
            $response['status'] = 'error';
            $response['message'] = 'Something went wrong !!';
        }
    }


    //edit user image
    if(isset($_POST['form_name']) && $_POST['form_name'] == 'edit-user-image'){

        $id = mysqli_real_escape_string($conn,$_POST['id']);

        // File data
        $imageName = $_FILES['image']['name'];
        $tmpName   = $_FILES['image']['tmp_name'];
        $fileSize  = $_FILES['image']['size'];
        $fileType  = $_FILES['image']['type'];
        $fileError = $_FILES['image']['error'];

        // Max size 5MB
        $maxSize = 5 * 1024 * 1024;

        // Get extension
        $fileExt = explode('.', $imageName);
        $fileActualExt = strtolower(end($fileExt));

        // Allowed extensions
        $allowed = ['jpg', 'jpeg', 'png'];

        // Check extension
        if(!in_array($fileActualExt, $allowed)){

            $response['status'] = 'error';
            $response['message'] = 'Only JPG, JPEG and PNG allowed';

        }

        // Check size
        elseif($fileSize > $maxSize){

            $response['status'] = 'error';
            $response['message'] = 'Image size must be less than 5 MB';

        }

        else{

            if($fileError == 0){

                // New image name
                $newName = time() . "_" . $imageName;

                // Upload image
                move_uploaded_file($tmpName, "../assets/images/user/" . $newName);

                // Update query
                $updateQuery = "UPDATE user_table SET image='$newName' WHERE id='$id'";
                $updateResult = mysqli_query($conn, $updateQuery);

                if($updateResult){

                    $response['status'] = 'success';
                    $response['message'] = 'Image updated Successfully';

                }else{

                    $response['status'] = 'error';
                    $response['message'] = 'Database Error';

                }

            }else{

                $response['status'] = 'error';
                $response['message'] = 'There was an error uploading your file!';

            }

        }
    }

    //edit profile page
    if(isset($_POST['form_name']) && $_POST['form_name'] == 'edit-profile'){
        $id              = mysqli_real_escape_string($conn, $_POST['id']);
        $userName        = mysqli_real_escape_string($conn, $_POST['username']);
        $email           = mysqli_real_escape_string($conn, $_POST['email']);

        $currentPassword = trim($_POST['current_password']);
        $newPassword     = trim($_POST['new_password']);
        $confirmPassword = trim($_POST['confirm_password']);

        $currentDate     = date('Y-m-d H:i:s');
        echo $newPassword;

        $query = "SELECT password FROM user_table WHERE id='$id'";
        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result) > 0){
            $userData = mysqli_fetch_assoc($result);
            $dbPassword = $userData['password'];

            // Check current password
            if(empty($newPassword)){
                $response['status'] = 'error';
                $response['message'] = 'New password is required!';
            }
            elseif(strlen($newPassword) < 8){
                $response['status'] = 'error';
                $response['message'] = 'Password must be at least 8 characters long!';
            }
            elseif(!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()_+\-=\[\]{};:"\\\\|,.<>\/?]).{8,}$/', $newPassword)){
                $response['status'] = 'error';
                $response['message'] = 'Password must contain uppercase, lowercase, number and special character!';
            }
            // Check confirm password
            elseif($newPassword != $confirmPassword){
                $response['status'] = 'error';
                $response['message'] = 'New password and confirm password do not match!';
            }
            else{
                // Save new password as MD5
                $hashedPassword = md5($confirmPassword);
                echo $confirmPassword;

                $updateQuery = "UPDATE user_table SET name='$userName', email='$email', password='$hashedPassword', updated_date='$currentDate' WHERE id='$id'";

                if(mysqli_query($conn, $updateQuery)){
                    $response['status'] = 'success';
                    $response['message'] = 'Profile updated successfully!';
                }
                else{
                    $response['status'] = 'error';
                    $response['message'] = 'Something went wrong!';
                }
            }
        }
        else{
            $response['status'] = 'error';
            $response['message'] = 'User not found!';
        }
    }


    echo json_encode($response);

?>