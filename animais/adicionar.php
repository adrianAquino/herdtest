<?php
include("../config/conexao.php");
include("../includes/header.php");

if (isset($_POST['submit'])) {
    // Receber dados do formulário
    $numeracaoBrinco = trim($_POST['numeracaoBrinco']);
    $sexo = trim($_POST['sexo']);
    $dataNascimento = !empty($_POST['dataNascimento']) ? ($_POST['dataNascimento']) : null;
    $idade = !empty($_POST['idade']) ? intval($_POST['idade']) : null;
    $pelagem = trim($_POST['pelagem']);
    $origem = trim($_POST['origem']);
    $situacaoReprodutiva = trim($_POST['situacaoReprodutiva']);
    $nomePai = trim($_POST['nomePai']);
    $nomeMae = trim($_POST['nomeMae']);
    $valorMercadoAtual = !empty($_POST['valorMercadoAtual']) ? floatval($_POST['valorMercadoAtual']) : null;
    $situacaoComercial = trim($_POST['situacaoComercial']);
    $idRaca = intval($_POST['idRaca']);
    $idPropriedade = intval($_POST['idPropriedade']);

    // Query de inserção
    $sql = "INSERT INTO animais (
        numeracaoBrinco, sexo, dataNascimento, idade, pelagem, origem, situacaoReprodutiva, nomePai, nomeMae, valorMercadoAtual,
        situacaoComercial, idRaca, idPropriedades
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param(
            "sssisssssdsii",
            $numeracaoBrinco,
            $sexo,
            $dataNascimento,
            $idade,
            $pelagem,
            $origem,
            $situacaoReprodutiva,
            $nomePai,
            $nomeMae,
            $valorMercadoAtual,
            $situacaoComercial,
            $idRaca,
            $idPropriedade
        );


        if ($stmt->execute()) {
            echo "<p class='sucesso'>Animal cadastrado com sucesso!</p>";
        } else {
            error_log("Erro no cadastro de animal: " . $stmt->error);
            echo "<p class='erro'>Ocorreu um erro ao cadastrar o animal. Tente novamente.</p>";
        }

        $stmt->close();
    } else {
        error_log("Erro na preparação da query: " . $conn->error);
        echo "<p class='erro'>Ocorreu um erro interno. Contate o administrador.</p>";
    }
}

?>


<main>
    <h2>Adicionar Animal</h2>
    <form action="" method="POST" class="form-crud">
        <label>Numeração do Brinco:</label>
        <input type="text" name="numeracaoBrinco" required>

        <label>Sexo:</label>
        <input type="text" name="sexo" required>

        <label>Data de Nascimento:</label>
        <input type="date" name="dataNascimento"
            placeholder="Caso não saiba a data exata, preencha somente a idade estimada logo abaixo">

        <label>Idade:</label>
        <input type="text" name="idade">

        <label>Pelagem:</label>
        <input type="text" name="pelagem" required>

        <label>Origem:</label>
        <input type="text" name="origem" required>

        <label>Situação Reprodutiva:</label>
        <input type="text" name="situacaoReprodutiva" required>

        <label>Filiação Paterna:</label>
        <input type="text" name="nomePai" required>

        <label>Filiação Materna:</label>
        <input type="text" name="nomeMae" required>

        <label>Valor de Mercado Atual:</label>
        <input type="text" name="valorMercadoAtual" required>

        <label>Situação Comercial:</label>
        <input type="text" name="situacaoComercial" required>

        <label>Raça:</label>
        <select name="idRaca" id="" required>
            <option value="">Selecione uma Raça</option>
            <?php
            $sql = "SELECT codRaca, nome FROM raca ORDER BY nome";
            $resultado = mysqli_query($conn, $sql);

            // Se quiser manter selecionado após erro no POST:
            $idSelecionado = isset($_POST['idRaca']) ? $_POST['idRaca'] : '';

            // mysqli_fetch_assoc($resultado) retorna cada linha do SELECT como um ARRAY ASSOCIATIVO,
            // onde as chaves são os nomes das colunas da tabela e os valores são os dados da tupla.
            // Exemplo: $row["codProdutores"], $row["nome"]
            
            while ($row = mysqli_fetch_assoc($resultado)) {
                $id = $row['codRaca'];
                $nome = $row['nome'];
                $selected = ($id == $idSelecionado) ? 'selected' : '';
                echo "<option value='{$id}' {$selected}>" . htmlspecialchars($nome) . "</option>";
            }
            ?>

        </select>

        <label>Propriedade:</label>
        <select name="idPropriedade" id="" required>
            <option value="">Selecione uma Propriedade</option>
            <?php
            $sql = "SELECT codPropriedades, nome FROM propriedades ORDER BY nome";
            $resultado = mysqli_query($conn, $sql);

            // Se quiser manter selecionado após erro no POST:
            $idSelecionado = isset($_POST['idPropriedades']) ? $_POST['idPropriedades'] : '';

            // mysqli_fetch_assoc($resultado) retorna cada linha do SELECT como um ARRAY ASSOCIATIVO,
            // onde as chaves são os nomes das colunas da tabela e os valores são os dados da tupla.
            // Exemplo: $row["codProdutores"], $row["nome"]
            
            while ($row = mysqli_fetch_assoc($resultado)) {
                $id = $row['codPropriedades'];
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