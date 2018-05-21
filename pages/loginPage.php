<?php
require_once("./pagecontrol/gateController.php");
?>

<div class="container center">
    <div class="row">
    <h2>Please login</h2>
        <form class="col s12" action="index.php?page=loginPage&userLogin=true" method="post">
            <div class="row">
                <div class="input-field col s12">
                    <input id="username" type="text" name="eMail" maxlength="30" value="">
                    <label for="username">Username</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="password" type="password" name="password" maxlength="30" value="">
                    <label for="password">Password</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <button class="waves-effect waves-light btn-large" name="Submit" type="submit" value="Submit">Login</button>
                </div>
            </div>
        </form>
        <div class="input-field col s12">
            <a href="./index.php?page=newUser"><button class="waves-effect waves-light btn-large">Create user</button></a>
        </div>
    </div>
</div>