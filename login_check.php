
<?php
function login_check($ID, $password)
{
    $serverName = "LAPTOP-AB9LHLT9\SQLEXPRESS";
    $connectionInfo = array("Database" => "boi_solar", "UID" => "toy", "PWD" => "0836161840", "CharacterSet"  => 'UTF-8');
    $conn = sqlsrv_connect($serverName, $connectionInfo);
    if ($conn === false) {
        die(print_r(sqlsrv_errors(), true));
    }
    // $sql = "SELECT User_ID,User_Password FROM User_Login where User_ID ="."$ID"." and User_Password = "."$password".";";
    $sql = "select * from User_Login where User_ID = '" . $ID . "' and User_Password = '" . $password . "'";
    $stmt = sqlsrv_query($conn, $sql);
    $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
    // $row->set_charset("utf8");

    if ($row['User_ID'] != "" and $row['User_Password'] != "") {
        $data = array();
        $data['result'] = $row;
        $test = $data['result'];
    } else {
        die(header("HTTP/1.0 404 Not Found"));
    }
    $_SESSION = $test;
    return $test;
    exit();
}
session_start();
$ID = $_POST['ID'];
$password = $_POST['Password'];
// $ID = 'boiuser1';
// $password = '12345678';
login_check($ID, $password);
?>
