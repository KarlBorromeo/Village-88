                        <table>                     
                            <thead> 
                                <tr>
                                    <th>Product (<?= count($products) ?>)</th>
                                    <th>ID #</th>
                                    <th>Price</th>
                                    <th>Category</th>
                                    <th>Inventory</th>
                                    <th>Sold</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
<?php
    /* creating a maximum at $maxitems items on current page */
    /* intializing the start and end of every page */
    $maxitems = 5;
    $start = ($start_index-1) * $maxitems ;
    $end = $start + $maxitems ;
    if($end > count($products)){
        $end = count($products);
    }
    for($i = $start; $i < $end; $i++){
        $main_index = $products[$i]['images']['main_img'];
?>
                                <tr>
                                    <td class="image d-flex align-items-center gap-3 highlight"><img src="../../../assets/uploads/<?= $products[$i]['images']['img'][$main_index] ?>"><?= $products[$i]['name'] ?></td>
                                    <td><?= $products[$i]['id'] ?></td>
                                    <td class="highlight"><?= $products[$i]['price'] ?></td>
                                    <td><?= $products[$i]['category'] ?></td>
                                    <td><?= $products[$i]['stocks'] ?></td>
                                    <td>0</td>
                                    <td>
                                        <a class="edit btn btn-outline-primary" href="/admin/fetch_one_product/<?= $products[$i]['id'] ?>">Edit</a>
                                        <a href="/admin/delete_product/<?= $products[$i]['id'] ?>" class="delete"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" xmlns:v="https://vecta.io/nano"><path d="M14 1.41L12.59 0L7 5.59L1.41 0L0 1.41L5.59 7L0 12.59L1.41 14L7 8.41L12.59 14L14 12.59L8.41 7L14 1.41Z" fill="#cad"/></svg></a>
                                    </td>
                                </tr>
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
                                <tr class="d-flex gap-3" id="pagination-container">
<?php
                        /* method is the refence for the method to be called when the acnhor is clicked */
                        /* putting the category on the href if the current list is filtered by category,else no category on anchor href */
        for($i = 1; $i <= $num_pages; $i++){
?>      
                                    <td>
                                        <a class="pagination" href="/admin/<?= $method ?><?= ((isset($category))?'/'.$category:'')?>/<?=$i ?>"><?= $i ?></a>       
                                    </td>
<?php
        }
?>
                                </tr>
<?php
    }
?>
                            </tbody>
                        </table> 