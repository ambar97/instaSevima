<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function index()
	{
		$this->load->view('v_login');
	}
	public function login(){
		$username = $this->input->post('username');
		$pass = $this->input->post('password');
		$cek_data = $this->db->get_where('user',array('username'=>$username))->row_array();
		$this->load->library('encryption');
            $crypte = $this->config->config['encryption_key'];
            $this->encryption->initialize(
                array(
                    'cipher' => 'aes-256',
                    'mode' => 'ctr',
                    'key' => $crypte
                )
            ); 
            $password_encryption =  $this->encryption->decrypt($cek_data['password']);
		if($cek_data != NULL){
			if ($password_encryption == $pass) {
				$this->session->set_userdata(array('id_login'=>$cek_data['id_user'],'status'=>'login'));
				redirect(base_url('Home'));
			}else{
				redirect(base_url());
			}
		}
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url());
	}
	public function profile(){

	}
	public function save_insta(){

	}
}
