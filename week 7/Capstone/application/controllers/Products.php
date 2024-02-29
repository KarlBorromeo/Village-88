<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Products extends CI_Controller{
    private $shippingFee;
    private $cart_items_count;
    public function __construct()
    {
        parent::__construct();
        $this->shippingFee = 10;
        $this->load->model('product');
        if($this->session->userdata('user')){
            $cart = $this->product->fetch_cart($this->session->userdata('user')['id']);
            $this->cart_items_count = count($cart['cart']);
        }else{
            $this->cart_items_count = 0;
        }
    }

    /* returns the count of items on the user's cart */
    public function cart_count_getter()
    {
        echo $this->cart_items_count;
    }
    
    /* return the shipping fee */
    public function shippFee_getter()
    {
        echo $this->shippingFee;
    }

    public function index()
    {
        $this->load->view('home');
    }

    /* render the product list on the partials */
    /* passing the start refence for the number page */
    /* passing the method name so that will be the reference of the anchor tag in pagination */
    public function all_products_uncategorized($start = 1)
    {
        $products = $this->product->fetch_all_product();
        $this->load->view('partials/client_product_list',array('products' => $products,'start_index' => $start,'method' => 'all_products_uncategorized'));
    }

    /* fetch all filtered category product and render on partials*/
    /* passing the start refence for the number page */
    /* passing the method name so that will be the reference of the anchor tag in pagination */
    public function all_products_categorized($category='',$start = 1)
    {
        $products = $this->product->fetch_all_product($category);
        $this->load->view('partials/client_product_list',array('products' => $products,'start_index' => $start,'method' => 'all_products_categorized','category' => $category));
    }

    /* search the name of the product and render to paritals the results */
    /* passing the start refence for the number page */
    /* passing the method name so that will be the reference of the anchor tag in pagination */
    public function search_product($start = 1)
    {
        $products = $this->product->search_product($this->input->post('search'));
        $this->load->view('partials/client_product_list',array('products' => $products,'start_index' => $start,'method' => 'search_product'));
    }

    /* fetch details of specific product*/
    public function item($product_id)
    {
        $product = $this->product->fetch_one_product($product_id);
        $this->load->view('item/item',array('product'=>$product,'main_index'=>$product['images']['main_img']));
    }

    /* update the total_amount pre checkout */
    public function update_total(){
        echo $this->calc_total_precart();
    }

    /* calculate the total before add to cart */
    private function calc_total_precart()
    {
        $product = $this->product->fetch_one_product($this->input->post('product_id'));
        return $product['price'] * $this->input->post('quantity');
    }

    /* add to cart */
    public function add_cart()
    {
        if($this->session->userdata('user')){
            $details = array('user_id' => $this->session->userdata('user')['id'],
                            'product_id' => $this->input->post('product_id'),
                            'pieces' => $this->input->post('quantity'),
                            'total' => $this->calc_total_precart());                
            $this->product->add_cart($details); 
        }else{
            redirect('/auth/login');
        }
    }
}
?>