<?php

class vMatchView
{
  var $match;
  function __construct(MatchClass $match)
  {
    $this->match = $match;
  }

  function makeMatchTable()
  {
    //Let's make the table that displays the details.$_COOKIE
    $htmlout = '<br/><br/>
      <table id="table_id" class="display table table-hover table-border">		
      <thead>
      <tr style="background-color:black;color:white;">
      <th>'.$this->match->hometeamobj->name.'</th>
      <th> - </th>
      <th>'.$this->match->awayteamobj->name.'</th>

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

      foreach($this->match->matchlog as $key => $value)
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
          <td>'.$this->match->hometeamgoals.'</td>
          <td> - </td>
          <td>'.$this->match->awayteamgoals.'</td>
        </tr>
      </tfoot>
      </table>
    ';

    return $htmlout;
  }

  function getMatchViewLayout()
  {
    $htmlout = '<input type="button" onclick="viewMatch()" value="Show match"/><br/><br/>
    <br/><br/>
    <div id="matchtimer" class="matchtimer"></div><br/><br/>
    <table id="table_id" class="display table table-hover table-border">		
    <thead>
    <tr style="background-color:black;color:white;">
      <th style="width:40%;">'.$this->match->hometeamobj->name.'</th>
      <th style="width:5%;" id="hometeamgoals">0</th>
      <th style="width:10%;"> - </th>
      <th style="width:5%;" id="awayteamgoals">0</th>
      <th style="width:40%;">'.$this->match->awayteamobj->name.'</th>
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
}

?>