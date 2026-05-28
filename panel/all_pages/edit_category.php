<?php include '../common_pages/header.php'; ?>
<?php include '../common_pages/sidebar.php'; ?>
<?php
    $id = $_GET['id'];

    $query = "SELECT * FROM category_table WHERE id = '$id'";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);
?>

    <!-- Main Content -->
    <div class="main-content">
        <div class="whiteCard">
            <!-- card header -->
            <div class="cardHeader">
                <h2>Edit Category</h2>
            </div>
            <!--form section -->
            <div class="formSection">
                <form id="common-form-method" method="POST">
                    <div class="row">
                        <div class="inputGroup">
                            <input type="hidden" name="form_name" value="edit-category">
                            <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
                            <label for="category">Category</label>
                            <input type="text" id="category" name="category_name" placeholder="Enter category name"  value="<?php echo $data['category_name'];?>" required>
                        </div>
                        <div class="inputGroup justify-content-end mt-24">
                            <button type="submit" class="submitBtn" name="update" value="update">Update</button>
                        </div>
                    </div>
                </form>    
            </div>
        </div>
    </div>
    <!-- End of Main Content -->
     <div class="message"></div>
<?php include '../common_pages/footer.php'; ?>