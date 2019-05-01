<?php
require '../core/init.php';


?>
    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">Connexion à votre compte</h1>
        </div>
        <?php
        if(isset($_POST["pseudo"]) && isset($_POST["password"])) {
            if(!empty($_POST["pseudo"]) && !empty($_POST["password"])) {
                $user = User::userConnexion($_POST["pseudo"], $_POST["password"]);
                header("location:index.php");
            }

        }
        ?>
    </section>
    <div class="container">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Accueil</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Connexion</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>


    <div class="card bg-light">
        <article class="card-body mx-auto" style="max-width: 400px;">
            <h4 class="card-title mt-3 text-center">Connectez-vous</h4>

            <form method="post">
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                    </div>
                    <input name="pseudo" class="form-control" placeholder="Pseudo" type="text">
                </div> <!-- form-group// -->

                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                    </div>
                    <input  name="password" class="form-control" placeholder="Mot de passe" type="password">
                </div> <!-- form-group// -->
                <div class="form-group">
                    <button name="submit" type="submit" class="btn btn-primary btn-block"> Connexion  </button>
                </div> <!-- form-group// -->
                <p class="text-center">Pas encore de compte ? <a href="inscription.php">Inscrivez-vous</a> </p>
            </form>
        </article>
    </div> <!-- card.// -->

    </div>



<?php
require '../template/footer.php';
