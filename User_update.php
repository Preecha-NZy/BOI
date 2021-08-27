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
function  update_Product_detail($Product_id, $Product_Name, $Company, $Contract_Name, $Contract_Name_Page, $Capacity, $Capacity_Page, $Location_No, $Location_Street, $Location_Subdistrict, $Location_district, $Location_Province, $Location_Page, $conn)
{
    $sql2 = "UPDATE Product_Detail SET  Product_Name=?, Company_Name=?, Contract_Name=?, Contract_Name_Page=?, Capacity=?, Capacity_Page=?, Location_No=?, Location_Street=?, Location_Subdistrict=?, Location_district=?, Location_Province=?, Location_Page=? WHERE Product_id= ?;";
    $params = array($Product_Name, $Company, $Contract_Name, $Contract_Name_Page, $Capacity, $Capacity_Page, $Location_No, $Location_Street, $Location_Subdistrict, $Location_district, $Location_Province, $Location_Page, $Product_id);
    $r_data = sqlsrv_query($conn, $sql2, $params);
    if ($r_data === false) {
        echo "ERROR 2 : #";
        die(print_r(sqlsrv_errors(), true));
    }
}
//-----------------------------------------------------------------------------------------------//

//-------------------------------insert_Rooftop_Solar----------------------------------------------//
function update_Rooftop_Solar($Pvmodult_Roof_ID, $Location_Type, $Pvmodult_Type, $Pvmodult_Model, $Pvmodult_Brand, $Pvmodult_Country, $Pvmodult_Capacity, $Pvmodult_Amount, $Pvmodult_Cost, $Pvmodult_Sum, $conn)
{

    $sql = "UPDATE Roof_solar SET Location_Type=? , Pvmodult_Type=? , Pvmodult_Model=? , Pvmodult_Brand=? , Pvmodult_Country=? , Pvmodult_Capacity=? , Pvmodult_Amount=? , Pvmodult_Cost=? , Pvmodult_Sum=? WHERE Pvmodult_Roof_ID=?";
    $params = array($Location_Type, $Pvmodult_Type, $Pvmodult_Model, $Pvmodult_Brand, $Pvmodult_Country, $Pvmodult_Capacity, $Pvmodult_Amount, $Pvmodult_Cost, $Pvmodult_Sum, $Pvmodult_Roof_ID);
    $r_data = sqlsrv_query($conn, $sql, $params);
    if ($r_data === false) {
        echo "ERROR 3 : #";
        die(print_r(sqlsrv_errors(), true));
    }
}
//-----------------------------------------------------------------------------------------------//


//-------------------------------insert_Rooftop_Inverter----------------------------------------------//
function update_Rooftop_Inverter($Inverter_Roof_ID, $Pvmodult_Model, $Pvmodult_Brand, $Pvmodult_Country, $Pvmodult_Capacity, $Pvmodult_Amount, $Pvmodult_Cost, $Pvmodult_Sum, $conn)
{

    $sql = "UPDATE Roof_inverter SET Inverter_Model=?, Inverter_Brand=?, Inverter_Country=?, Inverter_Capacity=?, Inverter_Amount=?, Inverter_Cost=?, Inverter_Sum=? WHERE Inverter_Roof_ID=?";
    $params = array($Pvmodult_Model, $Pvmodult_Brand, $Pvmodult_Country, $Pvmodult_Capacity, $Pvmodult_Amount, $Pvmodult_Cost, $Pvmodult_Sum, $Inverter_Roof_ID);
    $r_data = sqlsrv_query($conn, $sql, $params);
    if ($r_data === false) {
        echo "ERROR 4 : #";
        die(print_r(sqlsrv_errors(), true));
    }
}
//-----------------------------------------------------------------------------------------------//

//---------------------------insert Location Rooftop Keys and Doc -------------------------------//
function update_Location_Rooftop($Location_Rooftop_ID, $Pvmodult_Roof_ID, $Inverter_Roof_ID, $conn, $konn)
{

    $sql2 = "UPDATE Location_Rooftop SET Pvmodult_Roof_ID=?, Inverter_Roof_ID=? WHERE Location_Rooftop_ID=? ";
    $params = array($Pvmodult_Roof_ID, $Inverter_Roof_ID, $Location_Rooftop_ID);
    $r_data = sqlsrv_query($conn, $sql2, $params);
    if ($r_data === false) {
        echo "ERROR 6 : #";
        die(print_r(sqlsrv_errors(), true));
    }
}
//-----------------------------------------------------------------------------------------------//

