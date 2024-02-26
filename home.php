<?php
session_start();

include 'conexao.php';

if (!isset($_SESSION["adm_id"])) {
    header("Location: index.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartHub - Home</title>
    <link rel="icon" href="assets/img/icon.png">
    <link rel="stylesheet" href="assets/css/home.css">
</head>

<body>
    <nav id="navbar">
        <img class="logo" src="assets/img/logo.png" alt="">
        <div id="navbar__itens">
            <a href="#">Serviços</a>
            <a href="#">Quem Somos</a>
            <a href="#">Contato</a>
        </div>
    </nav>
    <div id="barra_roxa"></div>

</body>

</html>