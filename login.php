<?php
// Verificar credenciais
if ($_POST["username"] == "Espaco" && $_POST["password"] == "291200") {
    session_start();
    $_SESSION["username"] = $_POST["username"];
    header("Location: menu_principal.php");
    exit();
} else {
    header("Location: index.html");
    exit();
}
?>
