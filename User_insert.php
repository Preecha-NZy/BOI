<?php
#1    //-----------------------Connect Server By UTF-8 --------------------------------------//
$serverName = "10.111.41.206";
$connectionInfo = array("Database" => "boi_solar", "UID" => "solar-user", "PWD" => "nl69KSAuNLE24mR5ytLCj8XI4", "Characterset" => "UTF-8");
$conn = sqlsrv_connect($serverName, $connectionInfo);
if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}
#2    //-----------------------Connect Server --------------------------------------//
$serverName = "10.111.41.206";
$konnectionInfo = array("Database" => "boi_solar", "UID" => "solar-user", "PWD" => "nl69KSAuNLE24mR5ytLCj8XI4");
$konn = sqlsrv_connect($serverName, $konnectionInfo);
if ($konn === false) {
    die(print_r(sqlsrv_errors(), true));
}

//----------------------INSERT Product detail and Document-------------------------------------//
function  insert_Product_detail($Product_id, $Company, $Product_Name, $Contract_Name, $Contract_Name_Page, $Capacity, $Capacity_Page, $Location_No, $Location_Street, $Location_Subdistrict, $Location_district, $Location_Province, $Location_Page, $conn)
{

    $sql2 = "INSERT INTO Product_Detail VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";
    $params = array($Product_id, $Company, $Product_Name, $Contract_Name, $Contract_Name_Page, $Capacity, $Capacity_Page, $Location_No, $Location_Street, $Location_Subdistrict, $Location_district, $Location_Province, $Location_Page);
    $r_data = sqlsrv_query($conn, $sql2, $params);
    if ($r_data === false) {
        echo "ERROR 2 : #";
        die(print_r(sqlsrv_errors(), true));
    }
}
//-----------------------------------------------------------------------------------------------//

//-------------------------------insert_Rooftop_Solar----------------------------------------------//
function insert_Rooftop_Solar($Pvmodult_Roof_ID, $Location_Type, $Pvmodult_Type, $Pvmodult_Model, $Pvmodult_Brand, $Pvmodult_Country, $Pvmodult_Capacity, $Pvmodult_Amount, $Pvmodult_Cost, $Pvmodult_Sum, $conn)
{

    $sql = "INSERT INTO Roof_solar VALUES (?,?,?,?,?,?,?,?,?,?)";
    $params = array($Pvmodult_Roof_ID, $Location_Type, $Pvmodult_Type, $Pvmodult_Model, $Pvmodult_Brand, $Pvmodult_Country, $Pvmodult_Capacity, $Pvmodult_Amount, $Pvmodult_Cost, $Pvmodult_Sum);
    $r_data = sqlsrv_query($conn, $sql, $params);
    if ($r_data === false) {
        echo "ERROR 3 : #";
        die(print_r(sqlsrv_errors(), true));
    }
}
//-----------------------------------------------------------------------------------------------//


//-------------------------------insert_Rooftop_Inverter----------------------------------------------//
function insert_Rooftop_Inverter($Inverter_Roof_ID, $Pvmodult_Model, $Pvmodult_Brand, $Pvmodult_Country, $Pvmodult_Capacity, $Pvmodult_Amount, $Pvmodult_Cost, $Pvmodult_Sum, $conn)
{

    $sql = "INSERT INTO Roof_inverter VALUES (?,?,?,?,?,?,?,?)";
    $params = array($Inverter_Roof_ID, $Pvmodult_Model, $Pvmodult_Brand, $Pvmodult_Country, $Pvmodult_Capacity, $Pvmodult_Amount, $Pvmodult_Cost, $Pvmodult_Sum);
    $r_data = sqlsrv_query($conn, $sql, $params);
    if ($r_data === false) {
        echo "ERROR 4 : #";
        die(print_r(sqlsrv_errors(), true));
    }
}
//-----------------------------------------------------------------------------------------------//

//---------------------------insert Location Rooftop Keys and Doc -------------------------------//
function insert_Location_Rooftop($Location_Rooftop_ID, $Pvmodult_Roof_ID, $Inverter_Roof_ID, $conn, $konn)
{

    $sql2 = "INSERT INTO Location_Rooftop VALUES (?,?,?)";
    $params = array($Location_Rooftop_ID, $Pvmodult_Roof_ID, $Inverter_Roof_ID);
    $r_data = sqlsrv_query($conn, $sql2, $params);
    if ($r_data === false) {
        echo "ERROR 6 : #";
        die(print_r(sqlsrv_errors(), true));
    }
}
//-----------------------------------------------------------------------------------------------//

