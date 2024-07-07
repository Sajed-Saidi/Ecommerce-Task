<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="#">
            <i class="fa-solid fa-truck-ramp-box"></i>
            Viotech</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?php if ($page == 'index.php') { ?>active<?php } ?>" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($page == 'categories.php') { ?>active<?php } ?>" href="categories.php">
                        Categories
                    </a>
                </li>

                <?php if ($page == 'index.php') { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">
                            About
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact Us</a>
                    </li>
                <?php } ?>
                <?php if (isset($_SESSION['auth']) && ($_SESSION['auth_user']['role'] == "admin")) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="admin/index.php">
                            Admin Panel
                        </a>
                    </li>
                <?php } ?>
            </ul>
            <div class="d-flex">
                <div class="d-flex form-control me-2 text-secondary align-items-center gap-1    ">
                    <label for="search"><i class="fa-solid fa-magnifying-glass"></i></label>
                    <input style="outline: none;border: none;" type="search" id="search" placeholder="Search" aria-label="Search">
                </div>
                <?php
                if (!isset($_SESSION['auth'])) { ?>
                    <a href="register.php" class="btn btn-outline-primary me-1">Register</a>
                    <a href="login.php" class="btn btn-primary text-white">Login</a>
                <?php } else {
                ?>
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?= $_SESSION['auth_user']['name'] ?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Account</a></li>
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                        </ul>
                    </div>
                <?php
                } ?>
            </div>
        </div>
    </div>
</nav>