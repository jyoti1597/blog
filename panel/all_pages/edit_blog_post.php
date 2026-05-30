<?php include '../common_pages/header.php'; ?>
<?php include '../common_pages/sidebar.php'; ?>
<?php



?>
    <!-- Main Content -->
    <div class="main-content">
        <div class="whiteCard">
            <!-- card header -->
            <div class="cardHeader">
                <h2>Edit Blog Post</h2>
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
                        <button type="submit" class="submitBtn" name="submit">Update</button>
                    </div>
                </form>    
            </div>
        </div>
    </div>
    <!-- End of Main Content -->
<?php include '../common_pages/footer.php'; ?>