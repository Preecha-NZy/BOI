<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin_CSS/ตรวจสอบและรับคำขอแบบยื่นด้วยตนเองที่สำนักงาน.css">
    <link rel="stylesheet" href="/font/simplelineicons.github.io-master/simplelineicons.github.io-master/css/simple-line-icons.css">
    <link rel="icon" href="https://boi-investment.boi.go.th/assets/images/favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Prompt&display=swap" rel="stylesheet">
    <script src="admin_JAVASCRIPT/ตรวจสอบและรับคำขอแบบยื่นด้วยตนเองที่สำนักงาน.js"></script>
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
            <img src="https://boi-investment.boi.go.th/icon/icon-user-01-01.png" alt="">
            <div class="title">
                <h4>
                    ตรวจสอบและรับคำขอแบบยื่นด้วยตนเองที่สำนักงาน
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
                <i class="icon-magnifier" style="margin-right: 5px; "></i>
                ค้นหา
            </h4>
        </div>

        <div class="search-section">
            <div class="row-search">
                <div class="input-search">
                    <label for="" class="search-label">DOC NO.</label>
                    <input type="text" name="" id="">
                </div>
                <div class="input-search">
                    <label for="" class="search-label">เลขคำขอ</label>
                    <input type="text" name="" id="">
                </div>
            </div>
            <div class="row-search">
                <div class="input-search">
                    <label for="" class="search-label">สถานะ</label>
                    <select name="" id="">
                        <option value="" selected disabled=true>กรุณาเลือก</option>
                        <option value="8">ส่งให้แก้ไข</option>
                        <option value="10">รอตรวจสอบ</option>
                        <option value="12">รับคำขอแล้ว</option>
                        <option value="19">อนุมัติ</option>
                        <option value="20">ไม่อนุมัติ</option>
                        <option value="21">รอยืนยันยกเลิกคำขอ</option>
                        <option value="22">ยกเลิกคำขอ</option>
                        <option value="23">คืนคำขอ</option>
                        <option value="108">ส่งให้แก้ไข</option>
                        <option value="109">รอยื่นคำขอ</option>
                        <option value="114">ยื่นขอดําเนินการแทน</option>
                        <option value="115">รออนุมัติยื่นขอดําเนินการแทน</option>
                        <option value="116">อนุมัติยื่นขอดําเนินการแทน</option>
                    </select>
                </div>
                <div class="input-search">
                    <label for="" class="search-label">ผู้ยื่นขอ</label>
                    <input type="text" name="" id="">
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
        <!-- <table class="table table-bordered">
            <thead class="table-primary">
                <tr>
                    <th style="width: 10%;">1</th>
                    <th style="width: 45%;">3</th>
                    <th style="width: 45%;">2</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>a</td>
                    <td>b</td>
                    <td>c</td>
                </tr>
            </tbody>
            <tbody>
                <tr>
                    <td>a</td>
                    <td>b</td>
                    <td>c</td>
                </tr>
            </tbody>
            <tbody>
                <tr>
                    <td>a</td>
                    <td>b</td>
                    <td>c</td>
                </tr>
            </tbody>
            <tbody>
                <tr>
                    <td>a</td>
                    <td>b</td>
                    <td>c</td>
                </tr>
            </tbody>
        </table> -->
        <div>
            <table cellspacinf="0" class="table tale-bordered">
                <thead>
                    <tr class="bg-primary">
                        <th style="width:3%;">ลำดับ</th>
                        <th style="width:6%;">เลขอ้างอิง</th>
                        <th style="width:6%;">DOC NO.</th>
                        <th style="width:6%;">เลขที่คำขอ</th>
                        <th style="width:7%;">วันที่ยื่นคำขอ</th>
                        <th style="width:7%;">วันที่รับคำขอ</th>
                        <th style="width:6%;">วันที่สิ้นสุด</th>
                        <th style="width:8%;">ประเภทกิจการ</th>
                        <th style="width:20%;">ผู้ยื่นคำขอ</th>
                        <th style="width:10%;">สถานะ</th>
                        <th style="width:10%;"></th>
                    </tr>
                </thead>
            </table>
        </div>
    </section>
</body>

</html>