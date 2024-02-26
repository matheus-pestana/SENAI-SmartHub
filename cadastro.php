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
</head>

<body>
    <div id="container__content">
        <div id="container__login">
            <form class="form" action="" method="POST">
                <div id="container__h2">
                    <h2 class="LOGIN">CADASTRO</h2><br>
                </div>

                <div id="nomeitr">
                    <h3 class="nome">Nome</h3>
                    <input type="nome" class="Hr1" id="nome" name="nome" placeholder="Nome" required>
                </div>

                <div id="E-mailitr">
                    <h3 class="E-mail">E-mail</h3>
                    <input type="email" class="Hr2" id="email" name="email" placeholder="e-mail" required>
                </div>

                <div id="Passworditr">
                    <h3 class="Password">Senha</h3>
                    <input type="password" class="Hr3" id="senha" name="senha" placeholder="senha" required>
                </div>

                <div id="alts">
                    <a href="index.php" class="cadastro">Entrar com e-mail</a>
                </div>

                <div id="Buttonitr">
                    <input type="submit" class="Button-Login" value="Cadastrar-se">
                </div>

                
                <img src="assets/img/logo.png" class="logo">
            </form>
        </div>

        <div id="background_image">
            <h1>Um mundo de oportunidades</h1>
            <h2>Encontre o melhor método de estudos para você. Venha interagir no divertido mundo da educação, conosco!</h2>
            <a href="home.php">Conheça nosso serviço.</a>
        </div>
    </div>
</body>

</html>