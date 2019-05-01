<?php
require '../core/init.php';
$user = User::getUserInfoByID($_SESSION["user_id"]);

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
            <div class="col-lg-6">
                <div class="row ml-5">
                    <div class="col-lg-12 ml-5">
                        <img src="https://via.placeholder.com/300">
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
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
                                <p>Adresse e-mail : <?= $user["email"]?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <p>Date d'inscription : <?= $user["inscription_date"]?></p>
                            </div>
                        </div>
                        <div class="row">
                            <h1><i class="fas fa-user-edit p-3"></i></h1>
                            <a href="edit_profil.php"><p class="p-4">Modifier mon compte</p></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>





<?php
require '../template/footer.php';
