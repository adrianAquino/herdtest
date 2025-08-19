<?php
include("../config/conexao.php");
include("../includes/header.php");


// Buscar produtores no banco
$sql = "SELECT * FROM raca ORDER BY codRaca ASC";
$result = mysqli_query($conn, $sql);

?>
<main>
    <h2>Lista de Raças</h2>
    <a href="adicionar.php" class="btn-add btn-crud">+ Adicionar Raças</a>
    <br>
    <br>
    <table class="tabela">
        <thead>
            <tr>
                <th>Código</th>
                <th>Nome</th>
                <th>Tipo da Raça</th>
                <th>Descrição</th>
                <th>Origem</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php if(mysqli_num_rows($result) > 0): ?>
                <?php while($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo $row['codRaca']; ?></td>
                        <td><?php echo $row['nome']; ?></td>
                        <td><?php echo $row['tipoRaca']; ?></td>
                        <td><?php echo $row['descricao']; ?></td>
                        <td><?php echo $row['origemRaca']; ?></td>
                        <td><?php echo $row['raca_status']; ?></td>
                        <td>
                            <a href="editar.php?id=<?php echo $row['codRaca']; ?>" class="btn-tabela editar">Editar</a>
                            <a href="excluir.php?id=<?php echo $produtor['codRaca']; ?>" class="btn-tabela excluir">Excluir</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" style="text-align:center;">Nenhuma Raça Cadastrada.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</main>





<?php include("../includes/footer.php"); ?>