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

$fixtures = new mFixtureClass();

$fixtures->makeFixtures($pdo);
echo '<br/><br/>';
//$fixtures->showFixtures();
exit('Ending script here while testing fixture generation. ');


$matchview = new vMatchView();

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

//Let's create the main view. 
$mainview = new vMainView();

//Let's add the header to the site
echo $mainview->makeHeaderView();
//Let's create the bootstrap top menu. 
echo $mainview->createBootstrapTopMenu();

//For testing, let's show the generated  fiztures and see how it looks. 
$fixtures->generateFixtures(2);

//Let's display the match result log. 
echo $matchview->makeMatchTable($match);

//$match->printResult();

//Let's add the footer to the site
echo $mainview->makeFooterView();
?>