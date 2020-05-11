<script type="text/javascript">
jQuery(document).ready(function($){
var ham_icon = $('#menu-icon');
ham_icon.on('click', menu);
function menu() {
document.getElementById("myNav").style.display = "block";
document.getElementById("myNav").style.width = "20%";
} 

var ham_close = $('.closebtn');
ham_close.on('click', closeNav);
function closeNav() {
document.getElementById("myNav").style.display = "none";
document.getElementById("myNav").style.width = "0%";
}

var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
});
</script>