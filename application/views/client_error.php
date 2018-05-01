<?php
/**
 * Created by PhpStorm.
 * User: jordy
 * Date: 31/03/18
 * Time: 17:08
 */

if($error_msg !== "")
{
?>
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div id="feedback" style="width: 50%; margin: auto" class="alert alert-success">
            <span class="text-center"><?php echo $error_msg; ?>
                <button onclick="hideFeedBack()" style="float: right" class="fa fa-crosshairs"></button>
            </span>
            </div>
        </div>
    </div>
<?php
}

?>
