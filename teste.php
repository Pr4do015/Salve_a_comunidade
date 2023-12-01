<?php
require "conexao.php"

?>

<?php
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    $endereco = filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_STRING);
    $cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING);
    $estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING);
    $cep = filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_STRING);
    $nome_projeto = filter_input(INPUT_POST, 'nome_projeto', FILTER_SANITIZE_STRING);
    $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
    $cad = filter_input(INPUT_POST, 'cadastro');


    $stmt = $conn->prepare("SELECT nome_projeto FROM projetosnovos WHERE nome_projeto = :nome_projeto");
    $stmt->bindParam(':nome_projeto', $nome_projeto);
    $stmt->execute();
    
    if ($stmt->rowCount() > 0) {
        echo "<script>alert('Nome do projeto já existe. Escolha outro.');window.location.href = 'cadastro2.html';</script>";
    } else {
        $result_usuario = "INSERT INTO projetosnovos (nome, email, endereco, cidade, estado, cep, nome_projeto, descricao) 
VALUES (:nome, :email, :endereco, :cidade, :estado, :cep, :nome_projeto, :descricao)";

$stmt = $conn->prepare($result_usuario);
$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':endereco', $endereco);
$stmt->bindParam(':cidade', $cidade);
$stmt->bindParam(':estado', $estado);
$stmt->bindParam(':cep', $cep);
$stmt->bindParam(':nome_projeto', $nome_projeto);
$stmt->bindParam(':descricao', $descricao);

if ($stmt->execute()) {
    echo "<script>alert('Registro realizado com sucesso'); window.location.href = 'index.php'; </script>";
} else {
    echo "<script>alert('Erro ao cadastrar dados.'); </script>";
}
    }
   
            
       

   // $sql = "INSERT INTO projetosnovos (nome, email, endereco, cidade, estado, cep, nome_projeto, descricao) VALUES ( '$nome', '$email', '$endereco', '$cidade', '$estado', '$cep', '$nome_projeto', '$descricao')";

