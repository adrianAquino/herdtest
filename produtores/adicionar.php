<?php
include("../config/conexao.php");
include("../includes/header.php");

if(isset($_POST['submit'])) {
    // Receber dados do formulário
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
    $senha = mysqli_real_escape_string($conn, $_POST['senha']); // opcional: hash com password_hash()

    // Query de inserção
    $sql = "INSERT INTO produtores (
        nome, CPF, dataNascimento, email, telefone, logradouro, numero, bairro, cidade, estado, cep, login, senha
    ) VALUES (
        '$nome', '$cpf', '$dataNascimento', '$email', '$telefone', '$logradouro', '$numero', '$bairro', '$cidade', '$estado', '$cep', '$login', '$senha'
    )";

    if(mysqli_query($conn, $sql)) {
        echo "<p class='sucesso'>Produtor cadastrado com sucesso!</p>";
    } else {
        echo "<p class='erro'>Erro ao cadastrar produtor: " . mysqli_error($conn) . "</p>";
    }
}

?>


<main>
    <h2>Adicionar Produtor</h2>
    <form action="" method="POST" class="form-crud">
        <label>Nome:</label>
        <input type="text" name="nome" required>

        <label>CPF/CNPJ:</label>
        <input type="text" name="CPF" required>

        <label>Data de Nascimento:</label>
        <input type="date" name="dataNascimento" required>

        <label>E-mail:</label>
        <input type="email" name="email" required>

        <label>Telefone:</label>
        <input type="text" name="telefone" required>
        
        <label>Logradouro:</label>
        <input type="text" name="logradouro" required>

        <label>Número:</label>
        <input type="text" name="numero" required>

        <label>Bairro:</label>
        <input type="text" name="bairro" required>

        <label>Cidade:</label>
        <input type="text" name="cidade" required>

        <label>Estado:</label>
        <input type="text" name="estado" required>

        <label>CEP:</label>
        <input type="text" name="CEP" required>

        <label>Login:</label>
        <input type="text" name="login" required>

        <label>Senha:</label>
        <input type="password" name="senha" required>


        <button type="submit" name="submit" class="btn">Salvar</button>
    </form>
    <a href="listar.php" class="btn" style="margin-top:10px;">Voltar</a>
</main>














<?php include("../includes/footer.php"); ?>