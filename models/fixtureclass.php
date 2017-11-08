<?php

class mFixtureClass
{
  var $fixture;
  var $allteamsarray = array(1=>'IK Start',2=>'Rosenborg',3=>'Brann', 
    4=>'Molde', 5=>'Odd', 6=>'Bodø Glimt',7=>'Sogndal',8=>'Tromsø',
    9=>'Lillestrøm',10=>'Kristiansund BK',11=>'Sandefjord',12=>'Vålerenga',
    13=>'Stabæk',14=>'FK Haugesund',15=>'Strømsgodset',16=>'Sarpsborg 08');

  function __construct()
  {
  
  }

  function makeFixtures()
  {
    $fixtures = fopen("csv/fixtures.csv", "r");

    $counter = 0;

    while(!feof($fixtures))
    {
      $line_of_text = fgetcsv($fixtures, 10240,';');
      //var_dump($line_of_text);
      $counter++;

      echo utf8_encode($line_of_text[0]).' '.utf8_encode($line_of_text[1]).' '.utf8_encode($line_of_text[2]).' '.utf8_encode($line_of_text[3]).'<br/>';
      if($counter == 100)
      {
        exit('done with csv testing. ');
      }

    }
    //This functionality has limitation based on how many teams are added. 
    //First logic requires the amount of teams to be possible to subtract with 4.
    
    //First we split into 2 sectors. This when placed on each side will form the first fixture. 
    //$fixture;

    //Pre-set values. Add as parameters laters for different table generations. 
    /*$gameweek = 1;
    $match = 1;
    $homeoraway = 1;
    $numberofteams = 16;

    

    
    //Loop through all teams
    foreach($this->allteamsarray as $key=>$value)
    {
      //
      $this->fixture[$gameweek][$match][$homeoraway] = $value;
      if($homeoraway == 1)
      {
        //First team, this will be the hometeam        
        $homeoraway++;
      }
      else
      {        
        //Second team, this will be the away team
        $homeoraway--;
        $match++;
        //OK, so first match is set, let's swap
      }      
    }
    
    //First fixture is set. Based on this we now need to generate the remaining matches. 
    while($gameweek<$numberofteams)
    {
      $gameweek++;
    }
    */
    //First fixture successfully generated. Next is to make the remaining gameweeks. 
    //$numberofgameweeks = 

  }

  /*//Check if we have odd numers of teams. We simply don't allow it. Sorry :) 
    if($numberofteams % 2 == 1) 
    {
      exit('Odd number of teams not supported. ');
    }*/

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