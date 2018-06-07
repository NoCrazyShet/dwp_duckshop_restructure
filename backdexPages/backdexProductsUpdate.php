<?php
require_once ('./backdexPageControllers/backdexProductUpdateController.php');
confirm_admin();
?>

<form class="col s12" name="update" id="update" method="POST" action="./backdex.php?page=backdexProductsUpdate&action=update&id=<?PHP echo $updateProduct['productID']?>" enctype="multipart/form-data">
    <div class="card horizontal" style="padding: 10px;">
        <div class="card-image">
            <img src="./images/<?php echo $updateProduct['productIMG']?>">
            <div class="row">
                <div class="file-field input-field col s12 m12">
                    <div class="btn grey">
                        <span>Change image</span>
                        <input type="file" name="image">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" placeholder="Select a file to upload">
                    </div>
                </div>
            </div>
        </div>

        <div class="card-stacked">
            <div class="card-content">
                <div class="row">
                    <div class="input-field col s10 m10">
                        <select name="categoryID">
                            <option value="categoryID" name="categoryID" disabled selected>Choose product category</option>
                            <?php foreach ($categorySelect as $category) { ?>
                                <option value="<?php echo $category['categoryID'] ?>" <?php if ($category['categoryID'] == $updateProduct['categoryID']) {echo "selected";} ?>><?php echo $category['categoryName'] ?></option>
                            <?php } ?>
                        </select>
                        <label for="categoryID">Category ID</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m12">
                        <textarea id="productName" name="productName" class="materialize-textarea" required><?php echo $updateProduct['productName'];?></textarea>
                        <label for="productName">Product Name</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m12">
                        <textarea id="productDescription" name="productDescription" class="materialize-textarea" required><?php echo $updateProduct['productDescription'];?></textarea>
                        <label for="productDescription">Product Description</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m12">
                        <textarea id="productPrice" name="productPrice" class="materialize-textarea" required><?php echo $updateProduct['productPrice'];?></textarea>
                        <label for="productPrice">Product Price</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m12">
                        <textarea id="productStock" name="productStock" class="materialize-textarea" required><?php echo $updateProduct['productStock'];?></textarea>
                        <label for="productStock">Product Stock</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m12">
                        <textarea name="productSpecial" id="productSpecial" class="materialize-textarea"><?php if($updateProduct['productSpecial'] != NULL) {echo $updateProduct['productSpecial'];} ?></textarea>
                        <label for="productSpecial">Product Special Price</label>
                    </div>
                </div>

            </div>
            <div class="card-action">
                <button  type="submit" name="submit" value="submit" class="btn-small indigo lighten-1 right">Update Product<i class="material-icons right">update</i></button>
            </div>
        </div>
    </div>
</form>
</div>