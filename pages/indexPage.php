<?php
include_once('./backdexPageControllers/backdexNewsController.php');
$slider_classes = array("left-align", "center-align", "right-align");
?>

<div class="slider">
    <ul class="slides">
        <?php foreach ($newsInfo as $news) { ?>
            <li>
                <a href="./index.php?page=newsView&articleID=<?php echo $news['articleID'] ?>"><img src="./images/<?php echo $news['articleIMG'] ?>"></a>
                <div class="caption <?php shuffle($slider_classes); $class = array_slice($slider_classes, 0, 2); echo $class[0]; ?>">
                    <h3><span class="teal" style="padding: 3px 10px 3px 10px;"><?php echo $news ['articleTitle'] ?></span></h3>
                    <h5 class="light grey-text text-lighten-3"><span class="teal" style="padding: 5px 10px 5px 10px;"><?php echo $news['articleSubTitle']?></span></h5>
                </div>
            </li>
        <?php } ?>
    </ul>
</div>
