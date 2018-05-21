<?php
include_once ('./indexPageControllers/indexNewsController.php');
?>
<div class="container" style="margin-top: 50px;">

        <div class="row">
            <div class="col s12 m12 l12">
                <div class="card">
                    <div class="card-action">
                        <h5 class="center"><?php echo $newsInfo2['articleTitle'] ?></h5>
                    </div>
                </div>
            </div>
            <div class="col s6 m6 l6">
              <div class="card">
                  <div class="card-content">
                      <p><?php echo $newsInfo2['articleText']?></p>
                  </div>
              </div>
            </div>

            <div class="col s6 m6 l6">
                <div class="card">
                    <div class="card-image">
                        <img src="./images/<?php echo $newsInfo2['articleIMG'] ?>">
                        <span class="card-title">Card Title</span>
                    </div>
                </div>
            </div>
        </div>
    <a class="waves-effect waves-light btn" href="index.php"><i class="material-icons left">cloud</i>Go back</a>


</div>