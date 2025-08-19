<?php
include("../config/conexao.php");
include("../includes/header.php");

if(isset($_POST['submit'])) {
    // Receber dados do formulário
    $nome = mysqli_real_escape_string($conn, $_POST['nome']);
    $tipoRaca = mysqli_real_escape_string($conn, $_POST['tipoRaca']);
    $descricao = mysqli_real_escape_string($conn, $_POST['descricao']);
    $origemRaca = mysqli_real_escape_string($conn, $_POST['origemRaca']);


    // Query de inserção
    $sql = "INSERT INTO raca (
        nome, tipoRaca, descricao, origemRaca
    ) VALUES (
        '$nome', '$tipoRaca', '$descricao', '$origemRaca'
    )";

    if(mysqli_query($conn, $sql)) {
        echo "<p class='sucesso'>Raça cadastrada com sucesso!</p>";
    } else {
        echo "<p class='erro'>Erro ao cadastrar Raça: " . mysqli_error($conn) . "</p>";
    }
}

?>


<main>
    <h2>Adicionar Raça</h2>
    <form action="" method="POST" class="form-crud">
        <label>Nome:</label>
        <input type="text" name="nome" required>

        <label>Tipo da Raça:</label>
        <input type="text" name="tipoRaca" required>

        <label>Descrição:</label>
        <input type="textarea" name="descricao" required>

        <label>Origem da Raça:</label>
        <input type="text" name="origemRaca" required>


        <button type="submit" name="submit" class="btn-crud">Salvar</button>
    </form>
    <a href="listar.php" class="btn-back btn-crud">Voltar</a>
</main>

