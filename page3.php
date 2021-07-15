<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/page3.css">
    <script src="JAVASCRIPT/page3.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="font/simplelineicons.github.io-master/simplelineicons.github.io-master/css/simple-line-icons.css">
    <script type="text/javascript" src="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dependencies/JQL.min.js"></script>
    <script type="text/javascript" src="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dependencies/typeahead.bundle.js"></script>
    <link rel="stylesheet" href="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dist/jquery.Thailand.min.css">
    <script type="text/javascript" src="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dist/jquery.Thailand.min.js"></script>
    <title>Document</title>
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
        </div>
    </header>

    <section class="title-content">
        <img src="https://boi-investment.boi.go.th/icon/icon-user-01-01.png" alt="">
        <div class="title">
            <h4>
                ขอรับการส่งเสริมการลงทุนสำหรับกิจการประเภท 7.1.1.2
            </h4>
            <h5>
                ยื่นคำขอรับการส่งเสริม
            </h5>
        </div>
    </section>
    
    <script>
        <?php
        session_start();
        $User_ID = $_SESSION['User_ID'];
        $User_Fname = $_SESSION['User_Fname'];
        $User_Lname = $_SESSION['User_Lname'];
        ?>
        let ID = '<?php echo $User_ID; ?>'
        let Fname = '<?php echo $User_Fname; ?>'
        let Lname = '<?php echo $User_Lname; ?>'
        if (Fname != '' && Lname != '') {
            document.getElementById('user-name').innerHTML = `${Fname} ${Lname}`
        } else {
            window.location.href = "index.php";
        }
        // if (performance.navigation.type === 1) {
        //     $.ajax({
        //         type: "POST",
        //         url: "sesstion_Unset.php",
        //         data: {},
        //         cache: false,
        //         success: function(data) {},
        //         error: function(xhr, status, error) {}
        //     });
        //     window.location.href = "index.php";
        // }
    </script>

    <section class="content">
        <ul class="tabs">
            <li data-tab-target="#tab1" class="active tab tab1" id="tab1-title">
                1.ข้อมูลโครงการและรายละเอียดสัญญาการซื้อขาย
            </li>
            <li data-tab-target="#tab2" class="tab tab2" id="tab2-title">
                2.รายละเอียดระบบผลิตไฟฟ้าจากแสงอาทิตย์
            </li>
        </ul>

        <div class="tab-content">
            <div id="tab1" data-tab-content class="active">
                <form action="">
                    <div class="sup-content">
                        <label for="" class="sup-title">ผลิตภัณฑ์ของโครงการที่จะขอรับการส่งเสริม</label>
                        <div class="col-sub-content">
                            <div class="row-sub-content">
                                <select class="input-page1" name="ผลิตภัณฑ์ของโครงการที่จะขอรับการส่งเสริม" id="Product_Name" required>
                                    <option value="" disabled selected> เลือก </option>
                                    <option value="ไฟฟ้าจากพลังงานแสงอาทิตย์">ไฟฟ้าจากพลังงานแสงอาทิตย์</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="sup-content">
                        <label for="" class="sup-title">บริษัทคู่สัญญาซื้อขายไฟฟ้า</label>
                        <div class="col-sub-content">
                            <div class="row-sub-content">
                                <input class="input-page1" type="text" name="บริษัทคู่สัญญาซื้อขายไฟฟ้า" id="Contract_Name" placeholder="กรอกชื่อบริษัท" required>
                            </div>
                            <div class="row-sub-content">
                                <input class="input-page1" type="number" name="เลขหน้าในสัญญาของบริษัทคู่สัญญาซื้อขายไฟฟ้า" id="Contract_Name_Page" onkeyup="if(this.value<0){this.value= this.value * -1}" placeholder="กรอกเลขหน้าในสัญญา" required>
                            </div>
                            <div class="row-sub-content">
                                <input class="input-page1" type="file" id="Document_number" name="แนบข้อมูลบริษัทคู่สัญญาซื้อขายไฟฟ้า" required>
                            </div>
                        </div>
                    </div>

                    <div class="sup-content">
                        <label for="" class="sup-title">กำลังผลิตติดตั้งตามสัญญาซื้อขายไฟ</label>
                        <div class="col-sub-content">
                            <div class="row-sub-content">
                                <div class="col-5">
                                    <input class="input-page1" type="number" name="กำลังการผลิต" id="Capacity" onkeyup="if(this.value<0){this.value= this.value * -1}" placeholder="กรอกกำลังการผลิต (เมกะวัตต์/MWp)" required>
                                </div>
                            </div>
                            <div class="row-sub-content">
                                <div class="col-5">
                                    <input class="input-page1" type="number" name="เลขหน้าในสัญญาของกำลังการผลิต" id="Capacity_Page" onkeyup="if(this.value<0){this.value= this.value * -1}" placeholder="กรอกเลขหน้าในสัญญา" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="sup-content">
                        <label for="" class="sup-title">สถานที่ติดตั้งตามสัญญา</label>
                        <div class="col-sub-content">
                            <div class="row-sub-content">
                                <input class="input-page1" type="text" name="เลขที่" id="Location_No" placeholder="เลขที่" required>
                            </div>
                            <div class="row-sub-content">
                                <input class="input-page1" type="text" name="ถนน" id="Location_Street" placeholder="ถนน" required>
                            </div>
                            <div class="row-sub-content">
                                <input class="input-page1" type="text" name="ตำบล" id="Location_Subdistrict" placeholder="ตำบล" required>
                            </div>
                            <div class="row-sub-content">
                                <input class="input-page1" type="text" name="อำเภอ" id="Location_district" placeholder="อำเภอ" required>
                            </div>
                            <div class="row-sub-content">
                                <input class="input-page1" type="text" name="จังหวัด" id="Location_Province" placeholder="จังหวัด" required>
                            </div>
                            <div class="row-sub-content">
                                <input class="input-page1" type="number" name="เลขหน้าในสัญญาของสถานที่ติดตั้ง" id="Location_Page" onkeyup="if(this.value<0){this.value= this.value * -1}" placeholder="กรอกเลขหน้าในสัญญา" required>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="btn1" target="#tab2">
                    <a id="go-tab2" style="color: white;"> ต่อไป</a>
                </div>
            </div>
            <div id="tab2" data-tab-content>
                <h4>ลักษณะการติดตั้ง</h4>
                <br>
                <div class="sup-content">
                    <label for="" class="sup-title">สถานที่ติดตั้ง</label>
                    <div class="col-sub-content">
                        <div class="row-sub-content">
                            <input type="checkbox" name="installation-site" value="Rooftop" id="is-roof" onclick="is_checked()" required>
                            <label for="is-roof" class="install-text" style="margin-left: 8px;">บนหลังคา</label>
                        </div>
                        <div class="row-sub-content">
                            <input type="checkbox" name="installation-site" value="Farm" id="is-ground" onclick="is_checked()">
                            <label for="is-ground" class="install-text" style="margin-left: 8px;"> พื้นดิน</label>
                        </div>
                        <div class="row-sub-content">
                            <input type="checkbox" name="installation-site" value="Floating" id="is-pool" onclick="is_checked()">
                            <label for="is-pool" class="install-text" style="margin-left: 8px;">ทุ่นลอยน้ำ</label>
                        </div>
                    </div>
                </div>
                <h4>รายละเอียดอุปกรณ์หลัก</h4>
                <br>

                <!--รายการอุปกรณ์หลักบนหลังคา-->
                <div class="is-roof-content tab2-content">
                    <h4 style="background-color: #3c97f1; margin-left: 100px;">รายการอุปกรณ์หลักบนหลังคา</h4>
                    <br>
                    <div class="sup-content">
                        <label for="" class="sup-title">เอกสาร layout การติดตั้งบนหลังคา </label>
                        <div class="col-sub-content">
                            <label for="" class="sub-title">แนบเอกสาร</label>
                            <div class="row-sub-content">
                                <input type="file" name="solar-upload" id="Rooftop_doc" required>
                            </div>
                        </div>
                    </div>
                    <div class="sup-content ">
                        <label for="" class="sup-title">เซลล์แสงอาทิตย์</label>
                        <div class="col-sub-content">
                            <label for="" class="sub-title">ลักษณะอาคารที่ติดตั้ง </label>
                            <div class="row-sub-content">
                                <input type="radio" name="Location_Roof_Type" class="rad-input" id="Location_Roof_Type1" value="โรงงาน" onclick="locationRoof_Checked()" required>
                                <label for="Location_Roof_Type1" class="rad-text">โรงงาน</label>
                            </div>
                            <div class="row-sub-content">
                                <input type="radio" name="Location_Roof_Type" class="rad-input" id="Location_Roof_Type2" value="คลังสินค้า" onclick="locationRoof_Checked()" required>
                                <label for="Location_Roof_Type2" class="rad-text">คลังสินค้า</label>
                            </div>
                            <div class="row-sub-content">
                                <label for="solar-rad4" style="display: flex; ">
                                    <input type="radio" name="Location_Roof_Type" class="rad-input" id="Location_Roof_Type3" value="อื่น ๆ" onclick="locationRoof_Checked()" required>
                                    <label for="Location_Roof_Type3" class="rad-text">อื่น ๆ</label>
                                    <div class="etc" style="display: flex;">
                                        <label for="Location_Roof_Type3" style="margin: 0 5px 0 0;" class="rad-text">(โปรดระบุ)</label>
                                        <input type="text" name="" id="Location_Roof_Type_etc" class="rad-text " style="width: 160px; height: 25px;" required disabled>
                                    </div>
                                </label>
                            </div>
                            <label for="" class="sub-title">ชนิด</label>
                            <div class="row-sub-content">
                                <input type="radio" name="Pvmodult_Roof_Type" class="rad-input" id="Pvmodult_Roof_Type1" value="Monocrystalline" onclick="rad4Checked()" required>
                                <label for="Pvmodult_Roof_Type1" class="rad-text">Monocrystalline</label>
                            </div>
                            <div class="row-sub-content">
                                <input type="radio" name="Pvmodult_Roof_Type" class="rad-input" id="Pvmodult_Roof_Type2" value="Polycrystalline" onclick="rad4Checked()" required>
                                <label for="Pvmodult_Roof_Type2" class="rad-text">Polycrystalline</label>
                            </div>
                            <div class="row-sub-content">
                                <input type="radio" name="Pvmodult_Roof_Type" class="rad-input" id="Pvmodult_Roof_Type3" value="Multicrystalline" onclick="rad4Checked()" required>
                                <label for="Pvmodult_Roof_Type3" class="rad-text">Multicrystalline</label>
                            </div>
                            <div class="row-sub-content">
                                <label for="solar-rad4" style="display: flex; ">
                                    <input type="radio" name="Pvmodult_Roof_Type" class="rad-input" id="Pvmodult_Roof_Type4" value="อื่น ๆ" onclick="rad4Checked()">
                                    <label for="Pvmodult_Roof_Type4" class="rad-text">อื่น ๆ</label>
                                    <div class="etc" style="display: flex;">
                                        <label for="Pvmodult_Roof_Type4" style="margin: 0 5px 0 0;" class="rad-text">(โปรดระบุ)</label>
                                        <input type="text" name="rad-etc" id="Pvmodult_Roof_Type_etc" class="rad-text " style="width: 160px; height: 25px;" required disabled>
                                    </div>
                                </label>
                            </div>
                            <label for="" class="sub-title">รุ่น</label>
                            <div class="row-sub-content">
                                <input type="text" id="Pvmodult_Roof_Model" required>
                            </div>
                            <label for="" class="sub-title">ผู้ผลิต</label>
                            <div class="row-sub-content">
                                <input type="text" name="solar-producer" id="Pvmodult_Roof_Brand" required>
                            </div>
                            <label for="" class="sub-title">ประเทศ</label>
                            <div class="row-sub-content">
                                <div class="select-box">
                                    <div class="options-container">
                                    </div>
                                    <input type="number" name="aaaaaaa" id="Pvmodult_Roof_Country_input" class="hide-input" required onfocus="this.blur()">
                                    <div class="selected" id="Pvmodult_Roof_Country">กรอกชื่อประเทศ</div>
                                    <div class="search-box">
                                        <input type="text" placeholder="ค้นหาชื่อประเทศ" required>
                                    </div>
                                </div>
                            </div>
                            <label for="" class="sub-title">กำลังผลิต</label>
                            <div class="row-sub-content">
                                <div class="ip-sf">
                                    <input type="number" onkeyup="if(this.value<0){this.value= this.value * -1}" name="solar-size" id="Pvmodult_Roof_Capacity" onchange="RoofSolar_cal()" required>
                                    <label for="Pvmodult_Roof_Capacity" class="surfix">วัตต์ต่อแผง</label>
                                </div>
                                <label for="" class="solar-capa" id="roof_capa">กำลังการผลิตไม่เกิน 500
                                    วัตต์ต่อแผง</label>
                            </div>
                            <label for="" class="sub-title">จำนวน</label>
                            <div class="row-sub-content">
                                <div class="ip-sf">
                                    <input type="number" onkeyup="if(this.value<0){this.value= this.value * -1}" name="solar-total" id="Pvmodult_Roof_Amount" onchange="RoofSolar_cal()" required>
                                    <label for="Pvmodult_Roof_Amount" class="surfix">แผง</label>
                                </div>
                            </div>
                            <label for="" class="sub-title">ราคาเซลล์แสงอาทิตย์ต่อแผง</label>
                            <div class="row-sub-content">
                                <div class="ip-sf">
                                    <input type="number" name="" id="Pvmodult_Roof_Cost" onchange="RoofSolar_cost()" required>
                                    <label for="" class="surfix">บาท</label>
                                </div>
                            </div>
                            <label for="" class="sub-title">กำลังผลิตรวม</label>
                            <div class="row-sub-content">
                                <div class="ip-sf">
                                    <input type="number" onkeyup="if(this.value<0){this.value= this.value * -1}" name="solar-productivity" id="Pvmodult_Roof_Sum" class=" total-capa" disabled required>
                                    <label for="Pvmodult_Roof_Sum" class="surfix">เมกะวัตต์(MWp)</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sup-content">
                        <label for="" class="sup-title">เครื่องแปลงไฟ (Inverter)</label>
                        <div class="col-sub-content">
                            <label for="" class="sub-title">รุ่น</label>
                            <div class="row-sub-content">
                                <input type="text" id="Inverter_Roof_Model" required>
                            </div>
                            <label for="" class="sub-title">ผู้ผลิต</label>
                            <div class="row-sub-content">
                                <input type="text" id="Inverter_Roof_Brand" required>
                            </div>
                            <label for="" class="sub-title">ประเทศ</label>
                            <div class="row-sub-content">
                                <div class="select-box">
                                    <div class="options-container">
                                    </div>
                                    <input type="number" name="a2" id="Inverter_Roof_Country_input" class="hide-input" required onfocus="this.blur()">
                                    <div class="selected" id="Inverter_Roof_Country">กรอกชื่อประเทศ</div>
                                    <div class="search-box">
                                        <input type="text" placeholder="ค้นหาชื่อประเทศ" />
                                    </div>
                                </div>
                            </div>
                            <label for="" class="sub-title">กำลังผลิต</label>
                            <div class="row-sub-content">
                                <div class="ip-sf">
                                    <input type="number" onkeyup="if(this.value<0){this.value= this.value * -1}" name="" id="Inverter_Roof_Capacity" onchange="RoofInverter_cal()" required>
                                    <label for="" class="surfix">กิโลวัตต์ต่อเครื่อง</label>
                                </div>
                            </div>
                            <label for="" class="sub-title">จำนวน</label>
                            <div class="row-sub-content">
                                <div class="ip-sf">
                                    <input type="number" onkeyup="if(this.value<0){this.value= this.value * -1}" id="Inverter_Roof_Amount" onchange="RoofInverter_cal()" required>
                                    <label for="" class="surfix">เครื่อง</label>
                                </div>
                            </div>
                            <label for="" class="sub-title">ราคาเครื่องแปลงไฟต่อเครื่อง</label>
                            <div class="row-sub-content">
                                <div class="ip-sf">
                                    <input type="number" name="" id="Inverter_Roof_Cost" onchange="RoofInverter_cost()" required>
                                    <label for="" class="surfix">บาท</label>
                                </div>
                            </div>
                            <label for="" class="sub-title">กำลังผลิตรวม</label>
                            <div class="row-sub-content">
                                <div class="ip-sf">
                                    <input type="number" onkeyup="if(this.value<0){this.value= this.value * -1}" name="" id="Inverter_Roof_Sum" class="total-ivt-capa" disabled>
                                    <label for="" class="surfix">กิโลวัตต์(kWp)</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="is-ground-content tab2-content">
                    <h4 style="background-color: #3c97f1; margin-left: 100px;">รายการอุปกรณ์หลักบนพื้นดิน</h4>
                    <br>
                    <div class="sup-content">
                        <label for="" class="sup-title">เอกสาร layout การติดตั้งบนหลังคา </label>
                        <div class="col-sub-content">
                            <label for="" class="sub-title">แนบเอกสาร</label>
                            <div class="row-sub-content">
                                <input type="file" name="solar-upload" id="Farm_doc" required>
                            </div>
                        </div>
                    </div>
                    <div class="sup-content ">
                        <label for="" class="sup-title">เซลล์แสงอาทิตย์</label>
                        <div class="col-sub-content">
                            <label for="" class="sub-title">ลักษณะอาคารที่ติดตั้ง</label>
                            <div class="row-sub-content">
                                <input type="radio" name="Location_Farm_Type" class="rad-input" id="Location_Farm_Type1" value="ถือครองกรรมสิทธิ์" required>
                                <label for="Location_Farm_Type1" class="rad-text">ถือครองกรรมสิทธิ์</label>
                            </div>
                            <div class="row-sub-content">
                                <input type="radio" name="Location_Farm_Type" class="rad-input" id="Location_Farm_Type2" value="เช่าที่ดิน" required>
                                <label for="Location_Farm_Type2" class="rad-text">เช่าที่ดิน</label>
                            </div>
                            <label for="" class="sub-title">ชนิด</label>
                            <div class="row-sub-content">
                                <input type="radio" name="Pvmodult_Farm_Type" class="rad-input" id="Pvmodult_Farm_Type1" value="Monocrystalline" onclick="rad4Checked()" required>
                                <label for="Pvmodult_Farm_Type1" class="rad-text">Monocrystalline</label>
                            </div>
                            <div class="row-sub-content">
                                <input type="radio" name="Pvmodult_Farm_Type" class="rad-input" id="Pvmodult_Farm_Type2" value="Polycrystalline" onclick="rad4Checked()" required>
                                <label for="Pvmodult_Farm_Type2" class="rad-text">Polycrystalline</label>
                            </div>
                            <div class="row-sub-content">
                                <input type="radio" name="Pvmodult_Farm_Type" class="rad-input" id="Pvmodult_Farm_Type3" value="Multicrystalline" onclick="rad4Checked()" required>
                                <label for="Pvmodult_Farm_Type3" class="rad-text">Multicrystalline</label>
                            </div>
                            <div class="row-sub-content">
                                <label for="solar-rad4" style="display: flex; ">
                                    <input type="radio" name="Pvmodult_Farm_Type" class="rad-input" id="Pvmodult_Farm_Type4" value="อื่น ๆ" onclick="rad4Checked()" required>
                                    <label for="Pvmodult_Farm_Type4" class="rad-text">อื่น ๆ</label>
                                    <div class="etc" style="display: flex;">
                                        <label for="Pvmodult_Farm_Type4" style="margin: 0 5px 0 0;" class="rad-text">(โปรดระบุ)</label>
                                        <input type="text" name="rad-etc" id="Pvmodult_Farm_Type_etc" class="rad-text " style="width: 160px; height: 25px;" disabled required>
                                    </div>
                                </label>
                            </div>
                            <label for="" class="sub-title">รุ่น</label>
                            <div class="row-sub-content">
                                <input type="text" name="rad-gen" id="Pvmodult_Farm_Model" required>
                            </div>
                            <label for="" class="sub-title">ผู้ผลิต</label>
                            <div class="row-sub-content">
                                <input type="text" name="solar-producer" id="Pvmodult_Farm_Brand" required>
                            </div>
                            <label for="" class="sub-title">ประเทศ</label>
                            <div class="row-sub-content">
                                <div class="select-box">
                                    <div class="options-container">
                                    </div>
                                    <input type="number" name="a3" id="Pvmodult_Farm_Country_input" class="hide-input" required onfocus="this.blur()">
                                    <div class="selected" id="Pvmodult_Farm_Country">กรอกชื่อประเทศ</div>
                                    <div class="search-box">
                                        <input type="text" placeholder="ค้นหาชื่อประเทศ" />
                                    </div>
                                </div>
                            </div>
                            <label for="" class="sub-title">กำลังผลิต</label>
                            <div class="row-sub-content">
                                <div class="ip-sf">
                                    <input type="number" onkeyup="if(this.value<0){this.value= this.value * -1}" name="solar-size" id="Pvmodult_Farm_Capacity" onchange="GroundSolar_cal()" required>
                                    <label for="" class="surfix">วัตต์ต่อแผง</label>
                                </div>
                                <label for="" class="solar-capa" id="farm_capa">*กำลังการผลิตไม่เกิน 500
                                    วัตต์ต่อแผง</label>
                            </div>
                            <label for="" class="sub-title">จำนวน</label>
                            <div class="row-sub-content">
                                <div class="ip-sf">
                                    <input type="number" onkeyup="if(this.value<0){this.value= this.value * -1}" name="solar-total" id="Pvmodult_Farm_Amount" onchange="GroundSolar_cal()" required>
                                    <label for="" class="surfix">แผง</label>
                                </div>
                            </div>
                            <label for="" class="sub-title">ราคาเซลล์แสงอาทิตย์ต่อแผง</label>
                            <div class="row-sub-content">
                                <div class="ip-sf">
                                    <input type="number" name="" id="Pvmodult_Farm_Cost" class="solar-cost" onchange="GroundSolar_cost()" required>
                                    <label for="" class="surfix">บาท</label>
                                </div>
                            </div>
                            <label for="" class="sub-title">กำลังผลิตรวม</label>
                            <div class="row-sub-content">
                                <div class="ip-sf">
                                    <input type="number" onkeyup="if(this.value<0){this.value= this.value * -1}" name="solar-productivity" id="Pvmodult_Farm_Sum" class="total-capa" disabled=true required>
                                    <label for="" class="surfix"> เมกะวัตต์(MWp) </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sup-content">
                        <label for="" class="sup-title">เครื่องแปลงไฟ (Inverter)</label>
                        <div class="col-sub-content">
                            <label for="" class="sub-title">รุ่น</label>
                            <div class="row-sub-content">
                                <input type="text" id="Inverter_Farm_Model" required>
                            </div>
                            <label for="" class="sub-title">ผู้ผลิต</label>
                            <div class="row-sub-content">
                                <input type="text" id="Inverter_Farm_Brand" required>
                            </div>
                            <label for="" class="sub-title">ประเทศ</label>
                            <div class="row-sub-content">
                                <div class="select-box">
                                    <div class="options-container">
                                    </div>
                                    <input type="number" name="a4" id="Inverter_Farm_Country_input" class="hide-input" required onfocus="this.blur()">
                                    <div class="selected" id="Inverter_Farm_Country">กรอกชื่อประเทศ</div>
                                    <div class="search-box">
                                        <input type="text" placeholder="ค้นหาชื่อประเทศ" />
                                    </div>
                                </div>
                            </div>
                            <label for="" class="sub-title">กำลังผลิต</label>
                            <div class="row-sub-content">
                                <div class="ip-sf">
                                    <input type="number" onkeyup="if(this.value<0){this.value= this.value * -1}" name="" id="Inverter_Farm_Capacity" onchange="GroundInverter_cal()" required>
                                    <label for="" class="surfix">กิโลวัตต์ต่อเครื่อง
                                    </label>
                                </div>
                            </div>
                            <label for="" class="sub-title">จำนวน</label>
                            <div class="row-sub-content">
                                <div class="ip-sf">
                                    <input type="number" onkeyup="if(this.value<0){this.value= this.value * -1}" id="Inverter_Farm_Amount" onchange="GroundInverter_cal()" required>
                                    <label for="" class="surfix">เครื่อง</label>
                                </div>
                            </div>
                            <label for="" class="sub-title">ราคาเครื่องแปลงไฟต่อเครื่อง</label>
                            <div class="row-sub-content">
                                <div class="ip-sf">
                                    <input type="number" name="" id="Inverter_Farm_Cost" onchange="GroundInverter_cost()" required>
                                    <label for="" class="surfix">บาท</label>
                                </div>
                            </div>
                            <label for="" class="sub-title">กำลังผลิตรวม</label>
                            <div class="row-sub-content">
                                <div class="ip-sf">
                                    <input type="number" onkeyup="if(this.value<0){this.value= this.value * -1}" name="" id="Inverter_Farm_Sum" class="total-ivt-capa" disabled required>
                                    <label for="" class="surfix">กิโลวัตต์(kWp)</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="is-pool-content tab2-content">
                    <h4 style="background-color: #3c97f1; margin-left: 100px;">รายการอุปกรณ์หลักบนทุ่นลอยน้ำ</h4>
                    <br>
                    <div class="sup-content">
                        <label for="" class="sup-title">เอกสาร layout การติดตั้งบนหลังคา </label>
                        <div class="col-sub-content">
                            <label for="" class="sub-title">แนบเอกสาร</label>
                            <div class="row-sub-content">
                                <input type="file" name="solar-upload" id="Floating_DOC" required>
                            </div>
                        </div>
                    </div>
                    <div class="floating-content">
                        <div class="sup-content ">
                            <label for="" class="sup-title">เซลล์แสงอาทิตย์</label>
                            <div class="col-sub-content">
                                <label for="" class="sub-title">จำนวนอ่างเก็บน้ำที่ใช้ติดตั้งทุ่นลอยน้ำ</label>
                                <div class="row-sub-content">
                                    <div class="ip-sf">
                                        <input type="number" name="" id="Floating_Amount" onchange="ChangeNumFloating_input()" onkeyup="if(this.value<0){this.value= this.value * -1}" required>
                                        <label for="" class="surfix">บ่อ</label>
                                    </div>
                                </div>
                                <label for="" class="sub-title">ลักษณะของอ่างเก็บน้ำ </label>
                                <div class="row-sub-content">
                                    <input type="radio" name="pool_detail" class="rad-input" id="pool_detail1" value="บ่อปูนซีเมนต์" onclick="PoolDetail_Checked()" required>
                                    <label for="pool_detail1" class="rad-text">บ่อปูนซีเมนต์</label>
                                </div>
                                <div class="row-sub-content">
                                    <input type="radio" name="pool_detail" class="rad-input" id="pool_detail2" value="บ่อดิน" onclick="PoolDetail_Checked()" required>
                                    <label for="pool_detail2" class="rad-text">บ่อดิน</label>
                                </div>
                                <div class="row-sub-content">
                                    <label for="solar-rad4" style="display: flex; ">
                                        <input type="radio" name="pool_detail" class="rad-input" id="pool_detail3" value="อื่น ๆ" onclick="PoolDetail_Checked()" required>
                                        <label for="pool_detail3" class="rad-text">อื่น ๆ</label>
                                        <div class="etc" style="display: flex;">
                                            <label for="pool_detail3" style="margin: 0 5px 0 0;" class="rad-text">(โปรดระบุ)</label>
                                            <input type="text" name="rad-etc" id="pool_detail_etc" class="rad-text " style="width: 160px; height: 25px;" disabled required>
                                        </div>
                                    </label>
                                </div>
                                <label for="" class="sub-title">ลักษณะของน้ำ </label>
                                <div class="row-sub-content">
                                    <input type="radio" name="water_detail" class="rad-input" id="water_detail1" value="น้ำดิบ" onclick="WaterDetail_Checked()" required>
                                    <label for="water_detail1" class="rad-text">น้ำดิบ</label>
                                </div>
                                <div class="row-sub-content">
                                    <input type="radio" name="water_detail" class="rad-input" id="water_detail2" value="น้ำทิ้งจากการบำบัด" onclick="WaterDetail_Checked()" required>
                                    <label for="water_detail2" class="rad-text">น้ำทิ้งจากการบำบัด</label>
                                </div>
                                <div class="row-sub-content">
                                    <input type="radio" name="water_detail" class="rad-input" id="water_detail3" value="น้ำเสีย" onclick="WaterDetail_Checked()" required>
                                    <label for="water_detail3" class="rad-text">น้ำเสีย</label>
                                </div>
                                <div class="row-sub-content">
                                    <label for="solar-rad4" style="display: flex; ">
                                        <input type="radio" name="water_detail" class="rad-input" id="water_detail4" value="อื่น ๆ" onclick="WaterDetail_Checked()" required>
                                        <label for="water_detail4" class="rad-text">อื่น ๆ</label>
                                        <div class="etc" style="display: flex;">
                                            <label for="water_detail4" style="margin: 0 5px 0 0;" class="rad-text">(โปรดระบุ)</label>
                                            <input type="text" name="rad-etc" id="water_detail_etc" class="rad-text " style="width: 160px; height: 25px;" disabled required>
                                        </div>
                                    </label>
                                </div>
                                <label for="" class="sub-title">พื้นที่อ่างเก็บน้ำ</label>
                                <div class="row-sub-content">
                                    <div class="ip-sf">
                                        <input type="number" name="" id="pool_area" onchange="FloatingArea_cal()" onkeyup="if(this.value<0){this.value= this.value * -1}" required>
                                        <label for="" class="surfix">ตารางเมตร</label>
                                    </div>
                                </div>
                                <label for="" class="sub-title">พื้นที่ติดตั้งทุ่นลอยน้ำ</label>
                                <div class="row-sub-content">
                                    <div class="ip-sf">
                                        <input type="number" name="" id="floating_area" onchange="FloatingArea_cal()" onkeyup="if(this.value<0){this.value= this.value * -1}" required>
                                        <label for="" class="surfix">ตารางเมตร</label>
                                    </div>
                                </div>
                                <label for="" class="sub-title">พื้นที่ของทุ่นลอยน้ำในพื้นที่อ่างเก็บน้ำคิดเป็นร้อยละ</label>
                                <div class="row-sub-content">
                                    <div class="ip-sf">
                                        <input type="number" name="" id="pool_percen" disabled required>
                                        <label for="" class="surfix">เปอร์เซ็น</label>
                                    </div>
                                </div>
                                <label for="" class="sub-title">ชนิด</label>
                                <div class="row-sub-content">
                                    <input type="radio" name="Pvmodult_Floating_Type" class="rad-input" value="Monocrystalline" id="Pvmodult_Floating_Type1" onclick="rad4Checked()" required>
                                    <label for="Pvmodult_Floating_Type1" class="rad-text">Monocrystalline</label>
                                </div>
                                <div class="row-sub-content">
                                    <input type="radio" name="Pvmodult_Floating_Type" class="rad-input" value="Polycrystalline" id="Pvmodult_Floating_Type2" onclick="rad4Checked()" required>
                                    <label for="Pvmodult_Floating_Type2" class="rad-text">Polycrystalline</label>
                                </div>
                                <div class="row-sub-content">
                                    <input type="radio" name="Pvmodult_Floating_Type" class="rad-input" value="Multicrystalline" id="Pvmodult_Floating_Type3" onclick="rad4Checked()" required>
                                    <label for="Pvmodult_Floating_Type3" class="rad-text">Multicrystalline</label>
                                </div>
                                <div class="row-sub-content">
                                    <label for="solar-rad4" style="display: flex; ">
                                        <input type="radio" name="Pvmodult_Floating_Type" class="rad-input" value="อื่น ๆ" id="Pvmodult_Floating_Type4" onclick="rad4Checked()" required>
                                        <label for="Pvmodult_Floating_Type4" class="rad-text">อื่น ๆ</label>
                                        <div class="etc" style="display: flex;">
                                            <label for="Pvmodult_Floating_Type4" style="margin: 0 5px 0 0;" class="rad-text">(โปรดระบุ)</label>
                                            <input type="text" name="rad-etc" id="Pvmodult_Floating_Type_etc" class="rad-text " style="width: 160px; height: 25px;" disabled required>
                                        </div>
                                    </label>
                                </div>
                                <label for="" class="sub-title">รุ่น</label>
                                <div class="row-sub-content">
                                    <input type="text" name="rad-gen" id="Pvmodult_Floating_Model" required>
                                </div>
                                <label for="" class="sub-title">ผู้ผลิต</label>
                                <div class="row-sub-content">
                                    <input type="text" name="solar-producer" id="Pvmodult_Floating_Brand" required>
                                </div>
                                <label for="" class="sub-title">ประเทศ</label>
                                <div class="row-sub-content">
                                    <div class="select-box">
                                        <div class="options-container">
                                        </div>
                                        <input type="number" name="a5" id="Pvmodult_Floating_Country_input" class="hide-input" required onfocus="this.blur()" required>
                                        <div class="selected" id="Pvmodult_Floating_Country">กรอกชื่อประเทศ</div>
                                        <div class="search-box">
                                            <input type="text" placeholder="ค้นหาชื่อประเทศ" />
                                        </div>
                                    </div>
                                </div>
                                <label for="" class="sub-title">กำลังผลิต</label>
                                <div class="row-sub-content">
                                    <div class="ip-sf">
                                        <input type="number" onkeyup="if(this.value<0){this.value= this.value * -1}" onchange="FloatingSolar_cal(this.value)" name="solar-size" id="Pvmodult_Floating_Capacity" required>
                                        <label for="" class="surfix">วัตต์ต่อ/แผ่น</label>
                                    </div>
                                    <label for="" class="solar-capa" id="floating_capa">*กำลังการผลิตไม่เกิน 500
                                        วัตต์ต่อแผง</label>
                                </div>
                                <label for="" class="sub-title">ราคาเซลล์แสงอาทิตย์ต่อแผง</label>
                                <div class="row-sub-content">
                                    <div class="ip-sf">
                                        <input type="number" name="" id="Pvmodult_Floating_Cost" class="solar-cost" onchange="FloatingSolar_cost()" required>
                                        <label for="" class="surfix">บาท</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sup-content">
                        <label for="" class="sup-title">เครื่องแปลงไฟ (Inverter)</label>
                        <div class="col-sub-content">
                            <label for="" class="sub-title">รุ่น</label>
                            <div class="row-sub-content">
                                <input type="text" name="ivt-name" id="Inverter_Floating_Model" required>
                            </div>
                            <label for="" class="sub-title">ผู้ผลิต</label>
                            <div class="row-sub-content">
                                <input type="text" id="Inverter_Floating_Brand" required>
                            </div>
                            <label for="" class="sub-title">ประเทศ</label>
                            <div class="row-sub-content">
                                <div class="select-box">
                                    <div class="options-container">
                                    </div>
                                    <input type="number" name="a6" id="Inverter_Floating_Country_input" class="hide-input" required onfocus="this.blur()">
                                    <div class="selected" id="Inverter_Floating_Country">กรอกชื่อประเทศ</div>
                                    <div class="search-box">
                                        <input type="text" placeholder="ค้นหาชื่อประเทศ" />
                                    </div>
                                </div>
                            </div>
                            <label for="" class="sub-title">กำลังผลิต</label>
                            <div class="row-sub-content">
                                <div class="ip-sf">
                                    <input type="number" onkeyup="if(this.value<0){this.value= this.value * -1}" name="" id="Inverter_Floating_Capacity" onchange="FloatingInverter_cal()" required>
                                    <label for="" class=" surfix">กิโลวัตต์ต่อเครื่อง</label>
                                </div>
                            </div>
                            <label for="" class="sub-title">จำนวน</label>
                            <div class="row-sub-content">
                                <div class="ip-sf">
                                    <input type="number" onkeyup="if(this.value<0){this.value= this.value * -1}" name="ivt-num" id="Inverter_Floating_Amount" onchange="FloatingInverter_cal()" required>
                                    <label for="" class="surfix">เครื่อง</label>
                                </div>
                            </div>
                            <label for="" class="sub-title">ราคาเครื่องแปลงไฟต่อเครื่อง</label>
                            <div class="row-sub-content">
                                <div class="ip-sf">
                                    <input type="number" name="" id="Inverter_Floating_Cost" onchange="FloatingInverter_cost()" required>
                                    <label for="" class="surfix">บาท</label>
                                </div>
                            </div>
                            <label for="" class="sub-title">กำลังผลิตรวม</label>
                            <div class="row-sub-content">
                                <div class="ip-sf">
                                    <input type="number" onkeyup="if(this.value<0){this.value= this.value * -1}" name="" id="Inverter_Floating_Sum" class="total-ivt-capa" disabled required>
                                    <label for="" class="surfix">กิโลวัตต์(kWp)</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sup-content">
                    <label for="" class="sup-title"></label>
                    <div class="col-sub-cotent">
                        <label for="" class="sub-titel">รวมกำลังการผลิตเซลล์แสงอาทิตย์ของโครงการ</label>
                        <div class="row-sub-content">
                            <div class="ip-sf">
                                <input type="number" name="" id="Project_Total" disabled=true>
                                <label for="" class="surfix">เมกะวัตต์(MWp)</label>
                            </div>
                        </div>
                        <label for="" class="sub-titel">รวมกำลังการผลิตเครื่องแปลงไฟของโครงการ</label>
                        <div class="row-sub-content">
                            <div class="ip-sf">
                                <input type="number" name="" id="Project_ivt_Total" disabled=true>
                                <label for="" class="surfix">กิโลวัตต์(kWp)</label>
                            </div>
                        </div>
                    </div>
                </div>
                <h4>รายละเอียดอุปกรณ์อื่นๆ</h4>
                <br>
                <div class="sup-content">
                    <label for="" class="sup-title">
                        <input class="form-check-input" type="checkbox" name="have-ess" id="have-ess" value="yes" onclick="haveESS()" style="position: relative; bottom: 2px; margin-right: 4px;">
                        ระบบกักเก็บพลังงาน
                    </label>
                    <div class="ESS col-sub-content" style="display: none;">
                        <label for="" class="sub-title">แนบเอกสาร</label>
                        <div class="row-sub-content">
                            <input type="file" name="" id="ESS_doc" required>
                        </div>
                        <label for="" class="sub-title">รุ่น</label>
                        <div class="row-sub-content">
                            <input type="text" name="" id="ESS_Model" required>
                        </div>
                        <label for="" class="sub-title">ผู้ผลิต</label>
                        <div class="row-sub-content">
                            <input type="text" name="" id="ESS_Brand" required>
                        </div>
                        <label for="" class="sub-title">ประเทศ</label>
                        <div class="row-sub-content">
                            <div class="select-box">
                                <div class="options-container">
                                </div>
                                <input type="number" name="a7" id="ESS_Country_input" class="hide-input" required onfocus="this.blur()">
                                <div class="selected" id="ESS_Country">กรอกชื่อประเทศ</div>
                                <div class="search-box">
                                    <input type="text" placeholder="ค้นหาชื่อประเทศ" />
                                </div>
                            </div>
                        </div>
                        <label for="" class="sub-title">กำลังผลิต</label>
                        <div class="row-sub-content">
                            <div class="ip-sf">
                                <input type="number" onkeyup="if(this.value<0){this.value= this.value * -1}" name="" id="ESS_Capacity" onchange="Esscapa_cal()" required>
                                <label for="" class=" surfix">กิโลวัตต์ต่อเครื่อง</label>
                            </div>
                        </div>
                        <label for="" class="sub-title">จำนวน</label>
                        <div class="row-sub-content">
                            <div class="ip-sf">
                                <input type="number" onkeyup="if(this.value<0){this.value= this.value * -1}" name="" id="ESS_Amount" onchange="Esscapa_cal()" required>
                                <label for="" class="surfix">เครื่อง</label>
                            </div>
                        </div>
                        <label for="" class="sub-title">รวมกำลังผลิต</label>
                        <div class="row-sub-content">
                            <div class="ip-sf">
                                <input type="number" onkeyup="if(this.value<0){this.value= this.value * -1}" name="" id="ESS_Sum" disabled required>
                                <label for="" class="surfix">กิโลวัตต์(kWp)</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sup-content">
                    <label for="" class="sup-title">อื่นๆ(โปรดระบุ)</label>
                    <div class="col-sub-content etc-tools">
                        <div class="row-sub-content">
                            <input type="text" name="" id="etc-tools-input" class="etc-input" placeholder="กรอกรายชื่ออุปกรณ์เพิ่มเติม">
                            <div class="etc-div" onclick="addETC()">
                                <a id="add-etc"> เพิ่ม</a>
                            </div>
                        </div>
                    </div>
                </div>
                <h4>รายละเอียดการออกแบบและติดตั้ง</h4>
                <br>
                <div class="sup-content">
                    <label for="" class="sup-title">ผู้ดำเนินการออกแบบ จำหน่าย และติดตั้ง</label>
                    <div class="col-sub-content">
                        <label for="" class="sub-title">บริษัท</label>
                        <div class="row-sub-content">
                            <input type="text" name="EPC_Name" id="EPC_Name" required>
                        </div>
                    </div>
                </div>
                <div class="sup-content 2.2.2">
                    <label for="" class="sup-title">รายละเอียดการลงทุน</label>
                    <div class="col-sub-content cost">
                        <label for="" class="sub-title">ค่าก่อสร้าง</label>
                        <div class="row-sub-content">
                            <div class="ip-sf">
                                <input type="number" min="0" name="Construction_Cost" id="Construction_Cost" onchange=" Cost_cal()" onkeyup="if(this.value<0){this.value= this.value * -1}" required>
                                <label for="" class="surfix">ล้านบาท</label>
                            </div>
                        </div>
                        <label for="" class="sub-title">ค่าเครื่องจักรและอุปกรณ์อื่น ๆ</label>
                        <div class="row-sub-content">
                        </div>
                        <div class="row-sub-content">
                            <label for="" class="sub-title" style="padding-left: 10px; font-size: 12.5px; min-width: 114px;">แผงเซลล์อาทิตย์</label>
                            <div class="ip-sf">
                                <input type="number" min="0" name="Machine_Pvmodule" id="Machine_Pvmodule" class="etc-cost" onfocus="this.blur()" style="width: auto; margin-left: 10px; pointer-events: none;">
                                <label for="" class="surfix">ล้านบาท</label>
                            </div>
                        </div>
                        <div class="row-sub-content">
                            <label for="" class="sub-title" style="padding-left: 10px; font-size: 12.5px; min-width: 114px;">
                                เครื่องแปลงไฟ</label>
                            <div class="ip-sf">
                                <input type="number" min="0" name="Machine_Inverter" id="Machine_Inverter" class="etc-cost" onfocus="this.blur()" style="width: auto; margin-left: 10px; pointer-events: none;">
                                <label for="" class="surfix">ล้านบาท</label>
                            </div>
                        </div>
                        <div class="row-sub-content">
                            <label for="" class="sub-title" style="padding-left: 10px; font-size: 12.5px; min-width: 114px;">
                                ระบบกักเก็บพลังงาน</label>
                            <div class="ip-sf">
                                <input type="number" min="0" name="Machine_ESS" id="Machine_ESS" class="etc-cost" onchange=" Cost_cal()" onkeyup="if(this.value<0){this.value= this.value * -1}" style="width: auto; margin-left: 10px;" required>
                                <label for="" class="surfix">ล้านบาท</label>
                            </div>
                        </div>
                        <div class="row-sub-content">
                            <label for="" class="sub-title" style="padding-left: 10px; font-size: 12.5px; min-width: 114px;">อื่นๆ</label>
                            <div class="ip-sf">
                                <input type="number" min="0" name="Machine_Equipment" id="Machine_Equipment" class="etc-cost" onchange=" Cost_cal()" onkeyup="if(this.value<0){this.value= this.value * -1}" style="width: auto; margin-left: 10px;" required>
                                <label for="" class="surfix">ล้านบาท</label>
                            </div>
                        </div>
                        <label for="" class="sub-title">รวมค่าเครื่องจักรและอุปกรณ์อื่น ๆ</label>
                        <div class="row-sub-content">
                            <div class="ip-sf">
                                <input type="number" name="Machine_Info" id="Machine_Info" disabled=true>
                                <label for="" class="surfix">ล้านบาท</label>
                            </div>
                        </div>
                        <label for="" class="sub-title">ค่าติดตั้ง</label>
                        <div class="row-sub-content">
                            <div class="ip-sf">
                                <input type="number" min="0" name="Machine_Setup" id="Machine_Setup" onchange=" Cost_cal()" onkeyup="if(this.value<0){this.value= this.value * -1}" required>
                                <label for="" class="surfix">ล้านบาท</label>
                            </div>
                        </div>
                        <label for="" class="sub-title">ค่าทดลองเครื่อง</label>
                        <div class="row-sub-content">
                            <div class="ip-sf">
                                <input type="number" min="0" name="Machine_Trial" id="Machine_Trial" onchange=" Cost_cal()" onkeyup="if(this.value<0){this.value= this.value * -1}" required>
                                <label for="" class="surfix">ล้านบาท</label>
                            </div>
                        </div>
                        <label for="" class="sub-title">ค่าใช้จ่ายก่อนเปิดดำเนินการ</label>
                        <div class="row-sub-content">
                            <div class="ip-sf">
                                <input type="number" min="0" name="Expenses" id="Expenses" onchange=" Cost_cal()" onkeyup="if(this.value<0){this.value= this.value * -1}" required>
                                <label for="" class="surfix">ล้านบาท</label>
                            </div>
                        </div>
                        <label for="" class="sub-title">มูลค่าสินทรัพย์อื่น ๆ </label>
                        <div class="row-sub-content">
                            <div class="ip-sf">
                                <input type="number" min="0" name="Asset" id="Asset" onchange=" Cost_cal()" onkeyup="if(this.value<0){this.value= this.value * -1}" required>
                                <label for="" class="surfix">ล้านบาท</label>
                            </div>
                        </div>
                        <label for="" class="sub-title">ค่าที่ดิน </label>
                        <div class="row-sub-content">
                            <div class="ip-sf">
                                <input type="number" min="0" name="Land_Value" id="Land_Value" onchange=" Cost_cal()" onkeyup="if(this.value<0){this.value= this.value * -1}" required>
                                <label for="" class="surfix">ล้านบาท</label>
                            </div>
                        </div>
                        <label for="" class="sub-title">ค่าวิชาการ</label>
                        <div class="row-sub-content">
                            <div class="ip-sf">
                                <input type="number" min="0" name="Academic" id="Academic" onchange=" Cost_cal()" required>
                                <label for="" class="surfix">ล้านบาท</label>
                            </div>
                        </div>
                        <label for="" class="sub-title">เงินทุนหมุนเวียน </label>
                        <div class="row-sub-content">
                            <div class="ip-sf">
                                <input type="number" min="0" name="Circulation" id="Circulation" onchange=" Cost_cal()" required>
                                <label for="" class="surfix">ล้านบาท</label>
                            </div>
                        </div>
                        <label for="" class="sub-title">รวมเงินลงทุน</label>
                        <div class="row-sub-content">
                            <div class="ip-sf">
                                <input type="number" min="0" name="Result" id="Result" disabled=true>
                                <label for="" class="surfix">ล้านบาท</label>
                            </div>
                        </div>
                    </div>
                </div>
                <h4>แผนการดำเนินงาน</h4>
                <br>
                <div class="sup-content">
                    <label for="" class="sup-title">แผนการติดตั้งระบบ</label>
                    <div class="col-sub-content">
                        <label for="" class="sub-title">การสำรวจสถานที่ติดตั้ง/ออกแบบ</label>
                        <div class="row-sub-content">
                            <input type="month" name="mydate" id="Plan_Survey" required>
                        </div>
                        <label for="" class="sub-title">การจัดซื้อ/จัดหา</label>
                        <div class="row-sub-content">
                            <input type="month" name="mydate" id="Plan_Procurement" required>
                        </div>
                        <label for="" class="sub-title">การติดตั้ง</label>
                        <div class="row-sub-content">
                            <input type="month" name="mydate" id="Plan_installation" required>
                        </div>
                        <label for="" class="sub-title">กำหนดการจ่ายไฟฟ้า</label>
                        <div class="row-sub-content">
                            <input type="month" name="mydate" id="Plan_COD" required>
                        </div>
                    </div>
                </div>
                <h4>แผนการจัดทำรายงานเกี่ยวกับการศึกษามาตรการป้องกัน<br>และแก้ไขผลกระทบต่อคุณภาพสิ่งแวดล้อมและความปลอดภัย
                    (ESA)</h4>
                <br>
                <div class="sup-content ESA" style="pointer-events: none;">
                    <label for="" class="sup-title">ESA</label>
                    <div class="col-sub-content">
                        <div class="sub-title">ชื่อบริษัทผู้จัดทำรายงาน ESA</div>
                        <div class="row-sub-content">
                            <input type="text" name="" id="ESA_Name" required>
                        </div>
                        <label for="" class="sub-title">การศึกษาและจัดจ้างบริษัทที่ปรึกษา</label>
                        <div class="row-sub-content">
                            <input type="month" name="mydate" id="ESA_Consult" required>
                        </div>
                        <label for="" class="sub-title">การศึกษาและรวบรวมข้อมูลสภาพแวดล้อมปัจจุบัน</label>
                        <div class="row-sub-content">
                            <input type="month" name="mydate" id="ESA_Study" required>
                        </div>
                        <label for="" class="sub-title">การประเมินผลกระทบต่อสิ่งแวดล้อมและการกำหนดมาตรการป้องกัน<br>และแก้ไขผลกระทบต่อคุณภาพสิ่งแวดล้อมและความปลอดภัย
                            (ESA)</label>
                        <div class="row-sub-content">
                            <input type="month" name="mydate" id="ESA_Complete" required>
                        </div>
                    </div>
                </div>
                <div class="btn1" target="#tab3">
                    <a id="go-tab3" style="color: white;" onclick="submit()"> ต่อไป</a>
                </div>
            </div>
        </div>
    </section>


    <script>
        $.Thailand({
            $district: $('#Location_Subdistrict'), // input ของตำบล
            $amphoe: $('#Location_district'), // input ของอำเภอ
            $province: $('#Location_Province'), // input ของจังหวัด
        });

        let select_box = document.querySelectorAll('.select-box')
        select_box.forEach(box => {
            let select_country = box.querySelectorAll('.options-container')
            fetch("Country/country-list-th.json")
                .then(response => response.json())
                .then(countrys => {
                    countrys.forEach(country => {
                        select_country.forEach(select => {
                            let option = document.createElement('div')
                            let newOption = document.createElement('input')
                            let label = document.createElement('label')
                            option.setAttribute('class', 'option')
                            newOption.setAttribute('type', 'radio')
                            newOption.setAttribute('class', 'radio')
                            newOption.setAttribute('id', `${country.name}`)
                            newOption.setAttribute('name', 'category')
                            option.style.display = 'block'
                            label.setAttribute('for', `${country.name}`)
                            label.innerHTML = `${country.name}`
                            option.appendChild(newOption)
                            option.appendChild(label)
                            select.appendChild(option)
                        })
                    })
                    const selected = box.querySelector(".selected");
                    const optionsContainer = box.querySelector(".options-container");
                    const searchBox = box.querySelector(".search-box input");

                    const optionsList = optionsContainer.querySelectorAll(".option");
                    selected.addEventListener("click", () => {
                        optionsContainer.classList.toggle("active");

                        searchBox.value = "";
                        filterList("");

                        if (optionsContainer.classList.contains("active")) {
                            searchBox.focus();
                        }
                    });

                    optionsList.forEach(o => {
                        o.addEventListener("click", () => {
                            selected.innerHTML = o.querySelector("label").innerHTML;
                            optionsContainer.classList.remove("active");
                        });
                    });

                    searchBox.addEventListener("keyup", function(e) {
                        filterList(e.target.value);
                    });

                    const filterList = searchTerm => {
                        optionsList.forEach(option => {
                            let label = option.innerText;
                            if (label.indexOf(searchTerm) != -1) {
                                option.style.display = "block";
                            } else {
                                option.style.display = "none";
                            }
                        });
                    };
                })
        })
        let Plan_COD = document.getElementById('Plan_COD')
        var today = new Date();
        var date = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate();
        if (parseInt(today.getMonth()) < 10){
            Plan_COD.min = `${today.getFullYear()}-0${today.getMonth() + 1}`
        } else {
            Plan_COD.min = `${today.getFullYear()}-${today.getMonth() + 1}`
        }
        const tabs = document.querySelectorAll('[data-tab-target]')
        const tabContents = document.querySelectorAll('[data-tab-content]')
        const gos = document.querySelectorAll('[target]')
        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                const target = document.querySelector(tab.dataset.tabTarget)
                tabContents.forEach(tabContent => {
                    tabContent.classList.remove('active')
                })
                tabs.forEach(tab => {
                    tab.classList.remove('active')
                })
                tab.classList.add('active')
                target.classList.add('active')
            })
        })

        gos.forEach(go => {
            go.addEventListener('click', () => {
                let x = go.getElementsByTagName('a')[0].id;
                if (x === 'go-tab2') {
                    const target = document.querySelector(tabs[0].dataset.tabTarget)
                    let inputs = target.querySelectorAll('.input-page1')
                    let count = 0
                    for (let i = 0; i < inputs.length; i++) {
                        if (inputs[i].id != "") {
                            if (inputs[i].value == "") {
                                // window.scroll(0, findPos(inputs[i]));
                                inputs[i].reportValidity()
                                count++
                                break;
                            }
                        }
                    }
                    if (count === 0) {
                        let x = "tab2-title"
                        tabs.forEach(tab => {
                            const a = document.querySelector(tab.dataset.tabTarget)
                            if (tab.id === x) {
                                const target = document.querySelector(tab.dataset.tabTarget)
                                tab.classList.add('active')
                                target.classList.add('active')
                            } else {
                                a.classList.remove('active')
                                tab.classList.remove('active')
                            }
                        })
                    }
                }
                // else if (x == 'go-tab3') {
                //   var x = "tab3-title"
                //   tabs.forEach(tab => {
                //     const a = document.querySelector(tab.dataset.tabTarget)
                //     if (tab.id === x) {
                //       const target = document.querySelector(tab.dataset.tabTarget)
                //       tab.classList.add('active')
                //       target.classList.add('active')
                //     }
                //     else {
                //       a.classList.remove('active')
                //       tab.classList.remove('active')
                //     }
                //   })
                // }
            })
        })
    </script>
</body>

</html>