//-----------------------------------insert_Farm_Solar------------------------------------------------------------//
function update_Farm_Solar($Pvmodult_Farm_ID, $Location_Type, $Pvmodult_Type, $Pvmodult_Model, $Pvmodult_Brand, $Pvmodult_Country, $Pvmodult_Capacity, $Pvmodult_Amount, $Pvmodult_Cost, $Pvmodult_Sum, $conn)
{

    $sql = "UPDATE Farm_solar SET Location_Type=?, Pvmodult_Type=?, Pvmodult_Model=?, Pvmodult_Brand=?, Pvmodult_Country=?, Pvmodult_Capacity=?, Pvmodult_Amount=?, Pvmodult_Cost=?, Pvmodult_Sum=? WHERE Pvmodult_Farm_ID=?";
    $params = array($Location_Type, $Pvmodult_Type, $Pvmodult_Model, $Pvmodult_Brand, $Pvmodult_Country, $Pvmodult_Capacity, $Pvmodult_Amount, $Pvmodult_Cost, $Pvmodult_Sum, $Pvmodult_Farm_ID);
    $r_data = sqlsrv_query($conn, $sql, $params);
    if ($r_data === false) {
        echo "ERROR 7 : #";
        die(print_r(sqlsrv_errors(), true));
    }
}
//-----------------------------------------------------------------------------------------------//

//------------------------------------insert_Farm_Inverter-----------------------------------------------------------//
function update_Farm_Inverter($Inverter_Farm_ID, $Pvmodult_Model, $Pvmodult_Brand, $Pvmodult_Country, $Pvmodult_Capacity, $Pvmodult_Amount, $Pvmodult_Cost, $Pvmodult_Sum, $conn)
{

    $sql = "UPDATE Farm_inverter SET Inverter_Model=?, Inverter_Brand=?, Inverter_Country=?, Inverter_Capacity=?, Inverter_Amount=?, Inverter_Cost=?, Inverter_Sum=? WHERE Inverter_Farm_ID =?";
    $params = array($Pvmodult_Model, $Pvmodult_Brand, $Pvmodult_Country, $Pvmodult_Capacity, $Pvmodult_Amount, $Pvmodult_Cost, $Pvmodult_Sum, $Inverter_Farm_ID);
    $r_data = sqlsrv_query($conn, $sql, $params);
    if ($r_data === false) {
        echo "ERROR 8 : #";
        die(print_r(sqlsrv_errors(), true));
    }
}
//-----------------------------------------------------------------------------------------------//

