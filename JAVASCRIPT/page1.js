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
    let opts = document.querySelectorAll('option')
    opts.forEach(opt => {
        if (opt.value == $('#companyName').val()) {
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
function add_companyName(name, number) {
    const selected = document.getElementById('companyName')
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