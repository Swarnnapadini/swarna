<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "student_dbb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $mobile_number = $_POST['mobile_number'];

    // Insert data into database
    $sql = "INSERT INTO students (first_name, last_name, email, dob, gender, mobile_number)
            VALUES ('$first_name', '$last_name', '$email', '$dob', '$gender', '$mobile_number')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to login page after successful registration
        echo "Registration successful! Redirecting to login...";
        header("Location: login.php");  // Redirect to login.php
        exit();  // Stop further script execution
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
?>
