<?php
require_once __DIR__ . "/Address.php";
class User {
    use Address;

    public $name;
    public $email;
    public $expire_date;
    public $cart = [];
    public $registered = false;

    function __construct($_name, $_email, $_registered, $_expire_date, $_nation)
    {
        $this->name = $_name;
        $this->email = $_email;
        $this->registered = $_registered;
        $this->expire_date = $_expire_date;
        $this->nation = $_nation;
    }

    public function printAddress() {
        echo $this->nation;
    }

    public function addItemToCard($_product) {
        if($_product->available) {
            $this->cart[] = $_product;
        } else {
            throw new Exception("This product is not available");
        }
    }

    
    public function getTotal() {
        $totalPrice = 0;

        foreach($this->cart as $item) {
            $totalPrice += $item->price;
        }
        if ($this->registered == true) {
            $totalPrice = ($totalPrice * 0.8);
            echo 'Essendo registrato il tuo prezzo sarà scontato del 20%. ';     
        }
        return  $totalPrice;
    }

    public function getRegistered() {
        return $this->registered = true;
    }

    public function insertCard() {
        $confirm= "";
        $today = date("Y-m-d");
        if ($this->expire_date > $today) {
            $confirm = 'La tua carta è valida, procedi all\'acquisto';
        } else {
            $confirm = 'La tua carta è scaduta, non potrai procedere per il pagamento';
        }

        return $confirm;
    }
}
?>