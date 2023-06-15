<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: index.html");
    exit();
}
?>

<!DOCTYPE html>
<html>
<Meta charset="utf-8">
<head>
    <title>Espaço Pet</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="container">
        <h1>Bem-vindo(a), <?php echo $_SESSION["username"]; ?>!</h1>
        <nav>
            <ul>

                <li><a href="cadastrar_cliente.php">Cadastrar Cliente</a></li>
                <li><a href="cadastrar_pet.php">Cadastrar Pet</a></li>
                <li><a href="criar_consulta.php">Criar Consulta</a></li>
                <li><a href="consultas.php">Consultas</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </div>
</body>
</Meta>
</html>
