<?php
require_once __DIR__ . "/Address.php";
class User {
    use Address;

    public $name;
    public $email;
    public $expire_date;
    public $cart = [];
    public $registered = false;

    function __construct($_name, $_email, $_registered, $_expire_date, $_nation, $_region, $_route, $_postalcode)
    {
        $this->name = $_name;
        $this->email = $_email;
        $this->registered = $_registered;
        $this->expire_date = $_expire_date;
        $this->nation = $_nation;
        $this->region = $_region;
        $this->route = $_route;
        $this->postalcode = $_postalcode;
    }
    

    public function printAddress() {
        echo 'La spesa da te acquistata verrà spedita al seguente indirizzo: <i>' . $this->nation . ' ' . $this->route . ', ' . $this->postalcode . '</i>';
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