<?php
$servername = "localhost"; 
$username = "root"; 
$password = "root"; 
$database = "CA";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["Email"];
    $password = $_POST["Password"];

    $stmt = $conn->prepare("SELECT * FROM Users WHERE email = ? AND password = ?");
    $stmt->bind_param("ss", $email, $password);

    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        header("Location: welcome.php"); 
        exit(); 
    } else {
        echo '<script>alert("Invalid email or password. Please try again!");</script>'; 
        echo '<script>window.location.href = "login-forma.html";</script>';
    }
    $stmt->close();
}
$conn->close();
?>
