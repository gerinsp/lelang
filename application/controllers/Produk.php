<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('Models', 'm');

      date_default_timezone_set('Asia/Jakarta');
      cekuser();
   }

   function listproduk()
   {
      $table = 'user';
      $where = array(
         'id_user'      =>   $this->session->userdata('id_user')
      );

      $data['user'] = $this->m->Get_Where($where, $table);
      $data['title'] = 'Lelang | List Produk';

      $select = $this->db->select('produk.id,nama_produk,deskripsi_produk,durasi_iklan,tbl_produk.status_show as statustampil,
       gambar1, gambar2, gambar3, gambar4, gambar5, gambar6, gambar7, gambar8, gambar9, gambar10, gambar11, gambar12, tbl_kategori.nama_kategori');
      $select = $this->db->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_produk.id_kategori');
      $data['produk'] = $this->m->Get_All('produk', $select);

      $this->load->view('templates/head', $data);
      $this->load->view('templates/navigation', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('pages/master/produk/listproduk', $data);
      $this->load->view('templates/footer');
      $this->load->view('templates/script', $data);
   }

   function createproduk()
   {

      $this->form_validation->set_rules(
         'namaproduk',
         'namaproduk',
         'required|trim',
         [
            'required' => 'Field nama produk tidak boleh kosong'
         ]
      );
      if ($this->form_validation->run() == false) {
         $role_id = $this->session->userdata('role_id');

         $table = 'user';
         $where = array(
            'id_user'      =>   $this->session->userdata('id_user')
         );

         $data['user'] = $this->m->Get_Where($where, $table);
         $data['title'] = 'Lelang | Tambah Data Produk';

         $select = $this->db->select('nama_kategori,id_kategori');
         $select = $this->db->where('status_show', '1');
         $data['kategori'] = $this->m->Get_All('kategori', $select);

         $this->load->view('templates/head', $data);
         $this->load->view('templates/navigation', $data);
         $this->load->view('templates/sidebar', $data);
         $this->load->view('pages/master/produk/createproduk', $data);
         $this->load->view('templates/footer');
         $this->load->view('templates/script', $data);
      } else {
         date_default_timezone_set('Asia/Jakarta');
         $now = date('Y-m-d H:i:s');

         $config['upload_path']          = 'assets/file/iconproduk';
         $config['max_size']             = 3145728; //set max size allowed in Kilob
         $config['allowed_types']        = 'jpg|jpeg|png';
         $config['encrypt_name']         = true; // set max height allowed
         $this->load->library('upload', $config);


         $uploaded_files = array();

         for ($i = 1; $i <= 12; $i++) {
            $file_input_name = 'gambar' . $i;

            if (!empty($_FILES[$file_input_name]['name'])) {
               $size = $_FILES[$file_input_name]['size'];
               $nama = $_FILES[$file_input_name]['name'];

               $format = pathinfo($nama, PATHINFO_EXTENSION);
               if ($size > 3145728) {
                  $this->session->set_flashdata('error', 'Gambar ' . $file_input_name . ' terlalu besar');
                  redirect('tambahdataproduk');
               } elseif ($format != "jpg" and $format != "png" and $format != "jpeg" and $format != "JPG" and $format != "PNG" and $format != "JPEG") {
                  $this->session->set_flashdata('error', 'Format gambar ' . $file_input_name . '  tidak sesuai');
                  redirect('tambahdataproduk');
               }

               if (!$this->upload->do_upload($file_input_name)) {
                  $error = $this->upload->display_errors();
                  echo $error;
               }

               $data = $this->upload->data();

               // Lakukan proses penyimpanan file dengan nama baru di sini
               $new_path = './assets/file/iconproduk/' . $data['file_name'];
               rename($data['full_path'], $new_path);

               $uploaded_files['gambar' . $i] = $data['file_name'];
            } else {
               $uploaded_files['gambar' . $i] = "";
            }
         }

          $kategori = $this->db->select('input_produk')
              ->where('id_kategori', $this->input->post('kategori'))
              ->from('kategori')->get()
              ->row_array();

         $input_produk = json_decode($kategori['input_produk']);

         $data_input = [];
         if ($input_produk) {
             foreach ($input_produk as $val) {
                 $input = $this->input->post($val->nama_input);
                 if ($input) {
                     $data_input[$val->nama_input] = $input;
                 }
             }
         }

          $data = array(
            'nama_produk'           =>   $this->input->post('namaproduk'),
            'deskripsi_produk'      =>   $this->input->post('deskripsiproduk'),
            'status_show'           =>   $this->input->post('statusshow'),
            'durasi_iklan'          =>   $this->input->post('durasiiklan'),
            'id_kategori'           =>   $this->input->post('kategori'),
            'info_penyelenggara'    =>   $this->input->post('infopenyelenggara'),
            'hargaawal'             =>   $this->input->post('hargaawal'),
            'create_by'             =>   $this->session->userdata('id_user'),
            'create_date'           =>   $now,
         );

          if (count($data_input) > 0) {
              $data['detail_produk'] = json_encode($data_input);
          }

         foreach ($uploaded_files as $key => $value) {
            $data[$key] = $value;
         }

         $this->m->Save($data, 'produk');

          //history
          $nama_user = $this->session->userdata('nama');
          $this->m->Save([
              'id_menu' => 4,
              'nama' => $nama_user,
              'keterangan' => $nama_user.' menambah data produk'
          ], 'history');

         $this->session->set_flashdata('success', 'Data produk berhasil ditambah');
         redirect('listproduk');
      }
   }
   function editproduk($id)
   {

      $data = [
         'title' => 'Lelang | Edit Data Produk'
      ];
      $role_id = $this->session->userdata('role_id');

      $table = 'user';
      $where = array(
         'id_user'      =>   $this->session->userdata('id_user')
      );

      $data['user'] = $this->m->Get_Where($where, $table);

      $select = $this->db->select('produk.hargaawal, produk.id,nama_produk,deskripsi_produk,durasi_iklan,tbl_produk.status_show as statustampil, produk.info_penyelenggara,
      gambar1, gambar2, gambar3, gambar4, gambar5, gambar6, gambar7, gambar8, gambar9, gambar10, gambar11, gambar12,, tbl_produk.status_show, tbl_produk.id_kategori, tbl_kategori.nama_kategori');
      $select = $this->db->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_produk.id_kategori');
      $select = $this->db->where('tbl_produk.id', $id);
      $data['produk'] = $this->m->Get_All('produk', $select);

      $select = $this->db->select('nama_kategori,id_kategori');
      $select = $this->db->where('status_show', '1');
      $data['kategori'] = $this->m->Get_All('kategori', $select);

      $this->load->view('templates/head', $data);
      $this->load->view('templates/navigation', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('pages/master/produk/updateproduk', $data);
      $this->load->view('templates/footer');
      $this->load->view('templates/script', $data);
   }

   function updateproduk()
   {
      date_default_timezone_set('Asia/Jakarta');
      $now = date('Y-m-d H:i:s');

      $table = 'produk';
      $where = array(
         'id'          =>   $this->input->post('idproduk')
      );


      $config['upload_path']          = 'assets/file/iconproduk';
      $config['max_size']             = 3145728; //set max size allowed in Kilob
      $config['allowed_types']        = 'jpg|jpeg|png';
      $config['encrypt_name']         = true; // set max height allowed
      $this->load->library('upload', $config);


      $uploaded_files = array();

      for ($i = 1; $i <= 12; $i++) {
         $file_input_name = 'gambar' . $i;

         if (!empty($_FILES[$file_input_name]['name'])) {
            $size = $_FILES[$file_input_name]['size'];
            $nama = $_FILES[$file_input_name]['name'];

            $format = pathinfo($nama, PATHINFO_EXTENSION);
            if ($size > 3145728) {
               $this->session->set_flashdata('error', 'Gambar ' . $file_input_name . ' terlalu besar');
               redirect('tambahdataproduk');
            } elseif ($format != "jpg" and $format != "png" and $format != "jpeg" and $format != "JPG" and $format != "PNG" and $format != "JPEG") {
               $this->session->set_flashdata('error', 'Format gambar ' . $file_input_name . '  tidak sesuai');
               redirect('tambahdataproduk');
            }

            if (!$this->upload->do_upload($file_input_name)) {
               $error = $this->upload->display_errors();
               echo $error;
            }

            $data = $this->upload->data();

            // Lakukan proses penyimpanan file dengan nama baru di sini
            $new_path = './assets/file/iconproduk/' . $data['file_name'];
            rename($data['full_path'], $new_path);

            $uploaded_files['gambar' . $i] = $data['file_name'];
         }
      }

       $kategori = $this->db->select('input_produk')
           ->where('id_kategori', $this->input->post('kategori'))
           ->from('kategori')->get()
           ->row_array();

       $input_produk = json_decode($kategori['input_produk']);

       $data_input = [];
       if ($input_produk) {
           foreach ($input_produk as $val) {
               $input = $this->input->post($val->nama_input);
               if ($input) {
                   $data_input[$val->nama_input] = $input;
               }
           }
       }

      $data = array(
         'nama_produk'           =>   $this->input->post('namaproduk'),
         'status_show'           =>   $this->input->post('statusshow'),
         'deskripsi_produk'      =>   $this->input->post('deskripsiproduk'),
         'durasi_iklan'          =>   $this->input->post('durasiiklan'),
         'id_kategori'           =>   $this->input->post('kategori'),
         'info_penyelenggara'    =>   $this->input->post('infopenyelenggara'),
         'hargaawal'             =>   $this->input->post('hargaawal'),
         'update_by'             =>   $this->session->userdata('id_user'),
         'update_date'           =>   $now,
      );

       if (count($data_input) > 0) {
           $data['detail_produk'] = json_encode($data_input);
       }

      foreach ($uploaded_files as $key => $value) {
         $data[$key] = $value;
      }

      $this->m->Update($where, $data, $table);

       //history
       $nama_user = $this->session->userdata('nama');
       $this->m->Save([
           'id_menu' => 4,
           'nama' => $nama_user,
           'keterangan' => $nama_user.' mengupdate data produk'
       ], 'history');

      $this->session->set_flashdata('success', 'Data produk berhasil diubah');
      redirect('listproduk');
   }
   function deleteproduk()
   {
      $id_produk =  $this->input->post('id');

      $table = 'produk';
      $where = array(
         'id'          =>  $id_produk
      );
      $this->m->Delete($where, $table);

       //history
       $nama_user = $this->session->userdata('nama');
       $this->m->Save([
           'id_menu' => 4,
           'nama' => $nama_user,
           'keterangan' => $nama_user.' menghapus data produk'
       ], 'history');

      $this->session->set_flashdata('success', 'Data produk berhasil dihapus');
      redirect('listproduk');
   }

   function getkategori()
   {
       $id_kategori = $this->input->post('id_kategori');

       $kategori = $this->db->select('input_produk')
                ->where('id_kategori', $id_kategori)
                ->from('kategori')->get()
                ->result_array();

       $input_produk = isset($kategori[0]['input_produk']) ? json_decode($kategori[0]['input_produk']) : '';

       $response = [
           'status' => 'ok',
           'kategori' => $input_produk
       ];
       $this->output->set_content_type('application/json')->set_output(json_encode($response));
   }

    function getkategorivalue()
    {
        $id_kategori = $this->input->post('id_kategori');

        $kategori = $this->db->select('input_produk')
            ->where('id_kategori', $id_kategori)
            ->from('kategori')->get()
            ->result_array();
        $produk = $this->db->select('detail_produk')
            ->where('id_kategori', $id_kategori)
            ->from('produk')->get()
            ->result_array();

        $detail_produk = isset($produk[0]['detail_produk']) ? json_decode($produk[0]['detail_produk']) : '';
        $input_produk = isset($kategori[0]['input_produk']) ? json_decode($kategori[0]['input_produk']) : '';

        $result = array();

        if ($input_produk != '') {
            foreach ($input_produk as $obj) {
                if (property_exists($detail_produk, $obj->nama_input)) {
                    $result[] = (object) array(
                        'nama_input' => $obj->nama_input,
                        'tipe_data' => $obj->tipe_data,
                        'nilai_input' => $detail_produk->{$obj->nama_input}
                    );
                }
            }
        }

        $response = [
            'status' => 'ok',
            'data' => $result
        ];
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }
}
