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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="admin_JAVASCRIPT/ตารางประวัติธุกรรม.js"></script>
    <script src="https://kit.fontawesome.com/e73227180e.js" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: Prompt;
        }
    </style>
    <title>ตารางประวัติธุรกรรม.php</title>
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
            $doc_no = $_POST['doc_no'];
            ?>
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
        </script>

        <section class="title-content" style="background-color: #E5E5E5;">
            <img src="admin_HTML/icon/icon-admin-01-01.png" alt="">
            <div class="title">
                <h4>
                    ตารางประวัติธุรกรรม
                </h4>
            </div>
            <div class="home-btn" onclick="investment_menu()">
                <a> <i class="icon-home" style="margin-right: 5px;"></i>กลับหน้าหลัก</a>
            </div>
        </section>
    </section>
    <section class="content" style="padding-top: 150px;">
        <div style="display: flex; flex-direction: column;">
            <table class="table table-bordered" style="text-align: center; font-size: 15px;" id="data-table">
                <thead>
                    <tr style="background-color: #0d6efd; color: white; width: 100%;">
                        <th>ลำดับ</th>
                        <th>DOC NO.</th>
                        <th>เลขที่คำขอ</th>
                        <th>วันที่/เวลา</th>
                        <th>ผู้ดำเนินการ</th>
                        <th>ผู้รับมอบหมาย</th>
                        <th>ประเภทกิจการ</th>
                        <th>สถานะ</th>
                    </tr>
                </thead>
                <tbody style="text-align: center; font-size: 14px; font-weight: 700;">
                </tbody>
            </table>
            <script>
                <?php
                include_once('adminDB.php');
                $fetchData = new adminDB();
                $sql = $fetchData->fetchRequestHistory($doc_no);
                ?>
                const sql1 = JSON.parse(JSON.stringify(<?php echo json_encode($sql, JSON_PRETTY_PRINT); ?>, null, 4));
                addRow(sql1, sql1['length'])

                function addRow(data, rowLength) {
                    let tBodyEl = document.querySelector('tbody')
                    for (i = 0; i < rowLength; i++) {
                        let name;
                        let staus;
                        if (data[i]['สถานะ'] == 'รอยืนยันคำขอ') {
                            name = data[i]['ชื่อผู้มอบหมาย']
                            staus = 'ยื่นคำขอ'
                        } else {
                            name = data[i]['ชื่อผู้รับมอบหมาย']
                            staus = data[i]['สถานะ']
                        }
                        tBodyEl.innerHTML += `
                            <tr>
                                <td>${i + 1}</td>
                                <td>${data[i]['doc_no']}</td>
                                <td>${idCheck(data[i]['เลขคำขอ'])}</td>
                                <td>${dateCheck(data[i]['วันที่มอบหมาย'])}</td>
                                <td>${data[i]['ชื่อผู้มอบหมาย']}</td>
                                <td>${data[i]['ชื่อผู้รับมอบหมาย']}</td>
                                <td>${data[i]['ประเภทกิจการ']}</td>
                                <td>${staus}</td>
                            </tr>
                            `
                    }
                    return i
                }

                function idCheck(id) {
                    if (id == null) {
                        return "";
                    }
                    return id;
                }

                function dateCheck(dateTime) {
                    if (dateTime != null) {
                        let splitDate = dateTime.split(" ")
                        let date = splitDate[0].split("/")
                        let year = parseInt(date[2]) + 543
                        let dateChange = `${date[0]}/${date[1]}/${year} ${splitDate[1]}`
                        return dateChange
                    }
                    return ""
                }
            </script>
        </div>
    </section>
</body>

</html>