
    <div class="dashboard">

        <!-- Sidebar -->
        <div class="sidebar">
            <div class="logo">
                <img src="../assets/images/logo_image.png" alt="Logo">
                <a href="#" class="closeBtn"><i class="fa fa-close"></i></a>
            </div>
            <ul>
                <li><a href="../all_pages/dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                <li><a href="../all_pages/category.php"><i class="fa fa-th-large"></i> Categories</a></li>
                <li><a href="../all_pages/blog_post.php"><i class="fa fa-newspaper-o"></i> Blog</a></li>
                <?php

                    if($_SESSION['genre'] == 'admin'){
                        echo "<li>
                                <a href='../all_pages/users.php'>
                                    <i class='fa fa-user'></i> Users
                                </a>
                            </li>";
                    }
                ?>
                <li>
                    <a href="../all_pages/profile.php">
                        <i class="fa fa-user-circle"></i> Profile
                    </a>
                </li>
            </ul>
            <div class="logout">
                <div class="profileSection">
                    <img src="../assets/images/user/profile.png" alt="Profile">
                    <span>Admin</span>
                </div>
                <a href="../db/logout.php" class="logoutBtn"><i class="fa fa-sign-out"></i> Logout</a>
            </div>
        </div>
