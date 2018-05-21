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
                    <td><?php echo $cartItem['productName'] ?></td>
                    <td><?php echo $cartItem['qty'] ?></td>
                    <td><?php echo $cartItem['productPrice'] ?>,-</td>
                    <td><a href="?page=<?php echo $_GET['page']; if(isset($_GET['category'])) { echo "&category=".$_GET['category'];}?>&action=removeItem&productID=<?php echo $cartItem['productID']; ?>"><i class="material-icons red-text">remove_shopping_cart</i></a></td>
                </tr>
                <?php }} elseif(!isset($_SESSION['shoppingCart'])) { ?>
                    <tr>
                        <td></td>
                        <td>Your shopping cart is empty</td>
                        <td></td>
                        <td></td>
                    </tr>
               <?php } ?>
                <tr>
                    <td>Total Price:</td>
                    <td></td>
                    <td></td>
                    <td><?php if(isset($_SESSION['shoppingCart'])) { echo $sc->cartTotal(); }?>,- DKK</td>
                </tr>
                </tbody>
            </table>
            </div>
            <a class="red-text" href="?action=emptyCart"><h5>Empty your cart</h5></a>
        </div>
    </div>
</div>
