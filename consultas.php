<?php
// Conectar ao banco de dados
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "petshop";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar a conexão
if ($conn->connect_error) {
  die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Consultar as consultas no banco de dados
$sql = "SELECT * FROM consultas";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
  <Meta charset="utf-8">
<head>
  <title>Consultas</title>
</head>
<body>
  <h1><a href="menu_principal.php">Consultas</a></h1>
  <?php

  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      echo "<h3>Consulta ID: " . $row["id"] . "</h3>";
      echo "<p><strong>Cliente:</strong> " . $row["id_cliente"] . "</p>";
      echo "<p><strong>Data:</strong> " . $row["data"] . "</p>";
      echo "<p><strong>Hora:</strong> " . $row["hora"] . "</p>";
      echo "<p><strong>Problema:</strong> " . $row["descricao"] . "</p>";
      echo "<hr>";
    }
  } else {
    echo "<p>Nenhuma consulta encontrada.</p>";
  }

  // Fechar a conexão com o banco de dados
  $conn->close();
  ?>
</body>
</Meta>
</html>
