<?php

class GameClass
{
  //TODO: Create log file to store everytime an exception happens
  var $pdo;

  var $leagueid=0;  
  var $clubid=0;
  var $gamename='';
  var $userid='';
  var $gameid = 0;
  
  
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

    //Check if we need to save the game. 
    if(isset($_POST['createthegame']) && $_POST['createthegame'] == 1)
    {
      $this->createGame();
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

    //Let's load all football clubs to save game
    $query = 'INSERT INTO tbluserclub(id,`name`,skill,countryid,leaguelevel,leagueid,isplayer,userid,gameid) 
      SELECT id,`name`,skill,countryid,leaguelevel,leagueid,isplayer,:userid,:gameid FROM tblclub ';

    $stmt = $dbh->prepare($query);
    $stmt->bindParam(':userid',$this->userid,PDO::PARAM_INT);
    $stmt->bindParam(':gameid',$this->gameid,PDO::PARAM_INT);

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
    //Clubs in selected league added to the savegame. 
    
  }
  function loadGame($gameid)
  {
    
  }
}

?>