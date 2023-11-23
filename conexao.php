<?php
 
 $host = "localhost";
 $user = "root";
 $pass = "";
 $dbname ="SALVE";
 
 try {
    $conn =  new PDO("mysql:host=$host;dbname=" . $dbname, $user, $pass);
   // echo "conexão com banco de dados realizada com sucesso!";
} catch(PDOException $err){
    echo"ERRO: conexão com banco de dados não realizada com sucesso!. Erro gerado" . $err->getMessage();
}

