<?php
ob_start(); // Aloitetaan output buffering, jotta voimme käyttää header()-funktiota myöhemmin
 $apiUrl = "http://localhost/SQL/25/kauppa_api.php";
// Tarkistetaan, onko lomakkeelta lähetetty 'add'-painike
if (isset($_POST['add'])) {
    // Kerätään lomakkeen tiedot taulukkoon
    $data = [
        "Nimi" => $_POST['Nimi'],
        "Hinta" => $_POST['Hinta'],
        "Kuvaus" => $_POST['Kuvaus'],
        "katekoria" => $_POST['katekoria']
    ];

    // Alustetaan cURL-pyyntö API:lle
    $ch = curl_init($apiUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Vastaus palautetaan, ei tulosteta
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data)); // Lähetetään data JSON-muodossa
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']); // Määritellään sisällön tyyppi
    curl_setopt($ch, CURLOPT_POST, true); // Käytetään POST-metodia

    // Suoritetaan pyyntö
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE); // Haetaan HTTP-vastauskoodi
    curl_close($ch);

    // Tarkistetaan, onnistuiko lisäys
    if ($httpCode === 201 || $httpCode === 200) {
        // Ohjataan takaisin etusivulle onnistumisviestin kanssa
        header("Location: index.php?status=added");
    } else {
        // Ohjataan takaisin etusivulle virheviestin kanssa
        header("Location: index.php?status=add_error");
    }

    exit;
}
ob_end_flush(); // Lopetetaan output buffering ja lähetetään mahdollinen sisältö
?>



<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lisää uusi auto</title>
</head>
<body>
    <h2>Lisää uusi auto</h2>
    <form method="post">
        <input type="text" name="Nimi" placeholder="Nimi">
        <input type="number" name="Hinta" placeholder="Hinta">
        <input type="text" name="Kuvaus" placeholder="Kuvaus">
        <input type="text" name="katekoria" placeholder="Katekoria">
        <button type="submit" name="add">Lisää</button>
    </form>
</body>
</html>

