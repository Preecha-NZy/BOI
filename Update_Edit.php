<?php
#1    //-----------------------Connect Server By UTF-8 --------------------------------------//
$serverName = "10.111.41.206";
$connectionInfo = array("Database" => "boi_solar", "UID" => "solar-user", "PWD" => "nl69KSAuNLE24mR5ytLCj8XI4", "Characterset" => "UTF-8");
$conn = sqlsrv_connect($serverName, $connectionInfo);
if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}


function  update_edit($Doc_no, $Edit_tables , $info, $No, $Status,$conn){
    
    $sql = "UPDATE  ประวัติแก้ไขคำขอ SET ข้อมูลที่จะแก้ไข=?,รายละเอียด=?,แก้ครังที่=?,สถานะ=? WHERE doc_no=?";
    $params = array( $Edit_tables , $info, $No, $Status,$Doc_no);
    $r_data = sqlsrv_query($conn, $sql, $params);
    if ($r_data === false) {
        echo "ERROR 3 : #";
        die(print_r(sqlsrv_errors(), true));
    }
}


$Doc_no=null; #doc_no
$Edit_tables=null; #ข้อมูลที่จะแก้ไข
$info=null;#รายละเอียด
$No=null;#แก้ครังที่
$Status=null;#สถานะ
update_edit($Doc_no, $Edit_tables , $info, $No, $Status,$conn);