<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Models extends CI_Model
{

   function getCustomer($postData)
   {

      $response = array();

      $this->db->select('*');

      if ($postData['search']) {

         // Select record

         $kalimat = $_POST['search'];
         $kata_kata = explode(' ', $kalimat);

         $nik = implode(" AND ", array_map(function ($kata) {
            return "nik LIKE '%$kata%'";
         }, $kata_kata));
         $this->db->order_by('nama_customer');
         $this->db->where($nik);
         $this->db->where('id_sales', $this->session->userdata('sales_id'));
         $records = $this->db->get('tbl_customer')->result();

         foreach ($records as $row) {
            $response[] = array("value" => $row->id_customer, "label" => $row->nik . ' - ' . $row->nama_customer, "nama" => $row->nama_customer, "nik" => $row->nik);
         }
      }

      return $response;
   }
   function getProduk($postData)
   {

      $response = array();



      $this->db->select('produk.id,nama_produk');

      if ($postData['search']) {

         // Select record
         $kalimat = $_POST['search'];
         $kata_kata = explode(' ', $kalimat);

         $namaproduk = implode(" AND ", array_map(function ($kata) {
            return "nama_produk LIKE '%$kata%'";
         }, $kata_kata));
         $this->db->order_by('nama_produk');
         $this->db->where($namaproduk);
         $records = $this->db->get('tbl_produk')->result();

         foreach ($records as $row) {
            $response[] = array("value" => $row->id, "label" => $row->nama_produk);
         }
      }

      return $response;
   }
   public function Get_All($table, $select)
   {
      $select;
      $query = $this->db->get($table);
      return $query->result();
   }

   public function Get_Where($where, $table)
   {
      $query = $this->db->get_where($table, $where);
      return $query->row();
   }

   function Save($data, $table)
   {
      $result = $this->db->insert($table, $data);
      return $result;
   }
   function Update($where, $data, $table)
   {
      $this->db->update($table, $data, $where);
      return $this->db->affected_rows();
   }
   function Update_Wherein($where, $data, $table)
   {

      $this->db->where_in($where);
      $this->db->update($table, $data);
      return $this->db->affected_rows();
   }
   function Update_All($data, $table)
   {
      $this->db->update($table, $data);
      return $this->db->affected_rows();
   }
   function Delete($where, $table)
   {
      $result = $this->db->delete($table, $where);
      return $result;
   }

   function Delete_All($table)
   {
      $result = $this->db->delete($table);
      return $result;
   }
   public function Masuk($username, $userpass)
   {
      $this->db->select('*');
      $this->db->from('user');

      $this->db->where('id', $username);
      $this->db->where('password', $userpass);

      $query = $this->db->get();

      if ($query->num_rows() > 0) {
         return $query->result();
      } else {
         return false;
      }
   }
   public function get_by_id($id, $table)
   {
      $this->db->from($table);
      $this->db->where('id_penjualan', $id);
      $query = $this->db->get();

      return $query->row();
   }
}
