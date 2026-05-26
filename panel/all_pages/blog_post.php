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
                <form action="POST" method="POST">
                    <div class="row">
                        <div class="inputGroup">
                            <label for="category">Category</label>
                            <select id="category">
                                <option value="">Select category</option>
                                <option value="tech">Tech</option>
                                <option value="lifestyle">Lifestyle</option>
                                <option value="travel">Travel</option>
                            </select>
                        </div>    
                        <div class="inputGroup">
                            <label for="title">Title</label>
                            <input type="text" id="title" placeholder="Enter blog title">
                        </div>
                        <div class="inputGroup">
                            <label for="status">Status</label>
                            <select id="status">
                                <option value="">Select status</option>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                        <div class ="inputGroup">
                            <label for="image">Image </label>
                            <input type="file" id="image">
                        </div>
                    </div>

                    <div class="row">
                        <div class="inputGroup">
                            <label for="description">Description</label>
                            <textarea id="description" placeholder="Enter blog description"></textarea>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <button type="submit" class="submitBtn">Submit</button>
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
                            
                                $blogQuery = "SELECT * FROM blog_table WHERE create_date = CURDATE()";
                                $blogResult = mysqli_query($conn, $blogQuery);

                                $count = 0;

                                if(mysqli_num_rows($blogResult) > 0){

                                    while($blogArray = mysqli_fetch_array($blogResult)){
                                        
                                        $categoryQuery = "SELECT * FROM category_table WHERE id = '".$blogArray['category_id']."'";
                                        $categoryResult = mysqli_query($conn, $categoryQuery);
                                        $categoryArray = mysqli_fetch_array($categoryResult);

                                        $count++;

                                        echo"<tr>
                                            <td>".$blogArray['id']."</td>
                                            <td>".$blogArray['title']."</td>
                                            <td>".$categoryArray['category_name']."</td>
                                            <td>".$blogArray['name']."</td>
                                            <td>".$blogArray['create_date']."</td>
                                            <td>".$blogArray['description']."</td>
                                            <td>";
                                                if($blogArray['status'] == 1){
                                                    echo"<button>Approve</button>";
                                                }
                                                else{
                                                     echo"<button>No Approve</button>";
                                                }
                                        echo"</td>
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