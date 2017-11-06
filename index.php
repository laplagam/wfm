<?php

ini_set('display_errors','1');

require_once('matchclass.php');
require_once('clubclass.php');
require_once('views/viewmain.php');

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

//Let's display the match result log. 
$match->printResult();

//Let's add the footer to the site
echo $mainview->makeFooterView();
?>