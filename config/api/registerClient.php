<?php 
require __DIR__ . "/../database__actions.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Pega os dados JSON
    $dados = json_decode(file_get_contents("php://input"), true);

    // Extração de dados
    $name = $dados['first__name'] . (strlen($dados['last__name']) > 0 ? " " . $dados['last__name'] : "");
    $email = $dados['email'];
    $password = $dados['password'];

    // Verifica se algum campo está vazio
    if (empty($name) || empty($email) || empty($password)) {
        $register = false;
        $message = " Campo Vazio";
    }
    // Valida o nome (não pode ter números nem caracteres especiais)
    else if (preg_match('/[^a-zA-ZÀ-ÿá-úÁ-ÚçÇ ]/', $name)) {
        $register = false;
        $message = " Nome inválido (não pode conter números ou caracteres especiais)";
    }
    // Valida o e-mail
    else if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
        $register = false;
        $message = " Email inválido";
    }
    else if (emailExists($email)){
        $register = false;
        $message = " Email já cadastrado em nosso banco de dados";
    }
    // Verifica o comprimento da senha
    else if (strlen($password) < 8) {
        $register = false;
        $message = " Senha inválida, deve ter 8 ou mais caracteres";
    }
    // Verifica se a senha possui ao menos uma letra maiúscula, número e caractere especial
    else if (preg_match('/^(?=.*[A-Z])(?=.*[0-9])(?=.*[\W_]).+$/', $password) === false) {
        $register = false;
        $message = " Senha inválida, deve possuir letra maiúscula, número e um caractere especial";
    }
    else {
        // Caso todos os campos sejam válidos
        $register = true;
        $message = " Seja bem-vindo $name!";
        
        // Função para registrar o cliente (substitua pelo seu código de inserção no banco)
        clientRegister($name, $email, $password);
    }

    // Retorna a resposta como JSON
    echo json_encode([
        "register" => $register,
        "message" => $message
    ]);
}
?>
