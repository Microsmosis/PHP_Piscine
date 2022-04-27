<?php
	function ft_split($arg_str)
	{			//	str_word_count returns an array or an integer depending on the format chosen in this case string array
		$arrays = str_word_count($arg_str, 1, "0123456789!\"#$%&'()*+,-./:;<=>?@[\]^_`{|}~"); // return value depending on the second param, 1 returns an array containing all the words found inside the string
		sort($arrays); // will sort strings in arrays by ascii values in ascending order
		return ($arrays);
	}
?>