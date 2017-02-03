<?php
/**
 * @package Jabali Framework
 * @subpackage Feedback
 * @version 17.02.1
 * @author Mtaandao Digital Solutions
 * @see http://mtaandao.co.ke/framework
 * @link http://github.com/JabaliFramework/Jabali
 */

    $title = 'Get In Touch';
    include ('header.php');  ?>
        <main class="mdl-layout__content mdl-color--grey-100">
        <div class="pot-row-padding pot-theme">
                <div class="mdl-card__supporting-text">
                    <form id="admin-post-form" action="" method="POST" enctype="multipart/form-data">
                            <h3><<?php echo $title; ?></h3>
                            <p>Email Address:<input class="mdl-textfield__input" type="text" name="email" id="email" placeholder="" value="" /></p>
                            <p>Name:<input class="mdl-textfield__input" type="text" name="nicename" id="nicename" placeholder="" value="" /></p>
                            <p>Message:</p><textarea class="mdl-textfield__input" type="text" rows="5" name="comment" id="comment" value="" ></textarea><script>CKEDITOR.replace( 'comment' );</script>
                            <input type="hidden" name="read_unread" value="unread"><br>
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
                    alert(\"Mesaage Sent! We will be in touch\");
                </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}