<?php session_start(); if(empty($_SESSION['isat']['log'])) exit('<script>alert("Session expired, please re-login!");self.close();</script>'); if ( ! defined('BASEPATH')) exit('No direct script access allowed'); $Qtit = $this->db->query("SELECT `title` FROM `it_atp` WHERE `atp_id`='$dx'"); $tit = $Qtit->result_object(); $title = $tit[0]->title; ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xml:lang="en" xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<title>Preload ATP Ericsson 2G (Page 1) - <?php echo $title ?></title>
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

<h2>Preload ATP Ericsson 2G</h2>
<h1>Page 1</h1>
<br /><br />

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
$Qei1 = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='-1' AND `no_chapter`='-1.1' ORDER BY `subno_chapter_order` ASC");
$ei1 = $Qei1->result_object(); $dt_ei1 = explode('|', $ei1[0]->content);

$Qei2 = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='-2' AND `no_chapter`='-2.1' ORDER BY `subno_chapter_order` ASC");
foreach($Qei2->result_object() as $ei2) $arr_ei2[]=$ei2;

$dt_ei2a = explode('|', $arr_ei2[0]->content);
$dt_ei2b = explode('|', $arr_ei2[1]->content);

$Qei3 = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='-3' AND `no_chapter`='-3.1' ORDER BY `subno_chapter_order` ASC");
$ei3 = $Qei3->result_object(); $dt_ei3 = explode('|', $ei3[0]->content);

$Qei4 = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='-4' AND `no_chapter`='-4.1' ORDER BY `subno_chapter_order` ASC");
foreach($Qei4->result_object() as $ei4) $arr_ei4[]=$ei4;

$Qei5 = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='-5' AND `no_chapter`='-5.1' ORDER BY `subno_chapter_order` ASC");
foreach($Qei5->result_object() as $ei5) $arr_ei5[]=$ei5;

$dt_ei5a = explode('|', $arr_ei5[0]->content);
$dt_ei5b = explode('|', $arr_ei5[1]->content);

$Qei6 = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='-6' AND `no_chapter`='-6.1' ORDER BY `subno_chapter_order` ASC");
$ei6 = $Qei6->result_object(); $dt_ei6 = explode('|', $ei6[0]->content);
?>

<form name="preload2G" method="post" action="" />
<h3>Equipment Identification</h3>
<table cellpadding="0" cellspacing="0">
<tr valign="top">
	<td width="80">Type</td><td align="center" width="10">:</td>
    <td>
    <input type="checkbox" name="dt_ei1[]" id="dt_ei1_3" value="true" <?php if($dt_ei1[3]=='true') echo 'checked="checked"' ?>> RBS 6201
    <span style="padding:0 15px">&nbsp;</span>
    <input type="checkbox" name="dt_ei1[]" id="dt_ei1_4" value="true" <?php if($dt_ei1[4]=='true') echo 'checked="checked"' ?>> RBS 6102
    </td>
</tr>
<tr valign="top">
	<td><br />RBS Configuration</td><td align="center"><br />:</td>
    <td>
    	<br />
        <table class="border" cellpadding="0" cellspacing="0">
        <tr class="header">
        	<td>BAND</td><td>Installed TRX</td><td>Activated TRX</td><td>Factory Serial Number RBS</td>
		</tr>
        <tr>
            <td>GSM 900</td>
            <td><input type="text" name="dt_ei2_1[]" value="<?php echo $this->ifunction->ifnulls($dt_ei2a[3]) ?>" /></td>
            <td><input type="text" name="dt_ei2_1[]" value="<?php echo $this->ifunction->ifnulls($dt_ei2a[4]) ?>" /></td>
            <td><input type="text" name="dt_ei2_1[]" value="<?php echo $this->ifunction->ifnulls($dt_ei2a[5]) ?>" /></td>
        </tr>
        <tr>
            <td>DCS 1800</td>
            <td><input type="text" name="dt_ei2_2[]" value="<?php echo $this->ifunction->ifnulls($dt_ei2b[3]) ?>" /></td>
            <td><input type="text" name="dt_ei2_2[]" value="<?php echo $this->ifunction->ifnulls($dt_ei2b[4]) ?>" /></td>
            <td><input type="text" name="dt_ei2_2[]" value="<?php echo $this->ifunction->ifnulls($dt_ei2b[5]) ?>" /></td>
		</tr>
        </table>
        <br />
    </td>
