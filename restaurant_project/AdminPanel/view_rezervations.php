<?php
$Admin = "view_reservations";
include("adminHead.php");
?>

<section class="view-reservations" id="view-reservations">
    <h3 class="sub-heading">View Reservations</h3>
    <h1 class="heading-reservation">Customer Reservations</h1>

    <!-- List all reservations here -->
    <div class="reservation-list">
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

        // Retrieve reservations from the database
        $sql = "SELECT * FROM reservations";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Loop through each reservation and display the details

            echo "<table>";
            echo "<tr>";
            echo "<th>Reservation ID</th>";
            echo "<th>Customer Name</th>";
            echo "<th>Email</th>";
            echo "<th>Total Person</th>";
            echo "<th>Reservation Date</th>";
            echo "<th>Message</th>";
            echo "</tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['full_name'] . "</td>";
                echo "<td>" . $row['email_address'] . "</td>";
                echo "<td>" . $row['total_person'] . "</td>";
                echo "<td>" . $row['booking_date'] . "</td>";
                echo "<td>" . $row['message'] . "</td>";
                echo "</tr>";
            }

            echo "</table>";


        } else {
            echo "No reservations found.";
        }

        $conn->close();
        ?>
    </div>
</section>

<?php
include("adminFooter.php");
?>
