<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "root";
$database = "CA";

// Create a connection
$conn = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get values from the form
$emri = $_POST['emri'];
$mbiemri = $_POST['mbiemri'];
$numri_telefonit = $_POST['numri_telefonit'];
$email = $_POST['email'];
$mosha = $_POST['mosha'];
$gjinia = $_POST['gjinia'];
$trajnim = $_POST['trajnim'];
$grupi = $_POST['grupi'];
$oraret = implode(", ", $_POST['orari']);

// Insert data into the application table
$sql = "INSERT INTO application (emri, mbiemri, numri_telefonit, email, mosha, gjinia, trajnimii, grupi, oraret)
        VALUES ('$emri', '$mbiemri', '$numri_telefonit', '$email', '$mosha', '$gjinia', '$trajnim', '$grupi', '$oraret')";

if ($conn->query($sql) === TRUE) {
    // echo '<script>alert("Aplikuat me sukses!");</script>';
    // header("Location: aplikimi.html"); 
    // exit(); 
    echo '<script>alert("Ju aplikuat me sukses!");</script>'; 
    echo '<script>window.location.href = "index.html";</script>';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


// Close the connection
$conn->close();
?>
