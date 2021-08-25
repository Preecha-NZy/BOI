<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin_CSS/รายละเอียดคำขอ.css">
    <script src="admin_JAVASCRIPT/รายละเอียดคำขอ.js"></script>
    <link rel="stylesheet" href="/font/simplelineicons.github.io-master/simplelineicons.github.io-master/css/simple-line-icons.css">
    <link rel="icon" href="https://boi-investment.boi.go.th/assets/images/favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Prompt&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://kit.fontawesome.com/e73227180e.js" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: Prompt;
        }
    </style>
    <title>รายละเอียดคำขอ</title>
</head>

<body>
    <section style="position: fixed; width: 100%; top: 0;">
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

        <?php
        $ID = $_POST['id'];
        $Fname = $_POST['fname'];
        $Lname = $_POST['lname'];
        $Position = $_POST['position'];
        $doc_no = $_POST['doc_no'];
        ?>

        <section class="title-content" style="background-color: #E5E5E5;">
            <img src="admin_HTML/icon/icon-admin-01-01.png" alt="">
            <div class="title">
                <h4>
                    รายละเอียดคำขอ
                </h4>
                <h5>
                    ตรวจสอบและรับคำขอแบบยื่นออนไลน์
                </h5>
            </div>
            <div class="home-btn" onclick="investment_menu()">
                <a> <i class="icon-home" style="margin-right: 5px;"></i>กลับหน้าหลัก</a>
            </div>
        </section>
    </section>
    <section class="main-content" style="padding-top: 150px;">
        <div class="head-content">
            <select name="" id="selected" style="margin-left: auto; margin-right: 0px;">
                <option value="พิมพ์" selected>พิมพ์</option>
                <option value="พิมพ์คำขอรับการส่งเสริม">พิมพ์คำขอรับการส่งเสริม</option>
                <option value="พิมพ์ใบแจ้งตอบรับ (ไทย)">พิมพ์ใบแจ้งตอบรับ (ไทย)</option>
                <option value="พิมพ์ใบแจ้งตอบรับ (อังกฤษ)">พิมพ์ใบแจ้งตอบรับ (อังกฤษ)</option>
                <option value="พิมพ์หนังสือคืนคำขอ">พิมพ์หนังสือคืนคำขอ</option>
            </select>
            <div class="head-btn historyRequest-btn" style="margin-left: 2px;" onclick="requestHistory()"><i class="icon-calendar head-icon"></i>ตารางประวัติธุกรรม</div>
            <div class="head-btn assign-btn" id="assign" style="margin-left: 2px; display: none" onclick="togglePopup()"><i class="icon-check head-icon"></i>มอบหมายงาน</div>
            <div class="head-btn reviewRequest-btn" style="margin-left: 2px;" onclick="checkRequest()"><i class="icon-pencil head-icon"></i>ดูคำขอ/ส่งกลับแก้ไข</div>
            <div class="head-btn accept-assign-btn" id="accept" style="margin-left: 2px; display: none" onclick="accept()"><i class="fas fa-check head-icon"></i>รับมอบหมาย</div>
            <div class="head-btn cancelRequest-btn" style="margin-left: 2px;"><i class="fas fa-redo-alt head-icon"></i>ยกเลิกคำขอ</div>
            <div class="head-btn receiveRequest-btn" id="receiveRequest" style="margin-left: 2px;" onclick="receiveRequest()"><i class="far fa-save head-icon"></i>รับคำขอ</div>
        </div>

        <div class="title-main-content">คำขอรับการส่งเสริม</div>
        <div class="row">
            <div class="sup-content">ผู้ขอ</div>
            <div class="sub-content" id="ผู้ยื่นคำขอ"></div>
            <div class="sup-content">วันที่ยื่นคำขอ</div>
            <div class="sub-content" id="วันที่ยื่นคำขอ"></div>
        </div>
        <div class="row">
            <div class="sup-content">ชื่อตัวแทน</div>
            <div class="sub-content" id="ชื่อตัวแทน"></div>
            <div class="sup-content">วันที่รับคำขอ</div>
            <div class="sub-content" id="วันที่รับคำขอ"></div>
        </div>
        <div class="row">
            <div class="sup-content">Doc No.</div>
            <div class="sub-content" id="doc_no"></div>
            <div class="sup-content">กำหนดแล้วเสร็จ</div>
            <div class="sub-content" id="วันที่สิ้นสุด"></div>
        </div>
        <div class="row">
            <div class="sup-content">เลขที่คำขอ</div>
            <div class="sub-content" id="เลขคำขอ"></div>
            <div class="sup-content">สถานะ</div>
            <div class="sub-content" id="สถานะ"></div>
        </div>
        <div class="row">
            <div class="sup-content">เลข DMS</div>
            <div class="sub-content" id="DMS"></div>
            <div class="sup-content">วันที่ปรับปรุงล่าสุด</div>
            <div class="sub-content" id="วันที่ปรับปรุงล่าสุด"></div>
        </div>
        <div class="row">
            <div class="sup-content">ประเภทกิจการ</div>
            <div class="sub-content" id="ประเภทกิจการ"></div>
            <div class="sup-content">ผู้พิจารณาโครงการ</div>
            <div class="sub-content" id="ชื่อผู้รับมอบหมาย"></div>
        </div>
        <div class="row">
            <div class="sup-content">ระยะเวลา</div>
            <div class="sub-content" id="ระยะเวลา"></div>
            <div class="sup-content">ผู้รับคำขอ</div>
            <div class="sub-content" id="ผู้รับคำขอ"></div>
        </div>
        <div class="row">
            <div class="sup-content">ช่องทาง</div>
            <div class="sub-content" id="ช่องทาง"></div>
            <div class="sup-content" style="visibility: hidden;"></div>
            <div class="sub-content" style="visibility: hidden;"></div>
        </div>

        <div class="assign-popup" id="popup">
            <div class="overlay"></div>
            <div class="popup-content">
                <div class="close-btn" onclick="togglePopup()">&times;</div>
                <div class="popup-row">
                    <div class="popup-sup-content">
                        หมายเลขคำขอ
                    </div>
                    <div class="popup-sub-content" id="requestNumber">
                        aaaaaaaaaaaaaa
                    </div>
                </div>
                <div class="popup-row">
                    <div class="popup-sup-content">
                        ผู้มอบหมาย
                    </div>
                    <div class="popup-sub-content" id="assignor_name">
                    </div>
                </div>
                <div class="popup-row">
                    <div class="popup-sup-content">
                        ผู้รับมอบหมาย
                    </div>
                    <div class="popup-sub-content" id="">
                        <select name="" id="assigneeName"></select>
                    </div>
                </div>
                <div class="head-btn assign-btn" style="height: 30px;" onclick="assign()">มอบหมายคำขอ</div>
            </div>
        </div>
        <?php
        include_once('adminDB.php');
        $fetchData = new adminDB();
        $sql = $fetchData->checkRequest_info($doc_no);
        if ($Position != 'Comment_id') {
            $assigneeName = $fetchData->fetch_assigneeName($Position);
        }
        ?>
        <script>
            let ID = '<?php echo $ID; ?>'
            let Fname = '<?php echo $Fname; ?>'
            let Lname = '<?php echo $Lname; ?>'
            let Position = '<?php echo $Position; ?>'
            let Doc_no = '<?php echo $doc_no; ?>'
            if (Fname != '' && Lname != '') {
                document.getElementById('user-name').innerHTML = `${Fname} ${Lname}`
            } else {
                window.location.href = "/admin/index.php";
            }
            let cancelBtn = document.getElementsByClassName('cancelRequest-btn')[0]
            let assignBtn = document.getElementsByClassName('assign-btn')[0]
            let acceptAssign = document.getElementsByClassName('accept-assign-btn')[0]
            let receiveBtn = document.getElementsByClassName('receiveRequest-btn')[0]
            if (Position != 'Comment_id') {
                cancelBtn.style.display = 'none'
                receiveBtn.style.display = 'none'
                selected.style.visibility = "hidden";
                if (Position == 'ผอกอง' || Position == 'หัวหน้าสาย') {
                    assignBtn.style.display = 'flex'
                }
                if (Position == 'หัวหน้าสาย' || Position == 'เจ้าหน้าที่') {
                    acceptAssign.style.display = 'flex'
                }
                const assigneeName = JSON.parse(JSON.stringify(<?php echo json_encode($assigneeName, JSON_PRETTY_PRINT); ?>, null, 4))
                document.getElementById('assignor_name').innerHTML = `${Fname} ${Lname}`
                add_AssigneeName(assigneeName)
            }
            const sql1 = JSON.parse(JSON.stringify(<?php echo json_encode($sql, JSON_PRETTY_PRINT); ?>, null, 4));
            addData(sql1)
            let status = document.getElementById('สถานะ').innerHTML
            if (status != 'รอยืนยันคำขอ') {
                receiveBtn.style.cursor = 'not-allowed'
            }
            if (ชื่อผู้รับมอบหมาย.innerHTML !== `${Fname} ${Lname}` || status == 'อยู่ระหว่างตรวจสอบแก้ไข') {
                assignBtn.style.cursor = 'not-allowed'
                acceptAssign.style.cursor = 'not-allowed'
            }
            if (ชื่อผู้รับมอบหมาย.innerHTML !== `${Fname} ${Lname}` && status == 'รอมอบหมาย') {
                assignBtn.style.cursor = 'not-allowed'
                acceptAssign.style.cursor = 'not-allowed'
            }
        </script>
        <div class="file-content" style="margin-top: 50px;">
            <div class="title-file-content">เอกสารข้อมูลโครงการและรายละเอียดสัญญาการซื้อขาย</div>
            <div class="productFrame frameFile">
                <iframe name="myiframe" id="productFile" src="fetchProductFile.php?doc_no=<?php echo $doc_no; ?>" style="height: 450px; width: 100%;"></iframe>
            </div>
            <div class="title-file-content">เอกสารรายการเซลล์แสงอาทิตย์และเครื่องแปลงไฟบนหลังคา</div>
            <div class="productFrame frameFile">
                <iframe name="myiframe" id="roofFile" src="fetchRoofFile.php?doc_no=<?php echo $doc_no; ?>" style="height: 450px; width: 100%;"></iframe>
            </div>
            <div class="title-file-content">เอกสารรายการเซลล์แสงอาทิตย์และเครื่องแปลงไฟบนพื้นดิน</div>
            <div class="productFrame frameFile">
                <iframe name="myiframe" id="farmFile" src="fetchFarmFile.php?doc_no=<?php echo $doc_no; ?>" style="height: 450px; width: 100%;"></iframe>
            </div>
            <div class="title-file-content">เอกสารรายการเซลล์แสงอาทิตย์และเครื่องแปลงไฟบนทุ่นลอยน้ำ</div>
            <div class="productFrame frameFile">
                <iframe name="myiframe" id="floatingFile" src="fetchFloatingFile.php?doc_no=<?php echo $doc_no; ?>" style="height: 450px; width: 100%;"></iframe>
            </div>
            <div class="title-file-content">เอกสารรายการระบบกักเก็บพลังงาน</div>
            <div class="productFrame frameFile">
                <iframe name="myiframe" id="essFile" src="fetchESSFile.php?doc_no=<?php echo $doc_no; ?>" style="height: 450px; width: 100%;"></iframe>
            </div>
        </div>
    </section>
</body>

</html>