<?php


class Order
{
    public function __construct()
    {
    }

    public static function getUserOrderById($user_id) {
        $stmt = Database::getInstance()->prepare("SELECT * from orders WHERE user_id = ?");
        $stmt->execute([$user_id]);
        return $stmt;
    }

    public static function newOrder($user_id, $paiement, $address) {
    $stmt = Database::getInstance()->prepare("INSERT INTO orders (user_id, paiement, address) VALUES (?, ?, ?)");
    $stmt->execute([$user_id, $paiement, $address]);
    return $stmt;
    }

    public static function newOrderContent($order_id) {
        $content = Cart::getCartContent();
        foreach ($content as $key => $value) {
            $stmt = Database::getInstance()->prepare("INSERT INTO order_content (order_id, book_id, quantity) VALUES (?, ?, ?)");
            $stmt->execute([$order_id, $value["book_id"], $value["quantity"]]);
        }

        return;
    }

    public static function displayOrderContent($order_id) {
        $stmt = Database::getInstance()->prepare("SELECT * FROM order_content WHERE order_id = ?");
        $stmt->execute([$order_id]);

        return $stmt->fetchAll();
    }
}