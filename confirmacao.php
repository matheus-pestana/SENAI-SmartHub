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
        echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>;
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            swal({
                title: 'Sucesso!',
                text: 'Solicitação enviada com sucesso.',
                icon: 'success', // Ícone de sucesso
                button: 'Ok',
                content: {
                    element: 'div',
                    attributes: {
                        style: 'font-family: Arial, sans-serif; font-size: 16px;'
                    }
                },
            }).then(() => {
                window.location.href = 'fale.php';
            });
        });
        </script>";
        unset($_SESSION['submitted']);
        exit();
    }

    ?>

</body>

</html>