<?php
include("../config/conexao.php");
include("../includes/header.php");

// Verifica se recebeu ID do produtor
if(!isset($_GET['id'])) {
    header("Location: listar.php");
    exit;
}

$id = $_GET['id'];

// Buscar dados do produtor
$sql = "SELECT * FROM produtores WHERE codProdutores = $id";
$result = mysqli_query($conn, $sql);
$produtor = mysqli_fetch_assoc($result);

// Atualizar produtor
if(isset($_POST['submit'])) {
    $nome = mysqli_real_escape_string($conn, $_POST['nome']);
    $cpf = mysqli_real_escape_string($conn, $_POST['CPF']);
    $dataNascimento = mysqli_real_escape_string($conn, $_POST['dataNascimento']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $telefone = mysqli_real_escape_string($conn, $_POST['telefone']);
    $logradouro = mysqli_real_escape_string($conn, $_POST['logradouro']);
    $numero = mysqli_real_escape_string($conn, $_POST['numero']);
    $bairro = mysqli_real_escape_string($conn, $_POST['bairro']);
    $cidade = mysqli_real_escape_string($conn, $_POST['cidade']);
    $estado = mysqli_real_escape_string($conn, $_POST['estado']);
    $cep = mysqli_real_escape_string($conn, $_POST['CEP']);
    $login = mysqli_real_escape_string($conn, $_POST['login']);
    
    // Atualizar senha somente se preenchida
    if(!empty($_POST['senha'])) {
        $senha_sql = ", senha='" . mysqli_real_escape_string($conn, $_POST['senha']) . "'";
    } else {
        $senha_sql = "";
    }

    $sql_update = "UPDATE produtores SET 
        nome='$nome',
        CPF='$cpf',
        dataNascimento='$dataNascimento',
        email='$email',
        telefone='$telefone',
        logradouro='$logradouro',
        numero='$numero',
        bairro='$bairro',
        cidade='$cidade',
        estado='$estado',
        CEP='$cep',
        login='$login'
        $senha_sql
        WHERE codProdutores=$id";

    if(mysqli_query($conn, $sql_update)) {
        echo "<p class='sucesso'>Produtor atualizado com sucesso!</p>";
    } else {
        echo "<p class='erro'>Erro ao atualizar produtor: " . mysqli_error($conn) . "</p>";
    }

    // Atualiza variável $produtor para mostrar dados novos
    $result = mysqli_query($conn, "SELECT * FROM produtores WHERE codProdutores = $id");
    $produtor = mysqli_fetch_assoc($result);
}
?>

<main>
    <h2>Editar Produtor</h2>
    <form action="" method="POST" class="form-crud">
        <label>Nome:</label>
        <input type="text" name="nome" value="<?php echo $produtor['nome']; ?>" required>

        <label>CPF/CNPJ:</label>
        <input type="text" name="CPF" value="<?php echo $produtor['CPF']; ?>" required>

        <label>Data de Nascimento:</label>
        <input type="date" name="dataNascimento" value="<?php echo $produtor['dataNascimento']; ?>" required>

        <label>E-mail:</label>
        <input type="email" name="email" value="<?php echo $produtor['email']; ?>" required>

        <label>Telefone:</label>
        <input type="text" name="telefone" value="<?php echo $produtor['telefone']; ?>" required>

        <label>Logradouro:</label>
        <input type="text" name="logradouro" value="<?php echo $produtor['logradouro']; ?>" required>

        <label>Número:</label>
        <input type="text" name="numero" value="<?php echo $produtor['numero']; ?>" required>

        <label>Bairro:</label>
        <input type="text" name="bairro" value="<?php echo $produtor['bairro']; ?>" required>

        <label>Cidade:</label>
        <input type="text" name="cidade" value="<?php echo $produtor['cidade']; ?>" required>

        <label>Estado:</label>
        <input type="text" name="estado" value="<?php echo $produtor['estado']; ?>" required>

        <label>CEP:</label>
        <input type="text" name="CEP" value="<?php echo $produtor['CEP']; ?>" required>

        <label>Login:</label>
        <input type="text" name="login" value="<?php echo $produtor['login']; ?>" required>

        <label>Senha (deixe em branco para manter a atual):</label>
        <input type="password" name="senha">

        <button type="submit" name="submit" class="btn-crud">Atualizar</button>
    </form>
    <a href="listar.php" class="btn-back btn-crud">Voltar</a>
</main>


<?php include("../includes/footer.php"); ?>


