<?php 
session_start();
require __DIR__ . "/../database.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['password'];
    $conn = databaseConnection();
    // Consulta ao banco de dados
    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = ?");
    $stmt->execute([$email]);
    $usuario = $stmt->fetch();

    
    // Verificação da senha
    if ($usuario && password_verify($senha, $usuario['password'])) {
        $_SESSION['usuario'] = $usuario['name'];
        $_SESSION['usuario_id'] = $usuario['id'];
        $_SESSION['authenticated'] = $usuario['authenticated'];
        if($usuario['authenticated'] === 1){
          header('location:/?=success');
          exit;
        }
        else{
          header("location:/client/authenticated");
          exit;
        }
      

    } else {
      
       
      $error = "Email ou senha inválidos!";
      header('location:/client/login?error='.$error);
      
    
        exit();
    }
}
?>