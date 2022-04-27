<?php 
	if ($_POST['login'] && $_POST['oldpw'] && $_POST['newpw'] && $_POST['submit'] && $_POST['submit'] === 'OK')
	{
		$user_file = file_get_contents("../private/passwd");
		$user_accounts = unserialize($user_file);
		if ($user_accounts)
		{
			foreach ($user_accounts as $key => $value)
			{
				if ($value['login'] === $_POST['login'] && $value['passwd'] === hash('whirlpool', $_POST['oldpw']))
				{
					$user_accounts[$key]['passwd'] = hash('whirlpool', $_POST['newpw']);
					file_put_contents('../private/passwd', serialize($user_accounts));
					echo "OK" . "\n";
					header('Location: index.html');
				}
				else
				{
					echo "ERROR" . "\n";
				}
			}
		}
		else
		{
			echo "ERROR" . "\n";
		}
	}
	else
	{
		echo "ERROR" . "\n";
	}
?>