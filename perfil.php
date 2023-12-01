<?php
session_start();

// Verificar se o usuário está logado
if (!isset($_SESSION['dados_usuario'])) {
    header("Location: index.php");
    exit();
}

// Dados do participante
$dadosParticipante = $_SESSION['dados_usuario'];

// Verificar se a chave 'nome' está definida no array
if (!isset($dadosParticipante['nome'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados do Participante</title>
    <!-- Seu estilo CSS ou links para estilos externos -->
</head>
<body>

<!-- Exibir os dados do participante -->
<h1>Bem-vindo, <?php echo $dadosParticipante['nome']; ?></h1>

<!-- Outras informações do participante -->
<p>Sobrenome: <?php echo $dadosParticipante['sobrenome']; ?></p>
<p>Email: <?php echo $dadosParticipante['email']; ?></p>
<!-- Adicione mais informações conforme necessário -->

<!-- Link para deslogar -->
<a href="logout.php">Deslogar</a>

<!-- Restante do conteúdo da página -->

</body>
</html>