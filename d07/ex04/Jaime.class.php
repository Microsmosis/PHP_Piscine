<?php 
	class Jaime {
		public function sleepWith($sibling)
		{
			if (get_class($sibling) == "Tyrion")
				print "Not even if I'm drunk !" . PHP_EOL;
			else if (get_class($sibling) == "Sansa")
				print "Let's do this." . PHP_EOL;
			else if (get_class($sibling) == "Cersei")
				print "With pleasure, but only in a Tower in Winterfell, then." . PHP_EOL;
		}
	}
?>