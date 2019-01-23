//Drop down of items

function calculateSum (row)
{
  let sum = 0;
  let sales_quantity = row.querySelector('.sales_quantity').value;
  let sales_price = row.querySelector('.sales_price').value;
  sales_total = sales_quantity * sales_price;
  sum = parseFloat(sales_total);
  row.querySelector('.sales_total').value = sum;
  document.querySelector("#total").value = total();
}

function addRow()
{
  let tableRow = document.querySelector("#salesTable"); 
  let row = document.createElement('tr');
  
  //Inventory
  let td1 = document.createElement('td');
  let option = document.createElement('option');
  let selected = document.createElement('select');
  td1.id = "inventory";
  selected.setAttribute("class", "search form-control");
  option.setAttribute("selected", "Pick Product Name");

  axios.get('/getInventory').then(function(response){
    let data = response.data;
    for(i = 0; i < data.length; i++) {
    let options2 = document.createElement("option");
    options2.setAttribute("value", data[i].id);
    options2.innerHTML = data[i].name;
    selected.appendChild(options2);
    }
  }); 
  selected.appendChild(option);
  td1.appendChild(selected);

  //Description
  let td2 = document.createElement('td');
  let input2 = document.createElement("input");
  input2.type = "text";
  input2.id = "sales_description";
  input2.setAttribute("class", "form-control");
  td2.appendChild(input2);

  //quantity
  let td3 = document.createElement('td');
  let input3 = document.createElement("input");
  input3.type = "number";
  input3.setAttribute("class", "form-control sales_quantity");
  input3.addEventListener("keyup", function(){
    calculateSum(row);
  });
  td3.appendChild(input3);

  //price
  let td4 = document.createElement('td');
  let input4 = document.createElement("input");
  input4.type = "number";
  input4.setAttribute("class", "form-control sales_price");
  input4.addEventListener("keyup", function(){
    calculateSum(row);
    document.querySelector("#total").value = total();
  });
  td4.appendChild(input4);

  //Total price
  let td5 = document.createElement('td');
  let input5 = document.createElement("input");
  input5.input = "text";
  input5.setAttribute("class", "form-control sales_total");  
  input5.disabled = true;
  td5.appendChild(input5);


  //channels
  let td6 = document.createElement('td');
  let option6 = document.createElement('option');
  let selected6 = document.createElement('select');
  td6.id = "inventory";
  selected.setAttribute("class", "search form-control");
  option6.setAttribute("selected", "Pick Product Name");

  axios.get('/getSalesChannels').then(function(response) {
    var data = response.data;
    for (i = 0; i < data.length; i++) { 
      let options = document.createElement('option');
      options.setAttribute("value", data[i].id);
      options.innerText = data[i].name;
      selected6.appendChild(options);
    }
  });

  td6.appendChild(selected6);
  td6.appendChild(selected6);

  //Delete button
  let td7 = document.createElement('td');
  let i = document.createElement("i");
  i.id = "delete";
  i.setAttribute("class", "fa fa-trash-o");
  td7.addEventListener("click", function(){
    deleteRow(row);
  });
  td7.appendChild(i);

  row.innerHTML = "";
  row.appendChild(td1);  
  row.appendChild(td2);
  row.appendChild(td3);
  row.appendChild(td4);
  row.appendChild(td5);
  row.appendChild(td6);
  row.appendChild(td7);  
  tableRow.appendChild(row);
}

//delete action
let delButton = document.querySelector('#delete').style.cursor = "pointer";
function deleteRow(row)
{
  swal({
    title: "Are you sure?",
    text: "You are trying to delete this entry",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  }).then((willDelete) => {
    if(willDelete) {
      row.style.display = "none";
    }
  });
}


function total()
{
  let sum = document.querySelectorAll('.sales_total');
  let total = 0;
  sum.forEach(input => {
    total += Number(input.value);
  });
  return total;
}

function saveSales()
{
        let token = document.querySelector('meta[name="csrf-token"]').content;
        let tableRow = document.querySelectorAll('#salesTable');
        tableRow.forEach(tr => {
        let sales_date = tr.querySelector('.sales_date').value;
        let discount = tr.querySelector('.discount').value;
        let total = tr.querySelector('.sales_total').value;
        let invoice_number = "IVO-213";
        let tax_id = tr.querySelector('.tax').value;
        let customer_id = tr.querySelector('.customer').value;
        let description = tr.querySelector('.sales_description').value;
        let quantity = tr.querySelector('.sales_quantity').value;
        let price = tr.querySelector('.sales_price').value;
        let payment_mode_id = tr.querySelectorAll('.payment_mode').value;
        let sales_channel_id = tr.querySelector('.sales_channel').value;
        let inventory_id = tr.querySelector('.inventory').value;

        if( description.trim() &&
            quantity.trim() &&
            price.trim() &&
            total.trim() &&
            tax_id.trim()
        )
        {
            let formData = new FormData();
            formData.append('_token', token);
            formData.append('sales_date', sales_date);
            formData.append('description', description);
            formData.append('quantity', quantity);
            formData.append('inventory', inventory_id);
            formData.append('sales_channel', sales_channel_id);
            formData.append('invoice_number', invoice_number);
            formData.append('customer_id', customer_id);
            formData.append('discount', discount);
            formData.append('tax_id', tax_id);
            formData.append('sales_total', sales_total);
            formData.append('payment_mode', payment_mode_id);


            axios.post('/sales/create', formData).then(response => {
                swal('Saved', response.data, 'Data Saved Successfully');
                // console.log(response.data.mess)
            }).catch(error => {
                swal('Sorry', response.data, 'Input missing');
            });
        }
    });
}
