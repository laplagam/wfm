<?php

ini_set('display_errors','1');
//header('Content-Type: text/html; charset=UTF-8');


require_once('models/clubclass.php');
//require_once('models/fixtureclass.php');
require_once('models/sqlconnclass.php');
require_once('views/mainview.php');


$pdo = new PdoConnection();
//Let's create the main view. 
$mainview = new vMainView();
//Setting up header and top menu. 

//Don't mix game with match. Game clease is to create/load or delete a user created game. 
if(!empty($_GET['page']) &&  $_GET['page'] == 'creategame')
{  
  require_once('models/gameclass.php');
  require_once('views/gameview.php');

  $game =  new GameClass($pdo);
  $gameview = new vGameView($game);
  
  $mainview->applyToHeader($game->createGameJavascriptCode());  
  $mainview->makeHeaderView();
  $mainview->createBootstrapTopMenu();
  $mainview->addHtmlContent($gameview->CreateGameView());
  
  
  $mainview->makeFooterView();  
  echo $mainview->htmlout;
  //echo 'test';
  //exit();
}
else if(!empty($_GET['page']) &&  $_GET['page'] == 'playmatch')
{
  require_once('models/gamefixtureclass.php');
  require_once('views/gamefixtureview.php');
  require_once('models/matchclass.php');
  require_once('views/matchview.php');

  $mainview->makeHeaderView();
  $mainview->createBootstrapTopMenu();

  $gamefixture = new GameFixtureClass($pdo);
  $gamefixture->upcommingMatches(6,1);//TODO: Connect to user and game loaded. 

  $gamefixture->matchlist;
  $counter = 0;

  //Run and update all matches. 
  foreach($gamefixture->matchlist as $row)
  {
    $match[$counter] = new MatchClass($pdo,new ClubClass($pdo));
    $match[$counter]->loadMatchFromId($row['id']);
    $match[$counter]->runMatch();
    $match[$counter]->updateMatchToDb();

    //Check if the game is for your team. If so, load json to be able to watch the match. 
    if($row['hometeamid'] == 54 || $row['awayteamid'] == 54)
    {
      $matchview = new vMatchView($match[$counter]);
      //Add match to main view
      $mainview->addHtmlContent($matchview->getMatchViewLayout());
      $mainview->addHtmlContent($match[$counter]->makeMatchJs());
    }

    $counter++;
  }

  //$mainview->addHtmlContent('<br/>Rows: '.count($gamefixture->matchlist));

  //$vGameFixture = new vGameFixture($gamefixture);
  //$mainview->addHtmlContent($vGameFixture->showFixtures());//Add gameid parameter when going live. 

  /*$matcharray;

  
  //Let's create a match. 
  $match->loadMatchFromId(309);
  //Let's run the match. 
  $match->runMatch();
  $match->updateMatchToDb();*/
 /* $matchview = new vMatchView($match);
  //Add match to main view
  $mainview->addHtmlContent($matchview->getMatchViewLayout());
  $mainview->addHtmlContent($match->makeMatchJs());*/
  //$mainview->addHtmlContent('Error message: '.$match->errormessage.' '.$match->errorcount);
  //Let's add the footer to the site
  
}
else if(!empty($_GET['page']) &&  $_GET['page'] == 'table')
{
  require_once('models/tableclass.php');
  require_once('views/tableview.php');

  $mainview->makeHeaderView();
  $mainview->createBootstrapTopMenu();
  $table = new TableClass($pdo);
  $table->getTableData();//Add gameid parameter when going live. 

  $tableview = new vTableView($table);
  $mainview->addHtmlContent($tableview->showTable());//Add gameid parameter when going live. 

  //$match = new MatchClass($pdo,new ClubClass($pdo));
  //Let's create a match. 
  //$match->loadMatchFromId(309);
  //Let's run the match. 
  //$match->runMatch();
  //$matchview = new vMatchView($match);
  //Add match to main view
  //$mainview->addHtmlContent($matchview->getMatchViewLayout());
  //$mainview->addHtmlContent($match->makeMatchJs());
  //Let's add the footer to the site
 
}
else if(!empty($_GET['page']) &&  $_GET['page'] == 'mainview')
{
  require_once('models/gamefixtureclass.php');
  require_once('views/gamefixtureview.php');

  $mainview->makeHeaderView();
  $mainview->createBootstrapTopMenu();
  $gamefixture = new GameFixtureClass($pdo);
  $gamefixture->upcommingMatches(6,1);
  $vGameFixture = new vGameFixture($gamefixture);
  $mainview->addHtmlContent($vGameFixture->showFixtures());//Add gameid parameter when going live. 
  

  

  //$match = new MatchClass($pdo,new ClubClass($pdo));
  //Let's create a match. 
  //$match->loadMatchFromId(309);
  //Let's run the match. 
  //$match->runMatch();
  //$matchview = new vMatchView($match);
  //Add match to main view
  //$mainview->addHtmlContent($matchview->getMatchViewLayout());
  //$mainview->addHtmlContent($match->makeMatchJs());
  //Let's add the footer to the site
  
}



$mainview->makeFooterView();
echo $mainview->htmlout;
?>