</tr>
<tr valign="top">
	<td>Sites Profile</td><td align="center">:</td>
    <td>
    <input type="checkbox" name="dt_ei3[]" id="dt_ei3_1" value="true" <?php if($dt_ei3[3]=='true') echo 'checked="checked"' ?>> Predefined / New Site
    <span style="padding:0 15px">&nbsp;</span>
    <input type="checkbox" name="dt_ei3[]" id="dt_ei3_2" value="true" <?php if($dt_ei3[4]=='true') echo 'checked="checked"' ?>> Ex. IM3 Site
    <span style="padding:0 15px">&nbsp;</span>
    <input type="checkbox" name="dt_ei3[]" id="dt_ei3_3" value="true" <?php if($dt_ei3[5]=='true') echo 'checked="checked"' ?>> Ex. SAT-C Site
    </td>
</tr>
</table>

<h3>Documents reference</h3>
<table class="footer" cellpadding="0" cellspacing="0">
<tr><td>Document</td><td width="10" style="border:none"></td><td>Document</td></tr>
<tr><td>1/006 51-LZA 701 6002 Uen, Fault List RBS 6000</td><td style="border:none"></td><td>MOP Implementation Multi Carrier Power Amplifier (MCPA) RBS G11B ISAT Project 2011</td></tr>
<tr><td>EID-11:003826 Uen,  MoP Configuring RBS 6000 GSM with RUS</td><td style="border:none"></td><td>EID-11:007012 Uen.Method of Procedure Swap RBS2000 to RBS6000 (include Re-deploy)</td></tr>
<tr><td>EID-09:016940 RevB, Petunjuk Instalasi RBS 6000 Ericsson Indonesia</td><td style="border:none"></td><td>EID/Z/I-O5: 124 Uen: MOP ATP</td></tr>
<tr><td>1/1531-LZA7016001 Uen A2: RBS 6201 Installation Instruction</td><td style="border:none"></td><td>EN/LZT 735 0 018 Uen R1A Grounding Guideline</td></tr>
<tr><td>EN/LZN 720 1001 R4A, GSM RBS 6201 V2, G10A to G11A</td><td style="border:none"></td><td>Guidelines Installation, PBC 6200</td></tr>
</table>

<h3>Remark For Outstanding Items</h3>
<table class="footer" cellpadding="0" cellspacing="0">
<tr class="header"><td width="10">No.</td><td>Subject</td><td>Solved by</td><td>Date</td><td>Sign</td></tr>
<?php
for($i=0; $i <= 3; $i++){
	$dt_ei4 = explode('|', $arr_ei4[$i]->content);
	echo '<tr><td align="center">'.($i+1).'</td><td><input type="text" name="dt_ei4_'.($i+1).'[]" value="'.$this->ifunction->ifnulls($dt_ei4[3]).'" /></td><td><input type="text" name="dt_ei4_'.($i+1).'[]" value="'.$this->ifunction->ifnulls($dt_ei4[4]).'" /></td><td><input type="text" name="dt_ei4_'.($i+1).'[]" value="'.$this->ifunction->ifnulls($dt_ei4[5]).'" /></td><td><input type="text" name="dt_ei4_'.($i+1).'[]" value="'.$this->ifunction->ifnulls($dt_ei4[6]).'" /></td></tr>';
}
?>  
</table>

<h3>Signature of concerned people</h3>
<table class="footer" cellpadding="0" cellspacing="0" style="margin:5px 0 0 0">
<tr valign="top">
	<td>INDOSAT<br />Name:<br />1. <input type="text" name="dt_ei5_1[]" value="<?php echo $this->ifunction->ifnulls($dt_ei5a[3]) ?>" /><br />2. <input type="text" name="dt_ei5_2[]" value="<?php echo $this->ifunction->ifnulls($dt_ei5b[3]) ?>" /></td>
    <td><br />Signature</td>
    <td>ERICSSON<br />Name:<br />1. <input type="text" name="dt_ei5_1[]" value="<?php echo $this->ifunction->ifnulls($dt_ei5a[4]) ?>" /><br />2. <input type="text" name="dt_ei5_2[]" value="<?php echo $this->ifunction->ifnulls($dt_ei5b[4]) ?>" /></td>
    <td><br />Signature</td>
</tr>
</table>

