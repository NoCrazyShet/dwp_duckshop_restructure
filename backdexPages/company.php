<?php
require_once("./backdexPageControllers/backdexCompanyController.php");
?>


<div class="row" style="margin-top: 50px;">
    <div class="card">
        <div class="card-image">
            <img src="./images/<?php echo $compInfo['logo']?>">
            <form name="imgup" method="post" action="./backdex.php?action=logo&page=company" enctype="multipart/form-data">
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
            <form class="col s12" name="lars" id="lars" method="POST" action="./backdex.php?action=update&page=company">
                <div class="row">
                    <div class="input-field col s12 m12">
                        <textarea id="logoText" name="logoText" class="materialize-textarea"><?php echo $compInfo['logoText'];?></textarea>
                        <label for="logoText">Logo Text</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m12">
                        <textarea id="aboutUs" name="aboutUs" class="materialize-textarea"><?php echo $compInfo['aboutUs'];?></textarea>
                        <label for="aboutUs">About Us</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m6">
                        <textarea id="street" name="street" class="materialize-textarea"><?php echo $compInfo['street'];?></textarea>
                        <label for="street">Street</label>
                    </div>
                    <div class="input-field col s6 m3">
                        <textarea id="streetNumber" name="streetNumber" class="materialize-textarea"><?php echo $compInfo['streetNumber'];?></textarea>
                        <label for="streetNumber">Street number</label>
                    </div>
                    <div class="input-field col s6 m3">
                        <textarea id="zipCode" name="zipCode" class="materialize-textarea"><?php echo $compInfo['zipCode'];?></textarea>
                        <label for="zipCode">Zip Code</label>
                    </div>
                </div>
                <div class="row">
                <div class="card-action">
                    <button class="waves-effect waves-light btn-large" type="submit" name="Submit" value="Submit">Update Company Information</button>
                </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>

