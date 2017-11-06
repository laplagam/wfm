<?php

class vMainView
{
  function __construct()
  {

  }
  //Creates the default website header
  function makeHeaderView()
  {
    //TODO: Make a proper header used for all pages with bootstrap and datatables. 
    $htmlout = '
    <!doctype HTML>
    <head>
    <title>WFM</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4-4.0.0-beta/jq-3.2.1/jszip-2.5.0/dt-1.10.16/af-2.2.2/b-1.4.2/b-colvis-1.4.2/b-html5-1.4.2/b-print-1.4.2/cr-1.4.1/fc-3.2.3/fh-3.1.3/kt-2.3.2/r-2.2.0/rg-1.0.2/rr-1.2.3/sc-1.4.3/sl-1.2.3/datatables.min.css"/>    
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4-4.0.0-beta/jq-3.2.1/jszip-2.5.0/dt-1.10.16/af-2.2.2/b-1.4.2/b-colvis-1.4.2/b-html5-1.4.2/b-print-1.4.2/cr-1.4.1/fc-3.2.3/fh-3.1.3/kt-2.3.2/r-2.2.0/rg-1.0.2/rr-1.2.3/sc-1.4.3/sl-1.2.3/datatables.min.js"></script>
    </head>
    <body>    
    ';

    return $htmlout;
  }

  function makeFooterView()
  {
    $htmlout = '<br/></body></html>';
    return $htmlout;
  }

}
?>