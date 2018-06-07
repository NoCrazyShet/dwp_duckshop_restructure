<?php
require_once("./backdexPageControllers/backdexNewsEditController.php");
?>
    <div class="row center">
        <div class="col s12 m12">
            <div class="card">

                <table class="centered">
                    <thead>
                    <tr>
                        <th>ARTICLE NAME</th>
                        <th>ARTICLE SUBTITLE</th>
                        <th>ARTICLE CONTENT</th>
                        <th>REMOVE</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($newsInfo as $article){ ?>
                        <tr>
                            <td><a href="./backdex.php?page=backdexNews&articleID=<?php echo$article['articleID']; ?>"><?php echo $article['articleTitle'] ?></a></td>
                            <td><?php echo $article['articleSubTitle']; ?></td>
                            <td ><?php if(strlen($article['articleText']) > 20) {echo substr($article['articleText'], 0, 20)."...";}else {echo $article['articleText'];} ?></td>
                            <td><a href="./backdex.php?page=backdexNewsEdit&action=remove&articleID=<?php echo $article['articleID']; ?>"><i class="material-icons red-text">remove_circle</i></a></td>
                        </tr>
                    <?php }?>
                    <tr>
                        <td><p class="strongtext"></p></td>
                        <td></td>
                        <td><p class="strongtext"></p></td>
                        <td></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col s12 m12"><a href="./backdex.php?page=backdexNews"><button class="btn-large indigo lighten-1">Create a new article</button></a></div>
            </div>
        </div>
    </div>

