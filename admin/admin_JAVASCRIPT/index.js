let c = []

function login() {
    let inputs = document.querySelectorAll('input')
    let count = 0
    for (let i = 0; i < inputs.length; i++) {
        if (inputs[i].value == "" || inputs[i].value == null) {
            inputs[i].reportValidity()
            count++
            break;
        }
    }
    if (count == 0) {
        var user_ID = inputs[0].value
        var password = inputs[1].value
        console.log(user_ID)
        console.log(password)
        $.ajax({
            type: "POST",
            url: "adminLogin.php",
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
                name.position = loginInfo[0]['Position']
                redirectPost('investment_menu.php', name)
            },
            error: function (xhr, status, error, data) {
                alert("ชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง")
                inputs.forEach(input => {
                    input.value = ''
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