//-----------------------------------insert_Farm_Solar------------------------------------------------------------//
function insert_Farm_Solar($Pvmodult_Farm_ID, $Location_Type, $Pvmodult_Type, $Pvmodult_Model, $Pvmodult_Brand, $Pvmodult_Country, $Pvmodult_Capacity, $Pvmodult_Amount, $Pvmodult_Cost, $Pvmodult_Sum, $conn)
{

    $sql = "INSERT INTO Farm_solar VALUES (?,?,?,?,?,?,?,?,?,?)";
    $params = array($Pvmodult_Farm_ID, $Location_Type, $Pvmodult_Type, $Pvmodult_Model, $Pvmodult_Brand, $Pvmodult_Country, $Pvmodult_Capacity, $Pvmodult_Amount, $Pvmodult_Cost, $Pvmodult_Sum);
    $r_data = sqlsrv_query($conn, $sql, $params);
    if ($r_data === false) {
        echo "ERROR 7 : #";
        die(print_r(sqlsrv_errors(), true));
    }
}
//-----------------------------------------------------------------------------------------------//

//------------------------------------insert_Farm_Inverter-----------------------------------------------------------//
function insert_Farm_Inverter($Inverter_Farm_ID, $Pvmodult_Model, $Pvmodult_Brand, $Pvmodult_Country, $Pvmodult_Capacity, $Pvmodult_Amount, $Pvmodult_Cost, $Pvmodult_Sum, $conn)
{

    $sql = "INSERT INTO Farm_inverter VALUES (?,?,?,?,?,?,?,?)";
    $params = array($Inverter_Farm_ID, $Pvmodult_Model, $Pvmodult_Brand, $Pvmodult_Country, $Pvmodult_Capacity, $Pvmodult_Amount, $Pvmodult_Cost, $Pvmodult_Sum);
    $r_data = sqlsrv_query($conn, $sql, $params);
    if ($r_data === false) {
        echo "ERROR 8 : #";
        die(print_r(sqlsrv_errors(), true));
    }
}
//-----------------------------------------------------------------------------------------------//

//-------------------------insert_Location_Farm and DOC------------------------------------//
function insert_Location_Farm($Location_Farm_ID, $Pvmodult_Farm_ID, $Inverter_Farm_ID, $conn, $konn)
{
    $sql2 = "INSERT INTO Location_Farm VALUES (?,?,?)";
    $params = array($Location_Farm_ID, $Pvmodult_Farm_ID, $Inverter_Farm_ID);
    $r_data = sqlsrv_query($conn, $sql2, $params);
    if ($r_data === false) {
        echo "ERROR 10 : #";
        die(print_r(sqlsrv_errors(), true));
    }
}
//-----------------------------------------------------------------------------------------------//

//------------------------------------insert_Floating_Solar--------------------------------------//
function  insert_Floating_Solar($Pvmodult_Floating_ID, $pool_number, $totalFloating, $pool_detail, $water_detail, $pool_area, $pool_percen, $floating_area, $Pvmodult_Type, $Pvmodult_Model, $Pvmodult_Brand, $Pvmodult_Country, $Pvmodult_Capacity, $Pvmodult_Amount, $Pvmodult_Cost, $Pvmodult_Sum, $conn)
{

    $sql = "INSERT INTO Floating_solar VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    $params = array($Pvmodult_Floating_ID, $pool_number, $totalFloating, $pool_detail, $water_detail, $pool_area, $floating_area, $pool_percen, $Pvmodult_Type, $Pvmodult_Model, $Pvmodult_Brand, $Pvmodult_Country, $Pvmodult_Capacity, $Pvmodult_Cost, $Pvmodult_Amount, $Pvmodult_Sum);
    $r_data = sqlsrv_query($conn, $sql, $params);
    if ($r_data === false) {
        echo "ERROR 11 : #";
        die(print_r(sqlsrv_errors(), true));
    }
}
//-----------------------------------------------------------------------------------------------//

//------------------------------------insert_Floating_Inverter--------------------------------------//
function insert_Floating_Inverter($Inverter_Floating_ID, $Pvmodult_Model, $Pvmodult_Brand, $Pvmodult_Country, $Pvmodult_Capacity, $Pvmodult_Amount, $Pvmodult_Cost, $Pvmodult_Sum, $conn)
{
    $sql = "INSERT INTO Floating_inverter VALUES (?,?,?,?,?,?,?,?)";
    $params = array($Inverter_Floating_ID, $Pvmodult_Model, $Pvmodult_Brand, $Pvmodult_Country, $Pvmodult_Capacity, $Pvmodult_Amount, $Pvmodult_Cost, $Pvmodult_Sum);
    $r_data = sqlsrv_query($conn, $sql, $params);
    if ($r_data === false) {
        echo "ERROR 12 : #";
        die(print_r(sqlsrv_errors(), true));
    }
}
//-----------------------------------------------------------------------------------------------//

