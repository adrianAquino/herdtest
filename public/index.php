<?php include("../includes/header.php"); ?>




    <h2 style="text-align: center; margin-top: 20px;">Bem-vindo ao HERD+</h2>
    <p style="text-align: center; color: #5a3a22;">Gerencie seu rebanho, propriedades, produtores e raças de forma
        prática e organizada.</p>
    <section class="dashboard">
        <div class="card">
            <h3>Produtores</h3>
            <p>Gerencie informações sobre os produtores cadastrados.</p>
            <a href="../produtores/listar.php" class="btn">Acessar</a>
        </div>
        <div class="card">
            <h3>Propriedades</h3>
            <p>Controle as propriedades vinculadas aos produtores.</p>
            <a href="../propriedades/listar.php" class="btn">Acessar</a>
        </div>
        <div class="card">
            <h3>Raças</h3>
            <p>Cadastre e visualize as raças de animais do rebanho.</p>
            <a href="../racas/listar.php" class="btn">Acessar</a>
        </div>
        <div class="card">
            <h3>Animais</h3>
            <p>Gerencie os animais cadastrados, com informações detalhadas.</p>
            <a href="../animais/listar.php" class="btn">Acessar</a>
        </div>
    </section>

<?php include("../includes/footer.php"); ?>