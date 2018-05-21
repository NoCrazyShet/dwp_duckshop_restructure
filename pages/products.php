<div class="container">
<?php
require_once ('./indexPageControllers/indexProductController.php');

?>
    <div class="row">
<h1 class="center">These are the producks</h1>
    </div>
<?PHP
    foreach ($products as $row) {
        $rowCount++;
        ?>
        <div class="col s6 m3">
            <div class="card">
                <div class="card-image">
                    <a href="./index.php?page=productDetails&productID=<?php echo $row['productID']?>">
                    <img src="./images/<?php echo $row['productIMG'] ?>">
                    </a>
                </div>
                <div class="card-content">
                    <?php echo $row['productName'] ?>
                </div>
                <div class="card-action">

                    <form method="post" action="./index.php?page=products<?php if(isset($_GET['category'])) {echo "&category=".$_GET['category'];}?>&productID=<?php echo $row['productID'];?>&action=addCart">
                        <h5><?php echo $row['productPrice']?>,-</h5>
                        <button type="submit" class="btn-small">ADD TO CART<i class="material-icons right">shopping_cart</i></button>
                    </form>
                </div>
            </div>
        </div>
<?php
    if ($rowCount % 4 == 0) echo '</div><div class="row">';
}?>
</div>

