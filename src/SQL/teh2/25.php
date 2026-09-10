<?php

header("Content-Type: application/json; charset=UTF-8");

// Tuotteet
$products = [
    [
        "id" => 1,
        "name" => "Tuote 1",
        "price" => 19.99,
        "description" => "Kuvaus tuote 1:stä",
        "category" => "Kategoria A"
    ],
    [
        "id" => 2,
        "name" => "Tuote 2",
        "price" => 29.99,
        "description" => "Kuvaus tuote 2:sta",
        "category" => "Kategoria B"
    ]
];

// Haetaan HTTP-metodi
$method = $_SERVER['REQUEST_METHOD'];

// Haetaan URL-polku
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$parts = explode('/', trim($uri, '/'));

// Etsitään ID, jos sellainen on
$id = null;

if (isset($parts[1]) && is_numeric($parts[1])) {
    $id = (int)$parts[1];
}

// GET /products
if ($method === 'GET' && $id === null) {
    echo json_encode($products, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    exit;
}

// GET /products/{id}
if ($method === 'GET' && $id !== null) {
    foreach ($products as $product) {
        if ($product['id'] === $id) {
            echo json_encode(
                $product,
                JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE
            );
            exit;
        }
    }

    http_response_code(404);
    echo json_encode([
        "message" => "Tuotetta ei löytynyt."
    ], JSON_UNESCAPED_UNICODE);
    exit;
}

// POST /products/new
if ($method === 'POST') {

    $data = json_decode(file_get_contents("php://input"), true);

    if (
        !isset($data['name']) ||
        !isset($data['price']) ||
        !isset($data['description']) ||
        !isset($data['category'])
    ) {
        http_response_code(400);
        echo json_encode([
            "message" => "Kaikki tuotteen tiedot ovat pakollisia."
        ], JSON_UNESCAPED_UNICODE);
        exit;
    }

    $newId = count($products) + 1;

    $newProduct = [
        "id" => $newId,
        "name" => $data['name'],
        "price" => $data['price'],
        "description" => $data['description'],
        "category" => $data['category']
    ];

    $products[] = $newProduct;

    http_response_code(201);
    echo json_encode(
        $newProduct,
        JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE
    );
    exit;
}

// PUT /products/{id}
if ($method === 'PUT' && $id !== null) {

    $data = json_decode(file_get_contents("php://input"), true);

    foreach ($products as $key => $product) {

        if ($product['id'] === $id) {

            $products[$key]['name'] =
                $data['name'] ?? $product['name'];

            $products[$key]['price'] =
                $data['price'] ?? $product['price'];

            $products[$key]['description'] =
                $data['description'] ?? $product['description'];

            $products[$key]['category'] =
                $data['category'] ?? $product['category'];

            echo json_encode(
                $products[$key],
                JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE
            );
            exit;
        }
    }

    http_response_code(404);
    echo json_encode([
        "message" => "Tuotetta ei löytynyt."
    ], JSON_UNESCAPED_UNICODE);
    exit;
}

// DELETE /products/{id}
if ($method === 'DELETE' && $id !== null) {

    foreach ($products as $key => $product) {

        if ($product['id'] === $id) {

            unset($products[$key]);

            echo json_encode([
                "message" => "Tuote on poistettu onnistuneesti."
            ], JSON_UNESCAPED_UNICODE);

            exit;
        }
    }

    http_response_code(404);
    echo json_encode([
        "message" => "Tuotetta ei löytynyt."
    ], JSON_UNESCAPED_UNICODE);
    exit;
}

// Tuntematon pyyntö
http_response_code(404);

echo json_encode([
    "message" => "Virheellinen API-pyyntö."
], JSON_UNESCAPED_UNICODE);

?>