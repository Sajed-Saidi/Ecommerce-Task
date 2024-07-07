<?php include('includes/header.php');
include('includes/config/DAL.php');
$categories = getAll('categories');
?>
<div class="container-fluid py-4">
    <div class="row min-vh-80 h-100">
        <div class="col-12">
            <h4 class="d-flex align-items-center justify-content-between mb-3 pe-3">
                Add Brand
                <a href="brand.php" class="btn btn-primary text-white">
                    Back
                </a>
            </h4>
            <form action="includes/config/BL.php" method="POST" class="px-3 py-1">
                <div class=" px-3 py-1 bg-white mb-3">
                    <div class="form-floating">
                        <input type="text" name="name" required class="form-control" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Name</label>
                    </div>
                </div>
                <div class=" px-3 py-1 bg-white mb-3">
                    <div class="form-floating">
                        <input type="text" name="slug" required class="form-control" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Slug</label>
                    </div>
                </div>
                <div class="px-3 py-1 bg-white mb-3 ">
                    Category
                    <div class="form-floating">
                        <select required class="form-select" name="category_id" id="floatingSelect">
                            <?php
                            if (!$categories) {
                                echo 'No categories found';
                            } else {
                                while ($row = $categories->fetch_assoc()) {
                            ?>
                                    <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                            <?php }
                            } ?>
                        </select>
                    </div>
                </div>
                <div>
                    <button type="submit" class="btn btn-secondary text-white float-end" name="add_brand">
                        Add
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>