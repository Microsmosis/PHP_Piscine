<?php
	if ($_SERVER['PHP_AUTH_USER'] == 'zaz' && $_SERVER['PHP_AUTH_PW'] == 'Ilovemylittleponey')
	{
		$base_str = base64_encode(file_get_contents('../img/42.png'));
		echo "<html><body>\nHello Zaz<br />\n<img src='data:image/png;base64," . $base_str;
		echo "'>\n</body></html>\n";
	}
	else
	{
		header('WWW-Authenticate: Basic realm="Kosmos"');
		header('HTTP/1.0 401 Unauthorized');
		echo "MEMBERS ONLY!";
	}
?>
