<?php session_start(); if(empty($_SESSION['isat']['log'])) exit('<script>alert("Session expired, please re-login!");self.close();</script>');if ( ! defined('BASEPATH')) exit('No direct script access allowed'); $Qtit = $this->db->query("SELECT `title` FROM `it_atp` WHERE `atp_id`='$dx'"); $tit = $Qtit->result_object(); $title = $tit[0]->title; ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xml:lang="en" xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<title>Preload ATP Ericsson 3G (Page 1) - <?php echo $title ?></title>
<style type="text/css">
@page{
  margin: 0;
}
body{
	font-family: sans-serif;
	font-size:12px
}
a{
	background:#FFF;
	padding:5px;
	border:1px solid #000;
	color:#000
}
a:hover{
	background:#000;
	cursor:pointer;
	color:#FFF
}
label{
	cursor:pointer
}
input[type='text']{
	width:95%;
}
hr{
	page-break-after:always;
	border:0
}
img{
	vertical-align:middle;
}
h1{
	font-size:28px;
	text-align:center
}
h2{
	font-size:20px;
	text-align:center
}
h2 span{
	font-size:12px;
	font-weight:normal
}
h3{
	font-size:14px;
	margin:0;
	padding:10px 0 5px 0
}
table{
	font-size:12px;
	width:100%;
	margin:0;
	padding:0;
	border:0
}
table td{
	padding:3px;
}
table .header td{
	background:#CCC;
	text-align:center;
}
table.border td{
	border:1px solid #000;
}
table.footer{
	color:#666;
	font-size:11px
}
table.footer td{
	border:1px solid #666;
}
div#footer{
	position:fixed;
	background:#FFF;
	overflow:hidden;
	padding:0.1cm;
	bottom:0cm;
	left:0cm;
	width:100%;
	height:4cm
}
div#footer span{
	color:#FFF;
	padding:0 5px
}
div#footer-cover{
	position:absolute;
	background:#FFF;
	bottom:2.4cm;
	height:70px;
	width:100%
}
#logo{
	text-align:center;
	margin:150px 0 100px 0
}
.attach{
	border-bottom:1px solid #000;
	text-align:center;
	padding:5px 0
}
.sign{
	height:40px
}
.button{
	padding: 2px 8px;
	margin-bottom:10px;
	width:80px;
	height:35px;
}

.button:hover{
	cursor:pointer;
}
.reset{
	padding: 2px 8px;
	margin-bottom:10px;
	width:150px;
	height:35px;
}
.reset:hover{
	cursor:pointer;
}
</style>
</head>

<body>
<h2>Preload ATP Ericsson 3G</h2>
<h1>Page 1</h1><br /><br />

