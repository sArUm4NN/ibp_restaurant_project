<?php
$Page = "contact";
include("inc/head.php");

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "restaurant";

// Db Connection
$conn = new mysqli('localhost', 'root', '', 'restaurant');

// Checking connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Creating table
$sql_create_table = "CREATE TABLE IF NOT EXISTS contact (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    message VARCHAR(1000) NOT NULL
)";

if ($conn->query($sql_create_table) === FALSE) {
    echo "Error, table not created: " . $conn->error;
    $conn->close();
    exit;
}

// When the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Inserting data
    $sql = "INSERT INTO contact (full_name, email, message)
        VALUES ('$full_name','$email','$message')";

    if ($conn->query($sql) === TRUE) {
        echo '<div class="alert alert-success" role="alert">Mesajınız başarıyla iletildi.</div> ';
    } else {
        echo '<div class="alert alert-danger" role="alert">Mesajınız iletilirken bir hata oluştu: ' . $conn->error . '</div>';
    }
}

$conn->close();
?>

<section class="contact" id="contact">
    <div class="heading">
        <h2>Contact Us</h2>
        <div class="contact-container">
            <form action="" method="post">
                <label>Full_Name:</label>
                <input type="text" name="full_name" placeholder="Your Full Name" required><br>
                <label>Email:</label>
                <input type="text" name="email" placeholder="Your Email" required><br><br>
                <textarea name="message" id="message" cols="30" rows="10" placeholder="Your Message"></textarea>
                <input type="submit" value="Send Your Message">
            </form>
        </div>
    </div>
</section>

<?php
include("inc/footer.php");
?>


