<?php
require "conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

    // Validar e-mail (você pode adicionar mais validações conforme necessário)
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Email inválido";
        exit;
    }

    try {
        // Verificar se o e-mail existe na tabela 'usuarios'
        $stmt = $conn->prepare("SELECT * FROM usuario WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$resultado) {
            echo "E-mail não encontrado. Por favor, insira um e-mail válido.";
        } else {
            // Se o e-mail existir, redirecionar para a página de redefinição de senha
            header("Location: redefinir_senha.php?email=$email");
            exit;
        }

    } catch (PDOException $e) {
        echo "Erro de conexão com o banco de dados: " . $e->getMessage();
    }
} else {
    echo "Acesso inválido.";
}
?>