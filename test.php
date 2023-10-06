<!DOCTYPE html>
<html>
<head>
    <title>PHP Test Page</title>
</head>
<body>
    <h1>Welcome to the PHP Test Page</h1>
    
    <?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    // Check if a POST request was made
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve the "name" field from the form
        $name = $_POST["name"];
        
        // Connect to the MySQL database
        $db_host = "localhost";
        $db_user = "myuser"; // Replace with your database username
        $db_pass = "mypassword"; // Replace with your database password
        $db_name = "myloginapp"; // Replace with your database name

        $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Insert the name into the "users" table
        $sql = "INSERT INTO users (name) VALUES ('$name')";
        if (mysqli_query($conn, $sql)) {
            echo "<p>Successfully added '$name' to the database.</p>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        // Close the database connection
        mysqli_close($conn);
    }
    ?>

    <h2>Names in the Database:</h2>
    <?php
    // Connect to the database again to retrieve names
    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Retrieve names from the "users" table
    $sql = "SELECT name FROM users";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<ul>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<li>" . $row["name"] . "</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>No names in the database yet.</p>";
    }

    // Close the database connection
    mysqli_close($conn);
    ?>

    <p>This is a PHP page that interacts with a MySQL database.</p>
</body>
</html>
