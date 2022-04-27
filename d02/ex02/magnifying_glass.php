#!/usr/bin/php
<?php
	$pattern0 = "/(?<=)<a.*?<\/a>/ism";
	$pattern1 = "/(?<=>).*?<|(?<=title)=\"(.*?)\"/ism";
	if ($argc == 2)
	{
		$str = implode("", file($argv[1]));
		$str2 = $str;
		preg_match_all($pattern0, $str, $m0);
		$str = implode("", $m0[0]);
		preg_match_all($pattern1, $str, $m0);
		foreach($m0[0] as $string)
			$str2 = preg_replace("/$string/", strtoupper($string), $str2);
		echo $str2;
	}
?>