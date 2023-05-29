fetch("libs/php/Q3.php", {
    method: 'GET',
}).then((response) => {
        if (!response.ok) {
        throw Error(response.statusText);
        }
        return response;
}).then((response) => response.json())
  .then((data) => {
    console.log("Q3")
    console.log(data)
    document.getElementById("q3_provider").innerText = data[0].provider
    document.getElementById("q3_sum").innerText = data[0].sum

  })

  fetch("libs/php/Q4.php", {
    method: 'GET',
}).then((response) => {
        if (!response.ok) {
        throw Error(response.statusText);
        }
        return response;
}).then((response) => response.json())
  .then((data) => {
    console.log("Q4")
    console.log(data)
    document.getElementById("q4_client").innerText = data[0].reference
    document.getElementById("q4_sum").innerText = data[0].sum

  })

  fetch("libs/php/Q5.php", {
    method: 'GET',
}).then((response) => {
        if (!response.ok) {
        throw Error(response.statusText);
        }
        return response;
}).then((response) => response.json())
  .then((data) => {
    console.log("Q5")
    console.log(data)
    answer = `<tr>
    <td class="fw-bold">Family</td>
    <td class="fw-bold">Value</td>
    <td class="fw-bold">Generation</td>
    <td class="fw-bold">members</td>
</tr>`
    for(let i = 0; i< data.length;i++){
      let string = "<tr><td>"
      string += data[i].last_name +"</td><td>"
      string += data[i].val +"</td><td>"
      string += data[i].generation +"</td><td>"
      string += data[i].members +"</td></tr>"
      answer += string
    }

    document.getElementById("q5_table").innerHTML = answer
  })

  fetch("libs/php/Q6.php", {
    method: 'GET',
}).then((response) => {
        if (!response.ok) {
        throw Error(response.statusText);
        }
        return response;
}).then((response) => response.json())
  .then((data) => {
    console.log("Q6")
    console.log(data)
    document.getElementById("q6").innerText = data[0].median_val
  })

  fetch("libs/php/Q7.php", {
    method: 'GET',
}).then((response) => {
        if (!response.ok) {
        throw Error(response.statusText);
        }
        return response;
}).then((response) => response.json())
  .then((data) => {
    console.log("Q7")
    console.log(data)
    document.getElementById("q7").innerText = data[0].sum
  })

  fetch("libs/php/Q8.php", {
    method: 'GET',
}).then((response) => {
        if (!response.ok) {
        throw Error(response.statusText);
        }
        return response;
}).then((response) => response.json())
  .then((data) => {
    console.log("Q8")
    console.log(data)
    document.getElementById("q8_month").innerText = data[0].month
    document.getElementById("q8_sum").innerText = data[0].sum

  })

  fetch("libs/php/Q9.php", {
    method: 'GET',
}).then((response) => {
        if (!response.ok) {
        throw Error(response.statusText);
        }
        return response;
}).then((response) => response.json())
  .then((data) => {
    console.log("Q9")
    console.log(data)
    document.getElementById("q9_month").innerText = data[0].month
    document.getElementById("q9_sum").innerText = data[0].sum

  })

  fetch("libs/php/Q10.php", {
    method: 'GET',
}).then((response) => {
        if (!response.ok) {
        throw Error(response.statusText);
        }
        return response;
}).then((response) => response.json())
  .then((data) => {
    console.log("Q10")
    console.log(data)

    document.getElementById("q10_reference").innerText = data[0].reference
    document.getElementById("q10_increase").innerText = data[0].increase +"%"

  })

  var btns = document.getElementsByClassName("sql_btn")
  for(let i = 0; i < btns.length; i++){
    btns[i].addEventListener("click", e=> {
      let img = `./libs/sql/${e.target.value}.png`
      document.getElementById("sql_code").src = img
    })
  }