
var Solar_cost = [0, 0, 0]
var Inverter_cost = [0, 0, 0]
var today = new Date();
var date = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate();
var thai_year = (parseInt(today.getFullYear()) + 543) % 100
var Rooftop_Solar = {}
var Rooftop_Inverter = {}
var Farm_Solar = {}
var Farm_Inverter = {}
var Floating_Solar = []
var Floating_Inverter = {}
var Investment_Detail = {}
var Location_Rooftop = {}
var Location_Farm = {}
var Location_Floating = {}
var Equipment = []
var ESA = {}
var ESS = {}
var Plans = {}
var Product_detail = {}
var Solar_Request = {}
var System_installation_plan = {}
var Tools = {}
var finish = true

function test(User_id, Fname, Lname) {
  User_ID = User_id
  User_Fname = Fname
}

function is_checked() {
  let roof = document.getElementById("is-roof")
  let ground = document.getElementById("is-ground")
  let pool = document.getElementById("is-pool")
  let roof_content = document.getElementsByClassName("is-roof-content")
  let ground_content = document.getElementsByClassName("is-ground-content")
  let pool_content = document.getElementsByClassName("is-pool-content")
  if (roof.checked) {
    roof_content[0].style.display = 'block'
  }
  else {
    roof_content[0].style.display = 'none'
    let inputs = roof_content[0].querySelectorAll('input')
    let country = roof_content[0].querySelectorAll('.selected')
    inputs.forEach(input => {
      if (input.className != "radio") {
        if (input.type == 'radio') {
          input.checked = false
        }
        else {
          input.value = ''
        }
      }
    })
    country.forEach(c => {
      c.innerHTML = 'กรอกชื่อประเทศ'
    })
    RoofSolar_cal()
    RoofInverter_cal()
  }
  if (ground.checked) {
    ground_content[0].style.display = 'block'
  }
  else {
    ground_content[0].style.display = 'none'
    let inputs = ground_content[0].querySelectorAll('input')
    let country = ground_content[0].querySelectorAll('.selected')
    inputs.forEach(input => {
      if (input.className != "radio") {
        if (input.type == 'radio') {
          input.checked = false
        }
        else {
          input.value = ''
        }
      }
    })
    country.forEach(c => {
      c.innerHTML = 'กรอกชื่อประเทศ'
    })
    GroundSolar_cal()
    GroundInverter_cal()
  }
  if (pool.checked) {
    pool_content[0].style.display = 'block'
  }
  else {
    pool_content[0].style.display = 'none'
    let inputs = pool_content[0].querySelectorAll('input')
    let country = pool_content[0].querySelectorAll('.selected')
    inputs.forEach(input => {
      if (input.className != "radio") {
        if (input.type == 'radio') {
          input.checked = false
        }
        else {
          input.value = ''
        }
      }
    })
    country.forEach(c => {
      c.innerHTML = 'กรอกชื่อประเทศ'
    })
    FloatingSolar_cost()
    ChangeNumFloating_input()
    RoofSolar_cal()
  }
}

function rad4Checked() {
  let roof_type = document.getElementById("Pvmodult_Roof_Type4");
  let ground_type = document.getElementById("Pvmodult_Farm_Type4");
  let pool_type = document.getElementById("Pvmodult_Floating_Type4");
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
  let LoRoof = document.getElementById('Location_Roof_Type3')
  if (LoRoof.checked) {
    document.getElementById('Location_Roof_Type_etc').disabled = false
  }
  else {
    document.getElementById('Location_Roof_Type_etc').disabled = true
    document.getElementById('Location_Roof_Type_etc').value = ""
  }
}

function PoolDetail_Checked() {
  let P_detail = document.getElementById('pool_detail3')
  if (P_detail.checked) {
    document.getElementById('pool_detail_etc').disabled = false
  }
  else {
    document.getElementById('pool_detail_etc').disabled = true
    document.getElementById('pool_detail_etc').value = ""
  }
}

function WaterDetail_Checked() {
  let W_detail = document.getElementById('water_detail4')
  if (W_detail.checked) {
    document.getElementById('water_detail_etc').disabled = false
  }
  else {
    document.getElementById('water_detail_etc').disabled = true
    document.getElementById('water_detail_etc').value = ""
  }
}

function Solar_cal(capa, solar_nb, solar_cal) {
  let ESA = document.getElementsByClassName('ESA')
  if (capa.value != '' && solar_nb.value != '') {
    solar_cal.value = parseFloat((capa.value * solar_nb.value) / 1000000).toFixed(5)
  }
  else {
    solar_cal.value = ''
  }
  let capas = document.querySelectorAll('.total-capa')
  let Project_Total = document.getElementById("Project_Total")
  let total_capa = parseFloat(0.0)
  let capa_array = []
  capas.forEach(capa => {
    if (capa.value != "") {
      total_capa = total_capa + parseFloat(capa.value)
    }
    capa_array.push(capa.value)
  })
  Project_Total.value = total_capa
  const Check_capa = (capa) => capa > 1;
  if (capa_array.some(Check_capa)) {
    ESA[0].style['pointer-events'] = 'auto';
  }
  else {
    ESA[0].style['pointer-events'] = 'none';
    let inputs = ESA[0].querySelectorAll('input')
    inputs.forEach(input => {
      input.value = ""
    })
  }
}

function Inverter_cal(capa, ivt_nb, ivt_cal) {
  if (capa.value != '' && ivt_nb.value != '') {
    ivt_cal.value = parseFloat(capa.value * ivt_nb.value).toFixed(4)
  }
  else {
    ivt_cal.value = ''
  }
  let capas = document.querySelectorAll('.total-ivt-capa')
  let Project_ivt_Total = document.getElementById("Project_ivt_Total")
  let total_capa = parseFloat(0.0)
  capas.forEach(capa => {
    if (capa.value != "") {
      total_capa = total_capa + parseFloat(capa.value)
    }
  })
  Project_ivt_Total.value = total_capa
}

function SolarCost_cal(costs) {
  Machine_Pvmodule.value = parseFloat(costs.reduce((a, b) => a + b, 0)).toFixed(4)
  Cost_cal()
}

function InverterCost_cal(costs) {
  Machine_Inverter.value = parseFloat(costs.reduce((a, b) => a + b, 0)).toFixed(4)
  Cost_cal()
}

function RoofSolar_cal() {
  let RS_capa = document.getElementById('Pvmodult_Roof_Capacity')
  let RS_nb_solar = document.getElementById('Pvmodult_Roof_Amount')
  let RS_cal = document.getElementById('Pvmodult_Roof_Sum')
  RoofSolar_cost()
  if (RS_capa.value > 500) {
    roof_capa.style.display = 'flex'
  }
  else {
    roof_capa.style.display = 'none'
    Solar_cal(RS_capa, RS_nb_solar, RS_cal)
  }
}

function RoofSolar_cost() {
  if (Pvmodult_Roof_Cost.value != '' && Pvmodult_Roof_Amount.value != '') {
    Solar_cost[0] = (Pvmodult_Roof_Cost.value * Pvmodult_Roof_Amount.value) / Math.pow(10, 6)
  }
  else {
    Solar_cost[0] = 0
  }
  SolarCost_cal(Solar_cost)
}

