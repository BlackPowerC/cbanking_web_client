<?php
/**
 * Created by PhpStorm.
 * User: jordy
 * Date: 26/03/18
 * Time: 13:17
 */

defined('BASEPATH') OR exit('No direct script access allowed');
defined('VENDOR') OR exit('No direct script access allowed') ;
?>

<html lang="fr">
<head>
    <meta charset="utf-8"/>
    <title>Page personnelle</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../vendor/twbs/bootstrap/dist/css/bootstrap.css" id="bootstrap3" />
    <link rel="stylesheet" href="../style/main.css" id="maincss" />
    <script src="../vendor/components/jquery/jquery.js"></script>
    <script src="../vendor/twbs/bootstrap/dist/js/bootstrap.js"></script>
</head>
<body>
<!-- En-tete -->
<?php include_once "navbar.inc.php" ?>

<div id="page" class="container container-fluid">
    <!-- Entete avec nom de l'utilisateur et Photo de profil -->
    <div class="row">
        <!-- Colonne pour la pp -->
        <div class="side_content col-lg-4 col-md-4 col-xs-4">
            <img width="200" height="200" class="card-img-top" src="../vendor/img/avatar-login.png" title="avatar" alt="avatar"/>
        </div>

        <div class="main_content col-lg-8 col-md-8 col-xs-8">
            <h1 class="text-center">Informations personnelles</h1>
            <div class="well">
                <span></span>
                <span style="float: right"></span>
            </div>
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#info">Information Personnelles</a></li>
                <li><a data-toggle="tab" href="#mod">Modifier</a></li>
            </ul>
            <div class="tab-content">
                <div id="info" class="tab-pan fade in active">
                    <ul>
                        <li>Pseudo : jordy</li>
                        <li>Email : fatigba72@gmail.com</li>
                    </ul>
                </div>
                <div id="mod" class="tab-pan fade">
                    <div class="row">
                        <form method="POST" action="../post/post_connexion.php?action=update&uri=/~jordy/Blog/src/app/frontend/userpanel.php">
                            <fieldset>
                                <legend>Informations</legend>
                                <!-- Pseudo -->
                                <div class="form-group">
                                    <label for="pseudo">Pseudo</label>
                                    <input type="text" class="form-control" placeholder="Saisir pseudo" name="pseudo" required="" />
                                </div>
                                <!-- Email -->
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="e-mail" class="form-control" placeholder="Saisir adresse électonique" name="email" required="" />
                                </div>
                            </fieldset>
                            <div class="form_control_content" style="width: 200px; margin: auto">
                                <input type="submit" class="btn btn-primary"/>
                                <input type="reset" class="btn btn-primary"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>