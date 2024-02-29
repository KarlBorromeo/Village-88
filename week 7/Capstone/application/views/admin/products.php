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
        <link rel="stylesheet" href="../../stylesheets/admin/orders.css">
        <link rel="stylesheet" href="../../stylesheets/admin/products.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){

                /* fetch all products under all categories*/
                $.get('/admin/all_product_uncategorized',function(res){
                    $('#products').html(res);
                })

                /* fetch products by categories*/
                $('.categories').click(function(event){
                    $.get($(this).attr('href'),function(res){
                        $('#products').html(res);
                    })
                    event.preventDefault();
                })

                /* preview the image if uploaded new image in edit or add product */
                $('#img_create_upload').change(function(){
                    images = $(this)[0].files;
                    console.log(images);
                    let imgTags = "";
                    if(Object.keys(images).length<= 4){
                        for(let i = 0; i< Object.keys(images).length; i++){
                            let reader = new FileReader();
                            console.log(images[i]);
                            reader.onload = function(event){
                                imgTags += `<section><input type="radio" value="${i}" id="radio${i}" name="marked_main" checked>
                                            <label for="radio${i}"><img src="${event.target.result}">Mark</label></section>`
                                $('.preview-images').html(imgTags);
                            };
                            reader.readAsDataURL(images[i]);
                        }
                    }else{
                        alert('Max 4 images!');
                    }
                })

                /* delete the product */
                $(document).on('click','.delete',function(even){
                    confirmed = confirm('Are you sure to Delete this product?');
                    if(confirmed){
                        $.get($(this).attr('href'),function(res){
                            $('#products').html(res);
                        })                        
                    }
                    event.preventDefault();
                })

                /* shows the edit modal */
                $(document).on('click','.edit',function(event){
                    $.get($(this).attr('href'),function(res){
                        $('#edit-container').html(res);
                    })
                    event.preventDefault();
                })

                /* hides the images if deleted in edit mode */
                $(document).on('click','.x-btn',function(){
                    $(this).parent().hide();
                })

                /* closes the edit modal */
                $(document).on('click','#cancel-edit-btn',function(){
                    $('#edit-container').html('');
                })

                /* search results */
                $('#search-input').on('input',function(){
                    var form = $(this).closest('form');
                    $.post(form.attr('action'),form.serialize(),function(res){
                        $('#products').html(res);
                    });
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
        <?php $this->load->view('admin/widgets/aside.php') ?>
        <div>
            <?php $this->load->view('admin/widgets/header.php') ?>
            <h2>Products</h2>
            <main>
                <form id="search" action="/admin/search_product" method="POST" class="mb-3">
                    <div>
                        <input id="search-input" type="text" name="search" placeholder="Search Product Name">
                        <button type="submit"><img src="../../../assets/images/search.svg"></button>                        
                    </div>
                    <a data-bs-toggle="modal" data-bs-target="#create-product" class="btn btn-primary p-2"><img src="../../assets/images/plus.svg"> Add Product</a>
                </form>
                <div class="d-flex gap-4">
                    <ol id="categories">
                        <h4>Categories</h4>
                        <li class="text-center"><a class="categories" href="/admin/all_product_uncategorized/"><img src="../../assets/images/all_products.png">All Products</a></li>
                        <li class="text-center"><a class="categories" href="/admin/all_products_categorized/vegetables"><img src="../../assets/images/Vegetables.png">Vegetables</a></li>
                        <li class="text-center"><a class="categories" href="/admin/all_products_categorized/fruits"><img src="../../assets/images/Fruits.png">Fruits</a></li>
                        <li class="text-center"><a class="categories" href="/admin/all_products_categorized/meat"><img src="../../assets/images/Meat.png">Meat</a></li>
                        <li class="text-center"><a class="categories" href="/admin/all_products_categorized/dairy"><img src="../../assets/images/Dairy.png">Dairy</a></li>
                        <li class="text-center"><a class="categories" href="/admin/all_products_categorized/grains"><img src="../../assets/images/Grains.png">Grains</a></li>
                    </ol>
                    <section id="products">                     
                    </section>
                </div>
            </main>
        </div>

        <!-- 
            CREATE PRODUCT FORM
        -->
        <div class="modal fade" id="create-product" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content pt-2">
                    <?= $this->session->flashdata('add-product-error') ?>
                    <h1 class="modal-title fs-5 text-center mt-2" id="exampleModalLabel">Add a Product</h1>
                    <form class="modal-body" id="create-product-form" action="/admin/add_product" method="POST" enctype="multipart/form-data">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" placeholder="" id="name" name="product_name">
                            <label for="name">Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" placeholder="" id="description" name="description">Dummy dewscription here for dev purposes</textarea>
                            <label for="description">Description</label>
                        </div>
                        <div class="row mb-3">
                            <div class="form-floating col-6">
                                <select class="form-select" aria-label="Default select example" id="category" name="category">
                                    <option value="Vegetables" selected>Vegetables</option>
                                    <option value="Fruits">Fruits</option>
                                    <option value="Meat">Meat</option>
                                    <option value="Dairy">Dairy</option>
                                    <option value="Grains">Grains</option>
                                </select>
                                <label for="category" class="ms-2">Category</label>
                            </div>                       
                            <div class="form-floating col-3">
                                <input type="number" class="form-control" placeholder="" id="price" name="price" value="1">
                                <label for="price" class="ms-2">Price</label>
                            </div>
                            <div class="form-floating col-3">
                                <input type="number" class="form-control" placeholder="" id="stocks" name="stocks" value="50" min="1">
                                <label for="stocks" class="ms-2">Stocks</label>
                            </div>
                        </div>
                        <div class="preview-images mb-3 text-center">
                            <!-- show here the uploaded images -->
                        </div>
                        <div class="mb-3">
                            <input id="img_create_upload" class="form-control" type="file" id="formFileMultiple" multiple name="images[]">
                        </div>
                        <div class="modal-footer">
                            <label id="csrf">
                                <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>">
                            </label>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Add</button>                                
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div id="edit-container"></div>
    </body>
</html>