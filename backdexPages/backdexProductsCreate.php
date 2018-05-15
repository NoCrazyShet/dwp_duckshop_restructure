<?php
require_once("./backdexPageControllers/backdexProductCreateController.php");
?>

<div class="row" style="margin-top: 50px;">

<?php
switch ($productCase) {
    default:?>
        <div class="card">
            <div class="card-content">
                <div class="row">
                    <form class="col s12" name="create" id="create" method="POST" action="./backdex.php?page=backdexProductsCreate&action=create">

                        <div class="row">
                            <div class="input-field col s12 m12">
                                <select name="categoryID">
                                     <option value="categoryID" name="categoryID" disabled selected>Choose product category</option>
                                     <?php foreach ($categorySelect as $category) { ?>
                                     <option value="<?php echo $category['categoryID'] ?>"><?php echo $category['categoryName'] ?></option>
                                     <?php } ?>
                                </select>
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
<?php
        break;
    case "picture";
    ?>

<div class="card">
    <div class="card-image">
        <img src="./images/<?php echo $updateProduct['productIMG']?>">
        <form name="imgup" method="post" action="./backdex.php?action=productImage&page=backdexProductsCreate&id=<?php echo $_GET['id'];?>" enctype="multipart/form-data">

                <div class="card-content">
                    <div class="file-field input-field">
                    <div class="btn">
                        <span>Change image</span>
                        <input type="file" name="image" value="">
                    </div>

                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" placeholder="Select a file to upload">
                    </div>
                    </div>
                    <button class="btn waves-effect waves-light" type="submit" name="submit" value="submit">Upload new image</button>
                </div>

        </form>
    </div>



<?PHP }