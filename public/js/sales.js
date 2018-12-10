//Drop down of items
$('.search').select2();

function calculateSum ()
{
  let sum = 0;
  let sales_quantity = document.querySelector('#sales_quantity').value;
  let sales_price = document.querySelector('#sales_price').value;
  let sales_total = document.querySelector('#sales_total').value;
  if(!isNaN(sales_quantity) && sales_price.length!=0) {
    sales_total = sales_quantity * sales_price;
    sum = parseFloat(sales_total);
    document.querySelector('#sales_total').value = sum;
  }
}

function addRow(){
    let tbody = document.querySelector(`#${id} tbdoy`);
    let row = document.createElement('tr');

    let
}