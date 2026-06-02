<?php include '../common_pages/header.php'; ?>
<?php include '../common_pages/sidebar.php'; ?>
<?php
    $id = $_SESSION['userId'];

    $query = "SELECT * FROM user_table WHERE id = '$id'";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);
    
?>
    <!-- Main Content -->
    <div class="main-content">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="whiteCard">
                    <!-- card header -->
                    <div class="cardHeader">
                        <h2>Profile</h2>
                    </div>
                    <!--form section -->=
                    <form class="common-form-method" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-4">
                                <div class="inputGroup">
                                    <input type="hidden" name="form_name" value="edit-profile">
                                    <input type="hidden" name="id" value="<?php echo $id;?>">
                                    <label for="username">Name</label>
                                    <input type="text" id="username" name="username" placeholder="Enter your name" value="<?php echo $data['name']; ?>" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="inputGroup">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" name="email" placeholder="Enter your email" value="<?php echo $data['email']; ?>" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="inputGroup">
                                    <label for="current_password">Current Password</label>
                                    <input type="password" id="current_password" name="current_password" placeholder="Enter your current password" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="inputGroup">
                                    <label for="new_password">New Password</label>
                                    <input type="password" id="new_password" name="new_password" placeholder="Enter new password" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="inputGroup">
                                    <label for="confirm_password">Confirm Password</label>
                                    <input type="password" id="confirm_password" name="confirm_password" placeholder="Enter confirm your password" required>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <button type="submit" class="submitBtn" name="submit" value="submit">Update Profile</button>
                        </div>
                    </form> 
                </div>
            </div>
            <div class='col-4'>
                <div class="whiteCard">
                    <!-- card header -->
                    <div class="cardHeader">
                        <h2>Profile Image</h2>
                    </div>
                    <!--form section -->
                    <div class="formSection">
                        <?php if($data['image'] != ''){ ?>
                            <img src="../assets/images/user/<?php echo $data['image']; ?>" alt="User Image" width="100%" height="250px" style="object-fit: cover;">
                            <div class="mt-10 d-flex justify-content-center">
                                <button type='button' class='submitBtn' onclick='openModal(<?php echo $id; ?>)'>Delete Image</button>
                            </div>
                            <div class='modal' id='deleteModal<?php echo $id; ?>'>
                                <div class='modal-content'>
                                    <h2>Delete the record</h2>
                                    <p>Are you sure you want to delete this data?</p>
                                    <div class='row justify-content-start mt-10'>
                                        <form class='delete-form' method='POST' enctype='multipart/form-data'>
                                            <input type='hidden' name='type' value='delete-image'>
                                            <input type='hidden' name='table_name' value='user_table'>
                                            <input type='hidden' name='id' value='<?php echo $id; ?>'>
                                            <button class='redBtn deleteBtn' type='submit'>
                                                Delete
                                            </button>
                                            <button class='cancel-btn' onclick='closeModal(".$id.")'>
                                                Cancel
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php }else{ ?>    
                            <form class="common-form-method" method="POST" enctype="multipart/form-data">
                                <div class="inputGroup">
                                    <input type="hidden" name="form_name" value="edit-user-image">
                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                    <input type="file" name="image" id="image" accept="image/*" required>
                                </div>
                                <div class="mt-10 d-flex justify-content-center">
                                    <button type="submit" class="submitBtn" name="submit">Upload</button>
                                </div>
                            </form>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Main Content -->
    <div class="message"></div>
<?php include '../common_pages/footer.php'; ?>