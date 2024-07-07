<?php include('includes/header.php');
include('includes/config/DAL.php');
$brands = getAll('brands');
?>
<div class="container-fluid py-4">
    <div class="row min-vh-80 h-100">
        <div class="col-12">
            <h4 class="d-flex align-items-center justify-content-between mb-3 pe-3">
                Add Product
                <a href="product.php" class="btn btn-primary text-white">
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
                <div class="px-3 py-1 bg-white mb-3 ">
                    Brand
                    <div class="form-floating">
                        <select required class="form-select" name="brand" id="floatingSelect">
                            <?php
                            if (!$brands) {
                                echo 'No brands found';
                            } else {
                                while ($row = $brands->fetch_assoc()) {
                            ?>
                                    <option value="<?php echo $row['name'] ?>"><?php echo $row['name'] ?></option>
                            <?php }
                            } ?>
                        </select>
                    </div>
                </div>
                <div class=" px-3 py-1 bg-white mb-3">
                    <div class="form-floating">
                        <input type="number" min=0 name="price" required class="form-control" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Price</label>
                    </div>
                </div>
                <div class=" px-3 py-1 bg-white mb-3">
                    <div class="form-floating">
                        <input type="number" min=0 name="quantity" required class="form-control" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Quantity</label>
                    </div>
                </div>
                <div class="px-3 py-2 bg-white mb-3">
                    <label class="d-block">Image</label>
                    <input type="file" name="image" required>
                </div>
                <div class="form-check">
                    <input class="form-check-input" name="featured" type="checkbox" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Featured
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" name="popular" type="checkbox" id="flexCheckChecked">
                    <label class="form-check-label" for="flexCheckChecked">
                        Popular
                    </label>
                </div>
                <div>
                    <button type="submit" class="btn btn-secondary text-white float-end" name="add_product">
                        Add
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>