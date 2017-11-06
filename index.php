<?php

ini_set('display_errors','1');

require_once('matchclass.php');
require_once('clubclass.php');

$chelsea = new ClubClass();
$chelsea->makeTeam('Chelsea FC',200);

$newcastle = new ClubClass();
$newcastle->makeTeam('Newcastle FC',180);

$match = new MatchClass();

$match->loadTeams($chelsea,$newcastle);
$match->runMatch();
$match->printResult();

?>