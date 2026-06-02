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
            <form class="common-form-method" method="POST">
                <div class="row">
                    <div class="col-6">
                        <div class="inputGroup">
                            <input type="hidden" name="form_name" value="add-category">
                            <label for="category">Category</label>
                            <input type="text" id="category" name="category_name" placeholder="Enter category name" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <button type="submit" class="submitBtn mt-24" name="submit" value="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="whiteCard">
            <!--table section -->
            <div class="tableSection">
                <!-- table header -->
                <div class="tableHeader">
                    <h2>Categories List</h2>
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

                        $limit = 10;

                        if(isset($_GET['page'])){
                            $page = $_GET['page'];
                        }
                        else{
                            $page = 1;
                        }

                        $offset = ($page - 1) * $limit;

                        $checkQuery = "SELECT * FROM category_table 
                                    WHERE status = 0 
                                    ORDER BY id ASC 
                                    LIMIT {$offset}, {$limit}";

                        $checkResult = mysqli_query($conn, $checkQuery);

                        $count= 0;

                        if(mysqli_num_rows($checkResult) > 0){
                            while($checkArray = mysqli_fetch_array($checkResult)){
                                $count++;

                                echo "<tr>

                                        <td>".$count."</td>

                                        <td>".$checkArray['category_name']."</td>

                                        <td>".date('d M Y',strtotime($checkArray['create_date']))."</td>

                                        <td>
                                            <div class='justify-content-center d-flex gap-10'>
                                                <a class='editBtn' href='edit_category.php?id=".$checkArray['id']."'>
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
                                    <td colspan='4' style='text-align:center;'>
                                        Data not found
                                    </td>
                                </tr>";

                        }
                    ?>
                    </tbody>
                </table>
                <?php

                    // Total records query
                    $paginationQuery = "SELECT * FROM category_table WHERE status = 0";
                    $paginationResult = mysqli_query($conn, $paginationQuery);

                    $total_records = mysqli_num_rows($paginationResult);

                    $total_page = ceil($total_records / $limit);

                    // Show pagination only if records are greater than limit
                    if($total_records > $limit){

                        echo '<ul class="pagination">';

                        // Prev Button
                        if($page > 1){

                            echo '<li>
                                    <a href="category.php?page='.($page - 1).'">
                                        Prev
                                    </a>
                                </li>';
                        }

                        // Page Numbers
                        for($i = 1; $i <= $total_page; $i++){

                            $active = ($i == $page) ? 'active' : '';

                            echo '<li class="'.$active.'">
                                    <a href="category.php?page='.$i.'">
                                        '.$i.'
                                    </a>
                                </li>';
                        }

                        // Next Button
                        if($page < $total_page){

                            echo '<li>
                                    <a href="category.php?page='.($page + 1).'">
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