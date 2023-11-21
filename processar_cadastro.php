<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $host = "localhost";
    $user = "root";
    $password = "root";
    $database = "saep_database";

    $conn = new mysqli($host, $user, $password, $database);

    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }

    // Recuperar dados do formulário
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];
    $cpf = $_POST["cpf"];
    $gerenteId = $_SESSION['id']; 

    // Inserir dados no banco de dados
    $sql = "INSERT INTO cliente (nome, email, telefone, cpf, gerente) VALUES ('$nome', '$email', '$telefone', '$cpf', '$gerenteId')";
    
    if ($conn->query($sql) === TRUE) {
        $mensagem = "Cadastro realizado com sucesso!";
    } else {
        $mensagem = "Erro ao cadastrar: " . $conn->error;
    }
    // Fechar a conexão com o banco de dados
    $conn->close();
} else {
    header("Location: telaPrincipal.php");
    exit();
}
?>