function RoofInverter_cal() {
  let RI_capa = document.getElementById('Inverter_Roof_Capacity')
  let RI_nb_ivt = document.getElementById('Inverter_Roof_Amount')
  let RI_cal = document.getElementById('Inverter_Roof_Sum')
  Inverter_cal(RI_capa, RI_nb_ivt, RI_cal)
  RoofInverter_cost()
}

function RoofInverter_cost() {
  if (Inverter_Roof_Cost.value != '' && Inverter_Roof_Amount.value != '') {
    Inverter_cost[0] = (Inverter_Roof_Cost.value * Inverter_Roof_Amount.value) / Math.pow(10, 6)
  }
  else {
    Inverter_cost[0] = 0
  }
  InverterCost_cal(Inverter_cost)
}

function GroundSolar_cal() {
  let GS_capa = document.getElementById('Pvmodult_Farm_Capacity')
  let GS_nb_solar = document.getElementById('Pvmodult_Farm_Amount')
  let GS_cal = document.getElementById('Pvmodult_Farm_Sum')
  GroundSolar_cost()
  if (GS_capa.value > 500) {
    farm_capa.style.display = 'flex'
  }
  else {
    farm_capa.style.display = 'none'
    Solar_cal(GS_capa, GS_nb_solar, GS_cal)
  }
}

function GroundSolar_cost() {
  if (Pvmodult_Farm_Cost.value != '' && Pvmodult_Farm_Amount.value != '') {
    Solar_cost[1] = (Pvmodult_Farm_Cost.value * Pvmodult_Farm_Amount.value) / Math.pow(10, 6)
  }
  else {
    Solar_cost[1] = 0
  }
  SolarCost_cal(Solar_cost)
}

function GroundInverter_cal() {
  let GI_capa = document.getElementById('Inverter_Farm_Capacity')
  let GI_nb_ivt = document.getElementById('Inverter_Farm_Amount')
  let GI_cal = document.getElementById('Inverter_Farm_Sum')
  Inverter_cal(GI_capa, GI_nb_ivt, GI_cal)
  GroundInverter_cost()
}

function GroundInverter_cost() {
  if (Inverter_Farm_Cost.value != '' && Inverter_Farm_Amount.value != '') {
    Inverter_cost[1] = (Inverter_Farm_Cost.value * Inverter_Farm_Amount.value) / Math.pow(10, 6)
  }
  else {
    Inverter_cost[1] = 0
  }
  InverterCost_cal(Inverter_cost)
}

function FloatingArea_cal() {
  let poolArea = document.getElementById('pool_area')
  let floatingAre = document.getElementById('floating_area')
  let areaCal = document.getElementById('pool_percen')
  if (poolArea.value != null && floatingAre.value != null) {
    areaCal.value = (parseFloat(floatingAre.value) / parseFloat(poolArea.value)) * 100
  }
}

function FloatingSolar_cal() {
  let pool_capacity = document.getElementById('Pvmodult_Floating_Capacity')
  let nb_solar = document.querySelectorAll('.new-input')
  if (pool_capacity.value > 500) {
    floating_capa.style.display = 'flex'
  }
  else {
    floating_capa.style.display = 'none'
    if (nb_solar.length != 0) {
      for (let i = 1; i <= nb_solar.length; i++) {
        let input_nb = document.getElementById(`Pvmodult_Floating_Amount_${i}`)
        let capa_cal = document.getElementById(`Pvmodult_Floating_Sum_${i}`)
        Solar_cal(pool_capacity, input_nb, capa_cal)
      }
    }
  }
}

function FloatingSolar_cost() {
  let inputs = document.querySelectorAll('.new-input')
  if (inputs.length != 0) {
    let input_nb = []
    inputs.forEach(input => {
      if (input.value != "") {
        input_nb.push(parseInt(input.value))
      }
    })
    let sum_input = input_nb.reduce((a, b) => a + b, 0)
    Solar_cost[2] = (Pvmodult_Floating_Cost.value * sum_input) / Math.pow(10, 6)
  }
  else {
    Solar_cost[2] = 0
  }
  SolarCost_cal(Solar_cost)
}

function FloatingInverter_cal() {
  let FI_capa = document.getElementById('Inverter_Floating_Capacity')
  let FI_nb_ivt = document.getElementById('Inverter_Floating_Amount')
  let FI_cal = document.getElementById('Inverter_Floating_Sum')
  Inverter_cal(FI_capa, FI_nb_ivt, FI_cal)
  FloatingInverter_cost()
}

function FloatingInverter_cost() {
  if (Inverter_Floating_Cost.value != '' && Inverter_Floating_Amount.value != '') {
    Inverter_cost[2] = parseFloat((Inverter_Floating_Cost.value * Inverter_Floating_Amount.value) / Math.pow(10, 6))
  }
  else {
    Inverter_cost[2] = 0
  }
  InverterCost_cal(Inverter_cost)
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
  Result.value = parseFloat(cost).toFixed(4)
  Machine_Info.value = parseFloat(etc_cost).toFixed(4)
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
  let have = document.getElementById("have-ess");
  let ESS_div = document.getElementsByClassName("ESS");
  if (have.checked) {
    ESS_div[0].style.display = 'block'
  }
  else {
    let inputs = ESS_div[0].getElementsByTagName('input');
    for (let index = 0; index < inputs.length; ++index) {
      inputs[index].value = '';
    }
    ESS_div[0].style.display = 'none'
  }
}

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
    equipment.setAttribute('class', 'etc-input')
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

function ChangeNumFloating_input() {
  let floating = document.getElementsByClassName('floating-content')
  let nb_of_solar = document.getElementById('Floating_Amount')
  let nb_solar = document.querySelectorAll('.new-input')
  if (nb_solar.length == 0) {
    addPool_input(1, nb_of_solar.value)
  }
  else if (nb_of_solar.value < nb_solar.length) {
    for (let i = nb_solar.length; i > nb_of_solar.value; i--) {
      let delete_input = document.getElementById(`${i}`)
      delete_input.parentElement.remove()
    }
  }
  else {
    addPool_input(nb_solar.length + 1, nb_of_solar.value)
  }
  FloatingSolar_cal()
  FloatingSolar_cost()
}

function addPool_input(start_nb, end_nb) {
  let floating = document.getElementsByClassName('floating-content')
  for (let i = start_nb; i <= end_nb; i++) {
    let sup_content = document.createElement('div')
    let sup_title = document.createElement('label')
    let col_sub_content = document.createElement('div')
    let sub_titel = document.createElement('label')
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
    nb_solar_input.required = true
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

    ip_sf.appendChild(nb_capa_cal)
    ip_sf.appendChild(surfix)
    row_sub_content.appendChild(ip_sf)
    col_sub_content.appendChild(sub_titel)
    col_sub_content.appendChild(row_sub_content)

    sup_content.appendChild(sup_title)
    sup_content.appendChild(col_sub_content)
    floating[0].appendChild(sup_content)

    nb_solar_input.onchange = function () {
      if (Pvmodult_Floating_Capacity.value <= 500) {
        let capa = document.getElementById('Pvmodult_Floating_Capacity')
        Solar_cal(capa, nb_solar_input, nb_capa_cal)
        FloatingSolar_cost()
      }
    }
  }
}

