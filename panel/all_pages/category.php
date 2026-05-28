<?php include '../common_pages/header.php'; ?>
<?php include '../common_pages/sidebar.php'; ?>
    <!-- Main Content -->
    <div class="main-content">
        <div class="whiteCard">
            <!-- card header -->
            <div class="cardHeader">
                <h2>Add Category</h2>
            </div>
            <!--form section -->
            <div class="formSection">
                <form id="common-form-method" method="POST">
                    <div class="row">
                        <div class="inputGroup">
                            <input type="hidden" name="form_name" value="category">
                            <label for="category">Category</label>
                            <input type="text" id="category" name="category_name" placeholder="Enter category name" required>
                        </div>
                        <div class="inputGroup justify-content-end mt-24">
                            <button type="submit" class="submitBtn" name="submit" value="submit">Submit</button>
                        </div>
                    </div>
                </form>    
            </div>
        </div>
        <div class="whiteCard">
            <!--table section -->
            <div class="tableSection">
                <!-- table header -->
                <div class="tableHeader">
                    <h2>Categories List</h2>

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
                                <th>Category</th>
                                <th>Date Created</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            
                                $checkQuery = "SELECT * FROM category_table ";
                                $checkResult = mysqli_query($conn, $checkQuery);

                                $count = 0;

                                if(mysqli_num_rows($checkResult) > 0){

                                    while($checkArray = mysqli_fetch_array($checkResult)){
                                        
                                        $count++;

                                        echo"<tr>
                                            <td>".$checkArray['id']."</td>
                                            <td>".$checkArray['category_name']."</td>
                                            <td>".date('d M Y',strtotime($checkArray['create_date']))."</td>
                                            <td>
                                                <a class='editBtn' href='edit_blog_post.php?id=".$checkArray['id']."'>
                                                    <i class='fa fa-edit'></i>
                                                </a>";
                                            if($checkArray['status'] == 0){
                                                echo"<button type='button' class='deleteBtn' onclick='openModal(".$checkArray['id'].")'>
                                                        <i class='fa fa-trash'></i>
                                                    </button>";
                                            }
                                            else{
                                                echo"<button class='deleteBtn'>
                                                        <i class='fa fa-trash'></i>
                                                    </button>";
                                            }
                                       echo"</td>
                                       </tr>
                                       <div class='modal' id='deleteModal".$checkArray['id']."'>
                                            <div class='modal-content'>
                                                <h2>Delete the record</h2>
                                                <p>Are you sure you want to delete this data?</p>
                                                <div class='modal-buttons'>
                                                    <a href='delete.php?id=".$checkArray['id']."' class='redBtn'>
                                                        delete
                                                    </a>
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