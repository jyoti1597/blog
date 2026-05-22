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
                    <div class="inputGroup">
                        <label for="title">Title</label>
                        <input type="text" id="title" placeholder="Enter blog title">
                    </div>
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
                        <label for="author">Author</label>
                        <input type="text" id="author" placeholder="Enter author name">
                    </div>
                    <div class="inputGroup">
                        <label for="description">Description</label>
                        <textarea id="description" placeholder="Enter blog description"></textarea> 
                    </div>
                    <div class="inputGroup">
                        <label for="status">Status</label>
                        <select id="status">
                            <option value="">Select status</option>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                    <button type="submit" class="submitBtn">Add Blog Post</button>
                </form>    
            </div>
            
        </div>
    </div>
    <!-- End of Main Content -->
<?php include '../common_pages/footer.php'; ?>