<?php
class Product {
    public $category;
    public $name;
    public $price;
    public $available = true;

    function __construct($_category, $_name, $_price, $_available) {
        $this->category = $_category;
        $this->name = $_name;
        $this->price= $_price;
        $this->available = $_available;
    }

    public function printInfo() {
        return " $this->category $this->name = $this->price €";
    }
}
?>