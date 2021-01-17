<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
    function __construct()
	{
		parent::__construct();
		$this->load->library('upload');
	}
	public function index()
	{
        $data = array('profile'=>$this->db->get_where('user',array('id_user'=>$this->session->userdata('id_login')))->row_array());
		$this->load->view('v_profile',$data);
    }
    public function update(){
        $data = array('nm_user'=>$this->input->post('nm_lengkap'),
                        'email'=>$this->input->post('email'),
                        'phone_number'=>$this->input->post('notelp'),
                        'tentang'=>$this->input->post('bio'),
                        'username'=>$this->input->post('username'));
        $this->db->update('user',$data,array('id_user'=>$this->session->userdata('id_login')));
        return redirect(base_url('Profile'));
    }
    public function update_foto(){
        $config['upload_path']          = './galery/profile/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 1000;
		// $this->load->library('upload', $config);
			$this->upload->initialize($config);
			if ($this->upload->do_upload('ght')){
				$upload_data = $this->upload->data ();
				$foto = "galery/profile/".$upload_data['file_name'];
				$data = array('foto_profile'=>$foto);
				$data = $this->db->update('user',$data,array('id_user'=>$this->session->userdata('id_login')));
                redirect(base_url('Akun'));
			}else{
                $error = array('error' => $this->upload->display_errors());
                die(var_dump($error));
			}
    }
}
