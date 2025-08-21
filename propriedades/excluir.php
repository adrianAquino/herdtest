<?php
include("../config/conexao.php");

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql_delete = "DELETE FROM propriedades WHERE codPropriedades = $id";
    mysqli_query($conn, $sql_delete);
}

header("Location: listar.php");
exit;
?>