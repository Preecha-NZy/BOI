function investment_menu() {
    let name = {}
    name.id = ID
    name.fname = Fname
    name.lname = Lname
    name.position = Position
    redirectPost('/admin/investment_menu.php', name)
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