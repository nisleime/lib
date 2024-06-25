<?php

	session_start();
	if( isset($_SESSION['email']) ):
	else:
		echo '<script>location.href="index.php" </script>';
	endif;

?>
<!DOCTYPE html>
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Liberação Smart System</title>

    
  <link href="materialize/css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="materialize/css/corpo.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
 
   <!-- ================================================
    Scripts
    ================================================ -->

  <!-- jQuery Library -->
  <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="js/liberacao.js"></script>
  <!--materialize js-->
  <script type="text/javascript" src="materialize/js/materialize.min.js"></script>

	<script>
	
		$(document).ready(function(){
    $('.modal').modal();
	$(".button-collapse").sideNav();
  });
  
   
	
	</script>

</head>

<body>
  <!-- Start Page Loading -->
  <div id="loader-wrapper">
      <div id="loader"></div>        
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
  </div>
  <!-- End Page Loading -->

  
 <nav>
     <div class="nav-wrapper grey darken-2" id="topohead">
         <a href="#" class="brand-logo">Liberações</a>
         <a href="#" data-activates="menu-mobile" class="button-collapse">
             <i class="material-icons">menu</i>
         </a>
         <ul class="right hide-on-med-and-down">
            <li><a href="inicial.php" class="grey darken-2"><i class="tiny material-icons">verified_user</i></a></li>
            <li><a href="contasareceber.php" class="grey darken-2"><i class="tiny material-icons">attach_money</i></a></li>
            <li><a href="terminais.php"class="grey darken-2"><i class="tiny material-icons">desktop_windows</i> </a></li>
             
            
         </ul>
         <ul class="side-nav" id="menu-mobile">
         <br/><li><a href="inicial.php"><i class="material-icons">verified_user</i>Liberação</a></li>
              <li><a href="contasareceber.php"><i class="material-icons">attach_money</i>Contas a Receber</a></li>
              <li><a href="terminais.php"><i class="material-icons">desktop_windows</i>Terminais</a></li>             
            
         </ul>
     </div>
 </nav>  

  <div id="login-page" class="row">
    <div class="col s12 z-depth-4 card-panel">
      <form class="login-form">
        <div class="row">
          <div class="input-field col s12">
            
            <p class="login-form-text"><h5 style="color:#2e466d;">Liberação</h5></p>
          </div>
        </div>
        <div class=" margin">
          <div class="input-field col s5">
            <input id="idsistema" type="number" value="35">
            <label for="idsistema" class="center-align">Id do Sistema</label>
			
          </div>
        </div>
		  <div class="margin">
          <div class="input-field col s5">
            <input id="idcliente" type="number">
            <label for="idcliente" class="center-align">Id do Cliente</label>
			
          </div>
        </div>
		
		<div class="margin">
          <div class="input-field col s2">
            
		    	<a id="btnlocalizarcliente" class="btn-floating btn-large waves-effect waves-light modal-trigger" href="#modal1"><i class="material-icons">search</i></a>
			
          </div>
        </div>
		
		
        <div class="row margin">
          <div class="input-field col s12">
            <input id="dataliberar" type="date">
          </div>
        </div>
		
 
        <div class="row">
          <div class="input-field col s12 ">
            <a href="#" id="btliberar" class="btn btn-large waves-effect waves-light col s12 "><i class="small material-icons">check_circle</i>    LIBERAR</a>
          </div>
        </div>

      </form>
	  
	  
	 <div class="row">
          <div class="input-field col s12">
            <input type="text" id="validacao">
          </div>
        </div>
		
		<div class="row">
          <div class="input-field col s12">
            <div id="mensagem"></div>
          </div>
        </div>
		
		<div class="row">
          <div class="input-field col s12">
            <a href="#" id="btenviarliberacao" class="btn btn-large waves-effect waves-light col s12"><i class="small material-icons">backup</i>    CONFIRMAR LIBERAÇÃO?</a>
			
          </div>
        </div>
	  
	  
    </div>
	
	
  </div>


  <footer class="page-footer grey darken-2">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
               <h5 class="white-text"><i class="medium material-icons white-text">fingerprint</i>   Controle de Licenças</h5>
                <p class="grey-text text-lighten-4"><i class="tiny material-icons white-text">verified_user</i> -> Liberação   -
                <i class="tiny material-icons white-text">attach_money</i> -> Contas a Receber    -
                <i class="tiny material-icons white-text">desktop_windows</i> -> Terminais</p> 
                
              </div>
              <div class="col l4 offset-l2 s12">
                <ul>
                  <li><a class="grey-text text-lighten-3" href="#!" ><i class="small material-icons white-text">recent_actors</i>   Representantes</a></p></li>
                 <li><a class="grey-text text-lighten-3" href="#!"><i class="small material-icons white-text">rate_review</i>       Novidades</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!"><i class="small material-icons white-text">record_voice_over</i>    Comunicados</a></li>
                </ul>
              </div>
            </div>
          </div>
          <p class="grey11 z-depth-3"><div class="footer-copyright">
          
            <div class="container">

            © 2022 Copyright BSSI Partner
            <a class="grey-text text-lighten-4 right" href="https://www.smartsystemsoftware.com.br/">Mais</a>
            </div></p>
          </div>
        </footer>


</body>

</html>

<!-- Modal Structure -->
<div id="modal1" class="modal">
  <div class="modal-content">
    <h5>ESCOLHA UM CLIENTE</h5>
     
	 <div class=" margin">
          <div class="input-field col s12">
            <input id="nomecliente" type="text">
            <label for="nomecliente" class="center-align">Localizar Cliente:</label>
			
          </div>
		  
		  <div id="resultado" class="input-field col s12">
		  
		  </div>
		  
        </div>
		
  </div>
  <div class="modal-footer">
    <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">SAIR</a>
  </div>
</div>
