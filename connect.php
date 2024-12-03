<?php
require_once 'config/database.php';

// Function to sanitize input data
function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get and sanitize form data
    $name = sanitizeInput($_POST['name']);
    $email = sanitizeInput($_POST['email']);
    $phone = sanitizeInput($_POST['number']);
    $subject = sanitizeInput($_POST['subject']);
    $message = sanitizeInput($_POST['message']);
    
    // Get database connection
    $conn = getConnection();
    
    // Prepare SQL statement to prevent SQL injection
    $sql = "INSERT INTO buroti(ID, name, email, number, subject, message) VALUES ('[value-1]',$name, $email, $phone, $subject, $message)";
            
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $name, $email, $phone, $subject, $message);
    
    // Execute the statement and check if successful
    if ($stmt->execute()) {
        echo "<script>
                alert('Message sent successfully!');
                window.location.href = 'index.html';
              </script>";
    } else {
        echo "<script>
                alert('Error: " . $stmt->error . "');
                window.location.href = 'index.html';
              </script>";
    }
    
    // Close statement and connection
    $stmt->close();
    $conn->close();
}