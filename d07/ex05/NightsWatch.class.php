<?php 
	class NightsWatch implements IFighter 
	{
		private $recruited = array();
		public function fight()
		{
			foreach ($this->recruited as $fighter)
			{
				$fighter->fight();
			}
		}

		public function recruit($fighter) 
		{
			if(get_class($fighter) == "SamwellTarly" || get_class($fighter) == "JonSnow")
			{
				$this->recruited[] = $fighter;
			}
		}
	}
?>