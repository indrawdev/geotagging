<?php
	function kosong($var)
	{
		$var = str_replace(array('|', "'", '"'), array('', "\'", "\'"), $var);
		if(!$var) $var = 'null';
		return $var;
	}
?>