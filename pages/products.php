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
                    <img src="./images/<?php echo $row['productIMG'] ?>">
                </div>
                <div class="card-content">
                    <?php echo $row['productName'] ?>
                </div>
                <div class="card-action">
                    <a class="col s5" href="./index.php?page=productDetails&productID=<?php echo $row['productID']?>">Details</a>
                    <form method="post" action="./index.php?page=products<?php if (isset($_GET['category']) && isset($_GET['catName'])) {echo "&category=".$_GET['category']."&catName=".$_GET['catName'];}?>&productID=<?php echo $row['productID'];?>&action=addCart">
                            <button type="submit" class="btn-small"><i class="material-icons right">add_shopping_cart</i><?php echo $row['productPrice']."kr"?></button>
                    </form>
                </div>
            </div>
        </div>
<?php
    if ($rowCount % 4 == 0) echo '</div><div class="row">';
}?>
</div>

