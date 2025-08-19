<?php
include("../config/conexao.php");
include("../includes/header.php");


// Buscar produtores no banco
$sql = "SELECT * FROM produtores ORDER BY codProdutores ASC";
$result = mysqli_query($conn, $sql);

?>
<main>
    <h2>Lista de Produtores</h2>
    <a href="adicionar.php" class="btn-add btn-crud">+ Adicionar Produtor</a>
    <br>
    <br>
    <table class="tabela">
        <thead>
            <tr>
                <th>Código</th>
                <th>Nome</th>
                <th>CPF/CNPJ</th>
                <th>Data Nascimento</th>
                <th>E-mail</th>
                <th>Telefone</th>
                <th>Logradouro</th>
                <th>Número</th>
                <th>Bairro</th>
                <th>Cidade</th>
                <th>Estado</th>
                <th>CEP</th>
                <th>Login</th>
                <th>Senha</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php if(mysqli_num_rows($result) > 0): ?>
                <?php while($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo $row['codProdutores']; ?></td>
                        <td><?php echo $row['nome']; ?></td>
                        <td><?php echo $row['CPF']; ?></td>
                        <td><?php echo $row['dataNascimento']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['telefone']; ?></td>
                        <td><?php echo $row['logradouro']; ?></td>
                        <td><?php echo $row['numero']; ?></td>
                        <td><?php echo $row['bairro']; ?></td>
                        <td><?php echo $row['cidade']; ?></td>
                        <td><?php echo $row['estado']; ?></td>
                        <td><?php echo $row['CEP']; ?></td>
                        <td><?php echo $row['login']; ?></td>
                        <td><?php echo $row['senha']; ?></td>
                        <td><?php echo $row['produtores_status']; ?></td>
                        <td>
                            <a href="editar.php?id=<?php echo $row['codProdutores']; ?>" class="btn-tabela editar">Editar</a>
                            <a href="excluir.php?id=<?php echo $produtor['codProdutores']; ?>" class="btn-tabela excluir">Excluir</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" style="text-align:center;">Nenhum produtor cadastrado.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</main>





<?php include("../includes/footer.php"); ?>