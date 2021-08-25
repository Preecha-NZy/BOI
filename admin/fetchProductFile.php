<?php
$serverName = "10.111.41.206";
$connectionInfo = array("Database" => "boi_solar", "UID" => "solar-user", "PWD" => "nl69KSAuNLE24mR5ytLCj8XI4", "Characterset" => "UTF-8");
$conn = sqlsrv_connect($serverName, $connectionInfo);

function fetch_productFile($doc_no, $conn)
{
    $sql = "SELECT Product_DOC FROM DOCUMENT WHERE Doc_no = '".$doc_no."'";

    $result = sqlsrv_query($conn, $sql);
    $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
    return $row['Product_DOC'];
}
$doc_no = $_GET['doc_no'];
$file = fetch_productFile($doc_no,$conn);
header('Content-type: application/pdf');
header('Content-Transfer-Encoding: binary');
header('Accept-Ranges: bytes');
if(isset($file)) {
    echo ($file);
}