function submit() {
  let sites = document.querySelectorAll('input[name=installation-site]:checked')
  let count = 0
  if (sites.length > 0) {
    for (let i = 0; i < sites.length; i++) {
      if (sites[i].value == 'Rooftop') {
        let Roof_valid = RooftopSolar_insert()
        if (Roof_valid == false || Roof_valid == null) {
          count++
          break;
        }
      }
      else if (sites[i].value == 'Farm') {
        let Farm_valid = FarmSolar_insert()
        if (Farm_valid == false || Farm_valid == null) {
          count++
          break;
        }
      }
      else {
        let Floating_valid = FloatingSolar_insert()
        if (Floating_valid == false || Floating_valid == null) {
          count++
          break;
        }
      }
    }
  }
  else {
    window.scroll(0, findPos(document.querySelector('input[name=installation-site]')));
    document.querySelector('input[name=installation-site]').reportValidity()
    finish = false
    return;
  }
  if (count === 0) {
    ProductDetail_insert()
    let ess = ESS_insert()
    if (ess == null) return;
    let ETC = Equipment_insert()
    if (ETC == null) return;
    let IVM = InvestmentDetail_insert()
    if (IVM == null) return;
    let SYS = SYSPlan_insert()
    if (SYS == null) return;
    ESA_insert()
    Tools_insert()
    Plans_insert()
    SolarRequest_insert()
    if (finish) {
      console.log(JSON.stringify(Product_detail, null, 4))
      console.log(JSON.stringify(Rooftop_Solar, null, 4))
      console.log(JSON.stringify(Rooftop_Inverter, null, 4))
      console.log(JSON.stringify(Location_Rooftop, null, 4))
      console.log(JSON.stringify(Farm_Solar, null, 4))
      console.log(JSON.stringify(Farm_Inverter, null, 4))
      console.log(JSON.stringify(Location_Farm, null, 4))
      console.log(JSON.stringify(Floating_Solar, null, 4))
      console.log(JSON.stringify(Floating_Inverter, null, 4))
      console.log(JSON.stringify(Location_Floating, null, 4))
      console.log(JSON.stringify(ESS, null, 4))
      console.log(JSON.stringify(Equipment, null, 4))
      console.log(JSON.stringify(Tools, null, 4))
      console.log(JSON.stringify(Investment_Detail, null, 4))
      console.log(JSON.stringify(System_installation_plan, null, 4))
      console.log(JSON.stringify(ESA, null, 4))
      console.log(JSON.stringify(Plans, null, 4))
      console.log(JSON.stringify(Solar_Request, null, 4))
      SendValue()
    }
  }
}

function ProductDetail_insert() {
  Product_detail.ID = `PDD${thai_year}`
  Product_detail.Product_Name = document.getElementById('Product_Name').value;
  Product_detail.Contract_Name = document.getElementById('Contract_Name').value;
  Product_detail.Contract_Name_Page = document.getElementById('Contract_Name_Page').value;
  Product_detail.Document_number = document.getElementById('Document_number').value;
  Product_detail.Capacity = document.getElementById('Capacity').value;
  Product_detail.Capacity_page = document.getElementById('Capacity_Page').value;
  Product_detail.Location_No = document.getElementById('Location_No').value;
  Product_detail.Location_Street = document.getElementById('Location_Street').value;
  Product_detail.Location_Subdistrict = document.getElementById('Location_Subdistrict').value;
  Product_detail.Location_district = document.getElementById('Location_district').value;
  Product_detail.Location_Province = document.getElementById('Location_Province').value;
  Product_detail.Location_Page = document.getElementById('Location_Page').value;
}

function RooftopSolar_insert() {
  let DOC = document.getElementById('Rooftop_doc')
  let Lo_type = document.querySelector('input[name=Location_Roof_Type]:checked')
  let Pvmodult_Type = document.querySelector('input[name=Pvmodult_Roof_Type]:checked')
  Rooftop_Solar.ID = `RTS${thai_year}`
  if (DOC.value == null || DOC.value == "") {
    window.scroll(0, findPos(document.getElementById('Rooftop_doc')));
    document.getElementById('Rooftop_doc').reportValidity()
    finish = false
    return;
  }

  if (Lo_type != null) {
    if (Lo_type.value != "อื่น ๆ") {
      Rooftop_Solar.Location_Type = Lo_type.value;
    }
    else {
      if (document.getElementById('Location_Roof_Type_etc').value != '') {
        Rooftop_Solar.Location_Type = document.getElementById('Location_Roof_Type_etc').value;
      } else {
        window.scroll(0, findPos(document.getElementById('Location_Roof_Type_etc')));
        document.getElementById('Location_Roof_Type_etc').reportValidity()
        finish = false
        return;
      }
    }
  } else {
    window.scroll(0, findPos(document.querySelector('input[name=Location_Roof_Type]')));
    document.querySelector('input[name=Location_Roof_Type]').reportValidity()
    finish = false
    return;
  }

  if (Pvmodult_Type != null) {
    if (Pvmodult_Type.value != "อื่น ๆ") {
      Rooftop_Solar.Type = Pvmodult_Type.value;
    }
    else {
      if (document.getElementById('Pvmodult_Roof_Type_etc').value != '') {
        Rooftop_Solar.Type = document.getElementById('Pvmodult_Roof_Type_etc').value;
      } else {
        window.scroll(0, findPos(document.getElementById('Pvmodult_Roof_Type_etc')));
        document.getElementById('Pvmodult_Roof_Type_etc').reportValidity()
        finish = false
        return;
      }
    }
  } else {
    window.scroll(0, findPos(document.querySelector('input[name=Pvmodult_Roof_Type]')));
    document.querySelector('input[name=Pvmodult_Roof_Type]').reportValidity()
    finish = false
    return;
  }

  if (document.getElementById('Pvmodult_Roof_Model').value != '')
    Rooftop_Solar.Model = document.getElementById('Pvmodult_Roof_Model').value;
  else {
    window.scroll(0, findPos(document.getElementById('Pvmodult_Roof_Model')));
    document.getElementById('Pvmodult_Roof_Model').reportValidity()
    finish = false
    return;
  }
  if (document.getElementById('Pvmodult_Roof_Brand').value != '')
    Rooftop_Solar.Brand = document.getElementById('Pvmodult_Roof_Brand').value;
  else {
    window.scroll(0, findPos(document.getElementById('Pvmodult_Roof_Brand')));
    document.getElementById('Pvmodult_Roof_Brand').reportValidity()
    finish = false
    return;
  }

  if (document.getElementById('Pvmodult_Roof_Country').textContent != 'กรอกชื่อประเทศ')
    Rooftop_Solar.Country = document.getElementById('Pvmodult_Roof_Country').textContent;
  else {
    window.scroll(0, findPos(document.getElementById('Pvmodult_Roof_Country')));
    document.getElementById('Pvmodult_Roof_Country_input').reportValidity()
    finish = false
    return;
  }

  if (document.getElementById('Pvmodult_Roof_Capacity').value != '' && parseFloat(document.getElementById('Pvmodult_Roof_Capacity').value) <= 500)
    Rooftop_Solar.Capacity = parseFloat(document.getElementById('Pvmodult_Roof_Capacity').value);
  else {
    document.getElementById('Pvmodult_Roof_Capacity').value = ''
    window.scroll(0, findPos(document.getElementById('Pvmodult_Roof_Capacity')));
    document.getElementById('Pvmodult_Roof_Capacity').reportValidity()
    finish = false
    return;
  }

  if (document.getElementById('Pvmodult_Roof_Amount').value != '')
    Rooftop_Solar.Amount = parseInt(document.getElementById('Pvmodult_Roof_Amount').value);
  else {
    window.scroll(0, findPos(document.getElementById('Pvmodult_Roof_Amount')));
    document.getElementById('Pvmodult_Roof_Amount').reportValidity()
    finish = false
    return;
  }

  if (document.getElementById('Pvmodult_Roof_Cost').value != '')
    Rooftop_Solar.Cost = parseFloat(document.getElementById('Pvmodult_Roof_Cost').value);
  else {
    window.scroll(0, findPos(document.getElementById('Pvmodult_Roof_Cost')));
    document.getElementById('Pvmodult_Roof_Cost').reportValidity()
    finish = false
    return;
  }

  if (document.getElementById('Pvmodult_Roof_Sum').value != '')
    Rooftop_Solar.Sum = parseFloat(document.getElementById('Pvmodult_Roof_Sum').value);
  else {
    window.scroll(0, findPos(document.getElementById('Pvmodult_Roof_Sum')));
    document.getElementById('Pvmodult_Roof_Sum').reportValidity()
    finish = false
    return;
  }
  finish = true
  let Roof_valid = RooftopInverter_insert()
  return Roof_valid
}

