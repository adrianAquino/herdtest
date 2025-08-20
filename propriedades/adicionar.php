<?php
include("../config/conexao.php");
include("../includes/header.php");

if (isset($_POST['submit'])) {
    // Receber dados do formulário
    $nome = mysqli_real_escape_string($conn, $_POST['nome']);
    $cidade = mysqli_real_escape_string($conn, $_POST['cidade']);
    $estado = mysqli_real_escape_string($conn, $_POST['estado']);
    $estrada = mysqli_real_escape_string($conn, $_POST['estrada']);
    $areaTotal = mysqli_real_escape_string($conn, $_POST['areaTotal']);
    $latitude = mysqli_real_escape_string($conn, $_POST['latitude']);
    $longitude = mysqli_real_escape_string($conn, $_POST['longitude']);
    $responsavelTecnico = mysqli_real_escape_string($conn, $_POST['responsavelTecnico']);
    $idProdutores = mysqli_real_escape_string($conn, $_POST['idProdutores']);

    // Query de inserção
    $sql = "INSERT INTO propriedades (
        nome, cidade, estado, estrada, areaTotal, latitude, longitude, responsavelTecnico, idProdutores
    ) VALUES (
        '$nome', '$cidade', '$estado', '$estrada', '$areaTotal', '$latitude', '$longitude', '$responsavelTecnico', '$idProdutores'
    )";

    if (mysqli_query($conn, $sql)) {
        echo "<p class='sucesso'>Propriedade cadastrada com sucesso!</p>";
    } else {
        echo "<p class='erro'>Erro ao cadastrar propriedade: " . mysqli_error($conn) . "</p>";
    }
}

?>


<main>
    <h2>Adicionar Produtor</h2>
    <form action="" method="POST" class="form-crud">
        <label>Nome:</label>
        <input type="text" name="nome" required>

        <label>Cidade:</label>
        <input type="text" name="cidade" required>

        <label>Estado:</label>
        <input type="text" name="estado" required>

        <label>Estrada:</label>
        <input type="text" name="estrada" required>

        <label>Area Total:</label>
        <input type="text" name="areaTotal" required>

        <label>Latitude:</label>
        <input type="text" name="latitude" required>

        <label>Longitude:</label>
        <input type="text" name="longitude" required>

        <label>Responsável Técnico:</label>
        <input type="text" name="responsavelTecnico" required>

        <label>Proprietário:</label>
        <select name="idProdutores" id="" required>
            <option value="">Selecione um Proprietário</option>
            <?php
            $sql = "SELECT codProdutores, nome FROM produtores ORDER BY nome";
            $resultado = mysqli_query($conn, $sql);

            // Se quiser manter selecionado após erro no POST:
            $idSelecionado = isset($_POST['idProdutores']) ? $_POST['idProdutores'] : '';

            // mysqli_fetch_assoc($resultado) retorna cada linha do SELECT como um ARRAY ASSOCIATIVO,
            // onde as chaves são os nomes das colunas da tabela e os valores são os dados da tupla.
            // Exemplo: $row["codProdutores"], $row["nome"]
            
            while ($row = mysqli_fetch_assoc($resultado)) {
                $id = $row['codProdutores'];
                $nome = $row['nome'];
                $selected = ($id == $idSelecionado) ? 'selected' : '';
                echo "<option value='{$id}' {$selected}>" . htmlspecialchars($nome) . "</option>";
            }
            ?>

        </select>


        <button type="submit" name="submit" class="btn-crud">Salvar</button>
    </form>
    <a href="listar.php" class="btn-back btn-crud">Voltar</a>
</main>














<?php include("../includes/footer.php"); ?>