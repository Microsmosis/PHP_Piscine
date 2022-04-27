<?php
function auth($login, $passwd) {
	$user_file = "../private/passwd";
	$user_accounts = unserialize(file_get_contents($user_file));
	foreach ($user_accounts as $key => $value)
	{
		$user_pw = hash('whirlpool', $passwd);
		if ($value['login'] == $login && $value['passwd'] == $user_pw)
			return true;
	}
	return false;
}
?>