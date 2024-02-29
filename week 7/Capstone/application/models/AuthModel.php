<?php defined('BASEPATH') or exit('direct acess not allowed');
class AuthModel extends CI_Model{
    /*VALIDATE the signup form return error if failed else null*/
    public function validate()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('firstname','Firstname','required|alpha');
        $this->form_validation->set_rules('lastname','Lastname','required|alpha');
        $this->form_validation->set_rules('email','Email','required|valid_email');
        $this->form_validation->set_rules('password','Password','required|min_length[8]');
        $this->form_validation->set_rules('confirm-password','Confirm Password','matches[password]');
        if($this->form_validation->run()){
            return $this->email_matched($this->input->post('email'));
        }else{
            return validation_errors('<p class="error">','<p>');
        }
    }

    /* create the account */
    public function create_account()
    {
        $role = $this->generate_role();
        return $this->db->query('INSERT INTO users(firstname,lastname,email,password,roles_id) VALUES(?,?,?,?,?)',
                        array($this->input->post('firstname'),
                            $this->input->post('lastname'),
                            $this->input->post('email'),
                            md5($this->input->post('password')),
                            $role));

    }

    /* get all the users, return "admin" if empty else 'client' */
    private function generate_role()
    {
        $users = $this->db->query("SELECT * FROM users")->result_array();
        if(count($users)>0){
            return '6';
        }else{
            return '5';
        }
    }

    /* check if existing email return null if no match else String*/
    private function email_matched($email){
        $users = $this->db->query("SELECT * FROM users")->result_array();
        if(count($users)>0){
            for($i = 0; $i<count($users); $i++){
                if($users[$i]['email'] === $email){
                    return '<p class="error">Email existed already</p>';
                }
            }
        }
        return null;
    }

    /* login user and return user details*/
    public function login(){
        $payload = array($this->input->post('email'),md5($this->input->post('password')));
        return $this->db->query('SELECT users.id as id,firstname,lastname,email,roles_id, type FROM users 
                            INNER JOIN roles ON users.roles_id = roles.id WHERE email = ? AND password = ?',$payload)->row_array();
    }
}
?>