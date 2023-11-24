<?php
require "conexao.php"
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<!-- Title here -->
		<title>Meus Dados</title>
			<!-- Description, Keywords and Author -->
			<meta name="description" content="Your description">
		<meta name="keywords" content="Your,Keywords">
		<meta name="author" content="ResponsiveWebInc">
		
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	
	<body>  

		

<!-- My Account -->

<div class="items">
  <div class="container">
    <div class="row">

      <div class="col-md-3 col-sm-3 hidden-xs">

        <!-- Sidebar navigation -->
        <h5 class="title">Pages</h5>
        <!-- Sidebar navigation -->
          <nav>
            <ul id="navi">
              <li><a href="myaccount.php">My Account</a></li>
              <li><a href="edit-profile.php">Edit Profile</a></li>
            </ul>
          </nav>

      </div>

<!-- Main content -->
      <div class="col-md-9 col-sm-9">

          <h5 class="title">Meus Dados</h5>

          <!-- Your details -->
          <div class="address">
            <address>
              <?php
                 if(!empty($_SESSION['dados_usuario'])){
                  $recupera = $_SESSION['dados_usuario'];
                echo "<strong>$recupera[name_user] <br> </strong>", "<strong>$recupera[sobre_nome] </strong><br><br>";

                echo "Email: <i> $recupera[email] </i><br>";

                echo "telefone: <i> $recupera[telefone] </i><br>";
                 } 
                 else {
                  echo"<b><h4> Sem login do Usuário </b></h4>";
                 }

              ?>
            </address>
          </div>

      </div>                                                                    



    </div>
  </div>
</div>



	</body>	
</html>
