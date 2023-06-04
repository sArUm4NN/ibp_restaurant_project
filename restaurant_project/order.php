<?php
$Page = "order";
include("inc/head.php");


$servername = "localhost";
$username = "root";
$password = "";
$Dbname = "restaurant";

// Db Connection
$conn = new mysqli('localhost', 'root', '', 'restaurant');

//Checking connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


//Creating table

$sql_create_table = "CREATE TABLE IF NOT EXISTS orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    customer_name VARCHAR(100) NOT NULL,
    phone_number VARCHAR(100) NOT NULL,
    food_name VARCHAR(100) NOT NULL,
    quantity INT NOT NULL,
    Order_Date DATE NOT NULL,
    address VARCHAR(100) NOT NULL
)";

if ($conn->query($sql_create_table) === FALSE) {
    echo "Error, table not created: " . $conn->error;
    $conn->close();
    exit;
}


// When the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $customerName = $_POST['customer_name'];
    $phone_number = $_POST['phone_number'];
    $foodName = $_POST['food_name'];
    $quantity = $_POST['quantity'];
    $Order_Date = $_POST['Order_Date'];
    $address = $_POST['address'];


//Inserting data's
    $sql = "INSERT INTO orders (customer_name, phone_number, food_name, quantity, Order_Date, address)
        VALUES ('$customerName','$phone_number','$foodName', '$quantity', '$Order_Date', '$address' )";

    if ($conn->query($sql) === TRUE) {
        echo '<div class="alert alert-success" role="alert">Sipariş başarıyla eklendi.</div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">Sipariş eklenirken bir hata oluştu: ' . $conn->error . '</div>';
    }
}

$conn->close();
?>


<section class="order" id="order">
    <h3 class="sub-heading">order now</h3>
    <h1 class="heading">free and fast</h1>

    <form action="" method="post">
        <div class="inputBox">
            <div class="input">
                <span>your name</span>
                <input type="text" name="customer_name" placeholder="enter your name" required><br>
                <input type="number" name="phone_number" placeholder="enter your number" required><br>
                <span>additional food</span>
                <input type="text" name="food_name" placeholder="Food Name" required><br>
                <span>how much</span>
                <input type="number" name="quantity" placeholder="how many orders" required><br>
                <span>date and time</span>
                <input type="date" name="Order_Date" required><br>
                <span>your address</span>
                <textarea name="address" placeholder="enter your address" cols="30" rows="10"></textarea>
            </div>
        </div>
        <button class="btn">order now</button>
    </form>
</section>


    </form>
</section>



<?php

include("inc/footer.php");

?>
