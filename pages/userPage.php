<?php
require_once ('./pagecontrol/userPageController.php');
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
                                <div class="input-field col s3 m3">
                                    <textarea id="textarea2" name="CVC" class="materialize-textarea"><?php echo $customerInfo['CVC'];?></textarea>
                                    <label for="CVC">CVC</label>
                                </div>
                                <div class="input-field col s3 m3">
                                    <textarea id="textarea2" name="expirationDate" class="materialize-textarea"><?php echo $customerInfo['expirationDate'];?></textarea>
                                    <label for="expirationDate">Expiration Date</label>
                                </div>
                            </div>
                            <button type="submit" class="waves-effect waves-light btn-large">Update information</button>
                        </form>
                        <button type="submit" class="waves-effect waves-light btn-large">Log Out</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
