<?php
    if(isset($_SESSION['shoppingCart']) && !empty($_SESSION['shoppingCart'])) {
       $sc->cartTotal();
    }