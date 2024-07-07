<?php
include "admin/includes/config/DAL.php";
include "frontend/includes/header.php";
?>

<main class="bg-light py-3 py-md-5" style="min-height: 300px;">
    <div class="container">
        <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $category = getId('categories', $id);
            if (mysqli_num_rows($category) > 0) {
                $category = mysqli_fetch_array($category);
        ?>
                <h4 class="position-relative mb-4">
                    <?php echo 'Home > Category > ' . $category['name'] ?>
                    <span class="underline"></span>
                </h4>
                <?php
                $brands = getBrandsOfCategory($id);
                if (mysqli_num_rows($brands) > 0) {
                    $allProducts;
                    $checked = [];
                    $featuredChecked = false;
                    $popularChecked = false;
                    $priceRange = false;
                    $sql = "SELECT products.* from products INNER JOIN brands where products.brand = brands.name
                    AND brands.category_id = " . $category['id'] . " ";
                    if (isset($_GET['brands'])) {
                        $checked = $_GET['brands'];
                        $brandsChecked = $_GET['brands'];
                        $brandsString = "";
                        foreach ($brandsChecked as $rowBrand) {
                            $brandsString = $brandsString . ($rowBrand) . ",";
                        }
                        $brandsString = substr($brandsString, 0, -1);
                        $sql .= " AND brands.id IN (" . $brandsString . ")";
                    }
                    if (isset($_GET['featured']) && ($_GET['featured'] == 'on')) {
                        $featuredChecked = $_GET['featured'];
                        $sql .= " AND products.featured = " . 1 . " ";
                    }
                    if (isset($_GET['popular']) && ($_GET['popular'] == 'on')) {
                        $popularChecked = $_GET['popular'];
                        $sql .= " AND products.popular  = " . 1 . " ";
                    }
                    if (isset($_GET['price_range'])) {
                        $priceRange = $_GET['price_range'];
                        if ($priceRange == "high-to-low") {
                            $sql .= " ORDER BY products.price DESC";
                        } else {
                            $sql .= " ORDER BY products.price ASC";
                        }
                    }
                    $allProducts = getQuery($sql);
                ?>
                    <div class="row">
                        <div class="col-md-4">
                            <form action="" method="GET">
                                <input type="hidden" name="id" value="<?= $category['id'] ?>">
                                <div class="card">
                                    <div class="card-header d-flex align-items-center justify-content-between">
                                        Filter Products
                                        <button type="submit" class="btn btn-primary text-white">
                                            Search
                                        </button>
                                    </div>
                                    <div class="card-body">
                                        <div>
                                            <h5>
                                                Brands
                                            </h5>
                                            <?php
                                            while ($row = mysqli_fetch_array($brands)) {
                                            ?>
                                                <div class="d-flex flex-column">
                                                    <div class="form-check">
                                                        <input class="form-check-input" value="<?= $row['id'] ?>" name="brands[]" type="checkbox" <?php if (in_array($row['id'], $checked)) {
                                                                                                                                                        echo "checked";
                                                                                                                                                    } ?> id="<?php echo $row['name'] ?>">
                                                        <label class="form-check-label" for="<?php echo $row['name'] ?>">
                                                            <?php echo $row['name'] ?>
                                                        </label>
                                                    </div>
                                                </div>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                        <div class="position-relative mb-4">
                                        </div>
                                        <div class="d-flex gap-4">
                                            <div class="form-check">
                                                <input class="form-check-input" name="featured" <?php if ($featuredChecked == 'on') {
                                                                                                    echo "checked";
                                                                                                } ?> type="checkbox" id="featured">
                                                <label class="form-check-label" for="featured">
                                                    Featured
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" name="popular" <?php if ($popularChecked == 'on') {
                                                                                                    echo "checked";
                                                                                                } ?> type="checkbox" id="popular">
                                                <label class="form-check-label" for="popular">
                                                    Popular
                                                </label>
                                            </div>
                                        </div>
                                        <div class="position-relative mb-4">
                                        </div>
                                        <div class="d-flex gap-4">
                                            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                                <input type="radio" class="btn-check high-to-low" <?php if ($priceRange == "high-to-low") {
                                                                                                        echo "checked";
                                                                                                    } ?> value="high-to-low" name=" price_range" id="btnradio1" autocomplete="off" checked>
                                                <label class="btn btn-outline-primary" for="btnradio1">High to Low</label>

                                                <input type="radio" class="btn-check low-to-high" <?php if ($priceRange == "low-to-high") {
                                                                                                        echo "checked";
                                                                                                    } ?> value="low-to-high" name=" price_range" id="btnradio2" autocomplete="off">
                                                <label class="btn btn-outline-primary" for="btnradio2">Low to High</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-8">
                            <div class="card">

                                <div class="card-body">
                                    <?php
                                    if (!$allProducts) {
                                        echo "No products found.";
                                    } else { ?>
                                        <div class="row">
                                            <?php
                                            if (mysqli_fetch_array($allProducts) > 0) {
                                                foreach ($allProducts as $row) {
                                            ?>
                                                    <div class="col-md-4 mb-3">
                                                        <a href="viewProduct.php?id=<?php echo $row['id'] ?>" class="text-decoration-none text-dark">
                                                            <div class="card">
                                                                <div class="popular-img">
                                                                    <img src="admin/images/<?php echo $row['image'] ?>" alt="">
                                                                </div>
                                                                <div class="px-4">
                                                                    <h5>
                                                                        <?php echo $row['name'] ?>
                                                                    </h5>
                                                                    <p style="font-size: 14px;">
                                                                        <?php echo $row['brand'] ?>
                                                                    </p>
                                                                </div>
                                                                <div class="card-body d-flex align-items-center justify-content-between text-primary p-3">
                                                                    <div class="price test-primary fs-5 fw-bold">
                                                                        $
                                                                        <?php echo $row['price'] ?>
                                                                    </div>
                                                                    <div class="review">
                                                                        <i class="fa-solid fa-star"></i>
                                                                        <i class="fa-solid fa-star"></i>
                                                                        <i class="fa-solid fa-star"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                        <?php }
                                            } else {
                                                echo "No products found";
                                            }
                                            echo "</div>";
                                        } ?>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
        <?php
                } else {
                    echo "<h3>Category " . $category['name'] . " has no brands.</h3>";
                }
            } else {
                echo "<h3>Category not found.</h3>";
            }
        } else {
            echo "<h3>Id not entered.</h3>";
        }
        ?>
    </div>
</main>

<?php include "frontend/includes/footer.php" ?>