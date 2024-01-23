<?php
// Conexao com o banco de dados (substitua pelos seus dados)
$servername = "seu_servidor";
$username = "seu_usuario";
$password = "sua_senha";
$dbname = "seu_banco_de_dados";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexao falhou: " . $conn->connect_error);
}

// Verifica se o formulario foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera os dados do formulario
    $nome = $_POST["nome"];
    $codigo = $_POST["codigo"];
    $descricao = $_POST["descricao"];
    $preco = $_POST["preco"];

    // Insere ou atualiza o produto no banco de dados
    $sql = "INSERT INTO produtos (nome, codigo, descricao, preco) VALUES ('$nome', '$codigo', '$descricao', '$preco')
            ON DUPLICATE KEY UPDATE nome='$nome', descricao='$descricao', preco='$preco'";

    if ($conn->query($sql) === TRUE) {
        echo "Produto salvo com sucesso.";
    } else {
        echo "Erro ao salvar o produto: " . $conn->error;
    }
}

// Fecha a conexao com o banco de dados
$conn->close();
?>
