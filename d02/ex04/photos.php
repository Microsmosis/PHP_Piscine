#!/usr/bin/php
<?php
	function url_exist($url) { // function to check if url is valid
		 $ch = curl_init($url); // initializes a new session and return a cURL 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // sets an option on the given cURL session -  set to true to return the transfer as a string of the return value of curl_exec() instead of outputting it directly.
		$data = curl_exec($ch); // execute the given cURL session.
		$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE); // gets information about the last transfer. - CURLINFO_HTTP_CODE - get the last response code
		curl_close($ch);  // closes a cURL session and frees all resources
		if ($httpcode >= 200 && $httpcode < 400) // Informational responses (100–199), Successful responses (200–299), Redirection messages (300–399), everything over 400 is a ERROR response
			return true;
		return false;
	}
	$url = $argv[1];
	if (url_exist($url) === false)
		die("Not a valid URL\n");
	$page = file_get_contents($url); // will read the url and return the html code in string format
	$pattern = '/<img\s+[^>]*src="([^"]*\.\w+)"[^>]*>/is';
	$dir = parse_url($url, PHP_URL_HOST); // parse_url will remove everything before www.
	preg_match_all($pattern, $page, $matches);
	if(!is_dir($dir)) // if there is not a directory with the same name it will it create one
		mkdir($dir); // create directory
	chdir($dir); // cd into the directory
	foreach($matches[1] as $match) // going threw the array and fetching the img links
		shell_exec('curl -O ' . $match); // curl will fetch and download the image into the current dir, -O flag for custom name
	chdir(".."); // cding out of the created directory
?>