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

      $select = $this->db->select('tbl_customer.id_customer,tbl_customer.nama_customer,tbl_customer.jenis_kelamin,tbl_customer.alamat,tbl_customer.no_hp');
      // $select = $this->db->join('tbl_customer', 'tbl_customer.id_customer = tbl_customer.id_customer');
      $data['customer'] = $this->m->Get_All('customer', $select);

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

         $data = array(
            'nik'               =>   $this->input->post('nik'),
            'nama_customer'     =>   $this->input->post('namacustomer'),
            'jenis_kelamin'     =>   $this->input->post('jeniskelamin'),
            'no_hp'             =>   $this->input->post('nohp'),
            'alamat'            =>   $this->input->post('alamat'),
            'id_sales'          =>   $this->session->userdata('sales_id')
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
      $data = array(
         'nik'               =>   $this->input->post('nik'),
         'nama_customer'     =>   $this->input->post('namacustomer'),
         'jenis_kelamin'     =>   $this->input->post('jeniskelamin'),
         'no_hp'             =>   $this->input->post('nohp'),
         'alamat'            =>   $this->input->post('alamat'),
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
