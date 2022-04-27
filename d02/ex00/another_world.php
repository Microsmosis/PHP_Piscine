#!/usr/bin/php
<?php
	if ($argc > 1)
	{
		$str = trim($argv[1]);
		$pattern = "/\s+/";
		$res = preg_replace($pattern, ' ', $str);
		echo $res . "\n";
	}
?>