<?php
/**
 * Created by PhpStorm.
 * User: jordy
 * Date: 06/04/18
 * Time: 13:16
 */
?>
<div class="navbar-buttons navbar-header pull-right" role="navigation">
    <ul class="nav ace-nav">
        <li class="light-blue dropdown-modal">
            <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                <img class="nav-user-photo" src="assets/images/avatars/user.jpg" alt="Jason's Photo" />
                <span class="user-info">
                    <small>Bienvenue,</small> <?php echo $name ; ?>
                </span>
                <i class="ace-icon fa fa-caret-down"></i>
            </a>
            <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                <li>
                    <a href="profile">
                        <i class="ace-icon fa fa-user"></i>Profil
                    </a>
                </li>

                <li class="divider"></li>

                <li>
                    <a href="../signin/logout">
                        <i class="ace-icon fa fa-power-off"></i>Déconnexion
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</div>