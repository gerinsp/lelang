<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('Models', 'm');
   }

   function index()
   {
      $table = 'user';
      $where = array(
         'id_user'      =>   $this->session->userdata('id_user')
      );

      $data['user'] = $this->m->Get_Where($where, $table);
      $data['title'] = 'Reminder';


      $this->load->view('pages/home/home', $data);
      $this->load->view('templates/script', $data);
   }

   function saverekappasien()
   {
      date_default_timezone_set('Asia/Jakarta');
      $now = date('Y-m-d H:i:s');

      $this->db->select('*');
      $this->db->from('pasien');
      $this->db->where('nik', $this->input->post('nik'));
      $cekpasien = $this->db->get();

      $getpasien = $cekpasien->result();
      if ($cekpasien->num_rows() > 0) {
         foreach ($getpasien as $datapasien) {
            $idpasien = $datapasien->id_pasien;
         }
         $this->db->select('*');
         $this->db->from('rekappasien');
         $this->db->where('id_pasien', $idpasien);
         $this->db->where('DATE(create_date)', date('y-m-d'));
         $cekrekappasien = $this->db->get();

         if ($cekrekappasien->num_rows() > 0) {
            $response = array(
               'message' => "Anda sudah lapor hari ini",
               'icon' => "warning" // Gantilah ini dengan ikon yang sesuai
            );

            echo json_encode($response);
         } else {
            $data = array(
               'id_pasien'         =>   $idpasien,
               'statuslapor'       =>   1,
               'statusmakan'       =>   $this->input->post('statusmakan'),
               'create_date'       =>   $now,
            );
            $this->m->Save($data, 'rekappasien');
            $response = array(
               'message' => "Sudah berhasil lapor hari ini",
               'icon' => "success" // Gantilah ini dengan ikon yang sesuai
            );

            echo json_encode($response);
         }
      } else {
         $response = array(
            'message' => "NIK belum terdaftar",
            'icon' => "danger" // Gantilah ini dengan ikon yang sesuai
         );

         echo json_encode($response);
      }
   }
}
