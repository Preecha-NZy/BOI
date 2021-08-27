<?php
class adminDB
{

    function __construct()
    {
        $serverName = "10.111.41.206";
        $connectionInfo = array("Database" => "boi_solar", "UID" => "solar-user", "PWD" => "nl69KSAuNLE24mR5ytLCj8XI4", "Characterset" => "UTF-8");
        $conn = sqlsrv_connect($serverName, $connectionInfo);
        $this->dbcon = $conn;
        if ($conn === false) {
            die(print_r(sqlsrv_errors(), true));
        }
    }

    public function fetchRequestHistory($doc_no)
    {
        $requestHistory = [];
        $i = 0;
        $sql = "select doc_no, เลขคำขอ, format(วันที่มอบหมาย, 'dd/MM/yyyy HH:mm:ss') as วันที่มอบหมาย, ชื่อผู้มอบหมาย, ชื่อผู้รับมอบหมาย ,ประเภทกิจการ, สถานะ, ตำแหน่ง from ประวัติธุกรรม where doc_no = '" . $doc_no . "'";
        $result = sqlsrv_query($this->dbcon, $sql);
        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $keys = array_keys($row);
            $requestHistory[$i]['doc_no'] = $row[$keys[0]];
            $requestHistory[$i]['เลขคำขอ'] = $row[$keys[1]];
            $requestHistory[$i]['วันที่มอบหมาย'] = $row[$keys[2]];
            $requestHistory[$i]['ชื่อผู้มอบหมาย'] = $row[$keys[3]];
            $requestHistory[$i]['ชื่อผู้รับมอบหมาย'] = $row[$keys[4]];
            $requestHistory[$i]['ประเภทกิจการ'] = $row[$keys[5]];
            $requestHistory[$i]['สถานะ'] = $row[$keys[6]];
            $i += 1;
        }
        return $requestHistory;
    }
    //หน้าตรวจสอบและรับคำขอแบบยื่นออนไลน์ ของ ผอกอง, หัวหน้ากอง, เจ้าหน้าที่
    public function CheckAndReceive_Request($Fname, $Lname)
    {
        $requestHistory = [];
        $i = 0;
        $sql = "select doc_no, เลขคำขอ, 
                format(วันที่รับคำขอ, 'dd/MM/yyyy') as วันที่รับคำขอ, 
                format(วันที่สิ้นสุด, 'dd/MM/yyyy') as วันที่สิ้นสุด, 
                ประเภทกิจการ, ผู้ยื่นคำขอ, สถานะ, ชื่อผู้มอบหมาย
                from ธุรกรรมล่าสุด where ชื่อผู้รับมอบหมาย = '" . $Fname . " " . $Lname . "' order by วันที่ปรับปรุงล่าสุด DESC";

        $result = sqlsrv_query($this->dbcon, $sql);
        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $keys = array_keys($row);
            $requestHistory[$i]['doc_no'] = $row[$keys[0]];
            $requestHistory[$i]['เลขคำขอ'] = $row[$keys[1]];
            $requestHistory[$i]['วันที่รับคำขอ'] = $row[$keys[2]];
            $requestHistory[$i]['วันที่สิ้นสุด'] = $row[$keys[3]];
            $requestHistory[$i]['ประเภทกิจการ'] = $row[$keys[4]];
            $requestHistory[$i]['ผู้ยื่นคำขอ'] = $row[$keys[5]];
            $requestHistory[$i]['สถานะ'] = $row[$keys[6]];
            $requestHistory[$i]['ชื่อผู้มอบหมาย'] = $row[$keys[7]];
            $i += 1;
        }
        return $requestHistory;
    }

    public function CheckAndReceive_Request2($Fname, $Lname)
    {
        $requestHistory = [];
        $i = 0;
        $sql = "select doc_no, เลขคำขอ, 
                format(วันที่รับคำขอ, 'dd/MM/yyyy') as วันที่รับคำขอ, 
                format(วันที่สิ้นสุด, 'dd/MM/yyyy') as วันที่สิ้นสุด, 
                ประเภทกิจการ, ผู้ยื่นคำขอ, สถานะ 
                from ธุรกรรมล่าสุด where (ผู้อำนวยการกอง = '" . $Fname . " " . $Lname . "' or หัวหน้าสาย = '" . $Fname . " " . $Lname . "' or เจ้าหน้าที่ = '" . $Fname . " " . $Lname . "') and ชื่อผู้รับมอบหมาย != '" . $Fname . " " . $Lname . "'";

        $result = sqlsrv_query($this->dbcon, $sql);
        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $keys = array_keys($row);
            $requestHistory[$i]['doc_no'] = $row[$keys[0]];
            $requestHistory[$i]['เลขคำขอ'] = $row[$keys[1]];
            $requestHistory[$i]['วันที่รับคำขอ'] = $row[$keys[2]];
            $requestHistory[$i]['วันที่สิ้นสุด'] = $row[$keys[3]];
            $requestHistory[$i]['ประเภทกิจการ'] = $row[$keys[4]];
            $requestHistory[$i]['ผู้ยื่นคำขอ'] = $row[$keys[5]];
            $requestHistory[$i]['สถานะ'] = $row[$keys[6]];
            $i += 1;
        }
        return $requestHistory;
    }

    // ---------------------------------------------------------------------------------------------------------------------------------
    //หน้าตรวจสอบและรับคำขอแบบยื่นออนไลน์ของ เจ้าหน้าที่คอมเม้น 
    public function CheckAndReceive_Request_Comment()
    {
        $requestHistory = [];
        $i = 0;
        $sql = "select doc_no, เลขคำขอ, format(วันที่ยื่นคำขอ, 'yyyy-MM-dd') as วันที่ยื่นคำขอ, 
                format(วันที่รับคำขอ, 'yyyy-MM-dd') as วันที่รับคำขอ, 
                format(วันที่สิ้นสุด, 'yyyy-MM-dd') as วันที่สิ้นสุด, 
                ประเภทกิจการ, ผู้ยื่นคำขอ, สถานะ 
                from ธุรกรรมล่าสุด where สถานะ = 'รอยืนยันคำขอ' order by วันที่ยื่นคำขอ asc";

        $result = sqlsrv_query($this->dbcon, $sql);
        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $keys = array_keys($row);
            $requestHistory[$i]['doc_no'] = $row[$keys[0]];
            $requestHistory[$i]['เลขคำขอ'] = $row[$keys[1]];
            $requestHistory[$i]['วันที่ยื่นคำขอ'] = $row[$keys[2]];
            $requestHistory[$i]['วันที่รับคำขอ'] = $row[$keys[3]];
            $requestHistory[$i]['วันที่สิ้นสุด'] = $row[$keys[4]];
            $requestHistory[$i]['ผู้ยื่นคำขอ'] = $row[$keys[5]];
            $requestHistory[$i]['ประเภทกิจการ'] = $row[$keys[6]];
            $requestHistory[$i]['สถานะ'] = $row[$keys[7]];
            $i += 1;
        }
        return $requestHistory;
    }

    public function CheckAndReceive_Request_Comment2()
    {
        $requestHistory = [];
        $i = 0;
        $sql = "select doc_no, เลขคำขอ, format(วันที่ยื่นคำขอ, 'yyyy-MM-dd') as วันที่ยื่นคำขอ, 
                format(วันที่รับคำขอ, 'yyyy-MM-dd') as วันที่รับคำขอ, 
                format(วันที่สิ้นสุด, 'yyyy-MM-dd') as วันที่สิ้นสุด, 
                ประเภทกิจการ, ผู้ยื่นคำขอ, สถานะ 
                from ธุรกรรมล่าสุด where สถานะ != 'รอยืนยันคำขอ' order by วันที่ยื่นคำขอ asc";

        $result = sqlsrv_query($this->dbcon, $sql);
        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $keys = array_keys($row);
            $requestHistory[$i]['doc_no'] = $row[$keys[0]];
            $requestHistory[$i]['เลขคำขอ'] = $row[$keys[1]];
            $requestHistory[$i]['วันที่ยื่นคำขอ'] = $row[$keys[2]];
            $requestHistory[$i]['วันที่รับคำขอ'] = $row[$keys[3]];
            $requestHistory[$i]['วันที่สิ้นสุด'] = $row[$keys[4]];
            $requestHistory[$i]['ผู้ยื่นคำขอ'] = $row[$keys[5]];
            $requestHistory[$i]['ประเภทกิจการ'] = $row[$keys[6]];
            $requestHistory[$i]['สถานะ'] = $row[$keys[7]];
            $i += 1;
        }
        return $requestHistory;
    }

    // ---------------------------------------------------------------------------------------------------------------------------------

    public function checkRequest_info($doc_no)
    {
        $requestHistory = [];
        $i = 0;
        $sql = "select doc_no, เลขคำขอ, ผู้ยื่นคำขอ, ชื่อตัวแทน, ผู้รับคำขอ, ชื่อผู้รับมอบหมาย, ประเภทกิจการ, สถานะ,
                format(วันที่ยื่นคำขอ, 'dd/MM/yyyy HH:mm:ss') as วันที่ยื่นคำขอ, 
                format(วันที่รับคำขอ, 'dd/MM/yyyy HH:mm:ss') as วันที่รับคำขอ, 
                format(วันที่สิ้นสุด, 'dd/MM/yyyy HH:mm:ss') as วันที่สิ้นสุด,
                format(วันที่ปรับปรุงล่าสุด, 'dd/MM/yyyy HH:mm:ss') as วันที่ปรับปรุงล่าสุด
                from ธุรกรรมล่าสุด where doc_no = '" . $doc_no . "'";

        $result = sqlsrv_query($this->dbcon, $sql);
        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $keys = array_keys($row);
            $requestHistory[$i]['doc_no'] = $row[$keys[0]];
            $requestHistory[$i]['เลขคำขอ'] = $row[$keys[1]];
            $requestHistory[$i]['ผู้ยื่นคำขอ'] = $row[$keys[2]];
            $requestHistory[$i]['ชื่อตัวแทน'] = $row[$keys[3]];
            $requestHistory[$i]['ผู้รับคำขอ'] = $row[$keys[4]];
            $requestHistory[$i]['ชื่อผู้รับมอบหมาย'] = $row[$keys[5]];
            $requestHistory[$i]['ประเภทกิจการ'] = $row[$keys[6]];
            $requestHistory[$i]['สถานะ'] = $row[$keys[7]];
            $requestHistory[$i]['วันที่ยื่นคำขอ'] = $row[$keys[8]];
            $requestHistory[$i]['วันที่รับคำขอ'] = $row[$keys[9]];
            $requestHistory[$i]['วันที่สิ้นสุด'] = $row[$keys[10]];
            $requestHistory[$i]['วันที่ปรับปรุงล่าสุด'] = $row[$keys[11]];
            $i += 1;
        }
        return $requestHistory;
    }

    public function fetchRequest($name)
    {
        $requestHistory = [];
        $i = 0;
        $sql = "select doc_no, เลขคำขอ, format(วันที่ยื่นคำขอ, 'yyyy-MM-dd') as วันที่ยื่นคำขอ, 
                format(วันที่รับคำขอ, 'yyyy-MM-dd') as วันที่รับคำขอ, 
                format(วันที่สิ้นสุด, 'yyyy-MM-dd') as วันที่สิ้นสุด, 
                ประเภทกิจการ, ผู้ยื่นคำขอ, สถานะ 
                from ธุรกรรมล่าสุด where ชื่อผู้รับมอบหมาย = '" . $name . "'";

        $result = sqlsrv_query($this->dbcon, $sql);
        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $keys = array_keys($row);
            $requestHistory[$i]['doc_no'] = $row[$keys[0]];
            $requestHistory[$i]['เลขคำขอ'] = $row[$keys[1]];
            $requestHistory[$i]['วันที่ยื่นคำขอ'] = $row[$keys[2]];
            $requestHistory[$i]['วันที่รับคำขอ'] = $row[$keys[3]];
            $requestHistory[$i]['วันที่สิ้นสุด'] = $row[$keys[4]];
            $requestHistory[$i]['ผู้ยื่นคำขอ'] = $row[$keys[5]];
            $requestHistory[$i]['ประเภทกิจการ'] = $row[$keys[6]];
            $requestHistory[$i]['สถานะ'] = $row[$keys[7]];
            $i += 1;
        }
        return $requestHistory;
    }

    //------------------------------------------------------------------------------------------------------------------------------------------------------//


    //-------------------------------------------------------------Fetch Solar Request data-----------------------------------------------------------------//
    public function fetch_solarRequest($doc_no)
    {
        $solarRequest = [];
        $i = 0;
        $sql = "select Doc_no, Request_Number, ProductDetail_ID, InvestmentDetail_ID, Plans_ID 
                from Solar_Request where Doc_no = '" . $doc_no . "'";
        $result = sqlsrv_query($this->dbcon, $sql);

        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $solarRequest[$i]['Doc_no'] = $row['Doc_no'];
            $solarRequest[$i]['Request_Number'] = $row['Request_Number'];
            $solarRequest[$i]['ProductDetail_ID'] = $row['ProductDetail_ID'];
            $solarRequest[$i]['InvestmentDetail_ID'] = $row['InvestmentDetail_ID'];
            $solarRequest[$i]['Plans_ID'] = $row['Plans_ID'];
            $i += 1;
        }
        return $solarRequest;
    }

    //------------------------------------------------------------------------------------------------------------------------------------------------------//


    //------------------------------------------------------------Fetch Product Detail data-----------------------------------------------------------------//

    public function fetch_productDetail($ProducDetail_ID)
    {
        $productDetail = [];
        $i = 0;
        $sql = "select * from Product_Detail where Product_id = '" . $ProducDetail_ID . "'";
        $result = sqlsrv_query($this->dbcon, $sql);
        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $productDetail[$i]['Product_Name'] = $row['Product_Name'];
            $productDetail[$i]['Company_Name'] = $row['Company_Name'];
            $productDetail[$i]['Contract_Name'] = $row['Contract_Name'];
            $productDetail[$i]['Contract_Name_Page'] = $row['Contract_Name_Page'];
            $productDetail[$i]['Capacity'] = $row['Capacity'];
            $productDetail[$i]['Capacity_Page'] = $row['Capacity_Page'];
            $productDetail[$i]['Location_No'] = $row['Location_No'];
            $productDetail[$i]['Location_Street'] = $row['Location_Street'];
            $productDetail[$i]['Location_Subdistrict'] = $row['Location_Subdistrict'];
            $productDetail[$i]['Location_district'] = $row['Location_district'];
            $productDetail[$i]['Location_Province'] = $row['Location_Province'];
            $productDetail[$i]['Location_Page'] = $row['Location_Page'];
            $i += 1;
        }
        return $productDetail;
    }


    public function fetch_Tools($ProducDetail_ID)
    {
        $tools = [];
        $i = 0;
        $sql = "select * from Tools where Product_ID = '" . $ProducDetail_ID . "'";
        $result = sqlsrv_query($this->dbcon, $sql);
        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $tools[$i]['Tools_ID'] = $row['Tools_ID'];
            $tools[$i]['Product_ID'] = $row['Product_ID'];
            $tools[$i]['Location_Rooftop_ID'] = $row['Location_Rooftop_ID'];
            $tools[$i]['Location_Farm_ID'] = $row['Location_Farm_ID'];
            $tools[$i]['Location_Floating_ID'] = $row['Location_Floating_ID'];
            $tools[$i]['ESS_ID'] = $row['ESS_ID'];
            $tools[$i]['Equipment_ID'] = $row['Equipment_ID'];
            $tools[$i]['Pvmodult_Total'] = $row['Pvmodult_Total'];
            $tools[$i]['Inverter_Total'] = $row['Inverter_Total'];
            $i += 1;
        }
        return $tools;
    }

    //------------------------------------------------------------------------------------------------------------------------------------------------------//


    //-------------------------------------------------------------------Fetch Solar data-------------------------------------------------------------------//

    public function fetch_rooftopSolar($ProductDetail_ID)
    {
        $rooftopSolar = [];
        $i = 0;
        $sql = "select * from  Roof_solar where exists (
                    select * from Location_Rooftop
                        where Location_Rooftop.Roof_Solar_ID = Roof_solar.Pvmodult_Roof_ID
                        and Location_Rooftop.Location_Rooftop_ID = (
                            select Location_Rooftop_ID from Tools where exists (
                                select * from Product_Detail 
                                where Product_Detail.Product_id = Tools.Product_ID  
                                and Product_Detail.Product_id = '" . $ProductDetail_ID . "')));";

        $result = sqlsrv_query($this->dbcon, $sql);
        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $rooftopSolar[$i]['Pvmodult_Roof_ID'] = $row['Pvmodult_Roof_ID'];
            $rooftopSolar[$i]['Location_Type'] = $row['Location_Type'];
            $rooftopSolar[$i]['Pvmodult_Type'] = $row['Pvmodult_Type'];
            $rooftopSolar[$i]['Pvmodult_Model'] = $row['Pvmodult_Model'];
            $rooftopSolar[$i]['Pvmodult_Brand'] = $row['Pvmodult_Brand'];
            $rooftopSolar[$i]['Pvmodult_Country'] = $row['Pvmodult_Country'];
            $rooftopSolar[$i]['Pvmodult_Capacity'] = $row['Pvmodult_Capacity'];
            $rooftopSolar[$i]['Pvmodult_Amount'] = $row['Pvmodult_Amount'];
            $rooftopSolar[$i]['Pvmodult_Cost'] = $row['Pvmodult_Cost'];
            $rooftopSolar[$i]['Pvmodult_Sum'] = $row['Pvmodult_Sum'];
            $i += 1;
        }
        return $rooftopSolar;
    }

    public function fetch_farmSolar($ProductDetail_ID)
    {
        $farmSolar = [];
        $i = 0;
        $sql = "select * from  Farm_solar where exists (
                    select * from Location_Farm 
                        where Location_Farm.Farm_Solar_ID = Farm_solar.Pvmodult_Farm_ID
                        and Location_Farm.Location_Farm_ID = (
                            select Location_Farm_ID from Tools where exists (
                                select * from Product_Detail 
                                where Product_Detail.Product_id = Tools.Product_ID  
                                and Product_Detail.Product_id = '" . $ProductDetail_ID . "')));";

        $result = sqlsrv_query($this->dbcon, $sql);
        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $farmSolar[$i]['Pvmodult_Farm_ID'] = $row['Pvmodult_Farm_ID'];
            $farmSolar[$i]['Location_Type'] = $row['Location_Type'];
            $farmSolar[$i]['Pvmodult_Type'] = $row['Pvmodult_Type'];
            $farmSolar[$i]['Pvmodult_Model'] = $row['Pvmodult_Model'];
            $farmSolar[$i]['Pvmodult_Brand'] = $row['Pvmodult_Brand'];
            $farmSolar[$i]['Pvmodult_Country'] = $row['Pvmodult_Country'];
            $farmSolar[$i]['Pvmodult_Capacity'] = $row['Pvmodult_Capacity'];
            $farmSolar[$i]['Pvmodult_Amount'] = $row['Pvmodult_Amount'];
            $farmSolar[$i]['Pvmodult_Cost'] = $row['Pvmodult_Cost'];
            $farmSolar[$i]['Pvmodult_Sum'] = $row['Pvmodult_Sum'];
            $i += 1;
        }
        return $farmSolar;
    }

    public function fetch_floatingSolar($ProductDetail_ID)
    {
        $floatingSolar = [];
        $i = 0;
        $sql = "select * from  Floating_solar where exists (
                    select * from Location_Floating
                        where Location_Floating.Floating_Solar_ID = Floating_solar.Pvmodult_Floating_ID
                        and Location_Floating.Location_Floating_ID = (
                            select Location_Floating_ID from Tools where exists (
                                select * from Product_Detail 
                                where Product_Detail.Product_id = Tools.Product_ID  
                                and Product_Detail.Product_id = '" . $ProductDetail_ID . "')));";

        $result = sqlsrv_query($this->dbcon, $sql);
        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $floatingSolar[$i]['Pvmodult_Floating_ID'] = $row['Pvmodult_Floating_ID'];
            $floatingSolar[$i]['pool_number'] = $row['pool_number'];
            $floatingSolar[$i]['Floating_Amount'] = $row['Floating_Amount'];
            $floatingSolar[$i]['pool_detail'] = $row['pool_detail'];
            $floatingSolar[$i]['water_detail'] = $row['water_detail'];
            $floatingSolar[$i]['pool_area'] = $row['pool_area'];
            $floatingSolar[$i]['floating_area'] = $row['floating_area'];
            $floatingSolar[$i]['pool_percen'] = $row['pool_percen'];
            $floatingSolar[$i]['Pvmodult_Type'] = $row['Pvmodult_Type'];
            $floatingSolar[$i]['Pvmodult_Model'] = $row['Pvmodult_Model'];
            $floatingSolar[$i]['Pvmodult_Brand'] = $row['Pvmodult_Brand'];
            $floatingSolar[$i]['Pvmodult_Country'] = $row['Pvmodult_Country'];
            $floatingSolar[$i]['Pvmodult_Capacity'] = $row['Pvmodult_Capacity'];
            $floatingSolar[$i]['Pvmodult_Cost'] = $row['Pvmodult_Cost'];
            $floatingSolar[$i]['Pvmodult_Amount'] = $row['Pvmodult_Amount'];
            $floatingSolar[$i]['Pvmodult_Sum'] = $row['Pvmodult_Sum'];
            $i += 1;
        }
        return $floatingSolar;
    }

    //------------------------------------------------------------------------------------------------------------------------------------------------------//


    //-------------------------------------------------------------------Fetch Inverter data----------------------------------------------------------------//

    public function fetch_rooftopInverter($ProductDetail_ID)
    {
        $farmInverter = [];
        $i = 0;
        $sql = "select * from  Roof_inverter where exists (
                    select * from Location_Rooftop 
                        where Location_Rooftop.Roof_Inverter_ID = Roof_inverter.Inverter_Roof_ID
                        and Location_Rooftop.Location_Rooftop_ID = (
                            select Location_Rooftop_ID from Tools where exists (
                                select * from Product_Detail 
                                where Product_Detail.Product_id = Tools.Product_ID  
                                and Product_Detail.Product_id = '" . $ProductDetail_ID . "')));";

        $result = sqlsrv_query($this->dbcon, $sql);
        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $farmInverter[$i]['Inverter_Roof_ID'] = $row['Inverter_Roof_ID'];
            $farmInverter[$i]['Inverter_Model'] = $row['Inverter_Model'];
            $farmInverter[$i]['Inverter_Brand'] = $row['Inverter_Brand'];
            $farmInverter[$i]['Inverter_Country'] = $row['Inverter_Country'];
            $farmInverter[$i]['Inverter_Capacity'] = $row['Inverter_Capacity'];
            $farmInverter[$i]['Inverter_Amount'] = $row['Inverter_Amount'];
            $farmInverter[$i]['Inverter_Cost'] = $row['Inverter_Cost'];
            $farmInverter[$i]['Inverter_Sum'] = $row['Inverter_Sum'];
            $i += 1;
        }
        return $farmInverter;
    }

    public function fetch_farmInverter($ProductDetail_ID)
    {
        $rooftopIverter = [];
        $i = 0;
        $sql = "select * from  Farm_inverter where exists (
                    select * from Location_Farm 
                        where Location_Farm.Farm_Inverter_ID = Farm_inverter.Inverter_Farm_ID
                        and Location_Farm.Location_Farm_ID = (
                            select Location_Farm_ID from Tools where exists (
                                select * from Product_Detail 
                                where Product_Detail.Product_id = Tools.Product_ID  
                                and Product_Detail.Product_id = '" . $ProductDetail_ID . "')));";

        $result = sqlsrv_query($this->dbcon, $sql);
        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $rooftopIverter[$i]['Inverter_Farm_ID'] = $row['Inverter_Farm_ID'];
            $rooftopIverter[$i]['Inverter_Model'] = $row['Inverter_Model'];
            $rooftopIverter[$i]['Inverter_Brand'] = $row['Inverter_Brand'];
            $rooftopIverter[$i]['Inverter_Country'] = $row['Inverter_Country'];
            $rooftopIverter[$i]['Inverter_Capacity'] = $row['Inverter_Capacity'];
            $rooftopIverter[$i]['Inverter_Amount'] = $row['Inverter_Amount'];
            $rooftopIverter[$i]['Inverter_Cost'] = $row['Inverter_Cost'];
            $rooftopIverter[$i]['Inverter_Sum'] = $row['Inverter_Sum'];
            $i += 1;
        }
        return $rooftopIverter;
    }

    public function fetch_floatingInverter($ProductDetail_ID)
    {
        $floatingInverter = [];
        $i = 0;
        $sql = "select * from  Floating_inverter where exists (
                    select * from Location_Floating 
                        where Location_Floating.Floating_Inverter_ID = Floating_inverter.Inverter_Floating_ID
                        and Location_Floating.Location_Floating_ID = (
                            select Location_Floating_ID from Tools where exists (
                                select * from Product_Detail 
                                where Product_Detail.Product_id = Tools.Product_ID  
                                and Product_Detail.Product_id = '" . $ProductDetail_ID . "')));";

        $result = sqlsrv_query($this->dbcon, $sql);
        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $floatingInverter[$i]['Inverter_Floating_ID'] = $row['Inverter_Floating_ID'];
            $floatingInverter[$i]['Inverter_Model'] = $row['Inverter_Model'];
            $floatingInverter[$i]['Inverter_Brand'] = $row['Inverter_Brand'];
            $floatingInverter[$i]['Inverter_Country'] = $row['Inverter_Country'];
            $floatingInverter[$i]['Inverter_Capacity'] = $row['Inverter_Capacity'];
            $floatingInverter[$i]['Inverter_Amount'] = $row['Inverter_Amount'];
            $floatingInverter[$i]['Inverter_Cost'] = $row['Inverter_Cost'];
            $floatingInverter[$i]['Inverter_Sum'] = $row['Inverter_Sum'];
            $i += 1;
        }
        return $floatingInverter;
    }

    //------------------------------------------------------------------------------------------------------------------------------------------------------//


    //-------------------------------------------------------------------Fetch ESS data---------------------------------------------------------------------//

    public function fetch_ess($ProductDetail_ID)
    {
        $ess = [];
        $i = 0;
        $sql = "select * from ESS where exists (
                    select * from Tools 
                        where Tools.ESS_ID = ESS.ESS_ID 
                        and Tools.Product_ID = (
                            select Product_id from Product_Detail where Product_id = '" . $ProductDetail_ID . "'))";

        $result = sqlsrv_query($this->dbcon, $sql);
        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $ess[$i]['ESS_ID'] = $row['ESS_ID'];
            $ess[$i]['ESS_Model'] = $row['ESS_Model'];
            $ess[$i]['ESS_Brand'] = $row['ESS_Brand'];
            $ess[$i]['ESS_Country'] = $row['ESS_Country'];
            $ess[$i]['ESS_Capacity'] = $row['ESS_Capacity'];
            $ess[$i]['ESS_Amount'] = $row['ESS_Amount'];
            $ess[$i]['ESS_Cost'] = $row['ESS_Cost'];
            $ess[$i]['ESS_Sum'] = $row['ESS_Sum'];
            $i += 1;
        }
        return $ess;
    }

    //------------------------------------------------------------------------------------------------------------------------------------------------------//

    //----------------------------------------------------------------Fetch Equipment data------------------------------------------------------------------//

    public function fetch_equipment($ProductDetail_ID)
    {
        $equipment = [];
        $i = 0;
        $sql = "select * from Equipment where exists (
                    select * from Tools 
                        where Tools.Equipment_ID = Equipment.Equipment_ID 
                        and Tools.Product_ID = (
                            select Product_id from Product_Detail where Product_id = '" . $ProductDetail_ID . "'))";

        $result = sqlsrv_query($this->dbcon, $sql);
        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $equipment[$i]['Equipment_ID'] = $row['Equipment_ID'];
            $equipment[$i]['Descript'] = $row['Descript'];
            $i += 1;
        }
        return $equipment;
    }

    //------------------------------------------------------------------------------------------------------------------------------------------------------//

    //--------------------------------------------------------------Fetch Investment data-------------------------------------------------------------------//

    public function fetch_investmentDetail($InvestmentDetail_ID)
    {
        $investmentDetail = [];
        $i = 0;
        $sql = "select * from Investment_Detail where Investment_Detail_ID = '" . $InvestmentDetail_ID . "'";
        $result = sqlsrv_query($this->dbcon, $sql);
        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $investmentDetail[$i]['EPC_Name'] = $row['EPC_Name'];
            $investmentDetail[$i]['Construction_Cost'] = $row['Construction_Cost'];
            $investmentDetail[$i]['Machine_Info'] = $row['Machine_Info'];
            $investmentDetail[$i]['Machine_Pvmodule'] = $row['Machine_Pvmodule'];
            $investmentDetail[$i]['Machine_Inverter'] = $row['Machine_Inverter'];
            $investmentDetail[$i]['Machine_ESS'] = $row['Machine_ESS'];
            $investmentDetail[$i]['Machine_Equipment'] = $row['Machine_Equipment'];
            $investmentDetail[$i]['Machine_Setup'] = $row['Machine_Setup'];
            $investmentDetail[$i]['Machine_Trial'] = $row['Machine_Trial'];
            $investmentDetail[$i]['Expenses'] = $row['Expenses'];
            $investmentDetail[$i]['Asset'] = $row['Asset'];
            $investmentDetail[$i]['Land_Value'] = $row['Land_Value'];
            $investmentDetail[$i]['Academic'] = $row['Academic'];
            $investmentDetail[$i]['Circulation'] = $row['Circulation'];
            $investmentDetail[$i]['Result'] = $row['Result'];
            $i += 1;
        }
        return $investmentDetail;
    }

    //------------------------------------------------------------------------------------------------------------------------------------------------------//

    //-----------------------------------------------------Fetch System_Installation_Plan data--------------------------------------------------------------//

    public function fetch_sip($doc_no)
    {
        $sip = [];
        $i = 0;
        $sql = "select System_Installation_Plan_ID, 
                    format(Plan_Survey, 'MM/yyyy') as Plan_Survey,  
                    format(Plan_Procurement, 'MM/yyyy') as Plan_Procurement,  
                    format(Plan_installation, 'MM/yyyy') as Plan_installation,  
                    format(Plan_COD, 'MM/yyyy') as Plan_COD from System_Installation_Plan where exists (
                        select * from Plans
                            WHERE Plans.System_Installation_Plan_ID = System_Installation_Plan.System_Installation_Plan_ID
                            and Plans.Plan_ID = (select Plans_ID from Solar_Request where Doc_no = '" . $doc_no . "'))";

        $result = sqlsrv_query($this->dbcon, $sql);
        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $sip[$i]['System_Installation_Plan_ID'] = $row['System_Installation_Plan_ID'];
            $sip[$i]['Plan_Survey'] = $row['Plan_Survey'];
            $sip[$i]['Plan_Procurement'] = $row['Plan_Procurement'];
            $sip[$i]['Plan_installation'] = $row['Plan_installation'];
            $sip[$i]['Plan_COD'] = $row['Plan_COD'];
            $i += 1;
        }
        return $sip;
    }
    //------------------------------------------------------------------------------------------------------------------------------------------------------//

    //------------------------------------------------------------------Fetch ESA data----------------------------------------------------------------------//

    public function fetch_esa($doc_no)
    {
        $esa = [];
        $i = 0;
        $sql = "select ESA_ID, ESA_Name,
                    format(ESA_Consult, 'MM/yyyy') as ESA_Consult,  
                    format(ESA_Study, 'MM/yyyy') as ESA_Study,  
                    format(ESA_Complete, 'MM/yyyy') as ESA_Complete from ESA where exists (
                        select * from Plans
                            WHERE Plans.ESA_ID = ESA.ESA_ID
                            and Plans.Plan_ID = (select Plans_ID from Solar_Request where Doc_no = '" . $doc_no . "'))";

        $result = sqlsrv_query($this->dbcon, $sql);
        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $esa[$i]['ESA_ID'] = $row['ESA_ID'];
            $esa[$i]['ESA_Name'] = $row['ESA_Name'];
            $esa[$i]['ESA_Consult'] = $row['ESA_Consult'];
            $esa[$i]['ESA_Study'] = $row['ESA_Study'];
            $esa[$i]['ESA_Complete'] = $row['ESA_Complete'];
            $i += 1;
        }
        return $esa;
    }

    //------------------------------------------------------------------------------------------------------------------------------------------------------//

    //------------------------------------------------------------------Fetch Assignee Name data------------------------------------------------------------//

    public function fetch_assigneeName($postion)
    {
        $name = [];
        $i = 0;
        if ($postion == 'ผอกอง') {
            $sql = "select Fname, Lname from admin_login where Position = 'หัวหน้าสาย'";
        } else if ($postion == 'หัวหน้าสาย') {
            $sql = "select Fname, Lname from admin_login where Position = 'เจ้าหน้าที่'";
        }
        $result = sqlsrv_query($this->dbcon, $sql);
        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $name[$i]["Fname"] = $row["Fname"];
            $name[$i]["Lname"] = $row["Lname"];
            $i += 1;
        }
        return $name;
    }

    //------------------------------------------------------------------------------------------------------------------------------------------------------//

    //------------------------------------------------------------------Fetch Edit Count data---------------------------------------------------------------//

    public function fetch_editCount($name)
    {
        $count = 0;
        $i = 0;
        $sql = "select COUNT(doc_no) from ประวัติแก้ไขคำขอ WHERE exists (
            select * from Solar_Request WHERE Solar_Request.Doc_no = ประวัติแก้ไขคำขอ.doc_no AND User_ID = '" . $name . "' and สถานะ = 'ส่งกลับแก้ไข')";
        $result = sqlsrv_query($this->dbcon, $sql);
        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $keys = array_keys($row);
            $count = $row[$keys[0]];
        }
        return $count;
    }

    //------------------------------------------------------------------------------------------------------------------------------------------------------//

    //----------------------------------------------------------------------Fetch Edit data-----------------------------------------------------------------//

    public function fetch_edit($name)
    {
        $edit = [];
        $i = 0;
        $sql = "select [Company_Name], [doc_no], [ข้อมูลที่จะแก้ไข], [รายละเอียด], [แก้ครังที่], [สถานะ] 
                    from Product_Detail, [ประวัติแก้ไขคำขอ] WHERE EXISTS (
                        select * from Solar_Request WHERE 
                            Solar_Request.Doc_no = [ประวัติแก้ไขคำขอ].doc_no 
                            and Solar_Request.ProductDetail_ID = Product_Detail.Product_id 
                            and Solar_Request.User_ID = '" . $name . "') and สถานะ = 'ส่งกลับแก้ไข'";
        $result = sqlsrv_query($this->dbcon, $sql);
        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $keys = array_keys($row);
            $edit[$i]['companyName'] = $row[$keys[0]];
            $edit[$i]['doc_no'] = $row[$keys[1]];
            $edit[$i]['ข้อมูลที่จะแก้ไข'] = $row[$keys[2]];
            $edit[$i]['รายละเอียด'] = $row[$keys[3]];
            $edit[$i]['แก้ครังที่'] = $row[$keys[4]];
            $edit[$i]['สถานะ'] = $row[$keys[5]];
            $i += 1;
        }
        return $edit;
    }
}
