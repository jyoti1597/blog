<?php include '../common_pages/header.php'; ?>
<?php include '../common_pages/sidebar.php'; ?>
<?php
    $id = $_GET['id'];
    $checkQuery = "SELECT * FROM blog_table WHERE id='$id'";
    $checkResult = mysqli_query($conn, $checkQuery);
    $checkArray = mysqli_fetch_array($checkResult);

    $categoryId = $checkArray['category_id'];
    $title = $checkArray['title'];
    $description = $checkArray['description'];
    // $status = $checkArray['post_status'];
    $image = $checkArray['image'];
?>
    <!-- Main Content -->
    <div class="main-content">
    
        <div class="row">
            <div class='col-8'>
                <div class="whiteCard">
                    <!-- card header -->
                    <div class="cardHeader">
                        <h2>Edit Blog Post</h2>
                    </div>
                    <!--form section -->
                    <div class="formSection">
                        <form class="common-form-method" method="POST" enctype="multipart/form-data">
                            <div class="inputGroup">
                                <label for="categoryId">Category</label>
                                <input type="hidden" name="form_name" value="edit-blog-post">
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                <input type="hidden" name="userId" value="<?php echo "".$_SESSION['userId']."";?>">
                                <select id="categoryId" name="categoryId" required>
                                    <option value="">Select category</option>
                                    <?php
                                        $checkQuery = "SELECT * FROM category_table WHERE status = 0";
                                        $checkResult = mysqli_query($conn, $checkQuery);

                                        $count = 0;

                                        if(mysqli_num_rows($checkResult) > 0){
                                            while($checkArray = mysqli_fetch_array($checkResult)){
                                                $count++;

                                                $category = $checkArray['category_name'];

                                                
                                                if($checkArray['id'] == $categoryId){
                                                    echo "<option value='".$checkArray['id']."' selected>$category</option>";
                                                }
                                                elseif($checkArray['id'] != ''){
                                                    echo "<option value='".$checkArray['id']."'>$category</option>";
                                                }
                                                else{
                                                    echo "<option value=''>No category found</option>";
                                                }
                                            }
                                        }
                                    
                                    ?>
                                </select>
                            </div>    
                            <div class="inputGroup">
                                <label for="title">Title</label>
                                <input type="text" id="title" name="title" placeholder="Enter blog title" value="<?php echo $title; ?>" required>
                            </div>
                            <!-- <div class="inputGroup">
                                <label for="status">Status</label>
                                <select id="status" name="status" required>
                                    <option value="">Select status</option>
                                    <option value="1" <?php echo ($status == 1) ? 'selected' : ''; ?>>Active</option>
                                    <option value="2" <?php echo ($status == 2) ? 'selected' : ''; ?>>Inactive</option>
                                </select>
                            </div> -->
                            <div class="inputGroup">
                                <label for="description">Description</label>
                                <textarea id="description" name="description" placeholder="Enter blog description"  rows="10">
                                    <?php echo $description; ?>
                                </textarea>
                            </div>
                            <div class="mt-10 d-flex justify-content-center">
                                <button type="submit" class="submitBtn" name="submit">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class='col-4'>
                <div class="whiteCard">
                    <!-- card header -->
                    <div class="cardHeader">
                        <h2>Blog Post Image</h2>
                    </div>
                    <!--form section -->
                    <div class="formSection">
                        <?php 
                            if ($image != ''){ ?>
                                <img src="../assets/images/blog/<?php echo $image; ?>" alt="Blog Image" width="100%" height="250px" style="object-fit: cover;">
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
                                    <input type="hidden" name="form_name" value="edit-blog-image">
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