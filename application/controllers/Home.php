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
      $data['title'] = 'Home | Lelang';


      $this->load->view('templates/user/navbar', $data);
      $this->load->view('pages/user/home', $data);
      $this->load->view('templates/user/footer', $data);
   }
   function detail_product()
   {
       $table = 'user';
       $where = array(
           'id_user'      =>   $this->session->userdata('id_user')
       );

       $data['user'] = $this->m->Get_Where($where, $table);
       $data['title'] = 'Home | Lelang';


       $this->load->view('templates/user/navbar', $data);
       $this->load->view('pages/user/detail-product', $data);
       $this->load->view('templates/user/footer', $data);
   }
   function product()
   {
       $table = 'user';
       $where = array(
           'id_user'      =>   $this->session->userdata('id_user')
       );

       $data['user'] = $this->m->Get_Where($where, $table);
       $data['title'] = 'Product | Lelang';


       $this->load->view('templates/user/navbar', $data);
       $this->load->view('pages/user/product', $data);
       $this->load->view('templates/user/footer', $data);
   }
   function profile()
   {
       $table = 'user';
       $where = array(
           'id_user'      =>   $this->session->userdata('id_user')
       );

       $data['user'] = $this->m->Get_Where($where, $table);
       $data['title'] = 'Profile | Lelang';


       $this->load->view('templates/user/navbar', $data);
       $this->load->view('pages/user/profile', $data);
       $this->load->view('templates/user/footer', $data);
   }
   function info()
   {
       $table = 'user';
       $where = array(
           'id_user'      =>   $this->session->userdata('id_user')
       );

       $data['user'] = $this->m->Get_Where($where, $table);
       $data['title'] = 'Info | Lelang';


       $this->load->view('templates/user/navbar', $data);
       $this->load->view('pages/user/info', $data);
       $this->load->view('templates/user/footer', $data);
   }
   function struktur_perusahaan()
   {
       $table = 'user';
       $where = array(
           'id_user'      =>   $this->session->userdata('id_user')
       );

       $data['user'] = $this->m->Get_Where($where, $table);
       $data['title'] = 'Struktur Perusahaan | Lelang';


       $this->load->view('templates/user/navbar', $data);
       $this->load->view('pages/user/struktur-perusahaan', $data);
       $this->load->view('templates/user/footer', $data);
   }

   function daftar_member($id_sales)
   {
       $table = 'user';
       $where = array(
           'id_user'      =>   $this->session->userdata('id_user')
       );

       $data['user'] = $this->m->Get_Where($where, $table);
       $data['title'] = 'Struktur Perusahaan | Lelang';
       $data['id_sales'] = $id_sales;


       $this->load->view('templates/user/navbar', $data);
       $this->load->view('pages/user/daftar-member', $data);
       $this->load->view('templates/user/footer', $data);
   }
}
