<?php
include "frontend/includes/header.php";
?>

<main class="py-3 py-md-5 ">
    <div class="container">
        <div class="w-50 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4 class="position-relative mb-3">
                        Register
                        <span class="underline"></span>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="admin/includes/config/BL.php" method="POST">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="fa-solid fa-user"></i>
                            </span>
                            <input type="text" class="form-control" required name="name" placeholder="Name" aria-label="Name" aria-describedby="basic-addon1">
                        </div>
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
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="fa-solid fa-lock"></i>
                            </span>
                            <input type="password" class="form-control" required name="confirm_password" placeholder="Confirm Password" aria-label="Confirm Password" aria-describedby="basic-addon1">
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <div style="font-size: 15px;">
                                Already have an account? <a href="login.php">Login</a>
                            </div>
                            <button type="submit" name="register_btn" class="btn btn-primary text-white">
                                Register
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include "frontend/includes/footer.php"; ?>