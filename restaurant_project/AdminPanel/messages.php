<?php

$Admin = "messages";
include("adminHead.php");

?>

<section class="manage-message" id="manage-message">
    <h3 class="sub-heading">Manage Messages</h3>
    <h1 class="heading-message">Message List</h1>

    <!-- List all orders here -->
    <div class="message-list">
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
        $sql = "SELECT * FROM contact";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Loop through each order and display the details

            echo "<table>";
            echo "<tr>";
            echo "<th>Message ID</th>";
            echo "<th>Full Name</th>";
            echo "<th>Email</th>";
            echo "<th>Message</th>";
            echo "</tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['full_name'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['message'] . "</td>";
                echo "</tr>";
            }

            echo "</table>";


        } else {
            echo "No messages found.";
        }

        $conn->close();
        ?>
    </div>
</section>


<?php
include("adminFooter.php");
?>
