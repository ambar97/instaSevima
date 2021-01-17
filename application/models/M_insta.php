<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_insta extends CI_Model {

    public function select($table){
    return $this->db->get($table);
  }
  public function selectlimit($table){
      $this->db->order_by('id_informasi','DESC') ;
     $this->db->limit(3) ;
     return $this->db->get($table) ;
  }

  public function selectwhere($table,$data){
    return $this->db->get_where($table, $data);
  }

  function delete($where,$table){
    $this->db->where($where);
    $this->db->delete($table);
  }

  public function update($table,$data,$where){
    $this->db->update($table,$data,$where);
  }

  public function insert($table,$data){
    $this->db->insert($table,$data);
  }
  function cek_login($table,$where){
    return $this->db->get_where($table,$where);
  }
  function detail_user(){
      $id = $this->session->userdata('id_login');
      return $this->db->get_where('user',array('id_user'=>$id))->row_array();
    }
    function tread_file(){
      $id = $this->session->userdata('id_login');
      $this->db->where('id_user',$id);
      $this->db->order_by('id_tread','DESC');
      return $this->db->get('tread')->result_array();
  }
  function komentar($id){
    $this->db->select('user.*,komentar.*');
    $this->db->join('user','komentar.id_user = user.id_user');
    // $this->db->join('komentar','tread.id_tread = komentar.id_tread');
    $this->db->where('komentar.id_tread',$id);
    // $this->db->order_by('id_komentar','DESC');
    $this->db->limit(4);
    $this->db->from('komentar');
    return $this->db->get();
  }
  function det_komentar($id){
    $this->db->select( 'user.*,komentar.*');
    // $this->db->join('komentar','tread.id_tread = komentar.id_tread');
    $this->db->join('user','komentar.id_user = user.id_user');
    $this->db->where('komentar.id_tread',$id);
    $this->db->order_by('id_komentar','DESC');
    // $this->db->limit(4);
    $this->db->from('komentar');
    return $this->db->get();
  }
}