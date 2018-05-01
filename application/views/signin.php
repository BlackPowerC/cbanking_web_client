<?php
defined('BASEPATH') OR exit('No direct script access allowed');
defined('VENDOR') OR exit('No direct script access allowed') ;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <!-- css stylesheet -->
    <link rel="shortcut icon" href="<?php echo HTML::img("assets/images/business.png") ?>" type="image/x-icon" />
    <link rel="stylesheet" href="<?php echo base_url().'public/twbs/bootstrap/dist/css/bootstrap.css'; ?>">
    <link rel="stylesheet" href="<?php echo HTML::style("style/signin")?>" id="signincss" />
    <!-- Script js -->
    <script src="<?php echo HTML::script("js/signin")?>"></script>
    <script src="<?php echo base_url()."public/components/jquery/jquery.js"?>"></script>
    <script src="<?php echo base_url()."public/twbs/bootstrap/dist/js/bootstrap.js"?>"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>

<body>
  <div class="container">
    <!-- Affichage des méssage d'erreur -->
      <?php echo  $error_msg; ?>
         <div class="card card-container">
             <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
             <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
             <p id="profile-name" class="profile-name-card"></p>
             <?php echo validation_errors('<div class="alert alert-warning">', '</div>'); ?>
             <form class="form-signin" action="" method="post">
                 <span id="reauth-email" class="reauth-email"></span>
                 <input type="email" id="inputEmail" name="e-mail" class="form-control" placeholder="Adresse électronique" required autofocus>
                 <input type="password" id="inputPassword" name="passwd" class="form-control" placeholder="Mot de passe" required>
                 <!--<div id="remember" class="checkbox">
                     <label>
                         <input type="checkbox" value="remember-me"> Remember me
                     </label>
                 </div>-->
                 <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Envoyer</button>
             </form><!-- /form -->
             <a class="btn btn-link" title="mot de passe oublié" href="">Mot de passe oublié ?</a>
         </div><!-- /card-container -->
     </div><!-- /container -->
</body>
</html>
