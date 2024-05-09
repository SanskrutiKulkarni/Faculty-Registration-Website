<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
    <!-- You can link your CSS stylesheets or include any necessary CSS here -->
</head>
<body>
    <h1>User Details</h1>
    <div>
        <?php
        // Database connection details
        $servername = "localhost"; // Change this if your database is hosted elsewhere
        $username = "root"; // Change this to your database username
        $password = ""; // Change this to your database password
        $dbname = "test"; // Change this to your database name

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // SQL query to fetch data
        $sql = "SELECT firstname, lastname, email, caste FROM registration WHERE firstname = 'Ravina' AND lastname = 'Budania' AND lastname = 'Good'";

        $result = $conn->query($sql);

        // Display fetched data
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<p><strong>First Name:</strong> " . $row["firstname"]. "</p>";
                echo "<p><strong>Last Name:</strong> " . $row["lastname"]. "</p>";
                echo "<p><strong>Email:</strong> " . $row["email"]. "</p>";
                echo "<p><strong>Caste:</strong> " . $row["caste"]. "</p>";
            }
        } else {
            echo "No records found";
        }

        // Close connection
        $conn->close();
        ?>
    </div>
    <!-- You can add additional HTML content or elements here -->
</body>
</html>
