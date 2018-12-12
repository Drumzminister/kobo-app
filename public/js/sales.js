//Drop down of items
$('.search').select2();

function calculateSum (row)
{
  let sum = 0;
  let sales_quantity = document.querySelector('.sales_quantity').value;
  let sales_price = document.querySelector('.sales_price').value;
  if(!isNaN(sales_quantity && sales_price.length!=0)) {
    sales_total = sales_quantity * sales_price;
    sum = parseFloat(sales_total);
    document.querySelector('.sales_total').value = sum;
  }
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
  option.setAttribute("value", "inventory->id");
  option.innerHTML = "";
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
  input3.setAttribute("class", "form-control");
  input3.class = "sales_quantity";
  input3.addEventListener("keyup", function(){
    calculateSum(row);
  });
  td3.appendChild(input3);

  //price
  let td4 = document.createElement('td');
  let input4 = document.createElement("input");
  input4.type = "number";
  input4.setAttribute("class", "form-control");
  input4.class = "sales_price";
  input4.addEventListener("keyup", function(){
    calculateSum(row);
  });
  td4.appendChild(input4);


  //Total price
  let td5 = document.createElement('td');
  let input5 = document.createElement("input");
  input5.input = "text";
  input5.id = "sales_total";
  input5.setAttribute("class", "form-control");  
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
  console.log(td6);
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
let deleteBtn = document.querySelector('#delete').style.cursor = "pointer" 
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
