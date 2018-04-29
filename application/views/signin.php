<?php
defined('BASEPATH') OR exit('No direct script access allowed');
defined('VENDOR') OR exit('No direct script access allowed') ;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="<?php echo HTML::img("assets/images/business.png") ?>" type="image/x-icon" />
    <link rel="stylesheet" href="<?php echo base_url().'vendor/twbs/bootstrap/dist/css/bootstrap.css' ?>" id="bootstrap3" />
    <link rel="stylesheet" href="<?php echo HTML::style("style/main")?>" id="maincss" />
    <script src="<?php echo base_url()."vendor/components/jquery/jquery.js"?>"></script>
    <script src="<?php echo base_url()."vendor/twbs/bootstrap/dist/js/bootstrap.js"?>"></script>
    <title>Connexion</title>
</head>

<body>
    <div class="main container container-fluid">
        <!-- Affichage des méssage d'erreur -->
        <?php include_once "client_error.php" ?>

        <div class="row">
            <div id="main_content" class="col-lg-12 col-md-12 col-sm-12">
                <div class="header text-center">
                    <h1>CBANKING WEB CLIENT</h1>
                    <span>Connectez-vous à votre compte !</span>
                </div>
                <div class="card">
                    <img id="avatar" width="80" height="80" class="card-img-top"
                      src="<?php echo HTML::img("assets/images/avatars/avatar-login.png");?>" title="avatar" alt="avatar"/>
                    <div class="card-body">
                        <?php
                            echo validation_errors('<div class="alert alert-warning">', '</div>');
                            echo form_open("");
                        ?>
                            <div style="width: 100%" class="form-group">
                                <input class="form-control" name="e-mail" type="email" placeholder="Adresse électronique"/>
                            </div>
                            <div style="width: 100%" class="form-group">
                                <input class="form-control" name="passwd" type="password" placeholder="Mot de passe"/>
                            </div>
                            <input style="width: 100%" id="btn-submit" class="btn btn-primary" type="submit" value="Envoyer" />
                        </form>
                        <a class="btn btn-link" title="mot de passe oublié" href="">Mot de passe oublié ?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
