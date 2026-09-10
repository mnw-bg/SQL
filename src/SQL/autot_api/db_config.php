<?php
$servername = "db";
$username = "root";
$password = "root";
$dbname = "autotietokanta";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Yhteys epäonnistui: " . $conn->connect_error);
}
?>
