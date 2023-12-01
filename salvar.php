<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "SALVE";

// Conectar ao banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Obter dados do formulário
$nome = $_POST['inputname'];
$email = $_POST['inputEmail4'];
$endereco = $_POST['inputAddress'];
$cidade = $_POST['inputCity'];
$estado = $_POST['inputEstado'];
$cep = $_POST['inputCEP'];
$nome_projeto = $_POST['inputname'];
$descricao = $_POST['inputdescription'];

// Preparar e executar a consulta SQL
$sql = "INSERT INTO projetosnovos (nome, email, endereco, cidade, estado, cep, nome_projeto, descricao) VALUES ('$nome', '$email', '$endereco', '$cidade', '$estado', '$cep', '$nome_projeto', '$descricao')";

if ($conn->query($sql) === TRUE) {
    echo "Dados cadastrados com sucesso!";
} else {
    echo "Erro ao cadastrar dados: " . $conn->error;
}

// Fechar a conexão
$conn->close();
?>
