<?php
// Check if the user is logged in via cookies
if (!isset($_COOKIE['student_id'])) {
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

$student_id = $_COOKIE['student_id'];
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
