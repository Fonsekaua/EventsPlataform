<?php 
require __DIR__ . "/database.php";

function selectTable($name){
    $connection = databaseConnection();
    $query = $connection->query("SELECT * FROM $name");
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function clientRegister($name, $email, $password) {
    // Estabelece a conexão com o banco de dados
    $connection = databaseConnection();
    
    try {
        // Consulta SQL para inserir os dados do usuário
        $query = "INSERT INTO usuarios (name, email, password) VALUES (:name, :email, :password)";
        
        // Criptografa a senha antes de salvar no banco
        $senhaCripito = password_hash($password, PASSWORD_DEFAULT);
        
        // Prepara a consulta
        $db = $connection->prepare($query);
        
        // Bind dos parâmetros para evitar SQL injection
        $db->bindParam(":name", $name); // Corrigido: de :nome para :name
        $db->bindParam(":email", $email);
        $db->bindParam(":password", $senhaCripito); // Corrigido: de :senha para :password
        
        // Executa a consulta
        $db->execute();
        
        // Retorna true se a inserção foi bem-sucedida
        return $db->rowCount() > 0;
    } catch (PDOException $e) {
        // Em caso de erro, exibe a mensagem
        echo "Erro ao registrar: " . $e->getMessage();
        return false;
    }
}
function emailExists($email) {
    // Estabelece a conexão com o banco de dados
    $connection = databaseConnection();

    try {
        // Consulta SQL para verificar se o e-mail já existe no banco de dados
        $query = "SELECT COUNT(*) FROM usuarios WHERE email = :email";
        
        // Prepara a consulta
        $db = $connection->prepare($query);
        
        // Bind do parâmetro para evitar SQL injection
        $db->bindParam(":email", $email);
        
        // Executa a consulta
        $db->execute();
        
        // Obtém o resultado da consulta
        $count = $db->fetchColumn();
        
        // Se o resultado for maior que 0, significa que o e-mail já existe
        return $count > 0;
    } catch (PDOException $e) {
        // Em caso de erro, exibe a mensagem
        echo "Erro ao verificar e-mail: " . $e->getMessage();
        return false;
    }
}
