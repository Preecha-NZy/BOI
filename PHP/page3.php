<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/page3.css">
    <script src="../JAVASCRIPTPHP/page3php.js" defer></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript"
        src="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dependencies/JQL.min.js"></script>
    <script type="text/javascript"
        src="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dependencies/typeahead.bundle.js"></script>
    <link rel="stylesheet"
        href="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dist/jquery.Thailand.min.css">
    <script type="text/javascript"
        src="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dist/jquery.Thailand.min.js"></script>
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
            <p id="user-name">ปรีชา ชินรนาท</p>
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

    <section class="content">
        <ul class="tabs">
            <li data-tab-target="#tab1" class="active tab" id="tab1-title">
                1.ข้อมูลโครงการและรายละเอียดสัญญาการซื้อขาย
            </li>
            <li data-tab-target="#tab2" class="tab" id="tab2-title">
                2.รายละเอียดระบบผลิตไฟฟ้าจากแสงอาทิตย์
            </li>
            <li data-tab-target="#tab3" class="tab" id="tab3-title">
                3.ปริมาณการผลิตต่อปี
            </li>
        </ul>

        <div class="tab-content">
            <div id="tab1" data-tab-content class="active">
                <div class="sup-content">
                    <label for="" class="sup-title">ผลิตภัณฑ์ของโครงการที่จะขอรับการส่งเสริม</label>
                    <div class="col-sub-content">
                        <div class="row-sub-content">
                            <select class="form-select form-select-sm" name="power-source" id="Product_Name">
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
                            <input type="text" class="form-control form-control-sm" name="" id="Contract_Name"
                                placeholder="กรอกชื่อบริษัท">
                        </div>
                        <div class="row-sub-content">
                            <input type="number" class="form-control form-control-sm" name="" id="Contract_Name_Page"
                                onkeyup="if(this.value<0){this.value= this.value * -1}"
                                placeholder="กรอกเลขหน้าในสัญญา">
                        </div>
                        <div class="row-sub-content">
                            <input class="form-control form-control-sm" type="file" id="Document_number">
                        </div>
                    </div>
                </div>

                <div class="sup-content">
                    <label for="" class="sup-title">กำลังผลิตติดตั้งตามสัญญาซื้อขายไฟ</label>
                    <div class="col-sub-content">
                        <div class="row-sub-content">
                            <div class="col-5">
                                <input type="number" name="" id="capacity" class="form-control form-control-sm"
                                    onkeyup="if(this.value<0){this.value= this.value * -1}"
                                    placeholder="กรอกกำลังการผลิต (เมกะวัตต์/MWp)">
                            </div>
                        </div>
                        <div class="row-sub-content">
                            <div class="col-5">
                                <input type="number" name="" id="capacity_page" class="form-control form-control-sm"
                                    onkeyup="if(this.value<0){this.value= this.value * -1}"
                                    placeholder="กรอกเลขหน้าในสัญญา">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="sup-content">
                    <label for="" class="sup-title">สถานที่ติดตั้งตามสัญญา</label>
                    <div class="col-sub-content">
                        <div class="row-sub-content">
                            <input type="text" name="" id="Location_No" class="form-control form-control-sm"
                                placeholder="เลขที่" required>
                        </div>
                        <div class="row-sub-content">
                            <input type="text" name="" id="Location_Street" class="form-control form-control-sm"
                                placeholder="ถนน">
                        </div>
                        <div class="row-sub-content">
                            <input type="text" name="" id="Location_Subdistrict" class="form-control form-control-sm"
                                placeholder="ตำบล">
                        </div>
                        <div class="row-sub-content">
                            <input type="text" name="" id="Location_district" class="form-control form-control-sm"
                                placeholder="อำเภอ">
                        </div>
                        <div class="row-sub-content">
                            <input type="text" name="" id="Location_Province" class="form-control form-control-sm"
                                placeholder="จังหวัด">
                        </div>
                        <div class="row-sub-content">
                            <input type="number" name="" id="Location_Page" class="form-control form-control-sm"
                                onkeyup="if(this.value<0){this.value= this.value * -1}"
                                placeholder="กรอกเลขหน้าในสัญญา">
                        </div>
                    </div>
                </div>
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
                            <input type="checkbox" name="installation-site" class="is-check-box form-check-input"
                                id="is-roof" onclick="is_checked()">
                            <label for="is-roof" class="install-text" style="margin-left: 8px;">บนหลังคา</label>
                        </div>
                        <div class="row-sub-content">
                            <input type="checkbox" name="installation-site" class="is-check-box form-check-input"
                                id="is-ground" onclick="is_checked()">
                            <label for="is-ground" class="install-text" style="margin-left: 8px;"> พื้นดิน</label>
                        </div>
                        <div class="row-sub-content">
                            <input type="checkbox" name="installation-site" class="is-check-box form-check-input"
                                id="is-pool" onclick="is_checked()">
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
                                <input type="file" name="solar-upload" id="Rooftop_doc">
                            </div>
                        </div>
                    </div>
                    <div class="sup-content ">
                        <label for="" class="sup-title">เซลล์แสงอาทิตย์</label>
                        <div class="col-sub-content">
                            <label for="" class="sub-title">ลักษณะอาคารที่ติดตั้ง </label>
                            <div class="row-sub-content">
                                <input type="radio" name="Roof_Type" class="rad-input" id="Location_Roof_Type1"
                                    onclick="locationRoof_Checked()">
                                <label for="Location_Roof_Type1" class="rad-text">โรงงาน</label>
                            </div>
                            <div class="row-sub-content">
                                <input type="radio" name="Roof_Type" class="rad-input" id="Location_Roof_Type2"
                                    onclick="locationRoof_Checked()">
                                <label for="Location_Roof_Type2" class="rad-text">คลังสินค้า</label>
                            </div>
                            <div class="row-sub-content">
                                <label for="solar-rad4" style="display: flex; ">
                                    <input type="radio" name="Roof_Type" class="rad-input" id="Location_Roof_Type3"
                                        onclick="locationRoof_Checked()">
                                    <label for="Location_Roof_Type3" class="rad-text">อื่น ๆ</label>
                                    <div class="etc" style="display: flex;">
                                        <label for="Location_Roof_Type3" style="margin: 0 5px 0 0;"
                                            class="rad-text">(โปรดระบุ)</label>
                                        <input type="text" name="" id="Location_Roof_Type_etc" class="rad-text "
                                            style="width: 160px; height: 25px;" disabled>
                                    </div>
                                </label>
                            </div>
                            <label for="" class="sub-title">ชนิด</label>
                            <div class="row-sub-content">
                                <input type="radio" name="Pvmodult_Roof_Type" class="rad-input" id="Pvmodult_Roof_Type1"
                                    onclick="rad4Checked()">
                                <label for="Pvmodult_Roof_Type1" class="rad-text">Monocrystalline</label>
                            </div>
                            <div class="row-sub-content">
                                <input type="radio" name="Pvmodult_Roof_Type" class="rad-input" id="Pvmodult_Roof_Type2"
                                    onclick="rad4Checked()">
                                <label for="Pvmodult_Roof_Type2" class="rad-text">Polycrystalline</label>
                            </div>
                            <div class="row-sub-content">
                                <input type="radio" name="Pvmodult_Roof_Type" class="rad-input" id="Pvmodult_Roof_Type3"
                                    onclick="rad4Checked()">
                                <label for="Pvmodult_Roof_Type3" class="rad-text">Multicrystalline</label>
                            </div>
                            <div class="row-sub-content">
                                <label for="solar-rad4" style="display: flex; ">
                                    <input type="radio" name="Pvmodult_Roof_Type" class="rad-input"
                                        id="Pvmodult_Roof_Type4" onclick="rad4Checked()">
                                    <label for="Pvmodult_Roof_Type4" class="rad-text">อื่น ๆ</label>
                                    <div class="etc" style="display: flex;">
                                        <label for="Pvmodult_Roof_Type4" style="margin: 0 5px 0 0;"
                                            class="rad-text">(โปรดระบุ)</label>
                                        <input type="text" name="rad-etc" id="Pvmodult_Roof_Type_etc" class="rad-text "
                                            style="width: 160px; height: 25px;" disabled>
                                    </div>
                                </label>
                            </div>
                            <label for="" class="sub-title">รุ่น</label>
                            <div class="row-sub-content">
                                <input type="text" id="Pvmodult_Roof_Model">
                            </div>
                            <label for="" class="sub-title">ผู้ผลิต</label>
                            <div class="row-sub-content">
                                <input type="text" name="solar-producer" id="Pvmodult_Roof_Brand">
                            </div>
                            <label for="" class="sub-title">ประเทศ</label>
                            <div class="row-sub-content">
                                <div class="select-box">
                                    <div class="options-container">
                                    </div>
                                    <div class="selected" id="Pvmodult_Roof_Country">
                                        กรอกชื่อประเทศ
                                    </div>
                                    <div class="search-box">
                                        <input type="text" placeholder="ค้นหาชื่อประเทศ" />
                                    </div>
                                </div>
                            </div>
                            <label for="" class="sub-title">กำลังผลิต</label>
                            <div class="row-sub-content">
                                <div class="ip-sf">
                                    <input type="number" onkeyup="if(this.value<0){this.value= this.value * -1}"
                                        name="solar-size" id="Pvmodult_Roof_Capacity" onchange="RoofSolar_cal()">
                                    <label for="Pvmodult_Roof_Capacity" class="surfix">วัตต์ต่อแผง</label>
                                </div>
                            </div>
                            <label for="" class="sub-title">จำนวน</label>
                            <div class="row-sub-content">
                                <div class="ip-sf">
                                    <input type="number" onkeyup="if(this.value<0){this.value= this.value * -1}"
                                        name="solar-total" id="Pvmodult_Roof_Amount" onchange="RoofSolar_cal()">
                                    <label for="Pvmodult_Roof_Amount" class="surfix">แผง</label>
                                </div>
                            </div>
                            <label for="" class="sub-title">กำลังผลิตรวม</label>
                            <div class="row-sub-content">
                                <div class="ip-sf">
                                    <input type="number" onkeyup="if(this.value<0){this.value= this.value * -1}"
                                        name="solar-productivity" id="Pvmodult_Roof_Sum" class=" total-capa"
                                        disabled=true>
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
                                <input type="text" id="Inverter_Roof_Model">
                            </div>
                            <label for="" class="sub-title">ผู้ผลิต</label>
                            <div class="row-sub-content">
                                <input type="text" id="Inverter_Roof_Brand">
                            </div>
                            <label for="" class="sub-title">ประเทศ</label>
                            <div class="row-sub-content">
                                <div class="select-box">
                                    <div class="options-container">
                                    </div>
                                    <div class="selected" id="Inverter_Roof_Country">
                                        กรอกชื่อประเทศ
                                    </div>
                                    <div class="search-box">
                                        <input type="text" placeholder="ค้นหาชื่อประเทศ" />
                                    </div>
                                </div>
                            </div>
                            <label for="" class="sub-title">กำลังผลิต</label>
                            <div class="row-sub-content">
                                <div class="ip-sf">
                                    <input type="number" onkeyup="if(this.value<0){this.value= this.value * -1}" name=""
                                        id="Inverter_Roof_Capacity" onchange="RoofInverter_cal()">
                                    <label for="" class="surfix">กิโลวัตต์ต่อเครื่อง</label>
                                </div>
                            </div>
                            <label for="" class="sub-title">จำนวน</label>
                            <div class="row-sub-content">
                                <div class="ip-sf">
                                    <input type="number" onkeyup="if(this.value<0){this.value= this.value * -1}"
                                        id="Inverter_Roof_Amount" onchange="RoofInverter_cal()">
                                    <label for="" class="surfix">เครื่อง</label>
                                </div>
                            </div>
                            <label for="" class="sub-title">กำลังผลิตรวม</label>
                            <div class="row-sub-content">
                                <div class="ip-sf">
                                    <input type="number" onkeyup="if(this.value<0){this.value= this.value * -1}" name=""
                                        id="Inverter_Roof_Sum" disabled=true>
                                    <label for="" class="surfix">กิโลวัตต์</label>
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
                            <label for="Farm_doc" class="sub-title">แนบเอกสาร</label>
                            <div class="row-sub-content">
                                <input type="file" name="solar-upload" id="Farm_doc">
                            </div>
                        </div>
                    </div>
                    <div class="sup-content ">
                        <label for="" class="sup-title">เซลล์แสงอาทิตย์</label>
                        <div class="col-sub-content">
                            <label for="" class="sub-title">ลักษณะอาคารที่ติดตั้ง</label>
                            <div class="row-sub-content">
                                <select name="" id="Location_Farm_Type">
                                    <option value="" disabled selected> เลือก </option>
                                    <option value="">ถือครองกรรมสิทธิ์</option>
                                    <option value="">เช่าที่ดิน</option>
                                </select>
                            </div>
                            <label for="" class="sub-title">ชนิด</label>
                            <div class="row-sub-content">
                                <input type="radio" name="Pvmodult_Farm_Type" class="rad-input" id="Pvmodult_Farm_Type1"
                                    onclick="rad4Checked()">
                                <label for="Pvmodult_Farm_Type1" class="rad-text">Monocrystalline</label>
                            </div>
                            <div class="row-sub-content">
                                <input type="radio" name="Pvmodult_Farm_Type" class="rad-input" id="Pvmodult_Farm_Type2"
                                    onclick="rad4Checked()">
                                <label for="Pvmodult_Farm_Type2" class="rad-text">Polycrystalline</label>
                            </div>
                            <div class="row-sub-content">
                                <input type="radio" name="Pvmodult_Farm_Type" class="rad-input" id="Pvmodult_Farm_Type3"
                                    onclick="rad4Checked()">
                                <label for="Pvmodult_Farm_Type3" class="rad-text">Multicrystalline</label>
                            </div>
                            <div class="row-sub-content">
                                <label for="solar-rad4" style="display: flex; ">
                                    <input type="radio" name="Pvmodult_Farm_Type" class="rad-input"
                                        id="Pvmodult_Farm_Type4" onclick="rad4Checked()">
                                    <label for="Pvmodult_Farm_Type4" class="rad-text">อื่น ๆ</label>
                                    <div class="etc" style="display: flex;">
                                        <label for="Pvmodult_Farm_Type4" style="margin: 0 5px 0 0;"
                                            class="rad-text">(โปรดระบุ)</label>
                                        <input type="text" name="rad-etc" id="Pvmodult_Farm_Type_etc" class="rad-text "
                                            style="width: 160px; height: 25px;" disabled>
                                    </div>
                                </label>
                            </div>
                            <label for="" class="sub-title">รุ่น</label>
                            <div class="row-sub-content">
                                <input type="text" name="rad-gen" id="Pvmodult_Farm_Model">
                            </div>
                            <label for="" class="sub-title">ผู้ผลิต</label>
                            <div class="row-sub-content">
                                <input type="text" name="solar-producer" id="Pvmodult_Farm_Brand">
                            </div>
                            <label for="" class="sub-title">ประเทศ</label>
                            <div class="row-sub-content">
                                <div class="select-box">
                                    <div class="options-container">
                                    </div>
                                    <div class="selected" id="Pvmodult_Farm_Country">
                                        กรอกชื่อประเทศ
                                    </div>
                                    <div class="search-box">
                                        <input type="text" placeholder="ค้นหาชื่อประเทศ" />
                                    </div>
                                </div>
                            </div>
                            <label for="" class="sub-title">กำลังผลิต</label>
                            <div class="row-sub-content">
                                <div class="ip-sf">
                                    <input type="number" onkeyup="if(this.value<0){this.value= this.value * -1}"
                                        name="solar-size" id="Pvmodult_Farm_Capacity" onchange="GroundSolar_cal()">
                                    <label for="" class="surfix">วัตต์ต่อแผง</label>
                                </div>
                            </div>
                            <label for="" class="sub-title">จำนวน</label>
                            <div class="row-sub-content">
                                <div class="ip-sf">
                                    <input type="number" onkeyup="if(this.value<0){this.value= this.value * -1}"
                                        name="solar-total" id="Pvmodult_Farm_Amount" onchange="GroundSolar_cal()">
                                    <label for="" class="surfix">แผง</label>
                                </div>
                            </div>
                            <label for="" class="sub-title">กำลังผลิตรวม</label>
                            <div class="row-sub-content">
                                <div class="ip-sf">
                                    <input type="number" onkeyup="if(this.value<0){this.value= this.value * -1}"
                                        name="solar-productivity" id="Pvmodult_Farm_Sum" class="total-capa"
                                        disabled=true>
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
                                <input type="text" id="Inverter_Farm_Model">
                            </div>
                            <label for="" class="sub-title">ผู้ผลิต</label>
                            <div class="row-sub-content">
                                <input type="text" id="Inverter_Farm_Brand">
                            </div>
                            <label for="" class="sub-title">ประเทศ</label>
                            <div class="row-sub-content">
                                <div class="select-box">
                                    <div class="options-container">
                                    </div>
                                    <div class="selected" id="Inverter_Farm_Country">
                                        กรอกชื่อประเทศ
                                    </div>
                                    <div class="search-box">
                                        <input type="text" placeholder="ค้นหาชื่อประเทศ" />
                                    </div>
                                </div>
                            </div>
                            <label for="" class="sub-title">กำลังผลิต</label>
                            <div class="row-sub-content">
                                <div class="ip-sf">
                                    <input type="number" onkeyup="if(this.value<0){this.value= this.value * -1}" name=""
                                        id="Inverter_Farm_Capacity" onchange="GroundInverter_cal()">
                                    <label for="" class="surfix">กิโลวัตต์ต่อเครื่อง
                                    </label>
                                </div>
                            </div>
                            <label for="" class="sub-title">จำนวน</label>
                            <div class="row-sub-content">
                                <div class="ip-sf">
                                    <input type="number" onkeyup="if(this.value<0){this.value= this.value * -1}"
                                        id="Inverter_Farm_Amount" onchange="GroundInverter_cal()">
                                    <label for="" class="surfix">เครื่อง</label>
                                </div>
                            </div>
                            <label for="" class="sub-title">กำลังผลิตรวม</label>
                            <div class="row-sub-content">
                                <div class="ip-sf">
                                    <input type="number" onkeyup="if(this.value<0){this.value= this.value * -1}" name=""
                                        id="Inverter_Farm_Sum" disabled=true>
                                    <label for="" class="surfix">กิโลวัตต์</label>
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
                                <input type="file" name="solar-upload" id="pool_doc">
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
                                        <input type="number" name="" id="nb_pool" onchange="addpoolInput()"
                                            onkeyup="if(this.value<0){this.value= this.value * -1}">
                                        <label for="" class="surfix">บ่อ</label>
                                    </div>
                                </div>
                                <label for="" class="sub-title">ลักษณะของอ่างเก็บน้ำ </label>
                                <div class="row-sub-content">
                                    <input type="radio" name="pool_detail" class="rad-input" id="pool_detail1"
                                        onclick="PoolDetail_Checked()"
                                        onkeyup="if(this.value<0){this.value= this.value * -1}">
                                    <label for="pool_detail1" class="rad-text">บ่อปูนซีเมนต์</label>
                                </div>
                                <div class="row-sub-content">
                                    <input type="radio" name="pool_detail" class="rad-input" id="pool_detail2"
                                        onclick="PoolDetail_Checked()"
                                        onkeyup="if(this.value<0){this.value= this.value * -1}">
                                    <label for="pool_detail2" class="rad-text">บ่อดิน</label>
                                </div>
                                <div class="row-sub-content">
                                    <label for="solar-rad4" style="display: flex; ">
                                        <input type="radio" name="pool_detail" class="rad-input" id="pool_detail3"
                                            onclick="PoolDetail_Checked()">
                                        <label for="pool_detail3" class="rad-text">อื่น ๆ</label>
                                        <div class="etc" style="display: flex;">
                                            <label for="pool_detail3" style="margin: 0 5px 0 0;"
                                                class="rad-text">(โปรดระบุ)</label>
                                            <input type="text" name="rad-etc" id="pool_detail_etc" class="rad-text "
                                                style="width: 160px; height: 25px;" disabled>
                                        </div>
                                    </label>
                                </div>
                                <label for="" class="sub-title">ลักษณะของน้ำ </label>
                                <div class="row-sub-content">
                                    <input type="radio" name="water_detail" class="rad-input" id="water_detail1"
                                        onclick="WaterDetail_Checked()"
                                        onkeyup="if(this.value<0){this.value= this.value * -1}">
                                    <label for="water_detail1" class="rad-text">น้ำดิบ</label>
                                </div>
                                <div class="row-sub-content">
                                    <input type="radio" name="water_detail" class="rad-input" id="water_detail2"
                                        onclick="WaterDetail_Checked()"
                                        onkeyup="if(this.value<0){this.value= this.value * -1}">
                                    <label for="water_detail2" class="rad-text">น้ำทิ้งจากการบำบัด</label>
                                </div>
                                <div class="row-sub-content">
                                    <input type="radio" name="water_detail" class="rad-input" id="water_detail3"
                                        onclick="WaterDetail_Checked()">
                                    <label for="water_detail3" class="rad-text">น้ำเสีย</label>
                                </div>
                                <div class="row-sub-content">
                                    <label for="solar-rad4" style="display: flex; ">
                                        <input type="radio" name="water_detail" class="rad-input" id="water_detail4"
                                            onclick="WaterDetail_Checked()">
                                        <label for="water_detail4" class="rad-text">อื่น ๆ</label>
                                        <div class="etc" style="display: flex;">
                                            <label for="water_detail4" style="margin: 0 5px 0 0;"
                                                class="rad-text">(โปรดระบุ)</label>
                                            <input type="text" name="rad-etc" id="water_detail_etc" class="rad-text "
                                                style="width: 160px; height: 25px;" disabled>
                                        </div>
                                    </label>
                                </div>
                                <label for="" class="sub-title">พื้นที่อ่างเก็บน้ำ</label>
                                <div class="row-sub-content">
                                    <div class="ip-sf">
                                        <input type="number" name="" id="pool_area" onchange="FloatingArea_cal()"
                                            onkeyup="if(this.value<0){this.value= this.value * -1}">
                                        <label for="" class="surfix">ตารางเมตร</label>
                                    </div>
                                </div>
                                <label for="" class="sub-title">พื้นที่ติดตั้งทุ่นลอยน้ำ</label>
                                <div class="row-sub-content">
                                    <div class="ip-sf">
                                        <input type="number" name="" id="floating_area" onchange="FloatingArea_cal()"
                                            onkeyup="if(this.value<0){this.value= this.value * -1}">
                                        <label for="" class="surfix">ตารางเมตร</label>
                                    </div>
                                </div>
                                <label for=""
                                    class="sub-title">พื้นที่ของทุ่นลอยน้ำในพื้นที่อ่างเก็บน้ำคิดเป็นร้อยละ</label>
                                <div class="row-sub-content">
                                    <div class="ip-sf">
                                        <input type="number" name="" id="pool_percen" disabled=true>
                                        <label for="" class="surfix">เปอร์เซ็น</label>
                                    </div>
                                </div>
                                <label for="" class="sub-title">ชนิด</label>
                                <div class="row-sub-content">
                                    <input type="radio" name="Pvmodult_Floating_Type" class="rad-input" id="Pvmodult_Floating_Type1"
                                        onclick="rad4Checked()">
                                    <label for="Pvmodult_Floating_Type1" class="rad-text">Monocrystalline</label>
                                </div>
                                <div class="row-sub-content">
                                    <input type="radio" name="Pvmodult_Floating_Type" class="rad-input" id="Pvmodult_Floating_Type2"
                                        onclick="rad4Checked()">
                                    <label for="Pvmodult_Floating_Type2" class="rad-text">Polycrystalline</label>
                                </div>
                                <div class="row-sub-content">
                                    <input type="radio" name="Pvmodult_Floating_Type" class="rad-input" id="Pvmodult_Floating_Type3"
                                        onclick="rad4Checked()">
                                    <label for="Pvmodult_Floating_Type3" class="rad-text">Multicrystalline</label>
                                </div>
                                <div class="row-sub-content">
                                    <label for="solar-rad4" style="display: flex; ">
                                        <input type="radio" name="Pvmodult_Floating_Type" class="rad-input"
                                            id="Pvmodult_Floating_Type4" onclick="rad4Checked()">
                                        <label for="Pvmodult_Floating_Type4" class="rad-text">อื่น ๆ</label>
                                        <div class="etc" style="display: flex;">
                                            <label for="Pvmodult_Floating_Type4" style="margin: 0 5px 0 0;"
                                                class="rad-text">(โปรดระบุ)</label>
                                            <input type="text" name="rad-etc" id="Pvmodult_Floating_Type_etc" class="rad-text "
                                                style="width: 160px; height: 25px;" disabled>
                                        </div>
                                    </label>
                                </div>
                                <label for="" class="sub-title">รุ่น</label>
                                <div class="row-sub-content">
                                    <input type="text" name="rad-gen" id="Pvmodult_Floating_Model">
                                </div>
                                <label for="" class="sub-title">ผู้ผลิต</label>
                                <div class="row-sub-content">
                                    <input type="text" name="solar-producer" id="Pvmodult_Floating_Brand">
                                </div>
                                <label for="" class="sub-title">ประเทศ</label>
                                <div class="row-sub-content">
                                    <div class="select-box">
                                        <div class="options-container">
                                        </div>
                                        <div class="selected" id="Pvmodult_Floating_Country">
                                            กรอกชื่อประเทศ
                                        </div>
                                        <div class="search-box">
                                            <input type="text" placeholder="ค้นหาชื่อประเทศ" />
                                        </div>
                                    </div>
                                </div>
                                <label for="" class="sub-title">กำลังผลิต</label>
                                <div class="row-sub-content">
                                    <div class="ip-sf">
                                        <input type="number" onkeyup="if(this.value<0){this.value= this.value * -1}"
                                            onchange="Poolcapa_Change(this.value)" name="solar-size" id="Pvmodult_Floating_Capacity">
                                        <label for="" class="surfix">วัตต์ต่อ/แผ่น</label>
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
                                <input type="text" name="ivt-name" id="Inverter_Floating_Model">
                            </div>
                            <label for="" class="sub-title">ผู้ผลิต</label>
                            <div class="row-sub-content">
                                <input type="text" id="Inverter_Floating_Brand">
                            </div>
                            <label for="" class="sub-title">ประเทศ</label>
                            <div class="row-sub-content">
                                <div class="select-box">
                                    <div class="options-container">
                                    </div>
                                    <div class="selected" id="Inverter_Floating_Country">
                                        กรอกชื่อประเทศ
                                    </div>
                                    <div class="search-box">
                                        <input type="text" placeholder="ค้นหาชื่อประเทศ" />
                                    </div>
                                </div>
                            </div>
                            <label for="" class="sub-title">กำลังผลิต</label>
                            <div class="row-sub-content">
                                <div class="ip-sf">
                                    <input type="number" onkeyup="if(this.value<0){this.value= this.value * -1}" name=""
                                        id="Inverter_Floating_Capacity" onchange="FlaotingInverter_cal()">
                                    <label for="" class=" surfix">กิโลวัตต์ต่อเครื่อง</label>
                                </div>
                            </div>
                            <label for="" class="sub-title">จำนวน</label>
                            <div class="row-sub-content">
                                <div class="ip-sf">
                                    <input type="number" onkeyup="if(this.value<0){this.value= this.value * -1}"
                                        name="ivt-num" id="Inverter_Floating_Amount" onchange="FlaotingInverter_cal()">
                                    <label for="" class="surfix">เครื่อง</label>
                                </div>
                            </div>
                            <label for="" class="sub-title">กำลังผลิตรวม</label>
                            <div class="row-sub-content">
                                <div class="ip-sf">
                                    <input type="number" onkeyup="if(this.value<0){this.value= this.value * -1}" name=""
                                        id="Inverter_Floating_Sum" disabled=true>
                                    <label for="" class="surfix">กิโลวัตต์</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sup-content">
                    <label for="" class="sup-title"></label>
                    <div class="col-sub-cotent">
                        <label for="" class="sub-titel">รวมกำลังการผลิตติดตั้งของโครงการ</label>
                        <div class="row-sub-content">
                            <div class="ip-sf">
                                <input type="number" name="" id="Project_Total" disabled=true>
                                <label for="" class="surfix">เมกะวัตต์(MWp)</label>
                            </div>
                        </div>
                    </div>
                </div>
                <h4>รายละเอียดอุปกรณ์อื่นๆ</h4>
                <br>
                <div class="sup-content">
                    <label for="" class="sup-title">
                        <input class="form-check-input" type="checkbox" name="have-ess" id="have-ess" value="yes"
                            onclick="haveESS()" style="position: relative; bottom: 2px; margin-right: 4px;">
                        ระบบกักเก็บพลังงาน
                    </label>
                    <div class="ESS col-sub-content" style="display: none;">
                        <label for="" class="sub-title">แนบเอกสาร</label>
                        <div class="row-sub-content">
                            <input type="file" name="" id="ESS_doc">
                        </div>
                        <label for="" class="sub-title">รุ่น</label>
                        <div class="row-sub-content">
                            <input type="text" name="" id="ESS_Model">
                        </div>
                        <label for="" class="sub-title">ผู้ผลิต</label>
                        <div class="row-sub-content">
                            <input type="text" name="" id="ESS_Brand">
                        </div>
                        <label for="" class="sub-title">ประเทศ</label>
                        <div class="row-sub-content">
                            <div class="select-box">
                                <div class="options-container">
                                </div>
                                <div class="selected" id="ESS_Country">
                                    กรอกชื่อประเทศ
                                </div>
                                <div class="search-box">
                                    <input type="text" placeholder="ค้นหาชื่อประเทศ" />
                                </div>
                            </div>
                        </div>
                        <label for="" class="sub-title">กำลังผลิต</label>
                        <div class="row-sub-content">
                            <div class="ip-sf">
                                <input type="number" onkeyup="if(this.value<0){this.value= this.value * -1}" name=""
                                    id="ESS_Capacity" onchange="Esscapa_cal()">
                                <label for="" class=" surfix">กิโลวัตต์ต่อเครื่อง</label>
                            </div>
                        </div>
                        <label for="" class="sub-title">จำนวน</label>
                        <div class="row-sub-content">
                            <div class="ip-sf">
                                <input type="number" onkeyup="if(this.value<0){this.value= this.value * -1}" name=""
                                    id="ESS_Amount" onchange="Esscapa_cal()">
                                <label for="" class="surfix">เครื่อง</label>
                            </div>
                        </div>
                        <label for="" class="sub-title">รวมกำลังผลิต</label>
                        <div class="row-sub-content">
                            <div class="ip-sf">
                                <input type="number" onkeyup="if(this.value<0){this.value= this.value * -1}" name=""
                                    id="ESS_Sum" disabled=true>
                                <label for="" class="surfix">กิโลวัตต์</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sup-content">
                    <label for="" class="sup-title">อื่นๆ(โปรดระบุ)</label>
                    <div class="col-sub-content etc-tools">
                        <div class="row-sub-content">
                            <input type="text" name="" id="etc-tools-input" class="etc-input"
                                placeholder="กรอกรายชื่ออุปกรณ์เพิ่มเติม">
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
                            <input type="text" name="" id="EPC_Name">
                        </div>
                    </div>
                </div>
                <div class="sup-content 2.2.2">
                    <label for="" class="sup-title">รายละเอียดการลงทุน</label>
                    <div class="col-sub-content cost">
                        <label for="" class="sub-title">ค่าก่อสร้าง</label>
                        <div class="row-sub-content">
                            <div class="ip-sf">
                                <input type="number" min="0" name="" id="Construction_Cost" onchange=" Cost_cal()"
                                    onkeyup="if(this.value<0){this.value= this.value * -1}">
                                <label for="" class="surfix">ล้านบาท</label>
                            </div>
                        </div>
                        <label for="" class="sub-title">ค่าเครื่องจักรและอุปกรณ์อื่น ๆ</label>
                        <div class="row-sub-content">
                        </div>
                        <div class="row-sub-content">
                            <label for="" class="sub-title"
                                style="padding-left: 10px; font-size: 12.5px; min-width: 114px;">แผงเซลล์อาทิตย์</label>
                            <div class="ip-sf">
                                <input type="number" min="0" name="" id="Machine_Pvmodule" class="etc-cost"
                                    onchange=" Cost_cal()" onkeyup="if(this.value<0){this.value= this.value * -1}"
                                    style="width: auto; margin-left: 10px;">
                                <label for="" class="surfix">ล้านบาท</label>
                            </div>
                        </div>
                        <div class="row-sub-content">
                            <label for="" class="sub-title"
                                style="padding-left: 10px; font-size: 12.5px; min-width: 114px;">
                                เครื่องแปลงไฟ</label>
                            <div class="ip-sf">
                                <input type="number" min="0" name="" id="Machine_Inverter" class="etc-cost"
                                    onchange=" Cost_cal()" onkeyup="if(this.value<0){this.value= this.value * -1}"
                                    style="width: auto; margin-left: 10px;">
                                <label for="" class="surfix">ล้านบาท</label>
                            </div>
                        </div>
                        <div class="row-sub-content">
                            <label for="" class="sub-title"
                                style="padding-left: 10px; font-size: 12.5px; min-width: 114px;">
                                ระบบกักเก็บพลังงาน</label>
                            <div class="ip-sf">
                                <input type="number" min="0" name="" id="Machine_ESS" class="etc-cost"
                                    onchange=" Cost_cal()" onkeyup="if(this.value<0){this.value= this.value * -1}"
                                    style="width: auto; margin-left: 10px;">
                                <label for="" class="surfix">ล้านบาท</label>
                            </div>
                        </div>
                        <div class="row-sub-content">
                            <label for="" class="sub-title"
                                style="padding-left: 10px; font-size: 12.5px; min-width: 114px;">อื่นๆ</label>
                            <div class="ip-sf">
                                <input type="number" min="0" name="" id="Machine_Equipment" class="etc-cost"
                                    onchange=" Cost_cal()" onkeyup="if(this.value<0){this.value= this.value * -1}"
                                    style="width: auto; margin-left: 10px;">
                                <label for="" class="surfix">ล้านบาท</label>
                            </div>
                        </div>
                        <label for="" class="sub-title">รวมค่าเครื่องจักรและอุปกรณ์อื่น ๆ</label>
                        <div class="row-sub-content">
                            <div class="ip-sf">
                                <input type="number" name="" id="Machine_Info" disabled=true>
                                <label for="" class="surfix">ล้านบาท</label>
                            </div>
                        </div>
                        <label for="" class="sub-title">ค่าติดตั้ง</label>
                        <div class="row-sub-content">
                            <div class="ip-sf">
                                <input type="number" min="0" name="" id="Machine_Setup" onchange=" Cost_cal()"
                                    onkeyup="if(this.value<0){this.value= this.value * -1}">
                                <label for="" class="surfix">ล้านบาท</label>
                            </div>
                        </div>
                        <label for="" class="sub-title">ค่าทดลองเครื่อง</label>
                        <div class="row-sub-content">
                            <div class="ip-sf">
                                <input type="number" min="0" name="" id="Machine_Trial" onchange=" Cost_cal()"
                                    onkeyup="if(this.value<0){this.value= this.value * -1}">
                                <label for="" class="surfix">ล้านบาท</label>
                            </div>
                        </div>
                        <label for="" class="sub-title">ค่าใช้จ่ายก่อนเปิดดำเนินการ</label>
                        <div class="row-sub-content">
                            <div class="ip-sf">
                                <input type="number" min="0" name="" id="Expenses" onchange=" Cost_cal()"
                                    onkeyup="if(this.value<0){this.value= this.value * -1}">
                                <label for="" class="surfix">ล้านบาท</label>
                            </div>
                        </div>
                        <label for="" class="sub-title">มูลค่าสินทรัพย์อื่น ๆ </label>
                        <div class="row-sub-content">
                            <div class="ip-sf">
                                <input type="number" min="0" name="" id="Asset" onchange=" Cost_cal()"
                                    onkeyup="if(this.value<0){this.value= this.value * -1}">
                                <label for="" class="surfix">ล้านบาท</label>
                            </div>
                        </div>
                        <label for="" class="sub-title">ค่าที่ดิน </label>
                        <div class="row-sub-content">
                            <div class="ip-sf">
                                <input type="number" min="0" name="" id="Land_Value" onchange=" Cost_cal()"
                                    onkeyup="if(this.value<0){this.value= this.value * -1}">
                                <label for="" class="surfix">ล้านบาท</label>
                            </div>
                        </div>
                        <label for="" class="sub-title">ค่าวิชาการ</label>
                        <div class="row-sub-content">
                            <div class="ip-sf">
                                <input type="number" min="0" name="" id="Academic" onchange=" Cost_cal()">
                                <label for="" class="surfix">ล้านบาท</label>
                            </div>
                        </div>
                        <label for="" class="sub-title">เงินทุนหมุนเวียน </label>
                        <div class="row-sub-content">
                            <div class="ip-sf">
                                <input type="number" min="0" name="" id="Circulation" onchange=" Cost_cal()">
                                <label for="" class="surfix">ล้านบาท</label>
                            </div>
                        </div>
                        <label for="" class="sub-title">รวมเงินลงทุน</label>
                        <div class="row-sub-content">
                            <div class="ip-sf">
                                <input type="number" min="0" name="" id="Result" disabled=true>
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
                            <input type="month" name="mydate" id="Plan_Survey">
                        </div>
                        <label for="" class="sub-title">การจัดซื้อ/จัดหา</label>
                        <div class="row-sub-content">
                            <input type="month" name="mydate" id="Plan_Procurement">
                        </div>
                        <label for="" class="sub-title">การติดตั้ง</label>
                        <div class="row-sub-content">
                            <input type="month" name="mydate" id="Plan_installation">
                        </div>
                        <label for="" class="sub-title">กำหนดการจ่ายไฟฟ้า</label>
                        <div class="row-sub-content">
                            <input type="month" name="mydate" id="Plan_COD">
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
                            <input type="text" name="" id="ESA_Name">
                        </div>
                        <label for="" class="sub-title">การศึกษาและจัดจ้างบริษัทที่ปรึกษา</label>
                        <div class="row-sub-content">
                            <input type="month" name="mydate" id="ESA_Consult">
                        </div>
                        <label for="" class="sub-title">การศึกษาและรวบรวมข้อมูลสภาพแวดล้อมปัจจุบัน</label>
                        <div class="row-sub-content">
                            <input type="month" name="mydate" id="ESA_Study">
                        </div>
                        <label for=""
                            class="sub-title">การประเมินผลกระทบต่อสิ่งแวดล้อมและการกำหนดมาตรการป้องกัน<br>และแก้ไขผลกระทบต่อคุณภาพสิ่งแวดล้อมและความปลอดภัย
                            (ESA)</label>
                        <div class="row-sub-content">
                            <input type="month" name="mydate" id="ESA_Complete">
                        </div>
                    </div>
                </div>
                <h4>ปริมาณการผลิตต่อปี (ให้ใช้ข้อมูลจากโปรแกรมประเมินศักยภาพ)</h4>
                <br>
                <div class="sup-content">
                    <label for="" class="sup-title">ปริมาณการผลิต</label>
                    <div class="col-sub-content">
                        <label for="" class="sub-title">แนบเอกสาร</label>
                        <div class="row-sub-content">
                            <input type="file" name="" id="Quantity_doc">
                        </div>
                        <label for="" class="sub-title">ปีที่ 1</label>
                        <div class="row-sub-content">
                            <input type="number" name="" id="Quantity _First" onkeyup="if(this.value<0){this.value= this.value * -1}">
                        </div>
                        <label for="" class="sub-title">ปีที่ 2</label>
                        <div class="row-sub-content">
                            <input type="number" name="" id="Quantity _Second" onkeyup="if(this.value<0){this.value= this.value * -1}">
                        </div>
                        <label for="" class="sub-title">ปีที่ 3</label>
                        <div class="row-sub-content">
                            <input type="number" name="" id="Quantity _Third" onkeyup="if(this.value<0){this.value= this.value * -1}">
                        </div>
                    </div>
                </div>
                <div class="btn1" target="#tab3">
                    <a id="go-tab3" style="color: white;"> ต่อไป</a>
                </div>
            </div>
            <div id="tab3" data-tab-content>
                <div class="btn1">
                    <a style="color: white;"> ต่อไป</a>
                </div>
            </div>
        </div>
    </section>
</body>

</html>