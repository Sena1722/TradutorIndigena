<?php
include("conexao.php");

$letra = $mysqli->real_escape_string($_GET['letra']);
$letra = strtoupper($letra);

$sql_code = "SELECT *
            FROM dicionario 
            WHERE palavra LIKE '$letra%'";
$sql_query = $mysqli->query($sql_code) or die("Erro ao consultar! " . $mysqli->error);

if ($sql_query->num_rows == 0) {
    echo "<tr><td colspan='2'>Nenhuma palavra encontrada com a letra '$letra'.</td></tr>";
} else {
    while ($dados = $sql_query->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $dados['palavra'] . "</td>";
        echo "<td>" . $dados['significado'] . "</td>";
        echo "</tr>";
    }
}
?>
