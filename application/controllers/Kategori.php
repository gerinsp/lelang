<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('Models', 'm');

      date_default_timezone_set('Asia/Jakarta');
      cekuser();
   }

   function listkategori()
   {
      $table = 'user';
      $where = array(
         'id_user'      =>   $this->session->userdata('id_user')
      );

      $data['user'] = $this->m->Get_Where($where, $table);
      $data['title'] = 'Lelang | List Kategori';

      $select = $this->db->select('*');
      $data['kategori'] = $this->m->Get_All('kategori', $select);

      $this->load->view('templates/head', $data);
      $this->load->view('templates/navigation', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('pages/master/kategori/listkategori', $data);
      $this->load->view('templates/footer');
      $this->load->view('templates/script', $data);
   }

   function createkategori()
   {

      $this->form_validation->set_rules(
         'namakategori',
         'namakategori',
         'required|trim',
         [
            'required' => 'Field nama kategori tidak boleh kosong'
         ]
      );
      if ($this->form_validation->run() == false) {
         $role_id = $this->session->userdata('role_id');

         $table = 'user';
         $where = array(
            'id_user'      =>   $this->session->userdata('id_user')
         );

         $data['user'] = $this->m->Get_Where($where, $table);
         $data['title'] = 'Lelang | Tambah Data Kategori';

         $this->load->view('templates/head', $data);
         $this->load->view('templates/navigation', $data);
         $this->load->view('templates/sidebar', $data);
         $this->load->view('pages/master/kategori/createkategori', $data);
         $this->load->view('templates/footer');
         $this->load->view('templates/script', $data);
      } else {
         date_default_timezone_set('Asia/Jakarta');
         $now = date('Y-m-d H:i:s');

         $config['upload_path']          = 'assets/file/iconkategori';
         $config['allowed_types']        = 'jpg|jpeg|png';
         $config['max_size']             = 10000000; //set max size allowed in Kilobyte
         $config['max_width']            = 1000000; // set max width image allowed
         $config['max_height']           = 1000000; // set max height allowed 
         $config['encrypt_name']           = true; // set max height allowed 
         $this->load->library('upload', $config);


         if (!empty($_FILES['image']['name'])) {


            $size = $_FILES['image']['size'];
            $nama = $_FILES['image']['name'];

            $format = pathinfo($nama, PATHINFO_EXTENSION);
            if ($size > 10000000) {
               $this->session->set_flashdata('error', 'Icon kategori terlalu besar');
               redirect('tambahdatakategori');
            } elseif ($format != "jpg" and $format != "png" and $format != "jpeg" and $format != "JPG" and $format != "PNG" and $format != "JPEG") {
               $this->session->set_flashdata('error', 'Format icon tidak sesuai');
               redirect('tambahdatakategori');
            } else {
               $this->upload->do_upload('image');

               $data1 = array('upload_data' => $this->upload->data());
               // Lakukan proses penyimpanan file dengan nama baru di sini 

               rename($data1['upload_data']['full_path'], './assets/file/iconkategori/' . $nama);


               $iconkategori = $nama;
            }
         } else {
            $iconkategori = "Tidak Ada File";
         }

          $nama_input = $this->input->post('nama_input');
          $tipe_data = $this->input->post('tipe_data');

          $combined_data = [];

          if (is_array($nama_input) && is_array($tipe_data) && count($nama_input) === count($tipe_data)) {
              for ($i = 0; $i < count($nama_input); $i++) {
                  $combined_data[] = [
                      'nama_input' => $nama_input[$i],
                      'tipe_data' => $tipe_data[$i]
                  ];
              }
          }

         $data = array(
            'nama_kategori'     =>   $this->input->post('namakategori'),
            'status_show'       =>   $this->input->post('statusshow'),
            'icon_kategori'     =>   $iconkategori,
            'create_by'         =>   $this->session->userdata('id_user'),
            'create_date'       =>   $now,
             'input_produk'     =>   json_encode($combined_data)
         );

         $this->m->Save($data, 'kategori');

          //history
          $nama_user = $this->session->userdata('nama');
          $this->m->Save([
              'id_menu' => 5,
              'nama' => $nama_user,
              'keterangan' => $nama_user.' menambah data kategori produk'
          ], 'history');

         $this->session->set_flashdata('success', 'Data kategori berhasil ditambah');
         redirect('listkategori');
      }
   }
   function editkategori($id_kategori)
   {

      $data = [
         'title' => 'Lelang | Edit Data Kategori'
      ];
      $role_id = $this->session->userdata('role_id');

      $table = 'user';
      $where = array(
         'id_user'      =>   $this->session->userdata('id_user')
      );

      $data['user'] = $this->m->Get_Where($where, $table);

      $select = $this->db->select('*');
      $select = $this->db->where('id_kategori', $id_kategori);
      $data['kategori'] = $this->m->Get_All('kategori', $select);

      $input_produk = json_decode($data['kategori'][0]->input_produk, true);
      $data['input_produk'] = $input_produk;

      $this->load->view('templates/head', $data);
      $this->load->view('templates/navigation', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('pages/master/kategori/updatekategori', $data);
      $this->load->view('templates/footer');
      $this->load->view('templates/script', $data);
   }

   function updatekategori()
   {
      date_default_timezone_set('Asia/Jakarta');
      $now = date('Y-m-d H:i:s');

      $table = 'kategori';
      $where = array(
         'id_kategori'          =>   $this->input->post('idkategori')
      );

       $nama_input = $this->input->post('nama_input');
       $tipe_data = $this->input->post('tipe_data');

       $combined_data = [];

       if (is_array($nama_input) && is_array($tipe_data) && count($nama_input) === count($tipe_data)) {
           for ($i = 0; $i < count($nama_input); $i++) {
               $combined_data[] = [
                   'nama_input' => $nama_input[$i],
                   'tipe_data' => $tipe_data[$i]
               ];
           }
       }

      $data = array(
         'nama_kategori'     =>   $this->input->post('namakategori'),
         'status_show'       =>   $this->input->post('statusshow'),
         'update_by'         =>   $this->session->userdata('id_user'),
         'update_date'       =>   $now,
          'input_produk'     =>   json_encode($combined_data)
      );
      $upload_image = $_FILES['image']['name'];
      if ($upload_image) {
         $config['allowed_types'] = 'gif|jpg|png|jpeg';
         $config['max_size'] = '2048';
         $config['upload_path'] = './assets/file/iconkategori';

         $this->load->library('upload', $config);

         if ($this->upload->do_upload('image')) {
            $old_image = $this->input->post('iconkategoriold');

            $path1 = './assets/file/iconkategori/' . $old_image;
            unlink($path1);

            $new_image = $this->upload->data('file_name');

            $this->db->set('icon_kategori', $new_image);
         } else {
            echo $this->upload->display_errors();
         }
      }
      $this->m->Update($where, $data, $table);

       //history
       $nama_user = $this->session->userdata('nama');
       $this->m->Save([
           'id_menu' => 5,
           'nama' => $nama_user,
           'keterangan' => $nama_user.' mengupdate data kategori produk'
       ], 'history');

      $this->session->set_flashdata('success', 'Data kategori berhasil diubah');
      redirect('listkategori');
   }
   function deletekategori()
   {
      $id_kategori =  $this->input->post('id');
      $this->db->select('*');
      $this->db->from('produk');
      $this->db->where('id_kategori', $id_kategori);
      $checkproduk = $this->db->get();

      if ($checkproduk->num_rows() == 0) {
         $table = 'kategori';
         $where = array(
            'id_kategori'          =>  $id_kategori
         );
         $this->m->Delete($where, $table);
      } else if ($checkproduk->num_rows() > 1) {
         $table = 'kategori';
         $where = array(
            'id_kategori'          =>   $this->input->post('idkategori')
         );

         $data = array(
            'status_show'       =>   0,
         );
         $this->m->Update($where, $data, $table);
      }

       //history
       $nama_user = $this->session->userdata('nama');
       $this->m->Save([
           'id_menu' => 5,
           'nama' => $nama_user,
           'keterangan' => $nama_user.' menghapus data kategori produk'
       ], 'history');

      $this->session->set_flashdata('success', 'Data kategori berhasil dihapus');
      redirect('listkategori');
   }
}
