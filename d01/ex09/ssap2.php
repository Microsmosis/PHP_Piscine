#!/usr/bin/php
<?php
	function compare($needle1, $needle2)
	{
		$i = 0;
		$haystack = "abcdefghijklmnopqrstuvwxyz0123456789!\"
				#$%&'()*+,-./:;<=>?@[\]^_`{|}~";
		while (($i < strlen($needle1)) || ($i < strlen($needle2)))
		{
			$pos1 = stripos($haystack, $needle1[$i]);
			$pos2 = stripos($haystack, $needle2[$i]);
			if ($pos1 > $pos2)
				return (1);
			else if ($pos1 < $pos2)
				return (-1);
			else
				$i++;
		}
		return (0);
	}
	$array = array();
	foreach ($argv as $elements)
	{
		$temp = preg_split('/\s+/', trim($elements));
		if ($temp[0] != "")
			$array = array_merge($array, $temp);
	}
	array_shift($array); 
	usort($array, "compare");
	foreach ($array as $elements)
	{
		echo ($elements . "\n");
	}
?>