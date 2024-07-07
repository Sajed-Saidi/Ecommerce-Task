<?php include('includes/header.php');
include('includes/config/DAL.php');
$brands = getAll('brands');
?>
<div class="container-fluid py-4">
    <div class="row min-vh-80 h-100">
        <div class="col-12">
            <h4 class="d-flex align-items-center justify-content-between mb-3 pe-3">
                Edit Product
                <a href="product.php" class="btn btn-primary text-white">
                    Back
                </a>
            </h4>
            <?php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $product = getId('products', $id, $conn);
                if (mysqli_num_rows($product) > 0) {
                    $product = mysqli_fetch_array($product);
            ?>
                    <form action="includes/config/BL.php" method="POST" class="px-3 py-1" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $product['id'] ?>">
                        <div class="px-3 py-1 bg-white mb-3">
                            <div class="form-floating">
                                <input type="text" name="name" value="<?php echo $product['name'] ?>" required class="form-control" id="floatingInput" placeholder="name@example.com">
                                <label for="floatingInput">Name</label>
                            </div>
                        </div>
                        <div class="px-3 py-1 bg-white mb-3">
                            <div class="form-floating">
                                <textarea class="form-control" required name="description" rows="3" cols="10" placeholder="Description" id="floatingTextarea"><?php echo $product['description'] ?></textarea>
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
                                            <option <?= $row['name'] == $product['brand'] ? "selected" : "" ?> value="<?php echo $row['name'] ?>"><?php echo $row['name'] ?></option>
                                    <?php }
                                    } ?>
                                </select>
                            </div>
                        </div>
                        <div class=" px-3 py-1 bg-white mb-3">
                            <div class="form-floating">
                                <input type="number" min=0 name="price" value="<?php echo $product['price'] ?>" required class="form-control" id="floatingInput" placeholder="name@example.com">
                                <label for="floatingInput">Price</label>
                            </div>
                        </div>
                        <div class=" px-3 py-1 bg-white mb-3">
                            <div class="form-floating">
                                <input type="number" min=0 name="quantity" value="<?php echo $product['quantity'] ?>" required class="form-control" id="floatingInput" placeholder="name@example.com">
                                <label for="floatingInput">Quantity</label>
                            </div>
                        </div>
                        <div class="px-3 py-2 bg-white mb-3">
                            <label class="d-block">Image</label>
                            <input type="file" name="image">
                            <input type="hidden" name="old_image" value="<?php echo $product['image']; ?>">
                            <img src="images/<?php echo $product['image'] ?>" width="60px" height="60px" alt="">
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="featured" <?= $product['featured'] == 1 ? "checked" : "" ?> type="checkbox" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Featured
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="popular" <?= $product['popular'] == 1 ? "checked" : "" ?> type="checkbox" id="flexCheckChecked">
                            <label class="form-check-label" for="flexCheckChecked">
                                Popular
                            </label>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-secondary text-white float-end" name="update_product">
                                Update
                            </button>
                        </div>
                    </form>
            <?php
                } else {
                    echo "Product Not Found.";
                }
            } else {
                echo "Id is missing.";
            }
            ?>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>