<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed') ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!--Developed by irvanfauzie@gmail.com-->
<head>
<title>Indosat - Geotagging System</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-language" content="en" />
<meta http-equiv="imagetoolbar" content="no" />
<meta http-equiv="X-UA-Compatible" content="IE=9" />
<meta name="robots" content="noindex, nofollow" />
<link rel="icon" type="image/x-ico" href="<?php echo base_url() ?>static/i/favicon.png">
<style type="text/css">@import url("<?php echo base_url() ?>static/css/proxy.php?f=stylesheet");</style>
<script type="text/javascript" src="<?php echo base_url() ?>static/js/proxy.php?f=jquery-1.5.1.min"></script>
<script type="text/javascript" src="<?php echo base_url() ?>static/js/proxy.php?f=form"></script>
<script type="text/javascript" src="<?php echo base_url() ?>static/js/proxy.php?f=popup"></script>
<script>var HOST = "<?php echo base_url() ?>";</script>
<script type="text/javascript" src="<?php echo base_url() ?>static/js/proxy.php?f=misc"></script>
</head>
<body>
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
ga('create', 'UA-41459921-1', 'indosat-geotaging.com');
ga('send', 'pageview');
</script>
<?php if(isset($_SESSION['isat']['log'])){ ?>
<table id="if_box" border="0" cellpadding="0" cellspacing="0">
<tr class="ifheader"><td class="ifleft"></td><td class="ifmiddle"></td><td class="ifright"></td></tr>
<tr class="ifbody"><td colspan="3" class="ifmiddle"><div id="if_popcontent"></div></td></tr>
<tr class="iffooter"><td class="ifleft"></td><td class="ifmiddle"></td><td class="ifright"></td></tr>
</table>
<table id="if-box" border="0" cellpadding="0" cellspacing="0">
<tr class="ifheader"><td class="ifleft"></td><td class="ifmiddle"></td><td class="ifright"></td></tr>
<tr class="ifbody"><td colspan="3" class="ifmiddle"><div id="if-popcontent"></div></td></tr>
<tr class="iffooter"><td class="ifleft"></td><td class="ifmiddle"></td><td class="ifright"></td></tr>
</table>
<?php } ?>
