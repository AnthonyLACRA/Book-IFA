<?php
require '../core/init.php';
?>
    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">Boutique</h1>
        </div>
    </section>
    <div class="container">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Accueil</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Boutique</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="container">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Titre</th>
                    <th scope="col">Genre</th>
                    <th scope="col">Format</th>
                    <th scope="col">Prix</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $books = Book::getInfoBook();
            foreach ($books as $book) {

            ?>
                <tr>
                    <th scope="row"><img height="100px" src="<?= $book->getCover()?>" alt=""></th>
                    <td><?= $book->getTitle()?></td>
                    <td><?= $book->getKind()?></td>
                    <td><?= $book->getFormat()?></td>
                    <td><?= $book->getCost()?>€</td>
                    <td>
                        <a href="info_book.php?book_id=<?= $book->getBookId()?>" class="btn btn-primary">Description</a>
                        <a href="cart_content.php?book_id=<?= $book->getBookId()?>&action=add" class="btn btn-success">Acheter</a>
                    </td>
                </tr>

                <?php
            }

            ?>
            </tbody>
        </table>
    </div>




<?php
require '../template/footer.php';
