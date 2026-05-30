<?php include '../common_pages/header.php'; ?>
<?php include '../common_pages/sidebar.php'; ?>
    <!-- Main Content -->
    <div class="main-content">
        <div class="whiteCard">
            <!-- card header -->
            <div class="cardHeader">
                <h2>Add Blog Post</h2>
            </div>
            <!--form section -->
            <div class="formSection">
                <form id="common-form-method" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="inputGroup">
                            <label for="categoryId">Category</label>
                            <input type="hidden" name="form_name" value="blog_post">
                            <input type="hidden" name="userId" value="<?php echo "".$_SESSION['userId']."";?>">
                            <select id="categoryId" name="categoryId" required>
                                <option value="">Select category</option>
                                <?php
                                    $checkQuery = "SELECT * FROM category_table";
                                    $checkResult = mysqli_query($conn, $checkQuery);

                                    $count = 0;

                                    if(mysqli_num_rows($checkResult) > 0){
                                        while($checkArray = mysqli_fetch_array($checkResult)){
                                            $count++;

                                            $category = $checkArray['category_name'];

                                            if($checkArray['id'] != ''){
                                                echo "<option value='".$checkArray['id']."'>$category</option>";
                                            }
                                        }
                                    }
                                
                                ?>
                            </select>
                        </div>    
                        <div class="inputGroup">
                            <label for="title">Title</label>
                            <input type="text" id="title" name="title" placeholder="Enter blog title" required>
                        </div>
                        <div class="inputGroup">
                            <label for="status">Status</label>
                            <select id="status" name="status" required>
                                <option value="">Select status</option>
                                <option value="1">Active</option>
                                <option value="2">Inactive</option>
                            </select>
                        </div>
                        <div class ="inputGroup">
                            <label for="image">Image </label>
                            <input type="file" name="image" id="image" accept="image/*" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="inputGroup">
                            <label for="description">Description</label>
                            <textarea id="description" name="description" placeholder="Enter blog description"></textarea>
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
                    <h2>Current Blog Posts</h2>
                </div>
                <!-- table content -->
                <div class="tableContainer">
                    <table>
                        <thead>
                            <tr>
                                <th>S.No.</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Author</th>
                                <th>Date Created</th>
                                <th>Description</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                                $limit = 10;

                                if(isset($_GET['page'])){
                                    $page = $_GET['page'];
                                }
                                else{
                                    $page = 1;
                                }
                                $offset = ($page - 1) * $limit;

                                $checkQuery = "SELECT * FROM blog_table WHERE status = 0 ORDER BY id ASC LIMIT {$offset}, {$limit}";
                                $checkResult = mysqli_query($conn, $checkQuery);

                                $count = 0;

                                if(mysqli_num_rows($checkResult) > 0){

                                    while($checkArray = mysqli_fetch_array($checkResult)){
                                        
                                        $categoryQuery = "SELECT * FROM category_table WHERE id = '".$checkArray['category_id']."'";
                                        $categoryResult = mysqli_query($conn, $categoryQuery);
                                        $categoryArray = mysqli_fetch_array($categoryResult);

                                        $userQuery = "SELECT * FROM user_table WHERE id = '".$checkArray['userId']."'";
                                        $userResult = mysqli_query($conn, $userQuery);
                                        $userArray = mysqli_fetch_array($userResult);


                                        $count++;

                                        echo"<tr>
                                            <td>".$checkArray['id']."</td>
                                            <td>".$checkArray['title']."</td>
                                            <td>".$categoryArray['category_name']."</td>
                                            <td>".$userArray['name']."</td>
                                            <td>".date('d M Y',strtotime($checkArray['create_date']))."</td>
                                            <td>".$checkArray['description']."</td>
                                            <td>
                                                <div class='row'>
                                                    <form class='approval-form' method='POST' enctype='multipart/form-data'>
                                                        <input type='hidden' name='form_name' value='post_approval'>
                                                        <input type='hidden' name='id' value='".$checkArray['id']."'>";
                                                if($checkArray['post_status'] == 1){
                                                    

                                                    echo"<input type='hidden' name='post_status' value='not_approve'>
                                                    <button type='submit' class='notApproveBtn'><i class='fa fa-eye-slash'></i></button>";
                                                }
                                                else{
                                                     echo"<input type='hidden' name='post_status' value='approve'>
                                                        <button type='submit' class='approveBtn'><i class='fa fa-eye'></i></button>";
                                                }
                                               echo"</form>
                                                    <a class='editBtn' herf='edit_blog_post.php?id=".$checkArray['id']."'>
                                                        <i class='fa fa-edit'></i>
                                                    </a>
                                                    <button type='button' class='deleteIconBtn' onclick='openModal(".$checkArray['id'].")'>
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
                                                    <input type='hidden' name='table_name' value='category_table'>
                                                    <input type='hidden' name='id' value='".$checkArray['id']."'>
                                                    <button class='redBtn deleteBtn' type='submit'>
                                                        Delete
                                                    </button>
                                                    
                                                    <button class='cancel-btn' onclick='closeModal(".$checkArray['id'].")'>
                                                        Cancel
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>";

                                    }

                                }
                                else{

                                    echo "<tr>
                                            <td colspan='7' style='text-align:center;'>
                                                Data not found
                                            </td>
                                        </tr>";

                                }
                            
                            ?>
                        </tbody>
                    </table>
                    <?php

                        // Total records query
                        $paginationQuery = "SELECT * FROM blog_table WHERE status = 0";
                        $paginationResult = mysqli_query($conn, $paginationQuery);

                        $total_records = mysqli_num_rows($paginationResult);

                        $total_page = ceil($total_records / $limit);

                        // Show pagination only if records are greater than limit
                        if($total_records > $limit){

                            echo '<ul class="pagination">';

                            // Prev Button
                            if($page > 1){

                                echo '<li>
                                        <a href="blog_post.php?page='.($page - 1).'">
                                            Prev
                                        </a>
                                    </li>';
                            }

                            // Page Numbers
                            for($i = 1; $i <= $total_page; $i++){

                                $active = ($i == $page) ? 'active' : '';

                                echo '<li class="'.$active.'">
                                        <a href="blog_post.php?page='.$i.'">
                                            '.$i.'
                                        </a>
                                    </li>';
                            }

                            // Next Button
                            if($page < $total_page){

                                echo '<li>
                                        <a href="blog_post.php?page='.($page + 1).'">
                                            Next
                                        </a>
                                    </li>';
                            }

                            echo '</ul>';
                        }

                    ?>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Main Content -->
    <div class="message"></div>
<?php include '../common_pages/footer.php'; ?>