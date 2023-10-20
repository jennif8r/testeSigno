<?php
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "test";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}
$sql = "SELECT id, nome, telefone FROM formulario";
$result = $conn->query($sql);

if (!$result) {
    die("Erro na consulta: " . $conn->error);
}
$pesquisa = "";
if (isset($_GET['pesquisa'])) {
    $pesquisa = $_GET['pesquisa'];

    $sql = "SELECT id, nome, telefone FROM formulario WHERE nome LIKE '%$pesquisa%' OR telefone LIKE '%$pesquisa%'";
    $result = $conn->query($sql);
    if (!$result) {
        die("Erro na consulta: " . $conn->error);
    }
}
?>