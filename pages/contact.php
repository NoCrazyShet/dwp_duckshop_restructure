<?php
include_once ('./indexPageControllers/contactFormController.php');



?>
<div class="container" style="margin-top: 50px;">
    <div class="row">
        <form class="col s12 form-contact" method="post">
            <div class="card">
                <div class="card-content">
                    <div class="row">
                        <!-- Name -->
                        <div class="input-field col s12">
                            <input placeholder="Your name" id="inputName" type="text" class="form-control" name="name" required>
                            <label for="inputName" class="sr-only">Name</label>
                        </div>
                        <!-- Email -->
                        <div class="input-field col s12">
                            <input placeholder="name@email.com" id="inputEmail" type="text" class="form-control" name="email" required>
                            <label for="inputEmail" class="sr-only">Email</label>
                        </div>
                        <!-- Subject -->
                        <div class="input-field col s12">
                            <input placeholder="Your subject" id="inputSubject" type="text" class="form-control" name="subject" required>
                            <label for="inputSubject" class="sr-only">Subject</label>
                        </div>
                        <!-- Message -->
                        <div class="input-field col s12">
                            <textarea class="form-control materialize-textarea" id="inputMessage" placeholder="Your message here" name="message"></textarea>
                            <label for="inputMessage" class="sr-only">Message</label>
                        </div>
                        <div class="input-field col s12">
                            <div class="g-recaptcha" data-sitekey="6LeghlkUAAAAAN-U0DbWdn-rvvXxmJ9dbXE6yby7"></div>
                        </div>
                        <div class="input-field col s12">
                        <button class="btn btn-lg btn-primary btn-block indigo lighten-1" type="submit" name="submit" value="SUBMIT">Submit your message</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>


