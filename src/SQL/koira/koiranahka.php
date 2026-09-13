<?php
// Haetaan kuvien määrä lomakkeesta.
// Oletuksena haetaan 10 kuvaa.
$maara = isset($_GET['maara']) ? (int)$_GET['maara'] : 10;

// Sallitaan vain 5–20 kuvaa.
$maara = max(5, min(20, $maara));

// Dog CEO API
$url = "https://dog.ceo/api/breeds/image/random/" . $maara;

// Haetaan JSON-data API:sta
$json = @file_get_contents($url);

// Muutetaan JSON PHP-taulukoksi
$data = $json !== false ? json_decode($json, true) : null;

// Tarkistetaan, onnistuiko haku
$onnistui = $data !== null
    && isset($data['status'])
    && $data['status'] === 'success'
    && isset($data['message'])
    && is_array($data['message']);
?>

<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Satunnaiset koirakuvat</title>

    
</head>

<body>

    <h1>Satunnaiset koirakuvat</h1>

    <!-- Lomake uusien kuvien hakemiseen -->
    <form method="GET">
        <label for="maara">Kuvien määrä:</label>

        <select name="maara" id="maara">
            <?php for ($i = 5; $i <= 20; $i++): ?>
                <option value="<?= $i ?>" <?= $i === $maara ? 'selected' : '' ?>>
                    <?= $i ?>
                </option>
            <?php endfor; ?>
        </select>

        <button type="submit">Hae uudet kuvat</button>
    </form>

    <?php if ($onnistui): ?>

        <div class="koirat">

            <?php foreach ($data['message'] as $kuva): ?>

                <div class="koira">
                    <img
                        src="<?= htmlspecialchars($kuva, ENT_QUOTES, 'UTF-8') ?>"
                        alt="Satunnainen koirakuva"
                    >
                </div>

            <?php endforeach; ?>

        </div>

    <?php else: ?>

        <p class="virhe">
            Koirakuvien hakeminen epäonnistui. Yritä uudelleen.
        </p>

    <?php endif; ?>

</body>
</html>