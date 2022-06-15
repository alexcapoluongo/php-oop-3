<?php
class Product {
    public $category;
    public $name;
    public $price;

    function __construct($_category, $_name, $_price) {
        $this->category = $_category;
        $this->name = $_name;
        $this->price= $_price;
    }

    public function printInfo() {
        return " $this->category $this->name = $this->price €";
    }
}
?>