<?php 
require "./controllers/HomeController.php";
require "./controllers/LoginController.php";
require "./controllers/RegisterController.php";

$method = $_SERVER['REQUEST_METHOD'];
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$routes = [
    "GET" => [
        "/" => "indexHome",
        "/login" => "indexLogin",
        "/register" => "indexRegister"
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

