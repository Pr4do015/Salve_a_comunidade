<?php
include "conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['email'])) {
    $email = filter_input(INPUT_GET, 'email', FILTER_SANITIZE_EMAIL);

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
            exit;
        }
    } catch (PDOException $e) {
        echo "Erro de conexão com o banco de dados: " . $e->getMessage();
        exit;
    }
} else {
    echo "Acesso inválido.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Redefinir Senha</title>
</head>
<body>
    <h2>Redefinir Senha para <?php echo $email; ?></h2>
    <form method="post" action="processa_nova_senha.php">
        <label for="nova_senha">Nova Senha:</label>
        <input type="password" id="nova_senha" name="nova_senha" required>
        <br>
        <input type="submit" value="Redefinir Senha">
    </form>
</body>
</html>