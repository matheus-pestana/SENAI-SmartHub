<?php
session_start();
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
                    echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
                    echo "<script>
                            document.addEventListener('DOMContentLoaded', function() {
                                swal('Erro', 'As credenciais fornecidas estão incorretas. Por favor, tente novamente.', 'error');
                            });
                          </script>";
                }
            } else {
                echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
                echo "<script>
                        document.addEventListener('DOMContentLoaded', function() {
                            swal('Erro', 'Nenhum usuário encontrado com esse email.', 'error')
                            });
                    </script>";
            }
        }
    } else {
        echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
        echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    swal('Erro', 'Erro na execução da consulta.', 'error')
                });
                </script>";
    }

    mysqli_stmt_close($stmt);
}

mysqli_close($conn);
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

        <div id="login_background">
            <img class="backgroundimage" src="assets/img/login_background.png">
        </div>

        <div id="container__login">
            <form class="form" action="" method="POST">
                <h1 class="login_title">Entre na sua conta</h1>
                <p class="login_text">Acesse sua conta informando seu e-mail e senha</p>

                <div id="alts">
                    <a href="index.php" class="index">Login</a>
                    <a href="cadastro.php" class="cadastro">Cadastro</a>
                </div>

                <div id="inputs">
                    <input type="email" class="inputs" id="email" name="email" placeholder="Email" required>
                    <input type="password" class="inputs" id="senha" name="senha" placeholder="Senha" minlength="8" required>
                </div>

                <div id="links">
                    <input class="login_btn" type="submit" value="Login"></input>
                    <a class="esqueceu" href="redefine.php">Esqueceu a senha?</a>
                </div>

            </form>
        </div>

    </div>
</body>

</html>