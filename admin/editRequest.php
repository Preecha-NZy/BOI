<?php
$serverName = "10.111.41.206";
$connectionInfo = array("Database" => "boi_solar", "UID" => "solar-user", "PWD" => "nl69KSAuNLE24mR5ytLCj8XI4", "Characterset" => "UTF-8");
$conn = sqlsrv_connect($serverName, $connectionInfo);
if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}


function countEdit($doc_no, $conn)
{
    $count = 0;
    $i = 0;
    $sql = "select count(doc_no) as count from ประวัติแก้ไขคำขอ where doc_no = '" . $doc_no . "'";
    $result = sqlsrv_query($conn, $sql);
    while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
        $keys = array_keys($row);
        $count = $row[$keys[0]] + 1;
    }
    return $count;
}

function insertEdit($doc_no, $edit, $info, $count, $status, $conn)
{
    $sql = "insert into ประวัติแก้ไขคำขอ values(?,?,?,?,?)";
    $params = array($doc_no, $edit, $info, $count, $status);
    $r_data = sqlsrv_query($conn, $sql, $params);
    if ($r_data === false) {
        echo "ERROR 2 : #";
        die(print_r(sqlsrv_errors(), true));
    }
}
function insertTransaction($doc_no, $assigneeName, $assignor, $status, $date, $conn)
{
    $requestDate = get_requestDate($doc_no, $conn);
    $requestNumber = 'E' . $doc_no;
    $receiveDate = get_receiveDate($doc_no, $conn);
    $sql = "insert into ประวัติธุกรรม values(?,?,?,?,?,?,?,?,?,?)";
    $params = array(
        $doc_no, $requestNumber, $requestDate,
        $assignor, $assigneeName, '7.1.1.2',
        $status, " ", $receiveDate, $date
    );
    $r_data = sqlsrv_query($conn, $sql, $params);

    if ($r_data === false) {
        echo "ERROR 24 : #";
        die(print_r(sqlsrv_errors(), true));
    } else {
        update_currentTransaction($doc_no, $assigneeName, $assignor, $date, $status, $conn);
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
        $sql = "select ชื่อผู้รับมอบหมาย from ธุรกรรมล่าสุด where doc_no = '" . $doc_no . "'";
        $result = sqlsrv_query($conn, $sql);
        $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
        $keys = array_keys($row);
        echo "=====================================================";
        echo "\n";
        echo $row[$keys[0]];
        echo "\n";
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

$doc_no = $_POST['doc_no'];
$edit = $_POST['edit'];
$info = $_POST['info'];
$status = $_POST['status'];
$count = countEdit($doc_no, $conn);
$assignee = $_POST['assignee'];
$assignor = $_POST['assignor'];
$date = $_POST['currentDate'];
insertTransaction($doc_no, $assignee, $assignor,$status, $date, $conn);
insertEdit($doc_no, $edit, $info, $count, $status, $conn);
