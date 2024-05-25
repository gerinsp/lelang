<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends CI_Controller
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
        $sales = $this->db->select('nama_customer, foto_kk, foto_ktp, foto_diri')
            ->from('customer')
            ->where('id_customer', $id)
            ->get()
            ->row();

        if (!$sales) {
            show_404();
            return;
        }

        $path = './assets/file/customer/';

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

        $zip_filename = "foto {$sales->nama_customer}.zip";

        $this->zip->download($zip_filename);
    }

   function listcustomer()
   {
      $table = 'user';
      $where = array(
         'id_user'      =>   $this->session->userdata('id_user')
      );

      $data['user'] = $this->m->Get_Where($where, $table);
      $data['title'] = 'Lelang | List Customer';

      if ($this->session->userdata('role_id') == 3) {
         $select = $this->db->select('tbl_customer.foto_ktp,tbl_customer.foto_kk,tbl_customer.foto_diri,tbl_customer.id_customer,tbl_customer.nama_customer,tbl_customer.jenis_kelamin,tbl_customer.alamat,tbl_customer.no_hp');
         $select = $this->db->where('tbl_customer.id_sales', $this->session->userdata('sales_id'));
         $data['customer'] = $this->m->Get_All('customer', $select);
      } else {
         $select = $this->db->select('tbl_customer.foto_ktp,tbl_customer.foto_kk,tbl_customer.foto_diri,tbl_customer.id_customer,tbl_customer.nama_customer,tbl_customer.jenis_kelamin,tbl_customer.alamat,tbl_customer.no_hp');
         // $select = $this->db->join('tbl_customer', 'tbl_customer.id_customer = tbl_customer.id_customer');
         $data['customer'] = $this->m->Get_All('customer', $select);
      }

      $this->load->view('templates/head', $data);
      $this->load->view('templates/navigation', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('pages/master/customer/listcustomer', $data);
      $this->load->view('templates/footer');
      $this->load->view('templates/script', $data);
   }
   function ceknik()
   {
      $nik = $this->input->post('nik');

      $this->db->select('*');
      $this->db->where('nik', $nik);
      $query = $this->db->get('customer');

      if ($query->num_rows() > 0) {
         echo "<span class='status-available' style='color:red'> NIK sudah didaftarkan oleh sales lain</span>
			";
      } else {
      }
   }
   function Createcustomer()
   {

      $this->form_validation->set_rules(
         'namacustomer',
         'namacustomer',
         'required|trim',
         [
            'required' => 'Field nama customer tidak boleh kosong'
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
         $this->load->view('pages/master/customer/createcustomer', $data);
         $this->load->view('templates/footer');
         $this->load->view('templates/script', $data);
      } else {
         date_default_timezone_set('Asia/Jakarta');
         $now = date('Y-m-d H:i:s');

         $config['upload_path']          = 'assets/file/customer';
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
               $new_path = './assets/file/customer/' . $nama;
               rename($data['full_path'], $new_path);

               $uploaded_files['foto_ktp'] = $data['file_name'];
               $uploaded_files['foto_kk'] = $data['file_name'];
               $uploaded_files['foto_diri'] = $data['file_name'];
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
            'nik'               =>   $this->input->post('nik'),
            'nama_customer'     =>   $this->input->post('namacustomer'),
            'jenis_kelamin'     =>   $this->input->post('jeniskelamin'),
            'no_hp'             =>   $this->input->post('nohp'),
            'alamat'            =>   $this->input->post('alamat'),
            'id_sales'          =>   $this->session->userdata('sales_id'),
            'foto_ktp'          =>   $ktp,
            'foto_kk'           =>   $kk,
            'foto_diri'         =>   $diri,
         );
         $this->m->Save($data, 'customer');

         $this->session->set_flashdata('success', 'Data customer berhasil ditambah');
         redirect('listcustomer');
      }
   }
   function editcustomer($id_customer)
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
      $select = $this->db->where('id_customer', $id_customer);
      $data['customer'] = $this->m->Get_All('customer', $select);

      $this->load->view('templates/head', $data);
      $this->load->view('templates/navigation', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('pages/master/customer/updatecustomer', $data);
      $this->load->view('templates/footer');
      $this->load->view('templates/script', $data);
   }

   function updatecustomer()
   {

      $table = 'customer';
      $where = array(
         'id_customer'          =>   $this->input->post('idcustomer')
      );
      $config['upload_path']          = 'assets/file/customer';
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
            $new_path = './assets/file/customer/' . $nama;
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
         'nik'               =>   $this->input->post('nik'),
         'nama_customer'     =>   $this->input->post('namacustomer'),
         'jenis_kelamin'     =>   $this->input->post('jeniskelamin'),
         'no_hp'             =>   $this->input->post('nohp'),
         'alamat'            =>   $this->input->post('alamat'),
         'foto_ktp'          =>   $ktp,
         'foto_kk'           =>   $kk,
         'foto_diri'         =>   $diri,
      );
      $this->m->Update($where, $data, $table);

      $this->session->set_flashdata('success', 'Data customer berhasil diubah');
      redirect('listcustomer');
   }
   function deletecustomer()
   {
      $id_customer =  $this->input->post('id');
      $this->db->select('*');
      $this->db->from('produk');
      $this->db->where('id_customer', $id_customer);
      $checkproduk = $this->db->get();

      if ($checkproduk->num_rows() == 0) {
         $table = 'customer';
         $where = array(
            'id_customer'          =>  $id_customer
         );
         $this->m->Delete($where, $table);
      } else if ($checkproduk->num_rows() > 1) {
         $table = 'customer';
         $where = array(
            'id_customer'          =>   $this->input->post('idcustomer')
         );

         $data = array(
            'status_show'       =>   0,
         );
         $this->m->Update($where, $data, $table);
      }
      $this->session->set_flashdata('success', 'Data customer berhasil dihapus');
      redirect('listcustomer');
   }
}
