<?php

session_start();

include 'conexao.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmação</title>
</head>

<body>
    <?php
    session_start();
    include 'conexao.php';

    if (isset($_SESSION['submitted'])) {
        echo "<script>alert('Solicitação enviada com sucesso!');</script>";
        unset($_SESSION['submitted']);
    }

    ?>

</body>

</html>