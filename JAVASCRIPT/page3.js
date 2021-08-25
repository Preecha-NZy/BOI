function checkButton() {
  var ch1 = document.querySelector('input[name="first-choice"]:checked');
  var ch2 = document.querySelector('input[name="second-choice"]:checked');
  if(ch1.value == 'yes' && ch2.value == 'yes') {
      let name = {}
      name.id = ID
      name.fname = Fname
      name.lname = Lname
      redirectPost('page4.php', name)
  }
  else {
      let name = {}
      name.id = ID
      name.fname = Fname
      name.lname = Lname
      redirectPost('page3.php', name)
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