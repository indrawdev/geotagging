<?php $auth_realm = 'Indosat Geotagging IMEI View'; require_once 'auth.php'; require_once('koneksi_db.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>IMEI</title>
<style>
.t1{
	box-shadow:0 0 5px #666;
	-moz-box-shadow:0 0 5px #666;
	-webkit-box-shadow:0 0 5px #666
}
.t2{
	background:url(table_header.png) repeat-x;
	padding:5px;
}
.t2:hover{
	cursor:pointer;
}

 select{ font-family:"Cambria"; font-size:14px; }
 img:hover{	cursor:pointer; }
 tbody tr:hover{ background:#CCCCCC; cursor:default; }
 .add{ width:20px; }
 .box_paging{
	 text-align:center;
	padding:5px 0;
	margin:8px 0
}
.box_paging a{
	cursor:pointer;
	background:#FFF;
	color:#000;
	text-decoration:none;
	padding:4px 8px 5px 8px;
	
	border-radius:3px;
	-moz-border-radius:3px;
	-webkit-border-radius:3px;
	-khtml-border-radius:3px;
	-o-border-radius:3px;
	-ms-border-radius:3px
}
.box_paging .active{
	background:#007BC1;
	color:#FFF
}
.box_paging span{
	color:#ADADAD;
	padding:0 20px
}
body{
	background-image:url(../static/i/grad-blue.png);
	background-repeat:repeat-x;
	background-size:100% 50px;
}
.button{
	background-image: linear-gradient(bottom, rgb(166,161,166) 2%, rgb(255,255,255) 85%);
	background-image: -o-linear-gradient(bottom, rgb(166,161,166) 2%, rgb(255,255,255) 85%);
	background-image: -moz-linear-gradient(bottom, rgb(166,161,166) 2%, rgb(255,255,255) 85%);
	background-image: -webkit-linear-gradient(bottom, rgb(166,161,166) 2%, rgb(255,255,255) 85%);
	background-image: -ms-linear-gradient(bottom, rgb(166,161,166) 2%, rgb(255,255,255) 85%);
	
	background-image: -webkit-gradient(
		linear,
		left bottom,
		left top,
		color-stop(0.02, rgb(166,161,166)),
		color-stop(0.85, rgb(255,255,255))
	);

	border:1px solid #CCC;
	border-radius:10px;
	padding:1px 10px;
	margin-left:8px;
	cursor:pointer;
}
a:link    {text-decoration:none;}
a:visited {text-decoration:none;}
a:hover   {text-decoration:none;}
a:active  {text-decoration:none;} 

#if_box{
	display:none;
	width:470px
}
#if-box{
	display:none;
	width:670px
}
#if_box .ifheader, #if-box .ifheader{height:10px}
#if_box .ifheader .ifleft, #if-box .ifheader .ifleft{
	background:url(tl.gif) top right no-repeat;
	width:10px
}
#if_box .ifheader .ifmiddle{
	background:#F7F7F7;
	width:450px
}
#if-box .ifheader .ifmiddle{
	background:#F7F7F7;
	width:650px
}
#if_box .ifheader .ifright, #if-box .ifheader .ifright{
	background:url(tr.gif) top left no-repeat;
	width:10px
}
#if_box .ifbody .ifmiddle, #if-box .ifbody .ifmiddle{
	background:#F7F7F7;
	padding:0 10px
}
#if_box .iffooter, #if-box .iffooter{height:10px}
#if_box .iffooter .ifleft, #if-box .iffooter .ifleft{
	background:url(bl.gif) top right no-repeat;
	width:10px
}
#if_box .iffooter .ifmiddle, #if-box .iffooter .ifmiddle{background:#F7F7F7}
#if_box .iffooter .ifright, #if-box .iffooter .ifright{
	background:url(br.gif) top left no-repeat;
	width:10px
}
#ifbox_body{
	color:#666;
	text-align:left
}
#ifbox_body .iheader{
	background:#0F67A1;
	font-weight:bold;
	font-size:12px;
	color:#FFF;
	text-transform:uppercase;
	text-shadow:#111 1px 1px 1px;
	padding:10px
}
#ifbox_body .ibody{
	font-size:11px;
	padding:10px 0 0 0
}
#ifbox_body .ibody .inputbox{
	background:#FFF
}
#ifbox_body .ibody .holder{
	overflow:auto;
	height:300px
}
#ifbox_body .ifooter{
	text-align:right;
	margin:15px 0 0 0;
	padding:8px 0 0 0;
	border-top:1px solid #003865
}
</style>

