<?php
$Page = "rezervation";
include("inc/head.php");


// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "restaurant";

$conn = new mysqli( 'localhost', 'root', '', 'restaurant');
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

//Creating table
$sql_create_table = "CREATE TABLE IF NOT EXISTS reservations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100) NOT NULL,
    email_address VARCHAR(100) NOT NULL,
    total_person VARCHAR(50) NOT NULL,
    booking_date DATE NOT NULL,
    message TEXT
)";

if ($conn->query($sql_create_table) === FALSE) {
    echo "Error, table not created: " . $conn->error;
    $conn->close();
    exit;
}


// When the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullName = $_POST['full_name'];
    $emailAddress = $_POST['email_address'];
    $totalPerson = $_POST['total_person'];
    $bookingDate = $_POST['booking_date'];
    $message = $_POST['message'];

    // Inserting data
    $sql = "INSERT INTO reservations (full_name, email_address, total_person, booking_date, message)
            VALUES ('$fullName', '$emailAddress', '$totalPerson', '$bookingDate', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo '<div class="alert alert-success" role="alert">Reservation added successfully.</div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">Error adding reservation: ' . $conn->error . '</div>';
    }
}

$conn->close();


?>

<section class="rezervation" id="rezervation">
    <div class="rezervation-form">
        <form action="" method="post">
            <h1 class="footer-list-title">Book a Table</h1>
            <div class="input-wrapper">
                <input type="text" name="full_name" required placeholder="Your Name" aria-label="Your Name" class="input-field">

            </div>
            <div class="input-wrapper">
                <input type="email" name="email_address" required placeholder="Email" aria-label="Email" class="input-field">
            </div>
            <div class="input-wrapper">
                <select name="total_person" aria-label="Total person" class="input-field">
                    <option value="person">Person</option>
                    <option value="2 person">2 Person</option>
                    <option value="3 person">3 Person</option>
                    <option value="4 person">4 Person</option>
                    <option value="5 person">5 Person</option>
                </select>

                <input type="date" name="booking_date" aria-label="Reservation date" class="input-field">
            </div>
            <textarea name="message" required placeholder="Message" aria-label="Message" class="input-field"></textarea>
            <button type="submit" class="btn">Book a Table</button>
        </form>
    </div>
</section>



