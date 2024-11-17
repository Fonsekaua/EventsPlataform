<?php 
session_start();
require __DIR__ . "/../database.php";
require  "../../services/email.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
 
    $conn = databaseConnection();
    // Consulta ao banco de dados
    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = ?");
    $stmt->execute([$email]);
    $usuario = $stmt->fetch();
    
 if($usuario){
    sendEmail($usuario["email"]);
    header("Location:/?msg=recoveryAccount");
    exit;
 }
}
?>