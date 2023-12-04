<?php
require "conexao.php";

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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Pattaya&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/redefinir.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<body>
    
    <h2 style="margin-top: 10%;">Redefinir Senha para <?php echo $email; ?></h2>
    <form method="post" action="processa_nova_senha.php">
        <input type="hidden" name="email" value="<?php echo $email; ?>">
        <label for="nova_senha" style="margin-left: 0%; color:white;" >Nova Senha:</label><br>
        <input type="password" id="nova_senha" name="nova_senha" placeholder="*****" required>
        <br><br>
        <input type="submit" value="Redefinir Senha">
    </form>
</body>
</html>