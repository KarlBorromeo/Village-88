<?php 
    foreach($cart as $item){
        $main_index = $item['images']['main_img'];
?>
                        <li class="d-flex gap-5 align-items-center justify-content-between">
                            <div>
                                <img src="../../../assets/uploads/<?= $item['images']['img'][$main_index] ?>">
                                <section class="text-start">
                                    <p><?= $item['name'] ?><p>
                                    <span class="text-primary fw-semibold border"><?= $item['price'] ?></span>
                                </section>                                
                            </div>
                            <div class="d-flex align-items-center gap-4">
                                <form id="form_update" action="/cart/update_cart_item/<?= $item['cart_id'] ?>" method="POST" class="d-flex gap-4">
                                    <label>
                                        <p>Quantity</p>
                                        <input type="hidden" name="product_id" value="<?= $item['product_id'] ?>">
                                        <input type="number" name="quantity" min="1" value="<?= $item['pieces'] ?>" class="border quantity"> 
                                    </label>
                                    <label>
                                        <p>Total Amount</p>
                                        <input type="text" value="<?= $item['total'] ?>" disabled class="text-primary fw-semibold border">  
                                    </label> 
                                </form>
                                <a class="del" href="/cart/remove_item/<?= $item['cart_id'] ?>" class="border border-top-0 border-bottom-0 border-end-0"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="red" xmlns:v="https://vecta.io/nano"><path d="M14 1.41L12.59 0L7 5.59L1.41 0L0 1.41L5.59 7L0 12.59L1.41 14L7 8.41L12.59 14L14 12.59L8.41 7L14 1.41Z" fill="#cadced"/></svg></a>
                            </div>
                        </li>
<?php
    }
?>