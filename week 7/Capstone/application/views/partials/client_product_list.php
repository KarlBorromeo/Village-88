                        <h4 class="text-capitalize mb-3"><?= (isset($category)?$category:'All') ?> Products(<?= count($products) ?>)</h4>
<?php
    /* creating a maximum at $maxitems items on current page */
    /* intializing the start and end of every page */
    $maxitems = 8;
    $start = ($start_index-1) * $maxitems ;
    $end = $start + $maxitems ;
    if($end > count($products)){
        $end = count($products);
    }
    for($i = $start; $i < $end; $i++){
        $main_index = $products[$i]['images']['main_img'];
?>
                        <li>
                            <a href="/products/item/<?= $products[$i]['id'] ?>">
                                <img src="../../assets/uploads/<?= $products[$i]['images']['img'][$main_index] ?>">
                                <div>
                                    <p><?= $products[$i]['name'] ?><p>
                                    <section>
                                        <img src="../../assets/images/star_shade.png">
                                        <img src="../../assets/images/star_shade.png">
                                        <img src="../../assets/images/star_shade.png">
                                        <img src="../../assets/images/star_shade.png">
                                        <img src="../../assets/images/star_empty.png">
                                        <p>36 Rating</p>
                                    </section>
                                    <span class="text-primary fw-semibold">
                                    <?= $products[$i]['price'] ?>
                                    </span>
                                </div>
                            </a>
                        </li>
<?php
    }
    /* solving how many pages to be generated */
    $num_pages = 1;
    $list_length = count($products);
    if($list_length > $maxitems ){
        $num_pages = $list_length / $maxitems ;
        if($list_length%$maxitems  != 0){
            $num_pages++;
        }
    }if($num_pages > 1){
?>
                        <div class="d-flex gap-3 border">
<?php
                        /* method is the refence for the method to be called when the acnhor is clicked */
                        /* putting the category on the href if the current list is filtered by category,else no category on anchor href */
        for($i = 1; $i <= $num_pages; $i++){
?>      
                            <a class="pagination" href="/products/<?= $method?><?=(isset($category)?'/'.$category:'')?>/<?=$i ?>" class="border p-3"><?= $i ?></a>
<?php
        }
?>
                        </div>
<?php
    }
?>
            