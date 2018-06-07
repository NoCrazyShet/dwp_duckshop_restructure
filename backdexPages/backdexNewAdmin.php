<?php
require_once("./backdexPageControllers/backdexNewAdminController.php");
?>

<div class="container center">
    <div class="row">
        <h2>Create New Admin</h2>
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
                    <select name="accessLevel">
                        <option value="" disabled selected>Assign an access level</option>
                        <option value="1">Level 1 - Can edit anything</option>
                        <option value="2">Level 2 - Can edit products and news</option>
                        <option value="3">Level 3 - Can edit products</option>
                    </select>
                    <label>Access Level</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <button class="waves-effect waves-light btn-large indigo lighten-1" name="submit" type="submit" value="Create">Create user</button>
                </div>
            </div>
        </form>
        <div class="input-field col s12">
            <a href="./index.php"><button class="waves-effect waves-light btn-large indigo lighten-1">Cancel</button></a>
        </div>
    </div>
</div>
