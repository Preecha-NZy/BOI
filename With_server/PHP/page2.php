<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/page2.css">
    <link rel="stylesheet"href="../font/simplelineicons.github.io-master/simplelineicons.github.io-master/css/simple-line-icons.css">
    <script src="../JAVASCRIPTPHP/page2php.js" defer></script>
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
            <p id="user-name">ปรีชา ชินรนาท</p>
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
        <form action="">
            <div class="content">
                <label>
                    1.ประเภทกิจการ 7.1.1.2 ไฟฟ้าจากพลังงานหมุนเวียน
                </label>
                <div>
                    <label class="rad-label">
                        <input type="radio" class="rad-input" name="ch1" value="yes">
                        <div class="rad-design"></div>
                        <div class="rad-text">YES</div>
                    </label>
                    <label class="rad-label">
                        <input type="radio" class="rad-input" name="ch1" value="no">
                        <div class="rad-design"></div>
                        <div class="rad-text">NO</div>
                    </label>
                </div>
            </div>
            <div class="content">
                <label>
                    2.ชนิดผลิตภัณฑ์ ไฟฟ้าจากพลังงานแสงอาทิตย์ที่ติดตั้งบนหลังคา
                </label>
                <div>
                    <label class="rad-label">
                        <input type="radio" class="rad-input" name="ch2" value="yes">
                        <div class="rad-design"></div>
                        <div class="rad-text">YES</div>
                    </label>
                    <label class="rad-label">
                        <input type="radio" class="rad-input" name="ch2" value="no">
                        <div class="rad-design"></div>
                        <div class="rad-text">NO</div>
                    </label>
                </div>
            </div>
            <div class="content">
                <label>
                    3.มูลค่าเงินลงทุน (ไม่รวมค่าที่ดินและทุนหมุนเวียน) ไม่เกิน 40 ล้านบาท
                </label>
                <div>
                    <label class="rad-label">
                        <input type="radio" class="rad-input" name="ch3" value="yes">
                        <div class="rad-design"></div>
                        <div class="rad-text">YES</div>
                    </label>
                    <label class="rad-label">
                        <input type="radio" class="rad-input" name="ch3" value="no">
                        <div class="rad-design"></div>
                        <div class="rad-text">NO</div>
                    </label>
                </div>
            </div>
        </form>
    </section>
    <div class="btn" onclick="checkButton()">
        <a>ต่อไป</a>
    </div>
</body>

</html>