<?php
include("../config/conexao.php");
include("../includes/header.php");


// Buscar propriedades no banco
$sql = "SELECT p.*, pr.nome AS nomeProdutor 
FROM propriedades p
INNER JOIN produtores pr ON p.idProdutores = pr.codProdutores
ORDER BY p.codPropriedades ASC;";
$result = mysqli_query($conn, $sql);

?>
<main>
    <h2>Lista de Propriedades</h2>
    <a href="adicionar.php" class="btn-add btn-crud">+ Adicionar Propriedade</a>
    <br>
    <br>
    <table class="tabela">
        <thead>
            <tr>
                <th>Código</th>
                <th>Nome</th>
                <th>Estado</th>
                <th>Estrada</th>
                <th>Área Total</th>
                <th>Latitude</th>
                <th>Longitude</th>
                <th>Quantidade de Animais</th>
                <th>Responsável Técnico</th>
                <th>Status</th>
                 <th>Proprietário</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php if(mysqli_num_rows($result) > 0): ?>
                <?php while($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo $row['codPropriedades']; ?></td>
                        <td><?php echo $row['nome']; ?></td>
                        <td><?php echo $row['estado']; ?></td>
                        <td><?php echo $row['estrada']; ?></td>
                        <td><?php echo $row['areaTotal']; ?></td>
                        <td><?php echo $row['latitude']; ?></td>
                        <td><?php echo $row['longitude']; ?></td>
                        <td><?php echo $row['quantidadeAnimais']; ?></td>
                        <td><?php echo $row['responsavelTecnico']; ?></td>
                        <td><?php echo $row['propriedade_status']; ?></td>
                        <td><?php echo $row['nomeProdutor']; ?></td>
                        <td>
                            <a href="editar.php?id=<?php echo $row['codPropriedades']; ?>" class="btn-tabela editar">Editar</a>
                            <a href="excluir.php?id=<?php echo $row['codPropriedades']; ?>" class="btn-tabela excluir">Excluir</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" style="text-align:center;">Nenhuma Propriedade cadastrada.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</main>





<?php include("../includes/footer.php"); ?>