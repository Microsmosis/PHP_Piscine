#!/usr/bin/php
<?php
	date_default_timezone_set('Europe/Paris');
	$days = array (
		1 => "lundi",
		2 => "mardi",
		3 => "mercredi",
		4 => "jeudi",
		5 => "vendredi",
		6 => "samedi",
		7 => "dimanche"
	);
	
	$months = array (
		"Jan" => "janvier",
		"Feb" => "février",
		"Mar" => "mars",
		"Apr" => "avril",
		"May" => "mai",
		"Jun" => "juin",
		"Jul" => "juillet",
		"Aug" => "aout",
		"Sep" => "septembre",
		"Oct" => "octobre",
		"Nov" => "novembre",
		"Dec" => "décembre"
	);
	
	if ($argc > 1)
	{
		$data = explode(' ', $argv[1]);
		$timepattern = "/(^0[0-9]$|1[0-9]|2[0-3]):(0[0-9]|[0-5][0-9]):(0[0-9]|[0-5][0-9])$/";
		$datepattern = "/(^[1-9]$|^1[0-9]$|^2[0-9]$|^3[0-1])$/";
		$checks = 0;
		if (count($data) == 5)
		{
			$checks += preg_match($timepattern, $data[4], $time);
			$checks += preg_match($datepattern, $data[1], $date);
			$day = array_search(lcfirst($data[0]), $days, 1); // if 1 search for identical elements in the array
			$month = array_search(lcfirst($data[2]), $months, 1);
			$year = intval($data[3]);
		}
		if ($checks === 2 && $day != NULL && $month != NULL && $year >= 1970 && $year <= time())
		{
			$str = "$month $date[0] $year $time[0]";
			$timestamp = strtotime($str);
			if (date("N", $timestamp) == $day && date("d", $timestamp) == $date[0] && date("M", $timestamp) == $month && date("Y", $timestamp) == $year)
				echo $timestamp . "\n";
			else
				echo "Wrong Format\n";
		}
		else
		{
			echo "Wrong Format\n";
		}
	}
?>