<?php
require_once ('./indexPageControllers/userPageController.php');
require_once("./pagecontrol/yardController.php");
?>
<div class="container center" style="margin-top: 50px;">
    <div class="row">
        <div class="col s12 m12">
            <div class="card">
                <div class="card-content">
                    <div class="row">
                        <form class="col s12 m12" name="" id="" method="post" action="./index.php?action=update&page=userPage">
                            <div class="row">
                                <div class="input-field col s6 m6">
                                    <textarea id="textarea2" name="firstName" class="materialize-textarea" data-length="300"><?php echo $customerInfo['firstName'];?></textarea>
                                    <label for="firstName">First Name</label>
                                </div>
                                <div class="input-field col s6 m6">
                                    <textarea id="textarea2" name="lastName" class="materialize-textarea"><?php echo $customerInfo['lastName'];?></textarea>
                                    <label for="lastName">last Name</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12 m12">
                                    <textarea id="textarea2" name="eMail" class="materialize-textarea"><?php echo $customerInfo['eMail'];?></textarea>
                                    <label for="eMail">E-Mail</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s3 m3">
                                    <textarea id="textarea2" name="cardHolderName" class="materialize-textarea"><?php echo $customerInfo['cardHolderName'];?></textarea>
                                    <label for="cardHolderName">Card holder name</label>
                                </div>
                                <div class="input-field col s3 m3">
                                    <textarea id="textarea2" name="cardNumber" class="materialize-textarea"><?php echo $customerInfo['cardNumber'];?></textarea>
                                    <label for="cardNumber">Card Number</label>
                                </div>
                                <div class="input-field col s2 m2">
                                    <select name="expirationMonth" id="expirationMonth">
                                        <option value="expirationMonth" id="expirationMonth" name="expirationMonth" <?php if(!isset($customerInfo['expirationMonth'])) {echo "selected";} ?> disabled>Expiration Month</option>
                                        <?php for ($x = 01; $x <= 12; $x++) { ?>
                                        <option <?php if($x == $customerInfo['expirationMonth']) {echo "selected";} ?> value="<?php echo $x ?>"><?php if($x <= 9) { echo 0; echo $x;} else echo $x; ?></option>
                                        <?php } ?>
                                    </select>
                                    <label for="expirationMonth">Month</label>
                                </div>
                                <div class="input-field col s2 m2">
                                    <select name="expirationYear" id="expirationYear">
                                        <option id="expirationYear" value="expirationYear" name="expirationYear" <?php if(!isset($customerInfo['expirationYear'])) { echo "selected";} ?> disabled>Expiration Year</option>
                                        <?php for ($x = 18; $x <= 28; $x++) { ?>
                                        <option <?php if($x == $customerInfo['expirationYear']) { echo "selected";} ?> value="<?php echo $x ?>"><?php echo $x ?></option>
                                        <?php } ?>
                                    </select>
                                    <label for="expirationYear">Year</label>
                                </div>
                                <div class="input-field col s2 m2">
                                    <textarea id="textarea2" name="CVC" class="materialize-textarea"><?php echo $customerInfo['CVC'];?></textarea>
                                    <label for="CVC">CVC</label>
                                </div>
                            </div>
                            <button type="submit" class="waves-effect waves-light btn-large indigo lighten-1">Update information</button>
                        </form>
                        <form class="col s12 m12" method="post" action="./index.php?page=userPage&login=false">
                            <button type="submit" class="waves-effect waves-light btn-large red">Log Out</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
