<?php

/* View for game creations. Do not mixup with Match which is for viewing football matches. */

class vGameView
{
  var $game;  
  var $errormessage;
  function __construct(GameClass $game)
  {
    $this->game = $game;    
  }

  function gameHasBeenCreated()
  {
    $htmlout ='';
    if($this->game->errorcount > 0)
    {
      $htmlout .= $this->game->errormessage;
      $htmlout .= 'Number of errors: '.$this->game->errorcount.'<br/>';      
    }
    else
    {
      $htmlout .= 'Game was successfully created. <input type="button" class="btn-primary" value="Go to game"/> ';
    }
    
    return $htmlout;
  }

  //TODO: Make selection boxes loaded from database. Make functionality in Model class. 
  //Make userid run based on logged in user. 
  function createGameView()
  {
    if(isset($_POST['createthegame']) && $_POST['createthegame'] == 1)
    {
      return $this->gameHasBeenCreated();
    }

    if(isset($_POST['leagueid'] )&& is_numeric($_POST['leagueid']))
    {
      $leagueid = $_POST['leagueid'];
    }
    else{
      $leagueid = 1;
    }

    //Let's make the table that displays the details.
    $htmlout = '<br/><br/><form method="POST" name="submitGameForm" id="submitGameForm" action="index.php?page=creategame">
    <div class="table-responsive">
      <table id="table_id" class="display table table-hover table-bordered table-striped">		
      <thead>
      <tr class="theader1">
        <th>Select a league</th>
        <th>Select a club</th>
        <th>Insert the name of your game</th>
        <th></th>
      </tr></thead>
      <tbody>
      <tr>
        <td>
          <input type="hidden" name="userid" id="userid" value="'.$this->game->userid.'"/>
          <input type="hidden" name="createthegame" id="createthegame" value="0"/>
          '.$this->createLeagueSelect($this->game->getLeagueList()).'
        </td>
        <td>'.$this->createTeamSelect($this->game->getTeamList($leagueid)).'</td>
        <td><input type="text" id="gamename" name="gamename" value="'.$this->game->gamename.'"/></td>
        <td><input type="button" class="btn-primary" onClick="submitForm(1)" value="Create game"/></td>
      </tr>      
      </tbody>     
      </table>
      </div>
      </form>
    ';

    return $htmlout;
  } 
  
  function createTeamSelect($teamlist)
  {
    $htmlout = '<select name="teamid" id="teamid" >';
    foreach($teamlist as $row)
    {     
      $htmlout .= '<option value="'.$row['id'].'" >'.utf8_encode($row['name']).'</option>';      
    }
    $htmlout .='</select>';

    return $htmlout;  
  }



  function createLeagueSelect($leaguelist)
  {
    $htmlout = '<select name="leagueid" id="leagueid" onChange="submitForm(0)">';
    foreach($leaguelist as $row)
    {
      if(isset($_POST['leagueid']) && $_POST['leagueid'] == $row['id'])
      {
        $htmlout .= '<option value="'.$row['id'].'" selected="selected">'.$row['name'].'</option>';
      }
      else
      {
        $htmlout .= '<option value="'.$row['id'].'" >'.$row['name'].'</option>';
      }
      
    }
    $htmlout .='</select>';

    return $htmlout;    
  }

  function loadGameView($gamelist)
  {
    //Let's make the table that displays the details.
    $htmlout = '<br/><br/><form method="POST" name="loadForm" id="loadForm" action="index.php?page=loadgame">
    <div class="table-responsive">
      <table id="table_id" class="display table table-hover table-bordered table-striped">		
      <thead>
      <tr class="theader1">
        <th>Game</th>
        <th>Gameweek</th>        
        <th></th>
      </tr></thead>
      <tbody>
      <input type="hidden" id="gameid" name="gameid" value=""/>      
      <input type="hidden" id="isposted" name="isposted" value=""/>
      ';

      foreach($gamelist as $row)
      {
        $htmlout .='<tr>
        <td>'.$row['gamename'].'</td>
        <td>'.$row['gameweek'].'</td>
        <td><input type="button" class="btn-primary" onClick="loadGameForm('.$row['id'].')" value="Load game"/></td>        
        </tr>      ';
      }     
      $htmlout .='</tbody>     
      </table>
      </div>      
      </form>
    ';

    return $htmlout;
  }
}

?>