function FarmSolar_insert() {
  let DOC = document.getElementById('Farm_doc')
  let Lo_type = document.querySelector('input[name=Location_Farm_Type]:checked')
  let Pvmodult_Type = document.querySelector('input[name=Pvmodult_Farm_Type]:checked')
  Farm_Solar.ID = `FAS${thai_year}`
  if (DOC.value == '' || DOC.value == null) {
    window.scroll(0, findPos(document.getElementById('Farm_doc')));
    document.getElementById('Farm_doc').reportValidity()
    finish = false
    return;
  }

  if (Lo_type != null) {
    Farm_Solar.Location_Type = Lo_type.value;
  } else {
    window.scroll(0, findPos(document.querySelector('input[name=Location_Farm_Type]')));
    document.querySelector('input[name=Location_Farm_Type]').reportValidity()
    finish = false
    return;
  }

  if (Pvmodult_Type != null) {
    if (Pvmodult_Type.value != "อื่น ๆ") {
      Farm_Solar.Type = Pvmodult_Type.value;
    }
    else {
      if (document.getElementById('Pvmodult_Farm_Type_etc').value != '') {
        Farm_Solar.Type = document.getElementById('Pvmodult_Farm_Type_etc').value;
      } else {
        window.scroll(0, findPos(document.getElementById('Pvmodult_Farm_Type_etc')));
        document.getElementById('Pvmodult_Farm_Type_etc').reportValidity()
        finish = false
        return;
      }
    }
  } else {
    window.scroll(0, findPos(document.querySelector('input[name=Pvmodult_Farm_Type]')));
    document.querySelector('input[name=Pvmodult_Farm_Type]').reportValidity()
    finish = false
    return;
  }

  if (document.getElementById('Pvmodult_Farm_Model').value != '')
    Farm_Solar.Model = document.getElementById('Pvmodult_Farm_Model').value;
  else {
    window.scroll(0, findPos(document.getElementById('Pvmodult_Farm_Model')));
    document.getElementById('Pvmodult_Farm_Model').reportValidity()
    finish = false
    return;
  }

  if (document.getElementById('Pvmodult_Farm_Brand').value != '')
    Farm_Solar.Brand = document.getElementById('Pvmodult_Farm_Brand').value;
  else {
    window.scroll(0, findPos(document.getElementById('Pvmodult_Farm_Brand')));
    document.getElementById('Pvmodult_Farm_Brand').reportValidity()
    finish = false
    return;
  }

  if (document.getElementById('Pvmodult_Farm_Country').textContent != 'กรอกชื่อประเทศ')
    Farm_Solar.Country = document.getElementById('Pvmodult_Farm_Country').textContent;
  else {
    window.scroll(0, findPos(document.getElementById('Pvmodult_Farm_Country')));
    document.getElementById('Pvmodult_Farm_Country_input').reportValidity()
    finish = false
    return;
  }

  if (document.getElementById('Pvmodult_Farm_Capacity').value != '' && parseFloat(document.getElementById('Pvmodult_Farm_Capacity').value) <= 500)
    Farm_Solar.Capacity = parseFloat(document.getElementById('Pvmodult_Farm_Capacity').value);
  else {
    document.getElementById('Pvmodult_Farm_Capacity').value = ''
    window.scroll(0, findPos(document.getElementById('Pvmodult_Farm_Capacity')));
    document.getElementById('Pvmodult_Farm_Capacity').reportValidity()
    finish = false
    return;
  }

  if (document.getElementById('Pvmodult_Farm_Amount').value != '')
    Farm_Solar.Amount = parseInt(document.getElementById('Pvmodult_Farm_Amount').value);
  else {
    window.scroll(0, findPos(document.getElementById('Pvmodult_Farm_Amount')));
    document.getElementById('Pvmodult_Farm_Amount').reportValidity()
    finish = false
    return;
  }

  if (document.getElementById('Pvmodult_Farm_Cost').value != '')
    Farm_Solar.Cost = parseFloat(document.getElementById('Pvmodult_Farm_Cost').value);
  else {
    window.scroll(0, findPos(document.getElementById('Pvmodult_Farm_Cost')));
    document.getElementById('Pvmodult_Farm_Cost').reportValidity()
    finish = false
    return;
  }

  if (document.getElementById('Pvmodult_Farm_Sum').value != '')
    Farm_Solar.Sum = parseFloat(document.getElementById('Pvmodult_Farm_Sum').value);
  else {
    window.scroll(0, findPos(document.getElementById('Pvmodult_Farm_Sum')));
    document.getElementById('Pvmodult_Farm_Sum').reportValidity()
    finish = false
    return;
  }
  finish = true
  let Farm_valid = FarmInverter_insert()
  return Farm_valid
}

