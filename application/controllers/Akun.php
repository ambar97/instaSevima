<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require 'vendor/autoload.php';
class Akun extends CI_Controller {
    function __construct(){
		parent::__construct();
		
	}
	public function index()
	{
        $data = array('akun'=>$this->M_insta->detail_user(), 'file'=>$this->M_insta->tread_file());
		    $this->load->view('v_akun',$data);
    }
    public function posting(){
        $posting = $this->input->post('posting');
        $id = $this->session->userdata('id_login');
        $data = array('posting'=>$posting,'id_user'=>$id);

        $options = array(
            'cluster' => 'ap1',
            'useTLS' => true
          );
          $pusher = new Pusher\Pusher(
            'bc8dcd0cc5777092288d',
            '2735b16a2b75eab9dbcc',
            '1123179',
            $options
          );
          
         
        if ($this->db->insert('tread',$data)) {
            $push = $this->db->order_by('id_tread','DESC')->get('tread')->result();
          foreach ($push as $key) {
              $data_pusher[] = $key;
          }
            $pusher->trigger('my-channel', 'my-event', $data_pusher);
        }
    }

}
