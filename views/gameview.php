<?php

class vGameView
{
  var $game;
  var $leagueid=0;  
  var $clubid=0;
  var $gamename='';
  var $errormessage;
  function __construct(GameClass $game)
  {
    $this->game = $game;

    if(isset($_POST['leagueid']) && is_numeric($_POST['leagueid']))
    {
      $this->leagueid = $_POST['leagueid'];
    }
    if(isset($_POST['clubid']) && is_numeric($_POST['clubid']))
    {
      $this->clubid = $_POST['clubid'];
    }
    if(isset($_POST['gamename']))
    {
      $this->gamename = $_POST['gamename'];
    } 
  }

  function gameHasBeenCreated()
  {
    $htmlout = 'Game was successfully created';
  }

  //TODO: Make selection boxes loaded from database. Make functionality in Model class. 
  //Make userid run based on logged in user. 
  function createGameView()
  {
    //Let's make the table that displays the details.$_COOKIE
    $htmlout = '<br/><br/><form action="index.php?page=creategame">
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
          <input type="hidden" name="userid" id="userid" value="1"/>
          <input type="hidden" name="createthegame" id="createthegame" value="0"/>
          <input type="text" id="leagueid" name="leagueid" value="2"/>           
        </td>
        <td><input type="text" id="clubid" name="clubid" value="54"/></td>
        <td><input type="text" id="gamename" name="gamename" value="Lars Chelsea"/></td>
        <td><input type="button" class="btn-primary" value="Create game"/></td>
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