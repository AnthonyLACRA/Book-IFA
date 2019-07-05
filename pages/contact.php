<?php
require '../core/init.php';
$user = User::getUserInfoByID($_SESSION["user_id"]);
?>


    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">Contact</h1>
        </div>
    </section>
    <div class="container">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Accueil</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Contact</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="container mb-5">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header bg-primary text-white"><i class="fa fa-envelope"></i> Contactez-nous.
                    </div>
                    <div class="card-body">
                        <form method="post" action="mail.php">
                            <div class="form-group">
                                <label for="name">Sujet</label>
                                <input name="subject" type="text" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Sujet" required>
                            </div>
                            <div class="form-group">
                                <label for="message">Message</label>
                                <textarea name="msg" class="form-control" id="message" rows="6" required></textarea>
                            </div>
                            <div class="mx-auto">
                                <button type="submit" class="btn btn-primary text-right">Envoyer le message</button></div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-4">
                <div class="card bg-light mb-3">
                    <div class="card-header bg-success text-white text-uppercase"><i class="fa fa-home"></i> Address</div>
                    <div class="card-body">
                        <p>4 Rue Saint-Charles</p>
                        <p>57000 Metz</p>
                        <p>France</p>
                        <p>Email : anthony.lacrabere@stagiairesifa.fr</p>
                        <p>Tel. +33 12 56 11 51 84</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php
require '../template/footer.php';



