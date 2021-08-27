function investment_menu() {
    let name = {}
    name.id = ID
    name.fname = Fname
    name.lname = Lname
    name.position = Position
    if (Position != 'Comment_id') {
        redirectPost('/admin/ข้อมูลการมอบหมายงาน.php', name)
    } else {
        redirectPost('/admin/ตรวจสอบและรับคำขอแบบยื่นออนไลน์.php', name)
    }
}

function requestHistory() {
    let name = {}
    name.id = ID
    name.fname = Fname
    name.lname = Lname
    name.position = Position
    name.doc_no = Doc_no
    redirectPost('/admin/ตารางประวัติธุรกรรม.php', name)
}

function checkRequest() {
    let name = {}
    name.id = ID
    name.fname = Fname
    name.lname = Lname
    name.position = Position
    name.doc_no = Doc_no
    name.assignee = document.getElementById('ผู้ยื่นคำขอ').innerHTML
    name.status = document.getElementById('สถานะ').innerHTML
    redirectPost('/admin/ดูคำขอ.php', name)
}

function logout() {
    let name = {}
    name.id = ""
    name.fname = ""
    name.lname = ""
    redirectPost('index.php', name)
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

function addData(data) {
    document.getElementById('doc_no').innerHTML = data[0]['doc_no']
    document.getElementById('เลขคำขอ').innerHTML = data[0]['เลขคำขอ']
    document.getElementById('ผู้ยื่นคำขอ').innerHTML = data[0]['ผู้ยื่นคำขอ']
    document.getElementById('ชื่อตัวแทน').innerHTML = data[0]['ชื่อตัวแทน']
    document.getElementById('ผู้รับคำขอ').innerHTML = data[0]['ผู้รับคำขอ']
    document.getElementById('ชื่อผู้รับมอบหมาย').innerHTML = data[0]['ชื่อผู้รับมอบหมาย']
    document.getElementById('ประเภทกิจการ').innerHTML = data[0]['ประเภทกิจการ']
    document.getElementById('สถานะ').innerHTML = data[0]['สถานะ']
    document.getElementById('วันที่ยื่นคำขอ').innerHTML = changeYear(data[0]['วันที่ยื่นคำขอ'])
    document.getElementById('วันที่รับคำขอ').innerHTML = changeYear(data[0]['วันที่รับคำขอ'])
    document.getElementById('วันที่สิ้นสุด').innerHTML = changeYear(data[0]['วันที่สิ้นสุด'])
    document.getElementById('วันที่ปรับปรุงล่าสุด').innerHTML = changeYear(data[0]['วันที่ปรับปรุงล่าสุด'])
    document.getElementById('ระยะเวลา').innerHTML = "1.01 งานขอรับการส่งเสริม (40 วัน) เสนอเซ็น"
    document.getElementById('ช่องทาง').innerHTML = "ยื่นคำขอผ่านระบบออนไลน์"
}

function changeYear(dateTime) {
    if (dateTime != null) {
        let splitDate = dateTime.split(" ")
        let date = splitDate[0].split("/")
        let year = parseInt(date[2]) + 543
        let dateChange = `${date[0]}/${date[1]}/${year} ${splitDate[1]}`
        return dateChange
    }
    return ""
}


function receiveRequest() {
    if (status === 'รอยืนยันคำขอ') {
        let data = new FormData()
        let date = getDate()
        let name = `${Fname} ${Lname}`
        data.append('doc_no', Doc_no)
        data.append('date', date)
        data.append('name', name)
        data.append('status', 'รับคำขอ')
        data.append('status2', 'รอมอบหมาย')
        $.ajax({
            type: "POST",
            url: "/admin/receiveRequest.php",
            data: data,
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                location.reload();
            },
            error: function (xhr, status, error, data) {
                console.log(`${error}`)
                console.log(`${data}`)
            }
        });
    }
}

function assign() {
    let data = new FormData()
    let currentDate = getDate()
    let assignorName = `${Fname} ${Lname}`
    let assigneeName = $('#assigneeName').val();
    let Postion  = `${Position}`
    if (Position == 'ผอกอง') {
        data.append('doc_no', Doc_no)
        data.append('currentDate', currentDate)
        data.append('assignorName', assignorName)
        data.append('assigneeName', assigneeName)
        data.append('status', 'รับมอบหมาย')
        data.append('status2', 'รอมอบหมาย/รับมอบหมาย')
        data.append('position', Postion)
    } else {
        data.append('doc_no', getCookie('doc_no'))
        data.append('currentDate', currentDate)
        data.append('assignorName', assignorName)
        data.append('assigneeName', assigneeName)
        data.append('status', 'รับมอบหมาย')
        data.append('status2', 'รอรับมอบหมาย')
        data.append('position', Postion)
    }

    $.ajax({
        type: "POST",
        url: "/admin/assign.php",
        data: data,
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
            location.reload();
        },
        error: function (xhr, status, error, data) {
            console.log(`${error}`)
            console.log(`${data}`)
        }
    });
}

function accept() {
    if (acceptAssign.style.cursor != 'not-allowed') {
        let data = new FormData()
        let currentDate = getDate()
        let assigneeName = `${Fname} ${Lname}`
        let Postion  = `${Position}`
        data.append('doc_no', Doc_no)
        data.append('currentDate', currentDate)
        data.append('assigneeName', assigneeName)
        data.append('status', 'รับมอบหมาย')
        data.append('status2', 'อยู่ระหว่างตรวจสอบแก้ไข')
        data.append('position', Postion)
        $.ajax({
            type: "POST",
            url: "/admin/acceptAssign.php",
            data: data,
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                location.reload();
            },
            error: function (xhr, status, error, data) {
                console.log(`${error}`)
                console.log(`${data}`)
            }
        });
    }
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

function togglePopup() {
    if (assignBtn.style.cursor != 'not-allowed') {
        document.getElementById('popup').classList.toggle('active')
    }

}

function add_AssigneeName(name) {
    const selected = document.getElementById('assigneeName')
    for (let i = 0; i < name.length; i++) {
        let opt = document.createElement('option');
        opt.value = `${name[i]['Fname']} ${name[i]["Lname"]}`
        opt.innerHTML = `${name[i]['Fname']} ${name[i]["Lname"]}`
        selected.appendChild(opt)
    }
    const requestNumber = document.getElementById('requestNumber')
    requestNumber.innerHTML = `E${Doc_no}`
}