<?php 


    include 'config/db.php';
    $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

        // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM pot_comments WHERE read_unread='unread'";
    $result = $conn->query($sql);
    $count = $result->num_rows;

    if ( $count > 0) { ?>
    <div class="material-icons mdl-badge mdl-badge--overlap mdl-button--icon message" id="inbox" data-badge="<?php echo $count; ?>">
                mail_outline
            </div>

<!-- Messages dropdown-->
            <ul class="mdl-menu mdl-list mdl-js-menu mdl-js-ripple-effect mdl-menu--bottom-right mdl-shadow--2dp messages-dropdown"
                for="inbox">
                <li class="mdl-list__item">
                    <?php echo 'You have '.$count.' Unread message!' ?>
                </li>

    <?php
    while($row = $result->fetch_assoc()) {

?>
            <form id="comment" name="comment" action="comment.php" method="GET">
                <li class="mdl-menu__item mdl-list__item mdl-list__item--two-line list__item--border-top">
                    <span class="mdl-list__item-primary-content">
                    <span><?php echo $row["nicename"]; ?></span>
                    <span class="mdl-list__item-sub-title"><?php echo $row["email"]; ?></span>
                    </span>
                    <span class="mdl-list__item-secondary-content">
                    <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
                    <input type="submit" class="" name="action" value="View">
                    </span>
                </li>
            </form>
            <?php
	}
} else {

            	echo '<li class="mdl-list__item list__item--border-top">
            	                    <a href="feedback.php"><button href="feedback.php" class="mdl-button mdl-js-button mdl-js-ripple-effect">NO NEW MESSAGES</button></a>
            	                </li>';
}
?>

                <li class="mdl-list__item list__item--border-top">
                    <a href="feedback.php"><button href="feedback.php" class="mdl-button mdl-js-button mdl-js-ripple-effect">SHOW ALL MESSAGES</button></a>
                </li>
            </ul>

<?php
    mysqli_close($conn);
    ?>