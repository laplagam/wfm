<?php

class vMatchView
{
  function __construct()
  {

  }

  function makeMatchTable(MatchClass $match)
  {
    //Let's make the table that displays the details.$_COOKIE
    $htmlout = '<br/><br/>
      <table id="table_id" class="display table table-hover table-border">		
      <thead>
      <tr style="background-color:black;color:white;">
      <th>'.$match->hometeamobj->name.'</th>
      <th> - </th>
      <th>'.$match->awayteamobj->name.'</th>

      <!--
      <th >White label</th>
      <th >Web address</th>
      <th >Access key</th>
      <th >Language</th>
      <th >Registered date</th>
      <th >Last login</th>
      <th class="thebuttons"></th>
      -->
      
      </tr></thead>
      <tbody>';
      $htmlout .= '<tr>';

      foreach($match->matchlog as $key => $value)
      {
        if($value !=='')
        {
          if($value['teamthatscored'] == 'hometeam')
          {
            $htmlout .=  '<tr><td>'.$value['happening'].'</td><td></td><td></td></tr>';
          }
          else
          {
            $htmlout .=  '<tr><td></td><td></td><td>'.$value['happening'].'</td></tr>';
          }
          
        }
      }
      
      $htmlout .='</td></tr>      
      </tbody>
      <tfoot>        
        <tr style="background-color:#f1f1f1;font-weight:bold;">
          <td>'.$match->hometeamgoals.'</td>
          <td> - </td>
          <td>'.$match->awayteamgoals.'</td>
        </tr>
      </tfoot>
      </table>
    ';

    return $htmlout;
  }

  function getMatchViewLayout(MatchClass $match)
  {
    $htmlout = '<input type="button" onclick="viewMatch()" value="Show match"/><br/><br/>
    <br/><br/>
    <div id="matchtimer" class="matchtimer"></div><br/><br/>
    <table id="table_id" class="display table table-hover table-border">		
    <thead>
    <tr style="background-color:black;color:white;">
      <th style="width:40%;">'.$match->hometeamobj->name.'</th>
      <th style="width:5%;" id="hometeamgoals">0</th>
      <th style="width:10%;"> - </th>
      <th style="width:5%;" id="awayteamgoals">0</th>
      <th style="width:40%;">'.$match->awayteamobj->name.'</th>
    </tr>
    </thead>
    <tbody>
    <tr>
      <td id="hometeamlog"></td>
      <td></td>
      <td></td>
      <td></td>
      <td id="awayteamlog"></td>
    </tr>
    </tbody>
    </table>
     ';
     return $htmlout;
     ;
  }

  

  function loadMatchFromJson($jsoncontent)
  {
    $htmlout = '<script type="text/javascript">
    function viewMatch()
    {
      var matchjson = '.$jsoncontent.';
      var counter = 0;
      var hometeamgoals = 0;
      var awayteamgoals = 0;
      document.getElementById("hometeamgoals").innerHTML = 0;
      document.getElementById("awayteamgoals").innerHTML = 0;
      document.getElementById("hometeamlog").innerHTML = "";
      document.getElementById("awayteamlog").innerHTML = "";
      runMatch(matchjson,counter,hometeamgoals,awayteamgoals);      
    }

    function runMatch(element,counter,hometeamgoals,awayteamgoals)
    {

      counter++;
      
      if(typeof element[counter] !== "undefined")
      {
        if(typeof element[counter]["happening"] !== "undefined")
        {
          if(element[counter]["teamthatscored"] == "hometeam")
          {
            document.getElementById("hometeamlog").innerHTML += element[counter]["happening"]+"<br/>";
            hometeamgoals++;
            document.getElementById("hometeamgoals").innerHTML = hometeamgoals.toString();
          }
          else
          {
            document.getElementById("awayteamlog").innerHTML += element[counter]["happening"]+"<br/>";
            awayteamgoals++;
            document.getElementById("awayteamgoals").innerHTML = awayteamgoals.toString();
          }
        }
        document.getElementById("matchtimer").innerHTML = counter.toString();
      setTimeout(function() {
        runMatch(element,counter,hometeamgoals,awayteamgoals);
        }, 200);
      }
      
    }

    </script>';
    return $htmlout;
  }
}

?>