//-------------------------insert_Location_Farm and DOC------------------------------------//
function update_Location_Farm($Location_Farm_ID, $Pvmodult_Farm_ID, $Inverter_Farm_ID, $conn, $konn)
{

    $sql2 = "UPDATE  Location_Farm SET Pvmodult_Farm_ID=?, Inverter_Farm_ID=? WHERE Location_Farm_ID=?";
    $params = array($Pvmodult_Farm_ID, $Inverter_Farm_ID, $Location_Farm_ID);
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
function update_Floating_Inverter($Inverter_Floating_ID, $Pvmodult_Model, $Pvmodult_Brand, $Pvmodult_Country, $Pvmodult_Capacity, $Pvmodult_Amount, $Pvmodult_Cost, $Pvmodult_Sum, $conn)
{
    $sql = "UPDATE Floating_inverter SET Inverter_Model=?, Inverter_Brand=?, Inverter_Country=?, Inverter_Capacity=?, Inverter_Amount=?, Inverter_Cost=?, Inverter_Sum=? WHERE Inverter_Floating_ID=? ";
    $params = array($Pvmodult_Model, $Pvmodult_Brand, $Pvmodult_Country, $Pvmodult_Capacity, $Pvmodult_Amount, $Pvmodult_Cost, $Pvmodult_Sum, $Inverter_Floating_ID);
    $r_data = sqlsrv_query($conn, $sql, $params);
    if ($r_data === false) {
        echo "ERROR 12 : #";
        die(print_r(sqlsrv_errors(), true));
    }
}
//-----------------------------------------------------------------------------------------------//

//----------------------------insert_Location_Floating and DOC-------------------------------//
function update_Location_Floating($Location_Floating_ID, $Pvmodult_Floating_ID, $Inverter_Floating_ID, $conn, $konn)
{

    $sql2 = "UPDATE  Location_Floating SET Pvmodult_Floating_ID=?, Inverter_Floating_ID=? WHERE Location_Floating_ID =?";
    $params = array($Pvmodult_Floating_ID, $Inverter_Floating_ID, $Location_Floating_ID);
    $r_data = sqlsrv_query($conn, $sql2, $params);
    if ($r_data === false) {
        echo "ERROR 14 : #";
        die(print_r(sqlsrv_errors(), true));
    }
}

//-----------------------------------------------------------------------------------------------//

//-----------------------------insert_ESS and DOC--------------------------------------------------//
function update_ESS($ESS_ID, $ESS_Model, $ESS_Brand, $ESS_Country, $ESS_Capacity, $ESS_Amount, $ESS_Cost, $ESS_Sum, $conn, $konn)
{


    $sql2 = "UPDATE ESS SET ESS_Model=?, ESS_Brand=?, ESS_Country=?, ESS_Capacity=?, ESS_Amount=?, ESS_Cost=?, ESS_Sum=? WHERE ESS_ID=?";
    $params = array($ESS_Model, $ESS_Brand, $ESS_Country, $ESS_Capacity, $ESS_Amount, $ESS_Cost, $ESS_Sum, $ESS_ID);
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
function update_Tools($Tools_ID, $Pvmodult_Total, $Inverter_Total, $conn)
{

    $sql = "UPDATE Tools SET Pvmodult_Total=?, Inverter_Total=? WHERE Tools_ID =? ";
    $params = array($Pvmodult_Total, $Inverter_Total, $Tools_ID);
    $r_data = sqlsrv_query($conn, $sql, $params);
    if ($r_data === false) {
        echo "ERROR 18 : #";
        die(print_r(sqlsrv_errors(), true));
    }
}
//-----------------------------------------------------------------------------------------------//

//------------------------------Investment_Detail----------------------------------------------------//
function  update_Investment_Detail($Investment_Detail_ID, $EPC_Name, $Construction_Cost, $Machine_Pvmodule, $Machine_Inverter, $Machine_ESS, $Machine_Equipment, $Machine_Info, $Machine_Setup, $Machine_Trial, $Expenses, $Asset, $Land_Value, $Academic, $Circulation, $Result, $conn)
{
    $sql = "UPDATE Investment_Detail SET EPC_Name=?, Construction_Cost=?, Machine_Pvmodule=?, Machine_Inverter=?, Machine_ESS=?, Machine_Equipment=?, Machine_Info=?, Machine_Setup=?, Machine_Trial=?, Expenses=?, Asset=?, Land_Value=?, Academic=?, Circulation=?, Result=? WHERE Investment_Detail_ID =?";
    $params = array($EPC_Name, $Construction_Cost, $Machine_Pvmodule, $Machine_Inverter, $Machine_ESS, $Machine_Equipment, $Machine_Info, $Machine_Setup, $Machine_Trial, $Expenses, $Asset, $Land_Value, $Academic, $Circulation, $Result, $Investment_Detail_ID);
    $r_data = sqlsrv_query($conn, $sql, $params);
    if ($r_data === false) {
        echo "ERROR 19 : #";
        die(print_r(sqlsrv_errors(), true));
    }
}
//-----------------------------------------------------------------------------------------------//


//--------------------------insert_System_installation_plan--------------------------------------//
function update_System_installation_plan($System_Installation_Plan_ID, $Survey, $Procurement, $installation, $COD, $conn)
{

    $sql = "UPDATE System_Installation_Plan SET Plan_Survey=?, Plan_Procurement=?, Plan_installation=?, Plan_COD=? WHERE System_Installation_Plan_ID =?";
    $params = array($Survey, $Procurement, $installation, $COD, $System_Installation_Plan_ID);
    $r_data = sqlsrv_query($conn, $sql, $params);
    if ($r_data === false) {
        echo "ERROR 20 : #";
        die(print_r(sqlsrv_errors(), true));
    }
}
//-----------------------------------------------------------------------------------------------//


//-----------------------------------insert_ESA-------------------------------------------//
function update_ESA($ESA_ID, $Name, $Consult, $Study, $Complete, $conn)
{

    $sql = "UPDATE ESA SET ESA_Name=?, ESA_Consult=?, ESA_Study=?, ESA_Complete=? WHERE ESA_ID=?";
    $params = array($Name, $Consult, $Study, $Complete, $ESA_ID);
    $r_data = sqlsrv_query($conn, $sql, $params);
    if ($r_data === false) {
        echo "ERROR 21 : #";
        die(print_r(sqlsrv_errors(), true));
    }
}

//-----------------------------------------------------------------------------------------------//

function insertTransaction($doc_no, $requestNumber, $date, $conn)
{
    $requestDate = get_requestDate($doc_no, $conn);
    $assigneeName = get_assigneeName($doc_no, $conn);
    $assignorName = get_assignorName($doc_no, $conn);
    $receiveDate = get_receiveDate($doc_no, $conn);
    $status = "อยู่ระหว่างตรวจสอบแก้ไข";
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

function get_assigneeName($doc_no, $conn)
{
    $sql = "select ชื่อผู้มอบหมาย from ธุรกรรมล่าสุด where doc_no = '" . $doc_no . "'";
    $result = sqlsrv_query($conn, $sql);
    $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
    $keys = array_keys($row);
    return $row[$keys[0]];
}

function get_assignorName($doc_no, $conn)
{
    $sql = "select ชื่อผู้รับมอบหมาย from ธุรกรรมล่าสุด where doc_no = '" . $doc_no . "'";
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

function updateEditHistory($doc_no, $conn) {
    $count = fetch_editCount($doc_no, $conn);
    $status = 'แก้ไขคำขอเสร็จสิ้น';
    $sql = "UPDATE ประวัติแก้ไขคำขอ SET สถานะ=? WHERE doc_no=? and แก้ครังที่=?";
    $params = array($status, $doc_no, $count);
    $r_data = sqlsrv_query($conn, $sql, $params);
    if ($r_data === false) {
        echo "ERROR 23 : #";
        die(print_r(sqlsrv_errors(), true));
    }
}

function deleteESA($ID, $conn) {
    $sql = "UPDATE Plans SET ESA_ID = null";
    $r_data = sqlsrv_query($conn, $sql);
    if ($r_data === false) {
        echo "ERROR 24 : #";
        die(print_r(sqlsrv_errors(), true));
    }  

    $sql = "delete ESA where ESA_ID =  '".$ID."'";
    $r_data = sqlsrv_query($conn, $sql);
    if ($r_data === false) {
        echo "ERROR 25 : #";
        die(print_r(sqlsrv_errors(), true));
    }  
}

function fetch_editCount($doc_no, $conn)
{
    $count = 0;
    $i = 0;
    $sql = "select COUNT(doc_no) from ประวัติแก้ไขคำขอ WHERE doc_no ='".$doc_no."'";
    $result = sqlsrv_query($conn, $sql);
    while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
        $keys = array_keys($row);
        $count = $row[$keys[0]];
    }
    return $count;
}
//-----------------------------------------------------------------------------------------------//

function update_DOCUMENT($Doc_no, $Product_Doc, $Roof_Doc, $Farm_Doc, $Floating_DOC, $ESS_DOC, $konn)
{

    $sql = "UPDATE DOCUMENT SET  Product_DOC=SELECT CONVERT(VARBINARY(MAX),?) ,Roof_DOC=SELECT CONVERT(VARBINARY(MAX),?) ,Farm_DOC=SELECT CONVERT(VARBINARY(MAX),?) ,Floating_DOC=SELECT CONVERT(VARBINARY(MAX),?) ,ESS_DOC=SELECT CONVERT(VARBINARY(MAX),?)  WHERE Doc_no=? ";
    $parametri = array($Doc_no, $Product_Doc, $Roof_Doc, $Farm_Doc, $Floating_DOC, $ESS_DOC);
    $r_blob = sqlsrv_query($konn, $sql, $parametri);
    if ($r_blob === false) {
        echo "ERROR 1 : #";
        die(print_r(sqlsrv_errors(), true));
    }
}

function fetch_productID($doc_no, $conn)
{

    $ID = [];
    $i = 0;
    $sql = "select Product_id from Product_Detail where exists (
                select * from Solar_Request where Solar_Request.ProductDetail_ID = Product_Detail.Product_id and Solar_Request.Doc_no = '" . $doc_no . "')";
    $result = sqlsrv_query($conn, $sql);
    $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
    $keys = array_keys($row);
    $ID[0]['ID'] = $row[$keys[0]];
    return $ID[0]['ID'];
}

function fetch_toolsID($doc_no, $conn)
{
    $ID = [];
    $i = 0;
    $sql = "select Tools_ID from Tools WHERE exists (
        select * from Solar_Request where Solar_Request.ProductDetail_ID = Tools.Product_ID and Solar_Request.Doc_no = '" . $doc_no . "')";
    $result = sqlsrv_query($conn, $sql);
    $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
    $keys = array_keys($row);
    $ID[0]['ID'] = $row[$keys[0]];
    return $ID[0]['ID'];
}

function fetch_roofSolarID($doc_no, $conn)
{
    $ID = [];
    $i = 0;
    $sql = "select Pvmodult_Roof_ID FROM Roof_solar WHERE exists (
                select * from Location_Rooftop where Location_Rooftop.Roof_Solar_ID = Roof_solar.Pvmodult_Roof_ID 
                and Location_Rooftop.Location_Rooftop_ID = (
                    select Location_Rooftop_ID from Tools where Tools.Product_ID = (select ProductDetail_ID from Solar_Request where Doc_no = '" . $doc_no . "')))";
    $result = sqlsrv_query($conn, $sql);
    $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
    $keys = array_keys($row);
    $ID[0]['ID'] = $row[$keys[0]];
    return $ID[0]['ID'];
}

