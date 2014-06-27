<?php
if(empty($_SESSION['isat']['log'])) exit();
if(isset($_POST['kirim'])){
	$atp_id = $dx;
	$user_id = $hasil[0]->user_id;
	$idx_number = array('1', '2', '3', '4', '5', '6', '7', '8', '9', '1.', '2.', '3.', '4.', '5.', '6.', '7.', '8.', '9.');
	
	for($i=0; $i < count($quest); $i++){
		if(isset($quest[$i])){
			
			$qcontent=explode('|', $quest[$i]);
			$schapter=explode('@', $qcontent[0]);
			
			if($schapter[1]){
				$table = 'atp_subchapter';
				$table_field = " AND `no_chapter`='".$schapter[1]."' AND `subno_chapter`='".$qcontent[2]."'";
			}else{
				$table = 'atp_chapter';
				$table_field = " AND `no_chapter`='".$qcontent[2]."'";
			}
			
			$this->db->query("DELETE FROM `it_$table` WHERE `atp_id`='$atp_id' AND `user_id`='$user_id' AND `chapter`='".$schapter[0]."'$table_field");
						
			if(in_array(substr($qcontent[2], 0, 2), $idx_number, true)) $idx_sub_order = '0'.$qcontent[2]; else $idx_sub_order = $qcontent[2];
			
			if($schapter[1]) $this->db->query("INSERT INTO `it_atp_subchapter` (`atp_id`, `user_id`, `chapter`, `no_chapter`, `subno_chapter`, `subno_chapter_order`, `content`) VALUES ('$atp_id', '$user_id', '".$schapter[0]."', '".$schapter[1]."', '".$qcontent[2]."', '$idx_sub_order', '".$quest[$i]."')"); else $this->db->query("INSERT INTO `it_atp_chapter` (`atp_id`, `user_id`, `chapter`, `no_chapter`, `content`) VALUES ('$atp_id', '$user_id', '".$schapter[0]."', '".$qcontent[2]."', '".$qcontent[3]."')");
		}
	}
	
	if($page=='26'){
		echo "<script>alert('Submit quest successfully');self.close();</script>";
	}
	else header("Location: ". base_url()."index.php/process/pdf/edit/atp/ericsson3G/".$atp_id."/".$page);
}
?>

<p align="center">
<?php for($i=1;$i<=25;$i++) echo '<a onclick="validate('.$i.', '.$dx.')">'.$i.'</a> ' ?>
<script type="text/javascript">
function validate(page, atp_id){
	if(confirm("Submit the form before you leaving this page?")){
		validasi(page, atp_id);
	}else{
		window.location.href="<?php echo base_url() ?>index.php/process/pdf/edit/atp/ericsson3G/"+ atp_id +"/"+ page;
	}
}
</script>
</p>