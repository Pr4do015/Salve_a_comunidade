<?php
session_start();

if (!isset($_SESSION['dados_usuario'])) {
    header("Location: login.php");
    exit();
}

// Restante do seu código para exibir a página logada
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/paginalogada.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <title>Salve</title>
    <script src="js/index.js" defer></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pattaya&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="npm i bootstrap-icons">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha384-tsQFqpEReu7ZLhBV2VZlAu7zcOV+rXbYlF2cqB8txI/8aZajjp4Bqd+V6D5IgvKT"
    crossorigin="anonymous"></script>
</head>
<body class="fundo">
    <!-- Exibir os dados do usuário -->
    <div class="logo">
    <a class="" id="salve" href="index.php" >Salve</a>
    <h1 style="color: white;">Bem-vindo, <?php echo $_SESSION['dados_usuario']['name_user']; ?>, você já realizou login em nosso site</h1>
    </div>
    <!-- Menu com opção de deslogar -->
    <ul>
        <li><a href="perfil.php">Item 1</a></li>
        <li><a href="#">Item 2</a></li>
        <li><a href="logout.php">Deslogar</a></li>
    </ul>

    <!-- Restante do conteúdo da página -->
</body>
</html>