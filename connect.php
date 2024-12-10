<?php
// Step 1: Connect to the Database
$servername = "localhost";  // Your database server (usually localhost)
$username = "root";         // Your database username
$password = "";             // Your database password (leave empty for local XAMPP)
$dbname = "portfolio";      // Your database name

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Step 2: Handle Form Data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Step 3: Insert data into the database
    $sql = "INSERT INTO contacts (name, email, number, subject, message) 
            VALUES ('$name', '$email', '$number', '$subject', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "Message sent successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the connection
    $conn->close();
}
?>
