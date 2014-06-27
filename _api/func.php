<?php
if(!defined('DEVELOPER'))exit;

function get_pswd($ifpsd){
	$result=crypt(md5($ifpsd.'99*&^%$#@!QQ+'), DEVELOPER);
	return $result;
}

function get_token($user){
	$ua=sha1($_SERVER['HTTP_USER_AGENT'].DEVELOPER.'<{[^.^]}>');
	$uc=crypt($user, '@$_$@');
	$token=$ua.$uc;
	$all_token=$user.'|'.$token;
	return $all_token;
}

function returnjson($return, $message){
	$str = array("result" => $return, "message" => $message);
	return json_encode($str);
}

function sql2json($query, $single=false){
	$data_sql = mysql_query($query) or die(returnjson('failed','Sorry, could not execute query: '.mysql_error()));
    if($total = mysql_num_rows($data_sql)){
		if(!$single)
		$json_str .= '{"result":"success", "num_data":"'.$total.'", "data":[';
        $row_count = 0;    
        while($data = mysql_fetch_assoc($data_sql)){
            if(count($data) > 1) $json_str .= '{';
			if($single) $json_str .= '"result":"success", ';
            $count = 0;
            foreach($data as $key => $value){
				$value=json_encode($value);
                if(count($data) > 1) $json_str .= '"'.$key.'":'.$value;
                else $json_str .= $value;
                $count++;
                if($count < count($data)) $json_str .= ', ';
            }
            $row_count++;
            if(count($data) > 1) $json_str .= '}';
            if($row_count < $total) $json_str .= ',';
        }
		if(!$single)
        $json_str .= ']}';		
    }else{
		$json_str = returnjson('nodata','No data');
	}
    return $json_str;
}