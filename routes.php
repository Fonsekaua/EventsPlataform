<?php
session_start();

require "./controllers/HomeController.php";
require "./controllers/RegisterClient.php";
require "./controllers/LoginController.php";
require "./controllers/NotFoundController.php";
require "./controllers/LogoutController.php";
require "./controllers/recoveryAccountController.php";
require "./controllers/AuthenticatedController.php";

$method = $_SERVER['REQUEST_METHOD'];
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$authenticated = $_SESSION['authenticated'] ?? null;

$routes = [
    "GET" => [
        "/" => "indexHome",
        "/client/register" => "indexRegister",
        "/client/login" => "indexLogin",
        "/client/logout" => "indexLogout",
        "/client/recoveryAccount" => "indexRecoveryAccount",
        "/client/authenticated" => "indexAuthenticated",
    ],
    "POST" => [
        "/client/to/register" => "toRegister"
    ]
];



if (isset($routes[$method][$uri])) {
    $function = $routes[$method][$uri];
    // $nameRoute = $routes[$method];

    if (isset($authenticated)) {
        if ($authenticated === 0 and $function !== "indexAuthenticated") {
     
            header("location:/client/authenticated");
        } else {
            $function();
            return;
        }
    }
    $function();
} else {
    http_response_code(404);
    notFoundPage();
}


// echo "<pre>";
// print_r($_SERVER);
// echo "</pre>";
