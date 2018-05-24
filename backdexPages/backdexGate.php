<?php
require_once("./backdexPageControllers/backdexGateController.php");
?>


<div class="container center">
    <div class="row">
        <h2>Admin login</h2>
        <form class="col s12" action="./backdex.php?page=backdexPage&login=true" method="post">
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
                    <button class="waves-effect waves-light btn-large indigo lighten-1" name="Submit" type="submit" value="Submit">Login</button>
                </div>
            </div>
        </form>
        <form class="col s12 m12" method="post" action="./index.php">
            <button type="submit" class="waves-effect waves-light btn-large red">Cancel</button>
        </form>
    </div>
</div>