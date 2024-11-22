<?php
session_start();
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $nova_senha = $_POST['password'];

    $senha_criptografada = password_hash($nova_senha, PASSWORD_DEFAULT);

    if (!empty($email) && !empty($nova_senha)) {
        $sql = "UPDATE usuarios SET usuario_senha='" . $senha_criptografada . "' WHERE usuario_email='" . $email . "'";
        $_SESSION['submitted'] = true;

        if ($conn->query($sql) === TRUE) {
            header('location: confirmacao_senha.php');
        } else {
            $message = "Erro ao redefinir a senha: " . $conn->error;
        }
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quasar - Redefinir Senha</title>
    <link rel="icon" href="assets/img/icon.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/redefine.css">
</head>

<body>

    <div id="container__content">

        <div id="background__image"></div>

        <div id="container__login">
            <form class="form" action="" method="POST">
                <h1 class="login_title">Redefinir sua senha</h1>
                <p class="login_text">Informe seu e-mail para redefinir sua senha</p>

                <div id="inputs">
                    <input type="email" class="inputs" id="email" name="email" placeholder="Email" required>
                    <input type="password" class="inputs" id="password" name="password" placeholder="Nova senha" required>
                </div>

                <div id="links">
                    <a class="volta" href="index.php">Voltar para o login</a>
                    <input class="redefine_btn" type="submit" value="Redefinir Senha"></input>
                </div>

            </form>
        </div>

    </div>

    <footer>

    </footer>
</body>

</html>