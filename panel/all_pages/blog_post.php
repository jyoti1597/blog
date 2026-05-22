<?php include '../common_pages/header.php'; ?>
<?php include '../common_pages/sidebar.php'; ?>
    <!-- Main Content -->
    <div class="main-content">
        <div class="whiteCard">
            <div class="cardHeader">
                <h2>Add Blog Post</h2>
            </div>

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
    </div>
    <!-- End of Main Content -->
<?php include '../common_pages/footer.php'; ?>