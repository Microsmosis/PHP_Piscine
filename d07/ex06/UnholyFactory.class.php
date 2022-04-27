<?php
class UnholyFactory
{
	private $absorbed = array();
	
	public function absorb($fighter_instance)
	{
		if ($fighter_instance instanceof Fighter)
		{
			if (isset($this->absorbed[$fighter_instance->getName()]))
			{
				print ("(Factory already absorbed a fighter of type " . $fighter_instance->getName() . ")\n");
			}
			else
			{
				print ("(Factory absorbed a fighter of type " . $fighter_instance->getName() . ")\n");
				$this->absorbed[$fighter_instance->getName()] = $fighter_instance;
			}
		}
		else
			print ("(Factory can't absorb this, it's not a fighter)\n");
		
	}
	public function fabricate($fighter_type)
	{
		if(isset($this->absorbed[$fighter_type]))
		{
			print ("(Factory fabricates a fighter of type " . $fighter_type . ")\n");
			return ($this->absorbed[$fighter_type]);
		}
		else
		{
			print ("(Factory hasn't absorbed any fighter of type " . $fighter_type . ")\n");
			return null;
		}
	}
}
?>