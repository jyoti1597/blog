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
                <form action="POST" method="POST">
                    <div class="row">
                        <div class="inputGroup">
                            <label for="category">Category</label>
                            <input type="text" id="category" placeholder="Enter category name">
                        </div>
                        <div class="inputGroup justify-content-end mt-24">
                            <button type="submit" class="submitBtn">Submit</button>
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