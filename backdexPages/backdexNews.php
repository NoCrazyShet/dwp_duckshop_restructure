<?php
include_once("./backdexPageControllers/backdexNewsController.php");
confirm_admin();
?>

<div class="container center">
    <div class="row">
        <form class="col s12" name="create" id="create" method="POST" action="<?php if(!isset($_GET['articleID'])){ echo "./backdex.php?page=backdexNews&action=create";}else {echo "./backdex.php?page=backdexNews&articleID=$articleID&action=update";}?>" enctype="multipart/form-data">
            <div class="row">
                <img class="responsive-img" src="./images/<?php if(!isset($newsUpdate['articleIMG']) or $newsUpdate['articleIMG'] == NULL){ echo "egg.jpg";}else{echo $newsUpdate['articleIMG'];} ?>">
                <div class="file-field input-field">
                    <div class="btn indigo lighten-1">
                        <span>Change image</span>
                        <input type="file" name="image" value="">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" placeholder="Select a file to upload">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m12">
                    <textarea id="articleTitle" name="articleTitle" class="materialize-textarea" required><?php if(isset($newsUpdate['articleTitle'])){ echo $newsUpdate['articleTitle'];}?></textarea>
                    <label for="articleTitle">Article Title</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m12">
                    <textarea id="articleSubTitle" name="articleSubTitle" class="materialize-textarea" required><?php if(isset($newsUpdate['articleSubTitle'])){ echo $newsUpdate['articleSubTitle'];}?></textarea>
                    <label for="articleSubTitle">Article Subtitle</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m12">
                    <textarea id="articleText" name="articleText" class="materialize-textarea richNews" required><?php if(isset($newsUpdate['articleText'])){ echo $newsUpdate['articleText'];}?></textarea>
                    <label for="articleText"></label>
                </div>
            </div>
            <div class="row">
                <div class="card-action">
                    <button class="waves-effect waves-light btn-large indigo lighten-1" type="submit" name="Submit" value="Submit">Save article</button>
                </div>
            </div>
        </form>
    </div>
</div>


