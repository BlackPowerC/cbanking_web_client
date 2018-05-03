<?php
/**
 * Created by PhpStorm.
 * User: jordy
 * Date: 13/04/18
 * Time: 21:25
 */?>
<div id="navbar" class="navbar navbar-default ace-save-state">
    <div class="navbar-container ace-save-state" id="navbar-container">
        <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
            <span class="sr-only">Toggle sidebar</span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>
        </button>

        <div class="navbar-header pull-left">
            <a href="#" class="navbar-brand">
                <small>
                    <img style="display:inline" class="editable img-responsive" alt="icon" src="<?php echo HTML::img("assets/images/business.png")?>" />
                    Panneau d'administration
                </small>
            </a>
        </div>

        <?php $this->load->view("ace/navbar.inc.php") ?>

    </div><!-- /.navbar-container -->
</div>
