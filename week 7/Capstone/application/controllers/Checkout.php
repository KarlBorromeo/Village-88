<?php defined('BASEPATH') OR exit('direct access not allowed');
class Checkout extends CI_Controller{
    private $shippingFee;
    public function __construct()
    {
        parent::__construct();
        $this->shippingFee = 10;
        $this->load->model('product');
    }

    /*proceed to checkout validation,store to session the paypload if no errors*/
    public function checkout_now()
    {
        if($this->session->userdata('user')){
            $result = $this->product->validate_checkout($this->shippingFee);
            if(!isset($result['error'])){
                $this->session->set_userdata(array('form_order_payload'=>$result));
                $this->session->unset_userdata('checkout-error');
                $cart = $this->product->fetch_cart($this->session->userdata('user')['id']);
                $this->load->view('checkout',array('amount'=>$cart['total_amount'] + $this->shippingFee));
            }else{
                $this->session->set_userdata(array('checkout-error' => $result['error'])); 
            }
        }else{
            redirect('/auth/login');
        }
    }

    /* return the session checkout-error */
    public function checkout_error_getter()
    {
        echo $this->session->userdata('checkout-error');
    }

    /* handle payment, predefiend stripe payment controller*/
    public function handlePayment()
    {
        if($this->session->userdata('user')){
            require_once('application/libraries/stripe-php/init.php');
            \Stripe\Stripe::setApiKey($this->config->item('stripe_secret'));
            $stripeCustomer = \Stripe\Customer::create([
                "source" => $this->input->post('stripeToken'),
                'name' => $this->session->userdata('user')['email']
            ]);
            $customerId = $stripeCustomer->id; 
            $cart = $this->product->fetch_cart($this->session->userdata('user')['id']);
            \Stripe\Charge::create ([
                    "amount" => 100 * ($cart['total_amount'] + $this->shippingFee),
                    "currency" => "usd",
                    "customer" => $customerId,
                    "description" => "Organic Stripe Test",
            ]);    
            $this->product->add_order($this->session->userdata('form_order_payload'),$this->session->userdata('user')['id']);
            $this->session->unset_userdata('form_order_payload');
            redirect('/products');
        }
    }
}
?>