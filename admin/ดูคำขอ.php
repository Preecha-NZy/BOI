<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin_CSS/ดูคำขอ.css">
    <link rel="stylesheet" href="/font/simplelineicons.github.io-master/simplelineicons.github.io-master/css/simple-line-icons.css">
    <link rel="icon" href="https://boi-investment.boi.go.th/assets/images/favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Prompt&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="admin_JAVASCRIPT/ดูคำขอ.js"></script>
    <script src="https://kit.fontawesome.com/e73227180e.js" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: Prompt;
        }
    </style>
</head>

<body>
    <section style="position: fixed; width: 100%; top: 0; z-index: 50;">
        <header>
            <div class="hd-left">
                <img src="https://boi-investment.boi.go.th/img_boi/logo.png" alt="">
            </div>
            <div class="hd-right">
                <i class="icon-bell" style="margin-right: 10px;"></i>
                <img src="https://boi-investment.boi.go.th/assets/images/avatar-2.png" alt="" class="user-img">
                <p id="user-name" style="margin-right: 20px;"></p>
                <i class="fas fa-sign-out-alt" style="color: red; margin-left: auto; margin-right: 10px; cursor: pointer;" onclick="logout()"></i>
            </div>
        </header>
        <script>
            <?php
            $ID = $_POST['id'];
            $Fname = $_POST['fname'];
            $Lname = $_POST['lname'];
            $Position = $_POST['position'];
            $Assignee = $_POST['assignee'];
            $Status = $_POST['status'];
            $doc_no = $_POST['doc_no'];
            ?>
            let ID = '<?php echo $ID; ?>'
            let Fname = '<?php echo $Fname; ?>'
            let Lname = '<?php echo $Lname; ?>'
            let Position = '<?php echo $Position; ?>'
            let Assignee = '<?php echo $Assignee; ?>'
            let Status = '<?php echo $Status; ?>'
            let Doc_no = '<?php echo $doc_no; ?>'
            if (Fname != '' && Lname != '') {
                document.getElementById('user-name').innerHTML = `${Fname} ${Lname}`
            } else {
                window.location.href = "/admin/index.php";
            }
        </script>

        <section class="title-content" style="background-color: #E5E5E5;">
            <img src="https://boi-investment.boi.go.th/icon/icon-user-01-01.png" alt="">
            <div class="title">
                <h4>
                    ขอรับการส่งเสริมการลงทุนสำหรับกิจการประเภท 7.1.1.2
                </h4>
                <h5>
                    ดูและตรวจสอบคำขอรับการส่งเสริม
                </h5>
            </div>
            <div class="edit-btn head-btn" onclick="editMode()">
                <a> <i class="icon-pencil head-icon" style="margin-right: 5px;"></i>แก้ไขคำขอ</a>
            </div>
            <div class="home-btn head-btn" onclick="investment_menu()">
                <a> <i class="icon-home head-icon" style="margin-right: 5px;"></i>กลับหน้าหลัก</a>
            </div>
        </section>
    </section>
    <script>
        // if (Status != 'อยู่ระหว่างตรวจสอบแก้ไข' && Status != "รอยืนยันคำขอ" ) {
        if (Status != 'อยู่ระหว่างตรวจสอบแก้ไข') {
            document.getElementsByClassName('edit-btn')[0].style.display = 'none'
            document.getElementsByClassName('home-btn')[0].style.marginLeft = "auto"
        }
    </script>
    <section class="content" style="padding-top: 150px;">
        <div class="Product zone" style="position: relative;  padding: 20px 0;">
            <input class="check-box" type="checkbox" name="" value="ข้อมูลโครงการและรายละเอียดสัญญาการซื้อขาย" id="productDetail" style="position: absolute; top: 0; right: 50px; z-index: 3;" onclick="editZone(this)">
            <h4 style="background-color: #275b90; margin-left: 40px;">ข้อมูลโครงการและรายละเอียดสัญญาการซื้อขาย</h4>
            <div class="row">
                <div class="sup-content">ผลิตภัณฑ์ของโครงการที่จะขอรับการส่งเสริม</div>
                <div class="sub-content" id="Product_Name"></div>
                <div class="sup-content" style="visibility: hidden;"></div>
                <div class="sub-content" style="visibility: hidden;"></div>
            </div>
            <div class="row">
                <div class="sup-content">บริษัทคู่สัญญาซื้อขายไฟฟ้า</div>
                <div class="sub-content" id="Contract_Name"></div>
                <div class="sup-content">เลขหน้าในสัญญาของบริษัทคู่สัญญาซื้อขายไฟฟ้า</div>
                <div class="sub-content" id="Contract_Name_Page"></div>
            </div>
            <div class="row">
                <div class="sup-content">กำลังผลิตติดตั้งตามสัญญาซื้อขายไฟ</div>
                <div class="sub-content" id="Capacity"></div>
                <div class="sup-content">เลขหน้าในสัญญาของกำลังการผลิต</div>
                <div class="sub-content" id="Capacity_Page"></div>
            </div>
            <div class="row">
                <div class="sup-content">สถานที่ติดตั้งตามสัญญา</div>
                <div class="sub-content" id="Location_No"></div>
                <div class="sup-content">ถนน</div>
                <div class="sub-content" id="Location_Street"></div>
            </div>
            <div class="row">
                <div class="sup-content">ตำบล</div>
                <div class="sub-content" id="Location_Subdistrict"></div>
                <div class="sup-content">อำเภอ</div>
                <div class="sub-content" id="Location_district"></div>
            </div>
            <div class="row">
                <div class="sup-content">จังหวัด</div>
                <div class="sub-content" id="Location_Province"></div>
                <div class="sup-content">เลขหน้าในสัญญาของสถานที่ติดตั้ง</div>
                <div class="sub-content" id="Location_Page"></div>
            </div>
        </div>
        <div class="Rooftop zone" style="position: relative; margin-top: 50px; display: none; padding: 20px 0;">
            <input class="check-box" type="checkbox" name="" value="รายการบนหลังคา" id="rooftop" style="position: absolute; top: 0; right: 50px; z-index: 3;" onclick="editZone(this)">
            <h4 style="background-color: #275b90; margin-left: 40px;">รายการเซลล์แสงอาทิตย์บนหลังคา</h4>
            <div class="row">
                <div class="sup-content">ลักษณะอาคารที่ติดตั้ง</div>
                <div class="sub-content" id="Location_Rooftop_Province"></div>
                <div class="sup-content">ชนิด</div>
                <div class="sub-content" id="Pvmodult_Roof_Type"></div>
            </div>
            <div class="row">
                <div class="sup-content">รุ่น</div>
                <div class="sub-content" id="Pvmodult_Rooftop_Model"></div>
                <div class="sup-content">ผู้ผลิต</div>
                <div class="sub-content" id="Pvmodult_Rooftop_Brand"></div>
            </div>
            <div class="row">
                <div class="sup-content">ประเทศ</div>
                <div class="sub-content" id="Pvmodult_Rooftop_Country"></div>
                <div class="sup-content">กำลังผลิต</div>
                <div class="sub-content" id="Pvmodult_Rooftop_Capacity"></div>
            </div>
            <div class="row">
                <div class="sup-content">จำนวน</div>
                <div class="sub-content" id="Pvmodult_Rooftop_Amount"></div>
                <div class="sup-content">ราคาเซลล์แสงอาทิตย์ต่อแผง</div>
                <div class="sub-content" id="Pvmodult_Rooftop_Cost"></div>
            </div>
            <div class="row">
                <div class="sup-content">กำลังผลิตรวม</div>
                <div class="sub-content" id="Pvmodult_Rooftop_Sum"></div>
                <div class="sup-content" style="visibility: hidden;"></div>
                <div class="sub-content" style="visibility: hidden;"></div>
            </div>
            <h4 style="background-color: #275b90; margin-left: 40px; margin-top: 30px;">รายการเครื่องแปลงไฟบนหลังคา</h4>
            <div class="row">
                <div class="sup-content">รุ่น</div>
                <div class="sub-content" id="Inverter_Rooftop_Model"></div>
                <div class="sup-content">ผู้ผลิต</div>
                <div class="sub-content" id="Inverter_Rooftop_Brand"></div>
            </div>
            <div class="row">
                <div class="sup-content">ประเทศ</div>
                <div class="sub-content" id="Inverter_Rooftop_Country"></div>
                <div class="sup-content">กำลังผลิต</div>
                <div class="sub-content" id="Inverter_Rooftop_Capacity"></div>
            </div>
            <div class="row">
                <div class="sup-content">จำนวน</div>
                <div class="sub-content" id="Inverter_Rooftop_Amount"></div>
                <div class="sup-content">ราคาเครื่องแปลงไฟต่อเครื่อง</div>
                <div class="sub-content" id="Inverter_Rooftop_Cost"></div>
            </div>
            <div class="row">
                <div class="sup-content">กำลังผลิตรวม</div>
                <div class="sub-content" id="Inverter_Rooftop_Sum"></div>
                <div class="sup-content" style="visibility: hidden;"></div>
                <div class="sub-content" style="visibility: hidden;"></div>
            </div>
        </div>
        <div class="Farm zone" style="position: relative; margin-top: 50px; display: none; padding: 20px 0;">
            <input class="check-box" type="checkbox" name="รายการบนพื้นดิน" id="farm" value="รายการบนพื้นดิน" style="position: absolute; top: 0; right: 50px; z-index: 3;" onclick="editZone(this)">
            <h4 style="background-color: #275b90; margin-left: 40px;">รายการเซลล์แสงอาทิตย์บนพื้นดิน</h4>
            <div class="row">
                <div class="sup-content">ลักษณะอาคารที่ติดตั้ง</div>
                <div class="sub-content" id="Location_Farm_Province"></div>
                <div class="sup-content">ชนิด</div>
                <div class="sub-content" id="Pvmodult_Farm_Type"></div>
            </div>
            <div class="row">
                <div class="sup-content">รุ่น</div>
                <div class="sub-content" id="Pvmodult_Farm_Model"></div>
                <div class="sup-content">ผู้ผลิต</div>
                <div class="sub-content" id="Pvmodult_Farm_Brand"></div>
            </div>
            <div class="row">
                <div class="sup-content">ประเทศ</div>
                <div class="sub-content" id="Pvmodult_Farm_Country"></div>
                <div class="sup-content">กำลังผลิต</div>
                <div class="sub-content" id="Pvmodult_Farm_Capacity"></div>
            </div>
            <div class="row">
                <div class="sup-content">จำนวน</div>
                <div class="sub-content" id="Pvmodult_Farm_Amount"></div>
                <div class="sup-content">ราคาเซลล์แสงอาทิตย์ต่อแผง</div>
                <div class="sub-content" id="Pvmodult_Farm_Cost"></div>
            </div>
            <div class="row">
                <div class="sup-content">กำลังผลิตรวม</div>
                <div class="sub-content" id="Pvmodult_Farm_Sum"></div>
                <div class="sup-content" style="visibility: hidden;"></div>
                <div class="sub-content" style="visibility: hidden;"></div>
            </div>
            <h4 style="background-color: #275b90; margin-left: 40px; margin-top: 30px;">รายการเครื่องแปลงไฟบนพื้นดิน</h4>
            <div class="row">
                <div class="sup-content">รุ่น</div>
                <div class="sub-content" id="Inverter_Farm_Model"></div>
                <div class="sup-content">ผู้ผลิต</div>
                <div class="sub-content" id="Inverter_Farm_Brand"></div>
            </div>
            <div class="row">
                <div class="sup-content">ประเทศ</div>
                <div class="sub-content" id="Inverter_Farm_Country"></div>
                <div class="sup-content">กำลังผลิต</div>
                <div class="sub-content" id="Inverter_Farm_Capacity"></div>
            </div>
            <div class="row">
                <div class="sup-content">จำนวน</div>
                <div class="sub-content" id="Inverter_Farm_Amount"></div>
                <div class="sup-content">ราคาเครื่องแปลงไฟต่อเครื่อง</div>
                <div class="sub-content" id="Inverter_Farm_Cost"></div>
            </div>
            <div class="row">
                <div class="sup-content">กำลังผลิตรวม</div>
                <div class="sub-content" id="Inverter_Farm_Sum"></div>
                <div class="sup-content" style="visibility: hidden;"></div>
                <div class="sub-content" style="visibility: hidden;"></div>
            </div>
        </div>
        <div class="Floating zone" style="position: relative; margin-top: 50px; display: none; padding: 20px 0;">
            <input class="check-box" type="checkbox" value="รายการบนทุ่นลอยน้ำ" name="รายการบนทุ่นลอยน้ำ" id="floating" style="position: absolute; top: 0; right: 50px; z-index: 3;" onclick="editZone(this)">
            <div class="FLS">
                <h4 style="background-color: #275b90; margin-left: 40px;">รายการเซลล์แสงอาทิตย์บนทุ่นลอยน้ำ</h4>
                <div class="row">
                    <div class="sup-content">จำนวนอ่างเก็บน้ำที่ใช้ติดตั้งทุ่นลอยน้ำ</div>
                    <div class="sub-content" id="Floating_Amount"></div>
                    <div class="sup-content">ลักษณะของอ่างเก็บน้ำ</div>
                    <div class="sub-content" id="pool_detail"></div>
                </div>
                <div class="row">
                    <div class="sup-content">ลักษณะของน้ำ</div>
                    <div class="sub-content" id="water_detail"></div>
                    <div class="sup-content">พื้นที่อ่างเก็บน้ำ</div>
                    <div class="sub-content" id="pool_area"></div>
                </div>
                <div class="row">
                    <div class="sup-content">พื้นที่ติดตั้งทุ่นลอยน้ำ</div>
                    <div class="sub-content" id="floating_area"></div>
                    <div class="sup-content">พื้นที่ของทุ่นลอยน้ำในพื้นที่อ่างเก็บน้ำคิดเป็นร้อยละ</div>
                    <div class="sub-content" id="pool_percen"></div>
                </div>
                <div class="row">
                    <div class="sup-content">ชนิด</div>
                    <div class="sub-content" id="Pvmodult_Floating_Type"></div>
                    <div class="sup-content">รุ่น</div>
                    <div class="sub-content" id="Pvmodult_Floating_Model"></div>
                </div>
                <div class="row">
                    <div class="sup-content">ผู้ผลิต</div>
                    <div class="sub-content" id="Pvmodult_Floating_Brand"></div>
                    <div class="sup-content">ประเทศ</div>
                    <div class="sub-content" id="Pvmodult_Floating_Country_input"></div>
                </div>
                <div class="row">
                    <div class="sup-content">กำลังผลิต</div>
                    <div class="sub-content" id="Pvmodult_Floating_Capacity"></div>
                    <div class="sup-content">ราคาเซลล์แสงอาทิตย์ต่อแผง</div>
                    <div class="sub-content" id="Pvmodult_Floating_Cost"></div>
                </div>
            </div>
            <h4 style="background-color: #275b90; margin-left: 40px; margin-top: 30px;">รายการเครื่องแปลงไฟบนทุ่นลอยน้ำ</h4>
            <div class="row">
                <div class="sup-content">รุ่น</div>
                <div class="sub-content" id="Inverter_Floating_Model"></div>
                <div class="sup-content">ผู้ผลิต</div>
                <div class="sub-content" id="Inverter_Floating_Brand"></div>
            </div>
            <div class="row">
                <div class="sup-content">ประเทศ</div>
                <div class="sub-content" id="Inverter_Floating_Country"></div>
                <div class="sup-content">กำลังผลิต</div>
                <div class="sub-content" id="Inverter_Floating_Capacity"></div>
            </div>
            <div class="row">
                <div class="sup-content">จำนวน</div>
                <div class="sub-content" id="Inverter_Floating_Amount"></div>
                <div class="sup-content">ราคาเครื่องแปลงไฟต่อเครื่อง</div>
                <div class="sub-content" id="Inverter_Floating_Cost"></div>
            </div>
            <div class="row">
                <div class="sup-content">กำลังผลิตรวม</div>
                <div class="sub-content" id="Inverter_Floating_Sum"></div>
                <div class="sup-content" style="visibility: hidden;"></div>
                <div class="sub-content" style="visibility: hidden;"></div>
            </div>
        </div>
        <div class="ESS zone" style="position: relative; margin-top: 50px; display: none;  padding: 20px 0;">
            <input class="check-box" type="checkbox" name="" value="ระบบกักเก็บพลังงาน" id="ess" style="position: absolute; top: 0; right: 50px; z-index: 3;" onclick="editZone(this)">
            <h4 style="background-color: #275b90; margin-left: 40px;">ระบบกักเก็บพลังงาน</h4>
            <div class="row">
                <div class="sup-content">รุ่น</div>
                <div class="sub-content" id="ESS_Model"></div>
                <div class="sup-content">ผู้ผลิต</div>
                <div class="sub-content" id="ESS_Brand"></div>
            </div>
            <div class="row">
                <div class="sup-content">ประเทศ</div>
                <div class="sub-content" id="ESS_Country"></div>
                <div class="sup-content">กำลังผลิต</div>
                <div class="sub-content" id="ESS_Capacity"></div>
            </div>
            <div class="row">
                <div class="sup-content">จำนวน</div>
                <div class="sub-content" id="ESS_Amount"></div>
                <div class="sup-content">ราคาเครื่องแปลงไฟต่อเครื่อง</div>
                <div class="sub-content" id="ESS_Cost"></div>
            </div>
            <div class="row">
                <div class="sup-content">กำลังผลิตรวม</div>
                <div class="sub-content" id="ESS_Sum"></div>
                <div class="sup-content" style="visibility: hidden;"></div>
                <div class="sub-content" style="visibility: hidden;"></div>
            </div>
        </div>
        <div class="Equipment zone" style="position: relative; margin-top: 50px; display: none; padding: 20px 0;">
            <input class="check-box" type="checkbox" name="" value="รายละเอียดอุปกรณ์อื่นๆ" id="equipment" style="position: absolute; top: 0; right: 50px; z-index: 3;" onclick="editZone(this)">
            <h4 style="background-color: #275b90; margin-left: 40px;">รายละเอียดอุปกรณ์อื่นๆ</h4>
        </div>
        <div class="Investment zone" style="position: relative; margin-top: 50px; padding: 20px 0;">
            <input class="check-box" type="checkbox" name="" id="investment" value="รายละเอียดการลงทุนในการออกแบบและติดตั้ง" style="position: absolute; top: 0; right: 50px; z-index: 3;" onclick="editZone(this)">
            <h4 style="background-color: #275b90; margin-left: 40px;">รายละเอียดการลงทุนในการออกแบบและติดตั้ง</h4>
            <div class="row">
                <div class="sup-content">ผู้ดำเนินการออกแบบ จำหน่าย และติดตั้ง</div>
                <div class="sub-content" id="EPC_Name"></div>
                <div class="sup-content" style="visibility: hidden;"></div>
                <div class="sub-content" style="visibility: hidden;"></div>
            </div>
            <div class="row">
                <div class="sup-content">ค่าก่อสร้าง</div>
                <div class="sub-content" id="Construction_Cost"></div>
                <div class="sup-content">แผงเซลล์อาทิตย์</div>
                <div class="sub-content" id="Machine_Pvmodule"></div>
            </div>
            <div class="row">
                <div class="sup-content">เครื่องแปลงไฟ</div>
                <div class="sub-content" id="Machine_Inverter"></div>
                <div class="sup-content">ระบบกักเก็บพลังงาน</div>
                <div class="sub-content" id="Machine_ESS"></div>
            </div>
            <div class="row">
                <div class="sup-content">อื่นๆ</div>
                <div class="sub-content" id="Machine_Equipment"></div>
                <div class="sup-content" style="visibility: hidden;"></div>
                <div class="sub-content" style="visibility: hidden;"></div>
            </div>
            <div class="row">
                <div class="sup-content">ค่าติดตั้ง</div>
                <div class="sub-content" id="Machine_Setup"></div>
                <div class="sup-content">ค่าทดลองเครื่อง</div>
                <div class="sub-content" id="Machine_Trial"></div>
            </div>
            <div class="row">
                <div class="sup-content">ค่าใช้จ่ายก่อนเปิดดำเนินการ</div>
                <div class="sub-content" id="Expenses"></div>
                <div class="sup-content">มูลค่าสินทรัพย์อื่น ๆ</div>
                <div class="sub-content" id="Asset"></div>
            </div>
            <div class="row">
                <div class="sup-content">ค่าที่ดิน</div>
                <div class="sub-content" id="Land_Value"></div>
                <div class="sup-content">ค่าวิชาการ</div>
                <div class="sub-content" id="Academic"></div>
            </div>
            <div class="row">
                <div class="sup-content">เงินทุนหมุนเวียน</div>
                <div class="sub-content" id="Circulation"></div>
                <div class="sup-content" style="visibility: hidden;"></div>
                <div class="sub-content" style="visibility: hidden;"></div>
            </div>
            <div class="row">
                <div class="sup-content">รวมเงินลงทุน</div>
                <div class="sub-content" id="Result"></div>
                <div class="sup-content" style="visibility: hidden;"></div>
                <div class="sub-content" style="visibility: hidden;"></div>
            </div>
        </div>
        <div class="SIP zone" style="position: relative; margin-top: 50px; padding: 20px 0;">
            <input class="check-box" type="checkbox" name="" id="SIP" value="แผนการดำเนินงาน" style="position: absolute; top: 0; right: 50px; z-index: 3;" onclick="editZone(this)">
            <h4 style="background-color: #275b90; margin-left: 40px;">แผนการดำเนินงาน</h4>
            <div class="row">
                <div class="sup-content">ค่าก่อสร้าง</div>
                <div class="sub-content" id="Plan_Survey"></div>
                <div class="sup-content">แผงเซลล์อาทิตย์</div>
                <div class="sub-content" id="Plan_Procurement"></div>
            </div>
            <div class="row">
                <div class="sup-content">เครื่องแปลงไฟ</div>
                <div class="sub-content" id="Plan_installation"></div>
                <div class="sup-content">ระบบกักเก็บพลังงาน</div>
                <div class="sub-content" id="Plan_COD"></div>
            </div>
        </div>
        <div class="ESA zone" style="position: relative; margin-top: 50px; padding: 20px 0; display: none;">
            <input class="check-box" type="checkbox" name="" id="esa" value="แผนการจัดทำรายงานเกี่ยวกับการศึกษามาตรการป้องกัน" style="position: absolute; top: 0; right: 50px; z-index: 3;" onclick="editZone(this)">
            <h4 style="background-color: #275b90; margin-left: 40px;">แผนการจัดทำรายงานเกี่ยวกับการศึกษามาตรการป้องกัน <br>
                และแก้ไขผลกระทบต่อคุณภาพสิ่งแวดล้อมและความปลอดภัย (ESA)</h4>
            <div class="row">
                <div class="sup-content">ชื่อบริษัทผู้จัดทำรายงาน ESA</div>
                <div class="sub-content" id="ESA_Name"></div>
                <div class="sup-content">การศึกษาและจัดจ้างบริษัทที่ปรึกษา</div>
                <div class="sub-content" id="ESA_Consult"></div>
            </div>
            <div class="row">
                <div class="sup-content">การศึกษาและรวบรวมข้อมูลสภาพแวดล้อมปัจจุบัน</div>
                <div class="sub-content" id="ESA_Study"></div>
                <div class="sup-content">การประเมินผลกระทบต่อสิ่งแวดล้อมและ<br>การกำหนดมาตรการป้องกันและ<br>แก้ไขผลกระทบต่อคุณภาพสิ่งแวดล้อมและความปลอดภัย (ESA)</div>
                <div class="sub-content" id="ESA_Complete"></div>
            </div>
        </div>
        <div class="overlay" id="overlay"></div>
        <div class="edit-content" id="editContent" >
            <div class="row" style="display: flex; justify-content: center;">
                <div class="edit-sup-content">
                    Doc_No
                </div>
                <div class="edit-sub-content" id="doc_no">
                    
                </div>
            </div>
            <div class="row" style="display: flex; justify-content: center;">
                <div class="edit-sup-content">
                    ส่วนที่ส่งกลับแก้ไข
                </div>
                <div class="edit-sub-content" id="editbox">

                </div>
            </div>
            <div class="row" style="display: flex; justify-content: center;">
                <div class="edit-sup-content">
                    รายละเอียดการแก้ไข
                </div>
                <div class="edit-sub-content">
                    <textarea name="" id="inforBox" cols="30" rows="10" style="width: 100%; height: 50px; resize: none; padding: 0 5px;"></textarea>
                </div>
            </div>
            <div class="row" style="display: flex; justify-content: center;">
                <div class="edit-sup-content">
                    เจ้าหน้าที่ที่ส่งกลับแก้ไข
                </div>
                <div class="edit-sub-content" id="assignName">sadasda</div>
            </div>
            <div class="confirm-edit" style="cursor: pointer;" onclick="editRequest()">ยืนยันการส่งแก้ไข</div>
        </div>

        <script>
            const tabs = document.querySelectorAll('[data-tab-target]')
            const tabContents = document.querySelectorAll('[data-tab-content]')
            const gos = document.querySelectorAll('[target]')
            tabs.forEach(tab => {
                tab.addEventListener('click', () => {
                    const target = document.querySelector(tab.dataset.tabTarget)
                    tabContents.forEach(tabContent => {
                        tabContent.classList.remove('active')
                    })
                    tabs.forEach(tab => {
                        tab.classList.remove('active')
                    })
                    tab.classList.add('active')
                    target.classList.add('active')
                })
            })
        </script>
        <?php
        include_once('adminDB.php');
        $fetchData = new adminDB();
        $solarRequest = $fetchData->fetch_solarRequest($doc_no);
        if (isset($solarRequest)) {
            $productDetail = $fetchData->fetch_productDetail($solarRequest[0]['ProductDetail_ID']);
            $rooftopSolar = $fetchData->fetch_rooftopSolar($solarRequest[0]["ProductDetail_ID"]);
            $farmSolar = $fetchData->fetch_farmSolar($solarRequest[0]["ProductDetail_ID"]);
            $floatingSolar = $fetchData->fetch_floatingSolar($solarRequest[0]["ProductDetail_ID"]);
            $rooftopInverter = $fetchData->fetch_rooftopInverter($solarRequest[0]["ProductDetail_ID"]);
            $farmInverter = $fetchData->fetch_farmInverter($solarRequest[0]["ProductDetail_ID"]);
            $floatingInverter = $fetchData->fetch_floatingInverter($solarRequest[0]["ProductDetail_ID"]);
            $ess = $fetchData->fetch_ess($solarRequest[0]["ProductDetail_ID"]);
            $equipment = $fetchData->fetch_equipment($solarRequest[0]["ProductDetail_ID"]);
            $investmentDetail = $fetchData->fetch_investmentDetail($solarRequest[0]['InvestmentDetail_ID']);
            $sip = $fetchData->fetch_sip($doc_no);
            $esa = $fetchData->fetch_esa($doc_no);
        }
        ?>
    </section>
    <script>
        const solarRequest = JSON.parse(JSON.stringify(<?php echo json_encode($solarRequest, JSON_PRETTY_PRINT); ?>, null, 4));
        const productDetail = JSON.parse(JSON.stringify(<?php echo json_encode($productDetail, JSON_PRETTY_PRINT); ?>, null, 4));
        const rooftopSolar = JSON.parse(JSON.stringify(<?php echo json_encode($rooftopSolar, JSON_PRETTY_PRINT); ?>, null, 4));
        const rooftopInverter = JSON.parse(JSON.stringify(<?php echo json_encode($rooftopInverter, JSON_PRETTY_PRINT); ?>, null, 4));
        const farmSolar = JSON.parse(JSON.stringify(<?php echo json_encode($farmSolar, JSON_PRETTY_PRINT); ?>, null, 4));
        const farmInverter = JSON.parse(JSON.stringify(<?php echo json_encode($farmInverter, JSON_PRETTY_PRINT); ?>, null, 4));
        const floatingSolar = JSON.parse(JSON.stringify(<?php echo json_encode($floatingSolar, JSON_PRETTY_PRINT); ?>, null, 4));
        const floatingInverter = JSON.parse(JSON.stringify(<?php echo json_encode($floatingInverter, JSON_PRETTY_PRINT); ?>, null, 4));
        const ess = JSON.parse(JSON.stringify(<?php echo json_encode($ess, JSON_PRETTY_PRINT); ?>, null, 4));
        const equipment = JSON.parse(JSON.stringify(<?php echo json_encode($equipment, JSON_PRETTY_PRINT); ?>, null, 4));
        const investmentDetail = JSON.parse(JSON.stringify(<?php echo json_encode($investmentDetail, JSON_PRETTY_PRINT); ?>, null, 4));
        const esa = JSON.parse(JSON.stringify(<?php echo json_encode($esa, JSON_PRETTY_PRINT); ?>, null, 4));
        const sip = JSON.parse(JSON.stringify(<?php echo json_encode($sip, JSON_PRETTY_PRINT); ?>, null, 4));
        addProductDetail(productDetail)
        if (rooftopSolar.length > 0) {
            document.getElementsByClassName('Rooftop')[0].style.display = 'block'
            addRoofSolar(rooftopSolar)
            addRoofInverter(rooftopInverter)
        }

        if (farmSolar.length > 0) {
            document.getElementsByClassName('Farm')[0].style.display = 'block'
            addFarmSolar(farmSolar)
            addFarmInverter(farmInverter)
        }

        if (floatingSolar.length > 0) {
            document.getElementsByClassName('Floating')[0].style.display = 'block'
            addFloatingSolar(floatingSolar)
            addFloatingInverter(floatingInverter)
        }

        if (ess.length > 0) {
            document.getElementsByClassName('ESS')[0].style.display = 'block'
            addESS(ess)
        }

        if (equipment.length > 0) {
            document.getElementsByClassName('Equipment')[0].style.display = 'block'
            addEquipment(equipment)
        }
        addInvestment(investmentDetail)
        addSIP(sip)
        if (esa.length > 0) {
            document.getElementsByClassName('ESA')[0].style.display = 'block'
            addESA(esa)
        }

        if(Position == "ผอกอง") {
            let editBtn = document.getElementsByClassName('edit-btn')
            editBtn[0].style.display = 'none'
            let backBtn = document.getElementsByClassName('home-btn')
            backBtn[0].style.marginLeft = 'auto'
        }
    </script>
</body>

</html>