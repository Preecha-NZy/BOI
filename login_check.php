<?php
function login_check($ID, $password)
{
    $loginInfo = [];
    $serverName = "10.111.41.206";
    $connectionInfo = array("Database" => "boi_solar", "UID" => "solar-user", "PWD" => "nl69KSAuNLE24mR5ytLCj8XI4", "Characterset" => "UTF-8");
    $conn = sqlsrv_connect($serverName, $connectionInfo);
    if ($conn === false) {
        die(print_r(sqlsrv_errors(), true));
    }
    $sql = "select * from User_Login where User_ID = '" . $ID . "' and User_Password = '" . $password . "'";
    $stmt = sqlsrv_query($conn, $sql);
    $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
    if ($row['User_ID'] != "" and $row['User_Password'] != "") {
        $loginInfo[0]['id'] = $row['User_ID'];
        $loginInfo[0]['Fname'] = $row['User_Fname'];
        $loginInfo[0]['Lname'] = $row['User_Lname'];
        return $loginInfo;
    } else {
        print_r($conn, true);
        die(header("HTTP/1.0 404 Not Found"));
    }
}
session_start();
$ID = $_POST['ID'];
$password = $_POST['Password'];
$loginInfo = login_check($ID, $password);
echo json_encode($loginInfo, JSON_PRETTY_PRINT);