<?php

// Kuopion sijainti
$latitude = 62.8924;
$longitude = 27.6770;

// Met.no API URL
$url = "https://api.met.no/weatherapi/locationforecast/2.0/compact?lat=$latitude&lon=$longitude";

// Luodaan HTTP konteksti headerilla
$options = [
    "http" => [
        "header" => "User-Agent: OmaSovellus/1.0 oma.sahkoposti@example.com\r\n"
    ]
];

$context = stream_context_create($options);

// Haetaan data
$response = file_get_contents($url, false, $context);

if ($response === FALSE) {
    die("Säädatan haku epäonnistui.");
}

// Muutetaan JSON taulukoksi
$data = json_decode($response, true);

// Haetaan ensimmäiset 6 aikapistettä
$aikasarja = array_slice($data['properties']['timeseries'], 0, 6);

function getSuomi($koodi) {
    $taulukko = [
        'clearsky_day' => 'Selkeää',
        'clearsky_night' => 'Selkeää yöllä',
        'partlycloudy_day' => 'Puolipilvistä',
        'partlycloudy_night' => 'Puolipilvistä yöllä',
        'cloudy' => 'Pilvistä',
        'rain' => 'Sade',
        'lightrain' => 'Heikkoa sadetta',
        'heavyrain' => 'Voimakasta sadetta',
        'snow' => 'Lunta',
        'lightsnow' => 'Heikkoa lunta',
        'heavysnow' => 'Voimakasta lunta',
        'fog' => 'Sumua',
        'fair_day' => 'Selkeää päivällä'
    ];

    return $taulukko[$koodi] ?? $koodi;
}

?>
<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="UTF-8">
    <title>Sää Kuopiossa</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
        }

        th, td {
            border: 1px solid #333;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h1>Sää Kuopiossa - seuraavat 6 tuntia</h1>

<table>
    <tr>
        <th>Aika</th>
        <th>Lämpötila (°C)</th>
        <th>Säätieto</th>
    </tr>

    <?php foreach ($aikasarja as $piste):
        $aika = $piste['time'];
        $temp = $piste['data']['instant']['details']['air_temperature'];
        $saatieto = $piste['data']['next_1_hours']['summary']['symbol_code'] ?? 'N/A';
    ?>
    <tr>
        <td><?= date('d.m.Y H:i', strtotime($aika)); ?></td>
        <td><?= $temp; ?></td>
        <td><?= getSuomi($saatieto); ?></td>
    </tr>
    <?php endforeach; ?>

</table>

</body>
</html>