function FloatingSolar_insert() {
  let Solar_nb = []
  let Amount = document.getElementById('Floating_Amount').value
  if (Amount != '' && Amount != null) {
    let DOC = document.getElementById('Floating_DOC')
    if (DOC.value == null || DOC.value == "") {
      window.scroll(0, findPos(document.getElementById('Floating_DOC')));
      document.getElementById('Floating_DOC').reportValidity()
      finish = false
      return;
    }
    Floating_Solar.Pvmodult_ID = `FLS${thai_year}`
    for (let i = 0; i < Amount; i++) {
      let Solar = {}
      Solar.ID = `FLS${thai_year}`
      Solar.pool_number = parseInt(i+1)
      // let Pvmodult_Type = document.querySelector('input[name=Pvmodult_Roof_Type]:checked')
      if (document.querySelector('input[name=pool_detail]:checked') != null) {
        if (document.querySelector('input[name=pool_detail]:checked').value != "อื่น ๆ") {
          Solar.pool_detail = document.querySelector('input[name=pool_detail]:checked').value;
        }
        else {
          if (document.getElementById('pool_detail_etc').value != '') {
            Solar.pool_detail = document.getElementById('pool_detail_etc').value;
          } else {
            window.scroll(0, findPos(document.getElementById('pool_detail_etc')));
            document.getElementById('pool_detail_etc').reportValidity()
            finish = false
            return;
          }
        }
      } else {
        window.scroll(0, findPos(document.querySelector('input[name=pool_detail]')));
        document.querySelector('input[name=pool_detail]').reportValidity()
        finish = false
        return;
      }

      if (document.querySelector('input[name=water_detail]:checked') != null) {
        if (document.querySelector('input[name=water_detail]:checked').value != "อื่น ๆ") {
          Solar.water_detail = document.querySelector('input[name=water_detail]:checked').value;
        }
        else {
          if (document.getElementById('water_detail_etc').value != '') {
            Solar.water_detail = document.getElementById('water_detail_etc').value;
          } else {
            window.scroll(0, findPos(document.getElementById('water_detail_etc')));
            document.getElementById('water_detail_etc').reportValidity()
            finish = false
            return;
          }
        }
      } else {
        window.scroll(0, findPos(document.querySelector('input[name=water_detail]')));
        document.querySelector('input[name=water_detail]').reportValidity()
        finish = false
        return;
      }

      let floating_area = document.getElementById('floating_area').value
      let pool_area = document.getElementById('pool_area').value

      if (pool_area != '')
        Solar.pool_area = parseFloat(pool_area)
      else {
        window.scroll(0, findPos(document.getElementById('pool_area')));
        document.getElementById('pool_area').reportValidity()
        finish = false
        return;
      }

      if (floating_area != '' && parseFloat(floating_area) <= parseFloat(pool_area))
        Solar.floating_area = parseFloat(floating_area)
      else {
        document.getElementById('floating_area').value = ''
        window.scroll(0, findPos(document.getElementById('floating_area')));
        document.getElementById('floating_area').reportValidity()
        finish = false
        return;
      }

      if (document.getElementById('pool_percen').value != '')
        Solar.pool_percen = parseFloat(document.getElementById('pool_percen').value)
      else {
        window.scroll(0, findPos(document.getElementById('pool_percen')));
        document.getElementById('pool_percen').reportValidity()
        finish = false
        return;
      }

      if (document.querySelector('input[name=Pvmodult_Floating_Type]:checked') != null) {
        if (document.querySelector('input[name=Pvmodult_Floating_Type]:checked').value != "อื่น ๆ") {
          Solar.Type = document.querySelector('input[name=Pvmodult_Floating_Type]:checked').value;
        }
        else {
          if (document.getElementById('Pvmodult_Floating_Type_etc').value != '') {
            Solar.Type = document.getElementById('Pvmodult_Floating_Type_etc').value;
          } else {
            window.scroll(0, findPos(document.getElementById('Pvmodult_Floating_Type_etc')));
            document.getElementById('Pvmodult_Floating_Type_etc').reportValidity()
            finish = false
            return;
          }
        }
      } else {
        window.scroll(0, findPos(document.querySelector('input[name=Pvmodult_Floating_Type]')));
        document.querySelector('input[name=Pvmodult_Floating_Type]').reportValidity()
        finish = false
        return;
      }

      if (document.getElementById('Pvmodult_Floating_Model').value != '')
        Solar.Model = document.getElementById('Pvmodult_Floating_Model').value
      else {
        window.scroll(0, findPos(document.getElementById('Pvmodult_Floating_Model')));
        document.getElementById('Pvmodult_Floating_Model').reportValidity()
        finish = false
        return;
      }

      if (document.getElementById('Pvmodult_Floating_Brand').value != '')
        Solar.Brand = document.getElementById('Pvmodult_Floating_Brand').value
      else {
        window.scroll(0, findPos(document.getElementById('Pvmodult_Floating_Brand')));
        document.getElementById('Pvmodult_Floating_Brand').reportValidity()
        finish = false
        return;
      }

      if (document.getElementById('Pvmodult_Floating_Country').textContent != 'กรอกชื่อประเทศ')
        Solar.Country = document.getElementById('Pvmodult_Floating_Country').textContent;
      else {
        window.scroll(0, findPos(document.getElementById('Pvmodult_Floating_Country_input')));
        document.getElementById('Pvmodult_Floating_Country_input').reportValidity()
        finish = false
        return;
      }

      if (document.getElementById('Pvmodult_Floating_Capacity').value != '' && parseFloat(document.getElementById('Pvmodult_Floating_Capacity').value) <= 500)
        Solar.Capacity = parseFloat(document.getElementById('Pvmodult_Floating_Capacity').value)
      else {
        document.getElementById('Pvmodult_Floating_Capacity').value = ""
        window.scroll(0, findPos(document.getElementById('Pvmodult_Floating_Capacity')));
        document.getElementById('Pvmodult_Floating_Capacity').reportValidity()
        finish = false
        return;
      }

      if (document.getElementById('Pvmodult_Floating_Cost').value != '')
        Solar.Cost = parseFloat(document.getElementById('Pvmodult_Floating_Cost').value)
      else {
        window.scroll(0, findPos(document.getElementById('Pvmodult_Floating_Cost')));
        document.getElementById('Pvmodult_Floating_Cost').reportValidity()
        finish = false
        return;
      }

      if (document.getElementById(`Pvmodult_Floating_Amount_${i + 1}`).value != '')
        Solar.Amount = parseFloat(document.getElementById(`Pvmodult_Floating_Amount_${i + 1}`).value)
      else {
        window.scroll(0, findPos(document.getElementById(`Pvmodult_Floating_Amount_${i + 1}`)));
        document.getElementById(`Pvmodult_Floating_Amount_${i + 1}`).reportValidity()
        finish = false
        return;
      }

      if (document.getElementById(`Pvmodult_Floating_Sum_${i + 1}`).value != '')
        Solar.Sum = parseFloat(document.getElementById(`Pvmodult_Floating_Sum_${i + 1}`).value)
      else {
        window.scroll(0, findPos(document.getElementById(`Pvmodult_Floating_Amount_${i + 1}`)));
        document.getElementById(`Pvmodult_Floating_Amount_${i + 1}`).reportValidity()
        finish = false
        return;
      }
      Solar_nb.push(Solar)
    }
    Floating_Solar = Solar_nb
    Floating_valid = FloatingInverter_insert()
    finish = true
    return Floating_valid
  } else {
    window.scroll(0, findPos(document.getElementById('Floating_Amount')));
    document.getElementById('Floating_Amount').reportValidity()
    finish = false
    return;
  }
}

