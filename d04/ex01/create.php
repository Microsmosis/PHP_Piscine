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
		$user_account = unserialize($user_file);
		if ($user_account)
		{
			$is_in_use = FALSE;
			foreach ($user_account as $key => $value)
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
			$user_account[] = $temp_new;
			$final_account = serialize($user_account);
			file_put_contents("../private/passwd", $final_account);
			echo "OK" . "\n";
		}
	}
	else
		echo "ERROR" . "\n";
?>