<?php

$request_uri = $_SERVER['REQUEST_URI'];

switch ($request_uri) {
    case '/api/users':
        // Käsitellään käyttäjien hakemista
        getUsers();
        break;

    case '/api/posts':
        // Käsitellään postausten hakemista
        getPosts();
        break;

    default:
        // Jos reittiä ei löydy, palautetaan 404
        http_response_code(404);
        echo json_encode(['message' => 'Not Found']);
        break;
}

function getUsers() {
    // Tässä voit hakea ja palauttaa käyttäjätietoja
    echo json_encode(['users' => ['User1', 'User2']]);
}

function getPosts() {
    // Tässä voit hakea ja palauttaa postauksia
    echo json_encode(['posts' => ['Post1', 'Post2']]);
}
?>