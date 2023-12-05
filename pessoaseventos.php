<?php
// Inclui o arquivo de conexão
include 'conexao.php';

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Coleta os dados do formulário
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];
    $nomeEvento = $_POST["nomeevento"];

    try {
        // Insere os dados no banco de dados
        $stmt = $conn->prepare("INSERT INTO parteventos (nome, numero, email, nomeEvento) VALUES (:nome, :telefone, :email, :nomeEvento)");
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':nomeEvento', $nomeEvento);

        if ($stmt->execute()) {
            echo "<script> alert('Registramos seu interesse no evento! Em breve, o organizador entrará em contato.')
            window.location.href = 'index.php'; </script>"; 
        } else {
            $errorInfo = $stmt->errorInfo();
            echo "Erro ao inserir dados: " . $errorInfo[2];
        }
    } catch (PDOException $e) {
        echo "Erro ao inserir dados: " . $e->getMessage();
    }
}

// Fecha a conexão com o banco de dados
$conn = null;

?>