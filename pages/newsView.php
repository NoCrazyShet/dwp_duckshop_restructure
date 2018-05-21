<?php
include_once ('./indexPageControllers/indexNewsController.php');
?>
<div class="container" style="margin-top: 50px;">
    <div class="card">
        <div class="row">
            <div class="col s12 m12 l12">
                <div class="card-content" style="padding: 24px 24px 0 24px">
                    <h4 class="header"><?php echo $newsInfo2['articleTitle'] ?></h4>
                </div>
            </div>
            <div class="col s12 m12 l12">
                <div class="card-content" style="padding: 0 24px 0 24px;">
                    <h5><?php echo $newsInfo2['articleSubTitle'] ?></h5>
                </div>
            </div>
            <div class="col s6 m6 l6">

                  <div class="card-content">
                      <p><?php echo $newsInfo2['articleText']?></p>
                  </div>

            </div>

            <div class="col s6 m6 l6">
                <div class="card">
                    <div class="card-image">
                        <img src="./images/<?php echo $newsInfo2['articleIMG'] ?>">
                    </div>
                </div>
            </div>
            <div class="col s12 m12 l12 center" style="padding-bottom: 30px; padding-top: 20px;">
                <a class="waves-effect waves-light btn-large center" href="index.php"><i class="material-icons left">arrow_back</i>Go back</a>
            </div>
        </div>
    </div>

</div>