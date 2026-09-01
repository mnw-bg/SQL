<?php
//palautetaan json
header("Content-Type: application/json; charset=UTF-8");
include 'db_config.php';

//selvitetään pyyntömetodi (GET, POST, PUT, DELETE, jne.)
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        // Jos kysytään yksittäistä autoa ID:llä
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            getAuto(inval($_GET['id']));
        } else {
            //
        })
}
?>