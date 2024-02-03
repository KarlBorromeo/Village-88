<?php
class HtmlGenerator{
    public $inputs = array();

    public function __construct($array){
        $this->inputs = $array;
    }

    public function render_input(){
        foreach($this->inputs as $key => $value){
            echo "<label class='row'> <span class='col-4'>$key</span> <input type='text' value='$value' class='col-8'></label>";
        }
    }
    public function render_list(){
        echo '<ol>';
        foreach($this->inputs as $value){
            echo "<li> $value </li>";
        }
        echo '</ol>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <title>HTML GENERATOR</title>
        <style>
            label{
                display: block;
            }
            body{
                border: 1px solid black;
                display: inline-block;
                padding: 1rem 2rem;
                border: 2px solid black;
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%,-50%);
            }
            label{
                margin-bottom: .5rem;
            }
            label span{
                text-transform: capitalize;
            }
            ol{
                padding-left: 1rem;
                margin: 0;
            }
            ol li{
                font-weight: 600;
            }
        </style>
    </head>
    <body>
        <h1>Generated Output</h1>
        <?php
        $inputs = new HtmlGenerator(array("name" => "Bag", "price" => 250, "stocks" => 10));
        $inputs->render_input();
        $list = new HtmlGenerator(array("Apple", "Banana", "Cherry"));
        $list->render_list();
        ?>
    </body>
</html>