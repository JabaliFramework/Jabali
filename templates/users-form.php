<?php
/**
 * @package Jabali Framework
 * @subpackage Feedback
 * @version 17.02.1
 * @author Mtaandao Digital Solutions
 * @see http://mtaandao.co.ke/framework
 * @link http://github.com/JabaliFramework/Jabali
 */

    $title = 'Add New Profile';
    include ('header.php');  ?>
        <main class="mdl-layout__content mdl-color--grey-100">
        <div class="pot-row-padding pot-theme">
                <div class="mdl-card__supporting-text">
                    <form id="admin-post-form" action="" method="POST" enctype="multipart/form-data">
                            <h3>Add New Profile</h3>
                            <p>Email Address:<input class="mdl-textfield__input" type="text" name="email" id="email" placeholder="" value="" style="max-width: 50%"/></p>
                            <p>Username:<input class="mdl-textfield__input" type="text" name="nicename" id="nicename" placeholder="" value="" style="max-width: 50%"/></p>
                            <p>Name:<input class="mdl-textfield__input" type="text" name="nicename" id="nicename" placeholder="" value="" style="max-width: 50%"/></p>
                            <p>Bio:</p><textarea class="mdl-textfield__input" type="text" rows="10" name="comment" id="comment" value="" ></textarea><script>CKEDITOR.replace( 'comment' );</script>
                            <p>Skills:<input class="mdl-textfield__input" type="text" name="nicename" id="nicename" placeholder="" value="" style="max-width: 50%"/></p>
                            <p>website:<input class="mdl-textfield__input" type="text" name="nicename" id="nicename" placeholder="" value="" style="max-width: 50%"/></p>
                            <p>Avatar:<input class="mdl-button mdl-textfield__input" type="file" name="nicename" id="nicename" placeholder="" value="" style="max-width: 25%"/></p>
                            <input type="hidden" name="cap" value="creative">
                            <input type="submit" name="submit" value="SUBMIT" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
                    </form>
            </div>
        </div>
        </main>
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

inc_footer ();