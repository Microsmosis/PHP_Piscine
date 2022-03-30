#!/usr/bin/php
<?php
	$pattern1 = "/<a.*?title=\"(.*?)\"/";
	$pattern2 = "/<a .*?>(.*?)</";
	$str = implode("", file($argv[1]));
	preg_match_all($pattern1, $str, $result1);
	preg_match_all($pattern2, $str, $result2);
	$result1 = array_slice($result1, 1);
	$result2 = array_slice($result2, 1);
	foreach ($result2[0] as $string)
		$str = str_replace($string, strtoupper($string), $str);
	foreach ($result1[0] as $string)
		$str = str_replace($string, strtoupper($string), $str);
	echo $str;
?>