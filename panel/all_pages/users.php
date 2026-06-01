<?php include '../common_pages/header.php'; ?>
<?php include '../common_pages/sidebar.php'; ?>
    <!-- Main Content -->
    <div class="main-content">
        <div class="whiteCard">
            <!-- card header -->
            <div class="cardHeader">
                <h2>Add User</h2>
            </div>
            <!--form section -->
            <div class="formSection">
                <form class="common-form-method" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="inputGroup">
                            <input type="hidden" name="form_name" value="add-user">
                            <label for="username">Name</label>
                            <input type="text" id="username" name="username" placeholder="Enter your name" required>
                        </div>
                        <div class="inputGroup">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" placeholder="Enter your email" required>
                        </div>
                        <div class="inputGroup">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" placeholder="Enter your password" required>
                        </div>
                        <div class ="inputGroup">
                            <label for="image">Image </label>
                            <input type="file" name="image" id="image" accept="image/*" required>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <button type="submit" class="submitBtn" name="submit" value="submit">Submit</button>
                    </div>
                </form>    
            </div>
        </div>
        <div class="whiteCard">
            <!--table section -->
            <div class="tableSection">
                <!-- table header -->
                <div class="tableHeader">
                    <h2>Users List</h2>
                </div>
                <!-- table content -->
                <div class="tableContainer">
                    <table>
                        <thead>
                            <tr>
                                <th>S.No.</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Date Created</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            
                                $checkQuery = "SELECT * FROM user_table ";
                                $checkResult = mysqli_query($conn, $checkQuery);

                                $count = 0;

                                if(mysqli_num_rows($checkResult) > 0){

                                    while($checkArray = mysqli_fetch_array($checkResult)){
                                        
                                        $count++;

                                        echo"<tr>
                                            <td>".$count."</td>
                                            <td>
                                                <img src='../assets/images/".$checkArray['image']."' alt='user image' class='tableImage'>
                                            </td>
                                            <td>".$checkArray['name']."</td>
                                            <td>".$checkArray['email']."</td>
                                            <td>".date('d M Y',strtotime($checkArray['create_date']))."</td>
                                            <td>
                                                <div class='row justify-content-center'>

                                                    <a class='editBtn' href='edit_user.php?id=".$checkArray['id']."'>
                                                        <i class='fa fa-edit'></i>
                                                    </a>

                                                    <button type='button'  class='deleteIconBtn' onclick='openModal(".$checkArray['id'].")'>
                                                        <i class='fa fa-trash'></i>
                                                    </button>

                                                </div>
                                            </td>
                                        </tr>
                                    <div class='modal' id='deleteModal".$checkArray['id']."'>
                                        <div class='modal-content'>
                                            <h2>Delete the record</h2>
                                            <p>Are you sure you want to delete this data?</p>
                                            <div class='row justify-content-start mt-10'>
                                                <form class='delete-form' method='POST' enctype='multipart/form-data'>
                                                    <input type='hidden' name='type' value='delete'>
                                                    <input type='hidden' name='table_name' value='user_table'>
                                                    <input type='hidden' name='id' value='".$checkArray['id']."'>
                                                    <button class='redBtn deleteBtn' type='submit'>
                                                        Delete
                                                    </button>
                                                </form>
                                                <button class='cancel-btn' onclick='closeModal(".$checkArray['id'].")'>
                                                    Cancel
                                                </button>
                                            </div>
                                        </div>
                                    </div>";
                                    }

                                }
                            
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Main Content -->
    <div class="message"></div>
<?php include '../common_pages/footer.php'; ?>