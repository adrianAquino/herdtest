<?php
include("../config/conexao.php");
include("../includes/header.php");

// Verifica se recebeu ID do produtor
if (!isset($_GET['id'])) {
    header("Location: listar.php");
    exit;
}

$id = $_GET['id'];

// Buscar dados do produtor
$sql = "SELECT * FROM propriedades WHERE codPropriedades = $id";
$result = mysqli_query($conn, $sql);
$propriedades = mysqli_fetch_assoc($result);

// Atualizar produtor
if (isset($_POST['submit'])) {
    $nome = mysqli_real_escape_string($conn, $_POST['nome']);
    $cidade = mysqli_real_escape_string($conn, $_POST['cidade']);
    $estado = mysqli_real_escape_string($conn, $_POST['estado']);
    $estrada = mysqli_real_escape_string($conn, $_POST['estrada']);
    $areaTotal = mysqli_real_escape_string($conn, $_POST['areaTotal']);
    $latitude = mysqli_real_escape_string($conn, $_POST['latitude']);
    $longitude = mysqli_real_escape_string($conn, $_POST['longitude']);
    $quantidadeAnimais = mysqli_real_escape_string($conn, $_POST['quantidadeAnimais']);
    $responsavelTecnico = mysqli_real_escape_string($conn, $_POST['responsavelTecnico']);
    $idProdutores = mysqli_real_escape_string($conn, $_POST['idProdutores']);


    $sql_update = "UPDATE propriedades SET 
        nome='$nome',
        cidade='$cidade',
        estado='$estado',
        estrada='$estrada',
        areaTotal='$areaTotal',
        latitude='$latitude',
        longitude='$longitude',
        quantidadeAnimais='$quantidadeAnimais',
        responsavelTecnico='$responsavelTecnico',
        idProdutores='$idProdutores'
        WHERE codPropriedades=$id";

    if (mysqli_query($conn, $sql_update)) {
        echo "<p class='sucesso'>Propriedade atualizada com sucesso!</p>";
    } else {
        echo "<p class='erro'>Erro ao atualizar a Propriedade: " . mysqli_error($conn) . "</p>";
    }

    // Atualiza variável $produtor para mostrar dados novos
    $result = mysqli_query($conn, "SELECT * FROM propriedades WHERE codPropriedades = $id");
    $propriedades = mysqli_fetch_assoc($result);
}
?>

<main>
    <h2>Editar Propriedade</h2>
    <form action="" method="POST" class="form-crud">
        <label>Nome:</label>
        <input type="text" name="nome" value="<?php echo $propriedades['nome']; ?>" required>

        <label>Cidade:</label>
        <input type="text" name="cidade" value="<?php echo $propriedades['cidade']; ?>" required>

        <label>Estado:</label>
        <input type="text" name="estado" value="<?php echo $propriedades['estado']; ?>" required>

        <label>Estrada:</label>
        <input type="text" name="estrada" value="<?php echo $propriedades['estrada']; ?>" required>

        <label>Área Total:</label>
        <input type="text" name="areaTotal" value="<?php echo $propriedades['areaTotal']; ?>" required>

        <label>Latitude:</label>
        <input type="text" name="latitude" value="<?php echo $propriedades['latitude']; ?>" required>

        <label>Longitude:</label>
        <input type="text" name="longitude" value="<?php echo $propriedades['longitude']; ?>" required>

        <label>Quantidade de Animais</label>
        <input type="number" name="quantidadeAnimais" value="<?php echo $propriedades['quantidadeAnimais']; ?>"
            required>

        <label>Responsável Técnico:</label>
        <input type="text" name="responsavelTecnico" value="<?php echo $propriedades['responsavelTecnico']; ?>"
            required>

        <label>Produtor:</label>
        <select name="idProdutores" required>
            <option value="">Selecione um produtor</option>
            <?php
            // Buscar todos os produtores
            $sqlProdutores = "SELECT codProdutores, nome FROM produtores ORDER BY nome ASC";
            $resultProdutores = mysqli_query($conn, $sqlProdutores);

            while ($produtor = mysqli_fetch_assoc($resultProdutores)) {
                // Se o produtor for o que já está relacionado à propriedade, ele vem selecionado
                $selected = ($produtor['codProdutores'] == $propriedades['idProdutores']) ? "selected" : "";
                echo "<option value='" . $produtor['codProdutores'] . "' $selected>" . $produtor['nome'] . "</option>";
            }
            ?>
        </select>

        <button type="submit" name="submit" class="btn-crud">Atualizar</button>
    </form>
    <a href="listar.php" class="btn-back btn-crud">Voltar</a>
</main>


<?php include("../includes/footer.php"); ?>