  document.onreadystatechange = function () {
    var state = document.readyState;
    if (state == 'complete') {
        setTimeout(function(){
            document.getElementById('interactive');
           document.getElementById('load').style.visibility="hidden";
        },1000);
    }
  };

  // <script type="text/javascript">
    $(window).on('load',function(){
        $('#myModal').modal('show');
    });


    
       
      

/*=============
landing page
===============*/

// date picker


// rotate
$('.land-header').on('mousemove',function(e){
    centerX = $(this).width()/1.5;
    var moveX = centerX - e.offsetX;
    $(this).css({
        'transform' : 'perspective(500px)  rotateY('+ moveX/7 + 'deg)'
    });
});


/*=================
nav-active link
===================*/
// Add active class to the current button (highlight it)
var header = document.getElementById("navLink");
var links = header.getElementsByClassName("nav-link");
for (var i = 0; i < links.length; i++) {
  links[i].addEventListener("click", function() {
    var current = document.getElementsByClassName("activ");
    if (current.length > 0) { 
      current[0].className = current[0].className.replace(" activ", "");
    }
    this.className += " activ";
  });
  

}

// message tab
$(document).ready(function(){
$('.button').click(function(e) {
  e.preventDefault();
  setContent($(this));
});

// set content on load
$('.button.activee').length && setContent($('.button.activee'));

function setContent($el) {
  $('.button').removeClass('activee');
  $('.drop-messag').hide();

  $el.addClass('activee');
  $($el.data('rel')).show();
}
});

$(".notifications-div, .notifications-divv").click(function (event) {
  event.stopPropagation();
});



/*===================
Sales Dashboard
=====================*/

// table row
// var table = document.getElementById("table"),rIndex;

// var rows = table.rows.length;

// for(var i = 0; i < rows; i++ ){
//   table.rows[i].onclick = function()
//   {
//     rIndex = this.rowIndex;
//     console.log(rIndex);
//   };
// }

// sales table
var $TABLE = $('#table');
var $BTN = $('#export-btn');
var $EXPORT = $('#export');

$('.table-add').click(function () {
var $clone = $TABLE.find('tr.hide').clone(true).removeClass('hide table-line');
$TABLE.find('table').append($clone);
});

$('.table-remove').click(function () {
$(this).parents('tr').detach();
});

$('.table-up').click(function () {
var $row = $(this).parents('tr');
if ($row.index() === 1) return; // Don't go above the header
$row.prev().before($row.get(0));
});

$('.table-down').click(function () {
var $row = $(this).parents('tr');
$row.next().after($row.get(0));
});

// A few jQuery helpers for exporting only
jQuery.fn.pop = [].pop;
jQuery.fn.shift = [].shift;

$BTN.click(function () {
var $rows = $TABLE.find('tr:not(:hidden)');
var headers = [];
var data = [];

// Get the headers (add special header logic here)
$($rows.shift()).find('th:not(:empty)').each(function () {
headers.push($(this).text().toLowerCase());
});

// Turn all existing rows into a loopable array
$rows.each(function () {
var $td = $(this).find('td');
var h = {};

// Use the headers from earlier to name our hash keys
headers.forEach(function (header, i) {
h[header] = $td.eq(i).text();
});

data.push(h);
});

// Output the result
$EXPORT.text(JSON.stringify(data));
});


// function addRow(row)
// {
// var i = row.parentNode.parentNode.rowIndex;
// var tr = document.getElementById('Table').insertRow(i+1);
// tr.innerHTML = row.parentNode.parentNode.innerHTML;
// var inputs = tr.querySelectorAll("input[type='text']");
// for(var i=0; i<inputs.length; i++)
//    inputs[i].value = "";
// }
// function addRow(tableID) {

//     var table = document.getElementById(tableID);
    
//     var rowCount = table.rows.length;
//     var row = table.insertRow(rowCount);
    
//     var colCount = table.rows[1].cells.length;
    
//     for(var i=0; i<colCount; i++) {
    
//         var newcell	= row.insertCell(i);
    
//         newcell.innerHTML = table.rows[6].cells[i].innerHTML;
//         //alert(newcell.childNodes);
//         switch(newcell.childNodes[0].type) {
//             case "text":
//                     newcell.childNodes[0].value = "";
//                     break;
//             case "checkbox":
//                     newcell.childNodes[0].checked = false;
//                     break;
//             case "select-one":
//                     newcell.childNodes[0].selectedIndex = 0;
//                     break;
//         }
//     }
//   }

// Format number
function AddComma() {
  $('input.number').keyup(function(event) {
  // skip for arrow keys

  if(event.which >= 37 && event.which <= 40) return;

  // format number
  $(this).val(function(index, value) {
    return value
    .replace(/\D/g, "")
    .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
  });
});
}

// $(document).ready(function(){
//   var options = {
//       max_value: 6,
//       step_size: 0.5,
//       selected_symbol_type: 'hearts',
//       url: 'http://localhost/test.php',
//       initial_value: 3,
//       update_input_field_name: $("#input2"),
//   }
//   $(".rate").rate();
// });

  $(function(){
    $(".rating").rate();

    //or for example
    var options = {
        max_value: 6,
        step_size: 0.5,
    };
    $(".rating").rate(options);
  });

$(document).ready(function(){
  var options = {
      max_value: 6,
      step_size: 0.5,
      selected_symbol_type: 'hearts',
      url: 'http://localhost/test.php',
      initial_value: 3,
      update_input_field_name: $("#input2"),
  }
  $(".rate").rate();
});

    $(function() {
      $('#navigation li').click(function() {
              $('#navigation li').removeClass('selected');
              $(this).addClass('selected');
          
      });
  });

