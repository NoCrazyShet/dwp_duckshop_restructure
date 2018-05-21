<?php
include_once ('./indexPageControllers/indexNewUserController.php');
if (!empty($message)){echo "<p>". $message. "</p>";}
?>
<div class="container center">
    <div class="row">
        <h2>Create login</h2>
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
                    <button class="waves-effect waves-light btn-large" name="submit" type="submit" value="Create">Create user</button>
                </div>
            </div>
        </form>
        <div class="input-field col s12">
            <a href="./index.php"><button class="waves-effect waves-light btn-large">Cancel</button></a>
        </div>
    </div>
</div>