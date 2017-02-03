<?php 

    $title = 'Edit Profile';
    include ('header.php'); ?>
    <div class="dash-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
      <header class="dash-header mdl-layout__header mdl-color--grey-100 mdl-color-text--grey-600">
        <div class="mdl-layout__header-row">
        </div>
      </header>

      <?php include ('templates/dash/header.php'); ?>

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
                                    <i class="material-icons pull-left" style="color: #008080;">mail_outline</i>

                                    <div class="mdl-textfield mdl-js-textfield pull-left">
                                        <input class="mdl-textfield__input" type="text" id="email" value=""/>
                                        <label class="mdl-textfield__label" for="email"> hi@mtaandao.co.ke</label>
                                    </div>
                                </div>

                            </div>

                            <div class="mdl-grid">
                                <div class="mdl-cell mdl-cell--9-col input-group">
                                <h6 style="color: #cfcfcf;">http://www.facebook.com/</h6>
                                    <i class="fa fa-facebook pull-left" style="color: #008080;"></i>

                                    <div class="mdl-textfield mdl-js-textfield pull-left">
                                        <input class="mdl-textfield__input" type="text" id="address"/>
                                        <label class="mdl-textfield__label" for="address"> username</label>
                                    </div>
                                </div>

                            </div>

                            <div class="mdl-grid">
                                <div class="mdl-cell mdl-cell--9-col input-group">
                                    <i class="fa fa-twitter pull-left" style="color: #008080;"></i>

                                    <div class="mdl-textfield mdl-js-textfield pull-left">
                                        <input class="mdl-textfield__input" type="text" id="address"/>
                                        <label class="mdl-textfield__label" for="address"> @username</label>
                                    </div>
                                </div>

                            </div>

                            <div class="mdl-grid">
                                <div class="mdl-cell mdl-cell--9-col input-group">
                                    <i class="fa fa-instagram pull-left" style="color: #008080;"></i>

                                    <div class="mdl-textfield mdl-js-textfield pull-left">
                                        <input class="mdl-textfield__input" type="text" id="address"/>
                                        <label class="mdl-textfield__label" for="address">@username</label>
                                    </div>
                                </div>

                            </div>

                            <div class="mdl-grid">
                                <div class="mdl-cell mdl-cell--9-col input-group">
                                    <i class="fa fa-google-plus pull-left" style="color: #008080;"></i>

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
                            <input class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" type="submit" name="create_account" value="update">
                        </div>
                    </form>
                </div>
        </div>
        </div>
        </main>
     
