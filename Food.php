<?php
require_once __DIR__ . "/Product.php";

class Food extends Product {
    public $material;
    public $calories;

    function __construct($_category, $_name, $_price, $_material, $_calories) {
        parent::__construct($_category, $_name, $_price);
        $this->material = $_material;
        $this->calories = $_calories;
    }

    public function printInfo() {
        return "$this->category $this->name = $this->price €, composto di $this->material avente $this->calories calorie";
    }
}
?>