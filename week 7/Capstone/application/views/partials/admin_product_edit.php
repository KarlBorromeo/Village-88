<?php
    if($product){
        $main_index = $product['images']['main_img'];
?>
        <!-- 
            EDIT PRODUCT FORM
        -->
        <div class="" id="edit-product" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content pt-2">
                    <?= $this->session->flashdata('errors') ?>
                    <h1 class="modal-title fs-5 text-center mt-1" id="exampleModalLabel">Edit Product <?= $product['id'] ?></h1>      
                    <form class="modal-body" action="/admin/save_update" method="POST" enctype="multipart/form-data">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" placeholder="" id="name" name="product_name" value="<?= $product['name'] ?>">
                            <label for="name">Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" placeholder="" id="description" name="description"><?= $product['description'] ?></textarea>
                            <label for="description">Description</label>
                        </div>
                        <div class="row mb-3">
                            <div class="form-floating col-6">
                                <select class="form-select" aria-label="Default select example" id="category" name="category">
                                    <option <?= ($product['category']=='Vegetables')?'selected':''?> value="Vegetables">Vegetable</option>
                                    <option <?= ($product['category']=='Fruits')?'selected':''?> value="Fruits">Fruits</option>
                                    <option <?= ($product['category']=='Meat')?'selected':''?> value="Meat">Meat</option>
                                    <option <?= ($product['category']=='Dairy')?'selected':''?> value="Dairy">Dairy</option>
                                    <option <?= ($product['category']=='Grains')?'selected':''?> value="Grains">Grains</option>
                                </select>
                                <label for="category" class="ms-2">Category</label>
                            </div>                       
                            <div class="form-floating col-3">
                                <input type="number" class="form-control" placeholder="" id="price" name="price" value="<?= $product['price'] ?>">
                                <label for="price" class="ms-2">Price</label>
                            </div>
                            <div class="form-floating col-3">
                                <input type="number" class="form-control" placeholder="" id="stocks" name="stocks" value="<?= $product['stocks'] ?>" min="1">
                                <label for="stocks" class="ms-2">Stocks</label>
                            </div>
                        </div>
                        <div class="preview-images mb-3 text-center">
<?php
    foreach($product['images']['img'] as $key => $image){
?>
                            <section>
                                <input type="radio" value="<?= $key ?>" id="edit<?= $key ?>" name="marked_main" <?= ($key==$main_index)?'checked':'' ?>>
                                <input type="checkbox" value="<?= $key ?>" name="checkbox[]" checked id="checkbox<?= $key ?>">
                                <label class="x-btn" for="checkbox<?= $key ?>"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" xmlns:v="https://vecta.io/nano"><path d="M14 1.41L12.59 0L7 5.59L1.41 0L0 1.41L5.59 7L0 12.59L1.41 14L7 8.41L12.59 14L14 12.59L8.41 7L14 1.41Z" fill="#cad"></svg></label>
                                <label for="edit<?= $key ?>">
                                    <img src="../../../assets/uploads/<?= $image?>">Main
                                </label>
                            </section>    
<?php
    }
?>                  
                        </div>
                        <div class="mb-3">
                            <input id="img_create_upload" class="form-control" type="file" id="formFileMultiple" multiple name="images[]">
                        </div>
                        <div class="modal-footer">
                            <label id="csrf">
                                <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>">
                            </label>
                            <input type="hidden" value="<?= $product['id'] ?>" name="product_id">
                            <button type="button" class="btn btn-danger" id="cancel-edit-btn">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
<?php        
    }
?>