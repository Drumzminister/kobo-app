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
var table = document.getElementById("table"),rIndex;

var rows = table.rows.length;

for(var i = 0; i < rows; i++ ){
  table.rows[i].onclick = function()
  {
    rIndex = this.rowIndex;
    console.log(rIndex);
  };
}

// sales table
/* function addRow(tableID) {

    var table = document.getElementById(tableID);
    
    var rowCount = table.rows.length;
    var row = table.insertRow(rowCount);
    
    var colCount = table.rows[1].cells.length;
    
    for(var i=0; i<colCount; i++) {
    
        var newcell	= row.insertCell(i);
    
        newcell.innerHTML = table.rows[6].cells[i].innerHTML;
        //alert(newcell.childNodes);
        switch(newcell.childNodes[0].type) {
            case "text":
                    newcell.childNodes[0].value = "";
                    break;
            case "checkbox":
                    newcell.childNodes[0].checked = false;
                    break;
            case "select-one":
                    newcell.childNodes[0].selectedIndex = 0;
                    break;
        }
    }
  } */

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