//----------------------------insert_Location_Floating and DOC-------------------------------//
function insert_Location_Floating($Location_Floating_ID, $Pvmodult_Floating_ID, $Inverter_Floating_ID, $conn, $konn)
{
    $sql2 = "INSERT INTO Location_Floating VALUES (?,?,?)";
    $params = array($Location_Floating_ID, $Pvmodult_Floating_ID, $Inverter_Floating_ID);
    $r_data = sqlsrv_query($conn, $sql2, $params);
    if ($r_data === false) {
        echo "ERROR 14 : #";
        die(print_r(sqlsrv_errors(), true));
    }
}

//-----------------------------------------------------------------------------------------------//

//-----------------------------insert_ESS and DOC--------------------------------------------------//
function insert_ESS($ESS_ID, $ESS_Model, $ESS_Brand, $ESS_Country, $ESS_Capacity, $ESS_Amount, $ESS_Sum, $conn, $konn)
{
    $sql2 = "INSERT INTO ESS VALUES (?,?,?,?,?,?,?)";
    $params = array($ESS_ID, $ESS_Model, $ESS_Brand, $ESS_Country, $ESS_Capacity, $ESS_Amount, $ESS_Sum);
    $r_data = sqlsrv_query($conn, $sql2, $params);
    if ($r_data === false) {
        echo "ERROR 16 : #";
        die(print_r(sqlsrv_errors(), true));
    }
}

//-----------------------------------------------------------------------------------------------//

//-------------------------------insert_Equipment------------------------------------------------//
function insert_Equipment($Equipment_ID, $Descript, $conn)
{
    $sql = "INSERT INTO Equipment VALUES (?,?)";
    $params = array($Equipment_ID, $Descript);
    $r_data = sqlsrv_query($conn, $sql, $params);
    if ($r_data === false) {
        echo "ERROR 17 : #";
        die(print_r(sqlsrv_errors(), true));
    }
}
//-----------------------------------------------------------------------------------------------//

//------------------------------insert_Tools------------------------------------------------//
function insert_Tools($Tools_ID, $Product_id, $Location_Rooftop_ID, $Location_Farm_ID, $Location_Floating_ID, $ESS_ID, $Equipment_ID, $Pvmodult_Total, $Inverter_Total, $conn)
{
    $sql = "INSERT INTO Tools VALUES (?,?,?,?,?,?,?,?,?)";
    $params = array($Tools_ID, $Product_id, $Location_Rooftop_ID, $Location_Farm_ID, $Location_Floating_ID, $ESS_ID, $Equipment_ID, $Pvmodult_Total, $Inverter_Total);
    $r_data = sqlsrv_query($conn, $sql, $params);
    if ($r_data === false) {
        echo "ERROR 18 : #";
        die(print_r(sqlsrv_errors(), true));
    }
}
//-----------------------------------------------------------------------------------------------//

//------------------------------Investment_Detail----------------------------------------------------//
function  insert_Investment_Detail($Investment_Detail_ID, $EPC_Name, $Construction_Cost, $Machine_Pvmodule, $Machine_Inverter, $Machine_ESS, $Machine_Equipment, $Machine_Info, $Machine_Setup, $Machine_Trial, $Expenses, $Asset, $Land_Value, $Academic, $Circulation, $Result, $conn)
{
    $sql = "INSERT INTO Investment_Detail VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    $params = array($Investment_Detail_ID, $EPC_Name, $Construction_Cost, $Machine_Info, $Machine_Pvmodule, $Machine_Inverter, $Machine_ESS, $Machine_Equipment, $Machine_Setup, $Machine_Trial, $Expenses, $Asset, $Land_Value, $Academic, $Circulation, $Result);
    $r_data = sqlsrv_query($conn, $sql, $params);
    if ($r_data === false) {
        echo "ERROR 19 : #";
        die(print_r(sqlsrv_errors(), true));
    }
}
//-----------------------------------------------------------------------------------------------//


//--------------------------insert_System_installation_plan--------------------------------------//
function insert_System_installation_plan($System_Installation_Plan_ID, $Survey, $Procurement, $installation, $COD, $conn)
{
    $sql = "INSERT INTO System_Installation_Plan VALUES (?,?,?,?,?)";
    $params = array($System_Installation_Plan_ID, $Survey, $Procurement, $installation, $COD);
    $r_data = sqlsrv_query($conn, $sql, $params);
    if ($r_data === false) {
        echo "ERROR 20 : #";
        die(print_r(sqlsrv_errors(), true));
    }
}
//-----------------------------------------------------------------------------------------------//


//-----------------------------------insert_ESA-------------------------------------------//
function insert_ESA($ESA_ID, $Name, $Consult, $Study, $Complete, $conn)
{
    $sql = "INSERT INTO ESA VALUES (?,?,?,?,?)";
    $params = array($ESA_ID, $Name, $Consult, $Study, $Complete);
    $r_data = sqlsrv_query($conn, $sql, $params);
    if ($r_data === false) {
        echo "ERROR 21 : #";
        die(print_r(sqlsrv_errors(), true));
    }
}

