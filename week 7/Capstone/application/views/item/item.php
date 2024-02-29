<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Organice Shop</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../../stylesheets/home.css">
        <link rel="stylesheet" href="../../stylesheets/item/item.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){

                get_count_items();

                /* updates the total amount */
                $('#quantity').change(function(){
                    $.post($(this).parent().attr('action'),$(this).parent().serialize(),function(res){
                        $('#total_amount').val(res);
                        $('#quantity_addcart').val($('#quantity').val());
                    });
                })

                /* add to cart */
                $('#add-cart').submit(function(res){
                    $.post($(this).attr('action'),$(this).serialize(),function(){
                        get_count_items();
                        $('#modal-bg').show();
                        setTimeout(function(){$('#modal-bg').hide()}, 300);
                    })
                    return false;
                })

                /* get the category of the current item */
                /* get the list of similar items by category */
                category = $('#item-category').val();
                $.get(`/products/all_products_categorized/${category}`,function(res){
                    $('#products').html(res);
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
            function get_count_items()
            {
                 /* get the count of items in user's cart */
                 $.get('/products/cart_count_getter',function(res){
                    $('span#count').html(res);
                })
            }
        </script>
    </head>
    <body class="d-flex">
        <?php $this->load->view('widgets/aside'); ?>
        <div class="border">
            <?php $this->load->view('widgets/header'); ?>
            <main>          
                <form action="" method="POST" id="search-form" class="mb-5">
                    <div class="border border-top-0 border-start-0 border-bottom-0">
                        <input type="text" name="search" placeholder="Search Products" class="border">
                        <button type="submit"><img src="../../assets/images/search.svg"></button>                        
                    </div>
                    <a href="/cart" class="btn btn-primary p-3"><img src="../../assets/images/cart.svg"> Cart ( <span id="count"></span> )</a>
                </form>
                <a href="/products" class="d-flex align-items-center gap-3 mb-4 fw-semibold"><img src="../../../assets/images/left.svg"> Go Back</a>
                <div class="d-flex bg-white">
                    <section id="item-images">
                        <img src="../../../assets/uploads/<?= $product['images']['img'][$main_index] ?>">
                        <ul class="d-flex justify-content-end gap-2 mt-3">
<?php
    foreach($product['images']['img'] as $image){
?>
                            <li><img src="../../../assets/uploads/<?= $image ?>"></li>
<?php
    }
?>
                        </ul>
                    </section>
                    <section id="item-details">
                        <h4 class="mt-3 mb-2"><?= $product['name'] ?></h4>
                        <section class="d-flex align-items-center gap-1 mb-2">
                            <img src="../../assets/images/star_shade.png">
                            <img src="../../assets/images/star_shade.png">
                            <img src="../../assets/images/star_shade.png">
                            <img src="../../assets/images/star_shade.png">
                            <img src="../../assets/images/star_empty.png">
                            <p>36 Rating</p>
                        </section>
                        <span class="text-primary fw-semibold border"><?= $product['price'] ?></span>
                        <p class="mt-5 border border-top-0 border-start-0 border-end-0"><?= $product['description'] ?></p>
                        <form action="/products/update_total">
                            <p>Quantity</p>
                            <input type="hidden" value="<?= $product['id'] ?>" name="product_id">
                            <input id="quantity" type="number" name="quantity" min="1" value="1" class="border"> 
                        </form>
                        <label>
                            <p>Total Amount</p>
                            <input id="total_amount" type="text" value="<?= $product['price'] ?>" disabled class="text-primary fw-semibold border">  
                        </label>
                        <form id="add-cart" action="/products/add_cart" method="POST">
                            <input type="hidden" value="<?= $product['category'] ?>" id="item-category">
                            <input type="hidden" value="<?= $product['id'] ?>" name="product_id">
                            <input id="quantity_addcart" type="hidden" name="quantity" min="1" value="1" class="border"> 
                            <button  type="submit" class="btn btn-outline-primary"><img src="../../assets/images/cart.svg">Add to Cart</button>                            
                        </form>                       
                    </section>
                </div>
                <ul id="products" class="mt-5 text-center">
                </ul>
            </main>
        </div>
        <div id="modal-bg">
            <section id="modal">
                Item Added to Cart
            </section>              
        </div>
    </body>
</html>