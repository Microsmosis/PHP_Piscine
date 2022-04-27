#!/usr/bin/php
<?php
	if (file_exists("/var/run/utmpx"))
	{
		$file = fopen("/var/run/utmpx", "r");
		date_default_timezone_set("Europe/Helsinki");
		while ($source = fread($file, 628)) // the utpmx record is 628 bytes long, we set that for the length to read
		{
			if (strlen($source) == 628)
			{
				$source = unpack("a256user/a4id/a32tty/i1pid/i1type/i1time", $source); // a for string, i for int, n bytes for size, and custom variable name
				if ($source['type'] == 7) // Type of Login USER_PROCESS is 7, Process spawned by user
				{
					$usr = trim($source['user']);
					$dt = trim($source['tty']);
					$month = date("M", $source['time']); // "M" -  A short textual representation of a month (three letters)
					$day = date("j", $source['time']); // "j" - The day of the month without leading zeros (1 to 31)
					$time = date("H:i", $source['time']); // "H" - 24-hour format of an hour (00 to 23) : "i" - Minutes with leading zeros (00 to 59)
					printf("%-8s %-8s %s %2s %s\n", $usr, $dt, $month, $day, $time); // "left-justify to make sure that the string is in correct position
				}
			}
		}
		fclose($file);
	}
?>