<?php
/* This class contains the details of any football club. **/
class ClubClass
{
  var $pdo;
	var $skill = 0;
  var $name = 'IK Start';
  var $id = 0;
  
  function __construct(PdoConnection $pdo)
  {
    $this->pdo = $pdo;
  }
  function getTeamFromId($teamid)
  {
    $dbh = $this->pdo->getPdoCon();

    $query = 'SELECT id,skill,`name` FROM tblclub WHERE id = :id';

    $stmt = $dbh->prepare($query);

    $stmt->bindParam(':id',$teamid,PDO::PARAM_INT);
    
    $stmt->execute();

    $result = $stmt->fetch();

    $this->skill = $result['skill'];
    $this->name = $result['name'];
    $this->id = $result['id'];

    //echo $this->skill.' '.$this->name.'<br/><br/>' ;
  }
	function makeTeam($name, $skill)
	{
		$this->skill = $skill;
		$this->name = $name;
	}
	
}

?>