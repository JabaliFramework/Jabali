<?php

    function make_menu(){
    define("DB_SERVER", "localhost");
    define("DB_NAME", "jabali");
    define("DB_USER", "root");
    define("DB_PASS", "Esel00k56");
    define("HOME", "http://localhost/jabali");
    $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

    $sql = 'SELECT items FROM pot_menus WHERE menu="main"';
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {

    $menu = "Dashboard, Blog, Pages, Products";
    $links = "dashboard, blog, pages, products";

    $string = preg_replace('/[.,]/', '', $menu);
    $items = (explode(" ",$string));
    $string2 = preg_replace('/[.,]/', '', $links);
    $items2 = (explode(" ",$string2));
    foreach($items as $item){
        foreach($items2 as $item2)
    { ?>
    <a href="<?php echo "$item2"; ?>"><li><?php echo "$item"; ?></li></a>
    <?php
  }
}
    }
    } else {

    echo "<script type = \"text/javascript\">
                alert(\"Menu not set\");
            </script>";
    }

    }

    make_menu();

    ?>

<form action="" method="POST">
<label>One: </label><input class="mdl-textfield__input menu-style" name="upone" type="text" placeholder="<?php echo $one; ?>" value=""/><br>
<label>Two: </label><input class="mdl-textfield__input menu-style" name="uptwo" type="text" placeholder="<?php echo $two; ?>" value=""/><br>
<label>Two: </label><input class="mdl-textfield__input menu-style" name="upthree" type="text" placeholder="<?php echo $three; ?>" value=""/>
<label>My Event: </label><input id="datepicker" class="mdl-textfield__input menu-style" name="upthree" type="text" placeholder="From Which Date?" value=""/>
<br>
<input class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-shadow--8dp mdl-button--colored" type="submit" name="submit" value="update" />
</form><br>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

$one = $_POST['upone'];
$two = $_POST['uptwo'];
$three = $_POST['upthree'];

$up_main_menu = array("One"=>$one,"Two"=>$two ,"Three"=>$three);
$string_array = serialize($up_main_menu);
echo $string_array;

connect_db();
check_db();

function update_main_menu() {
    $sql = 'UPDATE pot_menus WHERE menu="main" SET items ="'.$string_array.'"';
    $conn = $GLOBALS['conn'];
    $result = $conn->query($sql);
    
}
update_main_menu();

}

