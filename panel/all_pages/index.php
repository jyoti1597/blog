<?php include '../common_pages/header.php'; ?>
<?php include '../common_pages/sidebar.php'; ?>
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
                    <p>+ 1,245</p>
                </div>

                <div class="card">
                    <h3>Categories</h3>
                    <p>+ 25</p>
                </div>

                <div class="card">
                    <h3>Blog Posts</h3>
                    <p>+ 320</p>
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
                            <tr>
                                <td>1</td>
                                <td>Blog Title</td>
                                <td>Tech</td>
                                <td>Jyoti</td>
                                <td>22 May</td>
                                <td>Lorem ipsum text</td>
                                <td>Active</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- End Main Content -->
<?php include '../common_pages/footer.php'; ?>
