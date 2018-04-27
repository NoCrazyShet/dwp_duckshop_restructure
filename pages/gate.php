<?php
require_once("./pagecontrol/gateController.php");

echo '<div class="row">';
    echo '<h2>Please login</h2>';
    echo '<form class="col s12" action="index.php?page=gate&login=true" method="post">';
        echo '<div class="row">';
            echo '<div class="input-field col s12">';
                echo '<input id="username" type="text" name="eMail" maxlength="30" value="">';
                echo '<label for="username">Username</label>';
            echo '</div>';
        echo '</div>';
        echo '<div class="row">';
            echo '<div class="input-field col s12">';
                echo '<input id="password" type="password" name="password" maxlength="30" value="">';
                echo '<label for="password">Password</label>';
            echo '</div>';
        echo '</div>';
        echo '<div class="row">';
            echo '<div class="input-field col s12">';
                echo '<button class="waves-effect waves-light btn-large" name="Submit" type="submit" value="Submit">Login</button>';
            echo '</div>';
        echo '</div>';
    echo '</form>';
echo '</div>';