<?php
$products = $db->boundQuery("SELECT * FROM product", NULL, 'fetchAll', PDO::FETCH_ASSOC, NULL);
$rowCount = 1;

//Delete product try here
if(isset($_GET['delete'])) {
    if($_GET['delete'] == 'true') {
        $id = $_GET['id'];
        $values = array('productID' => $id);
        $deleteProduct = $db->boundQuery("DELETE FROM product WHERE productID = :productID", $values);
        redirect_to("./backdex.php?page=backdexProducts");
    }
}

?>
    <div class="row">

        <div class="col s6 m3">
            <a href="./backdex.php?page=backdexProductsCreate">
                <div class="card">
                    <div class="card-image">
                        <img src="./images/egg.jpg">
                        <span class="card-title black-text">New Product</span>
                         <a class="btn-floating halfway-fab waves-effect waves-light indigo lighten-1 pulse" href="./backdex.php?page=backdexProductsCreate"><i class="material-icons">add</i></a>
                    </div>
                    <div class="card-content">
                        This is where you add new products.
                    </div>
                </div>
            </a>
        </div>

    <?php
foreach ($products as $row) {

    ?>
        <div class="col s6 m3">
            <div class="card">
                <div class="card-image">
                    <img src="./images/<?php echo $row['productIMG'] ?>">
                    <span class="card-title black-text"><?php echo $row['productName']?></span>
                </div>
                <div class="card-content">
                    <?php echo $row['productName'] ?>
                </div>
                <div class="card-action">
                    <a href="./backdex.php?page=backdexProductsUpdate&id=<?php echo $row['productID']?>">Update product</a>
                </div>
                   <div class="card-action">
                    <a href="./backdex.php?page=backdexProducts&id=<?php echo $row['productID']?>&delete=true" style="color: red;">Delete product</a>
                 </div>
            </div>
        </div>
    <?php
     $rowCount++;
    if ($rowCount % 4 == 0) echo '</div><div class="row">';
}
