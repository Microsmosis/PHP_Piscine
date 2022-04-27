#!/usr/bin/php
<?php
	if ($argc == 2)
	{
		$str = trim(preg_replace("/\s+/", '', $argv[1]));
		preg_match("/(.*)[+*-\/%]/", $str, $left);
		preg_match("/[+*-\/%]/", $str, $op);
		preg_match("/[+*-\/%](.*)/", $str, $right);

		$left = intval(trim(preg_replace('/\s+/', '', $left[1])));
		$right = intval(trim(preg_replace('/\s+/', '', $right[1])));
		echo $right[1];

		if (preg_match("/(\-[0-9]+|[0-9]+)([+\-*%\/])(\-[0-9]+|[0-9]+)/", $str) || $op[0] == NULL)
			echo "Syntax Error" . "\n";
		else
		{
			if ($op[0] === '+')
				$sum = $left + $right;
			else if ($op[0] === '-')
				$sum = $left - $right;
			else if ($op[0] === '*')
				$sum = $left * $right;
			else if ($op[0] === '/')
			{
				if ($right == NULL)
					return 0;
				$sum = $left / $right;
			}
			else if ($op[0] === '%')
			{
				if ($right == NULL)
					return 0;
				$sum = $left % $right;
			}
			echo $sum . "\n";
		}
	}
	else
		echo "Incorrect Parameters" . "\n";
?>