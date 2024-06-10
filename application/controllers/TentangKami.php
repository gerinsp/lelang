<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TentangKami extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('Models', 'm');

      date_default_timezone_set('Asia/Jakarta');
      cekuser();
   }

   function tentang_kami()
   {
      $table = 'user';
      $where = array(
         'id_user'      =>   $this->session->userdata('id_user')
      );

      $data['user'] = $this->m->Get_Where($where, $table);
      $data['title'] = 'Lelang | Tentang Kami';

      $data['tentangkami'] = $this->db->select('*')->from('tentangkami')->get()->row();

      $this->load->view('templates/head', $data);
      $this->load->view('templates/navigation', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('pages/master/tentangkami/tentangkami', $data);
      $this->load->view('templates/footer');
      $this->load->view('templates/script', $data);
   }

   function create()
   {
       date_default_timezone_set('Asia/Jakarta');
       $now = date('Y-m-d H:i:s');

       $data = array(
           'visi_misi'      => $this->input->post('visi_misi'),
           'sejarah'        => $this->input->post('sejarah'),
       );

       $tentangkami = $this->db->select('*')->from('tentangkami')->get()->row();

       if ($tentangkami) {
           $this->db->update('tentangkami', $data);
       } else {
           $this->m->Save($data, 'tentangkami');
       }
       //history
       $nama_user = $this->session->userdata('nama');
       $this->m->Save([
           'id_menu' => 1,
           'nama' => $nama_user,
           'keterangan' => $nama_user.' mengupdate data tentang kami'
       ], 'history');
       $this->session->set_flashdata('success', 'Data tentang kami berhasil disimpan');
       redirect('tentangkami');
   }
}
