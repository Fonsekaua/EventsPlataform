<?php 
require "db.php";
function select__table($name){
    global $pdo;
    $consulta = $pdo->query("SELECT * FROM $name");
    return $consulta->fetchAll(PDO::FETCH_ASSOC);
}

function toLogin($email, $password) {
    global $pdo;

    // Consulta SQL para selecionar o usuário com verificação sensível a maiúsculas/minúsculas
    // Corrigido: Removido o segundo "WHERE"
    $consulta = "SELECT * FROM usuarios WHERE BINARY email = :email";

    // Preparar a consulta
    $db = $pdo->prepare($consulta);
    
    // Associar os parâmetros ":nome" e ":email" com as respectivas variáveis
    $db->bindParam(":email", $email);
    
    // Executar a consulta
    $db->execute();
    
    // Verificar se o usuário foi encontrado
    if ($db->rowCount() > 0) {
        // Buscar o registro do usuário
        $usuarioData = $db->fetch(PDO::FETCH_ASSOC);

        // Verificar se a senha fornecida corresponde ao hash armazenado
        if (password_verify($password, $usuarioData['password'])) {
            // Senha correta, retorna os dados do usuário
            return $usuarioData;
        } else {
            // Senha incorreta
            return false;
        }
    } else {
        // Usuário não encontrado
        return false;
    }
}
function toRegister($name,$email,$password) {
    global $pdo; // Usa a conexão global com o banco de dados

    // Criptografa a senha usando bcrypt
    $passwordCripto = password_hash($password, PASSWORD_DEFAULT);

    // Prepara a consulta SQL para inserir o usuário e a senha criptografada
    $consulta = "INSERT INTO usuarios (name, email, password) VALUES (:name, :email, :password)";
    $db = $pdo->prepare($consulta);

    // Vincula os parâmetros da consulta
    $db->bindParam(":name", $name);
    $db->bindParam(":email", $email);
    $db->bindParam(":password", $passwordCripto);

    // Executa a consulta
    $db->execute();

    // Retorna TRUE se pelo menos uma linha foi inserida, FALSE se não
    return $db->rowCount() > 0;
}
?>