
<!DOCTYPE html>
<html>
<body>

<?php

  $servername = "localhost";
  $username = "root";
  $password = "2311";
  $dbname = "movies";

  function sql_to_html_table($sqlresult, $delim="\n") {
    echo "MOOOOOOOES";
    // starting table
    $htmltable =  "<table>" . $delim ;   
    $counter   = 0 ;
    // putting in lines
    while( $row = $sqlresult->fetch_assoc()  ){
      if ( $counter===0 ) {
        // table header
        $htmltable .=   "<tr>"  . $delim;
        foreach ($row as $key => $value ) {
            $htmltable .=   "<th>" . $key . "</th>"  . $delim ;
        }
        $htmltable .=   "</tr>"  . $delim ; 
        $counter = 22;
      } 
        // table body
        $htmltable .=   "<tr>"  . $delim ;
        foreach ($row as $key => $value ) {
            $htmltable .=   "<td>" . $value . "</td>"  . $delim ;
        }
        $htmltable .=   "</tr>"   . $delim ;
    }
    // closing table
    $htmltable .=   "</table>"   . $delim ; 
    // return
    return( $htmltable ) ; 
  }

  $DB = new \MySQLi($servername, $username, $password, $dbname);
  
  $sqlresult = $DB->query( "SELECT * FROM movie" ) ; 

  echo sql_to_html_table( $sqlresult, $delim="\n" ) ;
?>




</body>
</html>