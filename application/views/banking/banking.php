<?php
/**
 * Created by PhpStorm.
 * User: jordy
 * Date: 27/03/18
 * Time: 22:06
 */

defined('BASEPATH') OR exit('No direct script access allowed');
defined('VENDOR') OR exit('No direct script access allowed') ;
?>

<html lang="fr">
<head>
    <meta charset="utf-8"/>
    <title>Client: <?php echo $customer['name'] ; ?></title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../vendor/twbs/bootstrap/dist/css/bootstrap.css" id="bootstrap3" />
    <link rel="stylesheet" href="../style/main.css" id="maincss" />
    <script src="../vendor/components/jquery/jquery.js"></script>
    <script src="../vendor/twbs/bootstrap/dist/js/bootstrap.js"></script>
</head>
<body>

<!-- En-tete -->
<?php $this->load->view("navbar.inc.php") ?>

<div id="page" class="container container-fluid">
    <!-- Affichage des méssage d'erreur -->
    <?php $this->load->view("client_error") ?>

    <!-- Entete avec nom de l'utilisateur et Photo de profil -->
    <div class="row">
        <!-- Colonne pour la pp -->
        <div class="side_content col-lg-4 col-md-4 col-xs-4">
            <div class="card" style="border: dashed 0px; width: 80%">
                <img class="card-img-top img-thumbnail" src="../vendor/img/avatar-login.png" title="avatar" alt="avatar">
                <div class="card-body">
                    <h4 class="card-title" style="margin-top: 5px;"><?php echo $customer['name'] ;?></h4>
                </div>
            </div>
        </div>

        <div class="main_content col-lg-8 col-md-8 col-xs-8">
            <ul class="nav nav-tabs">
                <li class="active nav-item">
                    <a class="nav-link" data-toggle="tab" href="#info-pan">Ces comptes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#account-pan">Création de compte</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#operation-pan">Transaction<a>
                </li>
            </ul>
            <div class="tab-content">
                <?php include_once 'banking_tab_info.inc.php' ?>
                <?php include_once 'banking_tab_account.inc.php' ?>
                <?php include_once 'banking_tab_operation.inc.php' ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>