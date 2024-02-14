<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sales extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('Models', 'm');

      date_default_timezone_set('Asia/Jakarta');
      cekuser();
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

         $data = array(
            'nama_sales'        =>   $this->input->post('namasales'),
            'jenis_kelamin'     =>   $this->input->post('jeniskelamin'),
            'no_hp'             =>   $this->input->post('nohp'),
            'alamat'            =>   $this->input->post('alamat'),
         );

         $this->m->Save($data, 'sales');
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
      $data = array(
         'nama_sales'        =>   $this->input->post('namasales'),
         'jenis_kelamin'     =>   $this->input->post('jeniskelamin'),
         'no_hp'             =>   $this->input->post('nohp'),
         'alamat'            =>   $this->input->post('alamat'),
      );
      $this->m->Update($where, $data, $table);

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
      $this->session->set_flashdata('success', 'Data sales berhasil dihapus');
      redirect('listsales');
   }
}