function RooftopInverter_insert() {
  Rooftop_Inverter.ID = `RTI${thai_year}`
  if (document.getElementById('Inverter_Roof_Model').value != '')
    Rooftop_Inverter.Model = document.getElementById('Inverter_Roof_Model').value;
  else {
    window.scroll(0, findPos(document.getElementById('Inverter_Roof_Model')));
    document.getElementById('Inverter_Roof_Model').reportValidity()
    finish = false
    return;
  }

  if (document.getElementById('Inverter_Roof_Brand').value != '')
    Rooftop_Inverter.Brand = document.getElementById('Inverter_Roof_Brand').value;
  else {
    window.scroll(0, findPos(document.getElementById('Inverter_Roof_Brand')));
    document.getElementById('Inverter_Roof_Brand').reportValidity()
    finish = false
    return;
  }

  if (document.getElementById('Inverter_Roof_Country').textContent != 'กรอกชื่อประเทศ')
    Rooftop_Inverter.Country = document.getElementById('Inverter_Roof_Country').textContent;
  else {
    window.scroll(0, findPos(document.getElementById('Inverter_Roof_Country')));
    document.getElementById('Inverter_Roof_Country_input').reportValidity()
    finish = false
    return;
  }

  if (document.getElementById('Inverter_Roof_Capacity').value != '')
    Rooftop_Inverter.Capacity = parseFloat(document.getElementById('Inverter_Roof_Capacity').value);
  else {
    window.scroll(0, findPos(document.getElementById('Inverter_Roof_Capacity')));
    document.getElementById('Inverter_Roof_Capacity').reportValidity()
    finish = false
    return;
  }

  if (document.getElementById('Inverter_Roof_Amount').value != '')
    Rooftop_Inverter.Amount = parseInt(document.getElementById('Inverter_Roof_Amount').value);
  else {
    window.scroll(0, findPos(document.getElementById('Inverter_Roof_Amount')));
    document.getElementById('Inverter_Roof_Amount').reportValidity()
    finish = false
    return;
  }

  if (document.getElementById('Inverter_Roof_Cost').value != '')
    Rooftop_Inverter.Cost = parseFloat(document.getElementById('Inverter_Roof_Cost').value);
  else {
    window.scroll(0, findPos(document.getElementById('Inverter_Roof_Cost')));
    document.getElementById('Inverter_Roof_Cost').reportValidity()
    finish = false
    return;
  }

  if (document.getElementById('Inverter_Roof_Sum').value != '')
    Rooftop_Inverter.Sum = parseFloat(document.getElementById('Inverter_Roof_Sum').value);
  else {
    window.scroll(0, findPos(document.getElementById('Inverter_Roof_Sum')));
    document.getElementById('Inverter_Roof_Sum').reportValidity()
    finish = false
    return;
  }
  finish = true
  let Roof_valid = LocationRooftop_insert()
  return Roof_valid
}

function FarmInverter_insert() {
  // console.log('Farm call')
  Farm_Inverter.ID = `FAI${thai_year}`
  if (document.getElementById('Inverter_Farm_Model').value != '')
    Farm_Inverter.Model = document.getElementById('Inverter_Farm_Model').value;
  else {
    window.scroll(0, findPos(document.getElementById('Inverter_Farm_Model')));
    document.getElementById('Inverter_Farm_Model').reportValidity()
    finish = false
    return;
  }

  if (document.getElementById('Inverter_Farm_Brand').value != '')
    Farm_Inverter.Brand = document.getElementById('Inverter_Farm_Brand').value;
  else {
    window.scroll(0, findPos(document.getElementById('Inverter_Farm_Brand')));
    document.getElementById('Inverter_Farm_Brand').reportValidity()
    finish = false
    return;
  }

  if (document.getElementById('Inverter_Farm_Country').textContent != 'กรอกชื่อประเทศ')
    Farm_Inverter.Country = document.getElementById('Inverter_Farm_Country').textContent;
  else {
    window.scroll(0, findPos(document.getElementById('Inverter_Farm_Country')));
    document.getElementById('Inverter_Farm_Country_input').reportValidity()
    finish = false
    return;
  }

  if (document.getElementById('Inverter_Farm_Capacity').value != '')
    Farm_Inverter.Capacity = parseFloat(document.getElementById('Inverter_Farm_Capacity').value);
  else {
    window.scroll(0, findPos(document.getElementById('Inverter_Farm_Capacity')));
    document.getElementById('Inverter_Farm_Capacity').reportValidity()
    finish = false
    return;
  }

  if (document.getElementById('Inverter_Farm_Amount').value != '')
    Farm_Inverter.Amount = parseInt(document.getElementById('Inverter_Farm_Amount').value);
  else {
    window.scroll(0, findPos(document.getElementById('Inverter_Farm_Amount')));
    document.getElementById('Inverter_Farm_Amount').reportValidity()
    finish = false
    return;
  }

  if (document.getElementById('Inverter_Farm_Cost').value != '')
    Farm_Inverter.Cost = parseFloat(document.getElementById('Inverter_Farm_Cost').value);
  else {
    window.scroll(0, findPos(document.getElementById('Inverter_Farm_Cost')));
    document.getElementById('Inverter_Farm_Cost').reportValidity()
    finish = false
    return;
  }

  if (document.getElementById('Inverter_Farm_Sum').value != '')
    Farm_Inverter.Sum = parseFloat(document.getElementById('Inverter_Farm_Sum').value);
  else {
    window.scroll(0, findPos(document.getElementById('Inverter_Farm_Sum')));
    document.getElementById('Inverter_Farm_Sum').reportValidity()
    finish = false
    return;
  }
  finish = true
  let Farm_valid = LocationFarm_insert()
  return Farm_valid
}

function FloatingInverter_insert() {
  Floating_Inverter.ID = `FLI${thai_year}`
  if (document.getElementById('Inverter_Floating_Model').value != '')
    Floating_Inverter.Model = document.getElementById('Inverter_Floating_Model').value;
  else {
    window.scroll(0, findPos(document.getElementById('Inverter_Floating_Model')));
    document.getElementById('Inverter_Floating_Model').reportValidity()
    finish = false
    return;
  }

  if (document.getElementById('Inverter_Floating_Brand').value != '')
    Floating_Inverter.Brand = document.getElementById('Inverter_Floating_Brand').value;
  else {
    window.scroll(0, findPos(document.getElementById('Inverter_Floating_Brand')));
    document.getElementById('Inverter_Floating_Brand').reportValidity()
    finish = false
    return;
  }

  if (document.getElementById('Inverter_Floating_Country').textContent != 'กรอกชื่อประเทศ')
    Floating_Inverter.Country = document.getElementById('Inverter_Floating_Country').textContent;
  else {
    window.scroll(0, findPos(document.getElementById('Inverter_Floating_Country')));
    document.getElementById('Inverter_Floating_Country_input').reportValidity()
    finish = false
    return;
  }

  if (document.getElementById('Inverter_Floating_Capacity').value != '')
    Floating_Inverter.Capacity = parseFloat(document.getElementById('Inverter_Floating_Capacity').value);
  else {
    window.scroll(0, findPos(document.getElementById('Inverter_Floating_Capacity')));
    document.getElementById('Inverter_Floating_Capacity').reportValidity()
    finish = false
    return;
  }

  if (document.getElementById('Inverter_Floating_Amount').value != '')
    Floating_Inverter.Amount = parseInt(document.getElementById('Inverter_Floating_Amount').value);
  else {
    window.scroll(0, findPos(document.getElementById('Inverter_Floating_Amount')));
    document.getElementById('Inverter_Floating_Amount').reportValidity()
    finish = false
    return;
  }

  if (document.getElementById('Inverter_Floating_Cost').value != '')
    Floating_Inverter.Cost = parseFloat(document.getElementById('Inverter_Floating_Cost').value);
  else {
    window.scroll(0, findPos(document.getElementById('Inverter_Floating_Cost')));
    document.getElementById('Inverter_Floating_Cost').reportValidity()
    finish = false
    return;
  }

  if (document.getElementById('Inverter_Floating_Sum').value != '')
    Floating_Inverter.Sum = parseFloat(document.getElementById('Inverter_Floating_Sum').value);
  else {
    window.scroll(0, findPos(document.getElementById('Inverter_Floating_Sum')));
    document.getElementById('Inverter_Floating_Sum').reportValidity()
    finish = false
    return;
  }
  finish = true
  Floating_valid = LocationFloating_insert()
  return Floating_valid
}

