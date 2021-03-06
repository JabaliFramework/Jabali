<?php
/**
 * @package Jabali Framework
 * @subpackage Feedback
 * @version 17.02.1
 * @author Mtaandao Digital Solutions
 * @see http://mtaandao.co.ke/framework
 * @link http://github.com/JabaliFramework/Jabali
 */

    $title = 'Add New User';
    include ('header.php');  ?>
        <main class="mdl-layout__content mdl-color--grey-100">
        <div class="container" style="background-color: white;">
        <div class="pot-row-padding pot-theme">
                <div class="mdl-card__supporting-text">
                    <form action="" class="form" method="POST">
                        <div class="form__article">
                            <h3 style="color: black;">Personal data</h3>

                            <div class="mdl-grid">
                                <div class="mdl-cell mdl-cell--6-col mdl-textfield mdl-js-textfield">
                                    <input class="mdl-textfield__input" type="text" id="firstName" placeholder=" First name" value=""/>
                                </div>

                                <div class="mdl-cell mdl-cell--6-col mdl-textfield mdl-js-textfield">
                                    <input class="mdl-textfield__input" type="text" id="secondName" placeholder=" Second name" value=""/>
                                </div>
                            </div>

                            <div class="mdl-grid">
                                <div class="mdl-cell mdl-cell--6-col mdl-textfield mdl-js-textfield">
                                    <input id="datepickerb" class="mdl-textfield__input" type="text" placeholder=" Birthday" value=""/>
                                </div>

                                <div class="mdl-cell mdl-cell--6-col mdl-textfield mdl-js-textfield getmdl-select">
                                    <input class="mdl-textfield__input" value="" type="text" id="gender" placeholder=" Gender" />  
                                    </div>
                            </div>
                        </div>

                        <div class="form__article">

                            <div class="mdl-grid">
                                <div class="mdl-cell mdl-cell--6-col mdl-textfield mdl-js-textfield">
                                    <input class="mdl-textfield__input" type="text" placeholder=" Username" value="" id="position"/>
                                </div>
                                <div class="mdl-cell mdl-cell--6-col mdl-textfield mdl-js-textfield getmdl-select">
                                    <input class="mdl-textfield__input" value="" type="text" id="qualification" placeholder=" Password" />
                                </div>
                            </div>
                        </div>

                        <div class="form__article employer-form__contacts">
                            <h3 style="color: black;">Contacts</h3>

                            <div class="mdl-grid">
                                <div class="mdl-cell mdl-cell--9-col input-group">
                                    <i class="material-icons pull-left" style="color: #008080;">call</i>

                                    <div class="mdl-textfield mdl-js-textfield pull-left">
                                        <input class="mdl-textfield__input" type="text" id="phone">
                                        <label class="mdl-textfield__label" for="phone">XXX-XX-XX</label>
                                    </div>
                                </div>
                            </div>

                            <div class="mdl-grid">
                                <div class="mdl-cell mdl-cell--9-col input-group">
                                    <i class="mdi mdi-email pull-left" style="color: #008080;"></i>

                                    <div class="mdl-textfield mdl-js-textfield pull-left">
                                        <input class="mdl-textfield__input" type="text" id="email" value=""/>
                                        <label class="mdl-textfield__label" for="email"> hi@mtaandao.co.ke</label>
                                    </div>
                                </div>

                            </div>

                            <div class="mdl-grid">
                                <div class="mdl-cell mdl-cell--9-col input-group">
                                <h6 style="color: #cfcfcf;">http://www.facebook.com/</h6>
                                    <i class="mdi mdi-facebook pull-left" style="color: #008080;"></i>

                                    <div class="mdl-textfield mdl-js-textfield pull-left">
                                        <input class="mdl-textfield__input" type="text" id="address"/>
                                        <label class="mdl-textfield__label" for="address"> username</label>
                                    </div>
                                </div>

                            </div>

                            <div class="mdl-grid">
                                <div class="mdl-cell mdl-cell--9-col input-group">
                                    <i class="mdi mdi-twitter pull-left" style="color: #008080;"></i>

                                    <div class="mdl-textfield mdl-js-textfield pull-left">
                                        <input class="mdl-textfield__input" type="text" id="address"/>
                                        <label class="mdl-textfield__label" for="address"> @username</label>
                                    </div>
                                </div>

                            </div>

                            <div class="mdl-grid">
                                <div class="mdl-cell mdl-cell--9-col input-group">
                                    <i class="mdi mdi-instagram pull-left" style="color: #008080;"></i>

                                    <div class="mdl-textfield mdl-js-textfield pull-left">
                                        <input class="mdl-textfield__input" type="text" id="address"/>
                                        <label class="mdl-textfield__label" for="address">@username</label>
                                    </div>
                                </div>

                            </div>

                            <div class="mdl-grid">
                                <div class="mdl-cell mdl-cell--9-col input-group">
                                    <i class="mdi mdi-google-plus pull-left" style="color: #008080;"></i>

                                    <div class="mdl-textfield mdl-js-textfield pull-left">
                                        <input class="mdl-textfield__input" type="text" id="address"/>
                                        <label class="mdl-textfield__label" for="address">@username</label>
                                    </div>
                                </div>

                            </div>

                            <div class="mdl-grid">
                                <div class="mdl-cell mdl-cell--9-col input-group">
                                    <i class="mdi mdi-github-circle pull-left" style="color: #008080;"></i>

                                    <div class="mdl-textfield mdl-js-textfield pull-left">
                                        <input class="mdl-textfield__input" type="text" id="address"/>
                                        <label class="mdl-textfield__label" for="address">@username</label>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="form__article employer-form__general_skills">
                            <div class="mdl-grid">
                                <div class="mdl-cell mdl-cell--6-col input-group">
                            <h3 style="color: black;">Category</h3>

                            <div class="mdl-textfield mdl-js-textfield">
                                <input class="mdl-textfield__input" type="text" id="user_category" name="user_category" value="" list="user_categories">
                            <datalist id="user_categories">
                            <option value="Artist">Artist</option>
                            <option value="Poet">Poet</option>
                            </datalist>
                            </div>
                            </div>
                            <div class="mdl-cell mdl-cell--6-col input-group">
                            <h3 style="color: black;">Skills</h3>

                            <div class="mdl-textfield mdl-js-textfield">
                                <input class="mdl-textfield__input" type="text" id="user_category" name="user_category" value="" list="user_categories">
                            <datalist id="user_categories">
                            <option value="Artist">Artist</option>
                            <option value="Poet">Poet</option>
                            </datalist>
                            </div>
                            </div>
                            </div>

                            <h3 style="color: black;">Bio</h3>

                            <div class="mdl-textfield mdl-js-textfield">
                                <textarea class="mdl-textfield__input" type="text" rows="5" id="bio"></textarea><script>CKEDITOR.replace( 'bio' );</script>
                            </div>
                        </div>

                        <h3 style="color: black;">Avatar</h3>

                        <div class="mdl-grid">
                                <div class="mdl-cell mdl-cell--7-col mdl-textfield mdl-js-textfield">
                                    <input class="mdl-textfield__input" type="file" id="firstName" placeholder=" First name" value=""/>
                                </div>

                                <div class="mdl-cell mdl-cell--5-col mdl-textfield mdl-js-textfield">
                                    <input class="mdl-textfield__input" type="text" id="secondName" placeholder="Link to image" value=""/>
                                </div>
                            </div>

                        <div class="form__action">
                            <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="isInfoReliable">
                                <input type="checkbox" id="isInfoReliable" class="mdl-checkbox__input" required/>
                                <span class="mdl-checkbox__label" style="color: black;">Confirm</span>
                            </label>
                            <input class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" type="submit" name="create_account" value="submit">
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