function fetch_roofIVTID($doc_no, $conn)
{
    $ID = [];
    $i = 0;
    $sql = "select Inverter_Roof_ID FROM Roof_inverter WHERE exists (
                    select * from Location_Rooftop where Location_Rooftop.Roof_Inverter_ID = Roof_inverter.Inverter_Roof_ID 
                    and Location_Rooftop.Location_Rooftop_ID = (
                        select Location_Rooftop_ID from Tools where Tools.Product_ID = (select ProductDetail_ID from Solar_Request where Doc_no = '" . $doc_no . "')))";
    $result = sqlsrv_query($conn, $sql);
    $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
    $keys = array_keys($row);
    $ID[0]['ID'] = $row[$keys[0]];
    return $ID[0]['ID'];
}

function fetch_farmSolarID($doc_no, $conn)
{
    $ID = [];
    $i = 0;
    $sql = "select Pvmodult_Farm_ID FROM Farm_solar WHERE exists (
                select * from Location_Farm where Location_Farm.Farm_Solar_ID = Farm_solar.Pvmodult_Farm_ID 
                and Location_Farm.Location_Farm_ID = (
                    select Location_Farm_ID from Tools where Tools.Product_ID = (select ProductDetail_ID from Solar_Request where Doc_no = '" . $doc_no . "')))";
    $result = sqlsrv_query($conn, $sql);
    $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
    $keys = array_keys($row);
    $ID[0]['ID'] = $row[$keys[0]];
    return $ID[0]['ID'];
}

