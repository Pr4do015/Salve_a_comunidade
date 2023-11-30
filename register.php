<?php
require "conexao.php"
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<!-- Title here -->
		<title>Cadastra - Se </title>
		<!-- Description, Keywords and Author -->
		<meta name="description" content="Your description">
		<meta name="keywords" content="Your,Keywords">
		<meta name="author" content="ResponsiveWebInc">
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/register.css" rel="stylesheet">
		<style>
      

      </style>
	</head>
	<body>
    <?php
    
    $nome = filter_input(INPUT_POST, 'name_user', FILTER_SANITIZE_STRING);
    $sobrenome = filter_input(INPUT_POST, 'sobre_nome', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    $telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
    $senha = filter_input(INPUT_POST, 'senha_user', FILTER_SANITIZE_STRING);
    $reg = filter_input(INPUT_POST, 'Registrar');
    
    $confirme_usuario = $email; // comparando email
    $stmt = $conn->prepare("SELECT email FROM usuario WHERE email = :email");
    $stmt->bindParam(':email', $confirme_usuario) ;
    $stmt->execute();
    
    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if(empty($resultado))
    {
      $email_banco = "";
    }
    else
    {
      $email_banco = $resultado['email'];
    }
    
  
    if($email == $email_banco){
     echo "<script> alert('email já cadastrado! tente outro'); </script>";
    } 
    else 
    {
      $result_usuario = "INSERT INTO usuario (name_user, sobre_nome, email, telefone, senha_user) 
      VALUES ('$nome', '$sobrenome', '$email', '$telefone', '$senha') ";
    
      $resultado_usuario = $conn->query($result_usuario);
           echo "<script> alert('Registro realizado com sucesso');
           window.location.href = 'index.php'; </script>";   
    }
    ?>  
    
  <!-- Page content starts -->
<div class="content"> 
  <div class="container">
    <div class="center">
    <div class="form-container"> 
        <!-- Some content -->
                             
                
                <div class="col-md-6">
                      
                      
                  <div class="formy well">
                  <a class="logo">SALVE<br><br></a>
                                  <div class="form">  
                           <!-- Register form (not working)-->
                           <form  method="POST" actions="" class="form-horizontal">
                               <!-- Nome -->
                               <div class="nome">
                                        <div class="form-group">
                                            <label class="control-label col-md-3" for="name1">Nome</label>
                                            <div class="col-md-8">
                                            <input type="text" name="name_user" class="form-control" id="name1" placeholder="Seu nome" required>
                                            </div>
                                        </div> <br>
                                        <!--  Sobre Nome -->
                                        <div class="sobrenome">
                                                <div class="form-group">
                                                    <label class="control-label col-md-3" for="name1">Sobrenome</label>
                                                    <div class="col-md-8">
                                                    <input type="text" name="sobre_nome" class="form-control" id="name1" placeholder="Sobrenome" required>
                                                    </div>
                                                </div>  
                                        </div>     
                                </div><br><br>
                               <!-- Email -->
                               <div class="form-group">
                                 <label class="control-label col-md-3" for="email1">Email</label>
                                 <div class="col-md-8">
                                   <input type="text" name="email" class="form-control" id="email1" placeholder="Seu Email" required>
                                 </div>
                               </div>
                               <br>                        
                               <!-- telefone -->
                               <div class="form-group">
                                 <label class="control-label col-md-3" for="username2">Telefone</label>
                                 <div class="col-md-8">
                                   <input type="text" name="telefone" class="form-control" id="username2" placeholder="Seu Telefone" required>
                                 </div>
                               </div><br>
                               <!-- Password -->
                               <div class="form-group">
                                 <label class="control-label col-md-3" for="password2">Senha</label>
                                 <div class="col-md-8">
                                   <input type="password" name="senha_user" class="form-control" id="password2" placeholder="Dixite a senha" required>
                                 </div>
                               </div>
                               </div><br>
                               <!-- Checkbox -->
                               <div class="form-group">
                                  <div class="col-md-8 col-md-offset-3">
                                     <label class="checkbox-inline">
                                        <input type="checkbox" name="Checkbox" id="inlineCheckbox3" value="agree"> Aceita os termos de acesso?
                                     </label>
                                  </div>
                               </div> 
                               
                               <!-- Buttons -->
                               <div class="form-actions">
                                  <!-- Buttons -->
					 <div class="col-md-8 col-md-offset-3">
						<button type="submit"  value="cadastrar" name="Registrar" class="btn btn-danger">Registrar</button>
						<button type="reset" class="btn btn-default">Limpar</button>
					</div>
                               </div>
                           </form>
			  <div class="clearfix"></div>
			  <hr />
				<p>Já possui conta? <a href="login.php">Login</a></p>
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