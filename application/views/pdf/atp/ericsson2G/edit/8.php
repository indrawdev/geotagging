<?php session_start(); if(empty($_SESSION['isat']['log'])) exit('<script>alert("Session expired, please re-login!");self.close();</script>'); if ( ! defined('BASEPATH')) exit('No direct script access allowed'); $Qtit = $this->db->query("SELECT `title` FROM `it_atp` WHERE `atp_id`='$dx'"); $tit = $Qtit->result_object(); $title = $tit[0]->title; ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xml:lang="en" xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<title>Preload ATP Ericsson 2G (Page 8) - <?php echo $title ?></title>
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
	width:90%;
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
<h1>Page 8</h1>
<br /><br />

<form name="preload2G" method="post" action="">

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='17' AND `no_chapter`='17.1' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_17_1[$subchapter->subno_chapter -1]=$subchapter ?>

<h3>Table 6: Time Slot Occupation GSM 900</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header">
    <td width="20" rowspan="3">TRX</td>
    <td width="40" rowspan="3">ARFCN</td>
    <td colspan="16">Time Slot</td>
</tr>
<tr class="header">
	<td colspan="2">0</td><td colspan="2">1</td><td colspan="2">2</td><td colspan="2">3</td><td colspan="2">4</td><td colspan="2">5</td><td colspan="2">6</td><td colspan="2">7</td>
</tr>
<tr class="header">
    <td>RX Q</td><td>RX Lev</td><td>RX Q</td><td>RX Lev</td><td>RX Q</td><td>RX Lev</td><td>RX Q</td><td>RX Lev</td><td>RX Q</td><td>RX Lev</td><td>RX Q</td><td>RX Lev</td><td>RX Q</td><td>RX Lev</td><td>RX Q</td><td>RX Lev</td>
</tr>
<?php
for($i=0; $i <= 10; $i++){
	$dt_subchapter_17_1 = explode('|', $arr_subchapter_17_1[$i]->content);
	echo '<tr><td align="center">'.($i+1).'</td><td><input type="text" name="no_chapter_17_1_'.($i+1).'a" value="'.$this->ifunction->ifnulls($dt_subchapter_17_1[3]).'" /></td><td><input type="text" name="no_chapter_17_1_'.($i+1).'b" value="'.$this->ifunction->ifnulls($dt_subchapter_17_1[4]).'" /></td><td><input type="text" name="no_chapter_17_1_'.($i+1).'c" value="'.$this->ifunction->ifnulls($dt_subchapter_17_1[5]).'" /></td><td><input type="text" name="no_chapter_17_1_'.($i+1).'d" value="'.$this->ifunction->ifnulls($dt_subchapter_17_1[6]).'" /></td><td><input type="text" name="no_chapter_17_1_'.($i+1).'e" value="'.$this->ifunction->ifnulls($dt_subchapter_17_1[7]).'" /></td><td><input type="text" name="no_chapter_17_1_'.($i+1).'f" value="'.$this->ifunction->ifnulls($dt_subchapter_17_1[8]).'" /></td><td><input type="text" name="no_chapter_17_1_'.($i+1).'g" value="'.$this->ifunction->ifnulls($dt_subchapter_17_1[9]).'" /></td><td><input type="text" name="no_chapter_17_1_'.($i+1).'h" value="'.$this->ifunction->ifnulls($dt_subchapter_17_1[10]).'" /></td><td><input type="text" name="no_chapter_17_1_'.($i+1).'i" value="'.$this->ifunction->ifnulls($dt_subchapter_17_1[11]).'" /></td><td><input type="text" name="no_chapter_17_1_'.($i+1).'j" value="'.$this->ifunction->ifnulls($dt_subchapter_17_1[12]).'" /></td><td><input type="text" name="no_chapter_17_1_'.($i+1).'k" value="'.$this->ifunction->ifnulls($dt_subchapter_17_1[13]).'" /></td><td><input type="text" name="no_chapter_17_1_'.($i+1).'l" value="'.$this->ifunction->ifnulls($dt_subchapter_17_1[14]).'" /></td><td><input type="text" name="no_chapter_17_1_'.($i+1).'m" value="'.$this->ifunction->ifnulls($dt_subchapter_17_1[15]).'" /></td><td><input type="text" name="no_chapter_17_1_'.($i+1).'n" value="'.$this->ifunction->ifnulls($dt_subchapter_17_1[16]).'" /></td><td><input type="text" name="no_chapter_17_1_'.($i+1).'o" value="'.$this->ifunction->ifnulls($dt_subchapter_17_1[17]).'" /></td><td><input type="text" name="no_chapter_17_1_'.($i+1).'p" value="'.$this->ifunction->ifnulls($dt_subchapter_17_1[18]).'" /></td><td><input type="text" name="no_chapter_17_1_'.($i+1).'q" value="'.$this->ifunction->ifnulls($dt_subchapter_17_1[19]).'" /></td></tr>';
}
?>
</table>

