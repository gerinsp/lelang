<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sales extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('Models', 'm');
      $this->load->helper(array('file', 'download', 'url'));

      date_default_timezone_set('Asia/Jakarta');
      cekuser();
   }

    public function download_images($id) {
        $sales = $this->db->select('nama_sales, foto_kk, foto_ktp, foto_diri')
            ->from('sales')
            ->where('id_sales', $id)
            ->get()
            ->row();

        if (!$sales) {
            show_404();
            return;
        }

        $path = './assets/file/sales/';

        $files = [
            'foto_kk'   => $sales->foto_kk,
            'foto_ktp'  => $sales->foto_ktp,
            'foto_diri' => $sales->foto_diri,
        ];

        $this->load->library('zip');

        foreach ($files as $key => $file) {
            if ($file && file_exists($path . $file)) {
                $file_path = $path . $file;
                $this->zip->read_file($file_path, $file);
            }
        }

        $zip_filename = "foto {$sales->nama_sales}.zip";

        $this->zip->download($zip_filename);
    }


    function listsales()
   {
      $table = 'user';
      $where = array(
         'id_user'      =>   $this->session->userdata('id_user')
      );

      $data['user'] = $this->m->Get_Where($where, $table);
      $data['title'] = 'Lelang | List Sales';

      $select = $this->db->select('*');
      $data['sales'] = $this->m->Get_All('sales', $select);

      $this->load->view('templates/head', $data);
      $this->load->view('templates/navigation', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('pages/master/sales/listsales', $data);
      $this->load->view('templates/footer');
      $this->load->view('templates/script', $data);
   }

   function createsales()
   {

      $this->form_validation->set_rules(
         'namasales',
         'namasales',
         'required|trim',
         [
            'required' => 'Field nama sales tidak boleh kosong'
         ]
      );
      $this->form_validation->set_rules(
         'nohp',
         'nohp',
         'required|trim',
         [
            'required' => 'Field nomor handphone tidak boleh kosong'
         ]
      );
      if ($this->form_validation->run() == false) {
         $role_id = $this->session->userdata('role_id');

         $table = 'user';
         $where = array(
            'id_user'      =>   $this->session->userdata('id_user')
         );

         $data['user'] = $this->m->Get_Where($where, $table);
         $data['title'] = 'Lelang | Tambah Data Sales';

         $this->load->view('templates/head', $data);
         $this->load->view('templates/navigation', $data);
         $this->load->view('templates/sidebar', $data);
         $this->load->view('pages/master/sales/createsales', $data);
         $this->load->view('templates/footer');
         $this->load->view('templates/script', $data);
      } else {
         $config['upload_path']          = 'assets/file/sales';
         $config['max_size']             = 3145728; //set max size allowed in Kilob
         $config['allowed_types']        = 'jpg|jpeg|png';
         $config['encrypt_name']         = true; // set max height allowed
         $this->load->library('upload', $config);


         $uploaded_files = array();

         for ($i = 1; $i <= 3; $i++) {
            $file_input_name = 'gambar' . $i;

            if (!empty($_FILES[$file_input_name]['name'])) {
               $size = $_FILES[$file_input_name]['size'];
               $nama = $_FILES[$file_input_name]['name'];

               $format = pathinfo($nama, PATHINFO_EXTENSION);
               if ($size > 3145728) {
                  $this->session->set_flashdata('error', 'Gambar ' . $file_input_name . ' terlalu besar');
                  redirect('tambahdatasales');
               } elseif ($format != "jpg" and $format != "png" and $format != "jpeg" and $format != "JPG" and $format != "PNG" and $format != "JPEG") {
                  $this->session->set_flashdata('error', 'Format gambar ' . $file_input_name . '  tidak sesuai');
                  redirect('tambahdatasales');
               }

               if (!$this->upload->do_upload($file_input_name)) {
                  $error = $this->upload->display_errors();
                  echo $error;
               }

               $data = $this->upload->data();

               // Lakukan proses penyimpanan file dengan nama baru di sini
               $new_path = './assets/file/sales/' . $nama;
               rename($data['full_path'], $new_path);
            } else {
               $uploaded_files['foto_ktp'] = "";
               $uploaded_files['foto_kk'] = "";
               $uploaded_files['foto_diri'] = "";
            }
         }
         $ktp = $_FILES['gambar1']['name'];
         $kk = $_FILES['gambar2']['name'];
         $diri = $_FILES['gambar3']['name'];
         $data = array(
            'nama_sales'        =>   $this->input->post('namasales'),
            'jenis_kelamin'     =>   $this->input->post('jeniskelamin'),
            'no_hp'             =>   $this->input->post('nohp'),
            'alamat'            =>   $this->input->post('alamat'),
            'foto_ktp'          =>   $ktp,
            'foto_kk'           =>   $kk,
            'foto_diri'         =>   $diri,
            'create_by'         =>   $this->session->userdata('nama')
         );

         $this->m->Save($data, 'sales');

          //history
          $nama_user = $this->session->userdata('nama');
          $this->m->Save([
              'id_menu' => 6,
              'nama' => $nama_user,
              'keterangan' => $nama_user.' menambah data sales'
          ], 'history');

         $this->session->set_flashdata('success', 'Data sales berhasil ditambah');
         redirect('listsales');
      }
   }
   function editsales($id_sales)
   {

      $data = [
         'title' => 'Lelang | Edit Data Sales'
      ];
      $role_id = $this->session->userdata('role_id');

      $table = 'user';
      $where = array(
         'id_user'      =>   $this->session->userdata('id_user')
      );

      $data['user'] = $this->m->Get_Where($where, $table);

      $select = $this->db->select('*');
      $select = $this->db->where('id_sales', $id_sales);
      $data['sales'] = $this->m->Get_All('sales', $select);

      $this->load->view('templates/head', $data);
      $this->load->view('templates/navigation', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('pages/master/sales/updatesales', $data);
      $this->load->view('templates/footer');
      $this->load->view('templates/script', $data);
   }

   function updatesales()
   {

      $table = 'sales';
      $where = array(
         'id_sales'          =>   $this->input->post('idsales')
      );
      $config['upload_path']          = 'assets/file/sales';
      $config['max_size']             = 3145728; //set max size allowed in Kilob
      $config['allowed_types']        = 'jpg|jpeg|png';
      $config['encrypt_name']         = true; // set max height allowed
      $this->load->library('upload', $config);


      $uploaded_files = array();

      for ($i = 1; $i <= 3; $i++) {
         $file_input_name = 'gambar' . $i;

         if (!empty($_FILES[$file_input_name]['name'])) {
            $size = $_FILES[$file_input_name]['size'];
            $nama = $_FILES[$file_input_name]['name'];
            // var_dump($nama);
            // die;
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
            $new_path = './assets/file/sales/' . $nama;
            rename($data['full_path'], $new_path);

            // $uploaded_files['foto_ktp'] =  "sd";
            // $uploaded_files['foto_kk'] =  $nama;
            // $uploaded_files['foto_diri'] = $data['file_name'];
         }
      }
      $ktp = $_FILES['gambar1']['name'];
      $kk = $_FILES['gambar2']['name'];
      $diri = $_FILES['gambar3']['name'];
      $data = array(
         'nama_sales'        =>   $this->input->post('namasales'),
         'jenis_kelamin'     =>   $this->input->post('jeniskelamin'),
         'no_hp'             =>   $this->input->post('nohp'),
         'alamat'            =>   $this->input->post('alamat'),
         'foto_ktp'          =>   $ktp,
         'foto_kk'           =>   $kk,
         'foto_diri'         =>   $diri,
          'update_by'        =>   $this->session->userdata('nama'),
          'update_date'      =>   date('Y-m-d H:i:s')
      );

      $this->m->Update($where, $data, $table);

       //history
       $nama_user = $this->session->userdata('nama');
       $this->m->Save([
           'id_menu' => 6,
           'nama' => $nama_user,
           'keterangan' => $nama_user.' mengedit data sales'
       ], 'history');

      $this->session->set_flashdata('success', 'Data sales berhasil diubah');
      redirect('listsales');
   }
   function deletesales()
   {

      $table = 'sales';
      $where = array(
         'id_sales'          =>  $this->input->post('id')
      );
      $this->m->Delete($where, $table);

       //history
       $nama_user = $this->session->userdata('nama');
       $this->m->Save([
           'id_menu' => 6,
           'nama' => $nama_user,
           'keterangan' => $nama_user.' menghapus data sales'
       ], 'history');

      $this->session->set_flashdata('success', 'Data sales berhasil dihapus');
      redirect('listsales');
   }
   function customersales($id_sales)
   {
      $table = 'user';
      $where = array(
         'id_user'      =>   $this->session->userdata('id_user')
      );

      $data['user'] = $this->m->Get_Where($where, $table);
      $data['title'] = 'Lelang | List Customer';

      $select = $this->db->select('tbl_customer.id_customer,tbl_customer.nama_customer,tbl_customer.jenis_kelamin,tbl_customer.alamat,tbl_customer.no_hp,tbl_customer.create_date, tbl_customer.update_date, tbl_customer.create_by, tbl_customer.update_by, tbl_customer.foto_ktp,tbl_customer.foto_kk,tbl_customer.foto_diri');
      $select = $this->db->where('tbl_customer.id_sales', $id_sales);
      $data['customer'] = $this->m->Get_All('customer', $select);

      $this->load->view('templates/head', $data);
      $this->load->view('templates/navigation', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('pages/master/customer/listcustomer', $data);
      $this->load->view('templates/footer');
      $this->load->view('templates/script', $data);
   }
}
