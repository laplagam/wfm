<?php

ini_set('display_errors','1');
//header('Content-Type: text/html; charset=UTF-8');
require_once('models/matchclass.php');
require_once('models/clubclass.php');
require_once('models/fixtureclass.php');
require_once('models/sqlconnclass.php');
require_once('views/viewmain.php');
require_once('views/matchview.php');

$pdo = new PdoConnection();

//$fixtures = new mFixtureClass($pdo);
//$fixtures->makeFixtures('premierleaguefixtures.csv',2);
//$fixtures->makeFixtures($pdo);
//echo '<br/><br/>';
//$fixtures->showFixtures();
//exit('Ending script here while testing fixture generation. ');

//Let's create Chelsea
$chelsea = new ClubClass();
$chelsea->makeTeam('Chelsea FC',200);

//Let's create Newcastle
$newcastle = new ClubClass();
$newcastle->makeTeam('Newcastle FC',180);

//Let's create a match. 
$match = new MatchClass();


//Load Chelsea and Newcastle as opponents. 
$match->loadTeams($chelsea,$newcastle);

//Let's run the match. 
$match->runMatch();

$matchview = new vMatchView($match);

//exit('end test');

//Let's create the main view. 
$mainview = new vMainView();

//Setting up header and top menu. 
$mainview->makeHeaderView();
$mainview->createBootstrapTopMenu();

//Add match to main view
$mainview->addHtmlContent($matchview->getMatchViewLayout());
$mainview->addHtmlContent($match->makeMatchJs());

//Let's add the footer to the site
$mainview->makeFooterView();

echo $mainview->htmlout;
?>