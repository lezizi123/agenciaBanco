<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Cliente</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            width: 40%;
            margin: 5% auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h1 {
            color: #4caf50;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin: 10px 0 5px;
            color: #333;
            font-weight: bold;
        }

        p {
            margin: 0 0 20px;
            color: #666;
        }

        a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4caf50;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        a:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Dados do Cliente</h1>

        <?php
        // Verifique se foi passado um parâmetro de cliente_id na URL
        if (isset($_GET['cliente_id'])) {
            $clienteId = $_GET['cliente_id'];

           
            $host = "localhost";
            $user = "root";
            $password = "root";
            $database = "saep_database";

            $conn = mysqli_connect($host, $user, $password, $database);

            if ($conn->connect_error) {
                die("Falha na conexão: " . $conn->connect_error);
            }

            $query = "SELECT * FROM cliente WHERE id = $clienteId";
            $result = $conn->query($query);

            if ($result && $result->num_rows > 0) {
                $clienteData = $result->fetch_assoc();

                echo "<label for='nome'>Nome:</label>";
                echo "<p>{$clienteData['nome']}</p>";

                echo "<label for='email'>Email:</label>";
                echo "<p>{$clienteData['email']}</p>";

                echo "<label for='telefone'>Telefone:</label>";
                echo "<p>{$clienteData['telefone']}</p>";

                echo "<label for='cpf'>CPF:</label>";
                echo "<p>{$clienteData['cpf']}</p>";
            } else {
                echo "<p>Dados do cliente não encontrados.</p>";
            }

            $conn->close();
        } else {
            echo "<p>Cliente não especificado.</p>";
        }
        ?>

        <a href="javascript:history.back()">Voltar</a>
    </div>
</body>
</html>
