function logout() {
    let name = {}
    name.id = ""
    name.fname = ""
    name.lname = ""
    redirectPost('index.php', name)
}

function request_online() {
    let name = {}
    name.id = ID
    name.fname = Fname
    name.lname = Lname
    redirectPost('page2.php', name)
}

function editRequest() {
    let data = {}
    let i = ""
    let opts = companyName.querySelectorAll('option')
    opts.forEach(opt => {
        if (opt.value == companyName.value) {
            i = `${opt.id}`
        }
    })
    data.id = ID
    data.fname = Fname
    data.lname = Lname
    data.name = $('#companyName').val();
    data.doc_no = editData[i]['doc_no']
    data.editZone = editData[i]['ข้อมูลที่จะแก้ไข']
    data.editComment = editData[i]['รายละเอียด']
    data.editTimes = editData[i]['แก้ครังที่']
    data.editStatus = editData[i]['สถานะ']
    redirectPost('editRequest.php', data)
}

function viewRequest() {
    let data = {}
    let i = ""
    let opts = companyName1.querySelectorAll('option')
    opts.forEach(opt => {
        if (opt.value == companyName1.value) {
            i = `${opt.id}`
        }
    })
    data.id = ID
    data.fname = Fname
    data.lname = Lname
    data.name = $('#companyName1').val();
    data.doc_no = request[i]['doc_no']
    redirectPost('showRequest.php', data)
}

function add_companyName(name, number) {
    const selected = document.getElementById('companyName')
    let opt = document.createElement('option');
    opt.setAttribute('id', `${number}`)
    opt.value = `${name}`
    opt.innerHTML = `${name}`
    selected.appendChild(opt)
}

function add_request(name, number){
    const selected = document.getElementById('companyName1')
    let opt = document.createElement('option');
    opt.setAttribute('id', `${number}`)
    opt.value = `${name}`
    opt.innerHTML = `${name}`
    selected.appendChild(opt)
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


function togglePopup() {
    if (count > 0) {
        document.getElementById('popup').classList.toggle('active')
    }
}

function togglePopup1() {
        document.getElementById('popup1').classList.toggle('active')
}