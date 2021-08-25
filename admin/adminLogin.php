
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
    $sql = "select * from admin_login where Id = '" . $ID . "' and Password = '" . $password . "'";
    $stmt = sqlsrv_query($conn, $sql);
    $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
    if ($row['Id'] != "" and $row['Password'] != "") {
        $loginInfo[0]['id'] = $row['Id'];
        $loginInfo[0]['Fname'] = $row['Fname'];
        $loginInfo[0]['Lname'] = $row['Lname'];
        $loginInfo[0]['Position'] = $row['Position'];
        return $loginInfo;
        // $_SESSION = $test;
    } else {
        die(header("HTTP/1.0 404 Not Found"));
    }
}
session_start();
$ID = $_POST['ID'];
$password = $_POST['Password'];
// $ID = 'adminTest4';
// $password = '12345678';
$loginInfo = login_check($ID, $password);
echo json_encode($loginInfo, JSON_PRETTY_PRINT);
?>
