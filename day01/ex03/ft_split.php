<?php
	function ft_split($arg_str)
	{
		$arrays = str_word_count($arg_str, 1);
		sort($arrays);
		return ($arrays);
	}
?>