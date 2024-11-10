<?php 
require "./controllers/HomeController.php";
require "./controllers/RegisterClient.php";
require "./controllers/LoginController.php";

$method = $_SERVER['REQUEST_METHOD'];
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);


$routes = [
    "GET" => [
        "/" => "indexHome",
        "/client/register" => "indexRegister",
        "/client/login" => "indexLogin"
    ],
    "POST" => [
        "/client/to/register" => "toRegister"
    ]
];


if(isset($routes[$method][$uri])) {
    $function = $routes[$method][$uri];
    $function();
}
else {
    http_response_code(404);
    echo "Página não Encontrada!!!";
}


// echo "<pre>";
// print_r($_SERVER);
// echo "</pre>";

