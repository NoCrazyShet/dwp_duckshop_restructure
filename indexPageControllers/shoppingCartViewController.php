
<?php foreach ($_SESSION['shoppingCart'] as $cartItem){ ?>
    <li>
        <div class="col s12 m12">
            <div class="card horizontal">
                <div class="card-image">
                    <img src="images/<?php echo $cartItem['productIMG'];?>">
                </div>
                <div class="card-stacked">
                    <div class="card-content">
                        <span class="card-title grey-text text-darken-4"><?php echo $cartItem['productName']; ?></span>
                        <br>
                        <p>Price: <?php echo $cartItem['productPrice']. "kr."?></p>
                        <br>
                        <p>Quantity: <?php echo $cartItem['qty']; ?></p>
                        <br>
                        <p>Item total: <?php  echo $cartItem['qty']*$cartItem['productPrice']; ?></p>
                    </div>
                    <div class="card-action">

                    </div>
                </div>
            </div>
        </div>
    </li>
<?php }?>