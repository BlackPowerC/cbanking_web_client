<?php
defined('BASEPATH') OR exit('No direct script access allowed');
defined('VENDOR') OR exit('No direct script access allowed') ;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../vendor/twbs/bootstrap/dist/css/bootstrap.css" id="bootstrap3" />
    <link rel="stylesheet" href="../style/main.css" id="maincss" />
    <title>Connexion</title>
</head>

<body>
    <div class="main container container-fluid">
        <div class="row">
            <div id="main_content" class="col-lg-12 col-md-12 col-sm-12">
                <div class="header text-center">
                    <h1>CBANKING WEB CLIENT</h1>
                    <span>Connectez-vous à votre compte !</span>
                </div>
                <div class="card">
                    <img id="avatar" width="80" height="80" class="card-img-top" src="../vendor/img/avatar-login.png" title="avatar" alt="avatar"/>
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