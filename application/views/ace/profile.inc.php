<?php
/**
 * Created by PhpStorm.
 * User: jordy
 * Date: 08/04/18
 * Time: 19:24
 */?>

<div id="user-profile-1" class="user-profile row">
    <div class="col-xs-12 col-sm-3 center">
        <div>
            <span class="profile-picture">
                <img id="avatar" class="editable img-responsive" alt="Alex's Avatar" src="<?php echo HTML::img("assets/images/avatars/profile-pic.jpg")?>" />
            </span>
            <div class="space-4"></div>
            <div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
                <div class="inline position-relative">
                    <a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
                        <i class="ace-icon fa fa-circle light-green"></i>
                        &nbsp;
                        <span class="white"><?php echo $customer['name']; ?></span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xs-12 col-sm-9">
        <div class="space-12"></div>

        <div class="profile-user-info profile-user-info-striped">
            <div class="profile-info-row">
                <div class="profile-info-name"> Nom </div>

                <div class="profile-info-value">
                    <span class="editable" id="username"><?php echo $name; ?></span>
                </div>
            </div>
            <div class="profile-info-row">
                <div class="profile-info-name"> Prénom </div>

                <div class="profile-info-value">
                    <span class="editable" id="username"><?php echo $surname; ?></span>
                </div>
            </div>
            <div class="profile-info-row">
                <div class="profile-info-name"> Email </div>

                <div class="profile-info-value">
                    <span class="editable" id="username"><?php echo $email; ?></span>
                </div>
            </div>
        </div>

        <div class="space-20"></div>
    </div>
</div>