<?php $Qatp = $this->db->query("
					SELECT b.`id`, b.`name`, b.`address`
					FROM `it_atp` a
					LEFT JOIN `it_site` b ON b.`site_id`=a.`site_id`
					WHERE a.`atp_id`='$dx'");
					$atp = $Qatp->result_object() ?>
                    
<h3>Identification</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr>
	<td valign="top"><font color="#666">Site ID:</font> <?php echo $atp[0]->id ?><p style="margin-bottom:0"><font color="#666">Site Name:</font> <?php echo $atp[0]->name ?></p></td>
    <td valign="top"><font color="#666">Site Address:</font> <?php echo $atp[0]->address ?></td>
</tr>
</table>

<?php
$Qei = $this->db->query("SELECT * FROM `it_atp_form` WHERE `atp_id`='$dx'");
$ei = $Qei->result_object();

$rbs_type = explode('|', $ei[0]->identification_conf_rbs);
$configuration_type = explode('|', $ei[0]->identification_conf_type);
$installed_type = explode('|', $ei[0]->identification_conf_installed);
$activated_type = explode('|', $ei[0]->identification_conf_activated);
$serial_type = explode('|', $ei[0]->identification_conf_serial);
$time_spent = explode('|', $ei[0]->time_spent);
?>

<form name="preload3G" method="post" action="">
<h3>Equipment Identification</h3>
<table cellpadding="0" cellspacing="0">
<tr valign="top">
	<td width="80">Type</td><td align="center" width="10">:</td>
    <td>
    	<table>
        <tr>
		<?php
        $arr_identification_type = array(1=> 'RBS 3101', 'RBS 3206', 'RBS 3107', 'RBS 3303', 'RBS 3202', 'RBS 3116', 'RBS 3412', 'RBS 3418', 'RBS 3518', 'RBS 3216', 'RBS 3106', 'RBS 6101', 'RBS 6201', 'RBS 6102', 'RBS 6601', 'RBS 6301');
        $usr_identification_type = array_merge(explode('|', $ei[0]->identification_type));
        for($i=1; $i <= 16; $i++){
            echo '<td><input type="checkbox" name="identification_type[]" id="'.$arr_identification_type[$i].'" value="'.$arr_identification_type[$i].'" '; if(in_array($arr_identification_type[$i], $usr_identification_type, true))  echo 'checked="checked"'; echo ' /> '.$arr_identification_type[$i].'</td>';
            if(($i==5)||($i==10)||($i==15)) echo '</tr><tr>';
        }
        ?>
        </tr>
        </table>
    </td>
</tr>
<tr valign="top">
	<td>RBS Configuration</td><td align="center">:</td>
    <td>
        <table class="border" cellpadding="0" cellspacing="0">
        <tr class="header">
        	<td>RBS Type</td><td>Configuration Type</td><td>Installed</td><td>Activated</td><td>Factory Serial Number</td>
		</tr>
        <tr>
        	<td><input type="checkbox" name="identification_conf_rbs[]" id="indoor" value="Indoor" <?php if($rbs_type[0]=='Indoor') echo 'checked="checked"'; ?>> Indoor</td>
            <td><input type="checkbox" name="identification_conf_type[]" id="wcdma" value="WCDMA" <?php if($configuration_type[0]=='WCDMA') echo 'checked="checked"'; ?>> WCDMA</td>
            <td><input type="text" name="identification_conf_installed[]" id="installed1" value="<?php echo $this->ifunction->ifnulls($installed_type[0]) ?>" /></td>
            <td><input type="text" name="identification_conf_activated[]" id="activated1" value="<?php echo $this->ifunction->ifnulls($activated_type[0]) ?>" /></td>
            <td><input type="text" name="identification_conf_serial[]" id="serialno1" value="<?php echo $this->ifunction->ifnulls($serial_type[0]) ?>" /></td>
        </tr>
        <tr>
            <td><input type="checkbox" name="identification_conf_rbs[]" id="outdoor" value="Outdoor" <?php if($rbs_type[0]=='Outdoor') echo 'checked="checked"'; ?>> Outdoor</td>
            <td><input type="checkbox" name="identification_conf_type[]" id="gsm" value="GSM" <?php if($configuration_type[0]=='GSM') echo 'checked="checked"'; ?>> GSM</td>
            <td><input type="text" name="identification_conf_installed[]" id="installed2" value="<?php echo $this->ifunction->ifnulls($installed_type[1]) ?>" /></td>
            <td><input type="text" name="identification_conf_activated[]" id="activated2" value="<?php echo $this->ifunction->ifnulls($activated_type[1]) ?>" /></td>
            <td><input type="text" name="identification_conf_serial[]" id="serialno2" value="<?php echo $this->ifunction->ifnulls($serial_type[1]) ?>" /></td>
		</tr>
        </table>
    </td>
</tr>
<tr valign="top">
	<td>Number of Cabinet</td><td align="center">:</td><td><input type="text" name="identification_no_cabinet" value="<?php echo $this->ifunction->ifnulls($ei[0]->identification_no_cabinet) ?>" style="width:100px;" /></td>
</tr>
<tr valign="top">
	<td>IP Address</td><td align="center">:</td><td><input type="text" name="identification_ip_address" value="<?php echo $this->ifunction->ifnulls($ei[0]->identification_ip_address) ?>" style="width:100px;" /></td>
</tr>
<tr valign="top">
	<td>Software Version</td><td align="center">:</td><td><input type="text" name="identification_soft_version" value="<?php echo $this->ifunction->ifnulls($ei[0]->identification_soft_version) ?>" style="width:100px;" /></td>
</tr>
<tr valign="top">
	<td>Sites Profile</td><td align="center">:</td>
    <td>
	<?php
    $arr_identification_site_profile=array(1=> 'New Site', 'Collocated (GSM/CDMA)', 'Cabinet Replacement');
	for($i=1; $i <= 3; $i++){
		echo '<input type="radio" name="identification_site_profile" value="'.$arr_identification_site_profile[$i].'" '; if($ei[0]->identification_site_profile==$arr_identification_site_profile[$i])  echo 'checked="checked"'; echo ' /> '.$arr_identification_site_profile[$i].' &nbsp; &nbsp; ';
	}
	?>
    </td>
</tr>
<tr valign="top">
	<td>RBS Topology</td><td align="center">:</td>
    <td>
	<?php
    $arr_identification_rbs_topology=array(1=> 'Hub RBS', 'End RBS');
	for($i=1; $i <= 2; $i++){
		echo '<input type="radio" name="identification_rbs_topology" value="'.$arr_identification_rbs_topology[$i].'" '; if($ei[0]->identification_rbs_topology==$arr_identification_rbs_topology[$i])  echo 'checked="checked"'; echo ' /> '.$arr_identification_rbs_topology[$i].' &nbsp; &nbsp; ';
	}
	?>
    </td>
</tr>
</table>

<hr />

<center>
    <input type="reset" class="reset" value="Reset to Default"/>  &emsp;
    <input type="button" class="button" name="next" value="Next" onclick="validasi(2, <?php echo $dx ?>)" />
    <input type="hidden" name="kirim" value="" />
    <input type="hidden" name="page" value="" />
    <input type="hidden" name="atp_id" value="" />
</center>
</form>

<script type="text/javascript">
function validasi(page, atp_id)
{
	var rbs = document.preload3G.identification_rbs_topology;
	
	if((document.getElementById('RBS 3101').checked == false) && (document.getElementById('RBS 3206').checked == false) && (document.getElementById('RBS 3107').checked == false) && (document.getElementById('RBS 3303').checked == false) && (document.getElementById('RBS 3202').checked == false) && (document.getElementById('RBS 3116').checked == false) && (document.getElementById('RBS 3412').checked == false) && (document.getElementById('RBS 3418').checked == false) && (document.getElementById('RBS 3518').checked == false) && (document.getElementById('RBS 3216').checked == false) && (document.getElementById('RBS 3106').checked == false) && (document.getElementById('RBS 6101').checked == false) && (document.getElementById('RBS 6201').checked == false) && (document.getElementById('RBS 6102').checked == false) && (document.getElementById('RBS 6601').checked == false) && (document.getElementById('RBS 6301').checked == false))
	{
		alert('Please check at least one identification type');
	}
	else if((document.getElementById('indoor').checked == false) && (document.getElementById('outdoor').checked == false))
	{
		alert('Please check at leas one RBS type');
	}
	else if((document.getElementById('wcdma').checked == false) && (document.getElementById('gsm').checked == false))
	{
		alert('Please check at least one Configuration Type');
	}
	else if((document.getElementById('installed1').value=='') && (document.getElementById('installed2').value==''))
	{
		alert('Please fill one of "Installed" form');
	}
	else if((document.getElementById('activated1').value=='') && (document.getElementById('activated2').value==''))
	{
		alert('Please fill one of "Activated" form');
	}
	else if((document.getElementById('serialno1').value=='') && (document.getElementById('serialno2').value==''))
	{
		alert('Please fill one of "Factory Serial Number" form');
	}
	else if(document.preload3G.identification_no_cabinet.value=='')
	{
		alert('Please fill one of "Number of Cabinet" form');
	}
	else if(document.preload3G.identification_ip_address.value=='')
	{
		alert('Please fill one of "IP Address" form');
	}
	else if(document.preload3G.identification_soft_version.value=='')
	{
		alert('Please fill one of "Software Version" form');
	}
	else if((document.preload3G.identification_site_profile[0].checked == false) && (document.preload3G.identification_site_profile[1].checked == false) && (document.preload3G.identification_site_profile[2].checked == false))
	{
		alert('Please Select one of Sites Profile');
	}
	else if(rbs[0].checked == false && rbs[1].checked == false)
	{
		alert('Please Select one of RBS Topology');
	}
	else
	{
		document.preload3G.page.value=page;
		document.preload3G.atp_id.value=atp_id;
		document.preload3G.submit();
	}
}
</script>

<?php
if(isset($_POST['kirim']))
{
	$Qlist = $this->db->query("SELECT user_id FROM it_atp WHERE atp_id='$dx' AND `fl_quest`='0'");
	$hasil = $Qlist->result_object();
		
	if(!$Qlist->num_rows || ($hasil[0]->user_id == 0)) die(':P');

	//echo '<pre>'; print_r($_POST); echo '</pre>'; die('debugging');
	
	extract($_POST);
	
	$identification_type = implode("|", $identification_type);
	$identification_conf_rbs = implode("|", $identification_conf_rbs);
	$identification_conf_type = implode("|", $identification_conf_type);
	
	$jumlah_identification_conf_installed = count($identification_conf_installed);
	for($i=0;$i<$jumlah_identification_conf_installed;$i++)
	{
		$identification_conf_installed[$i] = preg_replace('#[^A-Za-z0-9]#i', '', $identification_conf_installed[$i]);
		if($identification_conf_installed[$i]=="")
		{
			$identification_conf_installed[$i] = "null";
		}
	}
	$identification_conf_installed = implode("|", $identification_conf_installed);
	
	$jumlah_identification_conf_activated = count($identification_conf_activated);
	for($i=0;$i<$jumlah_identification_conf_activated;$i++)
	{
		$identification_conf_activated[$i] = preg_replace('#[^A-Za-z0-9]#i', '', $identification_conf_activated[$i]);
		if($identification_conf_activated[$i]=="")
		{
			$identification_conf_activated[$i]="null";	
		}
	}
	$identification_conf_activated = implode("|", $identification_conf_activated);

	$jumlah_identification_conf_serial = count($identification_conf_serial);
	for($i=0;$i<$jumlah_identification_conf_serial;$i++)
	{
		$identification_conf_serial[$i] = preg_replace('#[^A-Za-z0-9]#i', '', $identification_conf_serial[$i]);
		if($identification_conf_serial[$i]=="")
		{
			$identification_conf_serial[$i] = "null";
		}
	}
	$identification_conf_serial = implode("|", $identification_conf_serial);
	
	$this->db->query("DELETE FROM `it_atp_form` WHERE `atp_id` = '$dx'");
		$fields = array(
		'atp_id' => $dx,
		'user_id' => $hasil[0]->user_id,
		'identification_type' => $identification_type,
		'identification_conf_rbs' => $identification_conf_rbs,
		'identification_conf_type' => $identification_conf_type,
		'identification_conf_installed' => $identification_conf_installed,
		'identification_conf_activated' => $identification_conf_activated,
		'identification_conf_serial' => $identification_conf_serial,
		'identification_no_cabinet' => $identification_no_cabinet,
		'identification_ip_address' => $identification_ip_address,
		'identification_soft_version' => $identification_soft_version,
		'identification_site_profile' => $identification_site_profile,
		'identification_rbs_topology' => $identification_rbs_topology
		);
	$this->db->insert('it_atp_form', $fields);
	
	header('Location:'.base_url().'index.php/process/pdf/edit/atp/ericsson3G/'.$atp_id.'/'.$page);
}

include 'paging.php';
?>
</body>
</html>