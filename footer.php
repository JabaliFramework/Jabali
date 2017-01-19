<?php
// Report All PHP Errors
?>
      <div class="copyright" ><span>Powered by </span><a href="http://mtaandao.co.ke" >Mtaandao Digital</a></div>
	<footer class="attribution" ><span>Coded by </span><a href="https://www.facebook.com/mtaandaoio" >Mtaandao Devs</a></footer>

	    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script>
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";  
  }
  x[slideIndex-1].style.display = "block";  
}
</script>
	<script src="https://code.jquery.com/jquery-3.1.0.min.js" integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	
  <!-- inject:js -->
<script src="assets/js/d3.js"></script>
<script src="assets/js/getmdl-select.min.js"></script>
<script src="assets/js/material.js"></script>
<script src="assets/js/nv.d3.js"></script>
<script src="assets/js/widgets/employer-form/employer-form.js"></script>
<script src="assets/js/widgets/line-chart/line-chart-nvd3.js"></script>
<script src="assets/js/widgets/pie-chart/pie-chart-nvd3.js"></script>
<script src="assets/js/widgets/table/table.js"></script>
<script src="assets/js/widgets/todo/todo.js"></script>
<!-- endinject -->


  <?php if($msg != "") { echo $msg; } ?>
</body>
</html>

	