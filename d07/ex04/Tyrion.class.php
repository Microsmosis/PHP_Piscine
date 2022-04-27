<?php 
	class Tyrion {
		public function sleepWith($sibling)
		{
			if (get_class($sibling) == "Jaime")
				print "Not even if I'm drunk !" . PHP_EOL;
			else if (get_class($sibling) == "Sansa")
				print "Let's do this." . PHP_EOL;
			else if (get_class($sibling) == "Cersei")
				print "Not even if I'm drunk !" . PHP_EOL;
		}
	}
?>