<?php
include_once("./backdexPageControllers/backdexNewsController.php");
confirm_admin();
?>

<div class="container center">
    <div class="row">
        <form class="col s12" name="create" id="create" method="POST" action="./backdex.php?page=backdexNews&action=create" enctype="multipart/form-data">
            <div class="row">
                <div class="file-field input-field">
                    <div class="btn">
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
                    <textarea id="articleTitle" name="articleTitle" class="materialize-textarea" required></textarea>
                    <label for="articleTitle">Article Title</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m12">
                    <textarea id="articleSubTitle" name="articleSubTitle" class="materialize-textarea" required></textarea>
                    <label for="articleSubTitle">Article Subtitle</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m12">
                    <textareaz id="articleText" name="articleText" class="materialize-textarea" required></textareaz>
                    <label for="articleText"></label>
                </div>
            </div>
            <div class="row">
                <div class="card-action">
                    <button class="waves-effect waves-light btn-large indigo lighten-1" type="submit" name="Submit" value="Submit">Save article and chose article image</button>
                </div>
            </div>
        </form>
    </div>
</div>


