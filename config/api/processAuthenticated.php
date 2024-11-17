<?php 
session_start();
require __DIR__ . "/../database.php";
$id = $_SESSION['usuario_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
 
    $senha = $_POST['password'];
    $connection = databaseConnection();


    // Consulta ao banco de dados

    $query = "UPDATE  usuarios SET password = :password, authenticated = 1   WHERE id = :id";
    $senhaCripito = password_hash($senha, PASSWORD_DEFAULT);
    $db = $connection->prepare($query);
    $db->bindParam(":password", $senhaCripito); 
    $db->bindParam(":id", $id); 
    $db->execute([$senhaCripito,$id]);
    $usuario = $db->rowCount();
    $_SESSION['authenticated'] = 1;

  if($usuario > 0){
    header("location:/");
    exit;
  }
 
}