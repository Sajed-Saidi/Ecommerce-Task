<?php
include "admin/functions.php";
if (isset($_SESSION['auth'])) {
    redirect("index.php", "Already logged in.");
}
