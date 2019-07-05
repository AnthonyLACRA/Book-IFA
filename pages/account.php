<?php
require '../core/init.php';
$user = User::getUserInfoByID($_SESSION["user_id"]);
$address = User::getUserAddress($_SESSION["user_id"])
?>
    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">Votre compte</h1>
        </div>
    </section>
    <div class="container">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Accueil</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Profil</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="container p-2">
        <div class="row">
            <div class="col-lg-12">
                <div class="row p-5">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-12">
                                <p>Pseudo : <?= $user["pseudo"]?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <p>Sexe : <?= strtoupper($user["gender"])?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <p>Mail : <?= $user["email"]?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <p>Date d'inscription : <?= $user["inscription_date"]?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <p>Adresse de livraison : <?php if(User::getUserAddress($_SESSION["user_id"])) { echo $address["num"] ." ". $address["street"] . " " . $address["zip"] . ", " . $address["town"]; } else { ?>
                                        <a href="edit_profil.php">ajouter une adresse</a><?php }?></p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>





<?php
require '../template/footer.php';
