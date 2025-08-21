<?php
include("../config/conexao.php");
include("../includes/header.php");

// Verifica se recebeu ID do animal
if (!isset($_GET['id'])) {
    header("Location: listar.php");
    exit;
}

$id = $_GET['id'];

// Buscar dados do animal
$sql = "SELECT * FROM animais WHERE codAnimais = $id";
$result = mysqli_query($conn, $sql);
$animal = mysqli_fetch_assoc($result);

// Atualizar animal
if (isset($_POST['submit'])) {
    $numeracaoBrinco = mysqli_real_escape_string($conn, $_POST['numeracaoBrinco']);
    $sexo = mysqli_real_escape_string($conn, $_POST['sexo']);
    $dataNascimento = mysqli_real_escape_string($conn, $_POST['dataNascimento']);
    $idade = mysqli_real_escape_string($conn, $_POST['idade']);
    $pelagem = mysqli_real_escape_string($conn, $_POST['pelagem']);
    $origem = mysqli_real_escape_string($conn, $_POST['origem']);
    $situacaoReprodutiva = mysqli_real_escape_string($conn, $_POST['situacaoReprodutiva']);
    $nomePai = mysqli_real_escape_string($conn, $_POST['nomePai']);
    $nomeMae = mysqli_real_escape_string($conn, $_POST['nomeMae']);
    $valorMercadoAtual = mysqli_real_escape_string($conn, $_POST['valorMercadoAtual']);
    $situacaoComercial = mysqli_real_escape_string($conn, $_POST['situacaoComercial']);
    $idRaca = mysqli_real_escape_string($conn, $_POST['idRaca']);
    $idPropriedade = mysqli_real_escape_string($conn, $_POST['idPropriedade']);

    $sql_update = "UPDATE animais SET 
        numeracaoBrinco='$numeracaoBrinco',
        sexo='$sexo',
        dataNascimento='$dataNascimento',
        idade='$idade',
        pelagem='$pelagem',
        origem='$origem',
        situacaoReprodutiva='$situacaoReprodutiva',
        nomePai='$nomePai',
        nomeMae='$nomeMae',
        valorMercadoAtual='$valorMercadoAtual',
        situacaoComercial='$situacaoComercial',
        idRaca='$idRaca',
        idPropriedades='$idPropriedade'
        WHERE codAnimais=$id";

    if (mysqli_query($conn, $sql_update)) {
        echo "<p class='sucesso'>Animal atualizado com sucesso!</p>";
    } else {
        echo "<p class='erro'>Erro ao atualizar o Animal: " . mysqli_error($conn) . "</p>";
    }

    // Atualiza variável $animal para mostrar dados novos
    $result = mysqli_query($conn, "SELECT * FROM animais WHERE codAnimais = $id");
    $animal = mysqli_fetch_assoc($result);
}
?>

<main>
    <h2>Editar Animal</h2>
    <form action="" method="POST" class="form-crud">
        <label>Numeração do Brinco:</label>
        <input type="text" name="numeracaoBrinco" value="<?php echo $animal['numeracaoBrinco']; ?>" required>

        <label>Sexo:</label>
        <input type="text" name="sexo" value="<?php echo $animal['sexo']; ?>" required>

        <label>Data de Nascimento:</label>
        <input type="date" name="dataNascimento" value="<?php echo $animal['dataNascimento']; ?>">

        <label>Idade:</label>
        <input type="text" name="idade" value="<?php echo $animal['idade']; ?>">

        <label>Pelagem:</label>
        <input type="text" name="pelagem" value="<?php echo $animal['pelagem']; ?>" required>

        <label>Origem:</label>
        <input type="text" name="origem" value="<?php echo $animal['origem']; ?>" required>

        <label>Situação Reprodutiva:</label>
        <input type="text" name="situacaoReprodutiva" value="<?php echo $animal['situacaoReprodutiva']; ?>" required>

        <label>Filiação Paterna:</label>
        <input type="text" name="nomePai" value="<?php echo $animal['nomePai']; ?>" required>

        <label>Filiação Materna:</label>
        <input type="text" name="nomeMae" value="<?php echo $animal['nomeMae']; ?>" required>

        <label>Valor de Mercado Atual:</label>
        <input type="text" name="valorMercadoAtual" value="<?php echo $animal['valorMercadoAtual']; ?>" required>

        <label>Situação Comercial:</label>
        <input type="text" name="situacaoComercial" value="<?php echo $animal['situacaoComercial']; ?>" required>

        <label>Raça:</label>
        <select name="idRaca" required>
            <option value="">Selecione uma Raça</option>
            <?php
            $sqlRaca = "SELECT codRaca, nome FROM raca ORDER BY nome";
            $resultRaca = mysqli_query($conn, $sqlRaca);
            while ($raca = mysqli_fetch_assoc($resultRaca)) {
                $selected = ($raca['codRaca'] == $animal['idRaca']) ? "selected" : "";
                echo "<option value='" . $raca['codRaca'] . "' $selected>" . $raca['nome'] . "</option>";
            }
            ?>
        </select>

        <label>Propriedade:</label>
        <select name="idPropriedade" required>
            <option value="">Selecione uma Propriedade</option>
            <?php
            $sqlProp = "SELECT codPropriedades, nome FROM propriedades ORDER BY nome";
            $resultProp = mysqli_query($conn, $sqlProp);
            while ($prop = mysqli_fetch_assoc($resultProp)) {
                $selected = ($prop['codPropriedades'] == $animal['idPropriedades']) ? "selected" : "";
                echo "<option value='" . $prop['codPropriedades'] . "' $selected>" . $prop['nome'] . "</option>";
            }
            ?>
        </select>

        <button type="submit" name="submit" class="btn-crud">Atualizar</button>
    </form>
    <a href="listar.php" class="btn-back btn-crud">Voltar</a>
</main>

<?php include("../includes/footer.php"); ?>
