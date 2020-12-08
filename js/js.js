window.onscroll = function() {myFunction()};

var navbar = document.getElementById("navbar");
var sticky = navbar.offsetTop;

function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
}



$('.toggle').click(function() {
  $('#link-box').toggle('slow');
});

$('.toggle2').click(function() {
  $('#link-box2').toggle('slow');
});
$('.toggle3').click(function() {
  $('#link-box3').toggle('slow');
});
$('.toggle4').click(function() {
  $('#link-box4').toggle('slow');
});

$(window).ready(function(){
        $('body').click(function(){
            $("#link-box").hide();
        });
    });

$(window).ready(function(){
        $('body').click(function(){
            $("#link-box2").hide();
        });
    });

$(window).ready(function(){
        $('body').click(function(){
            $("#link-box3").hide();
        });
    });

$(window).ready(function(){
        $('body').click(function(){
            $("#link-box4").hide();
        });
    });

var $root = $('html, body');

$('a[href^="#anchor1"]').click(function () {
    $root.animate({
        scrollTop: $( $.attr(this, 'href') ).offset().top
    }, 500);

    return false;
});

function openNav() {
  document.getElementById("myNav").style.display = "block";
}

function closeNav() {
  document.getElementById("myNav").style.display = "none";
}

var elementToClick = document.querySelector(".toggler");
var elementToShow = document.querySelector(".element");

if(elementToClick){
  elementToClick.addEventListener("click",showElement)
}

function showElement(){
  elementToShow.classList.add("show");
}


function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();