function checkButton() {
    var rad1 = document.getElementById("first-choice");
    var rad2 = document.getElementById("second-choice");
    var rad3 = document.getElementById("third-choice");
    if (rad3.checked == true) {
        let name = {}
        name.id = ID
        name.fname = Fname
        name.lname = Lname
        redirectPost('page3.php', name)
    }
    else {
        let name = {}
        name.id = ID
        name.fname = Fname
        name.lname = Lname
        redirectPost('page2.php', name)
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


function logout() {
    let name = {}
    name.id = ""
    name.fname = ""
    name.lname = ""
    redirectPost('index.php', name)
}