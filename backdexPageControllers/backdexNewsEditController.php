<?php
$newsInfo = $db->boundQuery("SELECT * FROM news",NULL, 'fetchAll', PDO::FETCH_ASSOC);

if(isset($_GET['action'])) {
    $action = $_GET['action'];

    if($action == 'remove') {
        $id = $_GET['articleID'];
        $values = array('articleID' => $id);
        $deleteProduct = $db->boundQuery("DELETE FROM news WHERE articleID = :articleID", $values);
        redirect_to("./backdex.php?page=backdexNewsEdit");
    }elseif ($action == 'edit') {
        echo "wooow";
    }
}