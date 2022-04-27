<?php
class Fighter
{
	private $type;
	
	public function __construct($fighter_type)
	{
		$this->type = $fighter_type;
	}
	public function getName()
	{
		return $this->type;
	}
}
?>