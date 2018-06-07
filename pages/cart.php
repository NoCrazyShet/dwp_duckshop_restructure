<?php
include_once ("./indexPageControllers/shoppingCartViewController.php"); ?>
<div class="container center" style="margin-top: 30px;">
    <div class="row">
        <div class="col s12 m12">
            <div class="card">
            <table class="centered">
                <thead>
                <tr>
                    <th>ITEM NAME</th>
                    <th>QUANTITY</th>
                    <th>ITEM PRICE</th>
                    <th>REMOVE</th>
                </tr>
                </thead>
                <tbody>
                <?php if(isset($_SESSION['shoppingCart'])) { foreach ($_SESSION['shoppingCart'] as $cartItem){ ?>
                <tr>
                    <td><a href="./index.php?page=productDetails&productID=<?php echo $cartItem['productID'] ?>"><?php echo $cartItem['productName'] ?></a></td>
                    <td><?php echo $cartItem['qty'] ?></td>
                    <td <?php if(isset($cartItem['productSpecial'])&& $cartItem['productSpecial'] != NULL){ echo 'class="red-text"';}?>><?php if(isset($cartItem['productSpecial'])&& $cartItem['productSpecial'] != NULL){ echo $cartItem['productSpecial'];}else{ echo $cartItem['productPrice'];}?> ,-</td>
                    <td><a href="?page=<?php echo $_GET['page']; if(isset($_GET['category'])) { echo "&category=".$_GET['category'];}?>&action=removeItem&productID=<?php echo $cartItem['productID']; ?>"><i class="material-icons red-text">remove_shopping_cart</i></a></td>
                </tr>
                <?php }} elseif(!isset($_SESSION['shoppingCart'])) { ?>
                    <tr>
                        <td></td>
                        <td class="strong-text">Your shopping cart is empty</td>
                        <td></td>
                        <td></td>
                    </tr>
               <?php } ?>
                <tr>
                    <td><p class="strongtext">Total Price:</p></td>
                    <td></td>
                    <td><p class="strongtext"><?php if (isset($_SESSION['shoppingCart'])) {echo $sc->cartTotal();} ?>,- dkk</p></td>
                    <td></td>
                </tr>
                </tbody>
            </table>
            </div>
            <a href="?action=emptyCart"><i class="material-icons red-text large tooltipped" data-position="right" data-tooltip="Press to empty your cart">delete_sweep</i></a>
        </div>
    </div>
</div>
