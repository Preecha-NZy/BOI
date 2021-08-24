<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin_CSS/ข้อมูลการมอบหมายงาน.css">
    <link rel="icon" href="https://boi-investment.boi.go.th/assets/images/favicon.ico" type="image/x-icon">
    <!-- <link rel="stylesheet" href="myProjects/webProject/icofont/css/icofont.min.css"> -->
    <link rel="stylesheet" href="/font/simplelineicons.github.io-master/simplelineicons.github.io-master/css/simple-line-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Prompt&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="admin_JAVASCRIPT/ข้อมูลการมอบหมายงาน.js"></script>
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
                <i class="icon-bell"></i>
                <img src="https://boi-investment.boi.go.th/assets/images/avatar-2.png" alt="" class="user-img">
                <p id="user-name">ปรีชา ชินรนาท</p>
            </div>
        </header>
        <?php
        $ID = $_POST['id'];
        $Fname = $_POST['fname'];
        $Lname = $_POST['lname'];
        $Position = $_POST['position'];
        ?>
        <section class="title-content" style="background-color: #E5E5E5;">
            <img src="admin_HTML/icon/icon-admin-04-02.png" alt="">
            <div class="title">
                <h4>
                    ข้อมูลการมอบหมายงาน
                </h4>
            </div>
            <div class="home-btn" onclick="investment_menu()">
                <a> <i class="icon-home" style="margin-right: 5px;"></i>กลับหน้าหลัก</a>
            </div>
        </section>
    </section>
    <section class="content" style="padding-top: 150px;">
        <div>
            <h4>
                <i class="icon-magnifier" style="margin-right: 5px;"></i>
                ค้นหา
            </h4>
        </div>

        <div class="search-section">
            <div class="row-search">
                <div class="input-search">
                    <label for="" class="search-label">เลขคำขอ</label>
                    <input type="text" name="" id="doc_no">
                </div>
                <div class="input-search">
                    <label for="" class="search-label">ผู้ยื่นคำขอ</label>
                    <input type="text" name="" id="ผู้ยื่นคำขอ">
                </div>
            </div>
        </div>
        <div class="btn-section">
            <div class="search-btn" onclick="serachRequest()">
                <i class="icon-magnifier" style="margin-right: 5px;"></i>
                ค้นหา
            </div>
            <div class="reset-btn" onclick="refreshSearch()">
                <i class="icon-refresh" style="margin-right: 5px;"></i>
                RESET
            </div>
        </div>
        <div style="display: flex; flex-direction: column;">
            <table class="table table-bordered" style="text-align: center; font-size: 15px;" id="data-table">
                <thead>
                    <tr style="background-color: #0d6efd; color: white;">
                        <th style="width:3%;">ลำดับ</th>
                        <th style="width:6%;">DOC NO.</th>
                        <th style="width:7%;">เลขที่คำขอ</th>
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
                $Fname = $_POST['fname'];
                $Lname = $_POST['lname'];
                $name = $Fname . " " . $Lname;
                $sql1 = $fetchData->CheckAndReceive_Request($Fname, $Lname);
                ?>
                let ID = '<?php echo $ID; ?>'
                let Fname = '<?php echo $Fname; ?>'
                let Lname = '<?php echo $Lname; ?>'
                let Position = '<?php echo $Position; ?>'
                console.log(`${Position} ${Fname} ${Lname}`)
                if (Fname != '' && Lname != '') {
                    document.getElementById('user-name').innerHTML = `${Fname} ${Lname}`
                } else {
                    window.location.href = "/admin/index.php";
                }
                const sql1 = JSON.parse(JSON.stringify(<?php echo json_encode($sql1, JSON_PRETTY_PRINT); ?>, null, 4));
                addRow(sql1['length'], sql1);
            </script>
        </div>
    </section>
</body>

</html>