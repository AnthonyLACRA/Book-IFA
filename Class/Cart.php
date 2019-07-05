<?php


class Cart
{

    private $cart = [];

    public function __construct()
    {
    }

    /**
     * @return array
     */
    public function getCart()
    {
        return $this->cart;
    }

    public function addBookOnCartById($book_id) {
        if(isset($book_id)) {
        $file = file_get_contents("../pages/jsonCart.json");
        $cart_content = json_decode($file, true);

        $cart["user_id"] = $_SESSION["user_id"];
        $cart["book_id"] = $book_id;
        $cart["quantity"] = 1;
        var_dump($cart);


        $cart_content[] = $cart;
        $cart_content = json_encode($cart_content, JSON_PRETTY_PRINT);
        file_put_contents("../pages/jsonCart.json", $cart_content);
        }

        header("location:boutique.php");
    }

    public static function getCartContent() {
        $file = file_get_contents("jsonCart.json");
        $cart_content = json_decode($file, true);
        return $cart_content;
    }

    public static function countCartContent() {
        $file = file_get_contents("jsonCart.json");
        $cart_content = json_decode($file, true);
        if(isset($cart_content) and count($cart_content) > 0) {
            $count=0;
            foreach ($cart_content as $key => $value) {
                $count += $value["quantity"];
            }
                return $count;
        }
            return null;
    }

    public function upQuantityOfItemOnCart($user_id, $book_id, $action) {
        $file = file_get_contents("jsonCart.json");
        $cart_content = json_decode($file, true);

        if(isset($cart_content)) {
            foreach($cart_content as $key => $value) {
                if($user_id === $value["user_id"] && $book_id === $value["book_id"] && $action === "plus"){
                    $cart_content[$key]["quantity"]++;

                    $cart = json_encode($cart_content, JSON_PRETTY_PRINT);
                    file_put_contents("jsonCart.json", $cart);

                    break;
                }
            }
        }
    }

    public function downQuantityOfItemOnCart($user_id, $book_id, $action) {
        $file = file_get_contents("jsonCart.json");
        $cart_content = json_decode($file, true);

        if(isset($cart_content)) {
            foreach($cart_content as $key => $value) {
                if($user_id === $value["user_id"] && $book_id === $value["book_id"] && $action === "minus"){
                    if($value["quantity"] <= 0) {
                        unset($cart_content[$key]);
                    } else {
                        $cart_content[$key]["quantity"]--;
                    }

                    $cart = json_encode($cart_content, JSON_PRETTY_PRINT);
                    file_put_contents("jsonCart.json", $cart);

                    break;
                }
            }
        }
    }

    public function deleteItemOnCart($user_id, $book_id, $action) {
        $file = file_get_contents("jsonCart.json");
        $cart_content = json_decode($file, true);

        if(isset($cart_content)) {
            foreach($cart_content as $key => $value) {
                if($user_id === $value["user_id"] && $book_id === $value["book_id"] && $action === "delete"){
                    unset($cart_content[$key]);

                    $cart = json_encode($cart_content, JSON_PRETTY_PRINT);
                    file_put_contents("jsonCart.json", $cart);

                    break;
                }
            }
        }
    }


    public function deleteItemOnCartByQuantity($user_id, $book_id) {
        $file = file_get_contents("jsonCart.json");
        $cart_content = json_decode($file, true);

        if(isset($cart_content)) {
            foreach($cart_content as $key => $value) {
                if($user_id === $value["user_id"] && $book_id === $value["book_id"]){
                    if($value["quantity"] >= 0) {
                        unset($cart_content[$key]);
                    }
                    $cart = json_encode($cart_content, JSON_PRETTY_PRINT);
                    file_put_contents("jsonCart.json", $cart);

                    break;
                }
            }
        }
    }


    public function jsonSerialize()
    {
        return [
            "title" => $this->name,
            "email" => $this->email
        ];
    }

}