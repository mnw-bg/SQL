<?php
// Yhteys tietokantaan
$servername = "localhost";
$username = "käyttäjänimi";
$password = "salasana";
$dbname = "tietokanta_nimi";

$conn = new mysqli($servername, $username, $password, $dbname);

// Tarkistetaan yhteys
if ($conn->connect_error) {
    die("Yhteys epäonnistui: " . $conn->connect_error);
}

// Suoritetaan SQL-kysely käyttäjätietojen hakemiseksi
$sql = "SELECT id, nimi, sähköposti FROM käyttäjät";
$result = $conn->query($sql);

$users = array();

if ($result->num_rows > 0) {
    // Tallennetaan käyttäjät taulukkoon
    while($row = $result->fetch_assoc()) {
        $users[] = $row;
    }
    // Palautetaan JSON-muodossa
    header('Content-Type: application/json');
    echo json_encode($users);
} else {
    echo json_encode(array("viesti" => "Käyttäjiä ei löytynyt"));
}

// Suljetaan yhteys
$conn->close();
?>