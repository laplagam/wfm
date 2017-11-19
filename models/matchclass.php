<?php

// GAME GENERATOR

class MatchClass
{
  var $pdo;
  var $clubclass;

	var $hometeamobj;
	var $awayteamobj;

	var $currentminute = 0;
	var $hometeamgoals = 0;
	var $awayteamgoals = 0;
  var $matchlength = 95;
  var $matchid = 0;

  var $matchlog;//Currently we only add minute and goals happening.
  var $matchlogjson;//Currently we only add minute and goals happening.

  var $matchjs= '';

  var $errormessage='';
  var $errorcount = 0;

	/*function __construct()
	{

  }*/

  function __construct(PdoConnection $pdo, ClubClass $clubclass)
  {
    $this->pdo = $pdo;
    $this->clubclass = $clubclass;
  }
  
  function loadMatchFromId($matchid)
  {
    $this->matchid = $matchid;
    $dbh = $this->pdo->getPdoCon();
    $query = 'SELECT hometeamid,awayteamid FROM tbluserfixtures WHERE id = :id';
    $stmt = $dbh->prepare($query);

    $stmt->bindParam(':id',$matchid,PDO::PARAM_INT);

    $stmt->execute();

    $result = $stmt->fetch();

    //echo '<br/>'.$result['hometeamid'].'<br/>';
    //echo '<br/>'.$result['awayteamid'].'<br/>';
    
    //Load home team
    //$this->clubclass->getTeamFromId($result['hometeamid']);
    $this->hometeamobj = clone $this->clubclass;
    $this->hometeamobj->getTeamFromId($result['hometeamid']);

    //echo $this->hometeamobj->name;
    
    //Load away team
    $this->awayteamobj = clone $this->clubclass;    
    $this->awayteamobj->getTeamFromId($result['awayteamid']);

    //echo $this->hometeamobj->name;
    //echo $this->awayteamobj->name;
    //$this->hometeamobj = $hometeamobj;
		//$this->awayteamobj = $awayteamobj;
  }

  function updateMatchToDb()
  {
    $dbh = $this->pdo->getPdoCon();
    $dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $query = 'UPDATE tbluserfixtures SET hometeamgoals = :hometeamgoals, awayteamgoals = :awayteamgoals, isplayed=1, matchlogjson=:matchlogjson  WHERE id = :id';
    $stmt = $dbh->prepare($query);

    $stmt->bindParam(':hometeamgoals',$this->hometeamgoals,PDO::PARAM_INT);
    $stmt->bindParam(':awayteamgoals',$this->awayteamgoals,PDO::PARAM_INT);
    $stmt->bindParam(':matchlogjson',$this->matchlogjson,PDO::PARAM_STR);
    $stmt->bindParam(':id',$this->matchid,PDO::PARAM_INT);
    
    try
    {
      $result = $stmt->execute();

      if($result == false)
      {
        $errorarray = $stmt->errorInfo();
        $this->errormessage .= $errorarray[0].' - '.$errorarray[1].' - '.$errorarray[2].'<br/>';
        $this->errorcount++;
        return 0;
      }
      else{
        //$this->gameid = $dbh->lastInsertId(); 
      }
    }
    catch(Exception $e)
    {
      
      $this->errormessage .= $e->getMessage();
      $this->errorcount++;
      //echo 'Failed to create a new game. ';
      return 0;
    }
    //$stmt->execute();

    //$result = $stmt->fetch();
  }

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
    
    $this->matchlogjson = json_encode($this->matchlog);
	}

	function checkIfGoalScored($skill)
	{
		$goalfactor = 30000;

		if($skill>mt_rand(0,$goalfactor))
		{
			return true;
		}
		else
		{
			return false;
		}
  }
  
  function gameLogToJson()
  {
    return json_encode($this->matchlog);
  }

	function makeGameLog($currentminute)
	{
		if($this->checkIfGoalScored($this->hometeamobj->skill))
		{
			$this->matchlog[$currentminute]['happening'] = $currentminute.' - '.$this->hometeamobj->name.' just scored a fantastic goal!';
			$this->matchlog[$currentminute]['teamthatscored'] = 'hometeam';
			$this->hometeamgoals++;
		}
		elseif($this->checkIfGoalScored($this->awayteamobj->skill)) 
		{
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
  
  function makeMatchJs()
  {
    $this->matchjs = '<script type="text/javascript">
    function viewMatch()
    {
      var matchjson = '.$this->matchlogjson.';
      var counter = 0;
      var hometeamgoals = 0;
      var awayteamgoals = 0;
      document.getElementById("hometeamgoals").innerHTML = 0;
      document.getElementById("awayteamgoals").innerHTML = 0;
      document.getElementById("hometeamlog").innerHTML = "";
      document.getElementById("awayteamlog").innerHTML = "";
      runMatch(matchjson,counter,hometeamgoals,awayteamgoals);      
    }

    function runMatch(element,counter,hometeamgoals,awayteamgoals)
    {

      counter++;
      
      if(typeof element[counter] !== "undefined")
      {
        if(typeof element[counter]["happening"] !== "undefined")
        {
          if(element[counter]["teamthatscored"] == "hometeam")
          {
            document.getElementById("hometeamlog").innerHTML += element[counter]["happening"]+"<br/>";
            hometeamgoals++;
            document.getElementById("hometeamgoals").innerHTML = hometeamgoals.toString();
          }
          else
          {
            document.getElementById("awayteamlog").innerHTML += element[counter]["happening"]+"<br/>";
            awayteamgoals++;
            document.getElementById("awayteamgoals").innerHTML = awayteamgoals.toString();
          }
        }
        document.getElementById("matchtimer").innerHTML = counter.toString();
      setTimeout(function() {
        runMatch(element,counter,hometeamgoals,awayteamgoals);
        }, 200);
      }
      
    }
    </script>';
    return $this->matchjs;
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
