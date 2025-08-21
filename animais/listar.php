<?php
include("../config/conexao.php");
include("../includes/header.php");


// Buscar animais no banco
$sql = "SELECT a.*, 
               p.nome AS nomePropriedade, 
               r.nome AS nomeRaca
        FROM animais a
        INNER JOIN propriedades p ON a.idPropriedades = p.codPropriedades
        INNER JOIN raca r ON a.idRaca = r.codRaca
        ORDER BY a.codAnimais ASC;";
$result = mysqli_query($conn, $sql);

?>
<main>
    <h2>Lista de Animais</h2>
    <a href="adicionar.php" class="btn-add btn-crud">+ Adicionar Animais</a>
    <br>
    <br>
    <table class="tabela">
        <thead>
            <tr>
                <th>Código</th>
                <th>Numeração do Brinco</th>
                <th>Sexo</th>
                <th>Data de Nascimento</th>
                <th>Idade</th>
                <th>Pelagem</th>
                <th>Origem</th>
                <th>Situação Reprodutiva</th>
                <th>Filiação Paterna</th>
                <th>Filiação Materna</th>
                <th>Valor de Mercado Atual</th>
                <th>Situação Comercial</th>
                <th>Status</th>
                <th>Raça</th>
                <th>Propriedade</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php if(mysqli_num_rows($result) > 0): ?>
                <?php while($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo $row['codAnimais']; ?></td>
                        <td><?php echo $row['numeracaoBrinco']; ?></td>
                        <td><?php echo $row['sexo']; ?></td>
                        <td><?php echo $row['dataNascimento']; ?></td>
                        <td><?php echo $row['idade']; ?></td>
                        <td><?php echo $row['pelagem']; ?></td>
                        <td><?php echo $row['origem']; ?></td>
                        <td><?php echo $row['situacaoReprodutiva']; ?></td>
                        <td><?php echo $row['nomePai']; ?></td>
                        <td><?php echo $row['nomeMae']; ?></td>
                        <td><?php echo $row['valorMercadoAtual']; ?></td>
                        <td><?php echo $row['situacaoComercial']; ?></td>
                        <td><?php echo $row['animal_status']; ?></td>
                        <td><?php echo $row['nomeRaca']; ?></td>
                        <td><?php echo $row['nomePropriedade']; ?></td>
                        <td>
                            <a href="editar.php?id=<?php echo $row['codAnimais']; ?>" class="btn-tabela editar">Editar</a>
                            <br>
                            <br>
                            <a href="excluir.php?id=<?php echo $row['codAnimais']; ?>" class="btn-tabela excluir">Excluir</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="16" style="text-align:center;">Nenhum Animal cadastrado.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</main>





<?php include("../includes/footer.php"); ?>