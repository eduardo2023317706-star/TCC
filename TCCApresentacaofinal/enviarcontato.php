<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/PHPMailer/src/Exception.php';
require __DIR__ . '/PHPMailer/src/PHPMailer.php';
require __DIR__ . '/PHPMailer/src/SMTP.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // ===============================
    // Sanitização e validação
    // ===============================
    $nome     = htmlspecialchars(trim($_POST['nome'] ?? ''), ENT_QUOTES, 'UTF-8');
    $email    = filter_var($_POST['email'] ?? '', FILTER_VALIDATE_EMAIL);
    $telefone = htmlspecialchars(trim($_POST['telefone'] ?? ''), ENT_QUOTES, 'UTF-8');
    $mensagem = nl2br(htmlspecialchars(trim($_POST['mensagem'] ?? ''), ENT_QUOTES, 'UTF-8'));

    if (!$email) {
        die('Email inválido');
    }

    $mail = new PHPMailer(true);

    try {

        // ===============================
        // CONFIGURAÇÃO SMTP (GMAIL)
        // ===============================
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'panatinaikosbasquete@gmail.com';
        $mail->Password   = 'Sqgawiwdeodstexsl';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;
        $mail->CharSet    = 'UTF-8';

        // DEBUG (use só em localhost)
        $mail->SMTPDebug  = 2;
        $mail->Debugoutput = 'html';

        // ===============================
        // REMETENTE E DESTINO
        // ===============================
        $mail->setFrom('panatinaikosbasquete@gmail.com', 'Site Panatinaikos');
        $mail->addAddress('panatinaikosbasquete@gmail.com');

        // Reply-To seguro
        $mail->addReplyTo($email, $nome);

        // ===============================
        // CONTEÚDO
        // ===============================
        $mail->isHTML(true);
        $mail->Subject = 'Novo contato pelo site';

        $mail->Body = "
            <h3>Nova mensagem recebida</h3>
            <p><strong>Nome:</strong> {$nome}</p>
            <p><strong>Email:</strong> {$email}</p>
            <p><strong>Telefone:</strong> {$telefone}</p>
            <p><strong>Mensagem:</strong><br>{$mensagem}</p>
        ";

        $mail->AltBody =
            "Nome: {$nome}\n" .
            "Email: {$email}\n" .
            "Telefone: {$telefone}\n\n" .
            "Mensagem:\n" . strip_tags($mensagem);

        // ===============================
        // ENVIO
        // ===============================
        $mail->send();

        header('Location: contato.php?enviado=1');
        exit;

    } catch (Exception $e) {
        echo '<strong>Erro ao enviar:</strong><br>';
        echo nl2br($mail->ErrorInfo);
    }
}