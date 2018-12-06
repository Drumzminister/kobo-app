$('.customer').select2({
    placeholder: 'Select an item',
    ajax: {
      url: 'getCustomers',
      dataType: 'json',
      delay: 250,
      processResults: function (data) {
        return {
          results:  $.map(data, function (customer) {
                return {
                    text: customer.first_name,
                    id: customer.id

                }
            })
        };
      },
      cache: true
    }
  });

function addRow(){
    let table = document.querySelector(".tbodyRow");
    let tr = document.createElement('tr');
    tr.classList.add("tbodyRow");
      let td1 = document.createElement('td');
      let td2 = document.createElement('td');
    let td3 = document.createElement('td');
    let td4 = document.createElement('td');
      let td5 = document.createElement('td');
    let td6 = document.createElement('td');
    let td7 = document.createElement('td');
    let new1 = $(td7).html("<span><button onclick='removeRow()'  type='button' class='btn btn-danger btn-rounded btn-sm my-0'>Remove</button></span>");
    td1.classList.add("pt-3-half");
    td1.setAttribute("contenteditable", "true");
    td2.classList.add("pt-3-half");
    td2.setAttribute("contenteditable", "true");
    td3.classList.add("pt-3-half");
    td3.setAttribute("contenteditable", "true");
    td4.classList.add("pt-3-half");
    td4.setAttribute("contenteditable", "true");
    td5.classList.add("pt-3-half");
    td5.setAttribute("contenteditable", "true");
    td6.classList.add("pt-3-half");
    td6.setAttribute("contenteditable", "true");
      tr.appendChild(td1);
      tr.appendChild(td2);
    tr.appendChild(td3);
    tr.appendChild(td4);
      tr.appendChild(td5);
    tr.appendChild(td6);
    tr.appendChild(td7);
      table.appendChild(tr);
  }
  

function removeRow() {
    $("#tbodyRow").remove(0);
}