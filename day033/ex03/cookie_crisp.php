<?php
	if ($_GET['action'] == 'set' && $_GET['name'] != '' && $_GET['value'] != '')
		setcookie($_GET['name'], $_GET['value'], time() + (86400 * 1), "/");
	if ($_GET['action'] == 'get' && $_GET['name'] != '')
		echo $_COOKIE[$_GET['name']] . "\n";
	if ($_GET['action'] == 'del' && $_GET['name'] != '')
		setcookie($_GET['name'], '', time() - 3600);
		/* some issues with the delete, does not actually do it when using curl -b "get",
		this whole day of exo's is a bit weird still so do check during piscine with peers! */
?>