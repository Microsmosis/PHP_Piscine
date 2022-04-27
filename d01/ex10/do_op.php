#!/usr/bin/php
<?php
	if ($argc == 4)
	{
		$left = trim(preg_replace('/\s+/', '', $argv[1]));
		$op = trim(preg_replace('/\s+/', '', $argv[2]));
		$right = trim(preg_replace('/\s+/', '', $argv[3]));
		
		$left += 0;
		$right += 0;

		if ($op == '+')
			$sum = $left + $right;
		else if ($op == '-')
			$sum = $left - $right;
		else if ($op == '*')
			$sum = $left * $right;
		else if ($op == '/')
			$sum = $left / $right;
		else if ($op == '%')
			$sum = $left % $right;
		echo $sum . "\n";
	}
	else
		echo "Incorrect Parameters" . "\n";
?>