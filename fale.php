<?php
session_start();
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['reclamacao']) && isset($_POST['sugestao']) && isset($_POST['avaliacao'])) {

        $email = $_POST['email'];
        $reclamacao = $_POST['reclamacao'];
        $sugestao = $_POST['sugestao'];
        $avaliacao = $_POST['avaliacao'];

        if (!empty($email) && !empty($reclamacao) && !empty($sugestao) && !empty($avaliacao)) {
            $sql = "INSERT INTO fale_conosco (usuario_email, reclamacao, sugestao, avaliacao) VALUES ('$email', '$reclamacao', '$sugestao', '$avaliacao')";

            if ($conn->query($sql) === TRUE) {
                header("Location: confirmacao.php?success=true");
            } else {
                echo "Erro ao inserir dados: " . $conn->error;
            }
        } else {
            echo "Por favor, preencha todos os campos!";
        }
    } else {
        echo "Por favor, preencha todos os campos!";
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
                <input type="text" name="email" placeholder="Reclamação" required>
            </div>

            <div id="container__email">
                <h3 class="E-mail">Reclamação</h3>
                <input type="text" name="reclamacao" placeholder="Reclamação">
            </div>

            <div id="container__senha">
                <h3 class="Password">Sugestão</h3>
                <input type="text" name="sugestao" placeholder="Sugestão">
            </div>

            <div id="container__senha">
                <h3 class="Password">Avaliação</h3>
                <input type="text" name="avaliacao" placeholder="Avaliação">
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