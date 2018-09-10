<?php

ini_set('display_errors','1');
//header('Content-Type: text/html; charset=UTF-8');

session_start();

require_once('models/clubclass.php');
//require_once('models/fixtureclass.php');
require_once('models/sqlconnclass.php');
require_once('views/mainview.php');

//echo 'test';

$pdo = new PdoConnection();
//Let's create the main view. 
$mainview = new vMainView();
//Setting up header and top menu. 

//Don't mix game with match. Game clease is to create/load or delete a user created game. 
if(!empty($_GET['page']) &&  $_GET['page'] == 'loadgame')
{  
  require_once('models/gameclass.php');
  require_once('models/gamefixtureclass.php');
  require_once('views/gameview.php');

  $game =  new GameClass($pdo);  
  $gameview = new vGameView($game);
  $gamefixture = new GameFixtureClass($pdo);
  
  $mainview->applyToHeader($game->loadGameJavascriptCode());  
  $mainview->makeHeaderView();
  $mainview->createBootstrapTopMenu();

  if(isset($_POST['isposted']))
  {
    //TODO: Make the load game that sets the game details.
    $returnval = $game->loadGame();
    //Test to verify data loaded in game cobject.
    $mainview->addHtmlContent($game->gameid.' '.$game->gameid.' '.$game->gameid.'<br/>');

    if($returnval == 0)
    {
      $mainview->addHtmlContent($login->errormessage);
    }
    else
    {
      $mainview->addHtmlContent('<br/><br/>Game has been loaded<br/>');
    }
  }

  $gamelist = $game->getUserGames();
  
  $mainview->addHtmlContent($gameview->loadGameView($gamelist)); 

  

  /*if(isset($_POST))
  {
    var_dump($_POST);
  }
  */
  $mainview->makeFooterView();  

}
else if(!empty($_GET['page']) &&  $_GET['page'] == 'creategame')
{  
  require_once('models/gameclass.php');
  require_once('views/gameview.php');

  $game =  new GameClass($pdo);  
  $gameview = new vGameView($game);
  
  $mainview->applyToHeader($game->createGameJavascriptCode());  
  $mainview->makeHeaderView();
  $mainview->createBootstrapTopMenu();

  $gamelist = $game->getUserGames();
  
  //$mainview->addHtmlContent($gameview->loadGameView($gamelist)); 
  $mainview->addHtmlContent($gameview->CreateGameView()); 

  /*if(isset($_POST))
  {
    var_dump($_POST);
  }
  */
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
  //Show game details.
  //$mainview->addHtmlContent($game->gameid.' '.$game->gameweek.' '.$game->season.'<br/>');

  //$mainview->addHtmlContent($game->gameid.' - '.$game->gameweek.' - '.$game->season.'<br/>');
  //$mainview->addHtmlContent($_SESSION['gameid'].' - '.$_SESSION['gameweek'].' - '.$_SESSION['season']);

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
  
}
else if(!empty($_GET['page']) &&  $_GET['page'] == 'signup')
{
  require_once('models/loginclass.php');
  require_once('views/loginview.php');

  $mainview->makeHeaderView();
  $mainview->createBootstrapTopMenu();

  $login = new LoginClass($pdo);
  $vsignup = new vLoginView();  
  $mainview->addHtmlContent($login->createSignUpJavascriptCode());

  if(isset($_POST['isposted']))
  {
    $returnval = $login->registerUser();
    if($returnval == 0)
    {
      $mainview->addHtmlContent($login->errormessage);
    }
    else
    {
      $mainview->addHtmlContent('<br/><br/>Thank you for signing up!<br/>');
    }
  }
  //$mainview->addHtmlContent($login->createSignUpJavascriptCode());
  $mainview->addHtmlContent($vsignup->showRegisterForm());
}
else if(!empty($_GET['page']) &&  $_GET['page'] == 'login')
{
  require_once('models/loginclass.php');
  require_once('views/loginview.php');

  $mainview->makeHeaderView();
  $mainview->createBootstrapTopMenu();

  $login = new LoginClass($pdo);
  $vsignup = new vLoginView();  
  //$mainview->addHtmlContent($login->createSignUpJavascriptCode());

  if(isset($_POST['isposted']))
  {
    $returnval = $login->checklogin();

    //TODO: Send to page where you can create game or load game. 

    //var_dump($returnval);
    //$mainview->addHtmlContent($returnval);
    /*
    if($returnval == 0)
    {
      $mainview->addHtmlContent($login->errormessage);
    }
    else
    {
      $mainview->addHtmlContent('<br/><br/>Thank you for signing up!<br/>');
    }*/
  }
  //$mainview->addHtmlContent($login->createSignUpJavascriptCode());
  $mainview->addHtmlContent($vsignup->showLoginForm());
}



$mainview->makeFooterView();
echo $mainview->htmlout;
?>