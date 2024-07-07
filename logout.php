<?php
session_start();
include('admin/functions.php');

if (isset($_SESSION['auth'])) {
    unset($_SESSION['auth']);
    unset($_SESSION['auth_user']);
    redirect("index.php", "Logout Successfully!");
} else {
    redirect("index.php", "");
}
