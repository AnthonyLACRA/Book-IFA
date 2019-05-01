<?php
require '../core/init.php';

if(isset($_GET["book_id"]) && isset($_GET["user_id"]) && isset($_GET["action"])) {
    if($_GET["action"] === "plus") {
        $cart->upQuantityOfItemOnCart($_GET["user_id"], $_GET["book_id"], $_GET["action"]);
    } elseif($_GET["action"] === "minus") {
        $cart->downQuantityOfItemOnCart($_GET["user_id"], $_GET["book_id"], $_GET["action"]);
    } elseif($_GET["action"] === "delete") {
        $cart->deleteItemOnCart($_GET["user_id"], $_GET["book_id"], $_GET["action"]);
    }
}

?>
    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">Panier</h1>
        </div>
    </section>
    <div class="container">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                       <li class="breadcrumb-item"><a href="index.php">Accueil</a></li>
                       <li class="breadcrumb-item active" aria-current="page">Panier</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <?php

if(isset($_GET["book_id"]) && $_GET["action"] == "add"){
    $book = Book::getInfoBookById($_GET["book_id"]);
    if(isset($_SESSION["user_id"])) {
        $cart->addBookOnCartById($book->getBookId());
    } else {
        header("location:redirection.php");
    }
}

if($cart->countCartContent() > 0) {
?>
    <div class="row mb-3 justify-content-end">
        <div class="col-lg-3">
            <a class="btn btn-success" href="order.php">Passer commande</a>
        </div>
    </div>
<div class="container">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Titre</th>
                    <th scope="col">Format</th>
                    <th scope="col">Prix</th>
                    <th scope="col" class="text-center">Quantité</th>
                </tr>
            </thead>
            <tbody>

<?php } else { ?>
    <div class="container">
        <div class="row p-3">
            <div class="text-center col-lg-12 alert alert-primary p-5"><h2>Votre panier est vide</h2></div>
        </div>
    </div>
    <?php
}
    $file = file_get_contents("jsonCart.json");
    $cart_content = json_decode($file, true);


   if(isset($cart_content) && count($cart_content) > 0) {
       foreach ($cart_content as $key => $value) {
           $book = Book::getInfoBookByID($value['book_id']);

        ?>
                <tr>
                    <th scope="row"><img height="100px" src="<?= $book->getCover()?>" alt=""></th>
                    <td><?= $book->getTitle()?></td>
                    <td><?= $book->getFormat()?></td>
                    <td><?= $book->getCost()?>€</td>
                    <td class="row justify-content-center">
                        <span class="btn btn-success ml-2">
                            <a href="?book_id=<?= $book->getBookId()?>&user_id=<?= $value["user_id"]?>&action=plus"><i class="fas fa-plus text-white"></i></a>
                        </span>
                        <span class="btn btn-dark ml-2">
                            <?= $value["quantity"] ?>
                        </span>
                        <span class="btn btn-success ml-2">
                            <a href="?book_id=<?= $book->getBookId()?>&user_id=<?= $value["user_id"]?>&action=minus"><i class="fas fa-minus text-white"></i>
                            </a>
                        </span>
                        <span class="btn btn-danger ml-4">
                            <a href="?book_id=<?= $book->getBookId()?>&user_id=<?= $value["user_id"]?>&action=delete"><i class="fas fa-times text-white"></i></a>
                        </span>
                    </td>
                </tr>
<?php
}
   }
?>
            </tbody>
        </table>
</div>

<?php
require '../template/footer.php';
