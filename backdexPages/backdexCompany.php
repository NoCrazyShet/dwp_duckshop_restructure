<?php
require_once("./backdexPageControllers/backdexCompanyController.php");

if(isset($upmsg)){
    foreach($upmsg as $msg){echo '<div class="col s12"><h1>'.$msg.'</h1></div>';
    }
    unset($_SESSION['upmsg']);
}
?>
    <!-- All company text fields -->
    <ul class="collapsible">
        <li class="active">
            <div class="collapsible-header"><i class="material-icons">perm_identity</i>Company information</div>
            <div class="collapsible-body">
                <div class="row">
                                    <form class="col s12 m12" name="" id="" method="post" action="./backdex.php?action=update&page=backdexCompany">
                                        <div class="row">
                                            <div class="input-field col s12 m12">
                                                <textarea id="textarea2" name="CVR" class="materialize-textarea" disabled data-length="8"><?php echo $compInfo['CVR'];?></textarea>
                                                <label for="CVR">Working with this CVR:</label>
                                            </div>
                                            <!-- First line -->
                                            <div class="input-field col s12 m12">
                                                <textarea id="textarea2" name="logoText" class="materialize-textarea" data-length="300"><?php echo $compInfo['logoText'];?></textarea>
                                                <label for="logoText">Logo Text</label>
                                            </div>
                                            <!-- Second line -->
                                            <div class="input-field col s12 m12">
                                                <textarea id="textarea2" name="aboutUs" class="materialize-textarea" data-length="500"><?php echo $compInfo['aboutUs'];?></textarea>
                                                <label for="aboutUs">About us</label>
                                            </div>
                                            <!-- Third line -->
                                            <div class="input-field col s12 m6">
                                                <textarea id="textarea2" name="street" class="materialize-textarea" data-length="30"><?php echo $compInfo['street'];?></textarea>
                                                <label for="street">Street</label>
                                            </div>
                                            <!-- Fourth line -->
                                            <div class="input-field col s12 m3">
                                                <textarea id="textarea2" name="streetNumber" class="materialize-textarea" data-length="3"><?php echo $compInfo['streetNumber'];?></textarea>
                                                <label for="streetNumber">Street number</label>
                                            </div>
                                            <!-- Fifth line -->
                                            <div class="input-field col s12 m3">
                                                <textarea id="textarea2" name="zipCode" class="materialize-textarea" data-length="4"><?php echo $compInfo['zipCode'];?></textarea>
                                                <label for="zipCode">Zip code</label>
                                            </div>
                                            <!-- Sixth line -->
                                            <div class="input-field col s12 m12">
                                                <textarea id="textarea2" name="phone" class="materialize-textarea" data-length="8"><?php echo $compInfo['phone'];?></textarea>
                                                <label for="phone">Phone</label>
                                            </div>
                                            <!-- Seventh line -->
                                            <div class="input-field col s12 m12">
                                                <textarea id="textarea2" name="eMail" class="materialize-textarea" data-length="60"><?php echo $compInfo['eMail'];?></textarea>
                                                <label for="eMail">E-mail</label>
                                            </div>
                                        </div>
                                        <!-- UPDATE COMPANY INFORMATION button -->
                                        <div class="card-action center" style="border-top: 0;">
                                            <button class="waves-effect waves-light btn-large" type="submit" name="Submit" value="Submit">Update Company Information</button>
                                        </div>
                                    </form>
            </div>
        </li>
        <li>
            <div class="collapsible-header"><i class="material-icons">image</i>Company logo</div>
            <div class="collapsible-body">
                        <div class="card">
                            <div class="card-image">
                                <img src="./images/<?php echo $compInfo['logo']?>">
                                <form name="imgup" method="post" action="./backdex.php?action=logo&page=backdexCompany" enctype="multipart/form-data">
                                    <div class="file-field input-field">
                                        <div class="card-content" style="min-height: 150px;">
                                            <div class="btn" style="background-color: lightgrey"><i class="material-icons right">camera_alt</i>
                                                <span>Change image</span>
                                                <input type="file" name="image" value="">
                                            </div>
                                            <div class="file-path-wrapper">
                                                <input class="file-path validate" type="text" placeholder="Select a file to upload">
                                            </div>
                                            <button class="btn waves-effect waves-light" type="submit" name="submit" value="submit"><i class="material-icons right">check_box</i>Upload new image</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
        </li>
        <li>
            <div class="collapsible-header"><i class="material-icons">perm_contact_calendar</i>Company contact information</div>
            <div class="collapsible-body">
                    <div class="row">
                        <form class="col s12 m12" name="" id="" method="post" action="./backdex.php?action=update&page=backdexCompany">
                            <ul class="collection l12 s12">
                                <?php foreach ($compInfoContact as $openHour){ ?>
                                        <li class="collection-item col s5 m5" name="openDay"><?php echo $openHour['openDay']?></li>
                                        <li class="collection-item col s5 m5" name="openHours"><?php echo $openHour['openHours']?></li>
                                        <li><a class="collection-item col s2 m2" href="./backdex.php?page=backdexProductsUpdate&id=<?php echo $row['productID']?>">Update product</a></li>
                               <?php } ?>
                            </ul>
                            <div class="card-action center" style="border-top: 0;">
                                <button class="waves-effect waves-light btn-large" type="submit" name="Submit" value="Submit">Update Company Contact Information</button>
                            </div>
                        </form>
                    </div>
            </div>
        </li>
    </ul>



