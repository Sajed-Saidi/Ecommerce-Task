<?php
include "admin/includes/config/DAL.php";
$categories = getAll('categories');
include "frontend/includes/header.php";
?>
<div class="categories py-3 py-md-5">
    <div class="container">
        <h4 class="position-relative mb-5 d-flex align-items-center justify-content-between">
            <span class="underline"></span>
            Home > Categories
            <a href="index.php" class="btn btn-primary text-white">
                Back
            </a>
        </h4>
        <?php
        if (!$categories) {
            echo "Something went wrong.";
        } else { ?>
            <div class="owl-carousel owl-theme four-carousel">
                <?php
                if (mysqli_num_rows($categories) > 0) {
                    while ($row = mysqli_fetch_array($categories)) {
                ?>
                        <div class="item">
                            <a href="viewCategory.php?id=<?php echo $row['id'] ?>" class="text-dark text-decoration-none">
                                <div class="text-center fw-bold fs-4">
                                    <div class="popular-img">
                                        <img src="admin/images/<?php echo $row['image'] ?>" alt="">
                                    </div>
                                    <div>
                                        <?php echo $row['name'] ?>
                                    </div>
                                </div>
                            </a>
                        </div>
            <?php }
                } else {
                    echo "No popular found";
                }
                echo "</div>";
            } ?>
            </div>
    </div>
</div>
<?php
include "frontend/includes/footer.php";
?>