function fetch_farmIVTID($doc_no, $conn)
{
    $ID = [];
    $i = 0;
    $sql = "select Inverter_Farm_ID FROM Farm_inverter WHERE exists (
                select * from Location_Farm where Location_Farm.Farm_Inverter_ID = Farm_inverter.Inverter_Farm_ID 
                and Location_Farm.Location_Farm_ID = (
                    select Location_Farm_ID from Tools where Tools.Product_ID = (select ProductDetail_ID from Solar_Request where Doc_no = '" . $doc_no . "')))";
    $result = sqlsrv_query($conn, $sql);
    $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
    $keys = array_keys($row);
    $ID[0]['ID'] = $row[$keys[0]];
    return $ID[0]['ID'];
}

function fetch_floatingSolarID($doc_no, $conn)
{
    $ID = [];
    $i = 0;
    $sql = "select Pvmodult_Floating_ID FROM Floating_solar WHERE exists (
                select * from Location_Floating where Location_Floating.Floating_Solar_ID = Floating_solar.Pvmodult_Floating_ID 
                and Location_Floating.Location_Floating_ID = (
                    select Location_Floating_ID from Tools where Tools.Product_ID = (select ProductDetail_ID from Solar_Request where Doc_no = '" . $doc_no . "')))";
    $result = sqlsrv_query($conn, $sql);
    $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
    $keys = array_keys($row);
    $ID[0]['ID'] = $row[$keys[0]];
    return $ID[0]['ID'];
}

function fetch_floatingIVTID($doc_no, $conn)
{
    $ID = [];
    $i = 0;
    $sql = "select Inverter_Floating_ID FROM Floating_inverter WHERE exists (
                select * from Location_Floating where Location_Floating.Floating_Inverter_ID = Floating_inverter.Inverter_Floating_ID 
                and Location_Floating.Location_Floating_ID = (
                    select Location_Floating_ID from Tools where Tools.Product_ID = (select ProductDetail_ID from Solar_Request where Doc_no = '" . $doc_no . "')))";
    $result = sqlsrv_query($conn, $sql);
    $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
    $keys = array_keys($row);
    $ID[0]['ID'] = $row[$keys[0]];
    return $ID[0]['ID'];
}

function fetch_essID($doc_no, $conn)
{
    $ID = [];
    $i = 0;
    $sql = "select ESS_ID from ESS where exists (
                select * from Tools where Tools.ESS_ID = ESS.ESS_ID 
                and Tools.Product_ID = (
                    select ProductDetail_ID from Solar_Request where Doc_no = '" . $doc_no . "'))";
    $result = sqlsrv_query($conn, $sql);
    $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
    $keys = array_keys($row);
    $ID[0]['ID'] = $row[$keys[0]];
    return $ID[0]['ID'];
}

function fetch_etcID($doc_no, $conn)
{
    $ID = [];
    $i = 0;
    $sql = "select Equipment_ID from Equipment WHERE exists (
                select * from Tools where Tools.Equipment_ID = Equipment.Equipment_ID
                and Tools.Product_ID = (
                    select ProductDetail_ID from Solar_Request where Doc_no = '" . $doc_no . "'))";
    $result = sqlsrv_query($conn, $sql);
    $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
    $keys = array_keys($row);
    $ID[0]['ID'] = $row[$keys[0]];
    return $ID[0]['ID'];
}

