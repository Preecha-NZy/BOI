<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin_CSS/ตรวจสอบและรับคำขอแบบยื่นออนไลน์.css">
    <link rel="stylesheet" href="/font/simplelineicons.github.io-master/simplelineicons.github.io-master/css/simple-line-icons.css">
    <link rel="icon" href="https://boi-investment.boi.go.th/assets/images/favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Prompt&display=swap" rel="stylesheet">
    <script src="admin_JAVASCRIPT/ตรวจสอบและรับคำขอแบบยื่นออนไลน์.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://kit.fontawesome.com/e73227180e.js" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: Prompt;
        }
    </style>
    <title>ระบบสนับสนุนงานส่งเสริมการลงทุน (e-Investment Promotion)</title>
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

        <script>
            <?php
            $ID = $_POST['id'];
            $Fname = $_POST['fname'];
            $Lname = $_POST['lname'];
            $Position = $_POST['position'];
            ?>
            let ID = '<?php echo $ID; ?>'
            let Fname = '<?php echo $Fname; ?>'
            let Lname = '<?php echo $Lname; ?>'
            let Position = '<?php echo $Position; ?>'
            if (Fname != '' && Lname != '') {
                document.getElementById('user-name').innerHTML = `${Fname} ${Lname}`
            } else {
                window.location.href = "/admin/index.php";
            }
        </script>

        <section class="title-content" style="background-color: #E5E5E5;">
            <img src="admin_HTML/icon/icon-admin-01-01.png" alt="">
            <div class="title">
                <h4>
                    ตรวจสอบและรับคำขอแบบยื่นออนไลน์
                </h4>
            </div>
            <div class="home-btn" onclick="investment_menu()">
                <a> <i class="icon-home" style="margin-right: 5px;"></i>กลับหน้าหลัก</a>
            </div>
        </section>
    </section>
    <section class="content" style="padding-top: 150px;">
        <form method="GET" id="form_wf_search" name="form_wf_search" action="#">
            <div>
                <h4>
                    <i class="icon-magnifier" style="margin-right: 5px;"></i>
                    ค้นหา
                </h4>
            </div>

            <div class="form-search">
                <div class="row-search">
                    <div class="input-search">
                        <label class="search-label" name="search">DOC NO.</label>
                        <input type="text" id="doc_no" class="input">
                    </div>
                    <div class="input-search">
                        <label class="search-label" for="">เลขที่คำขอ</label>
                        <input type="text" id="เลขที่คำขอ" class="input">
                    </div>
                </div>
                <div class="row-search">
                    <div class="input-search">
                        <label class="search-label" for="">สถานะ</label>
                        <select name="power-source" id="สถานะ" class="input">
                            <option value="" disabled selected> กรุณาเลือก </option>
                            <option value="รอตรวจสอบ">รอยืนยันคำขอ</option>
                            <option value="รอตรวจสอบ">อยู่ระหว่างตรวจสอบแก้ไข</option>
                            <option value="รับคำขอแล้ว">รับคำขอแล้ว</option>
                            <option value="ไม่อนุมัติ">ไม่อนุมัติ</option>
                            <option value="รอยืนยันยกเลิกคำขอ">รอยืนยันยกเลิกคำขอ</option>
                            <option value="ยกเลิกคำขอ">ยกเลิกคำขอ</option>
                            <option value="คืนคำขอ">คืนคำขอ</option>
                            <option value="ส่งให้แก้ไข">ส่งกลับแก้ไข</option>
                            <option value="รอยื่นคำขอ">รอยื่นคำขอ</option>
                            <option value="ยื่นขอดําเนินการแทน">ยื่นขอดําเนินการแทน</option>
                            <option value="รออนุมัติยื่นขอดําเนินการแทน">รออนุมัติยื่นขอดําเนินการแทน</option>
                            <option value="อนุมัติยื่นขอดําเนินการแทน">อนุมัติยื่นขอดําเนินการแทน</option>
                        </select>
                    </div>
                    <div class="input-search">
                        <label class="search-label" for="">ผู้ยื่นคำขอ</label>
                        <input type="text" id="ผู้ยื่นคำขอ" class="input">
                    </div>
                </div>
                <div class="row-search">
                    <div class="input-search">
                        <label class="search-label" for="">ประเภทกิจการ</label>
                        <input type="text" id="ประเภทกิจการ" class="input">
                    </div>
                    <div class="input-search">
                        <label class="search-label" for="">วันที่รับคำขอ</label>
                        <input type="date" name="mydate" id="วันที่รับคำขอ" class="input">
                    </div>
                </div>
                <div class="row-search">
                    <div class="input-search">
                        <label class="search-label" for="">เลขอ้างอิง</label>
                        <input type="text" id="เลขอ้างอิง" class="input">
                    </div>
                </div>
            </div>
            <div class="btn-section">
                <div name="wf_search" id="wf_search" class="search-btn" onclick="serachRequest()">
                    <i class="icon-magnifier" style="margin-right: 5px;"></i>
                    ค้นหา
                </div>
                <div name="wf_reset" id="wf_reset" class="reset-btn" onclick="refreshSearch()">
                    <i class="icon-refresh" style="margin-right: 5px;"></i>
                    RESET
                </div>
            </div>

        </form>
        <div style="display: flex; flex-direction: column;">
            <table class="table table-bordered" style="text-align: center; font-size: 15px;" id="data-table">
                <thead>
                    <tr style="background-color: #0d6efd; color: white;">
                        <th style="width:3%;">ลำดับ</th>
                        <th style="width:6%;">เลขอ้างอิง</th>
                        <th style="width:6%;">DOC NO.</th>
                        <th style="width:7%;">เลขที่คำขอ</th>
                        <th style="width:7%;">วันที่ยื่นคำขอ</th>
                        <th style="width:7%;">วันที่รับคำขอ</th>
                        <th style="width:7%;">วันที่สิ้นสุด</th>
                        <th style="width:15%;">ผู้ยื่นคำขอ</th>
                        <th style="width:7%;">ประเภทกิจการ</th>
                        <th style="width:7%;">สถานะ</th>
                        <th style="width:10%;"></th>
                    </tr>
                </thead>
                <tbody style="text-align: center; font-size: 14px; font-weight: 700;">
                </tbody>
            </table>
            <script>
                <?php
                include_once('adminDB.php');
                $fetchData = new adminDB();
                $sql1 = $fetchData->CheckAndReceive_Request_Comment();
                $sql2 = $fetchData->CheckAndReceive_Request_Comment2();

                ?>
                const sql1 = JSON.parse(JSON.stringify(<?php echo json_encode($sql1, JSON_PRETTY_PRINT); ?>, null, 4));
                let offset1 = addRow(sql1['length'], sql1, "red", 0);
                const sql2 = JSON.parse(JSON.stringify(<?php echo json_encode($sql2, JSON_PRETTY_PRINT); ?>, null, 4));
                addRow(sql2['length'], sql2, "black", offset1);
            </script>
        </div>
    </section>
</body>

</html>