<!--script src="jquery.js"></script>
<script src="popup.js"></script-->
<script>
function fx(stx, orderby, asdesc, p){
	var order = document.getElementById('order').value;
	if(order=="DESC") document.getElementById('order').value = "ASC"; else document.getElementById('order').value = "DESC";
	
	var xmlhttp1;
	if (window.XMLHttpRequest){  
	  xmlhttp1 = new XMLHttpRequest();
	}
	else{
	  xmlhttp1 = new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	xmlhttp1.open("GET", "processor.php?p="+ p + "&search_text=" + stx + "&orderby=" + orderby + "&asdesc=" + asdesc + "&sort=" + order, true);
	xmlhttp1.onreadystatechange=function(){
		if (xmlhttp1.readyState==4 && xmlhttp1.status==200){
			document.getElementById("isi").innerHTML = xmlhttp1.responseText;	
		}
	}
	xmlhttp1.send();
}

function vk(evt, stx){
	var charcode = (evt.which) ? evt.which : event.keyCode;
	if(charcode==13 & stx!=""){
		document.getElementById('btnsearch').click();
	}
}
</script>
<script>
/*$(document).ready(function(){
	$("a[rel*=if_close]").bind("click", function(){
		$("#if_popcontent").html('<center><img src="loading.gif" alt="Loading.."></center>');
		$("#if_box").bPopup({loadUrl:$(this).attr("url"),contentContainer:"#if_popcontent"});
    });
	$("a[rel*=if_url]").bind("click", function(){
		$("#if_popcontent").html('<center><img src="loading.gif" alt="Loading.."></center>');
		$("#if_box").bPopup({loadUrl:$(this).attr("url"),contentContainer:"#if_popcontent",modalClose:false});
    });
});*/
</script>
</head>

<body onload="fx('', 'it_imei.login_last', 0, 1)">
<table id="if_box" border="0" cellpadding="0" cellspacing="0">
<tr class="ifheader"><td class="ifleft"></td><td class="ifmiddle"></td><td class="ifright"></td></tr>
<tr class="ifbody"><td colspan="3" class="ifmiddle"><div id="if_popcontent"></div></td></tr>
<tr class="iffooter"><td class="ifleft"></td><td class="ifmiddle"></td><td class="ifright"></td></tr>
</table>

<input type="hidden" id="order" value="ASC" />
<table width="90%" border="0" align="center" style="border-collapse:collapse">
	<thead>
	<tr height=0>
    	<td><a onclick="fx('', 'it_imei.login_last', 0, 1);	document.getElementById('search_text').value = '';"><img src="../static/i/logo.png" alt="indosat" title="" width="103" height="30" /></a></td>
        <td><a href="generatexls.php"><input type="button" class="button" value="Download" /></a>&emsp;<a href="peformance-graph/"><input type="button" class="button" value="Show Graph" /></a></td>
        <td align="right">
        <input type="text" name="search_text" id="search_text" placeholder="Enter keyword..." onkeydown="vk(event);" />&emsp;<input type="button" name="btnsearch" id="btnsearch" class="button" value="Search" onclick="fx(document.getElementById('search_text').value, 'it_imei.login_last', 0, 1)"/>
        </td>
	</tr>
    </thead>
</table>
<table width="800" border="0" align="center" style="border-collapse:collapse">
<thead><tr>
    <td height="30px" valign="bottom"></td>
</tr></thead>
</table>

<div id="isi"></div>
</body>
</html>