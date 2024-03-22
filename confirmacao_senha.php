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
    include 'conexao.php';

    if (isset($_SESSION['submitted'])) {
        $alert_message = "<script>alert('Senha atualizada com sucesso!');</script>";
        unset($_SESSION['submitted']);
        echo $alert_message;
        echo '<script>setTimeout(function() { window.location.href = "redefine.php"; }, 300);</script>';
        exit();
    }

    ?>

</body>

</html>