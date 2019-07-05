<?php
require '../core/init.php';
require '../Class/Order.php';
$book = [];

$user = User::getUserInfoByID($_SESSION["user_id"]);
$order_id = Order::getUserOrderById($_SESSION["user_id"]);
$order_id = $order_id->fetch();
if($order_id) {
    $orderContent = Order::displayOrderContent($order_id["id"]);

    foreach ($orderContent as $item) {
        $infoBook = Book::getInfoBookByID($item["book_id"]);
        array_push($book, $infoBook);
    }
}
?>
<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading">Mes commandes</h1>
    </div>
</section>
<div class="container">
    <div class="row">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Accueil</a></li>
                    <li class="breadcrumb-item"><a href="cart_content.php">Panier</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Mes commandes</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="container mn-5">
    <div class="alert alert-success" role="alert">
        <h3 class="alert-heading">Commande numéro : <?=  $order_id["id"] ?></h3>
        <?php
        $count = 0;
        for($i=0; $i<count($book); $i++){ ?>
            <div class='row alert'>
                <?= $book[$i]->getTitle() . ", prix: ". $book[$i]->getCost() ."€" ?>
            </div>
            <?php $count += $book[$i]->getCost();
        } ?>
        <div class="row alert alert-primary">
            Prix total de la commande : "<?= $count ?>"€"
        </div>
    </div>
</div>

