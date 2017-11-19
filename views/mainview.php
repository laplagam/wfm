<?php

class vMainView
{
  var $htmlout = '';
  var $extraheader = '';
  function __construct()
  {

  }
  //Creates the default website header
  function makeHeaderView()
  {
    //TODO: Make a proper header used for all pages with bootstrap and datatables. 
    $this->htmlout .= '
    <!doctype HTML>
    <head>
    <title>WFM</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4-4.0.0-beta/jq-3.2.1/jszip-2.5.0/dt-1.10.16/af-2.2.2/b-1.4.2/b-colvis-1.4.2/b-html5-1.4.2/b-print-1.4.2/cr-1.4.1/fc-3.2.3/fh-3.1.3/kt-2.3.2/r-2.2.0/rg-1.0.2/rr-1.2.3/sc-1.4.3/sl-1.2.3/datatables.min.css"/>    
    <link rel="stylesheet" type="text/css" href="css/main.css"/>    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4-4.0.0-beta/jq-3.2.1/jszip-2.5.0/dt-1.10.16/af-2.2.2/b-1.4.2/b-colvis-1.4.2/b-html5-1.4.2/b-print-1.4.2/cr-1.4.1/fc-3.2.3/fh-3.1.3/kt-2.3.2/r-2.2.0/rg-1.0.2/rr-1.2.3/sc-1.4.3/sl-1.2.3/datatables.min.js"></script>
    '.$this->extraheader.'
    </head>
    <body class="maincontent">  
    
    
    ';

    return $this->htmlout;
  }

  function applyToHeader($content)
  {
    $this->extraheader = $content;
  }
  

  function addHtmlContent($content)
  {
    $this->htmlout .= $content;
  }

  function createBootstrapTopMenu()
  {
    $this->htmlout .= '<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <!--<a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>-->
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">    
      <li class="nav-item active">
      <a class="nav-link" href="index.php?page=mainview">Main page <span class="sr-only">(current)</span></a>
    </li>
      <li class="nav-item active">
      <a class="nav-link" href="index.php">Run match <span class="sr-only">(current)</span></a>
    </li>
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Game
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="index.php?page=creategame">Create a new game</a>            
        </div>
      </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Table
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="index.php?page=table">View current standings</a>            
          </div>
        </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Fixtures
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">View fixtures</a>
        </div>
      </li> 
    
        
        
        <!--
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Dropdown
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#">Disabled</a>
        </li>-->
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </nav>';

    return $this->htmlout;
  }

  function makeFooterView()
  {
    $this->htmlout .= '<br/></body></html>';
    return $this->htmlout;
  }

}
?>