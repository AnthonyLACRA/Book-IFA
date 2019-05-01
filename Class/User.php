<?php

class User
{
    private $user_id;
    private $pseudo;
    private $gender;
    private $email;
    private $password;
    private $inscription_date;

    public function __construct($user_id, $pseudo, $gender, $email, $password, $inscription_date)
    {
        $this->user_id = $user_id;
        $this->pseudo = $pseudo;
        $this->gender = $gender;
        $this->email = $email;
        $this->password = $password;
        $this->inscription_date = $inscription_date;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @return mixed
     */
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return mixed
     */
    public function getInscriptionDate()
    {
        return $this->inscription_date;
    }

    public static function getUserInfoByID($user_id) {
        $stmt = Database::getInstance()->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$user_id]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user;
    }

    public static function userInscription($pseudo, $email, $password) {
        $stmt = Database::getInstance()->prepare("INSERT INTO users (pseudo, email, password) VALUES (?, ?, ?);");
        $stmt->execute([$pseudo, $email, sha1($password)]);
        return null;
    }


    public static function userConnexion($pseudo, $password) {
       $stmt = Database::getInstance()->prepare("SELECT * FROM users WHERE pseudo = ? AND password = ?");
       $stmt->execute([$pseudo, sha1($password)]);
       $user = $stmt->fetch(PDO::FETCH_ASSOC);

       if(sha1($password) === $user["password"]) {
           $res = new User($user["id"],$user["pseudo"],$user["gender"],$user["email"],$user["password"],$user["inscription_date"]);
           $_SESSION["auth"] = true;
           $_SESSION["user_id"] = $res->getUserId();
           return $res;
       }
       return null;
    }

    public static function getUserAdressByID($user_id) {
        $stmt = Database::getInstance()->prepare("
SELECT name FROM adress
INNER JOIN adress_infos
ON adress_infos.adress_id = adress.id
INNER JOIN users
ON users.id = adress_infos.user_id
WHERE users.id = ?");
        $stmt->execute([$user_id]);
        $adress = $stmt->fetchAll(PDO::FETCH_ASSOC);
        var_dump($adress);
        return $adress;
    }


}