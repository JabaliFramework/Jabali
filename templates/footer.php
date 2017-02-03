<?php
/**
 * @package Jabali Framework
 * @subpackage Main
 * @version 17.02.1
 * @author Mtaandao Digital Solutions
 * @see http://mtaandao.co.ke/framework
 * @link http://github.com/JabaliFramework/Jabali
 */

$mtaandao = "Mtaandao";
$pot = "Swahilipot Hub";
$date = "2017";
$url = "http://mtaandao.co.ke";
$poturl = "http://swahilipothub.co.ke";
$home_url = $GLOBALS['home_url'];

?>
<footer class=""><span class="copyright alignleft"><?php echo '&copy; <a href="'.$home_url.'">'.$mtaandao.'</a> '.$date.''; ?></span>
<span class="attribution alignright"><?php echo 'By <a href="'.$home_url.'">'.$mtaandao.'</a> & <a href="'.$poturl.'">'.$pot.'</a>'; ?></span></footer>

<script>
// Get the modal
var modal = document.getElementById('sharingModal');

// Get the button that opens the modal
var btn = document.getElementById("sharingBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
<script>
 $(function() 
 {   $( "#datepicker" ).datepicker({
         changeMonth:true,
         changeYear:true,
         yearRange:"-100:+0",
         dateFormat:"dd MM yy" });
 });
 </script>
 <script type="text/javascript">
$(window).load(function() {
  $(".loader").fadeOut("slow");
})
</script>
	    <!-- Bootstrap core JavaScript
    ================================================== -->
<script src="assets/js/bootstrap.min.js"></script>
	
  <!-- inject:js -->
  
<script>
 $(function() 
 {   $( "#datepicker" ).datepicker({
         changeMonth:true,
         changeYear:true,
         yearRange:"-100:+0",
         dateFormat:"dd MM yy" });
 });
 </script>
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

</body>
</html>

	