function LocationRooftop_insert() {
  Location_Rooftop.Location_ID = `LRT${thai_year}`
  Location_Rooftop.Solar_ID = Rooftop_Solar.ID
  Location_Rooftop.Inverter_ID = Rooftop_Inverter.ID
  Location_Rooftop.DOC = document.getElementById('Rooftop_doc').value
  Roof_valid = true
  return Roof_valid
}

function LocationFarm_insert() {
  Location_Farm.Location_ID = `LFA${thai_year}`
  Location_Farm.Solar_ID = Farm_Solar.ID
  Location_Farm.Inverter_ID = Farm_Inverter.ID
  Location_Farm.DOC = document.getElementById('Farm_doc').value
  Farm_valid = true
  return Farm_valid
}

function LocationFloating_insert() {
  Location_Floating.Location_ID = `LFL${thai_year}`
  Location_Floating.Solar_ID = `FLS${thai_year}`
  Location_Floating.Inverter_ID = Floating_Inverter.ID
  Location_Floating.DOC = document.getElementById('Floating_DOC').value
  Floating_valid = true
  return Floating_valid
}

function ESS_insert() {
  let ess = document.querySelector('input[name=have-ess]:checked')
  if (ess != null) {
    ESS.ID = `ESS${thai_year}`
    if (document.getElementById('ESS_doc').value != null && document.getElementById('ESS_doc').value != '')
      ESS.DOC = document.getElementById('ESS_doc').value;
    else {
      window.scroll(0, findPos(document.getElementById('ESS_doc')));
      document.getElementById('ESS_doc').reportValidity()
      finish = false
      return;
    }

    if (document.getElementById('ESS_Model').value != '')
      ESS.Model = document.getElementById('ESS_Model').value;
    else {
      window.scroll(0, findPos(document.getElementById('ESS_Model')));
      document.getElementById('ESS_Model').reportValidity()
      finish = false
      return;
    }

    if (document.getElementById('ESS_Brand').value != '')
      ESS.Brand = document.getElementById('ESS_Brand').value;
    else {
      window.scroll(0, findPos(document.getElementById('ESS_Brand')));
      document.getElementById('ESS_Brand').reportValidity()
      finish = false
      return;
    }

    if (document.getElementById('ESS_Country').textContent != 'กรอกชื่อประเทศ')
      ESS.Country = document.getElementById('ESS_Country').textContent;
    else {
      window.scroll(0, findPos(document.getElementById('ESS_Country')));
      document.getElementById('ESS_Country_input').reportValidity()
      finish = false
      return;
    }

    if (document.getElementById('ESS_Capacity').value != '')
      ESS.Capacity = parseFloat(document.getElementById('ESS_Capacity').value)
    else {
      window.scroll(0, findPos(document.getElementById('ESS_Capacity')));
      document.getElementById('ESS_Capacity').reportValidity()
      finish = false
      return;
    }

    if (document.getElementById('ESS_Amount').value != '')
      ESS.Amount = parseInt(document.getElementById('ESS_Amount').value)
    else {
      window.scroll(0, findPos(document.getElementById('ESS_Amount')));
      document.getElementById('ESS_Amount').reportValidity()
      finish = false
      return;
    }

    if (document.getElementById('ESS_Sum').value != '')
      ESS.Sum = parseFloat(document.getElementById('ESS_Sum').value)
    else {
      window.scroll(0, findPos(document.getElementById('ESS_Sum')));
      document.getElementById('ESS_Sum').reportValidity()
      finish = false
      return;
    }
  }
  finish = true
  return true
}

function Equipment_insert() {
  let Amount = document.querySelectorAll('.etc-input')
  Equipment.length = 0
  if (Amount.length > 1) {
    for (let i = 1; i < Amount.length; i++) {
      let ETC = {}
      if (Amount[i].value != null || Amount[i].value != '') {
        ETC.ID = `EQP${thai_year}`
        ETC.Descript = Amount[i].value;
      }
      else {
        window.scroll(0, findPos(Amount[i]));
        Amount[i].reportValidity()
        finish = false
        return;
      }
      Equipment.push(ETC)
    }
  }
  finish = true
  return true
}

function Tools_insert() {
  Tools.id = `T${thai_year}`
  Tools.Product_ID = Product_detail.ID
  Tools.Location_Rooftop_ID = Location_Rooftop.Location_ID
  Tools.Location_Farm_ID = Location_Farm.Location_ID
  Tools.Location_Floating_ID = Location_Floating.Location_ID
  Tools.ESS_ID = ESS.ID
  Tools.Equipment_ID = `EQP${thai_year}`
  Tools.Pvmodult_Total = parseFloat(Project_Total.value)
  Tools.Inverter_Total = parseFloat(Project_ivt_Total.value)
}

function ESA_insert() {
  let esa = document.getElementsByClassName('ESA')
  if (esa[0].style['pointer-events'] == 'auto') {
    ESA.ID = `ESA${thai_year}`
    if (document.getElementById('ESA_Name').value != '')
      ESA.Name = document.getElementById('ESA_Name').value;
    else {
      window.scroll(0, findPos(document.getElementById('ESA_Name')));
      document.getElementById('ESA_Name').reportValidity()
      finish = false
      return;
    }

    if (document.getElementById('ESA_Consult').value != '')
      ESA.Consult = document.getElementById('ESA_Consult').value;
    else {
      window.scroll(0, findPos(document.getElementById('ESA_Consult')));
      document.getElementById('ESA_Consult').reportValidity()
      finish = false
      return;
    }

    if (document.getElementById('ESA_Study').value != '')
      ESA.Study = document.getElementById('ESA_Study').value;
    else {
      window.scroll(0, findPos(document.getElementById('ESA_Study')));
      document.getElementById('ESA_Study').reportValidity()
      finish = false
      return;
    }

    if (document.getElementById('ESA_Complete').value != '')
      ESA.Complete = document.getElementById('ESA_Complete').value;
    else {
      window.scroll(0, findPos(document.getElementById('ESA_Complete')));
      document.getElementById('ESA_Complete').reportValidity()
      finish = false
      return;
    }
    finish = true
  }
}

