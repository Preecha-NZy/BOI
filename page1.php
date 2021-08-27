<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/page1.css">
    <link rel="icon" href="https://boi-investment.boi.go.th/assets/images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="font/simplelineicons.github.io-master/simplelineicons.github.io-master/css/simple-line-icons.css">
    <link rel="stylesheet" href="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dist/jquery.Thailand.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Prompt&display=swap" rel="stylesheet">
    <script src="JAVASCRIPT/page1.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dependencies/JQL.min.js"></script>
    <script type="text/javascript" src="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dependencies/typeahead.bundle.js"></script>
    <script type="text/javascript" src="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dist/jquery.Thailand.min.js"></script>
    <script src="https://kit.fontawesome.com/e73227180e.js" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: Prompt;
        }
    </style>
    <title>ระบบสนับสนุนงานส่งเสริมการลงทุน (e-Investment Promotion)</title>
</head>

<body>
    <header>
        <div class="hd-left">
            <img src="https://boi-investment.boi.go.th/img_boi/logo.png" alt="">
        </div>

        <div class="hd-right">
            <i class="icon-magnifier" style="margin-right: 10px; position: relative;" onclick="togglePopup1()"></i>
            <i class="icon-bell" style="margin-right: 10px; position: relative;" onclick="togglePopup()">
                <div class="count"></div>
            </i>
            <img src="https://boi-investment.boi.go.th/assets/images/avatar-2.png" alt="" class="user-img">
            <p id="user-name" style="margin-right: 20px;"></p>
            <i class="fas fa-sign-out-alt" style="color: red; margin-left: auto; margin-right: 10px; cursor: pointer;" onclick="logout()"></i>
        </div>
        <script>
            <?php
            $User_ID = $_POST['id'];
            $User_Fname = $_POST['fname'];
            $User_Lname = $_POST['lname'];
            ?>
            let ID = '<?php echo $User_ID; ?>'
            let Fname = '<?php echo $User_Fname; ?>'
            let Lname = '<?php echo $User_Lname; ?>'
            if (Fname != '' && Lname != '') {
                document.getElementById('user-name').innerHTML = `${Fname} ${Lname}`
            } else {
                window.location.href = "index.php";
            }
        </script>
    </header>
    <section class="title-content" style="position: relative;">
        <div class="title">
            <h4>
                ระบบสนับสนุนงานส่งเสริมการลงทุน (e-Investment Promotion)
            </h4>
        </div>
    </section>

    <section class="content">
        <div class="title">
            <h4>
                <i class="icon-folder-alt" style="margin-right: 10px;"></i>
                ข้อมูลการขอรับการส่งเสริม
            </h4>
        </div>
        <div class="sub-content">
            <div class="box-content" onclick="request_online()">
                <div class="img-center">
                    <img src="/admin/admin_HTML/icon/icon-admin-01-01.png" alt="">
                </div>
                <div class="text-center">
                    ตรวจสอบและรับคำขอแบบยื่นออนไลน์
                </div>
            </div>
    </section>
    <div class="assign-popup" id="popup">
        <div class="overlay"></div>
        <div class="popup-content">
            <div class="close-btn" onclick="togglePopup()">&times;</div>
            <div class="popup-row" style="display: flex; justify-content: center; font-size: 15px; font-weight: 600;">
                แจ้งเตือนการส่งกลับแก้ไขคำขอ
            </div>
            <div class="popup-row">
                <div class="popup-sup-content">
                    ชื่อบริษัทรับการส่งเสริม
                </div>
                <div class="popup-sub-content" id="requestNumber">
                    <select name="" id="companyName"></select>
                </div>
            </div>
            <div class="head-btn edit-btn" style="height: 30px;" onclick="editRequest()">แก้ไขคำขอส่งเสริม</div>
        </div>
    </div>

    <div class="assign-popup" id="popup1">
        <div class="overlay"></div>
        <div class="popup-content">
            <div class="close-btn" onclick="togglePopup1()">&times;</div>
            <div class="popup-row" style="display: flex; justify-content: center; font-size: 15px; font-weight: 600;">
                ค้นหาคำขอรับการส่งเสริม
            </div>
            <div class="popup-row">
                <div class="popup-sup-content">
                    ชื่อบริษัทรับการส่งเสริม
                </div>
                <div class="popup-sub-content" id="requestNumber">
                    <select name="" id="companyName1"></select>
                </div>
            </div>
            <div class="head-btn edit-btn" style="height: 30px;" onclick="viewRequest()">ดูคำขอส่งเสริม</div>
        </div>
    </div>

    <?php
    include_once('admin/adminDB.php');
    $fetchData = new adminDB();
    $count = $fetchData->fetch_editCount($User_ID);
    $editData = $fetchData->fetch_edit($User_ID);
    $request = $fetchData->fetch_request($User_Fname, $User_Lname);
    ?>
    <script>
        const count = JSON.parse(JSON.stringify(<?php echo json_encode($count, JSON_PRETTY_PRINT); ?>, null, 4));
        const editData = JSON.parse(JSON.stringify(<?php echo json_encode($editData, JSON_PRETTY_PRINT); ?>, null, 4));
        const request = JSON.parse(JSON.stringify(<?php echo json_encode($request, JSON_PRETTY_PRINT); ?>, null, 4));
        if (count > 0) {
            document.getElementsByClassName('count')[0].innerHTML = `${count}`
            document.getElementsByClassName('count')[0].style.display = 'flex'
            document.getElementsByClassName('count')[0].style.fontSize = '10px'
            document.getElementsByClassName('icon-bell')[0].style.fontSize = '20px'
            for (let i = 0; i < editData.length; i++) {
                add_companyName(editData[i]['companyName'], i)
            }
        }

        for (let i = 0; i < request.length; i++) {
            add_request(request[i]['companyName'],i)
        }
    </script>
</body>

</html>