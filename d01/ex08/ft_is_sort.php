<?php
	function ft_is_sort($arg_array)
	{
		$temp = $arg_array;
		sort($arg_array);
		if ($temp == $arg_array)
			return TRUE;
		else
			return FALSE;
	}
?>