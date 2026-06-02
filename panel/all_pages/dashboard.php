<?php include '../common_pages/header.php'; ?>
<?php include '../common_pages/sidebar.php'; ?>
<?php

    $userCountQuery = "SELECT * FROM user_table WHERE genre = 'user'";
    $userCountResult = mysqli_query($conn, $userCountQuery);
    $userCount = mysqli_num_rows($userCountResult);


    $categoryCountQuery = "SELECT * FROM category_table ";
    $categoryCountResult = mysqli_query($conn, $categoryCountQuery);
    $categoryCount = mysqli_num_rows($categoryCountResult);

    $blogCountQuery = "SELECT * FROM blog_table ";
    $blogCountResult = mysqli_query($conn, $blogCountQuery);
    $blogCount = mysqli_num_rows($blogCountResult);

?>
        <!-- Main Content -->
        <div class="main-content">

            <!-- Topbar -->
            <div class="topbar">
                <a href="#" class="toggle"><i class="fa fa-bars"></i></a>
                <h3>Welcome to New Blog!</h3>
            </div>

            <!-- Cards -->
            <div class="countSection">
                <div class="card">
                    <h3>Users</h3>
                    <p>+ <?php echo $userCount; ?></p>
                </div>

                <div class="card">
                    <h3>Categories</h3>
                    <p>+ <?php echo $categoryCount; ?></p>
                </div>

                <div class="card">
                    <h3>Blog Posts</h3>
                    <p>+ <?php echo $blogCount; ?></p>
                </div>
            </div>
            <div class="tableSection">
                <div class="tableHeader">
                    <h2>Current Blog Posts</h2>

                    <div class="searchBox">
                        <input type="text" placeholder="Search...">
                        <button>
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>

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
                            
                                $blogQuery = "SELECT * FROM blog_table WHERE create_date = CURDATE() AND status = 0 ORDER BY id DESC";
                                $blogResult = mysqli_query($conn, $blogQuery);

                                $count = 0;

                                if(mysqli_num_rows($blogResult) > 0){

                                    while($blogArray = mysqli_fetch_array($blogResult)){
                                        
                                        $count++;

                                        $categoryQuery = "SELECT * FROM category_table WHERE id = '".$blogArray['category_id']."'";
                                        $categoryResult = mysqli_query($conn, $categoryQuery);
                                        $categoryArray = mysqli_fetch_array($categoryResult);

                                        
                                        echo"<tr>
                                                <td>".$blogArray['id']."</td>
                                                <td>".$blogArray['title']."</td>
                                                <td>".$categoryArray['category_name']."</td>
                                                <td>".$blogArray['name']."</td>
                                                <td>".date('d M Y',strtotime($blogArray['create_date']))."</td>
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
        <!-- End Main Content -->
<?php include '../common_pages/footer.php'; ?>
