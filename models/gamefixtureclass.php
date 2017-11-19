<?php

class GameFixtureClass
{
  var $pdo;
  var $matchlist;
  var $gameweek;
  var $season;
  var $gameid;
  
  function __construct(PdoConnection $pdo)
  {
    $this->pdo = $pdo;
  }

  function upcommingMatches($gameid,$gameweek,$season)
  {
    $this->gameid = $gameid;
    $this->gameweek = $gameweek;
    $this->season = $season;

    $dbh = $this->pdo->getPdoCon();
    $dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

    $query = 'SELECT id, leagueid, gameweek, hometeamid, hometeamname, awayteamid, awayteamname, gameid FROM tbluserfixtures 
      WHERE gameid = :gameid and gameweek = :gameweek and season=:season
      ';

    $stmt = $dbh->prepare($query);  

    $stmt->bindParam(':gameid',$gameid,PDO::PARAM_INT);
    $stmt->bindParam(':gameweek',$gameweek,PDO::PARAM_INT);
    $stmt->bindParam(':season',$season,PDO::PARAM_INT);

    $stmt->execute();

    $this->matchlist = $stmt->fetchAll();
  }
  function completeGameweek()
  {
    

  }
}
?>