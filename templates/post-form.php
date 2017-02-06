<?php
/**
 * @package Jabali Framework
 * @subpackage Feedback
 * @version 17.02.1
 * @author Mtaandao Digital Solutions
 * @see http://mtaandao.co.ke/framework
 * @link http://github.com/JabaliFramework/Jabali
 */

    $title = 'Add New Post';
    include ('header.php');  ?>
        <main class="mdl-layout__content mdl-color--grey-100">
        <div class="container" style="background-color: white;">
        <div class="pot-row-padding pot-theme">
                <div class="mdl-card__supporting-text">
                    <form action="" class="form" method="POST">
                        <div class="form__article">
                            <h3 style="color: black;"><?php echo $title; ?></h3>

                            <div class="mdl-grid">
                                <div class="mdl-cell mdl-cell--8-col mdl-textfield mdl-js-textfield">
                                    <input class="mdl-textfield__input" type="text" id="title" placeholder="Post Title" value=""/>
                                </div>

                                <div class="mdl-cell mdl-cell--4-col mdl-textfield mdl-js-textfield">
                                    <input class="mdl-textfield__input" type="text" id="secondName" placeholder="Post Type" value="" list="post_types">
                                        <datalist id="post_types">
                                        <option value="Artist">Artist</option>
                                        <option value="Poet">Poet</option>
                                        </datalist>
                                </div>
                            </div>
                        </div>

                        <div class="form__article employer-form__contacts">
                            <h3 style="color: black;">Category</h3>

                            <div class="mdl-grid">
                                <div class="mdl-cell mdl-cell--9-col input-group">
                                    <div class="mdl-textfield mdl-js-textfield pull-left">
                                        <input class="mdl-textfield__input" type="text" id="phone" list="post_categories">
                                        <datalist id="post_categories">
                                        <option value="Artist">Artist</option>
                                        <option value="Poet">Poet</option>
                                        </datalist>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form__article employer-form__contacts">
                            <h3 style="color: black;">Tags</h3>

                            <div class="mdl-grid">
                                <div class="mdl-cell mdl-cell--9-col input-group">
                                    <div class="mdl-textfield mdl-js-textfield pull-left">
                                        <input class="mdl-textfield__input" type="text" id="phone" list="post_tags">
                                        <datalist id="post_tags">
                                        <option value="Artist">Artist</option>
                                        <option value="Poet">Poet</option>
                                        </datalist>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form__article employer-form__general_skills">

                            <h3 style="color: black;">Post Content</h3>

                            <div class="mdl-textfield mdl-js-textfield">
                                <textarea class="mdl-textfield__input" type="text" rows="6" id="bio"></textarea><script>CKEDITOR.replace( 'bio' );</script>
                            </div>
                        </div>

                        <h3 style="color: black;">Featured Image</h3>

                        <div class="mdl-grid">
                                <div class="mdl-cell mdl-cell--7-col mdl-textfield mdl-js-textfield">
                                    <input class="mdl-textfield__input" type="file" id="firstName" placeholder=" First name" value=""/>
                                </div>

                                <div class="mdl-cell mdl-cell--5-col mdl-textfield mdl-js-textfield">
                                    <input class="mdl-textfield__input" type="text" id="secondName" placeholder="Link to image" value=""/>
                                </div>
                            </div>

                        <div class="form__action">
                            <input class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" type="submit" name="publish" value="publish">
                        </div>
                    </form>
                </div>
        </div>
        </div>
        </main>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        connect_db();
        check_db();

    function create_account() {

        $email = mysqli_real_escape_string($conn, $_POST["email"]);
        $nicename = mysqli_real_escape_string($conn, $_POST["nicename"]);
        $comment = mysqli_real_escape_string($conn, $_POST["comment"]);
        $read_unread = mysqli_real_escape_string($conn, $_POST["read_unread"]);  

        $sql = "INSERT INTO pot_users (email, nicename, comment, read_unread)
    VALUES ('".$email."','".$nicename."','".$comment."','".$read_unread."')";
    }

    create_account();

    if ($conn->multi_query($sql) === TRUE) {
        echo "<script type = \"text/javascript\">
                    alert(\"Account Created Successfully! Check your email to confirm.\");
                </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}