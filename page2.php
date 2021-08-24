<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/page2.css">
    <link rel="stylesheet" href="font/simplelineicons.github.io-master/simplelineicons.github.io-master/css/simple-line-icons.css">
    <script src="/JAVASCRIPT/page2.js" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>page2</title>
</head>

<body>
    <header>
        <div class="hd-left">
            <img src="https://boi-investment.boi.go.th/img_boi/logo.png" alt="">
        </div>
        <div class="hd-right">
            <i class="icon-bell"></i>
            <img src="https://boi-investment.boi.go.th/assets/images/avatar-2.png" alt="" class="user-img">
            <p id="user-name"></p>
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
        </div>
    </header>

    <section class="title-content">
        <img src="https://boi-investment.boi.go.th/icon/icon-user-01-01.png" alt="">
        <div class="title">
            <h4>
                เงื่อนไขในการใช้งานระบบของกิจการประเภท 7.1.1.2
            </h4>
            <h5>
                ยื่นคำขอรับการส่งเสริม
            </h5>
        </div>
    </section>

    <section class="main-content">
        <div class="content">
            <label class="content-title">
                1.ประเภทกิจการ 7.1.1.2 ไฟฟ้าจากพลังงานหมุนเวียน
            </label>
            <div class="row-sub-content">
                <input type="radio" name="first-choice" id="first-choice-1" value="yes">
                <label for="first-choice-1" class="rad-text">YES</label>
            </div>
            <div class="row-sub-content">
                <input type="radio" name="first-choice" id="first-choice-2" value="yes">
                <label for="first-choice-2" class="rad-text">NO</label>
            </div>
        </div>
        <div class="content">
            <label class="content-title">
                2.ชนิดผลิตภัณฑ์ ไฟฟ้าจากพลังงานแสงอาทิตย์ที่ติดตั้งบนหลังคา
            </label>
            <div class="row-sub-content">
                <input type="radio" name="second-choice" id="second-choice-1" value="yes">
                <label for="second-choice-1" class="rad-text">YES</label>
            </div>
            <div class="row-sub-content">
                <input type="radio" name="second-choice" id="second-choice-2" value="no">
                <label for="second-choice-2" class="rad-text">NO</label>
            </div>
        </div>
    </section>
    <div class="btn" onclick="checkButton()">
        <a>ต่อไป</a>
    </div>
</body>

</html>