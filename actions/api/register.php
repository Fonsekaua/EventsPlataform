<?php 

include "../db_actions.php";
if($_SERVER["REQUEST_METHOD"] === "POST"){
    $dados = json_decode(file_get_contents("php://input"),true);
    $name = $dados['name'];
    $email = $dados['email'];
    $password = $dados['password'];

    if(filter_var($email, FILTER_VALIDATE_EMAIL)===false){
        $login = false;
        $message = "Opa! parece que seu email não é valido, verifique e tente novamente!";
    }
    else if (preg_match('/\d/', $name)){
        $login = false;
        $message = "Meu caro usuario, digite apenas seu nome completo sem numeros, por favor";
    }
    else if (empty($name) || strpos($name, ' ') === false || strlen($name) < 3) {
        $login = false;
        $message = "Digite seu nome completo, caro usuário";
    }
    
    else if (preg_match('/\d/', $password) == false || preg_match('/[A-Z]/', $password) < 1){
        $register = false;
        $message = "Sua senha está muito facil, nosso sistema de segurança é bem avançado mas não se pode bobear, adicione uns numeros e umas letras maiusculas em sua senha !";
    }
    else if (strlen($email)<=10){
        $register = false;
        $message = "Opa! parece que seu email não é valido, verifique e tente novamente!";
    }
    else if(strlen($password)<8){
        $register = false;
        $message = "Eae caro usuario, sua senha não possui o numero minimo de caracteres! verifique se não esqueceu nada e tente novamente! ";
    }
    else{
        toRegister($name,$email,$password);
        $register = true;
        $message = "Olá seja bem vindo a nossa plataforma de eventos meu caro $name, esperamos que continue conosco";
    }

    echo json_encode([
        "register" => $register,
        "message" => $message
    ]);
}
