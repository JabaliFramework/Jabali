<?php 

$title = 'Blog Using JSON';
include ('header.php'); ?>

<main class="mdl-layout__content mdl-color--white-100" style="width:100%"><div class="container" style="display:block;" id="id01"></div></main>
<script>
var xmlhttp = new XMLHttpRequest();
var url = "json/posts.php";

xmlhttp.onreadystatechange = function() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        var myArr = JSON.parse(xmlhttp.responseText);
        myFunction(myArr);
    }
};
xmlhttp.open("GET", url, true);
xmlhttp.send();

function myFunction(arr) {
    var out = "";
    var i;
    for(i = 0; i < arr.length; i++) {
        out += '<img src="media/uploads/' + arr[i].post_image + '"><a href="' + arr[i].post_url + '"><h1>' + arr[i].post_title + '</h1></a>' +'<br>' + 'Type: ' + 
        arr[i].post_type + '<br>' + 'Posted In: ' + 
        arr[i].post_cat + '<br>'+ 'Tagged: ' + 
        arr[i].post_tag + '<br>'+ arr[i].post_excerpt + '...<br>'+ 'By ' + 
        arr[i].post_author + ' on: ' + 
        arr[i].post_date + '<br><br><br><br>';
    }
    document.getElementById("id01").innerHTML = out;
}
</script>