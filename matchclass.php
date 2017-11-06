<?php

// GAME GENERATOR

class MatchClass
{
	var $hometeamobj;
	var $awayteamobj;

	var $currentminute = 0;
	var $hometeamgoals = 0;
	var $awayteamgoals = 0;
	var $matchlength = 95;

	var $matchlog;//Currently we only add minute and goals happening. 

	/*function __construct()
	{

	}*/

	function loadTeams(ClubClass $hometeamobj, ClubClass $awayteamobj)
	{
		$this->hometeamobj = $hometeamobj;
		$this->awayteamobj = $awayteamobj;
	}

	function runMatch()
	{
		//Runs through every minute of the game and checks if there is a goal. 
		//Creates all details in a log file and adds goals to he result. 
		while($this->currentminute<$this->matchlength)
		{
			$this->makeGameLog($this->currentminute);		
			$this->currentminute++;
		}
		
	}

	function makeGameLog($currentminute)
	{
		if($this->hometeamobj->skill>mt_rand(0,6000))
		{
			$this->matchlog[$currentminute]['happening'] = $currentminute.' - '.$this->hometeamobj->name.' just scored a fantastic goal!';
			$this->matchlog[$currentminute]['teamthatscored'] = 'hometeam';
			$this->hometeamgoals++;
		}
		elseif($this->awayteamobj->skill>mt_rand(0,6000)) {
			$this->matchlog[$currentminute]['happening'] = $currentminute.' - '.$this->awayteamobj->name.' just scored a fantastic goal!';			
			$this->matchlog[$currentminute]['teamthatscored'] = 'awayteam';
			$this->awayteamgoals++;
		}
		else
		{
			$this->matchlog[$currentminute] = '';
		}

		//TODO: Run randomize to find out if any team scores goals. 
		$this->matchlog[$currentminute];
	}
	
	function printResult()
	{
		echo $this->hometeamobj->name.' - '.$this->awayteamobj->name.'<br/>';
		foreach ($this->matchlog as $value) 
		{			
			echo $value;
		}
		echo $this->hometeamobj->name.' - '.$this->awayteamobj->name.'<br/>';
		echo $this->hometeamgoals.' - '.$this->awayteamgoals.'<br/>';
	}
}
