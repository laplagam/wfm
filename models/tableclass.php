<?php

class TableClass
{
  var $pdo;
  function __construct(PdoConnection $pdo)
  {

  }

  function getTableData($gameid=6)
  {
    $dbh = $this->pdo->getPdoCon();    
    $query = 'SELECT leagueid,teamid, teamname, matchesplayed, goalsfor, 
      goalsagainst, victory, draw, loss, points, season, userid, gameid 
      FROM tblusertable 
      WHERE gameid=:gameid';

    $stmt = $dbh->prepare($query);
    $stmt->bindParam(':gameid',$gameid,PDO::PARAM_INT);
    
    $stmt->execute();

    $result = $stmt->fetchAll();

    return $result;
  }
}

?>