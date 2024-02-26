<?php
session_start();
include 'conexao.php';

if (isset($_SESSION['adm_id'])) {
    header('Location: home.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['senha'];

    $sql = "SELECT usuario_id, usuario_senha FROM usuarios WHERE usuario_email = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $email);
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_store_result($stmt);

            if (mysqli_stmt_num_rows($stmt) == 1) {
                mysqli_stmt_bind_result($stmt, $id_funcionario, $stored_password);
                mysqli_stmt_fetch($stmt);

                if (password_verify($password, $stored_password)) {
                    $_SESSION['adm_id'] = $id_funcionario;
                    header('Location: home.php');
                    exit();
                } else {
                    echo "<script>alert('Dados incorretos, tente novamente.'); window.location.href = 'index.php';</script>";
                }
            } else {
            }
        } else {
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Erro na preparação da consulta: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quasar - Login</title>
    <link rel="icon" href="assets/img/icon.png">
    <link rel="stylesheet" href="assets/css/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
</head>

<body>

    <div id="container__content">
        <div id="container__login">
            <form class="form" action="" method="POST">
                <div id="container__h2">
                    <h2 class="login">LOGIN</h2><br>
                </div>

                <div id="container__email">
                    <h3 class="E-mail">E-mail</h3>
                    <input type="email" class="Hr2" id="email" name="email" placeholder="Email" required>
                </div>

                <div id="container__senha">
                    <h3 class="Password">Senha</h3>
                    <input type="password" class="Hr3" id="senha" name="senha" placeholder="Senha" required>
                </div>

                <div id="alts">
                    <a href="cadastro.php" class="cadastro">Cadastre-se</a>
                </div>

                <div id="Buttonitr">
                    <input class="Button-Login" type="submit" value="Login"></input>
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

    <footer>

    </footer>
</body>

</html>