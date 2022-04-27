<?php
require_once ("Color.class.php");
class Vertex
{
	private			$_x;
	private			$_y;
	private			$_z;
	private			$_w = 1.0;
	private			$_color;
	
	public	static	$verbose = false;
	
	function __construct($array)
	{
		if (isset($array['x']) && isset($array['y']) && isset($array['z']))
		{
			$this->_x = floatval($array['x']);
			$this->_y = floatval($array['y']);
			$this->_z = floatval($array['z']);
			if (isset($array['w']))
				$this->_w = floatval($array['w']);
			if (isset($array['color']) && $array['color'] instanceof Color)
				$this->_color = $array['color'];
			else
				$this->_color = new Color( array('red' => 255, 'green' => 255, 'blue' => 255) );
		}
		if (Self::$verbose)
			printf("Vertex( x: %0.2f, y: %0.2f, z:%0.2f, w:%0.2f, Color( red: %3d, green: %3d, blue: %3d ) ) constructed\n", $this->_x, $this->_y, $this->_z, $this->_w, $this->_color->red, $this->_color->green, $this->_color->blue);
	}
	function __destruct()
	{
		if (Self::$verbose)
			printf("Vertex( x: %0.2f, y: %0.2f, z:%0.2f, w:%0.2f, Color( red: %3d, green: %3d, blue: %3d ) ) destructed\n", $this->_x, $this->_y, $this->_z, $this->_w, $this->_color->red, $this->_color->green, $this->_color->blue);
	}
	function __toString()
	{
		if (Self::$verbose)
			return (sprintf("Vertex( x: %0.2f, y: %0.2f, z:%0.2f, w:%0.2f, Color( red: %3d, green: %3d, blue: %3d ) )", $this->_x, $this->_y, $this->_z, $this->_w, $this->_color->red, $this->_color->green, $this->_color->blue));
		else
			return (sprintf("Vertex( x: %0.2f, y: %0.2f, z:%0.2f, w:%0.2f )", $this->_x, $this->_y, $this->_z, $this->_w));
	}
	static function doc()
	{
		$documentation = fopen("Vertex.doc.txt", "r");
		$doc = fread($documentation, filesize("Vertex.doc.txt")) . "\n";
		fclose($documentation);
		return $doc;
	}
	function getX()
	{
		return $this->_x;
	}
	function setX($x)
	{
		$this->_x = $x;
	}
	function getY()
	{
		return $this->_y;
	}
	function setY($y)
	{
		$this->_y = $y;
	}
	function getZ()
	{
		return $this->_z;
	}
	function setZ($z)
	{
		$this->_z = $z;
	}
	function getW()
	{
		return $this->_w;
	}
	function setW($w)
	{
		$this->_w = $w;
	}
	function getcolor()
	{
		return $this->_color;
	}
	function setcolor($color)
	{
		$this->_color = $color;
	}
}
?>