function fetch_ivmID($doc_no, $conn)
{
    $ID = [];
    $i = 0;
    $sql = "select Investment_Detail_ID from Investment_Detail WHERE exists (
                select * from Solar_Request where Solar_Request.InvestmentDetail_ID = Investment_Detail.Investment_Detail_ID and Doc_no = '" . $doc_no . "')";
    $result = sqlsrv_query($conn, $sql);
    $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
    $keys = array_keys($row);
    $ID[0]['ID'] = $row[$keys[0]];
    return $ID[0]['ID'];
}

function fetch_sipID($doc_no, $conn)
{
    $ID = [];
    $i = 0;
    $sql = "select System_Installation_Plan_ID from System_Installation_Plan WHERE exists (
                select * from Plans where Plans.System_Installation_Plan_ID = System_Installation_Plan.System_Installation_Plan_ID
                and Plans.Plan_ID = (select Plans_ID from Solar_Request where Doc_no = '" . $doc_no . "'))";
    $result = sqlsrv_query($conn, $sql);
    $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
    $keys = array_keys($row);
    $ID[0]['ID'] = $row[$keys[0]];
    return $ID[0]['ID'];
}

function fetch_esaID($doc_no, $conn)
{
    $ID = [];
    $i = 0;
    $sql = "select ESA_ID from ESA WHERE exists (
                select * from Plans where Plans.ESA_ID = ESA.ESA_ID
                and Plan_ID = (select Plans_ID from Solar_Request where Doc_no = '" . $doc_no . "'))";
    $result = sqlsrv_query($conn, $sql);
    $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
    $keys = array_keys($row);
    $ID[0]['ID'] = $row[$keys[0]];
    return $ID[0]['ID'];
}

function deleteFloatingSolar($id, $conn)
{
    $sql = "delete from Floating_solar where Pvmodult_Floating_ID = '" . $id . "'";
    $result = sqlsrv_query($conn, $sql);
    $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
}

function deleteEquipment($id, $conn)
{
    $sql = "delete from Equipment where Equipment_ID = '" . $id . "'";
    $result = sqlsrv_query($conn, $sql);
    $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
}

function fetch_requestID($doc_no, $conn)
{
    $ID = [];
    $sql = "select เลขคำขอ from ธุรกรรมล่าสุด where doc_no = '" . $doc_no . "'";
    $result = sqlsrv_query($conn, $sql);
    $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
    $keys = array_keys($row);
    $ID[0]['ID'] = $row[$keys[0]];
    return $ID[0]['ID'];
}

function insert_ESA($doc_no, $ID, $Name, $Consult, $Study, $Complete, $conn)
{
    $sql = "SELECT Doc_no FROM Solar_Request where Doc_no = '".$doc_no."'";
    $stmt = sqlsrv_query($conn, $sql);
    if ($stmt === false) {
        echo "ERROR 24 : #";
        die(print_r(sqlsrv_errors(), true));
    }
    $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_NUMERIC);
    $numsrt = substr($row[0], -3);
    $ESA_ID = $ID. $numsrt;

    $sql = "INSERT INTO ESA VALUES (?,?,?,?,?)";
    $params = array($ESA_ID, $Name, $Consult, $Study, $Complete);
    $r_data = sqlsrv_query($conn, $sql, $params);
    if ($r_data === false) {
        echo "ERROR 99 : #";
        die(print_r(sqlsrv_errors(), true));
    }

    $sql = "update Plans set ESA_ID = ? WHERE Plan_ID = (select  Plans_ID  from Solar_Request WHERE Doc_no = '".$doc_no."')";
    $params = array($ESA_ID);
    $r_data = sqlsrv_query($conn, $sql, $params);

    if ($r_data === false) {
        echo "ERROR 100 : #";
        die(print_r(sqlsrv_errors(), true));
    }
}


$name = $_POST['Name'];
$doc_no = $_POST['doc_no'];
$status = 'รอยืนยันคำขอ';
$date = $_POST['date'];
$numsrt = sprintf('%03d', $num);
$Product_id = fetch_productID($doc_no, $conn);
$Pvmodult_Roof_ID = fetch_roofSolarID($doc_no, $conn);
$Inverter_Roof_ID = fetch_roofIVTID($doc_no, $conn);
$Pvmodult_Farm_ID = fetch_farmSolarID($doc_no, $conn);
$Inverter_Farm_ID = fetch_farmIVTID($doc_no, $conn);
$Pvmodult_Floating_ID = fetch_floatingSolarID($doc_no, $conn);
$Inverter_Floating_ID = fetch_floatingIVTID($doc_no, $conn);
$ESS_ID = fetch_essID($doc_no, $conn);
$Equipment_ID = fetch_etcID($doc_no, $conn);
$Tools_ID = fetch_toolsID($doc_no, $conn);
$Investment_Detail_ID = fetch_ivmID($doc_no, $conn);
$System_Installation_Plan_ID = fetch_sipID($doc_no, $conn);
$ESA_ID = fetch_esaID($doc_no, $conn);
$Request_Number = fetch_requestID($doc_no, $conn);
$count = 0;


