<?php include '../common_pages/header.php'; ?>
<?php include '../common_pages/sidebar.php'; ?>
    <!-- Main Content -->
    <div class="main-content">
        <div class="whiteCard">
            <!-- card header -->
            <div class="cardHeader">
                <h2>Add User</h2>
            </div>
            <!--form section -->
            <div class="formSection">
                <form action="POST" method="POST">
                    <div class="row">
                        <div class="inputGroup">
                            <label for="title">Name</label>
                            <input type="text" id="title" placeholder="Enter your name">
                        </div>
                        <div class="inputGroup">
                            <label for="title">Email</label>
                            <input type="email" id="title" placeholder="Enter your email">
                        </div>
                        <div class="inputGroup">
                            <label for="title">Password</label>
                            <input type="password" id="title" placeholder="Enter your password">
                        </div>
                        <div class ="inputGroup">
                            <label for="image">Image </label>
                            <input type="file" id="image" accept="image/*">
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
                    <h2>Users List</h2>

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
                                <th>Name</th>
                                <th>Email</th>
                                <th>Date Created</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>John Doe</td>
                                <td>john.doe@example.com</td>
                                <td>22 May</td>
                                <td>Active</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Main Content -->
<?php include '../common_pages/footer.php'; ?>