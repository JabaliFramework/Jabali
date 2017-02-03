<?php

$mtaandao = "Mtaandao";
$date = "2017";//date("Y");
$url = "http://mtaandao.co.ke";
date_default_timezone_set("Africa/Nairob");
?>
</div>
<footer><span class="copyright alignleft"><?php echo '&copy; <a href="'.$home_url.'">Jabali Framework</a> '.$date.''; ?></span>
<span class="attribution alignright"><?php echo 'Powered by <a href="'.$url.'">'.$mtaandao.'</a>'; ?></span>
</footer>
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
<script src="../assets/js/d3.js"></script>
<script src="../assets/js/getmdl-select.min.js"></script>
<script src="../assets/js/material.js"></script>
<script src="../assets/js/nv.d3.js"></script>
<script src="../assets/js/widgets/employer-form/employer-form.js"></script>
<script src="../assets/js/widgets/line-chart/line-chart-nvd3.js"></script>
<script src="../assets/js/widgets/pie-chart/pie-chart-nvd3.js"></script>
<script src="../assets/js/widgets/table/table.js"></script>
<script src="../assets/js/widgets/todo/todo.js"></script>
<!-- endinject -->

</body>
</html>