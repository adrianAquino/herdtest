<?php
// Configurações do banco de dados
$host = "localhost";   // servidor
$user = "root";        // usuário do MySQL
$pass = "";            // senha do MySQL
$db   = "herd";        // nome do banco

// Criando a conexão
$conn = mysqli_connect($host, $user, $pass, $db);

// Verificando a conexão
if (!$conn) {
    die("Erro na conexão: " . mysqli_connect_error());
}

// Opcional: definir charset para evitar problemas com acentuação
mysqli_set_charset($conn, "utf8");

// Se quiser exibir uma mensagem quando conectar com sucesso (só para teste):
//echo "Conexão realizada com sucesso!";





?>