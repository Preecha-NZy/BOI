<?php
$serverName = "10.111.41.206";
$connectionInfo = array("Database" => "boi_solar", "UID" => "solar-user", "PWD" => "nl69KSAuNLE24mR5ytLCj8XI4", "Characterset" => "UTF-8");
$conn = sqlsrv_connect($serverName, $connectionInfo);
if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}
function insertTransaction($doc_no, $assigneeName, $status, $date, $conn)
{
    $requestDate = get_requestDate($doc_no, $conn);
    $assignorName = get_assignorName($doc_no, $conn, $status);
    $requestNumber = 'E' . $doc_no;
    $receiveDate = get_receiveDate($doc_no, $conn);
    $sql = "insert into ประวัติธุกรรม values(?,?,?,?,?,?,?,?,?,?)";
    $params = array(
        $doc_no, $requestNumber, $requestDate,
        $assignorName, $assigneeName, '7.1.1.2',
        $status, " ", $receiveDate, $date
    );
    $r_data = sqlsrv_query($conn, $sql, $params);

    if ($r_data === false) {
        echo "ERROR 24 : #";
        die(print_r(sqlsrv_errors(), true));
    } else {
        update_currentTransaction($doc_no, $assigneeName, $assignorName, $date, $status, $conn);
    }
}

function update_currentTransaction($doc_no, $assigneeName, $assignorName, $date, $status, $conn)
{

    $sql = "update ธุรกรรมล่าสุด set   วันที่ปรับปรุงล่าสุด = ?,
                                        ชื่อผู้มอบหมาย = ?,
                                        ชื่อผู้รับมอบหมาย = ?,
                                        สถานะ = ? where doc_no = '" . $doc_no . "'";
    $params = array($date, $assignorName, $assigneeName, $status);
    $r_data = sqlsrv_query($conn, $sql, $params);

    if ($r_data === false) {
        echo "ERROR 25 : #";
        die(print_r(sqlsrv_errors(), true));
    }
}

function get_requestDate($doc_no, $conn)
{
    $sql = "select format(วันที่ยื่นคำขอ, 'yyyy-MM-dd HH:mm:ss') as วันที่ยื่นคำขอ from ธุรกรรมล่าสุด where doc_no = '" . $doc_no . "'";
    $result = sqlsrv_query($conn, $sql);
    $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
    $keys = array_keys($row);
    return $row[$keys[0]];
}

function get_assignorName($doc_no, $conn, $status)
{
    $sql = "select ชื่อผู้มอบหมาย from ธุรกรรมล่าสุด where doc_no = '" . $doc_no . "'";
    $result = sqlsrv_query($conn, $sql);
    $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
    $keys = array_keys($row);
    return $row[$keys[0]];
}

function get_receiveDate($doc_no, $conn)
{
    $sql = "select format(วันที่รับคำขอ, 'yyyy-MM-dd HH:mm:ss') as วันที่รับคำขอ from ธุรกรรมล่าสุด where doc_no = '" . $doc_no . "'";
    $result = sqlsrv_query($conn, $sql);
    $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
    $keys = array_keys($row);
    return $row[$keys[0]];
}

function updatePosition1($doc_no, $assigneeName, $conn)
{
    $sql = "update ธุรกรรมล่าสุด set หัวหน้าสาย = ? where doc_no = '" . $doc_no . "'";
    $params = array($assigneeName);
    $r_data = sqlsrv_query($conn, $sql, $params);

    if ($r_data === false) {
        echo "ERROR 30 : #";
        die(print_r(sqlsrv_errors(), true));
    }
}

function updatePosition2($doc_no, $assigneeName, $conn)
{
    $sql = "update ธุรกรรมล่าสุด set เจ้าหน้าที่ = ? where doc_no = '" . $doc_no . "'";
    $params = array($assigneeName);
    $r_data = sqlsrv_query($conn, $sql, $params);

    if ($r_data === false) {
        echo "ERROR 31 : #";
        die(print_r(sqlsrv_errors(), true));
    }
}

$doc_no = $_POST['doc_no'];
$currentDate = $_POST['currentDate'];
$assigneeName = $_POST['assigneeName'];
$status1 = $_POST['status'];
$status2 = $_POST['status2'];
$position = $_POST['position'];
insertTransaction($doc_no, $assigneeName, $status1, $currentDate, $conn);
$date2 = date('Y-m-d H:i:s', strtotime('+1 second', strtotime($currentDate)));
insertTransaction($doc_no, $assigneeName, $status2, $date2, $conn);

if ($position == 'หัวหน้าสาย') {
    updatePosition1($doc_no, $assigneeName, $conn);
} else {
    updatePosition2($doc_no, $assigneeName, $conn);
}
