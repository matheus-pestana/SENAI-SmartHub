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
    <title>Document</title>
</head>
<body>
    teste
    
    <a href="logout.php">logout</a>
</body>
</html>