<?php

ini_set('display_errors','1');
//header('Content-Type: text/html; charset=UTF-8');

session_start();

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
  //echo $mainview->htmlout;
  //echo 'test';
  //exit();
}
else if(!empty($_GET['page']) &&  $_GET['page'] == 'playmatch')
{
  //Run fixtures
  require_once('models/gameclass.php');
  require_once('views/gameview.php');
  require_once('models/gamefixtureclass.php');
  require_once('views/gamefixtureview.php');
  require_once('models/matchclass.php');
  require_once('views/matchview.php');
  require_once('models/tableclass.php');
  require_once('views/tableview.php');

  $mainview->makeHeaderView();
  $mainview->createBootstrapTopMenu();

  //$mainview->addHtmlContent('Test');
  
  $table = new TableClass($pdo);
  $game =  new GameClass($pdo);
  $game->loadGame();

  $gamefixture = new GameFixtureClass($pdo);
  $gamefixture->upcommingMatches($game->gameid,$game->gameweek,$game->season);//TODO: Connect to user and game loaded. 

  //$mainview->addHtmlContent($game->gameid.' '.$game->gameweek.' '.$game->season);

  //$gamefixture->matchlist;
  $counter = 0;

  //Run and update all matches. 
  foreach($gamefixture->matchlist as $row)
  {
    //echo 'test;';
    $match[$counter] = new MatchClass($pdo,new ClubClass($pdo));
    $match[$counter]->loadMatchFromId($row['id']);
    $match[$counter]->runMatch();
    $match[$counter]->updateMatchToDb($game->gameid);
    //$table->updateTableFromMatch($teamid,$points,$goalsfor,$goalsagainst,$gameid);

    //Check if the game is for your team. If so, load json to be able to watch the match. 
    if($row['hometeamid'] == $game->clubid || $row['awayteamid'] == $game->clubid)
    {
      $matchview = new vMatchView($match[$counter]);
      //Add match to main view
      $mainview->addHtmlContent($matchview->getMatchViewLayout());
      $mainview->addHtmlContent($match[$counter]->makeMatchJs());
    }

    $counter++;
  }

  
  $game->saveGame();/**/

}
else if(!empty($_GET['page']) &&  $_GET['page'] == 'table')
{
  require_once('models/gameclass.php');
  require_once('models/tableclass.php');
  require_once('views/tableview.php');

  $mainview->makeHeaderView();
  $mainview->createBootstrapTopMenu();
  
  $game =  new GameClass($pdo);
  $game->loadGame();

  $table = new TableClass($pdo);
  $table->getTableData($game->gameid);//Add gameid parameter when going live. 

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
  require_once('models/gameclass.php');
  require_once('models/gamefixtureclass.php');
  require_once('views/gamefixtureview.php');
  
  $game =  new GameClass($pdo);
  $game->loadGame();
  //

  $mainview->makeHeaderView();
  $mainview->createBootstrapTopMenu();
  $gamefixture = new GameFixtureClass($pdo);
  $gamefixture->upcommingMatches($game->gameid,$game->gameweek,$game->season);
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