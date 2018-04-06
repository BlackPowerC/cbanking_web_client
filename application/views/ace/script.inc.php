<?php
/**
 * Created by PhpStorm.
 * User: jordy
 * Date: 06/04/18
 * Time: 17:35
 */
?>

<!-- basic scripts -->

<!--[if !IE]> -->
<script src="<?php echo HTML::script('assets/js/jquery-2.1.4.min') ;?>"></script>

<!-- <![endif]-->

<!--[if IE]>
<script src="<?php echo HTML::script('assets/js/jquery-1.11.3.min') ;?>"></script>
<![endif]-->
<script type="text/javascript">
    if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'\" ;>"+"<"+"/script>");
</script>
<script src="<?php echo HTML::script('assets/js/bootstrap.min') ;?>"></script>

<!-- page specific plugin scripts -->

<!--[if lte IE 8]>
<script src="<?php echo HTML::script('assets/js/excanvas.min') ;?>"></script>
<![endif]-->
<script src="<?php echo HTML::script('assets/js/jquery-ui.custom.min') ;?>"></script>
<script src="<?php echo HTML::script('assets/js/jquery.ui.touch-punch.min') ;?>"></script>
<script src="<?php echo HTML::script('assets/js/jquery.easypiechart.min') ;?>"></script>
<script src="<?php echo HTML::script('assets/js/jquery.sparkline.index.min') ;?>"></script>
<script src="<?php echo HTML::script('assets/js/jquery.flot.min') ;?>"></script>
<script src="<?php echo HTML::script('assets/js/jquery.flot.pie.min') ;?>"></script>
<script src="<?php echo HTML::script('assets/js/jquery.flot.resize.min') ;?>"></script>

<!-- ace scripts -->
<script src="<?php echo HTML::script('assets/js/ace-elements.min') ;?>"></script>
<script src="<?php echo HTML::script('assets/js/ace.min') ;?>"></script>
