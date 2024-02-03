<?php

class Character{
    public $name;
    public $health;
    public $stamina;
    public $manna;

    public function __construct(){
        $this->health = 100;
        $this->stamina = 100;
        $this->manna = 100;
    }

    public function walk(){
        $this->stamina--;
        return $this;
    }

    public function run(){
        $this->stamina -= 3;
        return $this;
    }

    public function showStats($type){
        if($type == "swordsman"){
            echo 'I am powerful!<br>';
        }
        echo "
        Name: $this->name <br>
        Health: $this->health <br>
        Stamina: $this->stamina <br>
        Manna: $this->manna <br>
        ";
    }
}

$character = new Character();
$character->walk()->walk()->walk()->run()->run()->showStats('');

class Shaman extends Character{
    public function __construct(){
        parent::__construct();
        $this->health = 170;
    }
    public function heal(){
        $this->health += 5;
        $this->stamina += 5;
        $this->manna += 5;
        return $this;
    }
}
echo '<br><br>';
$shaman = new Shaman();
$shaman->walk()->walk()->walk()->run()->run()->heal()->showStats('');


class Swordsman extends Character{
    public function __construct(){
        parent::__construct();
        $this->health = 170;
    }
    public function slash(){
        $this->manna -= 10;
        return $this;
    }
}
echo '<br><br>';
$swordsman = new Swordsman();
$swordsman->walk()->walk()->walk()->run()->run()->slash()->slash()->showStats('swordsman');
?>