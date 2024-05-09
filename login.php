<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "admin";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$username = $_POST['username'];
$password = $_POST['password'];
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysqli_real_escape_string($conn, $username);
$password = mysqli_real_escape_string($conn, $password);
$sql = "SELECT * FROM login WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);
if ($result->num_rows == 1) {
    header("Location: home.html");
    exit;
} else {
 
    echo "<script>alert('Login failed. Please check your username and password.');</script>";
}
$conn->close();
?>
