<?php include '../common_pages/header.php'; ?>
<?php include '../common_pages/sidebar.php'; ?>
<?php

    $userCountQuery = "SELECT * FROM user_table WHERE genre = 'user' AND status = 0";
    $userCountResult = mysqli_query($conn, $userCountQuery);
    $userCount = mysqli_num_rows($userCountResult);


    $categoryCountQuery = "SELECT * FROM category_table WHERE status = 0";
    $categoryCountResult = mysqli_query($conn, $categoryCountQuery);
    $categoryCount = mysqli_num_rows($categoryCountResult);

    $blogCountQuery = "SELECT * FROM blog_table WHERE status = 0";
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
                <?php if($_SESSION['genre'] == 'admin'){ ?>
                    <div class="card">
                        <h3>Users</h3>
                        <p>+ <?php echo $userCount; ?></p>
                    </div>
                <?php } ?>
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
                        <form method="GET" action="">
                            <input type="text" placeholder="Search..." name="search" value="<?php if(isset($_GET['search'])){ echo $_GET['search']; }?>" required>
                            <button class="searchBtn" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </form>
                    </div>
                </div>

                <div class="tableContainer">
                    <table>
                        <thead>
                            <tr>
                                <th>S.No.</th>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Date Created</th>
                                <th>Description</th>
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
                                
                                $search = $_GET["search"] ?? '';

                                $where = "WHERE b.status = 0 AND b.create_date = CURDATE()";
                                

                                if (!empty($search)) {
                                    $where .= " AND (b.title LIKE '%$search%' OR c.category_name LIKE '%$search%' OR u.name LIKE '%$search%')";
                                }

                                $blogQuery = "SELECT b.*,  c.category_name, u.name as author_name FROM blog_table b LEFT JOIN category_table c ON b.category_id = c.id LEFT JOIN user_table u ON b.userId = u.id $where ORDER BY b.id DESC LIMIT {$offset}, {$limit}";

                                $blogResult = mysqli_query($conn, $blogQuery);

                                $count = 0;

                                if(mysqli_num_rows($blogResult) > 0){

                                    while($blogArray = mysqli_fetch_array($blogResult)){
                                        
                                        $count++;
                             
                                        echo"<tr>
                                                <td>".$blogArray['id']."</td>
                                                <td>".$blogArray['title']."</td>
                                                <td>".$blogArray['category_name']."</td>
                                                <td>".$blogArray['author_name']."</td>
                                                <td>".date('d M Y',strtotime($blogArray['create_date']))."</td>
                                                <td>".$blogArray['description']."</td>
                                            </tr>";

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
        <!-- End Main Content -->
<?php include '../common_pages/footer.php'; ?>
