<?php
// Report All PHP Errors
?>
      <!-- <div class="copyright" ><span>Powered by </span><a href="http://mtaandao.co.ke" >Mtaandao Digital</a></div>
	<footer class="attribution" ><span>Coded by </span><a href="https://www.facebook.com/mtaandaoio" >Mtaandao Devs</a></footer> -->

	    <!-- Bootstrap core JavaScript
    ================================================== -->
<script>
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
  if (n < 1) {slideIndex = slides.length} ;
  for (i = 0; i < slides.length; i++) {
     slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
     dots[i].classList.remove("active");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].classList.add("active");
}
</script>
	<script src="assets/js/bootstrap.min.js"></script>
	
  <!-- inject:js -->
<script src="assets/js/d3.js"></script>
<script src="assets/js/getmdl-select.min.js"></script>
<script src="assets/js/material.min.js"></script>
<script src="assets/js/nv.d3.js"></script>
<script src="assets/js/widgets/employer-form/employer-form.js"></script>
<script src="assets/js/widgets/line-chart/line-chart-nvd3.js"></script>
<script src="assets/js/widgets/pie-chart/pie-chart-nvd3.js"></script>
<script src="assets/js/widgets/table/table.js"></script>
<script src="assets/js/widgets/todo/todo.js"></script>
<!-- endinject -->


  <?php if($msg != "") { echo $msg; } ?>
</div>
</body>
</html>

	