//-----------------------------------------------------------------------------------------------//


//--------------------------------insert_Plans------------------------------------------------//
function insert_Plans($Plan_ID, $ESA_ID, $System_Installation_Plan_ID, $conn)
{
    $sql = "INSERT INTO Plans VALUES (?,?,?)";
    $params = array($Plan_ID, $ESA_ID, $System_Installation_Plan_ID);
    $r_data = sqlsrv_query($conn, $sql, $params);
    if ($r_data === false) {
        echo "ERROR 22 : #";
        die(print_r(sqlsrv_errors(), true));
    }
}

//-----------------------------------------------------------------------------------------------//


//------------------------------insert_Solar_Request-----------------------------------------------//
function insert_Solar_Request($Doc_no, $Request_Number, $Product_id, $Investment_Detail_ID, $Plan_ID, $User_ID, $Type_of_business, $conn)
{
    $sql = "INSERT INTO Solar_Request(Doc_no,Request_Number,ProductDetail_ID,InvestmentDetail_ID,Plans_ID,User_ID,Type_of_business) VALUES (?,?,?,?,?,?,?)";
    $params = array($Doc_no, $Request_Number, $Product_id, $Investment_Detail_ID, $Plan_ID, $User_ID, $Type_of_business);

    $r_data = sqlsrv_query($conn, $sql, $params);
    if ($r_data === false) {
        echo "ERROR 23 : #";
        die(print_r(sqlsrv_errors(), true));
    }
}

function insert_transaction($Doc_no, $Company,  $Type_of_business, $status, $position, $conn)
{
    $sql = "select format(Submit_Time, 'yyyy-MM-dd HH:mm:ss') as time from Solar_Request where Doc_no = '" . $Doc_no . "'";
    $stmt = sqlsrv_query($conn, $sql);
    $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
    $time = $row['time'];
    $sql = "INSERT INTO ประวัติธุกรรม(doc_no, วันที่ยื่นคำขอ, ชื่อผู้มอบหมาย, ประเภทกิจการ, สถานะ, ตำแหน่ง, วันที่มอบหมาย) VALUES (?,?,?,?,?,?,?)";
    $params = array($Doc_no, $time, $Company, $Type_of_business, $status, $position, $time);
    $r_data = sqlsrv_query($conn, $sql, $params);
    if ($r_data === false) {
        echo "ERROR 24 : #";
        die(print_r(sqlsrv_errors(), true));
    } else {
        insert_currentTransaction($Doc_no, $time, $Company, $Type_of_business, $status, $position, $conn);
    }
}

function insert_currentTransaction($Doc_no, $time, $Company, $Type_of_business, $status, $position, $conn)
{
    $sql = "INSERT INTO ธุรกรรมล่าสุด(doc_no, วันที่ยื่นคำขอ, ผู้ยื่นคำขอ, ชื่อตัวแทน, วันที่ปรับปรุงล่าสุด, ชื่อผู้มอบหมาย, ประเภทกิจการ, สถานะ, ตำแหน่ง) VALUES (?,?,?,?,?,?,?,?,?)";
    $agent = $_POST['Name'];
    if ($agent != " ") {
        $params = array($Doc_no, $time, $Company, $agent, $time, $Company, $Type_of_business, $status, $position);
        $r_data = sqlsrv_query($conn, $sql, $params);
    } else {
        die(header("HTTP/1.0 404 Not Found"));
    }
    if ($r_data === false) {
        echo "ERROR 25 : #";
        die(print_r(sqlsrv_errors(), true));
    }
}
//-----------------------------------------------------------------------------------------------//

function insert_DOCUMENT($Doc_no, $Product_Doc, $Roof_Doc, $Farm_Doc, $Floating_DOC, $ESS_DOC, $konn)
{
    $sql = "INSERT INTO DOCUMENT (Doc_no,Product_DOC,Roof_DOC,Farm_DOC,Floating_DOC,ESS_DOC) SELECT ?,CONVERT(VARBINARY(MAX),?),CONVERT(VARBINARY(MAX),?),CONVERT(VARBINARY(MAX),?),CONVERT(VARBINARY(MAX),?),CONVERT(VARBINARY(MAX),?)";
    $parametri = array($Doc_no, $Product_Doc, $Roof_Doc, $Farm_Doc, $Floating_DOC, $ESS_DOC);
    $r_blob = sqlsrv_query($konn, $sql, $parametri);
    if ($r_blob === false) {
        echo "ERROR 1 : #";
        die(print_r(sqlsrv_errors(), true));
    }
}



