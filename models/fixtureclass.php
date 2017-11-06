<?php

class mFixtureClass
{
 
  
  function getWeek($home, $away, $num_teams=4) 
  {
    if($home == $away){
        return -1;
    }
    $week = $home+$away-2;
    if($week >= $num_teams){
        $week = $week-$num_teams+1;
    }
    if($home>$away){
        $week += $num_teams-1;
    }
    return $week;
  }

  function generateFixtures($numberofteams=4)
  {
    $teams = $numberofteams;
    $games = array();   //2D array tracking which week teams will be playing
    
    // do the work
    for( $i=1; $i<=$teams; $i++ ) {
        $games[$i] = array();
        for( $j=1; $j<=$teams; $j++ ) {
            $games[$i][$j] = $this->getweek($i, $j, $teams);
        }
    }
    $this->displayFixtures($games,$numberofteams);
  }

  function displayFixtures($games,$teams)
  {
    // display
    echo '<pre>';
    $max=0;
    foreach($games as $row) {
        foreach($row as $col) {
            printf('%4d', is_null($col) ? -2 : $col);
            if( $col > $max ) { $max=$col; }
        }
        echo "\n";
    }
    printf("%d teams in %d weeks, %.2f weeks per team\n", $teams, $max, $max/$teams);
    echo '</pre>';
  }

    
  
  
}

?>