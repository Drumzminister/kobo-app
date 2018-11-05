  document.onreadystatechange = function () {
    var state = document.readyState
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


// rotate
$('.land-header').on('mousemove',function(e){
    centerX = $(this).width()/1.5;
    var moveX = centerX - e.offsetX;
    $(this).css({
        'transform' : 'perspective(500px)  rotateY('+ moveX/7 + 'deg)'
    });
});


/*=================
navbar-header
===================*/
$(function () {
    $('[data-tooltip="tooltip"]').tooltip();
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
jQuery(document).ready(function($) {
  $(".clickable-row").click(function() {
      window.location = $(this).data("href");
  });
});

// sales table
function addRow(tableID) {

    var table = document.getElementById(tableID);
    
    var rowCount = table.rows.length;
    var row = table.insertRow(rowCount);
    
    var colCount = table.rows[1].cells.length;
    
    for(var i=0; i<colCount; i++) {
    
        var newcell	= row.insertCell(i);
    
        newcell.innerHTML = table.rows[4].cells[i].innerHTML;
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
    }
      
  
  // intro js

