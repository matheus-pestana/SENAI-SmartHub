<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $password = $_POST['senha'];

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios (usuario_nome, usuario_email, usuario_senha) VALUES (?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sss", $nome, $email, $hashed_password);
        if (mysqli_stmt_execute($stmt)) {
            echo "<script>alert('Usuário Cadastrado com Sucesso.'); window.location.href = 'index.php';</script>";
        } else {
            echo "<script>alert('Erro ao cadastrar usuário.');</script>";
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "<script>alert('Erro na preparação da consulta.');</script>";
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quasar - Cadastro</title>
    <link rel="icon" href="assets/img/icon.png">
    <link rel="stylesheet" href="assets/css/cadastro.css">
    <script src="assets/js/senha.js"></script>
    <script src="assets/js/validaEmail.js"></script>
</head>

<body>

    <div id="background__image"></div>

    <div id="container__content">
        <div id="container__login">

            <img src="assets/img/logo.png" class="logo">

            <form name="f1" class="form" action="" method="POST" onsubmit="return validacaoEmail(f1.email)">

                <div id="container__nome">
                    <span class="nome">Nome</span>
                    <input type="nome" class="inputs" id="nome" name="nome" placeholder="Nome" required>
                </div>

                <div id="container__email">
                    <span class="E-mail">E-mail</span>
                    <input type="email" class="inputs" id="email" name="email" placeholder="e-mail" required>
                </div>

                <div id="container__senha">
                    <span class="Password">Senha</span>
                    <input type="password" class="inputs" id="senha" name="senha" placeholder="senha" minlength="8" required>
                </div>


                <div id="alts">
                    <label class="exibe"><input type="checkbox" onclick="mostraSenha()">Exibir senha</label>
                    <a href="index.php" class="cadastro">Entrar com e-mail</a>
                </div>

                <div id="cadastrobtn">
                    <input type="submit" class="cadastro_btn" value="Cadastrar-se">
                </div>

            </form>
        </div>

    </div>
</body>

</html>