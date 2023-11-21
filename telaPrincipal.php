<?php
session_start();
$host = "localhost";
$user = "root";
$password = "root";
$database = "saep_database";

$conn = mysqli_connect($host, $user, $password, $database);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela Principal</title>
    <style>
        body {
            background-color: #ecf5e5; 
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .topbar {
            background-color: #4caf50;
            color: white;
            padding: 10px;
            max-width: 200rem; /* Ajuste a largura máxima conforme necessário */
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 20px;
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            border-radius: 20px;
            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.1);

        }

        .logout {
            color: green;
            text-decoration: none;
            padding: 5px 10px;
            border-radius: 5px;
            background-color: white;
            margin-right: 20px;
        }

        .cadastro{
            color: white;
            margin-left: 75rem;
            margin-bottom: 10px;
            text-decoration: none;
            font-size: 25px;


        }

        .content {
            margin: 20px;
        }

        .client-list {
            width: 60%;
            margin: auto;
            border-collapse: collapse;
            margin-top: 10rem;
            background-color: green ;
            color: white;

        }

        .client-list th {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }


        th, td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }


        th {
            background-color:#4caf50;
            color: #fff;
        }


        tr:hover {
            background-color: green;
        }
        
    
            </style>

<script>
        function confirmarExclusao() {
            return confirm("Tem certeza que deseja excluir?");
        }
    </script>
    
</head>
<body>
    <div class="topbar">
        <h2>Bem-vindo, <?php echo $_SESSION['gerente']; ?>!</h2>
        <a class= "cadastro" href="clientes.php">Cadastro de clientes</a>
        <a class="logout" href="index.php">Logout</a>
    </div>
    <div class="content">
        <table class="client-list">
            <thead>
                <tr>
                    <th style="width: 20px;">id</th>
                    <th style="width: 300px;">Nome </th>
                    <th style="width: 300px;">Ações      </th>
                </tr>
                
                <tr>
                    
                    <?php
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
                    
                    $sqlClientes = "SELECT * FROM cliente WHERE gerente='".$gerenteId."'";
                    $resultClientes = mysqli_query($conn, $sqlClientes);
                    
                    if (!$resultClientes) {
                        die("Erro na consulta SQL: " . mysqli_error($conn));
                    }
                    
                        while ($row = $resultClientes->fetch_assoc()) {
                            echo '<tr>';
                            echo '<td>' . $row['id'] . '</td>';
                            echo '<td>' . $row['nome'] . '</td>';
                            echo "<td class='actions'>";
                            echo "<a href='visualizar.php?cliente_id=" . $row["id"] . "'>Visualizar</a>";
                            echo "<a href='excluir_cliente.php?cliente_id=" . $row["id"] . "'>Excluir</a>";
                            echo "<a href='adicionar_cartao.php?cliente_id=" . $row["id"] . "'>Adicionar Cartão</a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                   
                    ?>

                </tr>
                

            </thead>

        </table>
    </div>
</body>
</html>
