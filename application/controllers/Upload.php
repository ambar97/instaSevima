<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller {
    function __construct()
	{
		parent::__construct();
		$this->load->library('upload');
	}
	public function index()
	{
		$this->load->view('v_upload');
    }
    public function kontent(){
        $id = $this->session->userdata('id_login');
        $caption = $this->input->post('caption');
        $config['upload_path']          = './galery/kontent/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 1000;
		// $this->load->library('upload', $config);
			$this->upload->initialize($config);
			if ($this->upload->do_upload('ght')){
				$upload_data = $this->upload->data ();
				$foto = "galery/kontent/".$upload_data['file_name'];
				$data = array('posting' =>$caption ,
							'img_tread'=>$foto,
							'id_user'=>$id);
				$data = $this->db->insert('tread',$data);
                redirect(base_url('Home'));
                // echo $upload_data['file_name'];
			}else{
                $error = array('error' => $this->upload->display_errors());
                die(var_dump($error));
			}
    }
}
