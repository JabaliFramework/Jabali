<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../assets/css/pot.css">
<link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<script defer src="../assets/js/material.js"></script>
<script src="../assets/js/jquery-1.10.2.min.js" ></script>
<script>
$(document).ready(function(){
    $("#hide").click(function(){
        $("spand").hide();
    });
    $("#show").click(function(){
        $("spand").show();
    });
});
</script>
<style>

#myBtn {
    margin: auto;
    }
/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    position: relative;
    background-color: #fefefe;
    margin: auto;
    padding: 0;
    border: 1px solid #888;
    width: 50%;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
    -webkit-animation-name: animatetop;
    -webkit-animation-duration: 0.4s;
    animation-name: animatetop;
    animation-duration: 0.4s
}

/* Add Animation */
@-webkit-keyframes animatetop {
    from {top:-300px; opacity:0} 
    to {top:0; opacity:1}
}

@keyframes animatetop {
    from {top:-300px; opacity:0}
    to {top:0; opacity:1}
}

/* The Close Button */
.close {
    color: white;
    float: right;
    font-size: 32px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}

.modal-header {
    padding: 2px 16px;
    background-color: #5cb85c;
    color: white;
}

.modal-body {padding: 2px 16px;}

.modal-footer {
    padding: 2px 16px;
    background-color: #5cb85c;
    color: white;
}
</style>
</head>
<body>
<!-- Trigger/Open The Modal -->
<button id="myBtn" class="pot-button">Show Results</button>


<div><button id="sharingBtn" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect">
  <i class="fa fa-share-alt"></i></button></a>
<div>

<!-- The Modal -->
<div id="sharingModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">×</span>
      <h2>Share with...</h2>
    </div>
    <div class="modal-body">
    <spand>
<a id="share-facebook" href="http://www.facebook.com/sharer.php?u=[post-url]">
    <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect">
  <i class="fa fa-facebook"></i>
</button></a>
<a id="share-twitter" href="http://twitter.com/share?url=<URL>&text=<TEXT>via=<USERNAME>">
    <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect">
  <i class="fa fa-twitter"></i>
</button></a>
<a id="share-google" href="http://twitter.com/share?url=<URL>&text=<TEXT>via=<USERNAME>">
    <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect">
  <i class="fa fa-google-plus"></i>
</button></a>
<a id="share-email" href="mailto:sample@email.com" data-rel="external">
    <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect">
  <i class="fa fa-envelope"></i>
</button></a>
<a id="share-whatsapp" href="whatsapp://send?text=The text to share!" data-action="share/whatsapp/share">
    <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect">
  <i class="fa fa-whatsapp"></i>
</button></a>
</spand>
    </div>
  </div>

</div>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">×</span>
      <h2>M-PESA Feedback</h2>
    </div>
    <div class="modal-body">
      <p><?php echo "feedback 1"?></p>
      <p><?php echo "feedback 2"?></p>
      <p><?php echo "feedback 3"?></p>
    </div>
  </div>

</div>

<script>
// Get the modal
var modal = document.getElementById('myModal');
var modal = document.getElementById('sharingModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");
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

</body>

<!-- Mirrored from www.w3schools.com/howto/tryit.asp?filename=tryhow_css_modal2 by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 13 Mar 2016 11:03:55 GMT -->
</html>
