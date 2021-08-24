
function request_online() {
    let name = {}
    name.id = ID
    name.fname = Fname
    name.lname = Lname
    name.position = Position
    redirectPost('/admin/ตรวจสอบและรับคำขอแบบยื่นออนไลน์.php', name)
}

function request_mself() {
    let name = {}
    name.id = ID
    name.fname = Fname
    name.lname = Lname
    name.position = Position
    redirectPost('/admin/ตรวจสอบและรับคำขอแบบยื่นด้วยตนเองที่สำนักงาน.php', name)
}

function suggest_invest() {
    let name = {}
    name.id = ID
    name.fname = Fname
    name.lname = Lname
    name.position = Position
    redirectPost('/admin/แนะนำการยื่นคำขอ.php', name)
}

function change_operator() {
    let name = {}
    name.id = ID
    name.fname = Fname
    name.lname = Lname
    name.position = Position
    redirectPost('/admin/เปลี่ยนผู้ดำเนินการ.php', name)
}

function number() {
    let name = {}
    name.id = ID
    name.fname = Fname
    name.lname = Lname
    name.position = Position
    redirectPost('/admin/ออกเลขนร.php', name)
}


function dispact_info() {
    let name = {}
    name.id = ID
    name.fname = Fname
    name.lname = Lname
    name.position = Position
    redirectPost('/admin/ข้อมูลการมอบหมายงาน.php', name)
}

function assign_info() {
    let name = {}
    name.id = ID
    name.fname = Fname
    name.lname = Lname
    name.position = Position
    redirectPost('/admin/มอบหมายอำนาจรักษาการแทน.php', name)
}

function project_analysis() {
    let name = {}
    name.id = ID
    name.fname = Fname
    name.lname = Lname
    name.position = Position
    redirectPost('/admin/งานวิเคราะห์โครงการ.php', name)
}

function in_project_analysis() {
    let name = {}
    name.id = ID
    name.fname = Fname
    name.lname = Lname
    name.position = Position
    redirectPost('/admin/งานวิเคราะห์โครงการภายในกอง.php', name)
}

function checkPosition(position) {
    if (position != 'Comment_id') {
        let contents = document.querySelectorAll('.ข้อมูลคำขอ')
        contents.forEach(content => {
            content.style.display = 'none'
        })
        document.querySelector('.มอบหมายอำนาจ').style.display = 'none'
    }
}


function redirectPost(url, data) {
    var form = document.createElement('form');
    form.onsubmit = false;
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