<?php
$products = $db->runQuery("SELECT * FROM product", 'fetchAll', PDO::FETCH_ASSOC, NULL);
$rowCount = 0;
?>
    <div class="row"> <?php
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
                    <a href="#">Something</a>
                </div>
            </div>
        </div>
    <?php
     $rowCount++;
    if ($rowCount % 4 == 0) echo '</div><div class="row">';
}