#3  //-------------------------Select Product_Detail_Doc---------------------------------------------//
$sql = "SELECT COUNT(Doc_no) FROM Solar_Request";
$stmt = sqlsrv_query($conn, $sql);
if ($stmt === false) {
    echo "ERROR 24 : #";
    die(print_r(sqlsrv_errors(), true));
}
$row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_NUMERIC);
$num = (int) "$row[0]";
$num = $num + 1;


//-----------------------------------------------------------------------------------------------//

session_start();
$name = $_POST['Name'];
$status = 'รอยืนยันคำขอ';
$position = 'Comment_id';
$numsrt = sprintf('%03d', $num);
$Product_id = null;
$Product_Doc = null;
$Pvmodult_Roof_ID = null;
$Inverter_Roof_ID = null;
$Location_Rooftop_ID = null;
$Roof_Doc = null;
$Pvmodult_Farm_ID = null;
$Inverter_Farm_ID = null;
$Location_Farm_ID = null;
$Farm_Doc = null;
$Inverter_Floating_ID = null;
$Pvmodult_Floating_ID = null;
$Location_Floating_ID = null;
$Floating_DOC = null;
$ESS_ID = null;
$ESS_DOC = null;
$Equipment_ID = null;
$Tools_ID = null;
$Investment_Detail_ID = null;
$System_Installation_Plan_ID = null;
$ESA_ID = null;
$Plan_ID = null;
$Request_Number = null;
$Doc_no = null;

$count = 0;
$Product_detail = json_decode($_POST['Product_detail'], true);
if (!is_null($Product_detail)) {
    $Product_id = $Product_detail['ID'] . $numsrt;
    $Company = $Product_detail['Company'];
    $Product_Name = $Product_detail['Product_Name'];
    $Contract_Name = $Product_detail['Contract_Name'];
    $Contract_Name_Page = $Product_detail['Contract_Name_Page'];
    $Contract_Name_Page = (int) "$Contract_Name_Page";
    $Capacity = $Product_detail['Capacity'];
    $Capacity = (float) "$Capacity";
    $Capacity_Page = $Product_detail['Capacity_page'];
    $Capacity_Page = (int) "$Capacity_Page";
    $Location_No = $Product_detail['Location_No'];
    $Location_Street = $Product_detail['Location_Street'];
    $Location_Subdistrict = $Product_detail['Location_Subdistrict'];
    $Location_district = $Product_detail['Location_district'];
    $Location_Province = $Product_detail['Location_Province'];
    $Location_Page = $Product_detail['Location_Page'];
    $newtmpName = $_FILES['Pro_DOC']['tmp_name'];
    $fp = fopen($newtmpName, 'rb');
    $Product_Doc = fread($fp, filesize($newtmpName));
    fclose($fp);
    insert_Product_detail($Product_id, $Company, $Product_Name, $Contract_Name, $Contract_Name_Page, $Capacity, $Capacity_Page, $Location_No, $Location_Street, $Location_Subdistrict, $Location_district, $Location_Province, $Location_Page, $conn);
    $count = $count + 1;
}



$Rooftop_Solar = json_decode($_POST['Rooftop_Solar'], true);
if (!is_null($Rooftop_Solar)) {
    $Pvmodult_Roof_ID = $Rooftop_Solar['ID'] . $numsrt;
    $Location_Type = $Rooftop_Solar['Location_Type'];
    $Pvmodult_Type = $Rooftop_Solar['Type'];
    $Pvmodult_Model = $Rooftop_Solar['Model'];
    $Pvmodult_Brand = $Rooftop_Solar['Brand'];
    $Pvmodult_Country = $Rooftop_Solar['Country'];
    $Pvmodult_Capacity = $Rooftop_Solar['Capacity'];
    $Pvmodult_Amount = $Rooftop_Solar['Amount'];
    $Pvmodult_Cost = $Rooftop_Solar['Cost'];
    $Pvmodult_Sum = $Rooftop_Solar['Sum'];
    insert_Rooftop_Solar($Pvmodult_Roof_ID, $Location_Type, $Pvmodult_Type, $Pvmodult_Model, $Pvmodult_Brand, $Pvmodult_Country, $Pvmodult_Capacity, $Pvmodult_Amount, $Pvmodult_Cost, $Pvmodult_Sum, $conn);
    $count = $count + 1;
}


