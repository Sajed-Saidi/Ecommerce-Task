<?php include('includes/header.php');
include('includes/config/DAL.php');
?>
<div class="container-fluid py-4">
    <div class="row min-vh-80 h-100">
        <div class="col-12">
            <h4 class="d-flex align-items-center justify-content-between mb-3 pe-3">
                Edit Category
                <a href="category.php" class="btn btn-primary text-white">
                    Back
                </a>
            </h4>
            <?php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $category = getId('categories', $id);

                if (mysqli_num_rows($category) > 0) {
                    $category = mysqli_fetch_array($category);
            ?>

                    <form action="includes/config/BL.php" method="POST" class="px-3 py-1" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $category['id'] ?>">
                        <div class=" px-3 py-1 bg-white mb-3">
                            <div class="form-floating">
                                <input type="text" name="name" required value="<?php echo $category['name'] ?>" class="form-control" id="floatingInput" placeholder="name@example.com">
                                <label for="floatingInput">Name</label>
                            </div>
                        </div>
                        <div class="px-3 py-1 bg-white mb-3">
                            <div class="form-floating">
                                <textarea class="form-control" required name="description" rows="3" cols="10" placeholder="Description" id="floatingTextarea"><?php echo $category['description'] ?></textarea>
                                <label for="floatingTextarea">Description</label>
                            </div>
                        </div>
                        <div class="px-3 py-2 bg-white mb-3">
                            <label class="d-block">Image</label>
                            <input type="file" name="image">
                            <input type="hidden" name="old_image" value="<?php echo $category['image'] ?>">
                            <img width="60px" height="60px" src="images/<?php echo $category['image'] ?>" alt="">
                        </div>
                        <div>
                            <button type="submit" class="btn btn-secondary text-white float-end" name="update_category">
                                Update
                            </button>
                        </div>
                    </form>

            <?php
                } else {
                    echo "Category not found.";
                }
            } else {
                echo "Id is missing.";
            }
            ?>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>