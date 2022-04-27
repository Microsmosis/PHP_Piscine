<?php
	if($_POST['login'] && $_POST['passwd'] && $_POST['submit'] && $_POST['submit'] === 'OK')
	{
		if (!file_exists("../private"))
		{
			mkdir("../private");
		}
		if (!file_exists("../private/passwd"))
		{
			file_put_contents("../private/passwd", null);
		}
		$user_file = file_get_contents("../private/passwd");
		$user_accounts = unserialize($user_file);

		if ($user_accounts)
		{
			$is_in_use = FALSE;
			foreach ($user_accounts as $key => $value)
			{
				if ($value['login'] === $_POST['login'])
					$is_in_use = TRUE;
			}
		}
		if ($is_in_use == TRUE)
		{
			echo "ERROR" . "\n";
		}
		else
		{
			$temp_new['login'] = $_POST['login'];
			$temp_new['passwd'] = hash('whirlpool', $_POST['passwd']);
			$user_accounts[] = $temp_new;
			$final_account = serialize($user_accounts);
			file_put_contents("../private/passwd", $final_account);
			echo "OK" . "\n";
			header('Location: index.html');
		}
	}
	else
		echo "ERROR" . "\n";
?>