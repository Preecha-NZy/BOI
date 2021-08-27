var editArray = []
function investment_menu() {
    let name = {}
    name.id = ID
    name.fname = Fname
    name.lname = Lname
    name.position = Position
    name.doc_no = Doc_no
    redirectPost('/admin/รายละเอียดคำขอ.php', name)
}

function logout() {
    let name = {}
    name.id = ""
    name.fname = ""
    name.lname = ""
    redirectPost('index.php', name)
}

function reloadPage() {
    let name = {}
    name.id = ID
    name.fname = Fname
    name.lname = Lname
    name.position = Position
    name.assignee = Assignee
    name.status = "ส่งกลับแก้ไข"
    name.doc_no = Doc_no
    redirectPost('/admin/ดูคำขอ.php', name)
}

function redirectPost(url, data) {
    var form = document.createElement('form');
    document.body.appendChild(form);
    form.method = 'post';
    form.action = url;
    for (var name in data) {
        var input = document.createElement('input');
        input.type = 'hidden';
        input.name = name;
        input.value = data[name];
        form.appendChild(input);
    }
    form.submit();
}


function addProductDetail(addProductDetail) {
    Product_Name.innerHTML = `${addProductDetail[0]['Product_Name']}`
    Contract_Name.innerHTML = `${addProductDetail[0]['Contract_Name']}`
    Contract_Name_Page.innerHTML = `${addProductDetail[0]['Contract_Name_Page']}`
    Capacity.innerHTML = `${Number.parseFloat(addProductDetail[0]['Capacity']).toFixed(4)} เมกะวัตต์(MWp)`
    Capacity_Page.innerHTML = `${addProductDetail[0]['Capacity_Page']}`
    Location_No.innerHTML = `เลขที่ ${addProductDetail[0]['Location_No']}`
    Location_Street.innerHTML = `${productDetail[0]['Location_Street']}`
    Location_Subdistrict.innerHTML = `${addProductDetail[0]['Location_Subdistrict']}`
    Location_district.innerHTML = `${addProductDetail[0]['Location_district']}`
    Location_Province.innerHTML = `${addProductDetail[0]['Location_Province']}`
    Location_Page.innerHTML = `${addProductDetail[0]['Location_Page']}`
}
function addRoofSolar(rooftopSolar) {
    Location_Rooftop_Province.innerHTML = `${rooftopSolar[0]['Location_Type']}`
    Pvmodult_Roof_Type.innerHTML = `${rooftopSolar[0]['Pvmodult_Type']}`
    Pvmodult_Rooftop_Model.innerHTML = `${rooftopSolar[0]['Pvmodult_Model']}`
    Pvmodult_Rooftop_Brand.innerHTML = `${rooftopSolar[0]['Pvmodult_Brand']}`
    Pvmodult_Rooftop_Country.innerHTML = `${rooftopSolar[0]['Pvmodult_Country']}`
    Pvmodult_Rooftop_Capacity.innerHTML = `${rooftopSolar[0]['Pvmodult_Capacity']} วัตต์ต่อแผง`
    Pvmodult_Rooftop_Amount.innerHTML = `${rooftopSolar[0]['Pvmodult_Amount']} แผ่น`
    Pvmodult_Rooftop_Cost.innerHTML = `${Number.parseFloat(rooftopSolar[0]['Pvmodult_Cost']).toFixed(2)} บาท`
    Pvmodult_Rooftop_Sum.innerHTML = `${Number.parseFloat(rooftopSolar[0]['Pvmodult_Sum']).toFixed(4)} เมกะวัตต์(MWp)`
}
function addRoofInverter(rooftopInverter) {
    Inverter_Rooftop_Model.innerHTML = `${rooftopInverter[0]['Inverter_Model']}`
    Inverter_Rooftop_Brand.innerHTML = `${rooftopInverter[0]['Inverter_Brand']}`
    Inverter_Rooftop_Country.innerHTML = `${rooftopInverter[0]['Inverter_Country']}`
    Inverter_Rooftop_Capacity.innerHTML = `${Number.parseFloat(rooftopInverter[0]['Inverter_Capacity']).toFixed(2)} กิโลวัตต์ต่อเครื่อง`
    Inverter_Rooftop_Amount.innerHTML = `${rooftopInverter[0]['Inverter_Amount']} เครื่อง`
    Inverter_Rooftop_Cost.innerHTML = `${Number.parseFloat(rooftopInverter[0]['Inverter_Cost']).toFixed(2)} บาท`
    Inverter_Rooftop_Sum.innerHTML = `${Number.parseFloat(rooftopInverter[0]['Inverter_Sum']).toFixed(2)} กิโลวัตต์(kWp)`
}
function addFarmSolar(farmSolar) {
    Location_Farm_Province.innerHTML = `${farmSolar[0]['Location_Type']}`
    Pvmodult_Farm_Type.innerHTML = `${farmSolar[0]['Pvmodult_Type']}`
    Pvmodult_Farm_Model.innerHTML = `${farmSolar[0]['Pvmodult_Model']}`
    Pvmodult_Farm_Brand.innerHTML = `${farmSolar[0]['Pvmodult_Brand']}`
    Pvmodult_Farm_Country.innerHTML = `${farmSolar[0]['Pvmodult_Country']}`
    Pvmodult_Farm_Capacity.innerHTML = `${farmSolar[0]['Pvmodult_Capacity']} วัตต์ต่อแผง`
    Pvmodult_Farm_Amount.innerHTML = `${farmSolar[0]['Pvmodult_Amount']} แผ่น`
    Pvmodult_Farm_Cost.innerHTML = `${Number.parseFloat(farmSolar[0]['Pvmodult_Cost']).toFixed(2)} บาท`
    Pvmodult_Farm_Sum.innerHTML = `${Number.parseFloat(farmSolar[0]['Pvmodult_Sum']).toFixed(4)} เมกะวัตต์(MWp)`
}
function addFarmInverter(farmInverter) {
    Inverter_Farm_Model.innerHTML = `${farmInverter[0]['Inverter_Model']}`
    Inverter_Farm_Brand.innerHTML = `${farmInverter[0]['Inverter_Brand']}`
    Inverter_Farm_Country.innerHTML = `${farmInverter[0]['Inverter_Country']}`
    Inverter_Farm_Capacity.innerHTML = `${Number.parseFloat(farmInverter[0]['Inverter_Capacity']).toFixed(2)} กิโลวัตต์ต่อเครื่อง`
    Inverter_Farm_Amount.innerHTML = `${farmInverter[0]['Inverter_Amount']} เครื่อง`
    Inverter_Farm_Cost.innerHTML = `${Number.parseFloat(farmInverter[0]['Inverter_Cost']).toFixed(2)} บาท`
    Inverter_Farm_Sum.innerHTML = `${Number.parseFloat(farmInverter[0]['Inverter_Sum']).toFixed(2)} กิโลวัตต์(kWp)`
}
function addFloatingSolar(floatingSolar) {
    let floatingDiv = document.getElementsByClassName('FLS')
    Floating_Amount.innerHTML = `${floatingSolar[0]['Floating_Amount']} อ่าง`
    pool_detail.innerHTML = `${floatingSolar[0]['pool_detail']}`
    water_detail.innerHTML = `${floatingSolar[0]['water_detail']}`
    pool_area.innerHTML = `${Number.parseFloat(floatingSolar[0]['pool_area']).toFixed(2)} ตารางเมตร`
    floating_area.innerHTML = `${Number.parseFloat(floatingSolar[0]['floating_area']).toFixed(2)} ตารางเมตร`
    pool_percen.innerHTML = `${Number.parseFloat(floatingSolar[0]['pool_percen']).toFixed(2)} เปอร์เซ็น`
    Pvmodult_Floating_Type.innerHTML = `${floatingSolar[0]['Pvmodult_Type']}`
    Pvmodult_Floating_Model.innerHTML = `${floatingSolar[0]['Pvmodult_Model']}`
    Pvmodult_Floating_Brand.innerHTML = `${floatingSolar[0]['Pvmodult_Brand']}`
    Pvmodult_Floating_Country_input.innerHTML = `${floatingSolar[0]['Pvmodult_Country']}`
    Pvmodult_Floating_Capacity.innerHTML = `${floatingSolar[0]['Pvmodult_Capacity']} วัตต์ต่อแผง`
    Pvmodult_Floating_Cost.innerHTML = `${Number.parseFloat(floatingSolar[0]['Pvmodult_Cost']).toFixed(2)} บาท`
    for (let i = 0; i < floatingSolar['length']; i++) {
        let row = document.createElement('div')
        let sup1 = document.createElement('div')
        let sub1 = document.createElement('div')
        let sup2 = document.createElement('div')
        let sub2 = document.createElement('div')
        row.setAttribute('class', 'row')
        sup1.setAttribute('class', 'sup-content')
        sub1.setAttribute('class', 'sub-content')
        sup2.setAttribute('class', 'sup-content')
        sub2.setAttribute('class', 'sub-content')
        sup1.innerHTML = `จำนวนแผงเซลล์แสงอาทิตย์อ่างเก็บน้ำที่ ${i + 1}`
        sup2.innerHTML = `กำลังผลิตติดตั้งรวม`
        sub1.innerHTML = `${floatingSolar[i]['Pvmodult_Amount']}  แผ่น`
        sub2.innerHTML = `${Number(floatingSolar[i]['Pvmodult_Sum']).toFixed(4)} เมกะวัตต์(MWp)`
        row.append(sup1)
        row.append(sub1)
        row.append(sup2)
        row.append(sub2)
        floatingDiv[0].appendChild(row)
    }
}
function addFloatingInverter(floatingInverter) {
    Inverter_Floating_Model.innerHTML = `${floatingInverter[0]['Inverter_Model']}`
    Inverter_Floating_Brand.innerHTML = `${floatingInverter[0]['Inverter_Brand']}`
    Inverter_Floating_Country.innerHTML = `${floatingInverter[0]['Inverter_Country']}`
    Inverter_Floating_Capacity.innerHTML = `${floatingInverter[0]['Inverter_Capacity']} กิโลวัตต์ต่อเครื่อง`
    Inverter_Floating_Amount.innerHTML = `${floatingInverter[0]['Inverter_Amount']} เครื่อง`
    Inverter_Floating_Cost.innerHTML = `${Number.parseFloat(floatingInverter[0]['Inverter_Cost']).toFixed(2)} บาท`
    Inverter_Floating_Sum.innerHTML = `${Number.parseFloat(floatingInverter[0]['Inverter_Sum']).toFixed(2)} กิโลวัตต์(kWp)`
}
function addESS(ess) {
    let ESS = document.getElementsByClassName('ESS')
    ESS_Model.innerHTML = `${ess[0]['ESS_Model']}`
    ESS_Brand.innerHTML = `${ess[0]['ESS_Brand']}`
    ESS_Country.innerHTML = `${ess[0]['ESS_Country']}`
    ESS_Capacity.innerHTML = `${Number.parseFloat(ess[0]['ESS_Capacity']).toFixed(2)} กิโลวัตต์ต่อเครื่อง`
    ESS_Amount.innerHTML = `${ess[0]['ESS_Amount']} เครื่อง`
    ESS_Cost.innerHTML = `${Number.parseFloat(ess[0]['ESS_Cost']).toFixed(2)} บาท`
    ESS_Sum.innerHTML = `${Number.parseFloat(ess[0]['ESS_Sum']).toFixed(2)} กิโลวัตต์(kWp)`
    // ESS_Cost.innerHTML = `${ess[0]['ESS_Cost']}`
}
function addEquipment(equipment) {
    let div = document.getElementsByClassName('Equipment')
    for (let i = 0; i < equipment['length']; i++) {
        let row = document.createElement('div')
        let sup1 = document.createElement('div')
        let sub1 = document.createElement('div')
        let sup2 = document.createElement('div')
        let sub2 = document.createElement('div')
        row.setAttribute('class', 'row')
        sup1.setAttribute('class', 'sup-content')
        sub1.setAttribute('class', 'sub-content')
        sup2.setAttribute('class', 'sup-content')
        sub2.setAttribute('class', 'sub-content')
        sup2.style.visibility = 'hidden'
        sub2.style.visibility = 'hidden'
        sup1.innerHTML = `ชื่ออุปกรณ์ที่ ${i + 1}`
        sub1.innerHTML = `${equipment[i]['Descript']}`
        row.append(sup1)
        row.append(sub1)
        row.append(sup2)
        row.append(sub2)
        div[0].appendChild(row)
    }
}
function addInvestment(investment) {
    EPC_Name.innerHTML = `${investment[0]['EPC_Name']}`
    Construction_Cost.innerHTML = `${Number.parseFloat(investment[0]['Construction_Cost']).toFixed(3)} ล้านบาท`
    Machine_Pvmodule.innerHTML = `${Number.parseFloat(investment[0]['Machine_Pvmodule']).toFixed(3)} ล้านบาท`
    Machine_Inverter.innerHTML = `${Number.parseFloat(investment[0]['Machine_Inverter']).toFixed(3)} ล้านบาท`
    Machine_ESS.innerHTML = `${Number.parseFloat(investment[0]['Machine_ESS']).toFixed(3)} ล้านบาท`
    Machine_Equipment.innerHTML = `${Number.parseFloat(investment[0]['Machine_Equipment']).toFixed(3)} ล้านบาท`
    Machine_Setup.innerHTML = `${Number.parseFloat(investment[0]['Machine_Setup']).toFixed(3)} ล้านบาท`
    Machine_Trial.innerHTML = `${Number.parseFloat(investment[0]['Machine_Trial']).toFixed(3)} ล้านบาท`
    Expenses.innerHTML = `${Number.parseFloat(investment[0]['Expenses']).toFixed(3)} ล้านบาท`
    Asset.innerHTML = `${Number.parseFloat(investment[0]['Asset']).toFixed(3)} ล้านบาท`
    Land_Value.innerHTML = `${Number.parseFloat(investment[0]['Land_Value']).toFixed(3)} ล้านบาท`
    Academic.innerHTML = `${Number.parseFloat(investment[0]['Academic']).toFixed(3)} ล้านบาท`
    Circulation.innerHTML = `${Number.parseFloat(investment[0]['Circulation']).toFixed(3)} ล้านบาท`
    Result.innerHTML = `${Number.parseFloat(investment[0]['Result']).toFixed(3)} ล้านบาท`
}
function addSIP(SIP) {
    Plan_Survey.innerHTML = `${change_dateFormat(SIP[0]['Plan_Survey'])}`
    Plan_Procurement.innerHTML = `${change_dateFormat(SIP[0]['Plan_Procurement'])}`
    Plan_installation.innerHTML = `${change_dateFormat(SIP[0]['Plan_installation'])}`
    Plan_COD.innerHTML = `${change_dateFormat(SIP[0]['Plan_COD'])}`
}
function addESA(esa) {
    ESA_Name.innerHTML = `${esa[0]['ESA_Name']}`
    ESA_Consult.innerHTML = `${change_dateFormat(esa[0]['ESA_Consult'])}`
    ESA_Study.innerHTML = `${change_dateFormat(esa[0]['ESA_Study'])}`
    ESA_Complete.innerHTML = `${change_dateFormat(esa[0]['ESA_Complete'])}`
}

