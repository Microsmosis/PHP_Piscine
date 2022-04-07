#!/usr/bin/php
<?php
	$arrays = array();
	foreach ($argv as $elements)
	{
		$temp = preg_split('/ +/', trim($elements));
		if ($temp[0] != "")
			$arrays = array_merge($arrays, $temp);
	}
	array_shift($arrays);
	sort($arrays);
	foreach ($arrays as $elements)
	{
		echo ($elements . "\n");
	}
?>