<hr />

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='17' AND `no_chapter`='17.2' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_17_2[$subchapter->subno_chapter -1]=$subchapter ?>

<h3>Table 7: Time Slot Occupation DCS 1800</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header">
    <td width="20" rowspan="3">TRX</td>
    <td width="40" rowspan="3">ARFCN</td>
    <td colspan="16">Time Slot</td>
</tr>
<tr class="header">
	<td colspan="2">0</td><td colspan="2">1</td><td colspan="2">2</td><td colspan="2">3</td><td colspan="2">4</td><td colspan="2">5</td><td colspan="2">6</td><td colspan="2">7</td>
</tr>
<tr class="header">
	<td>RX Q</td><td>RX Lev</td><td>RX Q</td><td>RX Lev</td><td>RX Q</td><td>RX Lev</td><td>RX Q</td><td>RX Lev</td><td>RX Q</td><td>RX Lev</td><td>RX Q</td><td>RX Lev</td><td>RX Q</td><td>RX Lev</td><td>RX Q</td><td>RX Lev</td>
</tr>
<?php
for($i=0; $i <= 22; $i++){
	$dt_subchapter_17_2 = explode('|', $arr_subchapter_17_2[$i]->content);
	echo '<tr><td align="center">'.($i+1).'</td><td><input type="text" name="no_chapter_17_2_'.($i+1).'a" value="'.$this->ifunction->ifnulls($dt_subchapter_17_2[3]).'" /></td><td><input type="text" name="no_chapter_17_2_'.($i+1).'b" value="'.$this->ifunction->ifnulls($dt_subchapter_17_2[4]).'" /></td><td><input type="text" name="no_chapter_17_2_'.($i+1).'c" value="'.$this->ifunction->ifnulls($dt_subchapter_17_2[5]).'" /></td><td><input type="text" name="no_chapter_17_2_'.($i+1).'d" value="'.$this->ifunction->ifnulls($dt_subchapter_17_2[6]).'" /></td><td><input type="text" name="no_chapter_17_2_'.($i+1).'e" value="'.$this->ifunction->ifnulls($dt_subchapter_17_2[7]).'" /></td><td><input type="text" name="no_chapter_17_2_'.($i+1).'f" value="'.$this->ifunction->ifnulls($dt_subchapter_17_2[8]).'" /></td><td><input type="text" name="no_chapter_17_2_'.($i+1).'g" value="'.$this->ifunction->ifnulls($dt_subchapter_17_2[9]).'" /></td><td><input type="text" name="no_chapter_17_2_'.($i+1).'h" value="'.$this->ifunction->ifnulls($dt_subchapter_17_2[10]).'" /></td><td><input type="text" name="no_chapter_17_2_'.($i+1).'i" value="'.$this->ifunction->ifnulls($dt_subchapter_17_2[11]).'" /></td><td><input type="text" name="no_chapter_17_2_'.($i+1).'j" value="'.$this->ifunction->ifnulls($dt_subchapter_17_2[12]).'" /></td><td><input type="text" name="no_chapter_17_2_'.($i+1).'k" value="'.$this->ifunction->ifnulls($dt_subchapter_17_2[13]).'" /></td><td><input type="text" name="no_chapter_17_2_'.($i+1).'l" value="'.$this->ifunction->ifnulls($dt_subchapter_17_2[14]).'" /></td><td><input type="text" name="no_chapter_17_2_'.($i+1).'m" value="'.$this->ifunction->ifnulls($dt_subchapter_17_2[15]).'" /></td><td><input type="text" name="no_chapter_17_2_'.($i+1).'n" value="'.$this->ifunction->ifnulls($dt_subchapter_17_2[16]).'" /></td><td><input type="text" name="no_chapter_17_2_'.($i+1).'o" value="'.$this->ifunction->ifnulls($dt_subchapter_17_2[17]).'" /></td><td><input type="text" name="no_chapter_17_2_'.($i+1).'p" value="'.$this->ifunction->ifnulls($dt_subchapter_17_2[18]).'" /></td><td><input type="text" name="no_chapter_17_2_'.($i+1).'q" value="'.$this->ifunction->ifnulls($dt_subchapter_17_2[19]).'" /></td></tr>';
}
?>
</table>

