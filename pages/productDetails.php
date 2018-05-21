<?php
require_once("./indexPageControllers/productDetailsController.php");

?>

<div class="container">
    <div class="col s12">
        <h2 class="header"><?php echo $product['productName'];?></h2>
        <div class="card horizontal" style="padding: 10px;">
            <div class="card-image">
                <img src="./images/<?php echo $product['productIMG'];?>">
            </div>
            <div class="card-stacked">
                <div class="card-content">
                    <p><b>Product Description:</b></p>
                    <p><?php echo $product['productDescription'];?></p>
                </div>
                <div class="card-action">
                    <form method="post" action="./index.php?page=productDetails&productID=<?php echo $product['productID'];?>&action=addCart">
                        <h5 class="right-align"><?php echo $product['productPrice']?>,-</h5>
                        <div class="row valign-wrapper">
                            <div class="input-field col s2">
                                <input id="quantity" name="quantity" type="text" class="validate" value="1">
                                <label for="Quantity">Quantity</label>
                            </div>
                            <button type="submit" class="btn-small">ADD TO CART<i class="material-icons right">shopping_cart</i></button>
                        </div>
                        <h6 class="right-align"><?php echo $product['productStock']?> in stock (delivery time 1-2 working days)</h6>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <h2 class="center">Recommended products</h2>
        <?php foreach ($recommended as $key){
            foreach ($key as $value){?>
        <div class="col s12 m4">
            <div class="card">
                <div class="card-image">
                    <img src="./images/<?php echo $value['productIMG']?>" alt="">
                </div>
                <div class="card-content">
                    <p>
                        <?php echo $value['productName']?>
                    </p>
                </div>
                <div class="card-action">
                    <a href="./index.php?page=productDetails&productID=<?php echo $value['productID']?>">See this product!</a>
                </div>
            </div>
        </div>
        <?php }
        }
        ?>
    </div>
</div>
