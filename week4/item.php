<?php
class Item{
    public $name;
    public $price;
    public $stock;
    public $sold;

    public function __construct($name,$price,$stock){
        $this->name = $name;
        $this->price = $price;
        $this->stock = $stock;
        $this->sold = 0;
        echo 'stock: '.$stock.'<br>';
    }

    public function logDetails(){
        echo 'Item\'s name:' . $this->name . '<br>';
        echo 'Item\'s price:' . $this->price . '<br>';
        echo 'Item\'s stock:' . $this->stock . '<br>';
        echo 'Item\'s sold:' . $this->sold . '<br>';
    }

    public function buy(){
        
        if($this->stock>0){
            echo 'Buying<br>';
            $this->stock--;
            $this->sold++; 
        }else{
            echo 'Out of stock sorry<br>';
        }    
    }

    public function return(){
        if($this->sold>0){
            echo 'Returning<br>';
            $this->stock++;
            $this->sold--;            
        }else{
            echo 'Nothing to return to<br>';
        }

    }

}

$item1 = new Item("rebisco",7,2);

$item1->buy();
$item1->buy();
$item1->buy();
$item1->return();
$item1->logDetails();

echo '------------------<br>';
$item2 = new Item("carackers",3,2);
$item2->buy();
$item2->buy();
$item2->return();
$item2->return();
$item2->logDetails();

$item3 = new Item("coke",25,5);

?>