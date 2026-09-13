```php
<?php

header('Content-Type: application/json');

// Tietokantayhteys
$servername = "localhost";
$username = "käyttäjänimi";
$password = "salasana";
$dbname = "tietokanta_nimi";

$conn = new mysqli($servername, $username, $password, $dbname);

// Tarkistetaan yhteys
if ($conn->connect_error) {
    die(json_encode(array(
        "viesti" => "Yhteys epäonnistui: " . $conn->connect_error
    )));
}

// GET - Hae kaikki käyttäjät
if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $sql = "SELECT id, nimi, sähköposti FROM käyttäjät";
    $result = $conn->query($sql);

    $users = array();

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
            $users[] = $row;
        }

        echo json_encode($users);

    } else {

        echo json_encode(array(
            "viesti" => "Käyttäjiä ei löytynyt"
        ));
    }
}


// POST - Lisää uusi käyttäjä
elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nimi = $_POST['nimi'];
    $sahkoposti = $_POST['sähköposti'];

    $sql = "INSERT INTO käyttäjät (nimi, sähköposti)
            VALUES ('$nimi', '$sahkoposti')";

    if ($conn->query($sql) === TRUE) {

        echo json_encode(array(
            "viesti" => "Uusi käyttäjä lisätty onnistuneesti"
        ));

    } else {

        echo json_encode(array(
            "viesti" => "Virhe lisättäessä käyttäjää: " . $conn->error
        ));
    }
}


// PUT - Päivitä käyttäjä
elseif ($_SERVER['REQUEST_METHOD'] == 'PUT') {

    parse_str(file_get_contents("php://input"), $put_vars);

    $id = $put_vars['id'];
    $nimi = $put_vars['nimi'];
    $sahkoposti = $put_vars['sähköposti'];

    $sql = "UPDATE käyttäjät
            SET nimi='$nimi',
                sähköposti='$sahkoposti'
            WHERE id=$id";

    if ($conn->query($sql) === TRUE) {

        echo json_encode(array(
            "viesti" => "Käyttäjä päivitetty onnistuneesti"
        ));

    } else {

        echo json_encode(array(
            "viesti" => "Virhe päivitettäessä käyttäjää: " . $conn->error
        ));
    }
}


// DELETE - Poista käyttäjä
elseif ($_SERVER['REQUEST_METHOD'] == 'DELETE') {

    parse_str(file_get_contents("php://input"), $delete_vars);

    $id = $delete_vars['id'];

    $sql = "DELETE FROM käyttäjät WHERE id=$id";

    if ($conn->query($sql) === TRUE) {

        echo json_encode(array(
            "viesti" => "Käyttäjä poistettu onnistuneesti"
        ));

    } else {

        echo json_encode(array(
            "viesti" => "Virhe poistettaessa käyttäjää: " . $conn->error
        ));
    }
}


// Muut metodit
else {

    echo json_encode(array(
        "viesti" => "HTTP-metodia ei tueta"
    ));
}

// Suljetaan yhteys
$conn->close();

?>
```
