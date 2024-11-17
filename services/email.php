<!-- sandbox.smtp.mailtrap.io -->
<!-- 896758d608d5fb -->
<!-- 2525 -->
<?php

use PHPMailer\PHPMailer\PHPMailer;



require __DIR__ . "/../vendor/autoload.php";



   

function gerarConjuntoAleatorio($tamanho) {
    $resultado = '';

    for ($i = 0; $i < $tamanho; $i++) {
        // Gerar um valor aleatório entre 0 e 61 (para cobrir as letras maiúsculas, minúsculas e números)
        $indice = rand(0, 61);

        // Determinar qual caractere usar com base no índice
        if ($indice < 26) {
            // Letras maiúsculas (A-Z)
            $resultado .= chr(65 + $indice);  // 65 é o código ASCII de 'A'
        } elseif ($indice < 52) {
            // Letras minúsculas (a-z)
            $resultado .= chr(97 + $indice - 26);  // 97 é o código ASCII de 'a'
        } else {
            // Números (0-9)
            $resultado .= chr(48 + $indice - 52);  // 48 é o código ASCII de '0'
        }
    }

    return $resultado;
}
 
   
function updatePassword($newPassword, $email){
      $connection = databaseConnection();
      $query = "UPDATE  usuarios SET password =  :password, authenticated = 0 WHERE email = :email";
        
      // Criptografa a senha antes de salvar no banco
      $senhaCripito = password_hash($newPassword, PASSWORD_DEFAULT);
      
      // Prepara a consulta
      $db = $connection->prepare($query);
      
      $db->bindParam(":password", $senhaCripito); 
      $db->bindParam(':email', $email);
      $db->execute([$senhaCripito,$email]);
      
}






function sendEmail($email)
{
    $newPassword = gerarConjuntoAleatorio(10);
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->SMTPDebug = 2;
    $mail->Host = "sandbox.smtp.mailtrap.io";
    $mail->Port = 2525;
    $mail->SMTPAuth = true;
    $mail->Username = "fd28fad3dbf04a";
    $mail->Password = "896758d608d5fb";

    $mail->SMTPSecure = false;
    $mail->isHTML(true);
    $mail->CharSet = "UTF-8";

    $mail->setFrom("akaua3232@gmail.com", "Recuperação de conta");
    $mail->addAddress($email);
    $mail->Subject = "recuperar a sua conta";
    
    updatePassword($newPassword,$email);

    $mail->Body = "<h1>Olá, o sua nova senha temporária é:" .$newPassword."</h1>";


    if ($mail->send()) {
        echo "e-mail";
    } else {
        echo "Falha ao enviar e-mail";
    }
   
}

?>