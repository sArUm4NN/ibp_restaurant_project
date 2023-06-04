<?php

$Admin = "admin_panel";
include("adminHead.php");

?>

    <section class="manage-orders" id="manage-orders">
        <h3 class="sub-heading">Manage Orders</h3>
        <div>
        <h1 class="order-listt">Order List</h1>
        </div>

        <!-- List all orders here -->
        <div class="order-list">
            <?php
            // Database connection
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "restaurant";

            $conn = new mysqli('localhost', 'root', '', 'restaurant');
            if ($conn->connect_error) {
                die("Database connection failed: " . $conn->connect_error);
            }

            // Retrieve orders from the database
            $sql = "SELECT * FROM orders";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {


                echo "<table>";
                echo "<tr>";
                echo "<th>ID</th>";
                echo "<th>Customer Name</th>";
                echo "<th>Phone Number</th>";
                echo "<th>Food Name</th>";
                echo "<th>Quantity</th>";
                echo "<th>Order Date</th>";
                echo "<th>Address</th>";
                echo "</tr>";

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['customer_name'] . "</td>";
                    echo "<td>" . $row['phone_number'] . "</td>";
                    echo "<td>" . $row['food_name'] . "</td>";
                    echo "<td>" . $row['quantity'] . "</td>";
                    echo "<td>" . $row['Order_Date'] . "</td>";
                    echo "<td>" . $row['address'] . "</td>";
                    echo "</tr>";
                }

                echo "</table>";

            } else {
                echo "No orders found.";
            }

            $conn->close();
            ?>
        </div>
    </section>


<?php
include("adminFooter.php");
?>