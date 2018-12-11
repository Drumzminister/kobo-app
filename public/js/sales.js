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

function addRow()
{
  let tableRow = document.querySelector("salesTable");
  let row = document.createElement('tr');

  let td1 = document.createElement('td');
  let selected = document.createElement('select');
  let option = document.createElement('option');

  td1.id = "inventory";
  selected.setAttribute("class", "search form-control");
  option.setAttribute("selected", "Pick Product Name");
  option.setAttribute("value", "inventory->id");
  option.innerHTML = "{{$sales->name}}";
  selected.appendChild(option);
  td1.appendChild(selected);

  let td2 = document.createElement('td');
  td2.input = "text";
  td2.id = "sales_description";
  td2.setAttribute("class", "form-control");

  let td3 = document.createElement('td');
  td3.input = "number";
  td3.setAttribute("class", "form-control");
  td3.id = "sales_quantity";
  td3.addEventListener("click¡", function(){
    calculateSum();
  })
  console.log(td3);

  // td2.id = "inventory";
  // selected2.setAttribute("class", "search form-control");
  // option2.setAttribute("selected", "Pick Product Name");
  // option2.setAttribute("value", "inventory->id");
  // option2.innerHTML = "{{$sales->name}}";
  // selected2.appendChild(option);
  // td2.appendChild(selected);



}

let deleteBtn = document.querySelector('#delete').style.cursor = "pointer" 
function deleteRow()
{
  swal({
    title: "Are you sure?",
    text: "You are trying to delete this entry",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  }).then((willDelete) => {
    if(willDelete) {
      document.getElementById("salesTable").deleteRow(0);
    }
  });
}
