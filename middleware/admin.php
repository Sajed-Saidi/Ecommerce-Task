<?php
include "functions.php";
if (!isset($_SESSION['auth']) || (isset($_SESSION['auth']) && $_SESSION['auth_user']['role'] != "admin")) {
    redirect("../index.php", "Only admins have access!");
}
