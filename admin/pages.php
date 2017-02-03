<?php 

    $title = 'All Pages';
    include ('admin-header.php'); 
    ?>
    <main class="mdl-layout__content mdl-color--white-100">
    <?php
    connect_db();
    check_db();

    $sql = "SELECT * FROM pot_posts WHERE post_type='Page'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) { ?>
                <!-- Table-->
    <div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--12-col-phone ">

    <div style="display:inline-flex;">

    <a href="post-new">
    <button class="add-button mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--fab mdl-shadow--8dp mdl-button--colored ">
        <i class="material-icons mdl-js-ripple-effect">add</i>
    </button>
    </a>
    <form name="post_edit_form" action="" method="GET">
    <table id="table" class="mdl-data-table mdl-js-data-table mdl-data-table--selectable mdl-shadow--2dp projects-table sortable">
    <th class="mdl-data-table__cell--non-numeric">Title</th>
    <th class="mdl-data-table__cell--non-numeric">Content</th>
    <th class="mdl-data-table__cell--non-numeric">Author</th>
    <th class="mdl-data-table__cell--non-numeric">Date</th>
    <th class="mdl-data-table__cell--non-numeric">Status</th>
    <th class="mdl-data-table__cell--non-numeric">Actions</th></tr>
    <?php
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $url = '../media/uploads/';
        $post_id = $row["id"];
        $post_title = $row["post_title"];
        $image = $row["post_image"];
        $post_content = $row["post_content"];
        $tag = $row["post_tag"];
        $cat = $row["post_cat"];
        $author = $row["post_author"];
        $dates = $row["post_date"];
        list($date, $time) = split('[/. ]', $dates);
        $status = $row["post_status"]; ?>
        <tr>
        <td class="mdl-data-table__cell--non-numeric"><?php echo "$post_title"; ?></td>
        <td class="mdl-data-table__cell--non-numeric"><?php echo substr($post_content, 0,50); ?>...</td>
        <td class="mdl-data-table__cell--non-numeric"><?php echo "$author"; ?></td>
        <td class="mdl-data-table__cell--non-numeric"><?php echo "$date"; ?></td>
        <td class="mdl-data-table__cell--non-numeric"><?php echo "$status"; ?></td>
        <td><center>
        <a  class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-shadow--8dp mdl-button--colored" href="../?page=<?php echo "$post_id"; ?>">View</a>
        <a  class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-shadow--8dp mdl-button--colored" href="post-edit?p=<?php echo "$post_id"; ?>&action=edit">Edit</a>
    </center></td></tr>
    <?php
    } ?>
    </table>

    <div style="display:inline-flex;">
    <div class="mdl-cell mdl-cell--4-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select">
    <p><b>With Selected: </b><input class="mdl-textfield__input" style="max-width: 50%" type="text" id="post_type" name="do" value="" list="actions">
                            <datalist id="actions">
                            <option value="Trash">Move to Trash</option>
                            <option value="Delete">Delete Permanently</option>
                            </datalist></p><br>
                            <input id="jfwork-show-snackbar" type="submit" name="trash" value="true" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-shadow--8dp mdl-button--colored alignright">
                            
    <div id="jfwork-snackbar-example" class="mdl-js-snackbar mdl-snackbar">
      <div class="mdl-snackbar__text">Hey!</div>
      <button class="mdl-snackbar__action" type="button"></button>
    </div>
    <script>
(function() {
  'use strict';
  var snackbarContainer = document.querySelector('#djfwork-snackbar-example');
  var showSnackbarButton = document.querySelector('#jfwork-show-snackbar');
  var handler = function(event) {
    showSnackbarButton.style.backgroundColor = '';
  };
  showSnackbarButton.addEventListener('click', function() {
    'use strict';
    showSnackbarButton.style.backgroundColor = '#' +
        Math.floor(Math.random() * 0xFFFFFF).toString(16);
    var data = {
      message: 'Are You Sure.',
      timeout: 2000,
      actionHandler: handler,
      actionText: 'OKAY'
    };
    snackbarContainer.MaterialSnackbar.showSnackbar(data);
  });
}());
</script>
    <br>
            
    </div>
    </div>
    </form>
    </div>
    </div>
<?php
} else {
    ?>
    <center>
     <br>
    <img src="../assets/images/loader.gif" width="25%" style="margin: auto;vertical-align: middle;">
    <br>
    <h2>No pages found!</h2>
    </center>
    <?php
}
    mysqli_close($conn);
    ?>
</main>

<?php 

 if(isset($_GET["trash"]))
   {

    function deletepost($postID){

    $sql ='DELETE FROM pot_posts WHERE ID='.$_GET["p"].'';
    $result=mysql_query($sql) or die("oopsy, error when tryin to delete the post");

}

    echo "<script type = \"text/javascript\">
                    alert(\"Are you sure you want to delete the selected posts?\");
                </script>";
    deletepost($postID);

   }

inc_afooter(); ?>