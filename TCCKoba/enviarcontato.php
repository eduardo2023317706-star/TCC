<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/PHPMailer/src/Exception.php';
require __DIR__ . '/PHPMailer/src/PHPMailer.php';
require __DIR__ . '/PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome     = $_POST['nome'];
    $email    = $_POST['email'];
    $telefone = $_POST['telefone'];
    $mensagem = $_POST['mensagem'];

    $mail = new PHPMailer(true);

    try {
        // SMTP
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'panatinaikosbasquete@gmail.com';
        $mail->Password   = 'Sqgawiwdeodstexsl'; // <<< MUITO IMPORTANTE
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;
        $mail->CharSet    = 'UTF-8';

                $mail->SMTPOptions = [
            'ssl' => [
                'verify_peer'       => false,
                'verify_peer_name'  => false,
                'allow_self_signed' => true,
            ],
        ];
        // Remetente
        $mail->setFrom('panatinaikosbasquete@gmail.com', 'Site Panatinaikos');

        // Destino
        $mail->addAddress('panatinaikosbasquete@gmail.com');

        // Responder para o usuário
        $mail->addReplyTo($email, $nome);

        // Conteúdo
        $mail->isHTML(true);
        $mail->Subject = 'Novo contato pelo site';

        $mail->Body = "
            <h3>Nova mensagem recebida</h3>
            <p><strong>Nome:</strong> $nome</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Telefone:</strong> $telefone</p>
            <p><strong>Mensagem:</strong><br>$mensagem</p>
        ";

        $mail->AltBody = "Nome: $nome\nEmail: $email\nTelefone: $telefone\nMensagem: $mensagem";

        

        $mail->send();

        header("Location: contato.php?enviado=1");
        exit;

    } catch (Exception $e) {
        echo "Erro ao enviar: {$mail->ErrorInfo}";
    }
}