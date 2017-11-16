<?php

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
    //Let's make the table that displays the details.$_COOKIE
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
          <input type="text" id="leagueid" name="leagueid" value="'.$this->game->leagueid.'"/>           
        </td>
        <td><input type="text" id="clubid" name="clubid" value="'.$this->game->clubid.'"/></td>
        <td><input type="text" id="gamename" name="gamename" value="'.$this->game->gamename.'"/></td>
        <td><input type="button" class="btn-primary" onClick="submitForm()" value="Create game"/></td>
      </tr>      
      </tbody>     
      </table>
      </div>
      </form>
    ';

    return $htmlout;
  }  
}

?>