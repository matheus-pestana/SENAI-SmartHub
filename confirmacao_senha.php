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
        echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                swal({
                    title: 'Sucesso!',
                    text: 'Senha atualizada com sucesso!',
                    icon: 'success',
                    button: 'Ok',
                }).then(() => {
                    window.location.href = 'redefine.php';
                });
            });
        </script>";
        unset($_SESSION['submitted']);
        exit();
    }
    

    ?>

</body>

</html>