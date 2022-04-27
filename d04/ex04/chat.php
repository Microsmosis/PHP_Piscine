<?php
	date_default_timezone_set('Europe/Helsinki');
	session_start();
	if (!$_SESSION['loggued_on_user'])
	{
		echo "ERROR" . "\n";
	}
	else
	{
		if (file_exists("../private/chat"))
		{
			$chat_file = file_get_contents("../private/chat");
			$chat_database = unserialize($chat_file);
			foreach ($chat_database as $value)
			{
				echo "[" . date('H:i', $value['time']) . "]" . $value['login'] . "</b>: " . $value['msg'] . "<br />" . "\n";
			}
		}
	}
?>