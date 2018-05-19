<?php
include_once('./backdexPageControllers/backdexNewsController.php');
?>

<div class="carousel carousel-slider center z-depth-1-half" data-indicators="true" style="height: 100vh;">
    <div class="carousel-item red white-text" href="#one!">
        <h2>First Panel</h2>
        <p class="white-text">This is your first panel</p>
    </div>
    <div class="carousel-item amber white-text" href="#two!">
        <h2>Second Panel</h2>
        <p class="white-text">This is your second panel</p>
    </div>
    <div class="carousel-item green white-text" href="#three!">
        <h2>Third Panel</h2>
        <p class="white-text">This is your third panel</p>
    </div>
    <div class="carousel-item blue white-text" href="#four!">
        <h2>Fourth Panel</h2>
        <p class="white-text">This is your fourth panel</p>
    </div>
</div>
<div class="container" style="margin-top: 50px;">
    <div class="row">
        <?php foreach($newsInfo as $news) { ?>
        <a href="">
            <div class="col s12 m6 l4">
                <div class="card">
                    <div class="card-image">
                        <img src="images/<?php echo $news['articleIMG']?>">
                        <span class="card-title black-text"><?php echo $news['articleTitle'] ?></span>
                    </div>
                </div>
            </div>
        </a>
        <?php } ?>
    </div>
</div>

<script>
    var elem = document.getElementById('nav');
    elem.style.setProperty('background-color','rgba(0,0,0,0)','');

    elem.style.setProperty('position', 'absolute','');

</script>