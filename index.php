
<!DOCTYPE html>
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login Liberação Smart System</title>

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>  
 <!-- <link href="materialize/css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection">-->
  <link href="materialize/css/corpo.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
 

</head>

<body>
  <!-- Start Page Loading -->
  <div id="loader-wrapper">
      <div id="loader"></div>        
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
  </div>
  <!-- End Page Loading -->



  <div id="login-page" class="row">
    <div class="col s12 z-depth-4 card-panel">
      <form class="login-form">
        <div class="row">
          <div class="input-field col s12 center grey darken-2">
         
            <img src="img/logo.png"  alt=""  class="rectangle responsive-img valign profile-image-login"> 
           
           <p class="center login-form-text "><h5 style="color:#FFFAFA;">Liberação Sistemas</h5></p>
          </div>
        </div>
        <div class="row margin"><p class="login-box-msg"></p>
		
          <div class="input-field col s12">
          
            <input id="email" type="text">
            <label for="usernusuarioame" class="center-align"><i class="small material-icons">account_circle</i>Usuario</label>
			
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <input id="senha" type="password">
            <label for="senha"><i class="small material-icons">lock</i>  Senha</label>
          </div>
        </div>
 
        <div class="row">
          <div class="input-field col s12">
            <a href="#" id="entrarLogin" class="btn waves-effect waves-light col s12"><i class="small material-icons">cloud_done</i>    ENTRAR</a>
          </div>
        </div>
                

      </form>
      <footer class="page-footer grey darken-2">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text"><i class="medium material-icons white-text">fingerprint</i>   Controle de Licenças</h5>
                <p class="grey-text text-lighten-4"><i class="tiny material-icons white-text">person_add</i><a class="white-text" href="#!"> Cadastre-se</a></p>
              </div>
              <div class="col l4 offset-l2 s12">
                <ul>
                  <li><i class="tiny material-icons white-text">cloud_download</i><a class="grey-text text-lighten-3" href="#!"> Recuperar Senha</a></li>
                  <li><i class="tiny material-icons white-text">rate_review</i><a class="grey-text text-lighten-3" href="#!"> Novidades</a></li>
                  <li><i class="tiny material-icons white-text">record_voice_over</i><a class="grey-text text-lighten-3" href="#!"> Comunicados</a></li>
                </ul>
              </div>
            </div>
          </div>
          <p class="z-depth-3"><div class="footer-copyright">
          
            <div class="container">

            © 2022 Copyright BSSI Partner
            <a class="grey-text text-lighten-4 right" href="https://www.smartsystemsoftware.com.br/">Mais</a>
            </div></p>
          </div>
        </footer>

        
    </div>
  </div>



  <!-- ================================================
    Scripts
    ================================================ -->

  <!-- jQuery Library -->
  <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="js/principal.js"></script>
  <!--materialize js-->
  <script type="text/javascript" src="materialize/js/materialize.min.js"></script>


</body>

</html>