#!/usr/bin/php
<?php
	$arrays = array();
	foreach ($argv as $elements) // going through 1 argument at a time and preg splitting and trimming
	{
		$temp = preg_split('/\s+/', trim($elements));
		if ($temp[0] != "")
			$arrays = array_merge($arrays, $temp);
	}
	array_shift($arrays); // this is here to remove the executables name lol
	sort($arrays);
	foreach ($arrays as $elements) // printing out strings in array
	{
		echo ($elements . "\n");
	}
?>