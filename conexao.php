<?php
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $database = "db_smarthub";

    $conn = new mysqli($hostname, $username, $password, $database);

    if ($conn->connect_error) {
        die("Erro na conexão: " . $conn->connect_error);
    }
?>