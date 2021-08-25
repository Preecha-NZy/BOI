<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin_CSS/เปลี่ยนผู้ดำเนินการ.css">
    <link rel="stylesheet" href="/font/simplelineicons.github.io-master/simplelineicons.github.io-master/css/simple-line-icons.css">
    <link rel="icon" href="https://boi-investment.boi.go.th/assets/images/favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Prompt&display=swap" rel="stylesheet">
    <script src="admin_JAVASCRIPT/เปลี่ยนผู้ดำเนินการ.js"></script>
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
            <img src="admin_HTML/icon/icon-admin-05-01.png" alt="">
            <div class="title">
                <h4>
                    เปลี่ยนผู้ดำเนินการ
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

        <div class="form-search">
            <div class="row-search">
                <div class="input-search">
                    <label class="search-label" for="">ผู้ขอดำเนินการแทน</label>
                    <input type="text">
                </div>
                <div class="input-search">
                    <label class="search-label" for="">สถานะ</label>
                    <label class="rad-label">
                        <input type="radio" class="rad-input" name="status">
                        <label class="rad-text">รอพิจารณา</label>
                    </label>
                    <label class="rad-label">
                        <input type="radio" class="rad-input" name="status">
                        <div class="rad-text">อนุมัติ</div>
                    </label>
                </div>
            </div>
        </div>
        <div class="btn-section">
            <div class="search-btn">
                <i class="icon-magnifier" style="margin-right: 5px;"></i>
                ค้นหา
            </div>
            <div class="reset-btn">
                <i class="icon-refresh" style="margin-right: 5px;"></i>
                RESET
            </div>
        </div>
        <div>
            <table cellspacing="0" class="table table-bordered">
                <thead>
                    <tr class="bg-primary">
                        <th style="width:3%;">ลำดับ</th>
                        <th style="width:7%;">วันที่ยื่นคำขอ</th>
                        <th style="width:30%;">ผู้ขอดำเนินการแทน</th>
                        <th style="width:7%;">สถานะ</th>
                        <th style="width:10%;"></th>
                    </tr>
                </thead>
            </table>
        </div>
    </section>
</body>

</html>