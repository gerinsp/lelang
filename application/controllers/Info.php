<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Info extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('Models', 'm');

      date_default_timezone_set('Asia/Jakarta');
      cekuser();
   }

   function info()
   {
      $table = 'user';
      $where = array(
         'id_user'      =>   $this->session->userdata('id_user')
      );

      $data['user'] = $this->m->Get_Where($where, $table);
      $data['title'] = 'Lelang | Info';

      $data['info'] = $this->db->select('*')->from('info')->get()->row();

      $this->load->view('templates/head', $data);
      $this->load->view('templates/navigation', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('pages/master/info/info', $data);
      $this->load->view('templates/footer');
      $this->load->view('templates/script', $data);
   }

   function create()
   {
       date_default_timezone_set('Asia/Jakarta');
       $now = date('Y-m-d H:i:s');

       $maps = htmlspecialchars_decode($this->input->post('maps'));

       $maps = preg_replace('/width="\d+"/', 'width="100%"', $maps);
       $maps = preg_replace('/style="[^"]*"/', 'style="border:0; border-radius:0.5rem;"', $maps);


       $data = array(
           'telepon'      => $this->input->post('telepon'),
           'email'        => $this->input->post('email'),
           'alamat'       => $this->input->post('alamat'),
           'maps'         => $maps
       );

       $info = $this->db->select('*')->from('info')->get()->row();

       if ($info) {
           $this->db->update('info', $data);
       } else {
           $this->m->Save($data, 'info');
       }

       //history
       $nama_user = $this->session->userdata('nama');
       $this->m->Save([
           'id_menu' => 3,
           'nama' => $nama_user,
           'keterangan' => $nama_user.' mengupdate data info'
       ], 'history');

       $this->session->set_flashdata('success', 'Data info berhasil disimpan');
       redirect('data-info');
   }
}
