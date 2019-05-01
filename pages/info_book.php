<?php
require '../core/init.php';
if(isset($_GET["book_id"])) {
    $book = Book::getInfoBookById($_GET["book_id"]);
}
?>
    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading"><?= $book->getTitle();?></h1>
        </div>
    </section>
<div class="container">
    <div class="row p-5">
        <div class="col-lg-6">
            <div>
                <img height="300px" class="ml-5" src="<?= $book->getCover()?>">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="row">
                <div class="col-lg-12">
                    <p><strong>Auteur</strong> : <?= $book->getAuthor()?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <p><strong>date de publication</strong> : <?= $book->getReleaseDate()?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <p><strong>Genre</strong> : <?= $book->getKind()?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <p><strong>Format</strong> : <?= $book->getFormat()?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <p><strong>Prix</strong> : <?= $book->getCost()?>€</p>
                </div>
            </div>
            <div class="row p-3">
                <a href="cart_content.php?book_id=<?= $book->getBookId()?>&action=add" class="btn btn-lg btn-success">Ajouter au panier</a>
            </div>
        </div>
        <div class="row p-5 justify-content-center">
            <div class="col-lg-10 ">
                <h2>Synopsis</h2>
                <p><?= $book->getDescription()?></p>
            </div>
        </div>
    </div>
</div>




<?php
require '../template/footer.php';
