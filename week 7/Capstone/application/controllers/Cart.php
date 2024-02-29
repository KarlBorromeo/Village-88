<?php defined('BASEPATH') or exit('direct access not allowed');
class Cart extends CI_Controller{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('product');
    }

    /* fetch the items of the cart*/
    public function index(){
        if($this->session->userdata('user')){
            $this->load->view('cart/cart',array('firstname'=>$this->session->userdata('user')['firstname'],'lastname'=>$this->session->userdata('user')['lastname']));
        }else{
            redirect('/auth/login');
        }
    }

    /* remove item in cart */
    public function remove_item($cart_id)
    {
        if($this->session->userdata('user')){
            $this->product->remove_item($cart_id);
            $this->feth_cart_details();
        }else{
            redirect('/auth/login');
        }
    }

    /* fetch the cart items and calculate total */
    public function feth_cart_details()
    {
        $user_id = $this->session->userdata('user')['id'];
        $response = $this->product->fetch_cart($user_id);
        $this->load->view('partials/cart_list',array('cart'=>$response['cart']));
    }

    /* get the updated total of cart items */
    public function get_total_amount()
    {
        $user_id = $this->session->userdata('user')['id'];
        $response = $this->product->fetch_cart($user_id);
        echo $response['total_amount'];
    }

    /* update the items of the cart */
    public function update_cart_item($cart_id)
    {
        if($this->session->userdata('user')){
            $this->product->update_item($cart_id);
            $this->feth_cart_details();
        }else{
            redirect('/auth/login');
        }
    }
}
?>