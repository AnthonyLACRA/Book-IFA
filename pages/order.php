<?php
require '../core/init.php';

$adress = User::getUserAdressByID($_SESSION["user_id"]);


?>
<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading">Commande</h1>
    </div>
</section>
    <div class="container">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Accueil</a></li>
                        <li class="breadcrumb-item"><a href="cart_content.php">Panier</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Commande</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="container mb-5">
        <div class="row">
            <div class="col-12 col-sm-6">
                <div class="card bg-light mb-3">
                    <div class="card-header bg-success text-white text-uppercase"><i class="far fa-credit-card"></i> Paiement</div>
                    <div class="card-body">
                        <div class="col">
                            <form action="" method="post">
                                <div class="row">
                                    <input type="radio" name="paiement" class="mr-3">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b5/PayPal.svg/120px-PayPal.svg.png">
                                </div>
                                <div class="row mt-3">
                                    <input type="radio" name="paiement" class="mr-3">
                                    <img height="50px" src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/48/MasterCard-Logo.svg/120px-MasterCard-Logo.svg.png">
                                </div>
                                <div class="row mt-3">
                                    <input type="radio" name="paiement" class="mr-3">
                                    <img height="50px" src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/Old_Visa_Logo.svg/1920px-Old_Visa_Logo.svg.png">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-header bg-primary text-white"><i class="fas fa-dolly"></i> Livraison
                    </div>
                    <div class="card-body">
                        <div class="col">
                            <form action="" method="post">
                                <label>Adresse de livraison</label>
                                <select class="ml-3">
                                <?php foreach ($adress as $key => $value) { ?>
                                            <option>
                                                <?= $value["name"]?>
                                            </option>
                                <?php } ?>
                                </select>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center p-4">
                    <div class=" col-lg-6">
                        <button class="btn btn-success btn-lg">Finaliser la commande</button>
                    </div>
                </div>
            </div>

        </div>
    </div>






<?php

require '../template/footer.php';