<table class="footer" cellpadding="0" cellspacing="0"><tr><td>Start date: <input type="text" name="dt_ei6_1[]" value="<?php echo $this->ifunction->ifnulls($dt_ei6[3]) ?>" /></td><td>End date: <input type="text" name="dt_ei6_1[]" value="<?php echo $this->ifunction->ifnulls($dt_ei6[4]) ?>" /></td><td>Time spent on site: <input type="text" name="dt_ei6_1[]" value="<?php echo $this->ifunction->ifnulls($dt_ei6[5]) ?>" /></td></tr></table>

<table class="footer" cellpadding="0" cellspacing="0" style="margin:5px 0">
<tr><td width="80"><b>OK</b></td><td>put a cross if task performed</td></tr>
<tr><td><b>Not OK</b></td><td>put a cross if task performed is not OK</td></tr>
<tr><td><b>N/A</b></td><td>not applicable</td></tr>
<tr><td><b>Remark Major</b></td><td>Passing this test is mandatory</td></tr>
<tr><td><b>Remark Minor</b></td><td>Not service affecting but rectification is mandatory</td></tr>
</table>

<hr />

<center>
    <input type="reset" class="reset" value="Reset to Default"/>
    &emsp;
    <input type="button" class="button" name="next" value="Next" onclick="validasi('2','<?php echo $dx; ?>');" />
    <!--<input type="submit" class="button" name="next" value="Next" />-->
    <input type="hidden" name="kirim" value="" />
    <input type="hidden" name="page" value="" />
    <input type="hidden" name="atp_id" value="" />
    
</center>
</form>

