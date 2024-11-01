<?php 

include "../db_actions.php";
if($_SERVER["REQUEST_METHOD"] === "POST"){
    $dados = json_decode(file_get_contents("php://input"),true);
    $email = $dados['email'];
    $password = $dados['password'];

    if(filter_var($email, FILTER_VALIDATE_EMAIL)===false){
        $login = false;
        $message = "Opa! parece que seu email não é valido, verifique e tente novamente!";
    }
    else if (strlen($email)<=10){
        $login = false;
        $message = "Opa! parece que seu email não é valido, verifique e tente novamente!";
    }
    else if(strlen($password)<8){
        $login = false;
        $message = "Eae caro usuario, sua senha não possui o numero minimo de caracteres! verifique se não esqueceu nada e tente novamente! ";
    }
    else if (toLogin($email,$password)===false){
        $login = false;
        $message = "Seu cadastro não existe em nosso banco de dados... se possuir conta conosco, tente novamente e veja se apenas não se esqueceu de algo, se não possuir, faça registro conosco! não demora nem 5 minutos";
    }
    else{
        toLogin($email,$password);
        $usuarios = select__table('usuarios');
        session_start();
        foreach($usuarios as $usuario){
            if($email === $usuario['email']){
                $name = $usuario['name'];
                $_SESSION['usuario'] = $name;
            }
        }
        $login = true;
        $message = "Olá seja bem vindo de volta $name, estavamos esperando por você...";
    }

    echo json_encode([
        "login" => $login,
        "message" => $message
    ]);
}
