<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('Models', 'm');

      date_default_timezone_set('Asia/Jakarta');
      cekuser();
   }

   function listcustomer()
   {
      $table = 'user';
      $where = array(
         'id_user'      =>   $this->session->userdata('id_user')
      );

      $data['user'] = $this->m->Get_Where($where, $table);
      $data['title'] = 'Lelang | List Customer';

      $select = $this->db->select('tbl_customer.nama_customer,tbl_customer.jenis_kelamin,tbl_customer.alamat,tbl_customer.no_hp, tbl_sales.nama_sales');
      $select = $this->db->join('tbl_sales', 'tbl_sales.id_sales = tbl_customer.id_sales');
      $data['customer'] = $this->m->Get_All('customer', $select);

      $this->load->view('templates/head', $data);
      $this->load->view('templates/navigation', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('pages/master/customer/listcustomer', $data);
      $this->load->view('templates/footer');
      $this->load->view('templates/script', $data);
   }

   function createcustomer()
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

         $config['upload_path']          = 'assets/file/iconcustomer';
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
               $this->session->set_flashdata('error', 'Icon customer terlalu besar');
               redirect('tambahdatacustomer');
            } elseif ($format != "jpg" and $format != "png" and $format != "jpeg" and $format != "JPG" and $format != "PNG" and $format != "JPEG") {
               $this->session->set_flashdata('error', 'Format icon tidak sesuai');
               redirect('tambahdatacustomer');
            } else {
               $this->upload->do_upload('image');

               $data1 = array('upload_data' => $this->upload->data());
               // Lakukan proses penyimpanan file dengan nama baru di sini 

               rename($data1['upload_data']['full_path'], './assets/file/iconcustomer/' . $nama);


               $iconcustomer = $nama;
            }
         } else {
            $iconcustomer = "Tidak Ada File";
         }

         $data = array(
            'nama_customer'     =>   $this->input->post('namacustomer'),
            'status_show'       =>   $this->input->post('statusshow'),
            'icon_customer'     =>   $iconcustomer,
            'create_by'         =>   $this->session->userdata('id_user'),
            'create_date'       =>   $now,
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
      date_default_timezone_set('Asia/Jakarta');
      $now = date('Y-m-d H:i:s');

      $table = 'customer';
      $where = array(
         'id_customer'          =>   $this->input->post('idcustomer')
      );

      $data = array(
         'nama_customer'     =>   $this->input->post('namacustomer'),
         'status_show'       =>   $this->input->post('statusshow'),
         'update_by'         =>   $this->session->userdata('id_user'),
         'update_date'       =>   $now,
      );
      $upload_image = $_FILES['image']['name'];
      if ($upload_image) {
         $config['allowed_types'] = 'gif|jpg|png|jpeg';
         $config['max_size'] = '2048';
         $config['upload_path'] = './assets/file/iconcustomer';

         $this->load->library('upload', $config);

         if ($this->upload->do_upload('image')) {
            $old_image = $this->input->post('iconcustomerold');

            $path1 = './assets/file/iconcustomer/' . $old_image;
            unlink($path1);

            $new_image = $this->upload->data('file_name');

            $this->db->set('icon_customer', $new_image);
         } else {
            echo $this->upload->display_errors();
         }
      }
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
