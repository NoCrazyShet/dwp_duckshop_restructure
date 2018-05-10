<?php
require_once ('./backdexPageControllers/backdexProductUpdateController.php');
?>

<div class="row" style="margin-top: 50px;">
    <div class="card">
        <div class="card-image">
            <img src="./images/<?php echo $updateProduct['productIMG']?>">
            <form name="imgup" method="post" action="./backdex.php?action=productImage&page=backdexProductsUpdate&id=<?php echo $_GET['id']?>" enctype="multipart/form-data">
                <div class="file-field input-field">
                    <div class="card-content">
                        <div class="btn">
                            <span>Change image</span>
                            <input type="file" name="image" value="">
                        </div>

                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text" placeholder="Select a file to upload">
                        </div>

                        <button class="btn waves-effect waves-light" type="submit" name="submit" value="submit">Upload new image</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="card-content">
            <div class="row">
                <form class="col s12" name="lars" id="lars" method="POST" action="./backdex.php?action=update&page=backdexProductsUpdate&id=<?PHP echo $updateProduct['productID']?>">
                    <div class="row">
                        <div class="input-field col s12 m12">
                            <textarea id="categoryID" name="categoryID" class="materialize-textarea"><?php echo $updateProduct['categoryID'];?></textarea>
                            <label for="categoryID">Category ID</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m12">
                            <textarea id="productName" name="productName" class="materialize-textarea"><?php echo $updateProduct['productName'];?></textarea>
                            <label for="productName">Product Name</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m12">
                            <textarea id="productDescription" name="productDescription" class="materialize-textarea"><?php echo $updateProduct['productDescription'];?></textarea>
                            <label for="productDescription">Product Description</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m12">
                            <textarea id="productPrice" name="productPrice" class="materialize-textarea"><?php echo $updateProduct['productPrice'];?></textarea>
                            <label for="productPrice">Product Price</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="card-action">
                            <button class="waves-effect waves-light btn-large" type="submit" name="Submit" value="Submit">Update Product</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>