function InvestmentDetail_insert() {
  Investment_Detail.ID = `IVM${thai_year}`
  if (document.getElementById('EPC_Name').value != '')
    Investment_Detail.EPC_Name = document.getElementById('EPC_Name').value;
  else {
    window.scroll(0, findPos(document.getElementById('EPC_Name')));
    document.getElementById('EPC_Name').reportValidity()
    finish = false
    return;
  }
  if (document.getElementById('Construction_Cost').value != '') {
    Investment_Detail.Construction_Cost = parseFloat(document.getElementById('Construction_Cost').value);
  }
  else {
    window.scroll(0, findPos(document.getElementById('Construction_Cost')));
    document.getElementById('Construction_Cost').reportValidity()
    finish = false
    return;
  }

  Investment_Detail.Machine_Pvmodule = parseFloat(document.getElementById('Machine_Pvmodule').value)
  Investment_Detail.Machine_Inverter = parseFloat(document.getElementById('Machine_Inverter').value);

  if (document.getElementById('Machine_ESS').value != '')
    Investment_Detail.Machine_ESS = parseFloat(document.getElementById('Machine_ESS').value);
  else {
    window.scroll(0, findPos(document.getElementById('Machine_ESS')));
    document.getElementById('Machine_ESS').reportValidity()
    finish = false
    return;
  }

  if (document.getElementById('Machine_Equipment').value != '')
    Investment_Detail.Machine_Equipment = parseFloat(document.getElementById('Machine_Equipment').value);
  else {
    window.scroll(0, findPos(document.getElementById('Machine_Equipment')));
    document.getElementById('Machine_Equipment').reportValidity()
    finish = false
    return;
  }

  Investment_Detail.Machine_Info = parseFloat(document.getElementById('Machine_Info').value);

  if (document.getElementById('Machine_Setup').value != '')
    Investment_Detail.Machine_Setup = parseFloat(document.getElementById('Machine_Setup').value);
  else {
    window.scroll(0, findPos(document.getElementById('Machine_Setup')));
    document.getElementById('Machine_Setup').reportValidity()
    finish = false
    return;
  }

  if (document.getElementById('Machine_Trial').value != '')
    Investment_Detail.Machine_Trial = parseFloat(document.getElementById('Machine_Trial').value);
  else {
    window.scroll(0, findPos(document.getElementById('Machine_Trial')));
    document.getElementById('Machine_Trial').reportValidity()
    finish = false
    return;
  }

  if (document.getElementById('Expenses').value != '')
    Investment_Detail.Expenses = parseFloat(document.getElementById('Expenses').value);
  else {
    window.scroll(0, findPos(document.getElementById('Expenses')));
    document.getElementById('Expenses').reportValidity()
    finish = false
    return;
  }

  if (document.getElementById('Asset').value != '')
    Investment_Detail.Asset = parseFloat(document.getElementById('Asset').value);
  else {
    window.scroll(0, findPos(document.getElementById('Asset')));
    document.getElementById('Asset').reportValidity()
    finish = false
    return;
  }

  if (document.getElementById('Land_Value').value != '')
    Investment_Detail.Land_Value = parseFloat(document.getElementById('Land_Value').value);
  else {
    window.scroll(0, findPos(document.getElementById('Land_Value')));
    document.getElementById('Land_Value').reportValidity()
    finish = false
    return;
  }

  if (document.getElementById('Academic').value != '')
    Investment_Detail.Academic = parseFloat(document.getElementById('Academic').value);
  else {
    window.scroll(0, findPos(document.getElementById('Academic')));
    document.getElementById('Academic').reportValidity()
    finish = false
    return;
  }

  if (document.getElementById('Circulation').value != '')
    Investment_Detail.Circulation = parseFloat(document.getElementById('Circulation').value);
  else {
    window.scroll(0, findPos(document.getElementById('Circulation')));
    document.getElementById('Circulation').reportValidity()
    finish = false
    return;
  }

  if (document.getElementById('Result').value != '')
    Investment_Detail.Result = parseFloat(document.getElementById('Result').value);
  else {
    window.scroll(0, findPos(document.getElementById('Result')));
    document.getElementById('Result').reportValidity()
    finish = false
    return;
  }
  finish = true
  return true
}

function SYSPlan_insert() {
  System_installation_plan.ID = `SIP${thai_year}`
  if (document.getElementById('Plan_Survey').value != '')
    System_installation_plan.Survey = document.getElementById('Plan_Survey').value;
  else {
    window.scroll(0, findPos(document.getElementById('Plan_Survey')));
    document.getElementById('Plan_Survey').reportValidity()
    finish = false
    return;
  }

  if (document.getElementById('Plan_Procurement').value != '')
    System_installation_plan.Procurement = document.getElementById('Plan_Procurement').value;
  else {
    window.scroll(0, findPos(document.getElementById('Plan_Procurement')));
    document.getElementById('Plan_Procurement').reportValidity()
    finish = false
    return;
  }

  if (document.getElementById('Plan_installation').value != '')
    System_installation_plan.installation = document.getElementById('Plan_installation').value;
  else {
    window.scroll(0, findPos(document.getElementById('Plan_installation')));
    document.getElementById('Plan_installation').reportValidity()
    finish = false
    return;
  }

  if (document.getElementById('Plan_COD').value != '')
    System_installation_plan.COD = document.getElementById('Plan_COD').value;
  else {
    window.scroll(0, findPos(document.getElementById('Plan_COD')));
    document.getElementById('Plan_COD').reportValidity()
    finish = false
    return;
  }
  finish = true
  return true
}

function Plans_insert() {
  Plans.ID = `P${thai_year}`
  if (Rooftop_Solar.Pvmodult_Sum > 1 || Farm_Solar.Pvmodult_Sum > 1 || Floating_Solar.Pvmodult_Sum > 1) {
    Plans.ESA_ID = ESA.ID
  }
  Plans.System_Installation_Plan_ID = System_installation_plan.ID
}

function SolarRequest_insert() {
  Solar_Request.ProductDetail_ID = Product_detail.ID
  Solar_Request.InvestmentDetail_ID = Investment_Detail.ID
  Solar_Request.Plans_ID = Plans.ID
  Solar_Request.User_ID = ID
  Solar_Request.Submit_Time = date_checked()
}

function date_checked() {
  let today = new Date()
  let year = today.getFullYear()
  let month
  let day
  let hours
  let minute
  let second
  if (parseInt(today.getMonth() + 1) < 10) {
    month = `0${today.getMonth() + 1}`
  } else month = `${today.getMonth() = 1}`;

  if (parseInt(today.getDate()) < 10) {
    day = `0${today.getDate()}`
  } else day = `${today.getDate()}`;

  if (parseInt(today.getHours()) < 10) {
    hours = `0${today.getHours()}`
  } else hours = `${today.getHours()}`

  if (parseInt(today.getMinutes()) < 10) {
    minute = `0${today.getMinutes()}`
  } else minute = `${today.getMinutes()}`

  if (parseInt(today.getSeconds()) < 10) {
    second = `0${today.getSeconds()}`
  } else second = `${today.getSeconds()}`
  date = `${year}-${month}-${day} ${hours}:${minute}:${second}`
  return date
}

function findPos(obj) {
  var curtop = -20;
  if (obj.offsetParent) {
    do {
      curtop += obj.offsetTop;
    } while (obj = obj.offsetParent);
    return [curtop];
  }
}

function SendValue() {
  $.ajax({
    type: "POST",
    url: "User_insert.php",
    data: {
      Product_detail: Product_detail,
      Rooftop_Solar: Rooftop_Solar,
      Rooftop_Inverter: Rooftop_Inverter,
      Location_Rooftop: Location_Rooftop,
      Farm_Solar: Farm_Solar,
      Farm_Inverter: Farm_Inverter,
      Location_Farm: Location_Farm,
      Floating_Solar: Floating_Solar,
      Floating_Inverter: Floating_Inverter,
      Location_Floating: Location_Floating,
      ESS: ESS,
      Equipment: Equipment,
      Tools: Tools,
      Investment_Detail: Investment_Detail,
      System_installation_plan: System_installation_plan,
      ESA: ESA,
      Plans: Plans,
      Solar_Request: Solar_Request, 
    },
    cache: false,
    success: function (data) {
      console.log(data)
    },
    error: function (xhr, status, error) {
      alert("มีอะไรผิด")
    }
  });
}
