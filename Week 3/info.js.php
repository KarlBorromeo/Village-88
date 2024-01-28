<?php 
    $rand = rand(100,200);
?>
$(document).ready(function(){
alert("You are <?= $rand ?>x better than before!");
});