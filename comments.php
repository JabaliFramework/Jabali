<?php 

    $title = 'Add New Comment';
    include ('header.php');  ?>
        <main class="mdl-layout__content mdl-color--grey-100">
            <div class="mdl-card mdl-shadow--2dp employer-form" >
                <div class="mdl-card__supporting-text">
                    <form id="admin-post-form" action="" method="POST" enctype="multipart/form-data">
                            <h3>Add New Comment</h3>
                            <p>Email Address:<input class="mdl-textfield__input" type="text" name="email" id="email" placeholder="" value="" /></p>
                            <p>Name:<input class="mdl-textfield__input" type="text" name="nicename" id="nicename" placeholder="" value="" /></p>
                            <p>Message:</p><textarea style="color: #000000" cols="140" rows="120" name="comment" id="comment" value="" ></textarea><script>CKEDITOR.replace( 'comment' );</script>
                            <input type="hidden" name="read_unread" value="unread">
                            <input type="submit" name="submit" value="SUBMIT" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
                    </form>
                </div>
            </div>
        </main>
    </div>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'admin/config/db.php';

    $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO pot_comments (email, nicename, comment, read_unread)
    VALUES ('".$_POST["email"]."','".$_POST["nicename"]."','".$_POST["comment"]."','".$_POST["read_unread"]."')";

    if ($conn->multi_query($sql) === TRUE) {
        echo "<script type = \"text/javascript\">
                    alert(\"New Comment Submitted!\");
                </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

include ('footer.php'); ?> 