$Rooftop_Inverter = json_decode($_POST['Rooftop_Inverter'], true);
if (!is_null($Rooftop_Inverter)) {
    $Inverter_Roof_ID = $Rooftop_Inverter['ID'] . $numsrt;
    $Pvmodult_Model = $Rooftop_Inverter['Model'];
    $Pvmodult_Brand = $Rooftop_Inverter['Brand'];
    $Pvmodult_Country = $Rooftop_Inverter['Country'];
    $Pvmodult_Capacity = $Rooftop_Inverter['Capacity'];
    $Pvmodult_Amount = $Rooftop_Inverter['Amount'];
    $Pvmodult_Cost = $Rooftop_Inverter['Cost'];
    $Pvmodult_Sum = $Rooftop_Inverter['Sum'];
    insert_Rooftop_Inverter($Inverter_Roof_ID, $Pvmodult_Model, $Pvmodult_Brand, $Pvmodult_Country, $Pvmodult_Capacity, $Pvmodult_Amount, $Pvmodult_Cost, $Pvmodult_Sum, $conn);
    $count = $count + 1;
}


$Location_Rooftop = json_decode($_POST['Location_Rooftop'], true);
if (!is_null($Location_Rooftop)) {
    $Location_Rooftop_ID = $Location_Rooftop['Location_ID'] . $numsrt;
    $Roof_Doc = $Location_Rooftop_ID . ".pdf";
    $newtmpName_Location_Rooftop = $_FILES['Roof_DOC']['tmp_name'];
    $fp_Location_Rooftop = fopen($newtmpName_Location_Rooftop, 'rb');
    $Roof_Doc = fread($fp_Location_Rooftop, filesize($newtmpName_Location_Rooftop));
    fclose($fp_Location_Rooftop);
    insert_Location_Rooftop($Location_Rooftop_ID, $Pvmodult_Roof_ID, $Inverter_Roof_ID, $conn, $konn);
    $count = $count + 1;
}


$Farm_Solar = json_decode($_POST['Farm_Solar'], true);
if (!is_null($Farm_Solar)) {
    $Pvmodult_Farm_ID = $Farm_Solar['ID'] . $numsrt;
    $Location_Type = $Farm_Solar['Location_Type'];
    $Pvmodult_Type = $Farm_Solar['Type'];
    $Pvmodult_Model = $Farm_Solar['Model'];
    $Pvmodult_Brand = $Farm_Solar['Brand'];
    $Pvmodult_Country = $Farm_Solar['Country'];
    $Pvmodult_Capacity = $Farm_Solar['Capacity'];
    $Pvmodult_Amount = $Farm_Solar['Amount'];
    $Pvmodult_Cost = $Farm_Solar['Cost'];
    $Pvmodult_Sum = $Farm_Solar['Sum'];
    insert_Farm_Solar($Pvmodult_Farm_ID, $Location_Type, $Pvmodult_Type, $Pvmodult_Model, $Pvmodult_Brand, $Pvmodult_Country, $Pvmodult_Capacity, $Pvmodult_Amount, $Pvmodult_Cost, $Pvmodult_Sum, $conn);
    $count = $count + 1;
}


$Farm_Inverter = json_decode($_POST['Farm_Inverter'], true);
if (!is_null($Farm_Inverter)) {
    $Inverter_Farm_ID = $Farm_Inverter['ID'] . $numsrt;
    $Pvmodult_Model = $Farm_Inverter['Model'];
    $Pvmodult_Brand = $Farm_Inverter['Brand'];
    $Pvmodult_Country = $Farm_Inverter['Country'];
    $Pvmodult_Capacity = $Farm_Inverter['Capacity'];
    $Pvmodult_Amount = $Farm_Inverter['Amount'];
    $Pvmodult_Cost = $Farm_Inverter['Cost'];
    $Pvmodult_Sum = $Farm_Inverter['Sum'];
    insert_Farm_Inverter($Inverter_Farm_ID, $Pvmodult_Model, $Pvmodult_Brand, $Pvmodult_Country, $Pvmodult_Capacity, $Pvmodult_Amount, $Pvmodult_Cost, $Pvmodult_Sum, $conn);
    $count = $count + 1;
}


$Location_Farm = json_decode($_POST['Location_Farm'], true);
if (!is_null($Location_Farm)) {
    $Location_Farm_ID = $Location_Farm['Location_ID'] . $numsrt;
    $Farm_Doc = $Location_Farm_ID . ".pdf";
    $newtmpName_Location_Farm = $_FILES['Farm_DOC']['tmp_name'];
    $fp_Location_Farm = fopen($newtmpName_Location_Farm, 'rb');
    $Farm_Doc = fread($fp_Location_Farm, filesize($newtmpName_Location_Farm));
    fclose($fp_Location_Farm);
    insert_Location_Farm($Location_Farm_ID, $Pvmodult_Farm_ID, $Inverter_Farm_ID, $conn, $konn);
    $count = $count + 1;
}


