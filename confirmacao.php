<?php

session_start();

include 'conexao.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">

    <title>Confirmação</title>
</head>

<body>
    <?php
    include 'conexao.php';

    if (isset($_SESSION['submitted'])) {
        echo "<script>
       swal({
        title: 'Solicitação enviada com sucesso',
        text: 'Retornando para Fale Conosco',
        icon: 'succes',
        buttons: true,
        .then(() => {
            if (willLogout) {
              window.location.href = 'logout.php';
            }
       })
        </script>";
        unset($_SESSION['submitted']);
        exit();
    }

    ?>

</body>

</html>