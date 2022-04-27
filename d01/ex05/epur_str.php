#!/usr/bin/php
<?php
	if ($argc == 2)
	{
		$str = $argv[1];
		$str = trim($str);
		$str = preg_replace('/\s+/', ' ', $str);
		if ($str)
			echo $str;
	}
?>