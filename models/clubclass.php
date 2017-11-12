<?php

class ClubClass
{
  var $pdo;
	var $skill = 0;
  var $name = 'IK Start';
  
  function __construct(PdoConnection $pdo)
  {
    $this->pdo = $pdo;
  }
  function getTeamFromId($teamid)
  {
    $dbh = $this->pdo->getPdoCon();

    $query = 'SELECT skill,name FROM tblclub WHERE id = :id';

    $stmt = $dbh->prepare($query);

    $stmt->bindParam(':id',$teamid,PDO::PARAM_INT);
    
    $stmt->execute();

    $result = $stmt->fetch();

    $this->skill = $result['skill'];
    $this->name = $result['name'];

    //echo $this->skill.' '.$this->name.'<br/><br/>' ;
  }
	function makeTeam($name, $skill)
	{
		$this->skill = $skill;
		$this->name = $name;
	}
	
}

?>