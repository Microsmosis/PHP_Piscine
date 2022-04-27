<?php
class Color
{
	public			$red;
	public			$green;
	public			$blue;
	public	static	$verbose = false;
	
	function __construct($array)
	{
		if (isset($array['red']) && isset($array['green']) && isset($array['blue']))
		{
			$this->red = intval($array['red']);
			$this->green = intval($array['green']);
			$this->blue = intval($array['blue']);
		}
		else if (isset($array['rgb']))
		{
			$rgb = intval($array['rgb']);
			$this->red = ($rgb >> 16) & 0xFF;
			$this->green = ($rgb >> 8) & 0xFF;
			$this->blue = $rgb & 0xFF;
		}
		if (Self::$verbose)
			printf("Color( red: %3d, green: %3d, blue: %3d ) constructed\n", $this->red, $this->green, $this->blue);
	}
	function __destruct()
	{
		if (Self::$verbose)
			printf("Color( red: %3d, green: %3d, blue: %3d ) destructed\n", $this->red, $this->green, $this->blue);
	}
	function __toString()
	{
		return (sprintf("Color( red: %3d, green: %3d, blue: %3d )", $this->red, $this->green, $this->blue));
	}
	static function doc()
	{
		$documentation = fopen("Color.doc.txt", "r");
		$doc = fread($documentation, filesize("Color.doc.txt")) . "\n";
		fclose($documentation);
		return $doc;
	}
	function add($passed_color)
	{
		return new Color(array('red' => $this->red + $passed_color->red, 'green' => $this->green + $passed_color->green, 'blue' => $this->blue + $passed_color->blue));
	}
	function sub($passed_color)
	{
		return new Color(array('red' => $this->red - $passed_color->red, 'green' => $this->green - $passed_color->green, 'blue' => $this->blue - $passed_color->blue));
	}
	function mult($passed_value)
	{
		return new Color(array('red' => $this->red * $passed_value, 'green' => $this->green * $passed_value, 'blue' => $this->blue * $passed_value));
	}
}
?>