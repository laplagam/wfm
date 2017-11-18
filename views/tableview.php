<?php

class vTableView
{
  var $table;
  function __construct(TableClass $table)
  {
    $this->table = $table;
  }

  function showTable($gameid=6)
  {
    $htmlout = '<br/><br/>
    <table id="table_id" class="display table table-hover table-border table-striped">		
    <thead>
    <tr style="background-color:black;color:white;">
    <th>Position</th>
    <th>Team</th>
    <th>Matches</th>
    <th>Won</th>
    <th>Draw</th>
    <th>Loss</th>
    <th>Goals</th>
    <th>Points</th>    
    </tr>
    </thead><tbody>';
    
    $data = $this->table->tablestandingsdata;
    $position = 1;//We count from start to finnish. 
    foreach($data as $row)
    {
      $htmlout .= '      
      <tr>
        <td>'.$position.'</td>
        <td>'.$row['teamname'].'</td>
        <td>'.$row['matchesplayed'].'</td>
        <td>'.$row['victory'].'</td>
        <td>'.$row['draw'].'</td>
        <td>'.$row['loss'].'</td>
        <td>'.$row['goalsfor'].' - '.$row['goalsagainst'].' ('.bcsub($row['goalsfor'],$row['goalsagainst']).')</td>
        <td>'.$row['points'].'</td>
      </tr>';
      $position++;
    }
    
    $htmlout .= '</tbody>
    </table>';

    return $htmlout;

  }
}