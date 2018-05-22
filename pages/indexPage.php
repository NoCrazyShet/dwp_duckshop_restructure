<?php
include_once('./indexPageControllers/indexPageController.php');
$slider_classes = array("left-align", "center-align", "right-align");
?>

<div class="slider">
    <ul class="slides">
        <?php foreach ($newsInfo as $news) { ?>
            <li>
                <a href="./index.php?page=newsView&articleID=<?php echo $news['articleID'] ?>"><img src="./images/<?php echo $news['articleIMG'] ?>"></a>
                <div class="caption <?php shuffle($slider_classes); $class = array_slice($slider_classes, 0, 2); echo $class[0]; ?>">
                    <h3><span class="teal" style="padding: 3px 10px 3px 10px;"><?php echo $news ['articleTitle'] ?></span></h3>
                    <h5 class="light grey-text text-lighten-3"><span class="teal" style="padding: 5px 10px 5px 10px;"><?php echo $news['articleSubTitle']?></span></h5>
                </div>
            </li>
        <?php } ?>
    </ul>
</div>

<div class="container" style="margin-bottom: 100px;">
    <?php if($dailySpecial != FALSE){?>
    <div class="col s12">
        <h2 class="header center">Top Ducks' daily special!</h2>
        <a href="./index.php?page=productDetails&productID=<?php echo $dailySpecial['productID']?>">
        <div class="card horizontal" style="padding: 10px;">
            <div class="card-image">
                <img src="./images/<?php echo $dailySpecial['productIMG'];?>">
            </div>
            <div class="card-stacked">
                <div class="card-content">
                    <p><b>Product Description:</b></p>
                    <p><?php echo $dailySpecial['productDescription'];?></p>
                </div>
                <div class="card-action">
                    <form method="post" action="./index.php?page=productDetails&productID=<?php echo $dailySpecial['productID'];?>&action=addCart">
                        <h5 class="right-align red-text"><?php echo $dailySpecial['productSpecial']?>,-</h5>
                        <div class="row valign-wrapper">
                            <div class="input-field col s2">
                                <input id="quantity" name="quantity" type="text" class="validate" value="1">
                                <label for="Quantity">Quantity</label>
                            </div>
                            <button type="submit" class="btn-small">ADD TO CART<i class="material-icons right">shopping_cart</i></button>
                        </div>
                        <h6 class="right-align"><?php echo $dailySpecial['productStock']?> in stock (delivery time 1-2 working days)</h6>
                    </form>
                </div>
            </div>
        </div>
        </a>
    </div>
    <?php }else { ?>
        <div class="row">
        <h2 class="center">Sorry! There seem to be no daily specials! </h2>
            <h3 class="center">Here are some recommendations instead</h3>
        <?php foreach ($recommended as $key){?>
        <div class="col s12 m4">
            <div class="card">
                <div class="card-image">
                    <img src="./images/<?php echo $key['productIMG']?>" alt="">
                </div>
                <div class="card-content">
                    <p>
                        <?php echo $key['productName']?>
                    </p>
                </div>
                <div class="card-action">
                    <a href="./index.php?page=productDetails&productID=<?php echo $key['productID']?>">See this product!</a>
                </div>
            </div>
        </div>
    <?php
    }}
    ?>
</div>
