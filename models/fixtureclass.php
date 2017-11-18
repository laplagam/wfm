<?php

class mFixtureClass
{
  var $pdo;
  var $fixture;
  var $allteamsarray = array(1=>'IK Start',2=>'Rosenborg',3=>'Brann', 
    4=>'Molde', 5=>'Odd', 6=>'Bodø Glimt',7=>'Sogndal',8=>'Tromsø',
    9=>'Lillestrøm',10=>'Kristiansund BK',11=>'Sandefjord',12=>'Vålerenga',
    13=>'Stabæk',14=>'FK Haugesund',15=>'Strømsgodset',16=>'Sarpsborg 08');

  function __construct(PdoConnection $pdo)
  {
    $this->pdo = $pdo;
  }

  function updateFixtureTeamIdFromName()
  {
    //TODO: Make the queries run to update the database. 
    $query = 'UPDATE tblfixtures f INNER JOIN tblclub c ON f.hometeamname = c.name SET f.hometeamid = c.id ';
    $query = 'UPDATE tblfixtures f INNER JOIN tblclub c ON f.awayteamname = c.name SET f.awayteamid = c.id ';
  }

  function makeFixtures($csvfilename='fixtures.csv',$leagueid=1)
  {
    //This functionality imports fixtures from CSV file and loads it into the database. 

    $fixtures = fopen("csv/".$csvfilename, "r");

    $counter = 0;

    $dbh = $this->pdo->getPdoCon();
    //$dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

    $query = 'INSERT INTO tblfixtures(leagueid,gameweek,hometeamid,hometeamname,awayteamid,awayteamname) 
      VALUES(:leagueid,:gameweek,:hometeamid,:hometeamname,:awayteamid,:awayteamname)';

    $stmt = $dbh->prepare($query);

    

    $stmt->bindParam(':leagueid',$leagueid,PDO::PARAM_INT);
    $stmt->bindParam(':gameweek',$gameweek,PDO::PARAM_INT);
    $stmt->bindParam(':hometeamid',$hometeamid,PDO::PARAM_INT);
    $stmt->bindParam(':hometeamname',$hometeamname,PDO::PARAM_STR);
    $stmt->bindParam(':awayteamid',$awayteamid,PDO::PARAM_INT);
    $stmt->bindParam(':awayteamname',$awayteamname,PDO::PARAM_STR);
    //$stmt->bindParam(':gameweek',$gameweek,PARAM::INT);

    //$leagueid = 1;
    $awayteamid = 0;
    $hometeamid = 0;

    while(!feof($fixtures))
    {
      $line_of_text = fgetcsv($fixtures, 10240,';');
      //var_dump($line_of_text);
      
      $gameweek = $line_of_text[0];
      $hometeamname =$line_of_text[1];
      $awayteamname =$line_of_text[3];

      echo utf8_encode($line_of_text[0]).' '.utf8_encode($line_of_text[1]).' '.utf8_encode($line_of_text[2]).' '.utf8_encode($line_of_text[3]).'<br/>';
      /*if($counter == 20)
      {
        exit('done with csv testing. ');
      }*/
      if($counter!= 0)
      {
        $stmt->execute();
      }
      $counter++;
      
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

  //Function used to see progress of the fixture generation. Test function. 
  function showFixtures()
  {
    var_dump($this->fixture);
  }
}

?>