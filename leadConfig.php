<?php
$servername = "localhost"; 
$username = "sisgayq6_webenquiries";
$password = "sisgayq6_webenquiries"; 
$database = "sisgayq6_web_enquiries";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";
?>