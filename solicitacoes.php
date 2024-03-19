<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitações</title>
    <link rel="icon" href="assets/img/icon.png">
    <link rel="stylesheet" href="assets/css/solicitacoes.css">
</head>

<body>
    <div id="nav">
        <a href="fale.php" class="previous">&laquo; Voltar</a>
        <h1 class="title">Solicitações</h1>
    </div>


    <?php
    session_start();
    include 'conexao.php';

    if (!isset($_SESSION["adm_id"])) {
        header("Location: index.php");
        exit();
    }

    $sql = "SELECT * FROM fale_conosco";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h2>Solicitações Armazenadas</h2>";
        echo "<table border='1'><tr><th>E-mail</th><th>Categoria</th><th>Texto</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td class='email'>" . $row["usuario_email"] . "</td><td>" . $row["categoria"] . "</td><td class='texto'>" . $row["texto"] . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "Não há solicitações armazenadas.";
    }

    $conn->close();

    ?>
</body>

</html>