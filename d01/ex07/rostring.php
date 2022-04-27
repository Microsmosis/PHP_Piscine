#!/usr/bin/php
<?php
	if ($argc > 1)
	{
		$str = str_word_count($argv[1], 1, "0123456789!\"#$%&'()*+,-./:;<=>?@[\]^_`{|}~");
		$first = array_shift($str);
		foreach ($str as $elements)
			echo $elements . " ";
		echo $first . "\n";
	}
?>