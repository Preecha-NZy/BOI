<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/index.css">
    <link rel="stylesheet" href="font/simplelineicons.github.io-master/simplelineicons.github.io-master/css/simple-line-icons.css">
    <link rel="icon" href="https://boi-investment.boi.go.th/assets/images/favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Prompt&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="JAVASCRIPT/index.js" defer></script>
    <style>
        body {
            font-family: Prompt;
        }
    </style>
    <title>ระบบสนับสนุนส่งเสริมการลงทุน (e-Investment Promotion)</title>

</head>

<body>
    <header>
        <div class="logo">
            <div class="header-left">
                <img src="https://boi-investment.boi.go.th/public/images/Logo_boi.png" alt="">
            </div>
        </div>
    </header>

    <div class="container">
        <div class="main-content">
            <div class="row">
                <div class="form-col">
                    <div class="box-explan">
                        <h5>คำชี้แจง</h5>
                        <div class="sub-content">
                            ตั้งแต่วันที่
                            <font color="#FF0000">2 มกราคม 2563 เป็นต้นไป</font>
                            สำนักงานคณะกรรมการส่งเสริมการลงทุนจะ
                            <font color="#FF0000"><u>ยกเลิก</u></font>
                            การรับคำขอการส่งเสริมใน
                            <font color="#FF0000">รูปแบบเอกสารที่สำนักงาน</font>
                            โดยผู้ประการการสามารถยื่นคำขอรับการส่งเสริม ผ่านระบบสนับสนุนส่งเสริมการลงทุน (e-Investment
                            Promotion) ได้ โดยผ่านทางเว็บไซต์
                            <a href="https://boi-investment.boi.go.th/public">
                                <font color="#FF0000">https://boi-investment.boi.go.th/public</font>
                            </a>
                            <br>
                            <u>ยกเว้น</u>
                            คำขอต่อไปนี้ยังสามารถยื่นในรูปแบบเอกสารได้ :
                            <br>
                            • การขอรับส่งเสริมเพื่อการปรับปรุงประสิทธิภาพการผลิต
                            <br>
                            • การขอรับส่งเสริมเพื่อรับโอนกิจการ
                            <br>
                            • การขอรับส่งเสริมการลงทุนมาตรการเศรษฐกิจฐานราก
                        </div>
                    </div>
                    <div class="box-advice" style="color:#FF0000;">
                        <center>ข้อแนะนำการใช้งาน
                            <br>*ควรใช้งานกับ Google Chrome เท่านั้น*
                        </center>
                    </div>
                </div>
                <div class="form-col">
                    <form action="">
                        <div class="box-login">
                            <h5 style="color:white">Login เข้าสู่ระบบ</h5>
                            <div class="form-space">
                                <input type="text" class="login_input" placeholder="กรอกชื่อผู้ใช้งาน" required>
                            </div>
                            <div class="form-space">
                                <input type="password" class="login_input" placeholder="กรอกรหัสผ่าน" required>
                            </div>
                            <div class="form-space btn btn-login" id="login_btn" onclick="login()">
                                เข้าสู่ระบบ
                            </div>
                            <div class="form-space">
                                <button type="button" class="btn btn-fg-pw">ลืมรหัสเข้าใช้งาน</button>
                            </div>
                            <div class="form-space">
                                <hr style="color: #3883d1">
                            </div>
                            <div class="form-space">
                                <button type="button" class="btn btn-form">
                                    <a style="color: #FDFEFE" href="https://feedback.boi.go.th/index.php?app=e-investment2">แบบสำรวจความพึงพอใจ</a>
                                </button>
                            </div>
                            <div class="form-space">
                                <button type="button" class="btn btn-contact">
                                    <a style="color: #FDFEFE" href="https://boi-investment.boi.go.th/public/contact_new.pdf">ติดต่อเจ้าหน้าที่</a>
                                </button>
                            </div>
                            <div class="row-sub-box">
                                <div class="sub-box">
                                    <a href="https://boi-investment.boi.go.th/public/index.php#">
                                        <div class="border-white">
                                            <div class="center">
                                                <img src="https://boi-investment.boi.go.th/public/images/icon_01.png" title="ลงทะเบียนเข้าใช้งานระบบ">
                                            </div>
                                            <div class="center text-white">ลงทะเบียนเข้าใช้งานระบบ</div>
                                        </div>
                                    </a>
                                </div>
                                <div class="sub-box">
                                    <a href="https://boi-investment.boi.go.th/public/index.php#">
                                        <div class="border-white">
                                            <div class="center">
                                                <img src="	https://boi-investment.boi.go.th/public/images/icon_02.png" title="ลงทะเบียนแล้วไม่ได้รับอีเมล์">
                                            </div>
                                            <div class="center text-white">ลงทะเบียนแล้วไม่ได้รับอีเมล์</div>
                                        </div>
                                    </a>
                                </div>
                                <div class="sub-box">
                                    <a href="https://boi-investment.boi.go.th/report/E-Investment-Applicant%20for%20promotion.pdf">
                                        <div class="border-white">
                                            <div class="center">
                                                <img src="https://boi-investment.boi.go.th/public/images/icon_03.png" title="คู่มือการใช้งาน">
                                            </div>
                                            <div class="center text-white">คู่มือการใช้งาน</div>
                                        </div>
                                    </a>
                                </div>
                                <div class="sub-box">
                                    <a href="https://boi-investment.boi.go.th/public/Contact_Info.pdf">
                                        <div class="border-white">
                                            <div class="center text-white">แนวทางการกรอกคำขอกิจการด้านดิจิทัล
                                                คำถามที่พบบ่อย และตัวอย่างคำขอ</div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <section class="footer">
        The Board of Investment of Thailand © Copyright The Board of Investment of Thailand. All Rights Reserved.
    </section>
</body>

</html>