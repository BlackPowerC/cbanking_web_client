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
    <script src="../vendor/components/jquery/jquery.js"></script>
    <script src="../vendor/twbs/bootstrap/dist/js/bootstrap.js"></script>
    <title>Inscription</title>
</head>

<body>
<?php include_once "navbar.inc.php" ?>
<div class="main container container-fluid">
    <div class="row">
        <div id="main_content" class="col-lg-12 col-md-12 col-sm-12">
            <div class="text-center">
                <?php
                switch ($status_code)
                {
                    case 200:
                    ?>
                    <span class="alert alert-success">Utilisateur inscris avec success !</span>
                    <?php
                        break;
                    case 0:
                        break;
                    default:
                    ?>
                    <span class="alert alert-warning">Une erreur est survenue !</span>
                    <?php
                        break ;
                }
                ?>
            </div>
            <div class="header text-center">
                <h1>CBANKING WEB CLIENT</h1>
                <span>Créer un compte d'employé !</span>
            </div>
            <div class="card">
                <img id="avatar" width="80" height="80" class="card-img-top" src="../vendor/img/avatar-login.png" title="avatar" alt="avatar"/>
                <div class="card-body">
                    <?php
                    echo validation_errors('<div class="alert alert-warning">', '</div>');
                    echo form_open("");
                    ?>
                    <div style="width: 100%" class="form-group">
                        <input class="form-control" value="<?php echo set_value("name"); ?>" name="name" type="text" placeholder="Nom réel"/>
                    </div>
                    <div style="width: 100%" class="form-group">
                        <input class="form-control" value="<?php echo set_value("e-mail"); ?>" name="e-mail" type="email" placeholder="Adresse électronique"/>
                    </div>
                    <div style="width: 100%" class="form-group">
                        <input class="form-control" value="<?php echo set_value("passwd"); ?>" name="passwd" type="password" placeholder="Mot de passe"/>
                    </div>
                    <div style="width: 100%" class="form-group">
                        <label class="label" for="">Type d'utilisateur</label>
                        <select class="form-control" name="type">
                            <option value="customer">Client</option>
                            <option value="employee">Employé</option>
                        </select>
                    </div>
                    <input style="width: 100%" id="btn-submit" class="btn btn-primary" type="submit" value="Envoyer" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>