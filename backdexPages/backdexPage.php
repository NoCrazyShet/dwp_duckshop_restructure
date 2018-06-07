<?php
confirm_admin();
admin_level(3);

if(isset($_GET['res'])){
    $res = $_GET['res'];
    if($res == 'success') {
        echo "<script>alert('Admin profile created successfully!');</script>";
    }
}

if(isset($_GET['action'])) {
    if($_GET['action'] == 'logout') {
        $login->logout();
    }
}
?>

<div class="row">
    <div class="col s12 m6">
        <a href="./backdex.php?page=backdexProducts">
            <div class="card horizontal indigo lighten-1 white-text waves-effect waves-light">
                <div class="card-image">
                    <span><i class="material-icons" style="font-size: 200px;">add</i></span>
                </div>
                <div class="card-stacked">
                    <div class="card-content valign-wrapper">
                        <h3 class="compLinks">Edit products</h3>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <div class="col s12 m6">
        <a href="./backdex.php?page=backdexCompany">
            <div class="card horizontal deep-purple lighten-1 white-text">
                <div class="card-image">
                    <span><i class="material-icons large" style="font-size: 200px;">add</i></span>
                </div>
                <div class="card-stacked">
                    <div class="card-content valign-wrapper">
                        <h3 class="compLinks">Edit company info</h3>
                    </div>
                </div>
            </div>
        </a>
    </div>

<div class="row">
    <div class="col s12 m6">
        <a href="./backdex.php?page=backdexNewsEdit">
        <div class="card horizontal green white-text">
            <div class="card-image">
                <span><i class="material-icons large" style="font-size: 200px">add</i></span>
            </div>
            <div class="card-stacked">
                <div class="card-content valign-wrapper">
                    <h3 class="compLinks">Edit News</h3>
                </div>
            </div>
        </div>
        </a>
    </div>

    <div class="col s12 m6">
        <a href="./backdex.php?page=backdexNewAdmin">
            <div class="card horizontal red white-text">
                <div class="card-image">
                    <span><i class="material-icons large" style="font-size: 200px;">add</i></span>
                </div>
                <div class="card-stacked">
                    <div class="card-content valign-wrapper">
                        <h3 class="compLinks">Add new admin</h3>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>

