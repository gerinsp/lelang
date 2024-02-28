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

      $select = $this->db->select('produk.id,nama_produk,deskripsi_produk,durasi_iklan,tbl_produk.status_show as statustampil,gambar1, tbl_kategori.nama_kategori');
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

         $config['upload_path']          = 'assets/file/masterproduk';
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
               $this->session->set_flashdata('error', 'Icon produk terlalu besar');
               redirect('tambahdataproduk');
            } elseif ($format != "jpg" and $format != "png" and $format != "jpeg" and $format != "JPG" and $format != "PNG" and $format != "JPEG") {
               $this->session->set_flashdata('error', 'Format icon tidak sesuai');
               redirect('tambahdataproduk');
            } else {
               $this->upload->do_upload('image');

               $data1 = array('upload_data' => $this->upload->data());
               // Lakukan proses penyimpanan file dengan nama baru di sini 

               rename($data1['upload_data']['full_path'], './assets/file/iconproduk/' . $nama);


               $iconproduk = $nama;
            }
         } else {
            $iconproduk = "Tidak Ada File";
         }

         $data = array(
            'nama_produk'       =>   $this->input->post('namaproduk'),
            'deskripsi_produk'  =>   $this->input->post('deskripsiproduk'),
            'status_show'       =>   $this->input->post('statusshow'),
            'durasi_iklan'      =>   $this->input->post('durasiiklan'),
            'id_kategori'       =>   $this->input->post('kategori'),
            'create_by'         =>   $this->session->userdata('id_user'),
            'create_date'       =>   $now,
         );

         $this->m->Save($data, 'produk');

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

      $select = $this->db->select('produk.id,nama_produk,deskripsi_produk,durasi_iklan,tbl_produk.status_show as statustampil,gambar1, tbl_produk.status_show, tbl_produk.id_kategori, tbl_kategori.nama_kategori');
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

      $data = array(
         'nama_produk'       =>   $this->input->post('namaproduk'),
         'status_show'       =>   $this->input->post('statusshow'),
         'deskripsi_produk'  =>   $this->input->post('deskripsiproduk'),
         'durasi_iklan'      =>   $this->input->post('durasiiklan'),
         'id_kategori'       =>   $this->input->post('kategori'),
         'update_by'         =>   $this->session->userdata('id_user'),
         'update_date'       =>   $now,
      );
      $this->m->Update($where, $data, $table);

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

      $this->session->set_flashdata('success', 'Data produk berhasil dihapus');
      redirect('listproduk');
   }
}
