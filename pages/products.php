
<?php
require_once ('./indexPageControllers/indexProductController.php');

?>
<div class="container">
    <div class="row">
        <div class="row">
            <h1 class="center">These are the producks</h1>
        </div>
<?PHP
    foreach ($product as $row) {
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
                        <?php if(($row['productSpecial']) != NULL){ ?>
                            <h5 class="red-text"><?php echo $row['productSpecial'];?>,-</h5>
                        <?php } else {?>
                        <h5 ><?php echo $row['productPrice']?>,-</h5>
                        <?php } ?>

                        <button type="submit" class="btn-small indigo lighten-1">ADD TO CART<i class="material-icons right">shopping_cart</i></button>
                    </form>
                </div>
            </div>
        </div>
    <?php
        if ($rowCount % 4 == 0) echo '</div><div class="row">';
    }?>
</div>
    <?php
    if(!isset($_GET['action'])) {
    ?>
<div class="row center">
    <ul class="pagination">
        <li><a href="index.php?page=products&pager=<?php if(isset($_GET['pager']) && $_GET['pager'] != 1){echo $_GET['pager']-1;} else {echo 1;} ?>"><i class="material-icons">chevron_left</i></a></li>
            <?php
            if(isset($numbers) && $numbers > 0){
                foreach ($numbers as $num) {
                        echo '<li class="waves-effect"><a href="./index.php?page=products&pager=' . $num . '">' . $num . '</a></li>';
                }
            }
            ?>
        <li><a href="index.php?page=products&pager=<?php if(isset($_GET['pager']) && $_GET['pager'] != count($numbers)){echo $_GET['pager']+1;} else {echo count($numbers);}?>"><i class="material-icons">chevron_right</i></a></li>
    </ul>
</div>
    <?php }