$Floating_Solar = json_decode($_POST['Floating_Solar'], true);
if (!is_null($Floating_Solar)) {
    $Pvmodult_Floating_ID = $Floating_Solar[0]['ID'] . $numsrt;
    $size_Floating_Solar = count($Floating_Solar);
    $totalFloating = $size_Floating_Solar;
    for ($i = 0; $i < $size_Floating_Solar; $i++) {
        $pool_number = $i + 1;
        $pool_detail = $Floating_Solar[$i]['pool_detail'];
        $water_detail = $Floating_Solar[$i]['water_detail'];
        $pool_area = $Floating_Solar[$i]['pool_area'];
        $floating_area = $Floating_Solar[$i]['floating_area'];
        $pool_percen = $Floating_Solar[$i]['pool_percen'];
        $Pvmodult_Type = $Floating_Solar[$i]['Type'];
        $Pvmodult_Model = $Floating_Solar[$i]['Model'];
        $Pvmodult_Brand = $Floating_Solar[$i]['Brand'];
        $Pvmodult_Country = $Floating_Solar[$i]['Country'];
        $Pvmodult_Capacity = $Floating_Solar[$i]['Capacity'];
        $Pvmodult_Amount = $Floating_Solar[$i]['Amount'];
        $Pvmodult_Cost = $Floating_Solar[$i]['Cost'];
        $Pvmodult_Sum = $Floating_Solar[$i]['Sum'];
        insert_Floating_Solar($Pvmodult_Floating_ID, $pool_number, $totalFloating, $pool_detail, $water_detail, $pool_area, $pool_percen, $floating_area, $Pvmodult_Type, $Pvmodult_Model, $Pvmodult_Brand, $Pvmodult_Country, $Pvmodult_Capacity, $Pvmodult_Amount, $Pvmodult_Cost, $Pvmodult_Sum, $conn);
    }
    $count = $count + 1;
}


$Floating_Inverter = json_decode($_POST['Floating_Inverter'], true);
if (!is_null($Floating_Inverter)) {
    $Inverter_Floating_ID = $Floating_Inverter['ID'] . $numsrt;
    $Pvmodult_Model = $Floating_Inverter['Model'];
    $Pvmodult_Brand = $Floating_Inverter['Brand'];
    $Pvmodult_Country = $Floating_Inverter['Country'];
    $Pvmodult_Capacity = $Floating_Inverter['Capacity'];
    $Pvmodult_Amount = $Floating_Inverter['Amount'];
    $Pvmodult_Cost = $Floating_Inverter['Cost'];
    $Pvmodult_Sum = $Floating_Inverter['Sum'];
    insert_Floating_Inverter($Inverter_Floating_ID, $Pvmodult_Model, $Pvmodult_Brand, $Pvmodult_Country, $Pvmodult_Capacity, $Pvmodult_Amount, $Pvmodult_Cost, $Pvmodult_Sum, $conn);
    $count = $count + 1;
}



$Location_Floating = json_decode($_POST['Location_Floating'], true);
if (!is_null($Location_Floating)) {
    $Location_Floating_ID = $Location_Floating['Location_ID'] . $numsrt;
    $Floating_DOC = $Location_Floating_ID . ".pdf";
    $newtmpName_Location_Floating = $_FILES['Floating_DOC']['tmp_name'];
    $fp_Location_Floating = fopen($newtmpName_Location_Floating, 'rb');
    $Floating_DOC = fread($fp_Location_Floating, filesize($newtmpName_Location_Floating));
    fclose($fp_Location_Floating);
    insert_Location_Floating($Location_Floating_ID, $Pvmodult_Floating_ID, $Inverter_Floating_ID, $conn, $konn);
    $count = $count + 1;
}


$ESS = json_decode($_POST['ESS'], true);
if (!is_null($ESS)) {
    $ESS_ID = $ESS['ID'] . $numsrt;
    $ESS_DOC = $ESS_ID . ".pdf";
    $ESS_Model = $ESS['Model'];
    $ESS_Brand = $ESS['Brand'];
    $ESS_Country = $ESS['Country'];
    $ESS_Capacity = $ESS['Capacity'];
    $ESS_Amount = $ESS['Amount'];
    $ESS_Sum = $ESS['Sum'];
    $newtmpName_ESS = $_FILES['ESS_DOC']['tmp_name'];
    $fp_ESS = fopen($newtmpName_ESS, 'rb');
    $ESS_DOC = fread($fp_ESS, filesize($newtmpName_ESS));
    fclose($fp_ESS);
    insert_ESS($ESS_ID, $ESS_Model, $ESS_Brand, $ESS_Country, $ESS_Capacity, $ESS_Amount, $ESS_Sum, $conn, $konn);
    $count = $count + 1;
}



$Equipment = json_decode($_POST['Equipment'], true);
if (!is_null($Equipment)) {
    $size_Equipment = count($Equipment);
    $Equipment_ID = $Equipment[0]['ID'] . $numsrt;
    for ($i = 0; $i < $size_Equipment; $i++) {
        $Descript = $Equipment[$i]['Descript'];
        insert_Equipment($Equipment_ID, $Descript, $conn);
    }
    $count = $count + 1;
}

