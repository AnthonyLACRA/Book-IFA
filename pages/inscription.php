<?php
require '../core/init.php';

if(isset($_POST["submit"])) {
    User::userInscription($_POST["pseudo"], $_POST["email"], $_POST["password"]);
    header("location:connexion.php");
}

?>

    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">Inscription</h1>
        </div>
    </section>
    <div class="container">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Accueil</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Inscription</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="card bg-light">
        <article class="card-body mx-auto" style="max-width: 400px;">
            <h4 class="card-title mt-3 text-center">Création de votre compte</h4>

            <form method="post">
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                    </div>
                    <input name="pseudo" class="form-control" placeholder="pseudo" type="text">
                </div> <!-- form-group// -->
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                    </div>
                    <input name="email" class="form-control" placeholder="adresse e-mail" type="email">
                </div> <!-- form-group// -->

                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                    </div>
                    <input name="password" class="form-control" placeholder="Mot de passe" type="password">
                </div> <!-- form-group// -->

                <div class="form-group">
                    <button name="submit" type="submit" class="btn btn-primary btn-block"> Création du compte  </button>
                </div> <!-- form-group// -->
                <p class="text-center">Déjà inscrit ? <a href="connexion.php">Connectez-vous</a> </p>
            </form>
        </article>
    </div> <!-- card.// -->

    </div>




<?php
require '../template/footer.php';
