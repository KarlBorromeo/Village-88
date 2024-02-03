<?php

class Home{
    public $location;
    public $price;
    public $lot;
    public $type;
    public $discount;

    public function __construct($location,$price,$lot,$type){
        $this->location = $location;
        $this->price = $price;
        $this->lot = $lot;
        $this->type = ucwords($type);
        if($type == "pre-selling"){
            $this->discount = floatval('0.20');
        }else{
            $this->discount = floatval('0.05');
        }
    }

    public function showAll(){
        $discount = $this->price * $this->discount;
        $totalprice = $this->price - $discount;
        echo 
        "
        Location: $this->location <br>
        Price: $this->price <br>
        Lot: $this->lot <br>
        Type: $this->type <br>
        Discount: $this->discount <br>
        Total Price: $totalprice <br><br><br>   
        ";
    }
}
$house1 = new Home('La Union',1500000,'100sqm','pre-selling');
$house1->showAll();
$house1 = new Home('Metro Manila',1000000,'150sqm','ready for occupancy');
$house1->showAll();
$house1 = new Home('Metro Manila',1000000,'150sqm','ready for occupancy');
$house1->showAll();
$house1 = new Home('Metro Manila',1000000,'150sqm','ready for occupancy');
$house1->showAll();
$house1 = new Home('Metro Manila',1000000,'150sqm','ready for occupancy');
$house1->showAll();
?>