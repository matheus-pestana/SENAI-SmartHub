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
    echo "<table border='1'><tr><th>E-mail</th><th>Reclamação</th><th>Sugestão</th><th>Avaliação</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["usuario_email"] . "</td><td>" . $row["categoria"] . "</td><td>" . $row["texto"] . "</td><td>" . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "Não há solicitações armazenadas.";
}

$conn->close();

?>
