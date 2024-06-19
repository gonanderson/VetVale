<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitiza os dados do formulário
    $name = filter_var(trim($_POST["name"]), FILTER_SANITIZE_STRING);
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $phone = filter_var(trim($_POST["phone"]), FILTER_SANITIZE_STRING);
    $message = filter_var(trim($_POST["message"]), FILTER_SANITIZE_STRING);

    // Verifica se os campos estão preenchidos
    if (empty($name) || empty($email) || empty($phone) || empty($message)) {
        echo "Todos os campos são obrigatórios.";
        exit;
    }

    // Valida o e-mail
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "E-mail inválido.";
        exit;
    }

    // Destinatário do e-mail
    $to = "anderson@vetvaledistribuidora.com.br";
    $subject = "Nova mensagem de contato de $name";

    // Cabeçalhos do e-mail
    $headers = "From: $name <$email>" . "\r\n" .
               "Reply-To: $email" . "\r\n" .
               "X-Mailer: PHP/" . phpversion();

    // Corpo do e-mail
    $email_content = "Nome: $name\n";
    $email_content .= "E-mail: $email\n";
    $email_content .= "Telefone: $phone\n\n";
    $email_content .= "Mensagem:\n$message\n";

    // Envia o e-mail
    if (mail($to, $subject, $email_content, $headers)) {
        echo "Mensagem enviada com sucesso!";
    } else {
        echo "Erro ao enviar mensagem.";
    }
} else {
    echo "Método de envio inválido.";
}
?>
