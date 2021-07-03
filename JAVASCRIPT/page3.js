const tabs = document.querySelectorAll('[data-tab-target]')
const tabContents = document.querySelectorAll('[data-tab-content]')
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
    // console.log(go)
    var x = go.getElementsByTagName('a')[0].id;
    if (x === 'go-tab2') {
      var x = "tab2-title"
      tabs.forEach(tab => {
        const a = document.querySelector(tab.dataset.tabTarget)
        if (tab.id === x) {
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
      tabs.forEach(tab => {
        const a = document.querySelector(tab.dataset.tabTarget)
        if (tab.id === x) {
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

function is_checked() {
  var roof = document.getElementById("is-roof")
  var ground = document.getElementById("is-ground")
  var pool = document.getElementById("is-pool")
  var roof_content = document.getElementsByClassName("is-roof-content")
  var ground_content = document.getElementsByClassName("is-ground-content")
  var pool_content = document.getElementsByClassName("is-pool-content")
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
  if (pool.checked) {
    pool_content[0].style.display = 'block'
  }
  else {
    pool_content[0].style.display = 'none'
  }
};

function rad4Checked() {
  var roof_type = document.getElementById("Pvmodult_Roof_Type4");
  var ground_type = document.getElementById("Pvmodult_Farm_Type4");
  var pool_type = document.getElementById("Pvmodult_Floating_Type4");
  if (roof_type.checked) {
    document.getElementById("Pvmodult_Roof_Type_etc").disabled = false;
  }
  else {
    document.getElementById("Pvmodult_Roof_Type_etc").disabled = true;
    document.getElementById("Pvmodult_Roof_Type_etc").value = '';
  }

  if (ground_type.checked) {
    document.getElementById('Pvmodult_Farm_Type_etc').disabled = false;
  }
  else {
    document.getElementById('Pvmodult_Farm_Type_etc').disabled = true;
    document.getElementById('Pvmodult_Farm_Type_etc').value = '';
  }


  if (pool_type.checked) {
    document.getElementById('Pvmodult_Floating_Type_etc').disabled = false;
  }
  else {
    document.getElementById('Pvmodult_Floating_Type_etc').disabled = true;
    document.getElementById('Pvmodult_Floating_Type_etc').value = '';
  }
}

function locationRoof_Checked() {
  var LoRoof = document.getElementById('Location_Roof_Type3')
  if (LoRoof.checked) {
    document.getElementById('Location_Roof_Type_etc').disabled = false
  }
  else {
    document.getElementById('Location_Roof_Type_etc').disabled = true
    document.getElementById('Location_Roof_Type_etc').value = ""
  }
}

function PoolDetail_Checked() {
  var P_detail = document.getElementById('pool_detail3')
  if (P_detail.checked) {
    document.getElementById('pool_detail_etc').disabled = false
  }
  else {
    document.getElementById('pool_detail_etc').disabled = true
    document.getElementById('pool_detail_etc').value = ""
  }
}

function WaterDetail_Checked() {
  var W_detail = document.getElementById('water_detail4')
  if (W_detail.checked) {
    document.getElementById('water_detail_etc').disabled = false
  }
  else {
    document.getElementById('water_detail_etc').disabled = true
    document.getElementById('water_detail_etc').value = ""
  }
}
function RoofSolar_cal() {
  let RS_capa = document.getElementById('Pvmodult_Roof_Capacity')
  let RS_nb_solar = document.getElementById('Pvmodult_Roof_Amount')
  let RS_cal = document.getElementById('Pvmodult_Roof_Sum')
  let ESA = document.getElementsByClassName('ESA')
  if (RS_capa.value != null && RS_nb_solar != null) {
    RS_cal.value = ((RS_capa.value * RS_nb_solar.value) / 1000000)
    let capas = document.querySelectorAll('.total-capa')
    let Project_Total = document.getElementById("Project_Total")
    let total_capa = parseFloat(0.0)
    capas.forEach(capa => {
      if (capa.value != "") {
        total_capa = total_capa + parseFloat(capa.value)
      }
    })
    Project_Total.value = total_capa
    if (parseFloat(RS_cal.value) >= 1) {
      console.log('tet')
      ESA[0].style['pointer-events'] = 'auto';
    }
    else {
      ESA[0].style['pointer-events'] = 'none';
    }
  }
}

function RoofInverter_cal() {
  let RI_capa = document.getElementById('Inverter_Roof_Capacity')
  let RI_nb_ivt = document.getElementById('Inverter_Roof_Amount')
  let RI_cal = document.getElementById('Inverter_Roof_Sum')
  if (RI_capa.value != null && RI_nb_ivt != null) {
    RI_cal.value = RI_capa.value * RI_nb_ivt.value
  }
}

function GroundSolar_cal() {
  let GS_capa = document.getElementById('Pvmodult_Farm_Capacity')
  let GS_nb_solar = document.getElementById('Pvmodult_Farm_Amount')
  let GS_cal = document.getElementById('Pvmodult_Farm_Sum')
  let ESA = document.getElementsByClassName('ESA')
  if (GS_capa.value != null && GS_nb_solar != null) {
    GS_cal.value = ((GS_capa.value * GS_nb_solar.value) / 1000000)
    let capas = document.querySelectorAll('.total-capa')
    let Project_Total = document.getElementById("Project_Total")
    let total_capa = parseFloat(0.0)
    capas.forEach(capa => {
      if (capa.value != "") {
        total_capa = total_capa + parseFloat(capa.value)
        console.log(capa.value)
      }
    })
    Project_Total.value = total_capa
    if (parseFloat(GS_cal.value) >= 1) {
      ESA[0].style['pointer-events'] = 'auto';
    }
    else {
      ESA[0].style['pointer-events'] = 'none';
    }
  }
}

function GroundInverter_cal() {
  let GI_capa = document.getElementById('Inverter_Farm_Capacity')
  let GI_nb_ivt = document.getElementById('Inverter_Farm_Amount')
  let GI_cal = document.getElementById('Inverter_Farm_Sum')
  if (GI_capa.value != null && GI_nb_ivt != null) {
    GI_cal.value = GI_capa.value * GI_nb_ivt.value
  }
}

function FloatingArea_cal() {
  let poolArea = document.getElementById('pool_area')
  let floatingAre = document.getElementById('floating_area')
  let areaCal = document.getElementById('pool_percen')
  if (poolArea.value != null && floatingAre.value != null) {
    areaCal.value = `${((floatingAre.value / poolArea.value) * 100)}`
  }
}

function FlaotingInverter_cal() {
  let FI_capa = document.getElementById('Inverter_Floating_Capacity')
  let FI_nb_ivt = document.getElementById('Inverter_Floating_Amount')
  let FI_cal = document.getElementById('Inverter_Floating_Sum')
  if (FI_capa.value != null && FI_nb_ivt != null) {
    FI_cal.value = FI_capa.value * FI_nb_ivt.value
  }
}
function Poolcapa_Change() {
  let pool_capacity = document.getElementById('Pvmodult_Floating_Capacity')
  let nb_solar = document.querySelectorAll('.new-input')
  for (let i = 1; i <= nb_solar.length; i++) {
    let input_nb = document.getElementById(`Pvmodult_Floating_Amount_${i}`)
    let capa_cal = document.getElementById(`Pvmodult_Floating_Sum_${i}`)
    capa_cal.value = (input_nb.value * pool_capacity.value) / 1000000
  }
  let capas = document.querySelectorAll('.total-capa')
  let Project_Total = document.getElementById("Project_Total")
  let total_capa = parseFloat(0.0)
  capas.forEach(capa => {
    if (capa.value != "") {
      total_capa = total_capa + parseFloat(capa.value)
      console.log(capa.value)
    }
  })
  Project_Total.value = total_capa
}

function Cost_cal() {
  let costs = document.querySelector('.cost')
  let inputs = costs.querySelectorAll('input')
  let cost = parseInt(0)
  let etc_cost = parseFloat(0)
  inputs.forEach(input => {
    if (input.disabled == false) {
      if (input.value != 0) {
        cost = cost + parseFloat(input.value)
        if (input.className === 'etc-cost') {
          etc_cost = etc_cost + parseFloat(input.value)
        }
      }
    }
  })
  let Machine_Info = document.getElementById('Machine_Info')
  let Result = document.getElementById('Result')
  Result.value = cost
  Machine_Info.value = etc_cost
}

function Esscapa_cal() {
  let EC_capa = document.getElementById('ESS_Capacity')
  let EC_nb_ivt = document.getElementById('ESS_Amount')
  let EC_cal = document.getElementById('ESS_Sum')
  if (EC_capa.value != null && EC_nb_ivt != null) {
    EC_cal.value = EC_capa.value * EC_nb_ivt.value
  }
}

function haveESS() {
  var have = document.getElementById("have-ess");
  var ESS_div = document.getElementsByClassName("ESS");
  if (have.checked) {
    ESS_div[0].style.display = 'block'
  }
  else {
    var inputs = ESS_div[0].getElementsByTagName('input');
    for (var index = 0; index < inputs.length; ++index) {
      inputs[index].value = '';
    }
    ESS_div[0].style.display = 'none'
    console.log(ESS_div[0].style)
  }
}

$.Thailand({
  $district: $('#Location_Subdistrict'), // input ของตำบล
  $amphoe: $('#Location_district'), // input ของอำเภอ
  $province: $('#Location_Province'), // input ของจังหวัด
});



function addETC() {
  let container = document.getElementsByClassName("etc-tools")
  let etc_input = document.getElementById('etc-tools-input')
  let row_sub_content = document.createElement('div')
  let equipment = document.createElement('input')
  let delete_area = document.createElement('div')
  let delete_btn = document.createElement('a')

  if (etc_input.value != "") {
    row_sub_content.setAttribute('class', 'row-sub-content')
    equipment.setAttribute('type', 'text')
    equipment.value = `${etc_input.value}`
    equipment.disabled = true
    delete_area.setAttribute('class', 'etc-div-delete')
    delete_btn.innerHTML = "ลบ"
    delete_area.appendChild(delete_btn)
    row_sub_content.appendChild(equipment)
    row_sub_content.appendChild(delete_area)
    container[0].appendChild(row_sub_content)
    etc_input.value = ""
    delete_area.onclick = function () {
      delete_area.parentElement.remove()
    }
  }
}

function addpoolInput() {
  let floating = document.getElementsByClassName('floating-content')
  let nb_of_solar = document.getElementById('nb_pool')
  let nb_solar = document.querySelectorAll('.new-input')
  if (nb_solar.length == 0) {
    for (let i = 1; i <= nb_of_solar.value; i++) {
      let sup_content = document.createElement('div')
      let sup_title = document.createElement('label')
      let col_sub_content = document.createElement('div')
      var sub_titel = document.createElement('label')
      let row_sub_content = document.createElement('div')
      let ip_sf = document.createElement('div')
      let nb_solar_input = document.createElement('input')
      let surfix = document.createElement('label')
      sup_content.setAttribute('class', 'sup-content')
      sup_title.setAttribute('class', 'sup-title')
      sup_title.setAttribute('id', `${i}`)
      col_sub_content.setAttribute('class', 'col-sub-content')
      sub_titel.setAttribute('class', 'sub-title')
      row_sub_content.setAttribute('class', ' row-sub-content')
      ip_sf.setAttribute('class', 'ip-sf')
      nb_solar_input.setAttribute('type', 'number')
      nb_solar_input.setAttribute('class', 'new-input')
      surfix.setAttribute('class', 'surfix')
      nb_solar_input.setAttribute('id', `Pvmodult_Floating_Amount_${i}`)
      sup_title.innerHTML = `อ่างเก็บน้ำที่ ${i}`
      sub_titel.innerHTML = `จำนวนแผงเซลล์แสงอาทิตย์`
      surfix.innerHTML = 'แผ่น'

      nb_solar_input.onkeyup = function () {
        if (this.value < 0) { this.value = this.value * -1 }
      }
      ip_sf.appendChild(nb_solar_input)
      ip_sf.appendChild(surfix)
      row_sub_content.appendChild(ip_sf)
      col_sub_content.appendChild(sub_titel)
      col_sub_content.appendChild(row_sub_content)

      sub_titel = document.createElement('label')
      row_sub_content = document.createElement('div')
      ip_sf = document.createElement('div')
      let nb_capa_cal = document.createElement('input')
      surfix = document.createElement('label')
      sub_titel.setAttribute('class', 'sub-title')
      row_sub_content.setAttribute('class', ' row-sub-content')
      ip_sf.setAttribute('class', 'ip-sf')
      nb_capa_cal.setAttribute('type', 'number')
      surfix.setAttribute('class', 'surfix')
      nb_capa_cal.setAttribute('id', `Pvmodult_Floating_Sum_${i}`)
      nb_capa_cal.setAttribute('class', 'total-capa')
      nb_capa_cal.disabled = true
      sub_titel.innerHTML = `รวมกำลังผลิตติดตั้ง`
      surfix.innerHTML = 'เมกะวัตต์(MWp)'
      // surfix.style.color = 'black'

      ip_sf.appendChild(nb_capa_cal)
      ip_sf.appendChild(surfix)
      row_sub_content.appendChild(ip_sf)
      col_sub_content.appendChild(sub_titel)
      col_sub_content.appendChild(row_sub_content)

      sup_content.appendChild(sup_title)
      sup_content.appendChild(col_sub_content)
      floating[0].appendChild(sup_content)

      nb_solar_input.onchange = function () {
        let capa = document.getElementById('Pvmodult_Floating_Capacity')
        nb_capa_cal.value = (capa.value * nb_solar_input.value) / 1000000
        let capas = document.querySelectorAll('.total-capa')
        let Project_Total = document.getElementById("Project_Total")
        let ESA = document.getElementsByClassName('ESA')
        let total_capa = parseFloat(0.0)
        capas.forEach(capa => {
          if (capa.value != "") {
            total_capa = total_capa + parseFloat(capa.value)
            console.log(capa.value)
          }
        })
        Project_Total.value = total_capa
        if (parseFloat(nb_capa_cal.value) >= 1) {
          ESA[0].style['pointer-events'] = 'auto';
        }
        else {
          ESA[0].style['pointer-events'] = 'none';
        }
      }
    }
  }
  else if (nb_of_solar.value < nb_solar.length) {
    console.log("yes")
    for (let i = nb_solar.length; i > nb_of_solar.value; i--) {
      let delete_input = document.getElementById(`${i}`)
      delete_input.parentElement.remove()
    }
    Poolcapa_Change()
  }
  else {
    let nb = nb_solar.length + 1
    for (let i = nb; i <= nb_of_solar.value; i++) {
      let sup_content = document.createElement('div')
      let sup_title = document.createElement('label')
      let col_sub_content = document.createElement('div')
      var sub_titel = document.createElement('label')
      let row_sub_content = document.createElement('div')
      let ip_sf = document.createElement('div')
      let nb_solar_input = document.createElement('input')
      let surfix = document.createElement('label')
      sup_content.setAttribute('class', 'sup-content')
      sup_title.setAttribute('class', 'sup-title')
      sup_title.setAttribute('id', `${i}`)
      col_sub_content.setAttribute('class', 'col-sub-content')
      sub_titel.setAttribute('class', 'sub-title')
      row_sub_content.setAttribute('class', ' row-sub-content')
      ip_sf.setAttribute('class', 'ip-sf')
      nb_solar_input.setAttribute('type', 'number')
      nb_solar_input.setAttribute('class', 'new-input')
      surfix.setAttribute('class', 'surfix')
      nb_solar_input.setAttribute('id', `Pvmodult_Floating_Amount_${i}`)
      sup_title.innerHTML = `อ่างเก็บน้ำที่ ${i}`
      sub_titel.innerHTML = `จำนวนแผงเซลล์แสงอาทิตย์`
      surfix.innerHTML = 'แผ่น'

      nb_solar_input.onkeyup = function () {
        if (this.value < 0) { this.value = this.value * -1 }
      }
      ip_sf.appendChild(nb_solar_input)
      ip_sf.appendChild(surfix)
      row_sub_content.appendChild(ip_sf)
      col_sub_content.appendChild(sub_titel)
      col_sub_content.appendChild(row_sub_content)

      sub_titel = document.createElement('label')
      row_sub_content = document.createElement('div')
      ip_sf = document.createElement('div')
      let nb_capa_cal = document.createElement('input')
      surfix = document.createElement('label')
      sub_titel.setAttribute('class', 'sub-title')
      row_sub_content.setAttribute('class', ' row-sub-content')
      ip_sf.setAttribute('class', 'ip-sf')
      nb_capa_cal.setAttribute('type', 'number')
      surfix.setAttribute('class', 'surfix')
      nb_capa_cal.setAttribute('id', `Pvmodult_Floating_Sum_${i}`)
      nb_capa_cal.setAttribute('class', 'total-capa')
      nb_capa_cal.disabled = true
      sub_titel.innerHTML = `รวมกำลังผลิตติดตั้ง`
      surfix.innerHTML = 'เมกะวัตต์(MWp)'
      // surfix.style.color = 'black'

      ip_sf.appendChild(nb_capa_cal)
      ip_sf.appendChild(surfix)
      row_sub_content.appendChild(ip_sf)
      col_sub_content.appendChild(sub_titel)
      col_sub_content.appendChild(row_sub_content)

      sup_content.appendChild(sup_title)
      sup_content.appendChild(col_sub_content)
      floating[0].appendChild(sup_content)

      nb_solar_input.onchange = function () {
        let capa = document.getElementById('Pvmodult_Floating_Capacity')
        nb_capa_cal.value = (capa.value * nb_solar_input.value) / 1000000
        let capas = document.querySelectorAll('.total-capa')
        let Project_Total = document.getElementById("Project_Total")
        let ESA = document.getElementsByClassName('ESA')
        let total_capa = parseFloat(0.0)
        capas.forEach(capa => {
          if (capa.value != "") {
            total_capa = total_capa + parseFloat(capa.value)
            console.log(capa.value)
          }
        })
        Project_Total.value = total_capa
        if (parseFloat(nb_capa_cal.value) >= 1) {
          ESA[0].style['pointer-events'] = 'auto';
        }
        else {
          ESA[0].style['pointer-events'] = 'none';
        }
      }
    }
  }
}

let select_box = document.querySelectorAll('.select-box')
select_box.forEach(box => {
  let select_country = box.querySelectorAll('.options-container')
  fetch("../Country/country-list-th.json")
    .then(response => response.json())
    .then(countrys => {
      countrys.forEach(country => {
        select_country.forEach(select => {
          let option = document.createElement('div')
          let newOption = document.createElement('input')
          let label = document.createElement('label')
          option.setAttribute('class', 'option')
          newOption.setAttribute('type', 'radio')
          newOption.setAttribute('class', 'radio')
          newOption.setAttribute('id', `${country.name}`)
          newOption.setAttribute('name', 'category')
          option.style.display = 'block'
          label.setAttribute('for', `${country.name}`)
          label.innerHTML = `${country.name}`
          option.appendChild(newOption)
          option.appendChild(label)
          select.appendChild(option)
        })
      })
      const selected = box.querySelector(".selected");
      const optionsContainer = box.querySelector(".options-container");
      const searchBox = box.querySelector(".search-box input");

      const optionsList = optionsContainer.querySelectorAll(".option");
      selected.addEventListener("click", () => {
        optionsContainer.classList.toggle("active");

        searchBox.value = "";
        filterList("");

        if (optionsContainer.classList.contains("active")) {
          searchBox.focus();
        }
      });

      optionsList.forEach(o => {
        o.addEventListener("click", () => {
          selected.innerHTML = o.querySelector("label").innerHTML;
          optionsContainer.classList.remove("active");
        });
      });

      searchBox.addEventListener("keyup", function (e) {
        filterList(e.target.value);
      });

      const filterList = searchTerm => {
        optionsList.forEach(option => {
          let label = option.innerText;
          if (label.indexOf(searchTerm) != -1) {
            option.style.display = "block";
          } else {
            option.style.display = "none";
          }
        });
      };
    })
})

let months = document.querySelectorAll('input[type=month]')
var today = new Date();
var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
months.forEach(month => {
  month.min = `${today.getFullYear()}-0${today.getMonth()+1}`
})