<?php
include_once ('./indexPageControllers/indexNewUserController.php');

?>
<div class="container center">
    <div class="row">
        <h2>Create User</h2>
        <form class="col s12" action="" method="post">
            <div class="row">
                <div class="input-field col s12">
                    <input id="eMail" type="text" name="eMail" value="">
                    <label for="eMail">E-mail</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="password" type="password" name="password" value="">
                    <label for="password">Password</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <button class="waves-effect waves-light btn-large indigo lighten-1" name="submit" type="submit" value="Create">Create user</button>
                </div>
            </div>
        </form>
        <form class="col s12 m12" method="post" action="./index.php">
            <button type="submit" class="waves-effect waves-light btn-large red">Cancel</button>
        </form>
    </div>
</div>