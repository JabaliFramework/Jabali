<?php 

    $title = 'Edit General Settings';
    include ('admin-header.php'); ?>
        <main class="mdl-layout__content mdl-color--grey-100">
            <div class="mdl-card mdl-shadow--2dp employer-form" action="#">
                <div class="mdl-card__title">
                    <h2>General Settings</h2>
                </div>
                <div class="mdl-card__supporting-text">
                    <form id="settings-general-form" action="settings.php" class="form">
                    <div class="form__article">
                        <div class="mdl-grid">
                            <div class="mdl-cell mdl-cell--12-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <h3>Site Details</h3>
                                <p>Site Name:<input class="mdl-textfield__input" type="text" id="firstName" placeholder="Jabali Store" value="A Mtaandao Site" /></p>
                                <p>Site Description:<input class="mdl-textfield__input" type="text" id="firstName" placeholder="A Jabali Site" value="898998" /></p>
                                <p>Site Logo:<input class="mdl-textfield__input" type="file" id="firstName"/></p>
                            </div>
                        </div>
                        <div class="mdl-grid">
                            <div class="mdl-cell mdl-cell--12-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <h3>Adminstrator Details</h3>
                                <p>Name:<input class="mdl-textfield__input" type="text" id="firstName" placeholder="Jabali Store" value="A Mtaandao Site" /></p>
                                <p>Bio:<input class="mdl-textfield__input" type="text" id="firstName" placeholder="A Jabali Site" value="898998" /></p>
                                <p>Email:<input class="mdl-textfield__input" type="text" id="firstName" placeholder="email@domain.com" value="email@domain.com" /></p>
                                <p>Image:<input class="mdl-textfield__input" type="file" id="firstName"/></p>
                            </div>
                        </div>
                    </div>

                        <div class="form__action">
                            <button id="submit_button" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
                                Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
    <p style="display: none;" id="notification">Thank You!</p>

<?php include ('admin-footer.php'); ?>