$Tools = json_decode($_POST['Tools'], true);
if (!is_null($Tools)) {
    $Tools_ID = $Tools["ID"] . $numsrt;
    $Pvmodult_Total = $Tools['Pvmodult_Total'];
    $Inverter_Total = $Tools['Inverter_Total'];
    insert_Tools($Tools_ID, $Product_id, $Location_Rooftop_ID, $Location_Farm_ID, $Location_Floating_ID, $ESS_ID, $Equipment_ID, $Pvmodult_Total, $Inverter_Total, $conn);
    $count = $count + 1;
}


$Investment_Detail = json_decode($_POST['Investment_Detail'], true);
if (!is_null($Investment_Detail)) {
    $Investment_Detail_ID = $Investment_Detail['ID'] . $numsrt;
    $EPC_Name = $Investment_Detail['EPC_Name'];
    $Construction_Cost = $Investment_Detail['Construction_Cost'];
    $Machine_Pvmodule = $Investment_Detail['Machine_Pvmodule'];
    $Machine_Inverter = $Investment_Detail['Machine_Inverter'];
    $Machine_ESS = $Investment_Detail['Machine_ESS'];
    $Machine_Equipment = $Investment_Detail['Machine_Equipment'];
    $Machine_Info = $Investment_Detail['Machine_Info'];
    $Machine_Setup = $Investment_Detail['Machine_Setup'];
    $Machine_Trial = $Investment_Detail['Machine_Trial'];
    $Expenses = $Investment_Detail['Expenses'];
    $Asset = $Investment_Detail['Asset'];
    $Land_Value = $Investment_Detail['Land_Value'];
    $Academic = $Investment_Detail['Academic'];
    $Circulation = $Investment_Detail['Circulation'];
    $Result = $Investment_Detail['Result'];
    insert_Investment_Detail(
        $Investment_Detail_ID,
        $EPC_Name,
        $Construction_Cost,
        $Machine_Pvmodule,
        $Machine_Inverter,
        $Machine_ESS,
        $Machine_Equipment,
        $Machine_Info,
        $Machine_Setup,
        $Machine_Trial,
        $Expenses,
        $Asset,
        $Land_Value,
        $Academic,
        $Circulation,
        $Result,
        $conn
    );
    $count = $count + 1;
}


$System_installation_plan = json_decode($_POST['System_installation_plan'], true);
if (!is_null($System_installation_plan)) {
    $System_Installation_Plan_ID = $System_installation_plan['ID'] . $numsrt;
    $Survey = $System_installation_plan['Survey'] . "-01";
    $Procurement = $System_installation_plan['Procurement'] . "-01";
    $installation = $System_installation_plan['installation'] . "-01";
    $COD = $System_installation_plan['COD'] . "-01";
    insert_System_installation_plan($System_Installation_Plan_ID, $Survey, $Procurement, $installation, $COD, $conn);
    $count = $count + 1;
}


$ESA = json_decode($_POST['ESA'], true);
if (!is_null($ESA)) {
    $ESA_ID = $ESA['ID'] . $numsrt;
    $Name = $ESA['Name'];
    $Consult = $ESA['Consult'] . "-01";
    $Study = $ESA['Study'] . "-01";
    $Complete = $ESA['Complete'] . "-01";
    insert_ESA($ESA_ID, $Name, $Consult, $Study, $Complete, $conn);
    $count = $count + 1;
}


$Plans = json_decode($_POST['Plans'], true);
if (!is_null($Plans)) {
    $Plan_ID = $Plans["ID"] . $numsrt;
    insert_Plans($Plan_ID, $ESA_ID, $System_Installation_Plan_ID, $conn);
    $count = $count + 1;
}


$Solar_Request = json_decode($_POST['Solar_Request'], true);
if (!is_null($Solar_Request)) {
    $numsrt = sprintf('%05d', $num);
    $Doc_no = $Solar_Request["doc_no"] . $numsrt;
    $User_ID = $Solar_Request['User_ID'];
    $Type_of_business = '7.1.1.2';
    insert_Solar_Request($Doc_no, $Request_Number, $Product_id, $Investment_Detail_ID, $Plan_ID, $User_ID, $Type_of_business, $conn);
    insert_Transaction($Doc_no, $GLOBALS['Company'], $Type_of_business, $status, $position, $conn);
    insert_DOCUMENT($Doc_no, $Product_Doc, $Roof_Doc, $Farm_Doc, $Floating_DOC, $ESS_DOC, $konn);
    $count = $count + 1;
}

if ($count == 0) {
    echo "Restart";
} else {
    echo "ยื่นคำขอเสร็จสิ้น";
}