<?php
$text = 'ngentot';
	 function get_pswd($text)
	{
		$result=crypt(md5($text.'99*&^%$#@!QQ+'), 'Developed by irvanfauzie@gmail.com');
		return $result;
	}
echo get_pswd($text);
?> 