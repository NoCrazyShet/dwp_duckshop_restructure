<?php
require_once("./pagecontrol/yardControl.php");
confirm_logged_in();

echo '<form action="index.php?page=yard&login=false" method="post">';
    echo '<button type="submit" class="waves-effect waves-light btn-large">Log Out</button>';
echo '</form>';