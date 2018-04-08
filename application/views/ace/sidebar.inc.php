<?php
/**
 * Created by PhpStorm.
 * User: jordy
 * Date: 06/04/18
 * Time: 13:08
 */
?>

<div id="sidebar" class="sidebar responsive ace-save-state">
    <script type="text/javascript">
        try{ace.settings.loadState('sidebar')}catch(e){}
    </script>


    <ul class="nav nav-list">
        <li class="active">
            <a href="index.html">
                <i class="menu-icon fa fa-tachometer"></i>
                <span class="menu-text"> Tableaux de bord </span>
            </a>

            <b class="arrow"></b>
        </li>

        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-pencil-square-o"></i>
                <span class="menu-text"> Clients </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">
                <li class="">
                    <a href="<?php echo BASE_URL.'index.php/management/customers'; ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Liste des clients
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="<?php echo BASE_URL.'index.php/management/subscription'; ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Inscrire un client
                    </a>

                    <b class="arrow"></b>
                </li>
            </ul>
        </li>

        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-pencil-square-o"></i>
                <span class="menu-text"> Employés </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">
                <li class="">
                    <a href="<?php echo BASE_URL.'index.php/management/subordinates'; ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Liste des subordonnés
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="<?php echo BASE_URL.'index.php/management/subscription'; ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Inscrire un subordonné
                    </a>

                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-pencil-square-o"></i>
                <span class="menu-text"> Comptes </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">
                <li class="">
                    <a href="<?php echo BASE_URL.'index.php/banking/accounts'; ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Liste des comptes
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="#">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Créer de compte
                    </a>

                    <b class="arrow"></b>
                </li>
            </ul>
        </li>

    </ul><!-- /.nav-list -->

    <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
        <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
    </div>
</div>
