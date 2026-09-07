<?php
// API-osoite
$city = "Helsinki"; // Muuta haluamaksesi kaupungiksi
$apiKey = "97e963772f24ad76910ac75e79bc3b96"; // Lisää oma API-avaimesi
$url = "http://api.openweathermap.org/data/2.5/weather?q=$city&appid=$apiKey";

// Hae JSON-data
$response = file_get_contents($url);

// Tarkista, että haku onnistui
if ($response === FALSE) {
    die('Error occurred while fetching data.');
}

// Jäsennä JSON-data
$data = json_decode($response, true);

// Tulosta oleellisia tietoja
if (isset($data['main'])) {
    echo "Säätilatiedot kaupungissa $city:<br>";
    echo "Lämpötila: " . ($data['main']['temp'] - 273.15) . " °C<br>"; // Muutetaan Kelvin Celsius-asteiksi
    echo "Kosteus: " . $data['main']['humidity'] . "%<br>";
    echo "Ilmanpaine: " . $data['main']['pressure'] . " hPa<br>";
} else {
    echo "Tietoja ei löytynyt.";
}
?>