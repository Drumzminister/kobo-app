let token = document.querySelector('meta[name="csrf-token"]').content;
// let user_id = "";
//   document.onreadystatechange = function () {
//     var state = document.readyState;
//     if (state == 'complete') {
//         setTimeout(function(){
//             document.getElementById('interactive');
//            document.getElementById('load').style.visibility="hidden";
//         },1000);
//     }
//   };

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
    $(function() {
      $('#navigation li').click(function() {
              $('#navigation li').removeClass('selected');
              $(this).addClass('selected');

      });
    });

  function assignValToParent(elem) {
      let val = Number(elem.value);
      if (isNaN(val)) {
          elem.parentElement.innerText = elem.value;
      } else {
          elem.parentElement.innerText = formatter.format(val);
      }

  }
  const formatter = new Intl.NumberFormat('en-US', {
      minimumFractionDigits: 2
  });


  // window.formatter = formatter;
//Date picker
//   $(function() {
//     var date = new Date();
//     var currentMonth = date.getMonth();
//     var currentDate = date.getDate();
//     var currentYear = date.getFullYear();
//     $('#datepicker').datepicker({
//     maxDate: new Date(currentYear, currentMonth, currentDate),
//
//     });
// });
