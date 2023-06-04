<?php
session_start();

// username & password control
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // if username & password is correct login    admin123
    if ($username === 'admin' && password_verify($password, '$2y$10$tk2xtqnx2KboYeGNMj24S.AejxbpnzaTZG3jV2e.yHhumkGAuCau.')) {
        $_SESSION['admin'] = true;
        header('Location: admin_panel.php');
        exit();
    } else {
        $error = 'Invalid username or password';
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Login</title>
    <link rel="stylesheet" href="AdminCss/adminstyle.css">
</head>
<body>
<h1 style="text-align: center">Admin Login</h1>
<?php if (isset($error)) { ?>
    <p><?php echo $error; ?></p>
<?php } ?>
<form method="POST" action="" class="admin-login-table">
    <input type="text" name="username" placeholder="Username" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <button type="submit">Login</button>
</form>
</body>
</html>