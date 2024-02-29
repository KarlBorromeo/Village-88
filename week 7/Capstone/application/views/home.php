<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Organic Shop</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../../stylesheets/home.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                /* initialize fetch all orders */
                $.get('/products/all_products_uncategorized',function(res){
                    $('#products').html(res);
                })

                /* get the count of items in user's cart */
                $.get('/products/cart_count_getter',function(res){
                    $('span#count').html(res);
                })

                /* get the orders by categories */
                $('#categories li a').on('click',function(event){
                    $.get($(this).attr('href'),function(res){
                        $('#products').html(res);
                    })
                    event.preventDefault()
                })

                /* get search result */
                $('#search-input').on('input',function(){
                    var form = $(this).closest('form');
                    $.post(form.attr('action'),form.serialize(),function(res){
                        $('#products').html(res);
                    })
                    return false;
                })

                /* pagination */
                $(document).on('click','.pagination',function(event){
                    console.log($(this).attr('href'));
                    $.get($(this).attr('href'),function(res){
                        $('#products').html(res);
                    })
                    event.preventDefault();
                })
        
            })
        </script>
    </head>
    <body class="d-flex">
        <?php $this->load->view('widgets/aside'); ?>
        <div class="border">
            <?php $this->load->view('widgets/header'); ?>
            <main>
                <form action="/products/search_product" method="POST" id="search-form" class="mb-5">
                    <div class="border border-top-0 border-start-0 border-bottom-0">
                        <input id="search-input" type="text" name="search" placeholder="Search Products" class="border">
                        <button type="submit"><img src="../../assets/images/search.svg"></button>                        
                    </div>
                    <a href="/cart" class="btn btn-primary p-3"><img src="../../assets/images/cart.svg"> Cart ( <span id="count"></span> )</a>
                </form>
                <div class="d-flex">           
                    <ol id="categories">
                        <h4>Categories</h4>
                        <li class="text-center"><a href="/products/all_products_uncategorized"><img src="../../assets/images/all_products.png">All Products</a></li>
                        <li class="text-center"><a href="/products/all_products_categorized/vegetables"><img src="../../assets/images/Vegetables.png">Vegetables</a></li>
                        <li class="text-center"><a href="/products/all_products_categorized/fruits"><img src="../../assets/images/Fruits.png">Fruits</a></li>
                        <li class="text-center"><a href="/products/all_products_categorized/meat"><img src="../../assets/images/Meat.png">Meat</a></li>
                        <li class="text-center"><a href="/products/all_products_categorized/dairy"><img src="../../assets/images/Dairy.png">Dairy</a></li>
                        <li class="text-center"><a href="/products/all_products_categorized/grains"><img src="../../assets/images/Grains.png">Grains</a></li>
                    </ol>
                    <ul id="products">
                    </ul>
                </div>    
            </main>
        </div>
    </body>
</html>