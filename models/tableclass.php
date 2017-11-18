<?php

class TableClass
{
  var $pdo;
  var $tablestandingsdata;
  function __construct(PdoConnection $pdo)
  {
    $this->pdo = $pdo;
  }

  function getTableData($gameid=6)
  {
    $dbh = $this->pdo->getPdoCon();    
    $query = 'SELECT leagueid,teamid, teamname, matchesplayed, goalsfor, 
      goalsagainst, victory, draw, loss, points, season, userid, gameid 
      FROM tblusertable 
      WHERE gameid=:gameid ORDER BY points DESC';

    $stmt = $dbh->prepare($query);
    $stmt->bindParam(':gameid',$gameid,PDO::PARAM_INT);
    
    $stmt->execute();

    //TODO: Add try/catch
    $this->tablestandingsdata = $stmt->fetchAll();

    //return $result;
  }
}

?>