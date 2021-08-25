function login() {
    let login_inputs = document.querySelectorAll('.login_input')
    let count = 0
    for (let i = 0; i < login_inputs.length; i++) {
        if (login_inputs[i].value == '') {
            login_inputs[i].reportValidity()
            count++
            break;
        }
    }
    if (count == 0) {
        var user_ID = login_inputs[0].value
        var password = login_inputs[1].value
        $.ajax({
            type: "POST",
            url: "login_check.php",
            data: {
                ID: user_ID,
                Password: password
            },
            cache: false,
            success: function (data) {
                let loginInfo = JSON.parse(data)
                let name = {}
                name.id = loginInfo[0]['id']
                name.fname = loginInfo[0]['Fname']
                name.lname = loginInfo[0]['Lname']
                redirectPost('page1.php', name)
            },
            error: function (xhr, status, error,data) {
                alert("ชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง")
                login_inputs.forEach(input => {
                    input.value =''
                })
            }
        });
    }
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