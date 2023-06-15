<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: index.html");
    exit();
}

 // Conectar ao banco de dados
    $conn = new mysqli("localhost", "root", "root", "petshop");

// Verificar a conexão
if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

// Obter a lista de clientes para exibir no formulário
$sql = "SELECT id, nome FROM clientes";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $clientes = $result->fetch_all(MYSQLI_ASSOC);
} else {
    $clientes = array();
} 

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obter os dados do formulário
    $id_cliente = $_POST["id_cliente"];
    $nome = $_POST["nome"];
    $especie = $_POST["especie"];
    $raca = $_POST["raca"];
    $idade = $_POST["idade"];

    // Inserir o novo pet no banco de dados
    $sql = "INSERT INTO pets (id_cliente, nome, especie, raca, idade) VALUES ('$id_cliente', '$nome', '$especie', '$raca', '$idade')";

    if ($conn->query($sql) === TRUE) {
        echo "Pet cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar o pet: " . $conn->error;
    }
} 

$conn->close(); 
?> 

<!DOCTYPE html>
<html>
<head>
    <title>Espaço Pet</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div class="container">
        <h1><a href="menu_principal.php">Cadastrar Pet</a></h1>

        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">

            <select name="id_cliente">
                <?php foreach ($clientes as $cliente): ?>
                    <option value="<?php echo $cliente["id"]; ?>"><?php echo $cliente["nome"]; ?></option>
                <?php endforeach; ?>
            </select>

            <label for="nome">Nome</label>
            <input type="text" name="nome" required>

            <label for="nome">Especie</label>
            <input type="text" name="especie">

            <label for="nome">Raça</label>
            <input type="text" name="raca" >

            <label for="nome">Idade</label>
            <input type="number" name="idade">

            <input type="submit" value="Cadastrar" class="enviar">

        </form>
    </div>
</body>
</html>