$Product_detail = json_decode($_POST['Product_detail'], true);
if (!is_null($Product_detail)) {
    $Document_number = $Product_id . ".pdf";
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
    update_Product_detail($Product_id, $Product_Name, $Company, $Contract_Name, $Contract_Name_Page, $Capacity, $Capacity_Page, $Location_No, $Location_Street, $Location_Subdistrict, $Location_district, $Location_Province, $Location_Page, $conn);
    $count = $count + 1;
}



$Rooftop_Solar = json_decode($_POST['Rooftop_Solar'], true);
if (!is_null($Rooftop_Solar)) {
    $Location_Type = $Rooftop_Solar['Location_Type'];
    $Pvmodult_Type = $Rooftop_Solar['Type'];
    $Pvmodult_Model = $Rooftop_Solar['Model'];
    $Pvmodult_Brand = $Rooftop_Solar['Brand'];
    $Pvmodult_Country = $Rooftop_Solar['Country'];
    $Pvmodult_Capacity = $Rooftop_Solar['Capacity'];
    $Pvmodult_Amount = $Rooftop_Solar['Amount'];
    $Pvmodult_Cost = $Rooftop_Solar['Cost'];
    $Pvmodult_Sum = $Rooftop_Solar['Sum'];
    update_Rooftop_Solar($Pvmodult_Roof_ID, $Location_Type, $Pvmodult_Type, $Pvmodult_Model, $Pvmodult_Brand, $Pvmodult_Country, $Pvmodult_Capacity, $Pvmodult_Amount, $Pvmodult_Cost, $Pvmodult_Sum, $conn);
    $count = $count + 1;
}


$Rooftop_Inverter = json_decode($_POST['Rooftop_Inverter'], true);
if (!is_null($Rooftop_Inverter)) {
    $Pvmodult_Model = $Rooftop_Inverter['Model'];
    $Pvmodult_Brand = $Rooftop_Inverter['Brand'];
    $Pvmodult_Country = $Rooftop_Inverter['Country'];
    $Pvmodult_Capacity = $Rooftop_Inverter['Capacity'];
    $Pvmodult_Amount = $Rooftop_Inverter['Amount'];
    $Pvmodult_Cost = $Rooftop_Inverter['Cost'];
    $Pvmodult_Sum = $Rooftop_Inverter['Sum'];
    update_Rooftop_Inverter($Inverter_Roof_ID, $Pvmodult_Model, $Pvmodult_Brand, $Pvmodult_Country, $Pvmodult_Capacity, $Pvmodult_Amount, $Pvmodult_Cost, $Pvmodult_Sum, $conn);
    $count = $count + 1;
}

$Farm_Solar = json_decode($_POST['Farm_Solar'], true);
if (!is_null($Farm_Solar)) {
    $Location_Type = $Farm_Solar['Location_Type'];
    $Pvmodult_Type = $Farm_Solar['Type'];
    $Pvmodult_Model = $Farm_Solar['Model'];
    $Pvmodult_Brand = $Farm_Solar['Brand'];
    $Pvmodult_Country = $Farm_Solar['Country'];
    $Pvmodult_Capacity = $Farm_Solar['Capacity'];
    $Pvmodult_Amount = $Farm_Solar['Amount'];
    $Pvmodult_Cost = $Farm_Solar['Cost'];
    $Pvmodult_Sum = $Farm_Solar['Sum'];
    update_Farm_Solar($Pvmodult_Farm_ID, $Location_Type, $Pvmodult_Type, $Pvmodult_Model, $Pvmodult_Brand, $Pvmodult_Country, $Pvmodult_Capacity, $Pvmodult_Amount, $Pvmodult_Cost, $Pvmodult_Sum, $conn);
    $count = $count + 1;
}


$Farm_Inverter = json_decode($_POST['Farm_Inverter'], true);
if (!is_null($Farm_Inverter)) {
    $Pvmodult_Model = $Farm_Inverter['Model'];
    $Pvmodult_Brand = $Farm_Inverter['Brand'];
    $Pvmodult_Country = $Farm_Inverter['Country'];
    $Pvmodult_Capacity = $Farm_Inverter['Capacity'];
    $Pvmodult_Amount = $Farm_Inverter['Amount'];
    $Pvmodult_Cost = $Farm_Inverter['Cost'];
    $Pvmodult_Sum = $Farm_Inverter['Sum'];
    update_Farm_Inverter($Inverter_Farm_ID, $Pvmodult_Model, $Pvmodult_Brand, $Pvmodult_Country, $Pvmodult_Capacity, $Pvmodult_Amount, $Pvmodult_Cost, $Pvmodult_Sum, $conn);
    $count = $count + 1;
}