<hr />


<center>
	<input type="button" class="button"  name="prev" value="Prev" onclick="validasi(7,'<?php echo $dx; ?>');" />
    <!--<input type="submit" class="button" name="prev" value="Prev" />-->
    &emsp;
    <input type="reset" class="reset" value="Reset to Default"/>
    &emsp;
    <input type="button" class="button" name="next" value="Next" onclick="validasi(9,'<?php echo $dx; ?>');" />
    <!--<input type="submit" class="button" name="next" value="Next" />-->
    <input type="hidden" name="kirim" value="" />
    <input type="hidden" name="page" value="" />
    <input type="hidden" name="atp_id" value="" />
</center>
</form>

<script>
	function validasi(page, atp_id)
	{
		document.preload2G.page.value=page;
		document.preload2G.atp_id.value=atp_id;
		document.preload2G.submit();
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
		
		require_once('function_kosong.php');
		
		for($i=1; $i<=11; $i++)
		{
			$col_a = 'no_chapter_17_1_'.$i.'a';
			$col_b = 'no_chapter_17_1_'.$i.'b';
			$col_c = 'no_chapter_17_1_'.$i.'c';
			$col_d = 'no_chapter_17_1_'.$i.'d';
			$col_e = 'no_chapter_17_1_'.$i.'e';
			$col_f = 'no_chapter_17_1_'.$i.'f';
			$col_g = 'no_chapter_17_1_'.$i.'g';
			$col_h = 'no_chapter_17_1_'.$i.'h';
			$col_i = 'no_chapter_17_1_'.$i.'i';
			$col_j = 'no_chapter_17_1_'.$i.'j';
			$col_k = 'no_chapter_17_1_'.$i.'k';
			$col_l = 'no_chapter_17_1_'.$i.'l';
			$col_m = 'no_chapter_17_1_'.$i.'m';
			$col_n = 'no_chapter_17_1_'.$i.'n';
			$col_o = 'no_chapter_17_1_'.$i.'o';
			$col_p = 'no_chapter_17_1_'.$i.'p';
			$col_q = 'no_chapter_17_1_'.$i.'q';
			
			$$col_a = kosong($$col_a);
			$$col_b = kosong($$col_b);
			$$col_c = kosong($$col_c);
			$$col_d = kosong($$col_d);
			$$col_e = kosong($$col_e);
			$$col_f = kosong($$col_f);
			$$col_g = kosong($$col_g);
			$$col_h = kosong($$col_h);
			$$col_i = kosong($$col_i);
			$$col_j = kosong($$col_j);
			$$col_k = kosong($$col_k);
			$$col_l = kosong($$col_l);
			$$col_m = kosong($$col_m);
			$$col_n = kosong($$col_n);
			$$col_o = kosong($$col_o);
			$$col_p = kosong($$col_p);
			$$col_q = kosong($$col_q);
			
			if(str_replace('null', '', $$col_a.$$col_b.$$col_c.$$col_d.$$col_e.$$col_f.$$col_g.$$col_h.$$col_i.$$col_j.$$col_k.$$col_l.$$col_m.$$col_n.$$col_o.$$col_p.$$col_q)){
				$quest[] = '17@17.1|No|'.$i.'|'.$$col_a.'|'.$$col_b.'|'.$$col_c.'|'.$$col_d.'|'.$$col_e.'|'.$$col_f.'|'.$$col_g.'|'.$$col_h.'|'.$$col_i.'|'.$$col_j.'|'.$$col_k.'|'.$$col_l.'|'.$$col_m.'|'.$$col_n.'|'.$$col_o.'|'.$$col_p.'|'.$$col_q;
			}
			else
			{
				$user_id = $hasil[0]->user_id;
				$this->db->query("DELETE FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `user_id`='$user_id' AND `chapter`='17' AND `no_chapter`='17.1' AND `subno_chapter`='$i'");
			}
		}
		//----------------------------------------------------		
		for($i=1; $i<=23; $i++)
		{
			$col_a = 'no_chapter_17_2_'.$i.'a';
			$col_b = 'no_chapter_17_2_'.$i.'b';
			$col_c = 'no_chapter_17_2_'.$i.'c';
			$col_d = 'no_chapter_17_2_'.$i.'d';
			$col_e = 'no_chapter_17_2_'.$i.'e';
			$col_f = 'no_chapter_17_2_'.$i.'f';
			$col_g = 'no_chapter_17_2_'.$i.'g';
			$col_h = 'no_chapter_17_2_'.$i.'h';
			$col_i = 'no_chapter_17_2_'.$i.'i';
			$col_j = 'no_chapter_17_2_'.$i.'j';
			$col_k = 'no_chapter_17_2_'.$i.'k';
			$col_l = 'no_chapter_17_2_'.$i.'l';
			$col_m = 'no_chapter_17_2_'.$i.'m';
			$col_n = 'no_chapter_17_2_'.$i.'n';
			$col_o = 'no_chapter_17_2_'.$i.'o';
			$col_p = 'no_chapter_17_2_'.$i.'p';
			$col_q = 'no_chapter_17_2_'.$i.'q';
			
			$$col_a = kosong($$col_a);
			$$col_b = kosong($$col_b);
			$$col_c = kosong($$col_c);
			$$col_d = kosong($$col_d);
			$$col_e = kosong($$col_e);
			$$col_f = kosong($$col_f);
			$$col_g = kosong($$col_g);
			$$col_h = kosong($$col_h);
			$$col_i = kosong($$col_i);
			$$col_j = kosong($$col_j);
			$$col_k = kosong($$col_k);
			$$col_l = kosong($$col_l);
			$$col_m = kosong($$col_m);
			$$col_n = kosong($$col_n);
			$$col_o = kosong($$col_o);
			$$col_p = kosong($$col_p);
			$$col_q = kosong($$col_q);
			
			if(str_replace('null', '', $$col_a.$$col_b.$$col_c.$$col_d.$$col_e.$$col_f.$$col_g.$$col_h.$$col_i.$$col_j.$$col_k.$$col_l.$$col_m.$$col_n.$$col_o.$$col_p.$$col_q)){
				$quest[] = '17@17.2|No|'.$i.'|'.$$col_a.'|'.$$col_b.'|'.$$col_c.'|'.$$col_d.'|'.$$col_e.'|'.$$col_f.'|'.$$col_g.'|'.$$col_h.'|'.$$col_i.'|'.$$col_j.'|'.$$col_k.'|'.$$col_l.'|'.$$col_m.'|'.$$col_n.'|'.$$col_o.'|'.$$col_p.'|'.$$col_q;
			}
			else{
				$user_id = $hasil[0]->user_id;
				$this->db->query("DELETE FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `user_id`='$user_id' AND `chapter`='17' AND `no_chapter`='17.2' AND `subno_chapter`='$i'");
			}
		}
	}	
	include 'paging.php'; 
?>
</body>
</html>