<script>
	function validasi(page, atp_id) 
	{	
		if((document.getElementById('dt_ei1_3').checked==false) && (document.getElementById('dt_ei1_4').checked==false))
		{
			alert("Please select one of Identification Type");
		}
		else if((document.getElementById('dt_ei3_1').checked==false) && (document.getElementById('dt_ei3_2').checked==false) && (document.getElementById('dt_ei3_3').checked==false))
		{
			alert("Please select one of Site Profile");
		}
		else
		{
			if(document.getElementById('dt_ei1_3').checked==false)
			{
				document.getElementById('dt_ei1_3').value = 'false';
				document.getElementById('dt_ei1_3').checked = true;
			}
			if(document.getElementById('dt_ei1_4').checked==false)
			{
				document.getElementById('dt_ei1_4').value = 'false';
				document.getElementById('dt_ei1_4').checked = true;
			}
			
			if(document.getElementById('dt_ei3_1').checked==false)
			{
				document.getElementById('dt_ei3_1').value = 'false';
				document.getElementById('dt_ei3_1').checked = true;
			}
			if(document.getElementById('dt_ei3_2').checked==false)
			{
				document.getElementById('dt_ei3_2').value = 'false';
				document.getElementById('dt_ei3_2').checked = true;
			}
			if(document.getElementById('dt_ei3_3').checked==false)
			{
				document.getElementById('dt_ei3_3').value = 'false';
				document.getElementById('dt_ei3_3').checked = true;
			}
			
			document.preload2G.page.value=page;
			document.preload2G.atp_id.value=atp_id;
			document.preload2G.submit();
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
	
	
		$dt_ei1 = implode("|", $dt_ei1);
		
		//----------------------------------------------------
		
		$jumlah_dt_ei2_1 = count($dt_ei2_1);
		for($i=0;$i<$jumlah_dt_ei2_1;$i++)
		{
			$dt_ei2_1[$i] = preg_replace('#[^A-Za-z0-9]#i', '', $dt_ei2_1[$i]);
			if($dt_ei2_1[$i] == "")
			{
				$dt_ei2_1[$i] = "null";
			}
		}
		$dt_ei2_1 = implode("|", $dt_ei2_1);
		
		$jumlah_dt_ei2_2 = count($dt_ei2_2);
		for($i=0;$i<$jumlah_dt_ei2_2;$i++)
		{
			$dt_ei2_2[$i] = preg_replace('#[^A-Za-z0-9]#i', '', $dt_ei2_2[$i]);
			if($dt_ei2_2[$i] == "")
			{
				$dt_ei2_2[$i] = "null";
			}
		}
		$dt_ei2_2 = implode("|", $dt_ei2_2);
		
		//----------------------------------------------------
		
		$dt_ei3 = implode("|", $dt_ei3);
		
		//----------------------------------------------------
		
		$jumlah_dt_ei4_1 = count($dt_ei4_1);
		for($i=0;$i<$jumlah_dt_ei4_1;$i++)
		{
			$dt_ei4_1[$i] = preg_replace('#[^A-Za-z0-9]#i', '', $dt_ei4_1[$i]);
			if($dt_ei4_1[$i] == "")
			{
				$dt_ei4_1[$i] = "null";
			}
		}
		$dt_ei4_1 = implode("|", $dt_ei4_1);
		
		$jumlah_dt_ei4_2 = count($dt_ei4_2);
		for($i=0;$i<$jumlah_dt_ei4_2;$i++)
		{
			$dt_ei4_2[$i] = preg_replace('#[^A-Za-z0-9]#i', '', $dt_ei4_2[$i]);
			if($dt_ei4_2[$i] == "")
			{
				$dt_ei4_2[$i] = "null";
			}
		}
		$dt_ei4_2 = implode("|", $dt_ei4_2);
		
		$jumlah_dt_ei4_3 = count($dt_ei4_3);
		for($i=0;$i<$jumlah_dt_ei4_3;$i++)
		{
			$dt_ei4_3[$i] = preg_replace('#[^A-Za-z0-9]#i', '', $dt_ei4_3[$i]);
			if($dt_ei4_3[$i] == "")
			{
				$dt_ei4_3[$i] = "null";
			}
		}
		$dt_ei4_3 = implode("|", $dt_ei4_3);
		
		$jumlah_dt_ei4_4 = count($dt_ei4_4);
		for($i=0;$i<$jumlah_dt_ei4_4;$i++)
		{
			$dt_ei4_4[$i] = preg_replace('#[^A-Za-z0-9]#i', '', $dt_ei4_4[$i]);
			if($dt_ei4_4[$i] == "")
			{
				$dt_ei4_4[$i] = "null";
			}
		}
		$dt_ei4_4 = implode("|", $dt_ei4_4);
		
		//----------------------------------------------------
		
		$jumlah_dt_ei5_1 = count($dt_ei5_1);
		for($i=0;$i<$jumlah_dt_ei5_1;$i++)
		{
			$dt_ei5_1[$i] = preg_replace('#[^A-Za-z0-9]#i', '', $dt_ei5_1[$i]);
			if($dt_ei5_1[$i] == "")
			{
				$dt_ei5_1[$i] = "null";
			}
		}
		$dt_ei5_1 = implode("|", $dt_ei5_1);
		
		$jumlah_dt_ei5_2= count($dt_ei5_2);
		for($i=0;$i<$jumlah_dt_ei5_2;$i++)
		{
			$dt_ei5_2[$i] = preg_replace('#[^A-Za-z0-9]#i', '', $dt_ei5_2[$i]);
			if($dt_ei5_2[$i] == "")
			{
				$dt_ei5_2[$i] = "null";
			}
		}
		$dt_ei5_2 = implode("|", $dt_ei5_2);
		
		//----------------------------------------------------
		
		$jumlah_dt_ei6_1 = count($dt_ei6_1);
		for($i=0;$i<$jumlah_dt_ei6_1;$i++)
		{
			$dt_ei6_1[$i] = preg_replace('#[^A-Za-z0-9]#i', '', $dt_ei6_1[$i]);
			if($dt_ei6_1[$i] == "")
			{
				$dt_ei6_1[$i] = "null";
			}
		}
		$dt_ei6_1 = implode("|", $dt_ei6_1);
		
		//---------------------------------------------
		
		$this->db->query("DELETE FROM `it_atp_subchapter` WHERE `atp_id` = '$dx' AND `no_chapter`='-1.1'");
		$fields = array(
		'atp_id' => $dx,
		'user_id' => $hasil[0]->user_id,
		'chapter' => -1,
		'no_chapter' => "-1.1",
		'subno_chapter'=> 1,
		'subno_chapter_order' => "01",
		'content' => "-1@-1.1|No|1|".$dt_ei1
		);
		$this->db->insert('it_atp_subchapter', $fields);
		
		$this->db->query("DELETE FROM `it_atp_subchapter` WHERE `atp_id` = '$dx' AND `no_chapter`='-2.1'");
		$fields = array(
		'atp_id' => $dx,
		'user_id' => $hasil[0]->user_id,
		'chapter' => -2,
		'no_chapter' => "-2.1",
		'subno_chapter'=> 1,
		'subno_chapter_order' => "01",
		'content' => "-2@-2.1|No|1|".$dt_ei2_1
		);
		$this->db->insert('it_atp_subchapter', $fields);
		
		$fields = array(
		'atp_id' => $dx,
		'user_id' => $hasil[0]->user_id,
		'chapter' => -2,
		'no_chapter' => "-2.1",
		'subno_chapter'=> 2,
		'subno_chapter_order' => "02",
		'content' => "-2@-2.1|No|2|".$dt_ei2_2
		);
		$this->db->insert('it_atp_subchapter', $fields);
		
		$this->db->query("DELETE FROM `it_atp_subchapter` WHERE `atp_id` = '$dx' AND `no_chapter`='-3.1'");
		$fields = array(
		'atp_id' => $dx,
		'user_id' => $hasil[0]->user_id,
		'chapter' => -3,
		'no_chapter' => "-3.1",
		'subno_chapter'=> 1,
		'subno_chapter_order' => "01",
		'content' => "-3@-3.1|No|1|".$dt_ei3
		);
		$this->db->insert('it_atp_subchapter', $fields);
		
		$this->db->query("DELETE FROM `it_atp_subchapter` WHERE `atp_id` = '$dx' AND `no_chapter`='-4.1'");
		$fields = array(
		'atp_id' => $dx,
		'user_id' => $hasil[0]->user_id,
		'chapter' => -4,
		'no_chapter' => "-4.1",
		'subno_chapter'=> 1,
		'subno_chapter_order' => "01",
		'content' => "-4@-4.1|No|1|".$dt_ei4_1
		);
		$this->db->insert('it_atp_subchapter', $fields);
		
		$fields = array(
		'atp_id' => $dx,
		'user_id' => $hasil[0]->user_id,
		'chapter' => -4,
		'no_chapter' => "-4.1",
		'subno_chapter'=> 2,
		'subno_chapter_order' => "02",
		'content' => "-4@-4.1|No|2|".$dt_ei4_2
		);
		$this->db->insert('it_atp_subchapter', $fields);
		
		$fields = array(
		'atp_id' => $dx,
		'user_id' => $hasil[0]->user_id,
		'chapter' => -4,
		'no_chapter' => "-4.1",
		'subno_chapter'=> 3,
		'subno_chapter_order' => "03",
		'content' => "-4@-4.1|No|3|".$dt_ei4_3
		);
		$this->db->insert('it_atp_subchapter', $fields);
		
		$fields = array(
		'atp_id' => $dx,
		'user_id' => $hasil[0]->user_id,
		'chapter' => -4,
		'no_chapter' => "-4.1",
		'subno_chapter'=> 4,
		'subno_chapter_order' => "04",
		'content' => "-4@-4.1|No|4|".$dt_ei4_4
		);
		$this->db->insert('it_atp_subchapter', $fields);
		
		$this->db->query("DELETE FROM `it_atp_subchapter` WHERE `atp_id` = '$dx' AND `no_chapter`='-5.1'");
		$fields = array(
		'atp_id' => $dx,
		'user_id' => $hasil[0]->user_id,
		'chapter' => -5,
		'no_chapter' => "-5.1",
		'subno_chapter'=> 1,
		'subno_chapter_order' => "01",
		'content' => "-5@-5.1|No|1|".$dt_ei5_1
		);
		$this->db->insert('it_atp_subchapter', $fields);
		
		$fields = array(
		'atp_id' => $dx,
		'user_id' => $hasil[0]->user_id,
		'chapter' => -5,
		'no_chapter' => "-5.1",
		'subno_chapter'=> 2,
		'subno_chapter_order' => "02",
		'content' => "-5@-5.1|No|2|".$dt_ei5_2
		);
		$this->db->insert('it_atp_subchapter', $fields);
		
		$this->db->query("DELETE FROM `it_atp_subchapter` WHERE `atp_id` = '$dx' AND `no_chapter`='-6.1'");
		$fields = array(
		'atp_id' => $dx,
		'user_id' => $hasil[0]->user_id,
		'chapter' => -6,
		'no_chapter' => "-6.1",
		'subno_chapter'=> 1,
		'subno_chapter_order' => "01",
		'content' => "-6@-6.1|No|1|".$dt_ei6_1
		);
		$this->db->insert('it_atp_subchapter', $fields);
}
include 'paging.php'; 
?>
</body>
</html>