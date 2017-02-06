<?php


    // Session start
    session_start();

    // if(!$_SESSION["username"]) {

    //     header ("Location: ../account");
    //     exit();
    // }

    // $auth = $_COOKIE['authorization'];
    // header ("Cache-Control:no-cache");
    // if(!$auth == "ok") {
    //     header ("Location: ../account");
    //     exit();
    // }

    $title = 'Dashboard Home';
    include ('admin-header.php'); 

    connect_db();
    check_db();

    $sql = "SELECT * FROM pot_posts LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) { 
    while($row = $result->fetch_assoc()) {
        $url = '../media/uploads/';
    $post_id = $row["id"];
    $post_type = $row["post_type"];
    $post_title = $row["post_title"];
    $image = $row["post_image"];
    $post_content = $row["post_content"];
    $tag = $row["post_tag"];
    $cat = $row["post_cat"];
    $author = $row["post_author"];
    $dates = $row["post_date"];
    list($date, $time) = split('[/. ]', $dates); }}?>

    <main class="mdl-layout__content">

       <div class="mdl-grid ">
                <!-- Robot card-->
                <div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--6-col-tablet mdl-cell--13-col-phone">
                <div class="mdl-card mdl-shadow--2dp todo" style="margin:auto;background-color: white;">
                <div class="mdl-card__title">
                            <h2 class="mdl-card__title-text">Draft</h2>
                        </div>
                    <form style="margin-left: 10px;margin-right: 10px;">
                        <label>Title</label><input type="text" name="" class="mdl-textfield__input"><br>
                        <label>Content</label><textarea rows="2" class="mdl-textfield__input"></textarea><br>
                        <label>Category</label><input type="text" name="" class="mdl-textfield__input"><br>
                        <input type="hidden" name="status" value="draft">
                        <input type="submit" name="draft" value="save" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored"><br><br>
                    </form>
                    </div>
                </div>
                                <!-- ToDo_widget-->
<div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--6-col-tablet mdl-cell--13-col-phone">
<form name="post_edit_form" action="" method="GET">
<div class="mdl-card mdl-shadow--2dp todo" style="margin:auto;background-color: #eee;">
    <div class="mdl-card__title">
    <h2 class="mdl-card__title-text">To-do list</h2>
    </div>
    <div class="mdl-card__supporting-text">
        <table id="table" class="mdl-data-table mdl-js-data-table mdl-data-table--selectable mdl-shadow--2dp projects-table sortable">
        <th class="mdl-data-table__cell--non-numeric">Title</th>
        <tr>
        <td class="mdl-data-table__cell--non-numeric">
        <div id="dynamicInput" style="padding-left: 10px;"><br>
        <label style="padding-right: 5px;">Item </label><select><option value="">ghh</option><option>ghh</option><option>ghh</option></select>
        <label style="padding-right: 5px;">Label </label><input type="text" name="myInputs[]">
        <label style="padding-right: 5px;">Icon </label><input type='text' name='icon'>
        </div>
        </td></tr>
        </table>
        <script type="text/javascript">
        var counter = 1;
        var limit = 9;
        function addInput(divName){
        if (counter == limit)  {
          alert("You have reached the limit of adding " + counter + " inputs");
        }
        else {
          var newdiv = document.createElement('td');
          newdiv.innerHTML = "<br><tr><td class='mdl-data-table__cell--non-numeric'><div id='dynamicInput' style='padding-left: 10px;'><br><label style='padding-right: 5px;'>Item </label><select><option>ghh</option><option>ghh</option><option>ghh</option></select><label style='padding-right: 5px;'>Label </label><input type='text' name='myInputs[]''><label style='padding-right: 5px;'>Icon </label><input type='text' name='icon'></div></td><tr>";
          document.getElementById(divName).appendChild(newdiv);
          counter++;
        }
        }

        </script>
    </div>
<div class="mdl-card__actions">
<button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-shadow--8dp mdl-button--colored ">remove selected</button> 
<input type="submit" name="update" value="update" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-shadow--8dp mdl-button--colored">

</div>
</div>
</form>
<button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--fab mdl-shadow--8dp mdl-button--colored " onClick="addInput('dynamicInput');">
    <i class="material-icons mdl-js-ripple-effect">add</i>
</button>
</div>

</div>

</main>

<?php inc_afooter (); ?>