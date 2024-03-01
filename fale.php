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
    <main>
        <h1>Em que podemos ajudá-lo hoje?</h1>

        <p>Preencha apenas os campos que correspondem à sua solicitação.</p>

        <form class="form" action="" method="POST">

            <div id="container__email">
                <h3 class="E-mail">E-mail</h3>
                <input type="email" name="email" placeholder="e-mail" required>
            </div>

            <div id="container__senha">
                <h3 class="Password">Selecione a opção que mais se adequa a sua solicitação:</h3>
                <select name="categoria" id="" required>
                    <option value="" data-default disabled selected></option>
                    <option value="1">Sugestão</option>
                    <option value="2">Avaliação</option>
                    <option value="3">Reclamação</option>
                </select>
            </div>

            <div id="container__email">
                <h3 class="E-mail">Digite aqui a sua solicitação:</h3>
                <input type="text" name="texto" placeholder="Digite aqui" required>
            </div>

            <div id="Buttonitr">
                <input class="Button-Login" type="submit" value="Enviar"></input>
            </div>
    </main>


    <?php

    if (isset($_SESSION['adm_id']) && $_SESSION['adm_id'] == true) {
        echo '<a href="solicitacoes.php">Ver solicitações</a>';
    }

    ?>

    </form>
</body>

</html>