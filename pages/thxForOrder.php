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

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';


$mail = new PHPMailer();

$mail->isSMTP();
$mail->Host = "SSL0.OVH.NET";
$mail->SMTPAuth = true;
$mail->Username = "anthony.lacrabere@stagiairesifa.fr";
$mail->Password = "19880214*";
$mail->SMTPSecure = "tls";
$mail->Port = 587;

// info du mail
$mail->setFrom("anthony.lacrabere@stagiairesifa.fr", "Book'IFA");
$mail->addAddress($user["email"]);

$mail->isHTML(true);
$mail->Subject = "Commande n°1 - Book'IFA";
$mail->Body = "Merci beaucoup d'avoir commandé chez book'IFA";


$mail->send();
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
                    <li class="breadcrumb-item"><a href="order.php">Commande</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Confirmation de commande</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="container mb-5">
    <div class="alert alert-success">Nous vous remercions pour votre commande, vous allez recevoir un mail de confirmation.<br>
    Si vous n'avez toujours rien reçu d'ici 24h, <a href="contact.php">contactez-nous</a></div>
</div>

<div class="container mn-5">
    <div class="alert alert-success" role="alert">
        <h3 class="alert-heading">Récapitulatif de votre commande</h3>
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