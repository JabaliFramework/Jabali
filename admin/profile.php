<?php 

    $title = 'Profile Edit';
    include ('admin-header.php'); ?>
        <main class="mdl-layout__content mdl-color--grey-100">
            <div class="mdl-card mdl-shadow--2dp employer-form" action=""><div class="mdl-card__supporting-text">
                    <form action="#" class="form">
                        <div class="form__article">
                            <h3>Personal data</h3>

                            <div class="mdl-grid">
                                <div class="mdl-cell mdl-cell--6-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <input class="mdl-textfield__input" type="text" id="firstName" value="Luke"/>
                                    <label class="mdl-textfield__label" for="firstName">First name</label>
                                </div>

                                <div class="mdl-cell mdl-cell--6-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <input class="mdl-textfield__input" type="text" id="secondName" value="Skywalker"/>
                                    <label class="mdl-textfield__label" for="secondName">Second name</label>
                                </div>
                            </div>

                            <div class="mdl-grid">
                                <div class="mdl-cell mdl-cell--6-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <input class="mdl-textfield__input" type="text" id="birthday" value="25 May, 1977"/>
                                    <label class="mdl-textfield__label" for="birthday">Birthday</label>
                                </div>

                                <div class="mdl-cell mdl-cell--6-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select">
                                    <input class="mdl-textfield__input" value="Male" type="text" id="gender" readonly tabIndex="-1"/>

                                    <label class="mdl-textfield__label" for="gender">Gender</label>

                                    <ul class="mdl-menu mdl-menu--bottom-left mdl-js-menu dark_dropdown" for="gender">
                                        <li class="mdl-menu__item">Male</li>
                                        <li class="mdl-menu__item">Female</li>
                                    </ul>

                                    <label for="gender">
                                        <i class="mdl-icon-toggle__label material-icons">arrow_drop_down</i>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form__article">
                            <h3>Employment</h3>

                            <div class="mdl-grid">
                                <div class="mdl-cell mdl-cell--6-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <input class="mdl-textfield__input" type="text" value="CreativeIT" id="company" disabled/>
                                    <label class="mdl-textfield__label" for="company">Company</label>
                                </div>
                                <div class="mdl-cell mdl-cell--6-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <input class="mdl-textfield__input" type="text" id="company_email" value="hello@creativit.io" disabled/>
                                    <label class="mdl-textfield__label" for="company_email">Company email</label>
                                </div>
                            </div>

                            <div class="mdl-grid">
                                <div class="mdl-cell mdl-cell--6-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <input class="mdl-textfield__input" type="text" value="Lead developer" id="position"/>
                                    <label class="mdl-textfield__label" for="position">Position</label>
                                </div>
                                <div class="mdl-cell mdl-cell--6-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select">
                                    <input class="mdl-textfield__input" value="Senior" type="text" id="qualification" readonly tabIndex="-1"/>
                                    <label class="mdl-textfield__label" for="qualification">Qualification</label>
                                    <ul class="mdl-menu mdl-menu--bottom-left mdl-js-menu dark_dropdown"
                                        for="qualification">
                                        <li class="mdl-menu__item">Young Padawan</li>
                                        <li class="mdl-menu__item">Junior</li>
                                        <li class="mdl-menu__item">Middle</li>
                                        <li class="mdl-menu__item">Senior</li>
                                    </ul>
                                    <label for="qualification">
                                        <i class="mdl-icon-toggle__label material-icons">arrow_drop_down</i>
                                    </label>
                                </div>
                            </div>

                            <span>Type of employment:</span>

                            <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="partition-fulltime">
                                <input type="radio" id="partition-fulltime" class="mdl-radio__button" name="employment" value="1" checked/>
                                <span class="mdl-radio__label">Fulltime</span>
                            </label>
                            <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="partition-partTime">
                                <input type="radio" id="partition-partTime" class="mdl-radio__button" name="employment" value="2"/>
                                <span class="mdl-radio__label">Part time</span>
                            </label>
                            <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="partition-remote">
                                <input type="radio" id="partition-remote" class="mdl-radio__button" name="employment" value="3"/>
                                <span class="mdl-radio__label">Remote</span>
                            </label>
                        </div>

                        <div class="form__article employer-form__contacts">
                            <h3>Contacts</h3>

                            <div class="mdl-grid">
                                <div class="mdl-cell mdl-cell--9-col input-group">
                                    <i class="material-icons pull-left">call</i>

                                    <div class="mdl-textfield mdl-js-textfield pull-left">
                                        <input class="mdl-textfield__input" type="text" id="phone">
                                        <label class="mdl-textfield__label" for="phone">XXX-XX-XX</label>
                                    </div>
                                </div>

                                <div class="mdl-cell mdl-cell--3-col mdl-textfield mdl-js-textfield getmdl-select">
                                    <input class="mdl-textfield__input" value="Mobile" type="text" id="phone_type" readonly tabIndex="-1"/>
                                    <ul class="mdl-menu mdl-menu--bottom-left mdl-js-menu dark_dropdown" for="phone_type">
                                        <li class="mdl-menu__item">Mobile</li>
                                        <li class="mdl-menu__item">Home</li>
                                        <li class="mdl-menu__item">Work</li>
                                    </ul>
                                    <label for="phone_type">
                                        <i class="mdl-icon-toggle__label material-icons">arrow_drop_down</i>
                                    </label>
                                </div>
                            </div>

                            <div class="mdl-grid">
                                <div class="mdl-cell mdl-cell--9-col input-group">
                                    <img src="images/skype.svg">

                                    <div class="mdl-textfield mdl-js-textfield pull-left">
                                        <input class="mdl-textfield__input" type="text" id="skype" value="Pilot_luke"/>
                                        <label class="mdl-textfield__label" for="skype">Skype</label>
                                    </div>
                                </div>

                                <div class="mdl-cell mdl-cell--3-col mdl-textfield mdl-js-textfield getmdl-select">
                                    <input class="mdl-textfield__input" value="Personal" type="text" id="skype_type" readonly tabIndex="-1"/>
                                    <ul class="mdl-menu mdl-menu--bottom-left mdl-js-menu dark_dropdown" for="skype_type">
                                        <li class="mdl-menu__item">Personal</li>
                                        <li class="mdl-menu__item">Work</li>
                                    </ul>
                                    <label for="skype_type">
                                        <i class="mdl-icon-toggle__label material-icons">arrow_drop_down</i>
                                    </label>
                                </div>
                            </div>

                            <div class="mdl-grid">
                                <div class="mdl-cell mdl-cell--9-col input-group">
                                    <i class="material-icons pull-left">mail_outline</i>

                                    <div class="mdl-textfield mdl-js-textfield pull-left">
                                        <input class="mdl-textfield__input" type="text" id="email" value="luke@skywalker.com"/>
                                        <label class="mdl-textfield__label" for="email">Email</label>
                                    </div>
                                </div>

                                <div class="mdl-cell mdl-cell--3-col mdl-textfield mdl-js-textfield getmdl-select">
                                    <input class="mdl-textfield__input" value="Work" type="text" id="email_type" readonly tabIndex="-1"/>
                                    <ul class="mdl-menu mdl-menu--bottom-left mdl-js-menu dark_dropdown" for="email_type">
                                        <li class="mdl-menu__item">Personal</li>
                                        <li class="mdl-menu__item">Work</li>
                                    </ul>
                                    <label for="email_type">
                                        <i class="mdl-icon-toggle__label material-icons">arrow_drop_down</i>
                                    </label>
                                </div>
                            </div>

                            <div class="mdl-grid">
                                <div class="mdl-cell mdl-cell--9-col input-group">
                                    <i class="material-icons pull-left">place</i>

                                    <div class="mdl-textfield mdl-js-textfield pull-left">
                                        <input class="mdl-textfield__input" type="text" id="address"/>
                                        <label class="mdl-textfield__label" for="address">Address</label>
                                    </div>
                                </div>

                                <div class="mdl-cell mdl-cell--3-col mdl-textfield mdl-js-textfield getmdl-select">
                                    <input class="mdl-textfield__input" value="Home" type="text" id="address_type" readonly
                                           tabIndex="-1"/>
                                    <ul class="mdl-menu mdl-menu--bottom-left mdl-js-menu dark_dropdown" for="address_type">
                                        <li class="mdl-menu__item">Home</li>
                                        <li class="mdl-menu__item">Work</li>
                                    </ul>
                                    <label for="address_type">
                                        <i class="mdl-icon-toggle__label material-icons">arrow_drop_down</i>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form__article employer-form__general_skills">
                            <h3>General skills</h3>

                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <textarea class="mdl-textfield__input" type="text" rows="3" id="AboutMe"></textarea>
                                <label class="mdl-textfield__label" for="AboutMe">About me</label>
                            </div>
                        </div>

                        <div class="form__action">
                            <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="isInfoReliable">
                                <input type="checkbox" id="isInfoReliable" class="mdl-checkbox__input" required/>
                                <span class="mdl-checkbox__label">Entered information is reliable</span>
                            </label>
                            <button id="submit_button" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>

<?php include ('admin-footer.php'); ?>

