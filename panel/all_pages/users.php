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
                <form id="common-form-method" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="inputGroup">
                            <input type="hidden" name="form_name" value="user">
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

                    <div class="searchBox">
                        <input type="text" placeholder="Search...">
                        <button>
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
                <!-- table content -->
                <div class="tableContainer">
                    <table>
                        <thead>
                            <tr>
                                <th>S.No.</th>
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
                                            <td>".$checkArray['id']."</td>
                                            <td>".$checkArray['name']."</td>
                                            <td>".$checkArray['email']."</td>
                                            <td>".date('d M Y',strtotime($checkArray['create_date']))."</td>
                                            <td>Active</td>
                                        </tr>";

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
<?php include '../common_pages/footer.php'; ?>