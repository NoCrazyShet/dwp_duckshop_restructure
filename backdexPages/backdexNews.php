<?php
include_once("./backdexPageControllers/backdexNewsController.php");
confirm_admin();
?>



<?php
switch ($newsCase) {
    default:?>
           <div class="container center">
                <div class="row">
                    <form class="col s12" name="create" id="create" method="POST" action="./backdex.php?page=backdexNews&action=create">
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
        <?php
        break;
    case "picture";
        ?>
        <div class="card-image">
            <img src="./images/egg.jpg">
            <form name="imgup2" method="post" action="./backdex.php?action=newsImage&page=backdexNews&id=<?php echo $_GET['id'];?>" enctype="multipart/form-data">

                <div class="card-content">
                    <div class="file-field input-field">
                        <div class="btn">
                            <span>Change image</span>
                            <input type="file" name="image" value="">
                        </div>

                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text" placeholder="Select a file to upload">
                        </div>
                    </div>
                    <button class="btn waves-effect waves-light" type="submit" name="submit" value="submit">Upload new image</button>
                </div>

            </form>
        </div>
    <?PHP }


