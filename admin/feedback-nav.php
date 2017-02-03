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
            </div><div class="mdl-tooltip" data-mdl-for="inbox"><?php echo $count; ?> Unread Messages</div>

<!-- Messages dropdown-->
            <ul class="mdl-menu mdl-list mdl-js-menu mdl-js-ripple-effect mdl-menu--bottom-right mdl-shadow--2dp messages-dropdown"
                for="inbox">
                <li class="mdl-list__item">
                    <?php if ( $count == 1) {
                        echo 'You have '.$count.' Unread message!';
                    } elseif ( $count > 1) {
                        echo 'You have '.$count.' Unread messages!';
                    } ?>
                </li>

    <?php
    while($row = $result->fetch_assoc()) {

        $comment_id = $row["id"];
        $nicename = $row["nicename"];
        $email = $row["email"];

?>
            <a href="comment?id=<?php echo $comment_id; ?>">
            <li class="mdl-menu__item mdl-list__item mdl-list__item--two-line list__item--border-top">
                <span class="mdl-list__item-primary-content">
                <span><?php echo $nicename; ?></span>
                <span class="mdl-list__item-sub-title"><?php echo $email; ?></span>
                </span><br>
            </li>
            </a>

            <?php
    } ?>

            <center><a href="feedback.php"><li class="mdl-list__item list__item--border-top">
                                    <button class="mdl-button mdl-js-button mdl-js-ripple-effect">SHOW ALL MESSAGES</button>
                                </li></a></center>
            <?php
	
} else {

            	echo '<div class="material-icons mdl-badge mdl-badge--overlap mdl-button--icon message" id="inbox" data-badge="0">
                mail_outline
            </div><div class="mdl-tooltip" data-mdl-for="inbox">0 Unread Messages</div>';
}
?>         </ul>

<?php
    mysqli_close($conn);
    ?>