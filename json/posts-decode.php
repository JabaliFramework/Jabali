<?php ?>

<div id="id01"></div>

<script>
var xmlhttp = new XMLHttpRequest();
var url = "posts.php";

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
        out += 'Title: ' + 
        arr[i].post_title + '<br>' + 'Type: ' + 
        arr[i].post_type + '<br>' + 'Posted In: ' + 
        arr[i].post_cat + '<br>'+ 'Tagged: ' + 
        arr[i].post_tag + '<br>'+ arr[i].post_content + '<br>'+ 'By ' + 
        arr[i].post_author + ' on: ' + 
        arr[i].created_at + '<br><br><br>';

        '<a href="' + arr[i].url + '">' + arr[i].display + '</a><br>'
    }
    document.getElementById("id01").innerHTML = out;
}
</script>