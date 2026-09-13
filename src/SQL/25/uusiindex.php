<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="UTF-8">
    <title>Verkkokauppa (REST API käyttöliittymä)</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        h2 { margin-top: 30px; }
        form { margin-bottom: 20px; padding: 10px; border: 1px solid #ccc; }
        input, button { margin: 5px; padding: 5px; }
        pre { background: #f4f4f4; padding: 10px; border: 1px solid #ddd; }
    </style>
</head>
<body>
    <h1>Verkkokauppa</h1>

    <?php
    // API:n osoite
    $apiUrl = "http://localhost/SQL/25/kauppa_api.php";
    $message = "";

    // 🔹 Hae auto ID:llä (GET)
    if (isset($_GET['get'])) {
        $id = intval($_GET['getId']);
        $response = file_get_contents("$apiUrl?id=$id");
        $message = $response ?: "Autoa ei löytynyt.";
    }

    // 🔹 Lisää auto (POST)
    if (isset($_POST['add'])) {
        $data = [
            "Nimi" => $_POST['merkki'],
            "Hinta" => $_POST['tyyppi'],
            "Kuvaus" => $_POST['vuosimalli'],
            "katekoria" => $_POST['katekoria']
        ];
        $ch = curl_init($apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_POST, true);
        $message = curl_exec($ch);
        curl_close($ch);
    }

    // 🔹 Päivitä auto (PUT)
    if (isset($_POST['update'])) {
        $data = [
            "ID" => intval($_POST['updateId']),
            "Nimi" => $_POST['updateMerkki'],
            "Hinta" => $_POST['updateTyyppi'],
            "Kuvaus" => $_POST['updateVuosimalli'],
            "katekoria" => $_POST['updatekatekoria']
        ];
        $ch = curl_init($apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        $message = curl_exec($ch);
        curl_close($ch);
    }

    // 🔹 Poista auto (DELETE)
    if (isset($_POST['delete'])) {
        $id = intval($_POST['deleteId']);
        $ch = curl_init("$apiUrl?id=$id");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        $message = curl_exec($ch);
        curl_close($ch);
    }

    if (!empty($message)) {
        echo "<h3>Vastaus:</h3><pre>$message</pre>";
    }
    ?>

    <h2>Hae ID:llä</h2>
    <form method="get">
        <input type="number" name="getId" placeholder="Syötä ID">
        <button type="submit" name="get">Hae</button>
    </form>

    <h2>Lisää uusi auto</h2>
    <form method="post">
        <input type="text" name="Nimi" placeholder="Merkki" required>
        <input type="text" name="Hinta" placeholder="Tyyppi" required>
        <input type="number" name="Kuvaus" placeholder="Vuosimalli" required>
        <input type="text" name="katekoria" placeholder="Katekoria" required>
        <button type="submit" name="add">Lisää</button>
    </form>

    <h2>Päivitä auto</h2>
    <form method="post">
        <input type="number" name="updateId" placeholder="ID" required>
        <input type="text" name="updateNimi" placeholder="Merkki" required>
        <input type="text" name="updateHinta" placeholder="Tyyppi" required>
        <input type="number" name="updateKuvaus" placeholder="Vuosimalli" required>
        <input type="text" name="updatekatekoria" placeholder="Katekoria" required>
        <button type="submit" name="update">Päivitä</button>
    </form>

    <h2>Poista auto</h2>
    <form method="post">
        <input type="number" name="deleteId" placeholder="ID" required>
        <button type="submit" name="delete">Poista</button>
    </form>

</body>
</html>