$Floating_Solar = json_decode($_POST['Floating_Solar'], true);
if (!is_null($Floating_Solar)) {
    deleteFloatingSolar($Pvmodult_Floating_ID, $conn);
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
    $Pvmodult_Model = $Floating_Inverter['Model'];
    $Pvmodult_Brand = $Floating_Inverter['Brand'];
    $Pvmodult_Country = $Floating_Inverter['Country'];
    $Pvmodult_Capacity = $Floating_Inverter['Capacity'];
    $Pvmodult_Amount = $Floating_Inverter['Amount'];
    $Pvmodult_Cost = $Floating_Inverter['Cost'];
    $Pvmodult_Sum = $Floating_Inverter['Sum'];
    update_Floating_Inverter($Inverter_Floating_ID, $Pvmodult_Model, $Pvmodult_Brand, $Pvmodult_Country, $Pvmodult_Capacity, $Pvmodult_Amount, $Pvmodult_Cost, $Pvmodult_Sum, $conn);
    $count = $count + 1;
}


$ESS = json_decode($_POST['ESS'], true);
if (!is_null($ESS)) {
    $ESS_DOC = $ESS_ID . ".pdf";
    $ESS_Model = $ESS['Model'];
    $ESS_Brand = $ESS['Brand'];
    $ESS_Country = $ESS['Country'];
    $ESS_Capacity = $ESS['Capacity'];
    $ESS_Amount = $ESS['Amount'];
    $ESS_Cost = $ESS['Cost'];
    $ESS_Sum = $ESS['Sum'];
    $newtmpName_ESS = $_FILES['ESS_DOC']['tmp_name'];
    $fp_ESS = fopen($newtmpName_ESS, 'rb');
    $ESS_DOC = fread($fp_ESS, filesize($newtmpName_ESS));
    fclose($fp_ESS);
    update_ESS($ESS_ID, $ESS_Model, $ESS_Brand, $ESS_Country, $ESS_Capacity, $ESS_Amount, $ESS_Cost, $ESS_Sum, $conn, $konn);
    $count = $count + 1;
}


$Equipment = json_decode($_POST['Equipment'], true);
if (!is_null($Equipment)) {
    deleteEquipment($Equipment_ID, $conn);
    $size_Equipment = count($Equipment);
    for ($i = 0; $i < $size_Equipment; $i++) {
        $Descript = $Equipment[$i]['Descript'];
        insert_Equipment($Equipment_ID, $Descript, $conn);
    }
    $count = $count + 1;
}

$Tools = json_decode($_POST['Tools'], true);
if (!is_null($Tools)) {
    $Pvmodult_Total = $Tools['Pvmodult_Total'];
    $Inverter_Total = $Tools['Inverter_Total'];
    update_Tools($Tools_ID, $Pvmodult_Total, $Inverter_Total, $conn);
    $count = $count + 1;
}


$Investment_Detail = json_decode($_POST['Investment_Detail'], true);
if (!is_null($Investment_Detail)) {
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
    update_Investment_Detail(
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
    $Survey = $System_installation_plan['Survey'] . "-01";
    $Procurement = $System_installation_plan['Procurement'] . "-01";
    $installation = $System_installation_plan['installation'] . "-01";
    $COD = $System_installation_plan['COD'] . "-01";
    update_System_installation_plan($System_Installation_Plan_ID, $Survey, $Procurement, $installation, $COD, $conn);
    $count = $count + 1;
}


$ESA = json_decode($_POST['ESA'], true);
if (!is_null($ESA)) {
    $Name = $ESA['Name'];
    $Consult = $ESA['Consult'] . "-01";
    $Study = $ESA['Study'] . "-01";
    $Complete = $ESA['Complete'] . "-01";
    if (is_null($ESA_ID)) {
        insert_ESA($doc_no, $ESA['ID'], $Name, $Consult, $Study, $Complete, $conn);
    }
    else {
        update_ESA($ESA_ID, $Name, $Consult, $Study, $Complete, $conn);
    }
    $count = $count + 1;
}

if (!is_null($_POST['deleteESA'])) {
    deleteESA($ESA_ID, $conn);
}

insertTransaction($doc_no, $Request_Number, $date, $conn);
updateEditHistory($doc_no, $conn);


if ($count == 0) {
    echo "Restart";
} else {
    echo "แก้ไขคำขอเสร็จสิ้น";
}