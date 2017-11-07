<?php

class mFixtureClass
{
  var $fixture;
  var $allteamsarray = array(1=>'IK Start',2=>'Rosenborg',3=>'Brann', 
    4=>'Molde', 5=>'Odd', 5=>'Bodø Glimt',7=>'Sogndal',8=>'Tromsø',
    9=>'Lillestrøm',10=>'Kristiansund BK',11=>'Sandefjord',12=>'Vålerenga',
    13=>'Stabæk',14=>'FK Haugesund',15=>'Strømsgodset',16=>'Sarpsborg 08');

  function __construct()
  {
  
  }

  function makeFixtures()
  {
    //This functionality has limitation based on how many teams are added. 
    //First logic requires the amount of teams to be possible to subtract with 4.
    
    //First we split into 2 sectors. This when placed on each side will form the first fixture. 
    //$fixture;
    $gameweek = 1;
    $match = 1;
    $homeoraway = 1;

    //Loop through all teams
    foreach($this->allteamsarray as $key=>$value)
    {
      if($homeoraway == 1)
      {
        $this->fixture[$gameweek][$match][$homeoraway]
        $homeoraway++;
      }
      else
      {
        $this->fixture[$gameweek][$match][$homeoraway]
        $homeoraway--;
        $match++;
      }
      
    }


  }
  //Function used to see progress of the fixture generation. Test function. 
  function showFixtures()
  {
    var_dump($this->fixture);
  }

    //Making algorithm 
 
  /*
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
*/
    
  
  
}

?>