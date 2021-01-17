<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Detail extends CI_Controller
{
	public function posting($id)
	{
                $get_data = $this->db->get_where('tread',array('id_tread'=>$id))->row_array();
                $komentar = $this->M_insta->det_komentar($id)->result_array();
                $da = array('kontent'=>$get_data,'komen'=>$komentar);
                $this->load->view('v_detail',$da);
	}

	
}
