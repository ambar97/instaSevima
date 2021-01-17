<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
	public function index()
	{
		$this->load->view('v_register');
    }
    public function daftar(){
        $this->load->library('encryption');
        $crypte = $this->config->config['encryption_key'];
        $this->encryption->initialize(
            array(
                'cipher' => 'aes-256',
                'mode' => 'ctr',
                'key' => $crypte
            )
        );
        $password = $this->encryption->encrypt($this->input->post('password'));
        $data = array('nm_user'=>$this->input->post('nama'),'email'=>$this->input->post('email'),
                        'phone_number'=>$this->input->post('notelp'),'username'=>$this->input->post('username'),
                        'password'=>$password);
        $this->db->insert('user',$data);
        return redirect(base_url());
    }
}
