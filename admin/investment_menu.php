<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin_CSS/investment_menu.css">
    <link rel="stylesheet" href="/font/simplelineicons.github.io-master/simplelineicons.github.io-master/css/simple-line-icons.css">
    <link rel="icon" href="https://boi-investment.boi.go.th/assets/images/favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Prompt&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="admin_JAVASCRIPT/investment_menu.js"></script>
    <style>
        body {
            font-family: Prompt;
        }
    </style>
    <title>ระบบสนับสนุนงานส่งเสริมการลงทุน (e-Investment Promotion)</title>
</head>

<body>
    <section style="position: fixed; width: 100%; top: 0; z-index: 20;">
        <header>
            <div class="hd-left">
                <img src="https://boi-investment.boi.go.th/img_boi/logo.png" alt="">
            </div>
            <div class="hd-right">
                <i class="icon-bell"></i>
                <img src="https://boi-investment.boi.go.th/assets/images/avatar-2.png" alt="" class="user-img">
                <p id="user-name"></p>
            </div>
            <?php
            $ID = $_POST['id'];
            $Fname = $_POST['fname'];
            $Lname = $_POST['lname'];
            $Position = $_POST['position'];
            ?>
        </header>
        <section class="title-content" style="background-color: #E5E5E5;">
            <div class="title">
                <h4>
                    ระบบสนับสนุนงานส่งเสริมการลงทุน (e-Investment Promotion)
                </h4>
            </div>
        </section>
    </section>
    <section class="content" style="padding-top: 150px;">
        <div class="title ข้อมูลคำขอ">
            <h4>
                <i class="icon-folder-alt" style="margin-right: 10px;"></i>
                ข้อมูลคำขอ
            </h4>
        </div>
        <div class="sub-content ข้อมูลคำขอ">
            <div class="box-content" onclick="request_online()">
                <div class="img-center">
                    <img src="admin_HTML/icon/icon-admin-01-01.png" alt="">
                </div>
                <div class="text-center">
                    ตรวจสอบและรับคำขอแบบยื่นออนไลน์
                </div>
            </div>
            <div class="box-content" onclick="request_mself()">
                <div class="img-center">
                    <img src="admin_HTML/icon/icon-admin-01-02.png" alt="">
                </div>
                <div class="text-center">ตรวจสอบและรับคำขอแบบยื่นด้วยตนเองที่สำนักงาน</div>
            </div>
            <div class="box-content" onclick="suggest_invest()">
                <div class="img-center">
                    <img src="admin_HTML/icon/icon15.png" alt="">
                </div>
                <div class="text-center">แนะนำการยื่นคำขอ</div>
            </div>
            <div class="box-content">
                <div class="img-center" onclick="change_operator()">
                    <img src="admin_HTML/icon/icon-admin-05-01.png" alt="">
                </div>
                <div class="text-center">เปลี่ยนผู้ดำเนินการ</div>
            </div>
            <div class="box-content">
                <div class="img-center" onclick="number()">
                    <img src="admin_HTML/icon/icon-user-02-02.png" alt="">
                </div>
                <div class="text-center">ออกเลข นร.</div>
            </div>
        </div>
        <div class="title">
            <h4>
                <i class="icon-people" style="margin-right: 10px;"></i>
                มอบหมายงาน
            </h4>
        </div>
        <div class="sub-content">
            <div class="box-content" onclick="dispact_info()">
                <div class="img-center">
                    <img src="admin_HTML/icon/icon-admin-04-02.png" alt="">
                </div>
                <div class="text-center">ข้อมูลการมอบหมายงาน</div>
            </div>
            <div class="box-content มอบหมายอำนาจ" onclick="assign_info()">
                <div class="img-center">
                    <img src="admin_HTML/icon/icon-admin-04-02.png" alt="">
                </div>
                <div class="text-center">มอบหมายอำนาจรักษาการแทน</div>
            </div>
        </div>
        <div class="title">
            <h4>
                <i class="icon-note" style="margin-right: 10px;"></i>
                งานวิเคราะห์โครงการ
            </h4>
        </div>
        <div class="sub-content">
            <div class="box-content" onclick="project_analysis()">
                <div class="img-center">
                    <img src="admin_HTML/icon/icon-admin-02-01.png" alt="">
                </div>
                <div class="text-center">งานวิเคราะห์โครงการ</div>
            </div>
            <div class="box-content" onclick="in_project_analysis()">
                <div class="img-center">
                    <img src="admin_HTML/icon/icon-admin-02-01.png" alt="">
                </div>
                <div class="text-center">งานวิเคราะห์โครงการภายในกอง</div>
            </div>
        </div>
    </section>
    <script>
        let ID = '<?php echo $ID; ?>'
        let Fname = '<?php echo $Fname; ?>'
        let Lname = '<?php echo $Lname; ?>'
        let Position = '<?php echo $Position; ?>'
        console.log(ID)
        console.log(Position)
        console.log(`${Fname} ${Lname}`)
        if (Fname != '' && Lname != '') {
            document.getElementById('user-name').innerHTML = `${Fname} ${Lname}`
        } else {
            window.location.href = "/admin/index.php";
        }

        checkPosition(Position)
    </script>
</body>

</html>