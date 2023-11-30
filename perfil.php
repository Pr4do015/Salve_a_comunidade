<?php
session_start();

// Verifica se o usuário está logado
if(isset($_SESSION['dados_usuario'])){
    header("Location: perfil.php");
    exit();
}

require "conexao.php";
?>