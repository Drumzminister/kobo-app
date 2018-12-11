//Drop down of items
$('.search').select2();

function calculateSum ()
{
  let sum = 0;
  let sales_quantity = document.querySelector('#sales_quantity').value;
  let sales_price = document.querySelector('#sales_price').value;
  if(!Number(sales_quantity) && !Number(sales_price)){
      swal("Error", "Please input a number");
      setTimeout(function(){node.focus();}, 1);
  }
  if(!isNaN(sales_quantity) && sales_price.length!=0) {
    sales_total = sales_quantity * sales_price;
    sum = parseFloat(sales_total);
    document.querySelector('#sales_total').value = sum;
  }
}

axios.get('/getInventory')
.then(function (response) {
  userInventory = response.data;
  console.log(response.data);
})
.catch(function (error) {
  console.log(error);
});

function addRow()
{
  let tableRow = document.querySelector("#salesTable"); 
  let row = document.createElement('tr');
  
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

  let td2 = document.createElement('td');
  let input2 = document.createElement("input");
  input2.type = "text";
  input2.id = "sales_description";
  input2.setAttribute("class", "form-control");
  td2.appendChild(input2);

  let td3 = document.createElement('td');
  let input3 = document.createElement("input");
  input3.type = "text";
  input3.setAttribute("class", "form-control");
  input3.id = "sales_quantity";
  input3.addEventListener("onchange", function(){
    calculateSum();
  });
  td3.appendChild(input3);

  let td4 = document.createElement('td');
  let input4 = document.createElement("input");
  input4.input = "number";
  input4.setAttribute("class", "form-control");
  input4.id = "sales_price";
  input4.addEventListener("keyup", function(){
    calculateSum();
  });
  td4.appendChild(input4);

  let td5 = document.createElement('td');
  let input5 = document.createElement("input");
  input5.input = "text";
  input5.id = "sales_total";
  input5.setAttribute("class", "form-control");  
  input5.disabled = true;
  td5.appendChild(input5);

  let td6 = document.createElement('td');
  let option6 = document.createElement('option');
  let selected6 = document.createElement('select');
  td6.id = "inventory";
  selected.setAttribute("class", "search form-control");
  option6.setAttribute("selected", "Pick Product Name");
  option6.setAttribute("value", "inventory->id");
  option6.innerHTML = '';
  selected.appendChild(option);
  td6.appendChild(selected6);
  
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
  console.log(tableRow);
}

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
