<?php

ini_set('display_errors','1');
//header('Content-Type: text/html; charset=UTF-8');

require_once('models/matchclass.php');
require_once('models/clubclass.php');
require_once('models/fixtureclass.php');
require_once('models/gameclass.php');
require_once('models/sqlconnclass.php');
require_once('views/mainview.php');
require_once('views/matchview.php');
require_once('views/gameview.php');

$pdo = new PdoConnection();

//$fixtures = new mFixtureClass($pdo);
//$fixtures->makeFixtures('premierleaguefixtures.csv',2);
//$fixtures->makeFixtures($pdo);
//echo '<br/><br/>';
//$fixtures->showFixtures();
//exit('Ending script here while testing fixture generation. ');

//Let's create Chelsea
//$chelsea = new ClubClass($pdo);
//$chelsea->getTeamFromId(54);

//$chelsea->makeTeam('Chelsea FC',200);

//Let's create Newcastle
//$liverpool = new ClubClass($pdo);
//$liverpool->getTeamFromId(57);
//$newcastle->makeTeam('Newcastle FC',180);

//Let's create the main view. 
$mainview = new vMainView();
//Setting up header and top menu. 



//Don't mix game with match. Game clease is to create/load or delete a user created game. 
if(!empty($_GET['page']) &&  $_GET['page'] == 'creategame')
{
  
  $game =  new GameClass($pdo);
  $gameview = new vGameView($game);
  
  $mainview->applyToHeader($game->createGameJavascriptCode());  
  $mainview->makeHeaderView();
  $mainview->createBootstrapTopMenu();
  $mainview->addHtmlContent($gameview->CreateGameView());

  $mainview->makeFooterView();  
  echo $mainview->htmlout;
  //echo 'test';
  exit();
}

$mainview->makeHeaderView();
$mainview->createBootstrapTopMenu();

//Let's create a match. 
$match = new MatchClass($pdo,new ClubClass($pdo));

//Load Chelsea and Newcastle as opponents. 
//$match->loadTeams($chelsea,$liverpool);
$match->loadMatchFromId(309);

//Let's run the match. 
$match->runMatch();

$matchview = new vMatchView($match);

//Add match to main view
$mainview->addHtmlContent($matchview->getMatchViewLayout());
$mainview->addHtmlContent($match->makeMatchJs());

//Let's add the footer to the site
$mainview->makeFooterView();

echo $mainview->htmlout;
?>