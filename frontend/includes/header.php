<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="frontend/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="frontend/assets/css/owl.theme.default.min.css">
    <!-- Alertify -->
    <link rel="stylesheet" href="frontend/assets/css/alertify.min.css" />
    <link rel="stylesheet" href="frontend/assets/css/alertify.themes.bootstrap.min.css" />
    <!-- CSS -->
    <link rel="stylesheet" href="frontend/assets/css/style.css">
</head>

<body>
    <?php
    session_start();
    $page = substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1);
    if ($page == "login.php" || $page == "register.php") {
        include "middleware/user.php";
    }
    include('mini-navbar.php');
    include("navbar.php"); ?>