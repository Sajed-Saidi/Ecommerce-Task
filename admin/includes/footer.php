<footer class="footer pt-5">
    <div class="container-fluid">
        <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
                <div class="copyright text-center text-sm text-muted text-lg-start">
                    © <script>
                        document.write(new Date().getFullYear())
                    </script>,
                    made with <i class="fa fa-heart"></i> by
                    <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative Tim</a>
                    for a better web.
                </div>
            </div>
            <div class="col-lg-12">
                <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                    <li class="nav-item">
                        <a href="#" class="nav-link pe-0 text-muted" target="_blank">
                            About
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
</main>

<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/perfect-scrollbar.min.js"></script>
<script src="assets/js/smooth-scrollbar.min.js"></script>
<script src="assets/js/smooth-scrollbar.min.js"></script>
<script src="../frontend/assets/js/alertify.min.js"></script>
<script>
    var win = navigator.platform.indexOf("Win") > -1;
    if (win && document.querySelector("#sidenav-scrollbar")) {
        var options = {
            damping: "0.5",
        };
        Scrollbar.init(document.querySelector("#sidenav-scrollbar"), options);
    }
</script>
<script src="assets/js/material-dashboard.min.js"></script>
<?php if (isset($_SESSION['message'])) : ?>
    <script>
        alertify.set('notifier', 'position', 'top-right');
        alertify.success('<?php echo $_SESSION['message']; ?>');
    </script>
    <?php unset($_SESSION['message']); ?>
<?php endif; ?>

</body>

</html>