<?php

$host = 'localhost';
$username = 'sisgayq6_gensitemap';
$password = 'sisgayq6_gensitemap';
$dbname = 'sisgayq6_generatesitemaps';


$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
