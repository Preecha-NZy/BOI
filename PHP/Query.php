<?php
$serverName = "10.111.41.206";
$connectionInfo = array( "Database"=>"boi_solar", "UID"=>"suchakhri", "PWD"=>"TCxIEBDvPdteJXF785" );
$conn = sqlsrv_connect( $serverName, $connectionInfo);
if( $conn === false ) {
     die( print_r( sqlsrv_errors(), true));
}



$sql = "SELECT Request_Number FROM Request";
$stmt = sqlsrv_query( $conn, $sql );
if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
}

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC) ) {
      echo $row[0]."<br />";
}

sqlsrv_free_stmt($stmt);


?>

