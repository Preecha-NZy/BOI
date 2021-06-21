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
  })
})

gos.forEach(go => {
  go.addEventListener('click', () => {
    console.log(go)
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

function haveESS() {
  var have = document.getElementById("have-ess");
  if (have.checked) {
    none[0].classList.remove("none")
    console.log(none[0])
  }
  else {
    var inputs = none[0].getElementsByTagName('input');
    for (var index = 0; index < inputs.length; ++index) {
        inputs[index].value = '';
    }
    none[0].classList.add("none")
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
  // if (!roof.checked & !ground.checked & !water.checked) {
  //   content[0].style.display = 'none'
  // }
};