<?php 

class vGameFixture
{
  var $gamefixture;
  function __construct(GameFixtureClass $gamefixture)
  {
    $this->gamefixture = $gamefixture;
  }

  function showFixtures()
  {
    $htmlout = '<form name="mainpageform" method="POST" action="index.php?page=playmatch"> <br/><br/>
    <table id="table_id" class="display table table-hover table-border table-striped">		
    <thead  class="theader1">
    <tr>
    <th>Gameweek</th>
    <th>Hometeam</th>
    <th>Awayteam</th> 
    </tr>
    </thead><tbody>';
    
    $data = $this->gamefixture->matchlist;
    //$position = 1;//We count from start to finnish. 
    foreach($data as $row)
    {
      $htmlout .= '      
      <tr>        
        <td>'.$row['gameweek'].'</td>
        <td>'.$row['hometeamname'].'</td>
        <td>'.$row['awayteamname'].'</td>
      </tr>';
      //$position++;
    }
    
    $htmlout .= '</tbody>
    </table><br/><input type="submit" class="btn-primary" value="Play match"></form>';

    return $htmlout;

  }
}
?>