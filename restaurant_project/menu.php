<?php

$Page = "menu";
include("inc/head.php");


// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "restaurant";

$conn = new mysqli('localhost', 'root', '', 'restaurant');
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

// Creating table
$sql_create_table = "CREATE TABLE IF NOT EXISTS meals (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    image VARCHAR(100) NOT NULL
)";

if ($conn->query($sql_create_table) === FALSE) {
    echo "Error, table not created: " . $conn->error;
    $conn->close();
    exit;
}

// Inserting data
$sql_insert_data = "INSERT INTO meals (name, price, image)
VALUES ('Green salads', '12.4', 'images/salad.png'),
       ('Pizza', '12.4', 'images/pizza.png'),
       ('Rousted Beef', '12.4', 'images/beef.png'),
       ('ÇiğKöfte', '12.4', 'images/çiğ.png')";



$conn->close();


?>

<!-- Menu Sec -->

<section class="menu" id="menu">
    <h1>Today's Meals</h1>
    <!-- Box-1  -->
    <div class="menu-container">
        <div class="menu-box">
            <div class="box-img">
                <img src="images/salad.png" alt="">
            </div>
            <h3>Green salads</h3>
            <h2>$ 12.4</h2>
            <a href="order.php" class="btn">Order Now!</a>
        </div>
    </div>

    <!-- Box-2  -->
    <div class="menu-container">
        <div class="menu-box">
            <div class="box-img">
                <img src="images/pizza.png" alt="">
            </div>
            <h3>Pizza</h3>
            <h2>$ 12.4</h2>
            <a href="order.php" class="btn">Order Now!</a>
        </div>
    </div>

    <!-- Box-3  -->
    <div class="menu-container">
        <div class="menu-box">
            <div class="box-img">
                <img src="images/beef.png" alt="">
            </div>
            <h3>Rousted Beef</h3>
            <h2>$ 12.4</h2>
            <a href="order.php" class="btn">Order Now!</a>
        </div>
    </div>


    <!-- Box-4  -->
    <div class="menu-container">
        <div class="menu-box">
            <div class="box-img">
                <img src="images/çiğ.png" alt="">
            </div>
            <h3>ÇiğKöfte</h3>
            <h2>$ 12.4</h2>
            <a href="order.php" class="btn" target="_blank">Order Now!</a>
        </div>
    </div>

</section>

<?php
include("inc/footer.php");

?>

