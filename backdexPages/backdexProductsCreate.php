<?php
require_once("./backdexPageControllers/backdexProductCreateController.php");
?>

<div class="row" style="margin-top: 50px;">
    <div class="card">

        <div class="card-content">
            <div class="row">
                <form class="col s12" name="create" id="create" method="POST" action="./backdex.php?page=backdexProductsCreate&action=create">
                    <div class="row">
                        <div class="input-field col s12 m12">
                            <textarea id="categoryID" name="categoryID" class="materialize-textarea" required></textarea>
                            <label for="categoryID">Category ID</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m12">
                            <textarea id="productName" name="productName" class="materialize-textarea" required></textarea>
                            <label for="productName">Product Name</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m12">
                            <textarea id="productDescription" name="productDescription" class="materialize-textarea" required></textarea>
                            <label for="productDescription">Product Description</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m12">
                            <textarea id="productPrice" name="productPrice" class="materialize-textarea" required></textarea>
                            <label for="productPrice">Product Price</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m12">
                            <textarea id="productStock" name="productStock" class="materialize-textarea" required></textarea>
                            <label for="productStock">Product stock</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="card-action">
                            <button class="waves-effect waves-light btn-large" type="submit" name="Submit" value="Submit">Save changes and chose product image</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
