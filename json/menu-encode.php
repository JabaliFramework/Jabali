<?php

function get_menu(){

	define("DB_SERVER", "localhost");
	define("DB_NAME", "jabali");
	define("DB_USER", "root");
	define("DB_PASS", "Esel00k56");
	define("HOME", "http://localhost/jabali");

    $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

    $dashboard = array('text' => $dashboard_text, 'url' => $dashboard_url, );
    $blog = array('text' => $blog_text, 'url' => $blog_url, );
    $pages = array('text' => $pages_text, 'url' => $pages_url, );
    $menu = "$dashboard, $blog, $pages";
    foreach($items as $item){ ?>
        <a href="<?php echo "$url"; ?>"><li><?php echo "$text"; ?></li></a>
    <?php
    }

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
	//Insert the string into a column
	//$sql = "UPDATE pot_menus SET items = '".$exampleEncoded."' WHERE  menu='main'";
    }

    make_menu();
    //When saving, we take the titles, strip commas and save as slugs in menu collumn for links
//Add dropdown selections for menu items, value is slugs for respective links, save the slugs, implode when fetching
$links = "my-dashboard, my-blog, my-pages, my-products";
$string = preg_replace('/[.,]/', '', $links);
$items = (explode(" ",$string));
foreach($items as $item){
    $string = preg_replace('/[.-]/', '', $links);
    $items = (explode(" ",$string));
    foreach($items as $item){
        str_replace(search, replace, subject);
        echo $menu
    }
?>

//Or, we are just saving the post slugs, the menu text might be editable, but their links are constant
<a href="<?php echo "url"; ?>"><?php echo "url"; ?></a>
for top Nav, save all pages in dropdown list, and posts? so user can select them
Menu 1 <input type="text" name="menu1"><option value="<?php echo "slug"; ?>"><?php echo "Title"; ?></option>
Menu 2 <input type="text" name="menu1"><option value="<?php echo "slug"; ?>"><?php echo "Title"; ?></option>
Menu 3 <input type="text" name="menu1"><option value="<?php echo "slug"; ?>"><?php echo "Title"; ?></option>


}

