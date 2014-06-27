<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed') ?>
<div id="header">
	<div class="container">
    <a href="<?php echo base_url() ?>"><img src="<?php echo base_url() ?>static/i/logo.png" /></a>
    <?php if(isset($_SESSION['isat']['name'])) echo '<a class="acc" rel="if_url" url="'.base_url().'index.php/form/my_profile">'.$_SESSION['isat']['name'].'</a>'; else echo '<img src="'.base_url().'static/i/rapidssl.gif" style="float:right;height:30px" />' ?>
    <div class="clear"></div>
    </div>
</div>