function editMode() {
    let checkboxs = document.querySelectorAll('input[type = checkbox]')
    checkboxs.forEach(checkbox => {
        checkbox.classList.toggle('active')
    })
    document.getElementById('overlay').classList.toggle('active')
    document.getElementById('editContent').classList.toggle('active')
    assignName.innerHTML = `${Fname} ${Lname}`
    doc_no.innerHTML = `${solarRequest[0]['Doc_no']}`
}

function editZone(elem) {
    elem.parentElement.classList.toggle('active')
    if (elem.checked) {
        if (!editArray.includes(`${elem.value}`)) {
            editArray.push(`${elem.value}`)
        }
    }
    else {
        editArray.indexOf(`${elem.value}`) !== -1 && editArray.splice(editArray.indexOf(`${elem.value}`), 1)
    }
    editbox.innerHTML = editArray
}

function editRequest() {
    let a = 0
    let form = new FormData()
    let doc_no = solarRequest[0]['Doc_no']
    let info = document.getElementById('inforBox').value
    let status = 'ส่งกลับแก้ไข'
    let assignee = Assignee
    let currentDate = getDate()
    let assignor = `${Fname} ${Lname}`
    form.append('doc_no', doc_no)
    form.append('edit', editArray)
    form.append('info', info)
    form.append('status', status)
    form.append('assignee', assignee)
    form.append('currentDate', currentDate)
    form.append('assignor', assignor)
    $.ajax({
        type: "POST",
        url: "editRequest.php",
        data: form,
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
            reloadPage()
        },
        error: function (xhr, status, error, data) {
            console.log(`${error}`)
            console.log(`${data}`)
        }
    });
}

function change_dateFormat(date) {
    const thaiMonths = ['มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม']
    let splitDate = date.split("/")
    let month = thaiMonths[Number.parseInt(splitDate[0]) - 1]
    let year = parseInt(splitDate[1]) + 543
    let dateChange = `${month} พ.ศ.${year}`
    return dateChange
}


function getDate() {
    let today = new Date()
    let year = today.getFullYear()
    let month
    let day
    let hours
    let minute
    let second
    if (parseInt(today.getMonth() + 1) < 10) {
        month = `0${today.getMonth() + 1}`
    } else month = `${today.getMonth() = 1}`;

    if (parseInt(today.getDate()) < 10) {
        day = `0${today.getDate()}`
    } else day = `${today.getDate()}`;

    if (parseInt(today.getHours()) < 10) {
        hours = `0${today.getHours()}`
    } else hours = `${today.getHours()}`

    if (parseInt(today.getMinutes()) < 10) {
        minute = `0${today.getMinutes()}`
    } else minute = `${today.getMinutes()}`

    if (parseInt(today.getSeconds()) < 10) {
        second = `0${today.getSeconds()}`
    } else second = `${today.getSeconds()}`
    date = `${year}-${month}-${day} ${hours}:${minute}:${second}`
    return date
}
