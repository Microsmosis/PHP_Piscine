#!/usr/bin/php
<?php
$str = fopen("php://stdin", "r"); // fopen("php://stdin") to fetch input from stdin and in read only mode
while ($str && !feof($str)) // while there is something to read from str and while feof() returns FALSE
{
	echo "Enter a number: ";
	$number = fgets($str); // fgets returns a line from an open file
	if ($number) // if number is not empty
	{
		$number = str_replace("\n", "", $number); // params: find, replace, string, check why??
		if (is_numeric($number)) // TRUE if number or numeric string, FALSE otherwise
		{
			if ($number % 2 == 0) // if there is no remainder then it is even
				echo "The number " . $number . " is even\n";
			else
				echo "The number " . $number . " is odd\n";
		}
		else
			echo "'" . $number . "' is not a number\n";
	}
}
fclose($str);
echo "\n";
?>