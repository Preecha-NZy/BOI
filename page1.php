<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/page1.css">
    <link rel="stylesheet" href="font/simplelineicons.github.io-master/simplelineicons.github.io-master/css/simple-line-icons.css">
    <script type="text/javascript" src="JAVASCRIPT/page1.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>BOI</title>
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
                session_start();
                $User_ID = $_SESSION['User_ID'];
                $User_Fname = $_SESSION['User_Fname'];
                $User_Lname = $_SESSION['User_Lname'];
                ?>
                // window.onload = function() {
                // }
                let ID = '<?php echo $User_ID; ?>'
                let Fname = '<?php echo $User_Fname; ?>'
                let Lname = '<?php echo $User_Lname; ?>'
                if (Fname != '' && Lname != '') {
                    document.getElementById('user-name').innerHTML = `${Fname} ${Lname}`
                } else {
                    window.location.href = "index.php";
                }

                if (performance.navigation.type === 1) {
                    $.ajax({
                        type: "POST",
                        url: "sesstion_Unset.php",
                        data: {},
                        cache: false,
                        success: function(data) {},
                        error: function(xhr, status, error) {}
                    });
                    window.location.href = "index.php";
                    // window.location.href = "index.php";
                }
            </script>
        </div>
    </header>

    <section class="title-content">
        <img src="https://boi-investment.boi.go.th/icon/icon-user-01-01.png" alt="">
        <div class="title">
            <h4>
                เลือกประเภทธุรกิจ
            </h4>
            <h5>
                ยื่นคำขอรับการส่งเสริม
            </h5>
        </div>
    </section>

    <div class="content">
        <label class="content-title">
            มาตรการที่ขอรับการส่งเสริมการลงทุน
        </label>
        <div class="col-content">
            <div class="row-sub-content">
                <input type="radio" name="first-choice" id="first-choice" value="yes">
                <label for="first-choice" class="rad-text">มาตรการทั่วไป</label>
            </div>
            <div class="row-sub-content">
                <input type="radio" name="first-choice" id="second-choice" value="yes">
                <label for="second-choice" class="rad-text">มาตรการ SMEs</label>
            </div>
            <div class="row-sub-content">
                <input type="radio" name="first-choice" id="third-choice" value="yes">
                <label for="third-choice" class="rad-text">กิจการประเภท 7.1.1.2</label>
            </div>
        </div>
    </div>
    <div class="btn" onclick="checkButton()">
        <a>ต่อไป</a>
    </div>
</body>

</html>