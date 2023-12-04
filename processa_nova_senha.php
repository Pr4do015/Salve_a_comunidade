<?php
require "conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $novaSenha = filter_input(INPUT_POST, 'nova_senha', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

    try {
        // Atualizar a senha na tabela 'usuario'
        $stmt = $conn->prepare("UPDATE usuario SET senha_user = :novaSenha WHERE email = :email");
        $stmt->bindParam(':novaSenha', $novaSenha);
        $stmt->bindParam(':email', $email);

        if ($stmt->execute()) {
            echo "<script>alert('Senha redefinida com sucesso!');window.location.href = 'login.php';</script>";
        } else {
            echo "Erro ao redefinir a senha. Por favor, tente novamente mais tarde.";
        }
    } catch (PDOException $e) {
        echo "Erro de conexão com o banco de dados: " . $e->getMessage();
    }
} else {
    echo "Acesso inválido.";
}
?>