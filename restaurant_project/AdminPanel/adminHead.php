<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $Admin ?>Restaurant</title>

    <link rel="stylesheet" href="AdminCss/adminstyle.css">
   <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet"
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
</head>
<body>

<!-- Navbar -->
<header>
    <a href="#" class="logo"><img src="../images/logo.png" alt="">YBY Restaurant Admin Panel</a>

    <div class="admin-panel" id="admin-panel"></div>

    <ul class="navbar">
        <li><a href="admin_panel.php" <?php if ($Admin == "admin_panel") echo "active" ?> target="_blank">Manage Orders</a></li>
        <li><a href="add_product.php"<?php if ($Admin == "add_product") echo "active" ?> target="_blank">Add Product</a></li>
        <li><a href="messages.php" <?php if ($Admin == "messages") echo "active" ?>target="_blank">View Messages</a>
        </li>
        <li><a href="view_rezervations.php"<?php if ($Admin == "view_rezervations") echo "active" ?> target="_blank">View
                Reservations</a></li>

    </ul>
    <div class="icons">
        <a href="login.php" class="fas fa-user-alt" target="_blank"></a>
    </div>
</header>


