<footer class="py-3 py-md-5 bg-primary text-white">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h4>About Viotech</h4>
                <p class="my-3">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident exercitationem excepturi eum, laboriosam cum quidem temporibus doloribus repellendus adipisci. Quisquam quae autem culpa explicabo optio itaque vero provident reiciendis maiores!
                </p>
                <div class="d-flex align-items-center gap-2 my-3">
                    <i class="fa-brands fa-facebook"></i>
                    <i class="fa-brands fa-instagram"></i>
                    <i class="fa-brands fa-twitter"></i>
                    <i class="fa-brands fa-google"></i>
                </div>
            </div>
            <div class="col-md-4">
                <h4>Pages</h4>
                <div class="my-3">
                    <div class="mb-3">
                        <i class="fa-solid fa-angles-right mr-2"></i>
                        <a href="#" class="text-white text-decoration-none">Home</a>
                    </div>
                    <div class="mb-3">
                        <i class="fa-solid fa-angles-right mr-2"></i>
                        <a href="#about" class="text-white text-decoration-none">About</a>
                    </div>
                    <div>
                        <i class="fa-solid fa-angles-right mr-2"></i>
                        <a href="#contact" class="text-white text-decoration-none">Contact</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <h4>Links</h4>
                <div class="my-3">
                    <div class="mb-3">
                        <i class="fa-solid fa-home"></i> Lebanon, Tyre - Jwaya main street
                    </div>
                    <div class="mb-3">
                        <i class="fa-solid fa-envelope"></i> viotech@gmail.com
                    </div>
                    <div>
                        <i class="fa-brands fa-phone"></i> +961 89 889 873
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="frontend/assets/js/jquery-3.1.1.min.js"></script>
<script src="frontend/assets/js/owl.carousel.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script>
    $('.four-carousel').owlCarousel({
        loop: true,
        margin: 10,
        dots: true,
        nav: false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 4
            }
        }
    })
</script>
<script src="frontend/assets/js/alertify.min.js"></script>

<?php if (isset($_SESSION['message'])) : ?>
    <script>
        alertify.set('notifier', 'position', 'top-right');
        alertify.success('<?php echo $_SESSION['message']; ?>');
    </script>
    <?php unset($_SESSION['message']); ?>
<?php endif; ?>

</body>

</html>