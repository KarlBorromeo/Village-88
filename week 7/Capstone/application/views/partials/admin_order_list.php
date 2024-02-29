                        <h5>All Orders (<?= count($orders) ?>)</h5>
                        <table>                     
                            <thead> 
                                <tr>
                                    <th>Order ID #</th>
                                    <th>Order Date</th>
                                    <th class="receiver">Receiver</th>
                                    <th>Total Amount</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>

<?php 
    /* creating a maximum at $maxitems items on current page */
    /* intializing the start and end of every page */
    $maxitems = 5;
    $start = ($start_index-1) * $maxitems ;
    $end = $start + $maxitems ;
    if($end > count($orders)){
        $end = count($orders);
    }
    for($i = $start; $i < $end; $i++){
?>
                                <tr>
                                    <td class="order-id" ><?=  $orders[$i]['id'] ?></td>
                                    <td><?=  $orders[$i]['order_date'] ?></td>
                                    <td class="receiver">
                                        <p class="highlight"><?=  $orders[$i]['receiver_name'] ?></p>
                                        <p><?=  $orders[$i]['full_address'] ?></p>
                                    </td>
                                    <td class="highlight"><?=  $orders[$i]['total_amount'] ?></td>
                                    <td>
                                        <form action="/admin/order_update/<?=  $orders[$i]['id'] ?>" method="POST">
                                            <select class="select-status" class="highlight" name="status">
                                                <option <?= ($orders[$i]['status'] == 'pending')?'selected':'' ?> value="pending" >Pending</option>
                                                <option <?= ($orders[$i]['status'] == 'on_process')?'selected':'' ?> value="on_process" >On-Process</option>
                                                <option <?= ($orders[$i]['status'] == 'shipped')?'selected':'' ?> value="shipped" >Shipped</option>
                                                <option <?= ($orders[$i]['status'] == 'delivered')?'selected':'' ?> value="delivered" >Delivered</option>
                                            </select>                                            
                                        </form>
                                    </td>
                                </tr>
                                
<?php
    }
    /* solving how many pages to be generated */
    $num_pages = 1;
    $list_length = count($orders);
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
                        /* putting the category on the href if the current list is filtered by status ,else no status  on anchor href */
        for($i = 1; $i <= $num_pages; $i++){
?>      
                                    <td>
                                        <a class="pagination" href="/admin/<?= $method ?><?= ((isset($status))?'/'.$status:'')?>/<?=$i ?>"><?= $i ?></a>       
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