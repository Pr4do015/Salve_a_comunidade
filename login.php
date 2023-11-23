<?php
  require "conexao.php";


?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<!-- Title here -->
		<title>Login - MacKart</title>
			<!-- Description, Keywords and Author -->
			<meta name="description" content="Your description">
		<meta name="keywords" content="Your,Keywords">
		<meta name="author" content="ResponsiveWebInc">
		
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/login.css" rel="stylesheet">
    


	</head>
	
	<body>
  <?php
        $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
       
       if(!empty($dados['SendLogin'])){
     //   var_dump($dados);
        echo "<br>";
       $query_usuarios = "SELECT * FROM usuario 
          WHERE email = :email 
          LIMIT 1 ";
          $result_usuario = $conn->prepare($query_usuarios);
          $result_usuario->bindParam(':email',$dados['email'], PDO::PARAM_STR);
          $result_usuario->execute();

          
            if(($result_usuario) AND ($result_usuario->rowCount() !=0)){
               $row_usuario = $result_usuario-> fetch(PDO::FETCH_ASSOC);
              // var_dump($row_usuario);

                  if($dados['senha_user'] == $row_usuario['senha_user']){
                
                    $_SESSION['dados_usuario'] = $row_usuario;

                    echo "<script> alert('Login realizado com sucesso')
                    window.location.href = 'eventos.html'; </script>"; 
                   
                  }
                  
                    else {
                       echo "<script> alert('Erro: Usuário ou senha incorreta!')</script>"; 
                      }

             }  else {
              echo "<script> alert('Erro: Usuário ou senha incorreta!')</script>"; 
                 }
       };

       ?>

		<!-- Page content starts -->

    
<!-- Login form -->
<div class="content">
  <div class="container">
    <div class="row">
    <div class="form-container"> 
<!-- Login form -->
            <div class="col-md-6">
                  <a class="logo">SALVE<br><br></a>
                  <hr style="border: 1px solid rgb(204, 201, 0); margin-top: -10px; width: 300px;">
                    <div class="formy well">
                                  <div class="form" >
                                      <!-- Login  form (not working)-->
                                      <form method="POST" actions="" class="form-horizontal">                                         
                                          <!-- E-mail -->
                                          <div class="form-group">
                                          
                                            <label class="control-label col-md-3" for="username2">E-mail</label>
                                            <div class="col-md-8">
                                              <input type="text" name="email" class="form-control" id="username2" placeholder="seuemail@gmail">
        
                                            </div>
                                          </div><br>
                                          <!-- Password -->
                                          <div class="form-group">
                                            <label class="control-label col-md-3" for="password2">Senha</label>
                                            <div class="controls col-md-8">
                                              <input type="password" name="senha_user" class="form-control" id="password2" placeholder="*****">
                                            </div>
                                          </div><br>
                                          <!-- Checkbox -->
                                          <div class="form-group">
                                             <div class="col-md-8 col-md-offset-3">
                                                <label class="checkbox-inline">
                                                   <input type="checkbox" id="inlineCheckbox3" value="agree"> Lembrar Senha
                                                </label>
                                             </div>
                                          </div> <br>
                                          
                                          <!-- Buttons -->
                                          <div class="form-group">
                                             <!-- Buttons -->
											 <div class="col-md-8 col-md-offset-3" action="index.html">
												<button type="submit" value="acessar" name="SendLogin" class="btn btn-danger" id="button1">Login</button>
											 </div><br>
                       
                                          </div>
                                      </form>
                                      
                                            <a href="register.php">Primeiro acesso</a><br><br>
                                            <a href="esqueciaSenha.html">Esqueci a senha</a><br>
                                    </div> 
                                  </div>

                </div>
    </div>
  </div>
</div>
</div>

 


      

<!-- Page content ends -->

	</body>	
</html>

