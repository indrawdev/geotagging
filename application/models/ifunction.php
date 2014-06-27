<?php
class Ifunction extends CI_Model{

	public function __construct()
	{
        parent::__construct();
    }
	
	public function action_response($status, $form_id, $css, $message)
	{
		$result='<div class="'.$css.'">'.$message.'</div><script>iFresponse('.$status.', "'.$form_id.'")</script>';
		return $result;
	}
	
	public function slidedown_response($form_id, $css, $message)
	{
		$result='<div class="'.$css.'">'.$message.'</div><script>$("#'.$form_id.'").slideDown()</script>';
		return $result;
	}
	
	public function xlsBOF()
	{
		echo pack("ssssss", 0x809, 0x8, 0x0, 0x10, 0x0, 0x0);
		return;
	}
	
	public function xlsEOF()
	{
		echo pack("ss", 0x0A, 0x00);
		return;
	}
	
	public function xlsWriteNumber($rows, $cols, $values)
	{
		echo pack("sssss", 0x203, 14, $rows, $cols, 0x0);
		echo pack("d", $values);
		return;
	}
	
	public function xlsWriteLabel($rows, $cols, $values )
	{
		$L = strlen($values);
		echo pack("ssssss", 0x204, 8 + $L, $rows, $cols, 0x0, $L);
		echo $values;
		return;
	}
	
	public function convert_to_jpg($target, $newcopy, $ext)
	{
		list($w_orig, $h_orig) = getimagesize($target);
		if($ext == "gif") $img = imagecreatefromgif($target); elseif($ext =="png") $img = imagecreatefrompng($target);
		$tci = imagecreatetruecolor($w_orig, $h_orig);
		imagecopyresampled($tci, $img, 0, 0, 0, 0, $w_orig, $h_orig, $w_orig, $h_orig);
		imagejpeg($tci, $newcopy, 84);
	}
	
	public function resize_jpg($images, $new_images, $width)
	{
		$size=getimagesize($images);
		$height=round($width*$size[1]/$size[0]);
		$images_orig = imagecreatefromjpeg($images);
		$photoX = imagesx($images_orig);
		$photoY = imagesy($images_orig);
		$images_fin = imagecreatetruecolor($width, $height);
		imagecopyresampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
		imagejpeg($images_fin, $new_images);
		imagedestroy($images_orig);
		imagedestroy($images_fin);
	}
	
	public function un_link($url)
	{
		if(file_exists($url)) unlink($url);
		return true;
	}
	
	public function curl($url)
	{
		$init=curl_init($url);
		ob_start();
		curl_exec($init);
		$get_content=ob_get_contents();
		ob_end_clean();
		curl_close($init);
		return $get_content;
	}
	
	public function curl_file_get_contents($url)
	{
		$ch = curl_init();
		curl_setopt_array($ch,
			array(
				CURLOPT_URL => $url,
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_SSL_VERIFYPEER => false,
				CURLOPT_COOKIE => NULL,
				CURLOPT_NOBODY => false
			)
		);
		$contents = curl_exec($ch);
		curl_close($ch);
		if($contents) return $contents; else return false;
	}
	
	public  function encode($values)
	{
		$len=strlen($values); 
		for($i=0; $i < $len; $i++){
			$numeric[$i]=substr($values, $i, 1);
		}
		$arand[0]=rand(0, 700);
		srand((double)microtime() * 1000000);
		$random=rand(0, 8);
		$result=($random + 1) * 1000 + $arand[0];
		$result=$result."";
		for($i=1; $i <= $len; $i++){
			$random=rand(0, 8);
			$arand[$i]=($random + 1) * 1000 + $arand[0] + ord($numeric[$i - 1]); 
			$result=$result . $arand[$i];
		}
		return $result;
	}
	
	public  function decode($values)
	{
		$len=strlen($values);
		$lens=($len / 4) - 1;
		$arand[0]=substr($values, 0, 4);
		$arand[0]=$arand[0] % 1000;
		$result="";
		for($i=1; $i <= $lens; $i++){
			$arand[$i]=substr($values, $i * 4, 4);
			$arand[$i]=$arand[$i] % 1000;
			$arand[$i]=$arand[$i] - $arand[0]; 
			$result=$result . chr($arand[$i]);
		}
		return $result;
	}
	
	public function DMStoDEC($deg, $min, $sec)
	{
		return $deg+((($min*60)+($sec))/3600);
	}
	
	public function DECtoDMS($dec)
	{
		$vars = explode(".",$dec);
		$deg = $vars[0];
		$tempma = "0.".$vars[1];
		$tempma = $tempma * 3600;
		$min = floor($tempma / 60);
		$sec = $tempma - ($min * 60);
		return array("deg"=>$deg, "min"=>$min, "sec"=>$sec);
	}
	
	public function ifnull($value)
	{
		if($value!='null') return '<font color="#0066FF">'.$value.'</font>'; else return false;
	}
	
	public function ifnulls($value)
	{
		if($value!='null') return $value; else return false;
	}
	
	public function uid()
	{
		$mt=microtime();
		$string = array('.',' ');
		$result = str_replace($string, '', $mt);
		$results = rand(100, 999).$result.rand(21, 99);
		return $results;
	}
	
	public function get_pswd($text)
	{
		$result=crypt(md5($text.'99*&^%$#@!QQ+'), 'Developed by irvanfauzie@gmail.com');
		return $result;
	}
	
