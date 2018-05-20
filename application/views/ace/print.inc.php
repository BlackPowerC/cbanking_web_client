<?php
/**
 * Created by PhpStorm.
 * User: jordy
 * Date: 20/05/18
 * Time: 19:14
 */
?>

<form style="display: inline"
      action="https://v2.convertapi.com/url/to/pdf?Secret=<?php echo CONVERT_API_SECRET; ?>&download=attachment"
      method="POST"
      enctype="multipart/form-data">
    <input type="hidden" name="Url" value="<?php echo base_url().$_SERVER['REQUEST_URI'] ; ?>"/>
    <button class="btn btn-primary" type="submit">Imprimer <i class="fa fa-print"></i></button>
</form>
