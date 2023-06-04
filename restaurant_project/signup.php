<?php
// Veritabanı bağlantısı için gerekli bilgiler
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "restaurant";

// Veritabanı bağlantısını oluştur
$conn = new mysqli('localhost', 'root', '', 'restaurant');

// Bağlantıyı kontrol et
if ($conn->connect_error) {
    die("Bağlantı hatası: " . $conn->connect_error);
}

// Signup formu gönderildiğinde çalışacak kod
if (isset($_POST['signup-submit'])) {
    $username = $_POST['uid'];
    $email = $_POST['mail'];
    $password = $_POST['pwd'];
    $passwordRepeat = $_POST['pwd-repeat'];

    $sql_create_table = "CREATE TABLE IF NOT EXISTS signup (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(100) NOT NULL
)";

    if ($conn->query($sql_create_table) === FALSE) {
        echo "Error, table not created: " . $conn->error;
        $conn->close();
        exit;
    }

    // Parola tekrarı kontrolü
    if ($password !== $passwordRepeat) {
        echo '<div class="alert alert-success" role="alert">Password does not match.</div>';
        exit();
    }

    // Parolanın hashlenmesi
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Kayıt verilerini veritabanına ekle
    $sql = "INSERT INTO signup (username, email, password) VALUES ('$username', '$email', '$hashedPassword')";
    if ($conn->query($sql) === TRUE) {
        echo '<div class="alert alert-success" role="alert">You signed up successfully.</div>';
    } else {
        echo '<div class="alert alert-success" role="alert">Registration error.</div>' . $conn->error;
    }
}


$conn->close();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/login_logout.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
<section class="sign-up">
    <h1 style="text-align: center">Signup</h1>


    <form action="" method="post">
        <div class="container" style="width: 50%">

            <input type="text" class="form-control" name="uid" placeholder="Username">


            <input type="text" class="form-control" name="mail" placeholder="E-mail">


            <input type="password" class="form-control" name="pwd" placeholder="Password">


            <input type="password" class="form-control" name="pwd-repeat" placeholder="Repeat password"><br><br>

            <div class="text-center">
                <button type="submit" class="btn btn-primary" name="signup-submit">Signup</button>
            </div>

        </div>
    </form>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</body>
</html>