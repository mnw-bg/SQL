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

// Tarkistetaan, onko POST-pyyntö saatu
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nimi = $_POST['nimi'];
    $sähköposti = $_POST['sähköposti'];
    
    // Lisätään uusi käyttäjä
    $sql = "INSERT INTO käyttäjät (nimi, sähköposti) VALUES ('$nimi', '$sähköposti')";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(array("viesti" => "Uusi käyttäjä lisätty onnistuneesti"));
    } else {
        echo json_encode(array("viesti" => "Virhe lisättäessä käyttäjää: " . $conn->error));
    }
} else {
    echo json_encode(array("viesti" => "Väärä pyyntö. Käytä POST-pyyntöä."));
}

// Suljetaan yhteys
$conn->close();
?>