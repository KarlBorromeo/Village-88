<?php defined('BASEPATH') or exit('direct access allowed');

class Product extends CI_Model{
    /* fetch reqeust for all products */
    public function fetch_all_product($category = '')
    {
        $query = "SELECT * FROM products ". ($category != '' ? "WHERE category = ?":'');
        $response =  $this->db->query($query,array($category))->result_array();
        $products = array();
        foreach($response as $res){
            $res['images'] = json_decode($res['images'],true);
            $products[] = $res;
        }
        return $products;
    }

    /* search product name */
    public function search_product($search)
    {
        $response = $this->db->query("SELECT * FROM products WHERE name LIKE '{$search}%'")->result_array();
        $products = array();
        foreach($response as $res){
            $res['images'] = json_decode($res['images'],true);
            $products[] = $res;
        }
        return $products;
    }

    /* fetch one product details */
    public function fetch_one_product($product_id)
    {
        $response = $this->db->query('SELECT * FROM products WHERE id = ?',array($product_id))->row_array();
        $response['images'] = json_decode($response['images'],true);
        return $response;
    }

    /* add to cart */
    public function add_cart($details)
    { 
        $this->output->enable_profiler(TRUE); 
        $payload = array($details['product_id'],
                        $details['user_id'],    
                        $details['pieces'],
                        $details['total']);
        $same_old_item = $this->db->query("SELECT * FROM cart_items WHERE users_id = ? AND products_id = ?",array($details['user_id'],$details['product_id']))->row_array();
        if($same_old_item != null){
            $item_price = $this->db->query("SELECT price FROM products WHERE id= ?",array($details['product_id']))->row_array();
            $updated_pieces = $same_old_item['pieces'] + $details['pieces'];
            $updated_total =  $updated_pieces * $item_price['price'];
            $this->db->query('UPDATE cart_items SET pieces = ?, total = ? ,updated_at = ? WHERE id = ?',array($updated_pieces,$updated_total,date('Y-m-d H:i:s'),$same_old_item['id']));
        }else{
            $this->db->query('INSERT INTO cart_items(products_id,users_id,pieces,total) VALUES(?,?,?,?)',$payload);
        }
    }

    /* fetch user's cart */
    public function fetch_cart($user_id)
    {
        $response =  $this->db->query("SELECT cart_items.id as cart_id, name, images, price, pieces, total, products.id as product_id FROM cart_items 
                                INNER JOIN products ON products.id = cart_items.products_id
                                WHERE users_id = ?",array($user_id))->result_array();
        $cart = array();
        $total_amount_items = 0;
        foreach($response as $res){
            $res['images'] = json_decode($res['images'],true);
            $cart[] = $res;
            $total_amount_items += $res['total'];
        }
        return array('cart'=>$cart,'total_amount'=>$total_amount_items);
    }

    /* remove item on cart */
    public function remove_item($cart_id)
    {
        $this->db->query('DELETE FROM cart_items WHERE id = ?',array($cart_id));
    }

    /* updated item on cart */
    public function update_item($cart_id)
    {
        if($this->input->post('quantity')>0){
            $item_price = $this->db->query("SELECT price FROM products WHERE id= ?",array($this->input->post('product_id')))->row_array();
            $updated_total = $item_price['price'] * $this->input->post('quantity');
            $this->db->query('UPDATE cart_items SET pieces = ?, total = ?, updated_at = ? 
                            WHERE id = ? AND products_id = ? AND users_id = ?',
                            array($this->input->post('quantity'),
                                    $updated_total,
                                    date('Y-m-d H:i:s'),
                                    $cart_id,
                                    $this->input->post('product_id'),
                                    $this->session->userdata('user')['id']));
        }
    }

    /* validate checkout form */
    public function validate_checkout($shippingFee){
        $cart = $this->fetch_cart($this->session->userdata('user')['id']);
        if(count($cart['cart']) < 1){
            return array('error' => 'Empty Cart, Please add to cart first');
        }
        $this->load->library('form_validation');
        $this->form_validation->set_rules('firstname','Firstname Shipping','required|alpha');
        $this->form_validation->set_rules('lastname','Lastname Shipping','required|alpha');
        $this->form_validation->set_rules('address','Address Shipping','required');
        $this->form_validation->set_rules('city','City Shipping','required');
        $this->form_validation->set_rules('state','State Shipping','required');
        $this->form_validation->set_rules('zip-code','ZIP Code Shipping','required|numeric');
        if(!$this->input->post('same-billing-shipping')){
            $this->form_validation->set_rules('firstname-billing','Firstname Billing','required|alpha');
            $this->form_validation->set_rules('lastname-billing','Lastname Billing','required|alpha');
            $this->form_validation->set_rules('address-billing','Address Billing','required');
            $this->form_validation->set_rules('city-billing','City Billing','required');
            $this->form_validation->set_rules('state-billing','State Billing','required');
            $this->form_validation->set_rules('zip-code-billing','ZIP Code Billing','required|numeric');
        }
        if($this->form_validation->run()){
            $cart_details = $this->fetch_cart($this->session->userdata('user')['id']);
            $cart_items = $cart_details['cart'];
            $total_amount = $cart_details['total_amount'] + $shippingFee;
            $payload = array('total_amount' => $total_amount,
                            'firstname' => $this->input->post('firstname'),
                            'lastname' => $this->input->post('lastname'),
                            'address' => $this->input->post('address'),
                            'address2' => $this->input->post('address2'),
                            'city' => $this->input->post('city'),
                            'state' => $this->input->post('state'),
                            'zip-code' => $this->input->post('zip-code'),
                            'order-items' => json_encode($cart_items),
                            'billing-information' => NULL);
            if(!$this->input->post('same-billing-shipping')){
                $payload['billing-information'] = json_encode(array(
                            'firstname' => $this->input->post('firstname-billing'),
                            'lastname' => $this->input->post('lastname-billing'),
                            'address' => $this->input->post('address-billing'),
                            'address2' => $this->input->post('address2-billing'),
                            'city' => $this->input->post('city-billing'),
                            'state' => $this->input->post('state-billing'),
                            'zip-code' => $this->input->post('zip-code-billing')));
            }else{
                $payload['billing-information'] = json_encode(array(
                            'firstname' => $this->input->post('firstname'),
                            'lastname' => $this->input->post('lastname'),
                            'address' => $this->input->post('address'),
                            'address2' => $this->input->post('address2'),
                            'city' => $this->input->post('city'),
                            'state' => $this->input->post('state'),
                            'zip-code' => $this->input->post('zip-code')));
            }
            return $payload;
        }else{
            return  array('error' => validation_errors(' ', ' '));
        }
    }

    /* add order*/
    public function add_order($payload,$user_id)
    {
        $this->db->query('INSERT INTO orders(total_amount,firstname,lastname,address,address2,city,state,zip_code,order_items,billing_information) 
                        VALUES(?,?,?,?,?,?,?,?,?,?)',$payload);

        /* removes the cart items of the users after succesfull checkout payment */
        $this->db->query('DELETE FROM cart_items WHERE users_id = ?',array($user_id));
    }
}
?>