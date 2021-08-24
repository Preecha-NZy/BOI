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
    if ($status == 'รับคำขอ') {
        $sql = "insert into ประวัติธุกรรม values(?,?,?,?,?,?,?,?,?,?)";
        $params = array(
            $doc_no, $requestNumber, $requestDate,
            $assignorName, $assigneeName, '7.1.1.2',
            $status, " ", $date, $date
        );
        $r_data = sqlsrv_query($conn, $sql, $params);
    } else {
        $receiveDate = get_receiveDate($doc_no, $conn);
        $sql = "insert into ประวัติธุกรรม values(?,?,?,?,?,?,?,?,?,?)";
        $params = array(
            $doc_no, $requestNumber, $requestDate,
            $assignorName, $assigneeName, '7.1.1.2',
            $status, " ", $receiveDate, $date
        );
        $r_data = sqlsrv_query($conn, $sql, $params);
    }
    if ($r_data === false) {
        echo "ERROR 24 : #";
        die(print_r(sqlsrv_errors(), true));
    } else {
        update_currentTransaction($doc_no, $assigneeName, $assignorName, $date, $status, $conn);
    }
}

function update_currentTransaction($doc_no, $assigneeName, $assignorName, $date, $status, $conn)
{
    if ($status == "รับคำขอ") {
        $sql = "update ธุรกรรมล่าสุด set   เลขคำขอ = ?,
                                        วันที่รับคำขอ = ?,
                                        ผู้รับคำขอ = ?,
                                        ชื่อผู้รับมอบหมาย = ?,
                                        วันที่ปรับปรุงล่าสุด = ?,
                                        สถานะ = ? where doc_no = '" . $doc_no . "'";
        $requestNumber = "E" . $doc_no;
        $params = array($requestNumber, $date, $assigneeName, $assigneeName, $date, $status);
        $r_data = sqlsrv_query($conn, $sql, $params);
    } else {
        $sql = "update ธุรกรรมล่าสุด set   วันที่ปรับปรุงล่าสุด = ?,
                                        ชื่อผู้มอบหมาย = ?,
                                        ชื่อผู้รับมอบหมาย = ?,
                                        สถานะ = ? where doc_no = '" . $doc_no . "'";
        $params = array($date, $assignorName, $assigneeName, $status);
        $r_data = sqlsrv_query($conn, $sql, $params);
    }

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
    if ($status == "รับคำขอ") {
        $sql = "select ชื่อผู้มอบหมาย from ธุรกรรมล่าสุด where doc_no = '" . $doc_no . "'";
        $result = sqlsrv_query($conn, $sql);
        $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
        $keys = array_keys($row);
        return $row[$keys[0]];
    } else {
        $sql = "select ชื่อผู้รับมอบหมาย from ธุรกรรมล่าสุด where doc_no = '" . $doc_no . "'";
        $result = sqlsrv_query($conn, $sql);
        $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
        $keys = array_keys($row);
        return $row[$keys[0]];
    }
}

function get_receiveDate($doc_no, $conn)
{
    $sql = "select format(วันที่รับคำขอ, 'yyyy-MM-dd HH:mm:ss') as วันที่รับคำขอ from ธุรกรรมล่าสุด where doc_no = '" . $doc_no . "'";
    $result = sqlsrv_query($conn, $sql);
    $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
    $keys = array_keys($row);
    return $row[$keys[0]];
}

$date = $_POST['date'];
$assigneeName = $_POST['name'];
$doc_no = $_POST['doc_no'];
$status1 = $_POST['status'];
$status2 = $_POST['status2'];
insertTransaction($doc_no, $assigneeName, $status1, $date, $conn);
$date2 = date('Y-m-d H:i:s', strtotime('+1 second', strtotime($date)));
echo "-----------------------------------------------------------------------------";
insertTransaction($doc_no, "กานดา ชมพูนิกข์ ", $status2, $date2, $conn);
