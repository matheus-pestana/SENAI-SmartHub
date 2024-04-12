<?php
session_start();
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['email']) && isset($_POST['categoria']) && isset($_POST['texto'])) {

        $email = $_POST['email'];
        $categoria = $_POST['categoria'];
        $texto = $_POST['texto'];

        if (!empty($email) && !empty($categoria) && !empty($texto)) {
            $sql = "INSERT INTO fale_conosco (usuario_email, categoria, texto) VALUES ('$email', '$categoria', '$texto')";
            $_SESSION['submitted'] = true;

            if ($conn->query($sql) === TRUE) {
                header('location: confirmacao.php');
            } else {
                echo "Erro ao inserir dados: " . $conn->error;
            }
        } else {
            echo "Por favor, preencha todos os campos!";
        }
    } else {
        echo "";
    }

    $conn->close();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/img/icon.png">
    <link rel="stylesheet" href="assets/css/fale.css">
    <title>Fale Conosco!</title>
</head>

<body>

    <div id="background__image"></div>

    <main>

        <h1>Fale Conosco</h1>
        <h3>Em que podemos ajudá-lo hoje?</h3>

        <form class="form" action="" method="POST">


            <div id="container__email">
                <span>E-mail:</span>
                <input class="inputs" type="email" name="email" placeholder="e-mail" required>
            </div>

            <div id="container__opcao">
                <span>Selecione a opção que mais se adequa a sua solicitação:</span>
                <select class="inputs" name="categoria" required>
                    <option value="" data-default disabled selected></option>
                    <option value="1">Sugestão</option>
                    <option value="2">Avaliação</option>
                    <option value="3">Reclamação</option>
                </select>
            </div>

            <div id="container__texto">
                <span>Digite aqui a sua solicitação:</span>
                <input id="texto" class="inputs" type="text" name="texto" placeholder="Digite aqui" required>
            </div>

            <div id="Buttonitr">
                <input class="Button-Login" type="submit" value="Enviar"></input>
            </div>

            <div id="solicitacao">

                <?php

                if (isset($_SESSION['adm_id']) == true) {
                    echo '<a class="solicitacoes" href="solicitacoes.php">Ver solicitações</a>';
                }

                ?>

                <a draggable="true" href="home.php" class="previous">Voltar</a>

            </div>

    </main>

    </form>
</body>

</html>