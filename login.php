<?php
include "frontend/includes/header.php";
?>

<main class="py-3 py-md-5 ">
    <div class="container">
        <div class="w-50 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4 class="position-relative mb-3">
                        Login
                        <span class="underline"></span>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="admin/includes/config/BL.php" method="POST">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="fa-solid fa-envelope"></i>
                            </span>
                            <input type="email" class="form-control" required name="email" placeholder="Email" aria-label="Email" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="fa-solid fa-lock"></i>
                            </span>
                            <input type="password" class="form-control" required name="password" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1">
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <div style="font-size: 15px;">
                                Don't have an account? <a href="register.php">Register</a>
                            </div>
                            <button type="submit" name="login_btn" class="btn btn-primary text-white">
                                Login
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include "frontend/includes/footer.php"; ?>