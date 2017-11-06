<?php

class ClubClass
{
	var $skill = 0;
	var $name = 'IK Start';
	
	function makeTeam($name, $skill)
	{
		$this->skill = $skill;
		$this->name = $name;
	}
	
}

?>