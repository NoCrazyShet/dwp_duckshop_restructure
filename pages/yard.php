<?php
require_once("./pagecontrol/yardController.php");

echo intval($_SESSION['acLe']);
echo '<form action="index.php?page=yard&login=false" method="post">';
    echo '<button type="submit" class="waves-effect waves-light btn-large">Log Out</button>';
echo '</form>';