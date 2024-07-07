<?php $categories = get3Categories(); ?>
<div class="categories py-3 py-md-5">
    <div class="container">
        <h2 class="position-relative mb-5 d-flex align-items-center justify-content-between">
            <span class="underline"></span>
            Categories
            <a href="categories.php" class="btn btn-primary text-white">
                View More
            </a>
        </h2>
        <?php
        if (!$categories) {
            echo "Something went wrong.";
        } else { ?>
            <div class="row">
                <?php
                if (mysqli_num_rows($categories) > 0) {
                    while ($row = mysqli_fetch_array($categories)) {
                ?>
                        <div class="col-md-4 text-center fw-bold fs-4">
                            <a href="viewCategory.php?id=<?php echo $row['id'] ?>" class="text-dark text-decoration-none">
                                <div class="popular-img">
                                    <img src="admin/images/<?php echo $row['image'] ?>" alt="">
                                </div>
                                <div>
                                    <?php echo $row['name'] ?>
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