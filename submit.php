<?php
$servername = "localhost";
$username = "root";   // default for XAMPP
$password = "";       // default for XAMPP
$dbname = "elegant_db";  // ✅ make sure this matches your phpMyAdmin database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    header("Location: 2440242-ESE2Project.html?status=error&msg=Database+connection+failed");
    exit();
}

// Collect form data
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$inquiry = $_POST['inquiry'];
$message = $_POST['message'];

// Insert into database
$sql = "INSERT INTO contacts (name, email, subject, inquiry, message)
        VALUES ('$name', '$email', '$subject', '$inquiry', '$message')";

if ($conn->query($sql) === TRUE) {
    header("Location: 2440242-ESE2Project.html?status=success&msg=Your+message+was+sent+successfully");
} else {
    header("Location: 2440242-ESE2Project.html?status=error&msg=" . urlencode($conn->error));
}

$conn->close();
?>


