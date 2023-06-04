<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $Page ?>Restaurant</title>

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
</head>
<body>

<!-- Navbar -->
<header>
    <a href="index.php" class="logo"><img src="images/logo.png" alt="">YBY Restaurant</a>

    <div class="bx bx-menu" id="menu-icon"></div>

    <ul class="navbar">
        <li><a href="index.php" <?php if($Page=="home") echo "active"?>>Home</a></li>
        <li><a href="menu.php"<?php if($Page=="menu") echo "active"?>>Menu</a></li>
        <li><a href="order.php"<?php if($Page=="order") echo "active"?>target="_blank">Order</a></li>
        <li><a href="rezervation.php"<?php if($Page=="rezervation") echo "active"?> target="_blank">rezervation</a></li>
        <li><a href="contact.php"<?php if($Page=="contact") echo "active"?> target="_blank">Contact</a></li>
        <li><a href="logout.php"<?php if($Page=="logout") echo "active"?> target="_blank">Logout</a></li>

    </ul>
    <div class="icons">
        <a href="login.php" class="fas fa-user-alt" target="_blank"></a>
    </div>
</header>

