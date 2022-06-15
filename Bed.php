<?php
require_once __DIR__ . "/Product.php";

class Bed extends Product {
    public $meters;

    public function __construct($_category, $_name, $_price, $_available, $_meters)
    {
        parent::__construct($_category, $_name, $_price, $_available);
        $this->meters = $_meters;
    }

    public function printInfo() {
        return "$this->category $this->name = $this->price €, misura $this->meters";
    }
}
?>