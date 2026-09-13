{
  "nimi": "Matti Meikäläinen",
  "ikä": 30,
  "osoite": "Esimerkkikatu 1, 00100 Helsinki"
}
Vaihe 2: luo JSON-taulukko kirjoista
Seuraavaksi luo JSON-taulukko, joka sisältää luettelon kirjoista. Jokaisella kirjalla on seuraavat tiedot:

nimi: kirjan nimi
kirjailija: kirjan kirjoittaja
julkaisuvuosi: kirjan julkaisuvuosi
JSON-taulukon sisältö voisi näyttää seuraavalta:

[
  {
    "nimi": "Tämä on kirja 1",
    "kirjailija": "Kirjailija A",
    "julkaisuvuosi": 2020
  },
  {
    "nimi": "Tämä on kirja 2",
    "kirjailija": "Kirjailija B",
    "julkaisuvuosi": 2021
  },
  {
    "nimi": "Tämä on kirja 3",
    "kirjailija": "Kirjailija C",
    "julkaisuvuosi": 2022
  }
]
Vaihe 3: kirjoita PHP-koodi
Nyt on aika kirjoittaa PHP-koodi, joka lukee edellä luomasi JSON-tiedot ja tulostaa ne näytölle. Käytetään json_encode ja json_decode -toimintoja.

Esimerkki PHP-koodista:
<?php
// JSON-objekti henkilöstä
$henkilo = '{
  "nimi": "Matti Meikäläinen",
  "ikä": 30,
  "osoite": "Esimerkkikatu 1, 00100 Helsinki"
}';

// JSON-taulukko kirjoista
$kirjat = '[
  {
    "nimi": "Tämä on kirja 1",
    "kirjailija": "Kirjailija A",
    "julkaisuvuosi": 2020
  },
  {
    "nimi": "Tämä on kirja 2",
    "kirjailija": "Kirjailija B",
    "julkaisuvuosi": 2021
  },
  {
    "nimi": "Tämä on kirja 3",
    "kirjailija": "Kirjailija C",
    "julkaisuvuosi": 2022
  }
]';

// Muutetaan JSON-objekti PHP-taulukoksi
$henkiloArray = json_decode($henkilo, true);
$kirjatArray = json_decode($kirjat, true);

// Tulostetaan henkilön tiedot
echo "Henkilön tiedot:\n";
echo "Nimi: " . $henkiloArray['nimi'] . "\n";
echo "Ikä: " . $henkiloArray['ikä'] . "\n";
echo "Osoite: " . $henkiloArray['osoite'] . "\n\n";

// Tulostetaan kirjat
echo "Kirjalista:\n";
foreach ($kirjatArray as $kirja) {
    echo "Nimi: " . $kirja['nimi'] . ", ";
    echo "Kirjailija: " . $kirja['kirjailija'] . ", ";
    echo "Julkaisuvuosi: " . $kirja['julkaisuvuosi'] . "\n";
}
?>