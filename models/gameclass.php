<?php

class GameClass
{
  //TODO: Create log file to store everytime an exception happens
  var $pdo;
  var $errormessage='';
  var $errorcount = 0;
  function __construct(PdoConnection $pdo)
  {
    $this->pdo = $pdo;
  }

  function createGameJavascriptCode()
  {
    $htmlout = '
    <script type="text/javascript">
    function submitGameForm()
    {
      document.getElementById("createthegame").value = 1;
      document.getElementById("submitGameForm").submit();
    }
    </script>
    ';
    return $htmlout;
  }

  function createGame($userid,$leagueid,$clubid,$gamename)
  {
    $dbh = $this->pdo;
    $query = 'INSERT INTO tblusergame(userid,leagueid,clubid,gamename) VALUES (:userid,:leagueid,:clubid,:gamename)';
    $stmt = $dbh->prepare($query);

    $stmt->bindParam(':userid',$userid,PDO::PARAM_INT);
    $stmt->bindParam(':leagueid',$leagueid,PDO::PARAM_INT);
    $stmt->bindParam(':clubid',$clubid,PDO::PARAM_INT);
    $stmt->bindParam(':gamename',$gamename,PDO::PARAM_STR);

    try
    {
      $stmt->execute();
    }
    catch(Exception $e)
    {
      $this->errormessage = $e->getMessage();
      $this->errorcount++;
      echo 'Failed to create a new game. ';
    }


    
  }
  function loadGame($gameid)
  {
    
  }
}

?>