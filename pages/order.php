<?php
require '../core/init.php';
require '../Class/Order.php';
$address = User::getUserAddress($_SESSION["user_id"]);

if(isset($_POST["submit"])) {
    if(!empty($_POST["paiement"])) {
        if(Order::newOrder($_SESSION["user_id"], $_POST["paiement"], $_POST["address"])){
            $order_id = Order::getUserOrderById($_SESSION["user_id"]);
            $order_id = $order_id->fetch();
            Order::newOrderContent($order_id["id"]);
            header("location: thxForOrder.php");
        };
    }
}
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
    <form action="" method="post">

    <div class="container mb-5">
        <div class="row">

            <div class="col-12 col-sm-6">
                <div class="card bg-light mb-3">
                    <div class="card-header bg-success text-white text-uppercase"><i class="far fa-credit-card"></i> Choisir un moyen de paiement</div>
                    <div class="card-body">
                        <div class="col">
                                <div class="row">
                                    <input type="radio" value="PayPal" name="paiement" class="mr-3">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b5/PayPal.svg/120px-PayPal.svg.png">
                                </div>
                                <div class="row mt-3">
                                    <input type="radio" value="MasterCard" name="paiement" class="mr-3">
                                    <img height="50px" src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/48/MasterCard-Logo.svg/120px-MasterCard-Logo.svg.png">
                                </div>
                                <div class="row mt-3">
                                    <input type="radio" value="Visa" name="paiement" class="mr-3">
                                    <img height="50px" src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/Old_Visa_Logo.svg/1920px-Old_Visa_Logo.svg.png">
                                </div>
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
                                <label>Adresse de livraison</label>
                                <select name="address" class="ml-3">
                                    <option selected>
                                        <?= $address["num"] ." ". $address["street"] . " " . $address["zip"] . ", " . $address["town"]?>
                                    </option>
                                </select>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center p-4">
                    <div class=" col-lg-6">
                        <button name="submit" type="submit" class="btn btn-success btn-lg">Finaliser la commande</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>






<?php

require '../template/footer.php';
