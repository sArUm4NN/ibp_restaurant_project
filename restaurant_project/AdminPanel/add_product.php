<?php
$Admin = "add_product";
include("adminHead.php");

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "restaurant";

$conn = new mysqli('localhost', 'root', '', 'restaurant');
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_name = $_POST['product_name'];
    $product_description = $_POST['product_description'];
    $product_price = $_POST['product_price'];

    // Check if a file is selected
    if (isset($_FILES['product_image'])) {
        $file_name = $_FILES['product_image']['name'];
        $file_tmp = $_FILES['product_image']['tmp_name'];
        $file_type = $_FILES['product_image']['type'];
        $file_size = $_FILES['product_image']['size'];
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        // Define allowed file extensions
        $allowed_extensions = array("jpg", "jpeg", "png");

        // Check if the file extension is allowed
        if (in_array($file_ext, $allowed_extensions)) {
            // Set the file destination path
            $file_destination = "images/" . $product_name . "." . $file_ext;

            // Move the uploaded file to the destination directory
            if (move_uploaded_file($file_tmp, $file_destination)) {
                // File upload successful, proceed with inserting data into the database
                $sql_insert_product = "INSERT INTO meals (name, price, image) VALUES ('$product_name', $product_price, '$file_destination')";
                if ($conn->query($sql_insert_product) === TRUE) {
                    echo '<div class="alert alert-success" role="alert">Product added successfully.</div>';
                } else {
                    echo '<div class="alert alert-danger" role="alert">Error adding product: ' . $conn->error . '</div>';
                }
            } else {
                echo '<div class="alert alert-danger" role="alert">Error uploading file.</div>';
            }
        } else {
            echo '<div class="alert alert-danger" role="alert">Invalid file extension. Only JPG, JPEG, and PNG files are allowed.</div>';
        }
    }
}

$conn->close();

/*header("Location: ../menu.php");
exit();*/
?>

<section class="add-product" id="add-product">
    <h3 class="sub-heading">Add Product</h3>
    <div>
        <h1 class="heading-product" >Add a New Product</h1>
    </div><br><br><br>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data" class="product-form">
        <div class="form-group">
            <input type="text" name="product_name"  required>
            <label for="product_name">Product Name</label>
        </div>
        <div class="form-group">
            <textarea name="product_description"  required></textarea>
            <label for="product_description">Product Description</label>
        </div>
        <div class="form-group">
            <input type="number" name="product_price"  required>
            <label for="product_price">Product Price</label>
        </div>
        <div class="form-group">
            <input type="file" name="product_image" accept="image/jpeg, image/png" required>
            <label for="product_image"></label>
        </div>
        <div class="form-group">
            <button class="add-product-button" type="submit">Add Product</button>
        </div>
    </form>



</section>

<?php
include("adminFooter.php");
?>

