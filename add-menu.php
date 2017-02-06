<?php 

    $title = 'Blog Main';
    include ('templates/header.php');
    
    connect_db();
    check_db(); ?>
    <style type="text/css">
        
        * {
  .border-radius(0) !important;
}

#field {
    margin-bottom:20px;
}

    </style>
    <?php

$sql = 'SELECT id, post_url,post_title FROM pot_posts';
$conn = $GLOBALS['conn'];
$result = $conn->query($sql);

    if ($result->num_rows > 0) {

        while($row = $result->fetch_assoc()) {
            $array[] = $row;
        }

    // JSON string
  $someJSON = json_encode($array);
  //'[{"name":"Jonathan Suh","gender":"male"},{"name":"William Philbin","gender":"male"},{"name":"Allison McKinnery","gender":"female"}]';

  // Convert JSON string to Array
  $someArray = json_decode($someJSON, true);
  print_r($someArray);
  echo "<br>";   echo "<br>";   echo "<br>"; 
  $someArray2 = serialize($someArray);
  print_r($someArray2);

  echo "<br>";       // Dump all data of the 

  foreach ($someArray as $key => $value) {
    echo '<a href="'.$value["post_url"].'"><i>'.$value["id"].'</><li>'.$value["post_title"].'</li></a>';
  }

    }

?>

<main class="mdl-layout__content mdl-color--white-100" style="width:100%">
<div class="container">

<form method="POST">
     <div id="dynamicInput">
          Entry 1<br><select><option>ghh</option><option>ghh</option><option>ghh</option></select><input type="text" name="myInputs[]"><input type='text' name='icon'>
     </div>
     <input type="button" value="Add another text input" onClick="addInput('dynamicInput');">
</form>
<script type="text/javascript">var counter = 1;
var limit = 9;
function addInput(divName){
     if (counter == limit)  {
          alert("You have reached the limit of adding " + counter + " inputs");
     }
     else {
          var newdiv = document.createElement('div');
          newdiv.innerHTML = "Entry " + (counter + 1) + " <br><select><option>ghh</option><option>ghh</option><option>ghh</option></select><input type='text' name='myInputs[]'><input type='text' name='icon'>";
          document.getElementById(divName).appendChild(newdiv);
          counter++;
     }
}

</script>
</div>
</main>

Accessory designer
Actor
Advertising designer
Animation director
Animator
Architect
Art administrator
Art critic
Art director
Art historian
Artisan
Artist
Arts administration
Blogger
Brand manager
Broadcast news analyst
Cartoonist
Casting director
Chief creative officer
Choreographers
Cinematographer
Colorist
Comic book creator
Compositor
Coppersmith
Copywriter
Creative director
Creative professional
Creative writer
Curator
Dancer
Design director
Design strategist
Editor
Equestrian
Essayist
Event planner
Fashion designer
Film critic
Film director
Fine artist
Flash developer
Flatter
Floral designer
Food stylist
Furniture designer
Game artist
Graphic designer
Hairstylist
Illustrator
Imagineer
Industrial designer
Interior designer
Jewellery designer
Journalist
Knitwear designer
Landscape Architect
Leadman
Limner
Lyricist
Make-up artist
Marchand-mercier
Marine designer
Media designer
Model (art)
Multi-media artist
Music artist (occupation)
Music editor
Penciller
Photographer
Photojournalist
Playwright
Poet
Printmaker
Production designer
Reporter
Scenographer
Screenwriter
Sculptor
Set decorator
Set dresser
Silversmith
Sound designer
Stage director
Teaching artist
Theatre consultant</option>
Typeface designer</option>
Urban planner</option>
Web designer</option>
Wedding planner</option>
<option>Writer</option>