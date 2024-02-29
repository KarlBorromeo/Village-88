<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('authmodel');
	}
	public function index()
	{
		$this->load->view('auth/login');
	}
	public function render_signup()
	{
		$this->load->view('auth/signup');
		
	}

	/* singup user */
	public function signup()
	{
		$errors = $this->authmodel->validate();
		if(!$errors){
			if($this->authmodel->create_account()){
				$this->login();
			}else{
				$this->session->set_flashdata('error', '<p class="error">Creating Account Failed</p>'); 
				redirect('/auth/render_signup');
			}
		}else{
			$this->session->set_flashdata('error', $errors);
			redirect('/auth/render_signup');
		}
	}

	/* login user */
	public function login()
	{
		$user = $this->authmodel->login();
		var_dump($user);
		if($user){
			$this->session->set_userdata(array('user'=>$user));
			if($user['type'] == 'admin'){
				redirect('/admin');
			}
			redirect('/products');
		}else{
			$this->session->set_flashdata('error', '<p class="error">Credentials Error..</p>'); 
			redirect('/auth');
		}
	}

	/* log out */
	public function logout()
	{
		$this->session->unset_userdata('user');
		redirect('/auth');
	}

	/* from admin page, switch to products clients */
	public function switch()
	{
		$this->session->unset_userdata('user');
		redirect('/products');
	}
}
