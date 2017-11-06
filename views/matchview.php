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
}

?>