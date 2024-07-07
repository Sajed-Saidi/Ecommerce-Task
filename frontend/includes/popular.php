<div class="overflow-hidden">
    <img src="admin/images/offer.png" class="img-fluid" alt="">
</div>
<?php $populars = getPopulars(); ?>
<!-- Popular -->
<div class="popular bg-light py-3 py-md-5">
    <div class="container">
        <h2 class="position-relative mb-5">
            <span class="underline"></span>
            Popular Search
        </h2>
        <?php
        if (!$populars) {
            echo "Something went wrong.";
        } else { ?>
            <div class="owl-carousel owl-theme four-carousel">
                <?php
                if (mysqli_num_rows($populars) > 0) {
                    while ($row = mysqli_fetch_array($populars)) {
                ?>
                        <div class="item">
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
                    echo "No popular found";
                }
                echo "</div>";
            } ?>
            </div>
    </div>
</div>