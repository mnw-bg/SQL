<?php

// API-osoite
$url = "https://jsonplaceholder.typicode.com/users";

// Lähetettävä data
$data = [
    "name" => "Matti Meikäläinen",
    "username" => "matti123",
    "email" => "matti@example.com"
];

// Muutetaan JSON-muotoon
$jsonData = json_encode($data);

// cURL-yhteys
$ch = curl_init($url);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Content-Type: application/json",
    "Content-Length: " . strlen($jsonData)
]);

// Suoritetaan pyyntö
$response = curl_exec($ch);

// Virheenkäsittely
if (curl_errno($ch)) {
    echo "Virhe: " . curl_error($ch);
} else {
    $responseData = json_decode($response, true);

    echo "<h3>Pyyntö onnistui!</h3>";
    echo "<pre>";
    print_r($responseData);
    echo "</pre>";
}

curl_close($ch);

?>