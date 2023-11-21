<?php
session_start();
$host = "localhost";
$user = "root";
$password = "root";
$database = "saep_database";

$conn = mysqli_connect($host, $user, $password, $database);


if (!$conn) {
    die("Falha na conexão: " . mysqli_connect_error());
}

if (isset($_POST['logar'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $senha = mysqli_real_escape_string($conn, $_POST['senha']);

    $sql = "SELECT * FROM `gerente` WHERE `email`='".$email."' AND `senha`='".$senha."';";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        
        $_SESSION['id'] = $row['id']; 
        $_SESSION['gerente'] = $row['nome'];


        
        echo '<p id="invalid-msg" class="dio">Login feito com sucesso.</p>';
        header("Location: telaPrincipal.php");
        exit();
    } else {
        echo '<p id="invalid-msg" class="dio">Email ou senha inválidos.</p>';
        header("Location: index.php");

    }
}

mysqli_close($conn);
?>
