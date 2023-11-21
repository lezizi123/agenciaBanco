<?php
session_start();

// Verifica se o usuário está autenticado
if (!isset($_SESSION['idi'])) {
    header("Location: index.php");
    exit();
}

$host = "localhost";
$user = "root";
$password = "root";
$database = "saep_database";

$conn = mysqli_connect($host, $user, $password, $database);


if (!$conn) {
    die("Falha na conexão: " . mysqli_connect_error());
}

$gerenteId = $_SESSION['id'];
$sqlGerente = "SELECT * FROM gerentes WHERE id='$gerenteId'";
$resultGerente = mysqli_query($conn, $sqlGerente);

if (!$resultGerente || mysqli_num_rows($resultGerente) != 1) {
    header("Location: index.php");
    exit();
}

$dadosGerente = mysqli_fetch_assoc($resultGerente);
$nomeGerente = $dadosGerente['nome'];

$sqlClientes = "SELECT * FROM clientes WHERE id_gerente='$gerenteId'";
$resultClientes = mysqli_query($conn, $sqlClientes);

if (!$resultClientes) {
    die("Erro na consulta SQL: " . mysqli_error($conn));
}

if (mysqli_num_rows($resultClientes) > 0) {
    //código    
} else {
    echo "Nenhum cliente encontrado.";
}


?>