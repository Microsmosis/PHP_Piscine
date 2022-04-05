<?php 
	class NightsWatch implements IFighter 
	{

		public function fight()
		{

		}

		public function recruit($fighter) 
		{
			if(get_class($fighter) == "SamwellTarly" || get_class($fighter) == "JonSnow")
			{
				$fighter->fight();
			}
		}
	}
?>