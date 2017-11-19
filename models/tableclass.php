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

  function updateTableFromMatch($teamid,$points,$goalsfor,$goalsagainst,$gameid)
  {
    $dbh = $this->pdo->getPdoCon();    
    $query = 'UPDATE tblusertable SET matchesplayed = (matchesplayed+1), goalsfor=(goalsfor+:goalsfor), goalsagainst=(goalsagainst+:goalsagainst), 
      victory = (victory+:victory), draw = (draw+:draw), loss =  (loss+:loss), points =  (points+:points)      
      WHERE teamid = :teamid and gameid = :gameid ORDER BY points DESC';

    $stmt = $dbh->prepare($query);
    $stmt->bindParam(':gameid',$teamid,PDO::PARAM_INT);
    $stmt->bindParam(':points',$points,PDO::PARAM_INT);
    $stmt->bindParam(':goalsfor',$goalsfor,PDO::PARAM_INT);    
    $stmt->bindParam(':goalsagainst',$goalsagainst,PDO::PARAM_INT);
    $stmt->bindParam(':victory',$victory,PDO::PARAM_INT);
    $stmt->bindParam(':teamid',$teamid,PDO::PARAM_INT);
    $stmt->bindParam(':loss',$loss,PDO::PARAM_INT);
    $stmt->bindParam(':draw',$draw,PDO::PARAM_INT);
    
    $stmt->execute();
  }
}

?>