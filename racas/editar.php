<?php
include("../config/conexao.php");
include("../includes/header.php");

// Verifica se recebeu ID da raça
if(!isset($_GET['id'])) {
    header("Location: listar.php");
    exit;
}

$id = $_GET['id'];

// Buscar dados da raca
$sql = "SELECT * FROM raca WHERE codRaca = $id";
$result = mysqli_query($conn, $sql);
$raca = mysqli_fetch_assoc($result);

// Atualizar raca
if(isset($_POST['submit'])) {
    $nome = mysqli_real_escape_string($conn, $_POST['nome']);
    $tipoRaca = mysqli_real_escape_string($conn, $_POST['tipoRaca']);
    $descricao = mysqli_real_escape_string($conn, $_POST['descricao']);
    $origemRaca = mysqli_real_escape_string($conn, $_POST['origemRaca']);
 
   
    $sql_update = "UPDATE raca SET 
        nome='$nome',
        tipoRaca='$tipoRaca',
        descricao='$descricao',
        origemRaca='$email'
        WHERE codRaca=$id";

    if(mysqli_query($conn, $sql_update)) {
        echo "<p class='sucesso'>Raça atualizada com sucesso!</p>";
    } else {
        echo "<p class='erro'>Erro ao atualizar Raça: " . mysqli_error($conn) . "</p>";
    }

    // Atualiza variável $raca para mostrar dados novos
    $result = mysqli_query($conn, "SELECT * FROM raca WHERE codRaca = $id");
    $raca = mysqli_fetch_assoc($result);
}
?>

<main>
    <h2>Editar Raça</h2>
    <form action="" method="POST" class="form-crud">
        <label>Nome:</label>
        <input type="text" name="nome" value="<?php echo $raca['nome']; ?>" required>

        <label>Tipo da Raça:</label>
        <input type="text" name="tipoRaca" value="<?php echo $raca['tipoRaca']; ?>" required>

        <label>Descrição::</label>
        <input type="text" name="descricao" value="<?php echo $raca['descricao']; ?>" required>

        <label>Origem:</label>
        <input type="text" name="origemRaca" value="<?php echo $raca['origemRaca']; ?>" required>

        <button type="submit" name="submit" class="btn-crud">Atualizar</button>
    </form>
    <a href="listar.php" class="btn-back btn-crud">Voltar</a>
</main>


<?php include("../includes/footer.php"); ?>


