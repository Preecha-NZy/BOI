<?php
$serverName = "10.111.41.206";
$connectionInfo = array( "Database"=>"boi_solar", "UID"=>"suchakhri", "PWD"=>"TCxIEBDvPdteJXF785" );
$conn = sqlsrv_connect( $serverName, $connectionInfo);
if( $conn === false ) {
     die( print_r( sqlsrv_errors(), true));
}

$sql = "INSERT INTO Request (Request_Number) VALUES (?)";
$params = array("PHP73000");

$stmt = sqlsrv_query( $conn, $sql, $params);
if( $stmt === false ) {
     die( print_r( sqlsrv_errors(), true));
}
?>