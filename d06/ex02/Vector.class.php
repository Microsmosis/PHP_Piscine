<?php
class Vector
{
	private			$_x;
	private			$_y;
	private			$_z;
	private			$_w = 0.0;

	public	static	$verbose = false;
	
	public function __construct($array)
	{
		if (isset($array['dest']) && $array['dest'] instanceof Vertex)
		{
			
			if (isset($array['orig']) && $array['orig'] instanceof Vertex)
			{
				$orig =  $array['orig'];
			}
			else
			{
				$orig = new Vertex( array( 'x' => 0.0, 'y' => 0.0, 'z' => 0.0 ) );
			}
			$this->_x = $array['dest']->getX() - $orig->getX();
			$this->_y = $array['dest']->getY() - $orig->getY();
			$this->_z = $array['dest']->getZ() - $orig->getZ();
		}
		if (Self::$verbose)
		{
			printf("Vector( x:%0.2f, y:%0.2f, z:%0.2f, w:%0.2f ) constructed\n", $this->_x, $this->_y, $this->_z, $this->_w);
		}
	}
	public function __destruct()
	{
		if (Self::$verbose)
		{
			printf("Vector( x:%0.2f, y:%0.2f, z:%0.2f, w:%0.2f ) destructed\n", $this->_x, $this->_y, $this->_z, $this->_w);
		}
	}
	public function __toString()
	{
		return sprintf("Vector( x:%0.2f, y:%0.2f, z:%0.2f, w:%0.2f )", $this->_x, $this->_y, $this->_z, $this->_w);
	}
	static public function doc()
	{
		$documentation = fopen("Vector.doc.txt", "r");
		print(fread($documentation, filesize("Vector.doc.txt")) . "\n");
		fclose($documentation);
	}
	public function magnitude()
	{
		$result = (float)sqrt(($this->_x * $this->_x) + ($this->_y * $this->_y) + ($this->_z * $this->_z));
		return ($result);
	}
	
	public function div($div)
	{
		return new Vector( array('dest' => new Vertex( array( 'x' => $this->_x / $div, 'y' => $this->_y / $div, 'z' => $this->_z / $div))));
	}
	
	public function normalize()
	{
		$magnitude = $this->magnitude();
		if ($magnitude == 1.0)
		{
			return clone $this;
		}
		return $this->div($magnitude);
	}
	public function add($rhs)
	{
		return new Vector( array('dest' => new Vertex( array( 'x' => $this->_x + $rhs->getX(), 'y' => $this->_y + $rhs->getY(), 'z' => $this->_z + $rhs->getZ()))));
	}
	public function sub($rhs)
	{
		return new Vector( array('dest' => new Vertex( array( 'x' => $this->_x - $rhs->getX(), 'y' => $this->_y - $rhs->getY(), 'z' => $this->_z - $rhs->getZ()))));
	}
	public function opposite()
	{
		return new Vector( array('dest' => new Vertex( array( 'x' => $this->_x * -1, 'y' => $this->_y * -1, 'z' => $this->_z * -1))));
	}
	public function scalarProduct($k)
	{
		return new Vector( array('dest' => new Vertex( array( 'x' => $this->_x * $k, 'y' => $this->_y * $k, 'z' => $this->_z * $k))));
	}
	public function dotProduct($rhs)
	{
		return (float)($this->_x * $rhs->getX() + $this->_y * $rhs->getY() + $this->_z * $rhs->getZ());
	}
	public function cos($rhs)
	{
		return (float)($this->dotProduct($rhs) / sqrt(((pow($this->_x, 2) + pow($this->_y, 2) + pow($this->_z, 2)) * (pow($rhs->getX(), 2) + pow($rhs->getY(), 2) + pow($rhs->getZ(), 2)))));
	}
	public function crossProduct($rhs)
	{
		return new Vector(array('dest' => new Vertex(array('x' => $this->_y * $rhs->getZ() - $this->_z * $rhs->getY(), 'y' => $this->_z * $rhs->getX() - $this->_x * $rhs->getZ(), 'z' => $this->_x * $rhs->getY() - $this->_y * $rhs->getX()))));
	}
	public function getX()
	{
		return $this->_x;
	}
	public function getY()
	{
		return $this->_y;
	}
	public function getZ()
	{
		return $this->_z;
	}
	public function getW()
	{
		return $this->_w;
	}
}
?>