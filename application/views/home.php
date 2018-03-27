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
            <img width="200" height="200" class="img-thumbnail" src="../vendor/img/avatar-login.png" title="avatar" alt="avatar"/>
        </div>

        <div class="main_content col-lg-8 col-md-8 col-xs-8">
            <div class="well">
                <span></span>
                <span style="float: right"></span>
            </div>
            <ul class="nav nav-tabs">
                <li class="active nav-item">
                    <a class="nav-link" data-toggle="tab" href="#info-pan">Information Personnelles</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#mod-pan">Modifier</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#subordinate-pan">Subordonnés</a>
                </li>
            </ul>
            <div class="tab-content">
                <?php include_once 'home_tab_info.inc.php' ?>
                <?php include_once 'home_tab_subordinate.inc.php' ?>
                <?php include_once 'home_tab_mod.inc.php' ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>