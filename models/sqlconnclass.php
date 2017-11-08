<?php
class PdoConnection
{
  function __construct()
  {

  }

  function getPdoCon()
  {
    $pdo = null;

    $dsn = 'mysql:dbname=dbwfm;host=localhost';
    $user = 'root';
    $password = 'Lars2000!';

    try
    {
      $pdo = new PDO($dsn,$user,$password);
    }
    catch(Exception $e)
    {
      echo 'Error: '.$e->getMessage()."\n<br/>";
    }
    return $pdo;
  }
}
?>