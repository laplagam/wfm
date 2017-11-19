<?php

class GameClass
{
  //TODO: Create log file to store everytime an exception happens
  var $pdo;

  var $leagueid=0;  
  var $clubid=0;
  var $gamename='';
  var $userid=0;
  var $gameid = 0;
  var $season= 0;
  var $gameweek = 0;
  
  
  var $errormessage='';
  var $errorcount = 0;
  function __construct(PdoConnection $pdo)
  {
    $this->pdo = $pdo;

    if(isset($_POST['leagueid']) && is_numeric($_POST['leagueid']))
    {
      $this->leagueid = $_POST['leagueid'];
    }
    else
    {
      $this->leagueid = 2;
    }
    if(isset($_POST['clubid']) && is_numeric($_POST['clubid']))
    {
      $this->clubid = $_POST['clubid'];
    }
    else
    {
      $this->clubid = 54;
    }
    if(isset($_POST['gamename']))
    {
      $this->gamename = $_POST['gamename'];
    }
    else
    {
      $this->gamename = 'Lars Chelsea';
    }
    
    if(isset($_POST['userid'])  && is_numeric($_POST['userid']))
    {
      $this->userid = $_POST['userid'];
    }
    else
    {
      $this->userid = 1;
    }
    if(isset($_POST['gameid'])  && is_numeric($_POST['gameid']))
    {
      $this->gameid = $_POST['gameid'];
    }
    else
    {
      $this->gameid = 9;
    }

    //Check if we need to save the game. 
    if(isset($_POST['createthegame']) && $_POST['createthegame'] == 1)
    {
      $this->createGame();
    }

  }

  function saveGame()
  {
    $this->gameweek++;

    $dbh = $this->pdo->getPdoCon();
    $dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    //TODO: Fix when moving on to next season. 
    $query = 'UPDATE tblusergame SET season = :season, gameweek = :gameweek WHERE id = :id
      ';

    $stmt = $dbh->prepare($query);  

    $stmt->bindParam(':id',$this->gameid,PDO::PARAM_INT);
    $stmt->bindParam(':gameweek',$this->gameweek,PDO::PARAM_INT);
    $stmt->bindParam(':season',$this->season,PDO::PARAM_INT);

    $stmt->execute();
  }

  function loadGame()
  {
    
    $dbh = $this->pdo->getPdoCon();
    //$dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $query = 'SELECT id,userid, leagueid, clubid, gamename, season, gameweek FROM tblusergame where id = :id';
    $stmt = $dbh->prepare($query);

    $stmt->bindParam(':id',$this->gameid,PDO::PARAM_INT);

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
      else
      {
        $row = $stmt->fetch();

        //$this->gameid = $gameid;
        $this->clubid = $row['clubid'];
        $this->leagueid = $row['leagueid'];
        $this->gamename = $row['gamename'];
        $this->userid = $row['userid'];
        $this->gameweek = $row['gameweek'];
        $this->season = $row['season'];       
        
      }
    }
    catch(Exception $e)
    {
      
      $this->errormessage .= $e->getMessage();
      $this->errorcount++;
      //echo 'Failed to create a new game. ';
      return 0;
    }
  }

  function createGameJavascriptCode()
  {
    $htmlout = '
    <script type="text/javascript">
    function submitForm()
    {
      document.getElementById("createthegame").value = 1;
      document.getElementById("submitGameForm").submit();
    }
    </script>
    ';
    return $htmlout;
  }

  function createGame()
  {
    $dbh = $this->pdo->getPdoCon();
    //$dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $query = 'INSERT INTO tblusergame(userid,leagueid,clubid,gamename) VALUES (:userid,:leagueid,:clubid,:gamename)';
    $stmt = $dbh->prepare($query);

    $stmt->bindParam(':userid',$this->userid,PDO::PARAM_INT);
    $stmt->bindParam(':leagueid',$this->leagueid,PDO::PARAM_INT);
    $stmt->bindParam(':clubid',$this->clubid,PDO::PARAM_INT);
    $stmt->bindParam(':gamename',$this->gamename,PDO::PARAM_STR);

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
        $this->gameid = $dbh->lastInsertId(); 
      }
    }
    catch(Exception $e)
    {
      
      $this->errormessage .= $e->getMessage();
      $this->errorcount++;
      //echo 'Failed to create a new game. ';
      return 0;
    }
    //User savegame stored. 

    // Let's load all football clubs to the save game
    $query = 'INSERT INTO tbluserclub(id,`name`,skill,countryid,leaguelevel,leagueid,isplayer,userid,gameid) 
      SELECT id,`name`,skill,countryid,leaguelevel,leagueid,isplayer,:userid,:gameid FROM tblclub WHERE leagueid = :leagueid ';

    $stmt = $dbh->prepare($query);
    $stmt->bindParam(':userid',$this->userid,PDO::PARAM_INT);
    $stmt->bindParam(':gameid',$this->gameid,PDO::PARAM_INT);
    $stmt->bindParam(':leagueid',$this->leagueid,PDO::PARAM_INT);

    // try/catch nightmare code to verify whether the insert was successful. 
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
      
    }
    catch(Exception $e)
    {
      
      $this->errormessage .= $e->getMessage();
      $this->errorcount++;
      //echo 'Failed to create a new game. ';
      return 0;
    }
    //Clubs in selected league added to the savegame. 
    //---
    //Loading fixtures to savegame. 

    $query = 'INSERT INTO tbluserfixtures(id,leagueid,gameweek, hometeamid, hometeamname,awayteamid,awayteamname,matchlogjson,hometeamgoals,awayteamgoals,isplayed,userid,gameid) 
    SELECT id,leagueid,gameweek, hometeamid, hometeamname,awayteamid,awayteamname,null,hometeamgoals,awayteamgoals,isplayed,:userid,:gameid FROM tblfixtures WHERE leagueid = :leagueid';

    $stmt = $dbh->prepare($query);

    $stmt->bindParam(':userid',$this->userid,PDO::PARAM_INT);
    $stmt->bindParam(':gameid',$this->gameid,PDO::PARAM_INT);
    $stmt->bindParam(':leagueid',$this->leagueid,PDO::PARAM_INT);

    //try/catch nightmare code to verify whether the insert was successful. 
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
      
    }
    catch(Exception $e)
    {
      
      $this->errormessage .= $e->getMessage();
      $this->errorcount++;
      //echo 'Failed to create a new game. ';
      return 0;
    }

    //Fixures added to the savegame. 
    //---
    //Loading table standings to savegame. 

    $query = 'INSERT INTO tblusertable(leagueid,teamid,teamname,userid,gameid) 
    SELECT leagueid,teamid,teamname,:userid,:gameid FROM tbltable WHERE leagueid = :leagueid';

    $stmt = $dbh->prepare($query);

    $stmt->bindParam(':userid',$this->userid,PDO::PARAM_INT);
    $stmt->bindParam(':gameid',$this->gameid,PDO::PARAM_INT);
    $stmt->bindParam(':leagueid',$this->leagueid,PDO::PARAM_INT);

    //try/catch nightmare code to verify whether the insert was successful. 
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
      
    }
    catch(Exception $e)
    {
      
      $this->errormessage .= $e->getMessage();
      $this->errorcount++;
      //echo 'Failed to create a new game. ';
      return 0;
    }
    //Completed all inserts. 
    //Eh, will make stored procedure for this later. Maybe. Silly to do all this in PHP.
    
  }
}

?>