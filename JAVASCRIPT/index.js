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
                window.location.href = "page1.php";
            },
            error: function (xhr, status, error) {
                alert("ชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง")
                login_inputs.forEach(input => {
                    input.value =''
                })
            }
        });
    }
}
