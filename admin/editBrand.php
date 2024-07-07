<?php include('includes/header.php');
include('includes/config/DAL.php');
$categories = getAll('categories');
?>
<div class="container-fluid py-4">
    <div class="row min-vh-80 h-100">
        <div class="col-12">
            <h4 class="d-flex align-items-center justify-content-between mb-3 pe-3">
                Update Brand
                <a href="brand.php" class="btn btn-primary text-white">
                    Back
                </a>
            </h4>
            <?php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $brand = getId('brands', $id, $conn);

                if (mysqli_num_rows($brand) > 0) {
                    $brand = mysqli_fetch_array($brand);
            ?>
                    <form action="includes/config/BL.php" method="POST" class="px-3 py-1">
                        <input type="hidden" name="id" value="<?php echo $brand['id'] ?>">
                        <div class=" px-3 py-1 bg-white mb-3">
                            <div class="form-floating">
                                <input type="text" name="name" required value="<?php echo $brand['name'] ?>" class="form-control" id="floatingInput" placeholder="name@example.com">
                                <label for="floatingInput">Name</label>
                            </div>
                        </div>
                        <div class=" px-3 py-1 bg-white mb-3">
                            <div class="form-floating">
                                <input type="text" name="slug" required value="<?php echo $brand['slug'] ?>" class="form-control" id="floatingInput" placeholder="name@example.com">
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
                                            <option <?php if ($brand['category_id'] == $row['id']) {
                                                        echo "selected";
                                                    } else {
                                                        echo "";
                                                    }  ?> value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                                    <?php }
                                    } ?>
                                </select>
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-secondary text-white float-end" name="update_brand">
                                Update
                            </button>
                        </div>
                    </form>
            <?php
                } else {
                    echo "Brand not found.";
                }
            } else {
                echo "Id is missing.";
            }
            ?>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>