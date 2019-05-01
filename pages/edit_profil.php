<?php
require '../core/init.php';
$user = User::getUserInfoByID($_SESSION["user_id"]);

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
                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                    </div>
                    <input name="pseudo" class="form-control" placeholder="<?= $user["pseudo"]?>" type="text">
                </div> <!-- form-group// -->
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                    </div>
                    <input name="email" class="form-control" placeholder="<?= $user["email"]?>" type="email">
                </div> <!-- form-group// -->

                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fas fa-camera"></i> </span>
                    </div>
                    <input name="password" class="form-control" placeholder="url de votre photo" type="text">
                </div> <!-- form-group// -->

                <div class="form-group">
                    <button name="submit" type="submit" class="btn btn-primary btn-block"> Modifier  </button>
                </div> <!-- form-group// -->
            </form>
        </article>
    </div>




<?php
require '../template/footer.php';
