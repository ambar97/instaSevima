<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require 'vendor/autoload.php';
class Home extends CI_Controller {
    function __construct(){
		parent::__construct();
		
	}
	public function index()
	{
        $data = array('tread'=>$this->db->order_by('id_tread','DESC')->get('tread')->result_array());
		$this->load->view('v_home',$data);
    }
    public function posting(){
        $posting = $this->input->post('posting');
        $id = $this->input->post('id_login');
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
    public function like(){
      $id = $this->session->userdata('id_login');
      $id_tread = $this->input->post('tread_id');
      $cek_data = $this->db->get_where('like',array('id_tread'=>$id_tread,'id_user'=>$id))->num_rows();
      $get_like = $this->db->get_where('tread',array('id_tread'=>$id_tread))->row_array();
      $like = $get_like['like'];
      if($cek_data > 0){
        $count_like = (int)$like - 1;
        $this->db->delete('like',array('id_tread'=>$id_tread,'id_user'=>$id));
      }else{
        $count_like = (int)$like + 1;
        $this->db->insert('like',array('id_tread'=>$id_tread,'id_user'=>$id));
      }
      $set_like = $this->db->update('tread',array('like'=>$count_like),array('id_tread'=>$id_tread));
      echo json_encode($count_like);
    }

    public function komentar(){
      $tread = $this->input->post('tread');
      $tread_id = $this->input->post('id');
        $id = $this->session->userdata('id_login');
        $data = array('id_tread'=>$tread_id,'komentar'=>$tread,'id_user'=>$id);

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
          
         
        if ($this->db->insert('komentar',$data)) {
            // $push = $this->db->order_by('id_komentar','DESC')->get_where('komentar',array('id_tread'=>$tread_id))->result();
            $push = $this->M_insta->det_komentar($tread_id)->result();
          foreach ($push as $key) {
              $data_pusher[] = $key;
          }
            $pusher->trigger('my-channel', 'my-event', $data_pusher);
        }
    }
}
