<?php  
session_start();
require "../Class/Cart.php";
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/app.css" class="css">
    <title>Librairie</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="index.php">Book'Ifa</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-end" id="navbarsExampleDefault">
                    <ul class="navbar-nav m-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="../pages/index.php">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="boutique.php">Boutique<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.php">Contact</a>
                        </li>
                        <?php
                            if(isset($_SESSION) && isset($_SESSION["auth"])) {
                                ?>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Mon compte</a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="../pages/account.php">Profil</a>
                                        <a class="dropdown-item" href="#">Mes commandes</a>
                                        <a class="dropdown-item" href="../pages/deconnexion.php">Déconnexion</a>
                                    </div>
                                </li>
                            <?php
                            } else {
                            ?>
                        <a class="nav-link" href="connexion.php" role="button">Se connecter</a>

                        <?php
                            }
                        ?>
                    </ul>

                    <form class="form-inline my-2 my-lg-0">

                        <a class="btn btn-success btn-sm ml-3" href=
                        <?php if(isset($_SESSION["user_id"])) {?>
                            "cart_content.php"
                        <?php } else { ?>
                            "redirection.php"
                        <?php }?>
                            <i class="fa fa-shopping-cart"></i> Panier
                            <?php if(Cart::countCartContent() > 0 && isset($_SESSION["user_id"])){ ?>
                                <span class="badge badge-light">
                                    <?= Cart::countCartContent()?>
                                </span>
                           <?php } ?>
                        </a>
                    </form>
                </div>
            </div>
        </nav>
    </header>

