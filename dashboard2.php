<?php
session_start();

// Check if the user is logged in (session check)
if (!isset($_SESSION['student_id'])) {
    echo "Please log in to view your information.";
    exit();
}

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "student_dbb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch the student's details from the session
$student_id = $_SESSION['student_id'];
$sql = "SELECT * FROM students WHERE id = '$student_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo "<h2>Welcome, " . $row['first_name'] . " " . $row['last_name'] . "</h2>";
    echo "<p>Email: " . $row['email'] . "</p>";
    echo "<p>Date of Birth: " . $row['dob'] . "</p>";
    echo "<p>Gender: " . $row['gender'] . "</p>";
    echo "<p>Mobile Number: " . $row['mobile_number'] . "</p>";
} else {
    echo "No user found.";
}

$conn->close();
?>
