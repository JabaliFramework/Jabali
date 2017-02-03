<?php 

    $title = 'Users';
    include ('admin-header.php'); 
    ?>
        <main class="mdl-layout__content mdl-color--white-100">
        <?php
    connect_db();
    check_db();

    $sql = "SELECT * FROM pot_users";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) { ?>
                <!-- Table-->
    <div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--12-col-phone ">
    <div style="display:inline-flex;">

    <a href="user-new">
                        <button class="add-button mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--fab mdl-shadow--8dp mdl-button--colored ">
                            <i class="material-icons mdl-js-ripple-effect">add</i>
                        </button>
    </a>
    
    <table id="table" class="mdl-data-table mdl-js-data-table mdl-data-table--selectable mdl-shadow--2dp projects-table sortable">
    <th class="mdl-data-table__cell--non-numeric" style="max-width:20px">ID</th>
    <th class="mdl-data-table__cell--non-numeric">Username</th>
    <th class="mdl-data-table__cell--non-numeric">Email</th>
    <th class="mdl-data-table__cell--non-numeric">Bio</th>
    <th class="mdl-data-table__cell--non-numeric">Full Names</th>
    <th class="mdl-data-table__cell--non-numeric">Date Joined</th>
    <th class="mdl-data-table__cell--non-numeric">Actions</th>
    <?php
    // output data of each row
    while($row = $result->fetch_assoc()) {

        $user_id = $row["id"];
        $username = $row["username"];
        $email = $row["email"];
        $password = $row["password"];
        $nicename = $row["nicename"];
        $date = $row["reg_date"]; ?>
        <tr>
        <td class="mdl-data-table__cell--non-numeric"><?php echo "$user_id"; ?></td>
        <td class="mdl-data-table__cell--non-numeric"><?php echo "$username"; ?></td>
        <td class="mdl-data-table__cell--non-numeric"><?php echo "$email"; ?></td>
        <td class="mdl-data-table__cell--non-numeric"><?php echo "$password"; ?></td>
        <td class="mdl-data-table__cell--non-numeric"><?php echo "$nicename"; ?></td>
        <td class="mdl-data-table__cell--non-numeric"><?php echo "$date"; ?></td>
        <td><center>    <form name="post_view_form" action="../blog.php" method="GET">
        <input type="hidden" name="post_id" value="<?php echo "$post_id"; ?>">
        <input type="submit" name="action" value="view" style="border-radius:5px;font-variant: small-caps;background-color: green;">
    </form><form name="post_edit_form" action="post-edit.php" method="GET">
        <input type="hidden" name="post_id" value="<?php echo "$post_id"; ?>">
        <input type="submit" name="action" value="edit" style="border-radius:5px;font-variant: small-caps;background-color: orange;">
    </form>
    <form name="post_delete_form" action="post-edit.php" method="GET">
        <input type="hidden" name="post_id" value="<?php echo "$post_id"; ?>">
        <input type="submit" name="action" value="trash" style="border-radius:5px;font-variant: small-caps;background-color: red;">
    </form></center></td></tr>
    <?php
    } ?>
    </table>
    </div>

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
    </div>
    </div>

<?php
} else {
    echo "<center><br><h2>No Users found!</h2></center>";
}
    mysqli_close($conn);
    ?>
</main>
<?php inc_afooter(); ?>