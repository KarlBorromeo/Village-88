<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('adminmodel');
        $this->load->model('product');
    }
    public function index()
    {
        $this->load->view('/admin/orders');
    }

    /* all fetch unctageorized orders */
    /* passing the start refence for the number page */
    /* passing the method name so that will be the reference of the anchor tag in pagination */
    public function all_orders_uncategorized($start = 1)
    {
        $orders = $this->adminmodel->fetch_all_orders();
        $this->load->view('partials/admin_order_list',array('method'=>'all_orders_uncategorized','orders'=>$orders,'start_index'=>$start));
    }
    /* fetch filtered category status orders */
    /* passing the start refence for the number page */
    /* passing the method name so that will be the reference of the anchor tag in pagination */
    public function all_orders_categorized($status='',$start = 1)
    {
        $orders = $this->adminmodel->fetch_all_orders($status);
        $this->load->view('partials/admin_order_list',array('method'=>'all_orders_categorized','orders'=>$orders,'start_index'=>$start,'status'=>$status));
    }

    /* search order id */
    /* passing the start refence for the number page */
    /* passing the method name so that will be the reference of the anchor tag in pagination */
    public function search_order_id($start = 1)
    {
        $orders = $this->adminmodel->search_order_id($this->input->post('search'));
        $this->load->view('partials/admin_order_list',array('method'=>'search_order_id','orders'=>$orders,'start_index'=>$start));
    }

    /* render admin product page */
    public function products()
    {
        $this->load->view('admin/products');
    }

    /* fetch all uncetgorized products */
    /* passing the start refence for the number page */
    /* passing the method name so that will be the reference of the anchor tag in pagination */
    public function all_product_uncategorized($start = 1)
    {
        $products = $this->product->fetch_all_product();
        $this->load->view('partials/admin_product_list',array('method'=>'all_product_uncategorized','products'=>$products,'start_index'=>$start));
    }

    /* fetch all filtered category product*/
    /* passing the start refence for the number page */
    /* passing the method name so that will be the reference of the anchor tag in pagination */
    public function all_products_categorized($category='',$start = 1)
    {
        $products = $this->product->fetch_all_product($category);
        $this->load->view('partials/admin_product_list',array('method'=>'all_products_categorized','products'=>$products,'start_index'=>$start,'category' => $category));
    }

    /* search the name of the product */
    /* passing the start refence for the number page */
    /* passing the method name so that will be the reference of the anchor tag in pagination */
    public function search_product($start = 1)
    {
        $products = $this->product->search_product($this->input->post('search'));
        $this->load->view('partials/admin_product_list',array( 'method' => 'search_product','products'=>$products,'start_index' => $start));
    }

    /*add product */
    public function add_product()
    {
        $errors = $this->adminmodel->validate();
        if($errors){
            $this->session->set_flashdata('add-product-error',$errors); 
        }else{
            $upload_error = $this->adminmodel->move_images();
            if($upload_error){
                $this->session->set_flashdata('add-product-error',$upload_error); 
            }else{
                $images = $this->adminmodel->image_path_getter();
                $this->adminmodel->add_product($images);             
            }
        }
        redirect('/admin/products');
    }

    /* delete product using product id*/
    public function delete_product($product_id)
    {
        $this->adminmodel->delete_product($product_id);
        $this->all_product_uncategorized();
    }

    /* fetch specific product details */
    public function fetch_one_product($product_id)
    {
        $product = $this->product->fetch_one_product($product_id);
        $this->load->view('partials/admin_product_edit',array('product'=>$product));
    }

    /* update product details*/
    public function save_update()
    {
        $errors = $this->adminmodel->validate();
        if(!$errors AND count($this->input->post('checkbox'))>0){
            $total_images = count($this->input->post('checkbox'))+ count($_FILES['images']['name']);
            if($_FILES['images']['name']['0']!= '' AND $total_images<=4){
                $upload_error = $this->adminmodel->move_images();
                if(!$upload_error){
                    $product_details = $this->product->fetch_one_product($this->input->post('product_id'));
                    $this->adminmodel->save_product_update($product_details);                    
                }
            }else{
                $product_details = $this->product->fetch_one_product($this->input->post('product_id'));
                $this->adminmodel->save_product_update($product_details);  
            }
        }
        redirect('admin/products');
    }

    /* update order status */
    public function order_update($order_id)
    {
        $this->adminmodel->update_status($order_id);
    }
}
?>