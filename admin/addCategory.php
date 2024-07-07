<?php include('includes/header.php');
?>
<div class="container-fluid py-4">
    <div class="row min-vh-80 h-100">
        <div class="col-12">
            <h4 class="d-flex align-items-center justify-content-between mb-3 pe-3">
                Add Category
                <a href="category.php" class="btn btn-primary text-white">
                    Back
                </a>
            </h4>
            <form action="includes/config/BL.php" method="POST" class="px-3 py-1" enctype="multipart/form-data">
                <div class=" px-3 py-1 bg-white mb-3">
                    <div class="form-floating">
                        <input type="text" name="name" required class="form-control" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Name</label>
                    </div>
                </div>
                <div class="px-3 py-1 bg-white mb-3">
                    <div class="form-floating">
                        <textarea class="form-control" required name="description" rows="3" cols="10" placeholder="Description" id="floatingTextarea"></textarea>
                        <label for="floatingTextarea">Description</label>
                    </div>
                </div>
                <div class="px-3 py-2 bg-white mb-3">
                    <label class="d-block">Image</label>
                    <input type="file" name="image" required>
                </div>
                <div>
                    <button type="submit" class="btn btn-secondary text-white float-end" name="add_category">
                        Add
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>