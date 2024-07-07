<?php
include "admin/includes/config/DAL.php";
include "frontend/includes/header.php";
?>
<main class="py-3 py-md-5 bg-light " style="min-height: 300px">
    <div class="container">
        <h4 class="position-relative mb-5 d-flex align-items-center justify-content-between">
            <span class="underline"></span>
            Home > Product
            <a href="index.php" class="btn btn-primary text-white">
                Back
            </a>
        </h4>
        <?php if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $product = getId('products', $id);

            if (mysqli_num_rows($product) > 0) {
                $product = mysqli_fetch_array($product);
        ?>
                <div class="row">
                    <div class="col-md-6">
                        <img src="admin/images/<?php echo $product['image'] ?>" class="img-fluid" alt="">
                    </div>
                    <div class="col-md-6">
                        <h1 class="position-relative mb-4">
                            <?php echo $product['name'] ?>
                            <span class="underline"></span>
                        </h1>
                        <p class="fs-4"><?php echo $product['description'] ?></p>
                        <h4>
                            Price : $<?php echo $product['price'] ?>
                        </h4>
                        <h4>
                            Quantity : <?php echo $product['quantity'] ?>
                        </h4>
                        <h6>
                            <?php echo $product['featured'] == 1 ? "Featured" : "" ?>
                        </h6>
                        <h6>
                            <?php echo $product['popular'] == 1 ? "Popular" : "" ?>
                        </h6>
                        <div class="mt-4">
                            <button class="btn btn-outline-primary ">
                                <i class="fa-solid fa-heart"></i> Add to Wishlist
                            </button>
                            <button class="btn btn-primary text-white">
                                <i class="fa-solid fa-shopping-cart"></i> Add to Cart
                            </button>
                        </div>
                    </div>
                </div>
        <?php
            } else {
                echo "Product not found";
            }
        } else {
            echo "Id missing.";
        } ?>
    </div>
</main>
<?php
include "frontend/includes/footer.php";
?>