function investment_menu() {
    let name = {}
    name.id = ID
    name.fname = Fname
    name.lname = Lname
    name.position = Position
    redirectPost('/admin/investment_menu.php', name)
}

function sendDoc_no(colum) {
    let row = colum.parentElement.parentElement;
    let doc_no = row.querySelectorAll('td')[1].innerHTML;
    let name = {}
    name.id = ID
    name.fname = Fname
    name.lname = Lname
    name.position = Position
    name.doc_no = doc_no
    redirectPost('/admin/รายละเอียดคำขอ.php', name)
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
function addRow(rowLength, data, color, offset) {
    let tBodyEl = document.querySelector('tbody')
    let i;
    let j = 0
    for (i = 0; i < rowLength; i++) {
        if(data[i]['สถานะ'] == 'อยู่ระหว่างตรวจสอบแก้ไข' && color == 'red') {
            color = 'black'
            j += 1
        }
        tBodyEl.innerHTML += `
        <tr style = "color:${color}">
                <td>${i + 1 + offset}</td>
                <td>${data[i]['doc_no']}</td>
                <td>${data[i]['เลขคำขอ']}</td>
                <td>${dateCheck(data[i]['วันที่รับคำขอ'])}</td>
                <td>${dateCheck(data[i]['วันที่สิ้นสุด'])}</td>
                <td>${data[i]['ผู้ยื่นคำขอ']}</td>
                <td>${data[i]['ประเภทกิจการ']}</td>
                <td>${data[i]['สถานะ']}</td>
                <td>
                    <div class = "receive-btn" style="color:white;" onclick="sendDoc_no(this)">
                        <i class ="icon-check" style = "font-size: 12px"></i>
                        ตรวจสอบคำขอ
                    </div>
                </td>
            </tr>
            `
        if (j>0){
            color = 'red'
        }
    }
    return i
}

function dateCheck(dateTime) {
    if (dateTime != null) {
        let date = dateTime.split("/")
        let year = parseInt(date[2]) + 543
        let dateChange = `${date[0]}/${date[1]}/${year}`
        return dateChange
    }
    return ""
}

function serachRequest() {
    resetDisplay()
    let input = []
    input.push(document.getElementById("doc_no").value)
    input.push(document.getElementById('ผู้ยื่นคำขอ').value)
    search(input)
}

function search(...inputs) {
    var input, filter, table, tr, td, i, j, cellValue;
    let count = 0;
    table = document.getElementById("data-table");
    tr = table.getElementsByTagName("tr");
    for (let k = 0; k < parseInt(inputs[0]['length']); k++) {
        if (inputs[0][k] != "") {
            for (i = 1; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td");
                count = 0
                for (j = 0; j < td.length; j++) {
                    cellValue = td[j].textContent || td[j].innerText;
                    if (cellValue.trim() === inputs[0][k]) {
                        count += 1
                    }
                }
                if (count == 0) {
                    tr[i].style.display = "none";
                }
            }
        }
    }
}

function refreshSearch() {
    location.reload();
}

function resetDisplay() {
    let table = document.getElementById("data-table");
    let trs = table.querySelectorAll('tr')
    trs.forEach(tr => {
        tr.style.display = ''
    })
}