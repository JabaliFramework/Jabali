<?php 

    $title = 'Media';
    include ('admin-header.php'); 
    ?>
        <main class="mdl-layout__content mdl-color--white-100">
        <?php
    connect_db();
    check_db();

    $sql = "SELECT * FROM pot_posts";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) { ?>
    <div class="mdl-grid mdl-cell mdl-cell--9-col-desktop mdl-cell--12-col-tablet mdl-cell--4-col-phone mdl-cell--top">
                <!-- Table-->
    <div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--12-col-phone ">

    <div style="display: inline-flex;">
    <form action="" method="GET"><div class="mdl-cell mdl-cell--4-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select">
                                    <input class="mdl-textfield__input" value="" type="text" id="post-action" placeholder="" readonly tabIndex="-1"/>

                                    <label class="mdl-textfield__label" for="post-action"><b>With Selected: </b></label>

                                    <ul class="mdl-menu mdl-menu--bottom-left mdl-js-menu dark_dropdown" for="post-action">
                                        <li class="mdl-menu__item">Trash</li>
                                        <li class="mdl-menu__item">Delete Permanently</li>
                                    </ul>

                                    <label for="post-action">
                                        <i class="mdl-icon-toggle__label material-icons">arrow_drop_down</i>
                                    </label>
                                </div><input style=" padding-left:20px" type="submit" name="submit" value="action" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-shadow--8dp mdl-button--colored ">
    </form>

    <form style="padding-left:20px" action="" method="GET"><div class="mdl-cell mdl-cell--4-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select">
                                    <input class="mdl-textfield__input" value="" type="text" id="post-sort" placeholder="" readonly tabIndex="-1"/>

                                    <label class="mdl-textfield__label" for="post-sort"><b>Sort by: </b></label>

                                    <ul class="mdl-menu mdl-menu--bottom-left mdl-js-menu dark_dropdown" for="post-sort">
                                        <li class="mdl-menu__item">Type</li>
                                        <li class="mdl-menu__item">Category</li>
                                    </ul>

                                    <label for="post-sort">
                                        <i class="mdl-icon-toggle__label material-icons">arrow_drop_down</i>
                                    </label>
                                </div><input style="padding-left:20px" type="submit" name="submit" value="sort" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-shadow--8dp mdl-button--colored ">
    </form>
    <style>
    #add-button {
      position: fixed;
      display: block;
      right: 0;
      bottom: 0;
      margin-right: 40px;
      margin-bottom: 40px;
      z-index: 900;
    }
    </style>

    <a href="upload">
                            <button id="add-button" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--fab mdl-shadow--8dp mdl-button--colored ">
                                <i class="material-icons mdl-js-ripple-effect">add</i>
                            </button>
    </a>

    </div>

    <table id="table" class="mdl-data-table mdl-js-data-table mdl-data-table--selectable mdl-shadow--2dp projects-table sortable">
    <th class="mdl-data-table__cell--non-numeric" style="max-width:20px">ID</th>
    <th class="mdl-data-table__cell--non-numeric">Post</th>
    <th class="mdl-data-table__cell--non-numeric">Image</th>
    <th class="mdl-data-table__cell--non-numeric">Actions</th>
    <?php
    // output data of each row
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
        $date = $row["created_at"]; ?>
        <tr>
        <td class="mdl-data-table__cell--non-numeric"><?php echo "$post_id"; ?></td>
        <td class="mdl-data-table__cell--non-numeric"><?php echo "$post_title"; ?></td>
        <td class="mdl-data-table__cell--non-numeric"><img src="../media/uploads/<?php echo "$image"; ?>" alt="<?php echo "$post_title"; ?>" style="float:left;width:300px;margin:10px" class="border-tlr-radius"/></td>
        <td><center>    <form name="post_view_form" action="../blog.php" method="GET">
        <input type="hidden" name="post_id" value="<?php echo "$post_id"; ?>">
        <input type="submit" name="action" value="view" style="border-radius:5px;font-variant: small-caps;">
    </form><form name="post_edit_form" action="post-edit.php" method="GET">
        <input type="hidden" name="post_id" value="<?php echo "$post_id"; ?>">
        <input type="submit" name="action" value="edit" style="border-radius:5px;font-variant: small-caps;">
    </form>
    <form name="post_delete_form" action="post-edit.php" method="GET">
        <input type="hidden" name="post_id" value="<?php echo "$post_id"; ?>">
        <input type="submit" name="action" value="trash" style="border-radius:5px;font-variant: small-caps;">
    </form></center></td></tr>
    <?php
    } ?>
    </table>
    </div>
    </div>

<?php
} else {
    echo "<center><br><h2>No posts found!</h2></center>";
}
    mysqli_close($conn);
    ?>
</main>
<?php inc_afooter(); ?>