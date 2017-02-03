<?php 

    $title = 'Edit General Settings';
    include ('header.php'); ?>
    <main class="mdl-layout__content mdl-color--grey-100">
            <div class="mdl-card mdl-shadow--2dp employer-form" action="#">
                <div class="mdl-card__title">
                    <h2>Get In Touch</h2>
                </div>
                <div class="mdl-card__supporting-text">
                    <form action="feedback.php" class="form">
                        <div class="form__article">
                            <h3>Personal data</h3>

                            <div class="mdl-grid">
                                <div class="mdl-cell mdl-cell--6-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <input class="mdl-textfield__input" type="text" id="firstName" value=""/>
                                    <label class="mdl-textfield__label" for="firstName">First name</label>
                                </div>

                                <div class="mdl-cell mdl-cell--6-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <input class="mdl-textfield__input" type="text" id="secondName" value=""/>
                                    <label class="mdl-textfield__label" for="secondName">Second name</label>
                                </div>
                            </div>
                        </div>

                        <div class="form__article employer-form__general_skills">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <textarea class="mdl-textfield__input" type="text" rows="3" id="AboutMe"></textarea>
                                <label class="mdl-textfield__label" for="AboutMe">Your Message</label>
                            </div>
                        </div>

                        <div class="form__action">
                            <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="isInfoReliable">
                                <input type="checkbox" id="isInfoReliable" class="mdl-checkbox__input" required/>
                                <span class="mdl-checkbox__label">Accept Terms & conditions</span>
                            </label>
                            <button id="submit_button" class="submit mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
    <p style="display: none;" id="notification">Thank You!</p>

<?php inc_footer (); ?>
