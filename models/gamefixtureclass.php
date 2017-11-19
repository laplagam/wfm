<?php

class GameFixtureClass
{
  var $pdo;
  var $matchlist;
  
  function __construct(PdoConnection $pdo)
  {
    $this->pdo = $pdo;
  }

  function upcommingMatches($gameid,$gameweek)
  {
    $dbh = $this->pdo->getPdoCon();
    $dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

    $query = 'SELECT id, leagueid, gameweek, hometeamid, hometeamname, awayteamid, awayteamname, gameid FROM tbluserfixtures 
      WHERE gameid = :gameid and gameweek = :gameweek
      ';

    $stmt = $dbh->prepare($query);  

    $stmt->bindParam(':gameid',$gameid,PDO::PARAM_INT);
    $stmt->bindParam(':gameweek',$gameweek,PDO::PARAM_INT);

    $stmt->execute();

    $this->matchlist = $stmt->fetchAll();
  }
}
?>