	public function template_mail($mail)
	{
		$messages = '<div style="color:#555;line-height:1.5;width:500px;margin:30px auto;border:1px solid #DDD"><h1 style="background:#EEE;font-weight:normal;font-size:15px;margin:0;padding:10px;border-bottom:1px solid #DDD">Indosat Geotagging System</h1><div style="background:#FFF;font-size:12px;padding:10px"><h2 style="font-weight:bold;font-size:12px;text-align:center;margin:0 0 10px 0;padding:0 0 10px 0;border-bottom:1px dotted #DDD">'.$mail['subject'].'</h2><p style="margin:7px 0;padding:0">Dear '.$mail['name'].',</p><p style="margin:7px 0;padding:0">'.$mail['body'].'</p><p style="margin:7px 0;padding:0">Thanks</p><h4 style="font-weight:normal;font-size:11px;font-style:italic;text-align:center;margin:10px 0 0 0;padding:10px 0 0 0;border-top:1px dotted #DDD">Please don\'t reply, this email automatically sent by the <a href="'.base_url().'" style="color:#0079C0;text-decoration:none">Indosat Geotagging System</a>.</h4></div></div>';
		return $messages;
	}
	
	public function send_mail($message, $subject, $to_email, $to_name)
	{
		$this->load->library('phpmailer');
		$mail = new PHPMailer();
		$mail->IsSMTP();
		$mail->Host = 'mail.google.com';
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = 'ssl';
		$mail->Host = 'smtp.gmail.com';
		$mail->Port = 465;
		
		$mail->Username = "indosat.geotaging@gmail.com";
		$mail->Password = "metricIsat++";
		
		$mail->SetFrom("indosat.geotaging@gmail.com", "Indosat Geotaging System");
		$mail->Subject = $subject;
		$mail->MsgHTML($message);
		
		$mail->AddAddress($to_email, $to_name);
		$mail->Send();
	}
	
public function dompdf_usage(){
  $default_paper_size = DOMPDF_DEFAULT_PAPER_SIZE;
  
  echo <<<EOD
  
Usage: {$_SERVER["argv"][0]} [options] html_file

html_file can be a filename, a url if fopen_wrappers are enabled, or the '-' character to read from standard input.

Options:
 -h             Show this message
 -l             List available paper sizes
 -p size        Paper size; something like 'letter', 'A4', 'legal', etc.  
                  The default is '$default_paper_size'
 -o orientation Either 'portrait' or 'landscape'.  Default is 'portrait'
 -b path        Set the 'document root' of the html_file.  
                  Relative urls (for stylesheets) are resolved using this directory.  
                  Default is the directory of html_file.
 -f file        The output filename.  Default is the input [html_file].pdf
 -v             Verbose: display html parsing warnings and file not found errors.
 -d             Very verbose: display oodles of debugging output: every frame 
                  in the tree printed to stdout.
 -t             Comma separated list of debugging types (page-break,reflow,split)
 
EOD;
exit;
}
	
	public function getoptions()
	{
		$opts = array();
		if($_SERVER["argc"] == 1) return $opts;
		$i = 1;
		while($i < $_SERVER["argc"]){
			
			switch($_SERVER["argv"][$i]){
				case "--help":
				case "-h":
				$opts["h"] = true;
				$i++;
				break;
				
				case "-l":
				$opts["l"] = true;
				$i++;
				break;
				
				case "-p":
				if( !isset($_SERVER["argv"][$i+1]) )
				die("-p switch requires a size parameter\n");
				$opts["p"] = $_SERVER["argv"][$i+1];
				$i += 2;
				break;
				
				case "-o":
				if( !isset($_SERVER["argv"][$i+1]) )
				die("-o switch requires an orientation parameter\n");
				$opts["o"] = $_SERVER["argv"][$i+1];
				$i += 2;
				break;
				
				case "-b":
				if( !isset($_SERVER["argv"][$i+1]) )
				die("-b switch requires a path parameter\n");
				$opts["b"] = $_SERVER["argv"][$i+1];
				$i += 2;
				break;
				
				case "-f":
				if( !isset($_SERVER["argv"][$i+1]) )
				die("-f switch requires a filename parameter\n");
				$opts["f"] = $_SERVER["argv"][$i+1];
				$i += 2;
				break;
				
				case "-v":
				$opts["v"] = true;
				$i++;
				break;
				
				case "-d":
				$opts["d"] = true;
				$i++;
				break;
				
				case "-t":
				if( !isset($_SERVER['argv'][$i + 1]) )
				die("-t switch requires a comma separated list of types\n");
				$opts["t"] = $_SERVER['argv'][$i+1];
				$i += 2;
				break;
				
				default:
				$opts["filename"] = $_SERVER["argv"][$i];
				$i++;
				break;
			}
		
		}
		return $opts;
	}
	
	public function paging($p=1, $page, $num_page, $num_record, $click='href', $extra='')
	{
		$pnumber = '';
		echo '<div class="box_paging">';
		if($p>1){
			$previous=$p-1;
			echo '<a '.$click.'="'.$page.$previous.$extra.'">&laquo;</a> ';
		}
		if($p>3) echo '<a '.$click.'="'.$page.'1'.$extra.'">1</a> ';
		for($i=$p-2;$i<$p;$i++){
		  if($i<1) continue;
		  $pnumber .= '<a '.$click.'="'.$page.$i.$extra.'">'.$i.'</a> ';
		}
		$pnumber .= ' <a class="active">'.$p.'</a> ';
		for($i=$p+1;$i<($p+3);$i++){
		  if($i>$num_page) break;
		  $pnumber .= '<a '.$click.'="'.$page.$i.$extra.'">'.$i.'</a> ';
		}
		$pnumber .= ($p+2<$num_page ? ' <a '.$click.'="'.$page.$num_page.$extra.'">'.$num_page.'</a> ' : " ");
		echo $pnumber;
		if($p<$num_page){
			$next=$p+1;
			echo '<a '.$click.'="'.$page.$next.$extra.'">&raquo;</a>';
		}
		echo '<span>Total: <b>'.$num_record.'</b> Records</span>';
		echo '</div>';
	}
}