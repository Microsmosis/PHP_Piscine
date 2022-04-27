<?php
	date_default_timezone_set('Europe/Helsinki');
	session_start();
	if (!$_SESSION['loggued_on_user'])
	{
		echo "ERROR" . "\n";
	}
	else
	{
		if ($_POST['msg'])
		{
			if (!file_exists("../private"))
			{
				mkdir("../private");
			}
			if (!file_exists("../private/chat"))
			{
				file_put_contents("../private/chat", null);
			}
			$chat_file = file_get_contents("../private/chat");
			$chat_database = unserialize($chat_file);
			$opened_file = fopen("../private/chat", "w");
			flock($opened_file, LOCK_EX);
			$chat_info['login'] = $_SESSION['loggued_on_user'];
			$chat_info['time'] = time();
			$chat_info['msg'] = $_POST['msg'];
			$chat_database[] = $chat_info;
			$new_message = serialize($chat_database);
			file_put_contents("../private/chat", $new_message);
			fclose($opened_file);
		}
		?>
			<!DOCTYPE html>
			<html>
				<head>
					<meta charset="utf-8">
					<title>Chat</title>
				</head>
				<body>
					<form action="speak.php" method="POST">
					 <input type="text" name="msg" value=""/><input type="submit" name="submit" value="Send Message"/>
					</form>
				</body>
			</html>
			<?php
	}
?>
