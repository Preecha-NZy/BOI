const tabs = document.querySelectorAll('[data-tab-target]')
const tabContents = document.querySelectorAll('[data-tab-content]')
const none = document.querySelectorAll('[none]')
const gos = document.querySelectorAll('[target]')
tabs.forEach(tab => {
  tab.addEventListener('click', () => {
    const target = document.querySelector(tab.dataset.tabTarget)
    tabContents.forEach(tabContent => {
      tabContent.classList.remove('active')
    })
    tabs.forEach(tab => {
      tab.classList.remove('active')
    })
    tab.classList.add('active')
    target.classList.add('active')
    console.log(target)
  })
})

gos.forEach(go => {
  go.addEventListener('click', () => {
    // console.log(go)
    var x = go.getElementsByTagName('a')[0].id;
    if(x === 'go-tab2'){
      var x = "tab2-title"
      tabs.forEach (tab => {
        const a = document.querySelector(tab.dataset.tabTarget)
        if(tab.id === x) {
          const target = document.querySelector(tab.dataset.tabTarget)
          tab.classList.add('active')
          target.classList.add('active')
        }
        else {
          a.classList.remove('active')
          tab.classList.remove('active')
        }
      })
    }
    else if (x == 'go-tab3') {
      var x = "tab3-title"
      tabs.forEach (tab => {
        const a = document.querySelector(tab.dataset.tabTarget)
        if(tab.id === x) {
          const target = document.querySelector(tab.dataset.tabTarget)
          tab.classList.add('active')
          target.classList.add('active')
        }
        else {
          a.classList.remove('active')
          tab.classList.remove('active')
        }
      })
    }
  })
})

function rad4Checked() {
  var check = document.getElementById("solar-rad4");
  if (check.checked) {
    document.getElementById("solar-rad-etc").disabled = false;
  }
  else {
    document.getElementById("solar-rad-etc").value = "";
    document.getElementById("solar-rad-etc").disabled = true;
  }
}

$.Thailand({
  $district: $('#district'), // input ของตำบล
  $amphoe: $('#amphoe'), // input ของอำเภอ
  $province: $('#province'), // input ของจังหวัด
  $zipcode: $('#zipcode'), // input ของรหัสไปรษณีย์
});

function is_checked() {
  var roof = document.getElementById("is-roof")
  var ground = document.getElementById("is-ground")
  var water = document.getElementById("is-water")
  var roof_content = document.getElementsByClassName("is-roof-content")
  var ground_content = document.getElementsByClassName("is-ground-content")
  var water_content = document.getElementsByClassName("is-water-content")
  var content = document.getElementsByClassName("main-equipment")
  if (roof.checked) {
    roof_content[0].style.display = 'block'
  }
  else {
    roof_content[0].style.display = 'none'
  }
  if (ground.checked) {
    ground_content[0].style.display = 'block'
  }
  else {
    ground_content[0].style.display = 'none'
  }
  if (water.checked) {
    water_content[0].style.display = 'block'
  }
  else {
    water_content[0].style.display = 'none'
  }
};

function haveESS() {
  var have = document.getElementById("have-ess");
  if (have.checked) {
    none[0].classList.remove("none")
    // console.log(none[0])
  }
  else {
    var inputs = none[0].getElementsByTagName('input');
    for (var index = 0; index < inputs.length; ++index) {
        inputs[index].value = '';
    }
    none[0].classList.add("none")
  }
}

function addETC() {
  let container = document.getElementsByClassName("etc-tools")
  let etc_input = document.getElementById('etc-tools-input')
  let content = document.createElement('div')
  let show_etc = document.createElement('input')
  let delete_area = document.createElement('div')
  let delete_btn = document.createElement('a')

  if (etc_input.value != "") {
    content.setAttribute('class', 'row-sub-content')
    show_etc.setAttribute('type', 'text')
    show_etc.value = `${etc_input.value}`
    show_etc.disabled = true
    delete_area.setAttribute('class', 'etc-div-delete')
    delete_btn.innerHTML = "ลบ"
    delete_area.appendChild(delete_btn)
    content.appendChild(show_etc)
    content.appendChild(delete_area)
    container[0].appendChild(content)
    delete_area.onclick = function() {
      delete_area.parentElement.style.display = 'none'
    }
  }
}

function addWaterInput() {
  let nb_of_solar = document.getElementById('nb-solar-water')
  let nb_solar = document.querySelectorAll('.new-input')
  if (nb_solar.length == 0) {
    for (let i = 1; i <= nb_of_solar.value; i++) {
      let water = document.querySelector('.is-water-content')
      let container = water.getElementsByClassName('col-sub-content')
      let sub_title = document.createElement('label')
      let sub_content = document.createElement('div')
      let input_surfix = document.createElement('div')
      let number_solar = document.createElement('input')
      let foot_title = document.createElement('label')
      sub_content.setAttribute('class', 'row-sub-content new-input')
      input_surfix.setAttribute('class', 'ip-sf')
      number_solar.setAttribute('type', 'number')
      foot_title.setAttribute('class', 'surfix')
      sub_title.innerHTML = `จำนวนแผงโซล่าเซลล์ที่อ่างเก็บน้ำที่ ${i}`
      foot_title.innerHTML = "แผ่น"
  
      input_surfix.appendChild(number_solar)
      input_surfix.appendChild(foot_title)
      sub_content.appendChild(input_surfix)
      container[1].appendChild(sub_title)
      container[1].appendChild(sub_content)
    }
  }
  else {
    let nb = nb_solar.length + 1
    for (let i = nb; i <= nb_of_solar.value; i++) {
      let water = document.querySelector('.is-water-content')
      let container = water.getElementsByClassName('col-sub-content')
      let sub_title = document.createElement('label')
      let sub_content = document.createElement('div')
      let input_surfix = document.createElement('div')
      let number_solar = document.createElement('input')
      let foot_title = document.createElement('label')
      sub_content.setAttribute('class', 'row-sub-content new-input')
      input_surfix.setAttribute('class', 'ip-sf')
      number_solar.setAttribute('type', 'number')
      foot_title.setAttribute('class', 'surfix')
      sub_title.innerHTML = `จำนวนแผงโซล่าเซลล์ที่อ่างเก็บน้ำที่ ${i}`
      foot_title.innerHTML = "แผ่น"
  
      input_surfix.appendChild(number_solar)
      input_surfix.appendChild(foot_title)
      sub_content.appendChild(input_surfix)
      container[1].appendChild(sub_title)
      container[1].appendChild(sub_content)
    }
  }

}