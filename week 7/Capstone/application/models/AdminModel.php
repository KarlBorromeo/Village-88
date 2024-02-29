<?php defined('BASEPATH') OR exit('direct acess not allowed');
class AdminModel extends CI_Model{
    private $uploaded_image_paths = array();
    public function __construct()
    {
        parent::__construct();
        $this->uploaded_image_paths  = [];
    }

    /* return the path of uplaoded images */
    public function move_images()
    {
        $image_path = array();
        $config['upload_path']          = 'C:/wamp64/www/Capstone/assets/uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['overwrite']            = TRUE;
        $this->load->library('upload',$config);
        if(count($_FILES['images']['name']) <= 4){
            for( $i = 0; $i < count($_FILES['images']['name']) ;$i++){
                $_FILES['image']['name'] = $_FILES['images']['name'][$i];
                $_FILES['image']['type'] = $_FILES['images']['type'][$i];
                $_FILES['image']['tmp_name'] = $_FILES['images']['tmp_name'][$i];
                $_FILES['image']['error'] = $_FILES['images']['error'][$i];
                $_FILES['image']['size'] = $_FILES['images']['size'][$i];
                if(!$this->upload->do_upload('image'))
                {
                    return $this->upload->display_errors('<p class="error">','</p>');
                }
                else
                {
                    $image_path[] = $this->upload->data('file_name');
                }
            }      
            $this->uploaded_image_paths = $image_path;    
        }else{
            return '<p class="error">Max 4 images!</p>';
        }            
    }

    /* validate upload form fields */
    public function validate()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('product_name','Product Name', 'required');
        $this->form_validation->set_rules('description','Description', 'required');
        $this->form_validation->set_rules('category','Category', 'required');
        $this->form_validation->set_rules('price','Price', 'required|numeric');
        $this->form_validation->set_rules('stocks','Stocks', 'required|numeric');
        if($this->form_validation->run()){
            return null;
        }else{
            return validation_errors('<p class="error">','</p>');
        }
    }

    /* return the uploaded image paths */
    public function image_path_getter()
    {
        return $this->uploaded_image_paths;
    }

    /* insert data into table products */
    public function add_product($images)
    {
        $main_index = $this->input->post('marked_main');
        $jsonImages = $this->create_json_images($images,$main_index);
        $payload = array($this->input->post('product_name'),
                        $this->input->post('description'),
                        $this->input->post('category'),
                        $this->input->post('price'),
                        $this->input->post('stocks'),
                        $jsonImages);
        $this->db->query('INSERT INTO products(name,description,category,price,stocks,images) VALUES(?,?,?,?,?,?)',$payload);
    }

    /* insert data into table images */
    public function create_json_images($images,$main_index)
    {  
        $array = array();
        foreach($images as $image){
            $array['img'][] = $image;
        }
        $array['main_img'] = $main_index;
        return json_encode($array);
    }

    /* delete product */
    public function delete_product($product_id)
    {
        $this->db->query('DELETE FROM products where id = ?', array($product_id)); 
    }

    /* save product updates */
    public function save_product_update($product_details)
    {
        $updated_img_list = array();
        $updated_marked_main = $this->input->post('marked_main');
        foreach( $this->input->post('checkbox') as $index){
            $updated_img_list[] = $product_details['images']['img'][$index];
        }
        foreach($this->image_path_getter() as $image){
            $updated_img_list[] = $image;
        }
        if($updated_marked_main >= count($updated_img_list)){
            $updated_marked_main = 0;
        }
        $jsonImages = $this->create_json_images($updated_img_list,$updated_marked_main);
        $this->db->query('UPDATE products 
                    SET name = ?,
                    description = ?, 
                    category = ?, 
                    price = ?, 
                    stocks = ?,
                    images = ?
                    WHERE id = ?',
                    array($this->input->post('product_name'),
                        $this->input->post('description'),
                        $this->input->post('category'),
                        $this->input->post('price'),
                        $this->input->post('stocks'),
                        $jsonImages,
                        $this->input->post('product_id'),
                    ));
    }

    /* filter fetch orders by status */
    public function fetch_all_orders($status = '')
    {
        $query = "SELECT id, status,total_amount, date_format(order_date,'%m-%d-%Y') as order_date, 
                    concat(firstname, ' ' , lastname) as receiver_name,
                    concat(address,' ', address2,',',city,',',state,',',zip_code) as full_address FROM orders ". ($status != '' ? "WHERE status = ?":'');
        return $this->db->query($query,array($status))->result_array();
    }

    /* update the status of order */
    public function update_status($order_id)
    {
        $this->db->query('UPDATE orders SET status = ? WHERE id = ?',array($this->input->post('status'),$order_id));
    }

    /* search order id */
    public function search_order_id($id)
    {
        return $this->db->query("SELECT id, status,total_amount, date_format(order_date,'%m-%d-%Y') as order_date, 
                    concat(firstname, ' ' , lastname) as receiver_name,
                    concat(address,' ', address2,',',city,',',state,',',zip_code) as full_address FROM orders WHERE id LIKE '{$id}%'")->result_array();
    }
}
?>