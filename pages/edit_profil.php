<?php
require '../core/init.php';
if(isset($_POST["submit"])) {
    if(!empty( $_POST["num"]) && !empty($_POST["street"]) && !empty($_POST["zip"]) && !empty($_POST["town"])) {
        User::addUserAddress($_SESSION["user_id"], $_POST["num"], $_POST["street"], $_POST["zip"], $_POST["town"]);
    }
}
?>
<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading">Profil</h1>
    </div>
</section>
<div class="container">
    <div class="row">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Accueil</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Modifier mon profil</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
    <div class="card bg-light">
        <article class="card-body mx-auto" style="max-width: 400px;">
            <h4 class="card-title mt-3 text-center">Modification de votre profil</h4>

            <form method="post">
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-location-arrow"></i> </span>
                    </div>
                    <input name="num" class="form-control" placeholder="N°" type="text">
                    <input name="street" class="form-control" placeholder="Rue" type="text">
                </div> <!-- form-group// -->

                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fas fa-location-arrow"></i></span>
                    </div>
                    <input name="zip" class="form-control" placeholder="Code postal" type="text">
                    <input name="town" class="form-control" placeholder="Ville" type="text">
                </div> <!-- form-group// -->

                <div class="form-group">
                    <button name="submit" type="submit" class="btn btn-primary btn-block"> Ajouterx  </button>
                </div> <!-- form-group// -->
            </form>
        </article>
    </div>




<?php
require '../template/footer.php';
