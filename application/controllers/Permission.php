<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Permission extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('Models', 'm');

      date_default_timezone_set('Asia/Jakarta');
      cekuser();
   }

   function index($user_id='')
   {
       $table = 'user';
       $where = array(
           'id_user'      =>   $this->session->userdata('id_user')
       );

       $data['user'] = $this->m->Get_Where($where, $table);

      $data['title'] = 'Lelang | Permission';

      if ($user_id == '') {
          $this->db->select('id_user');
          $this->db->from('tbl_user');
          $this->db->where('role_id', 2);
          $this->db->limit(1);

          $query = $this->db->get();
          if ($query->num_rows() > 0) {
              $result = $query->row();
              $user_id = $result->id_user;
          }
      }

      $this->db->select('id_user, username');
      $this->db->from('tbl_user');
      $this->db->where('role_id', 2);
      $data['users'] = $this->db->get()->result_array();

      $this->db->select('tu.username, th.id as id_halaman');
      $this->db->from('tbl_user as tu');
      $this->db->where('tu.id_user', $user_id);
      $this->db->join('tbl_permission as tp', 'tu.id_user = tp.id_user', 'left');
      $this->db->join('tbl_halaman as th', 'tp.id_halaman = th.id', 'left');
      // $select = $this->db->join('tbl_customer', 'tbl_customer.id_customer = tbl_customer.id_customer');
      $data['permission'] = $this->db->get()->result_array();

      $permission = [];
      foreach ($data['permission'] as $value) {
           $permission[$value['id_halaman']] = $value['username'];
      }

      $this->db->select('*');
      $this->db->from('halaman');
      $data['halaman'] = $this->db->get()->result_array();

      $result = [];
      foreach ($data['halaman'] as $value) {
           if (isset($permission[$value['id']])) {
               $result[$value['id']] = [
                   'nama_halaman' => $value['nama_halaman'],
                   'checked' => 'checked'
               ];
           } else {
               $result[$value['id']] = [
                   'nama_halaman' => $value['nama_halaman'],
                   'checked' => ''
               ];
           }
      }

      $data['result'] = $result;
      $data['user_id'] = $user_id;
      $this->load->view('templates/head', $data);
      $this->load->view('templates/navigation', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('pages/master/permission/index', $data);
      $this->load->view('templates/footer');
      $this->load->view('templates/script', $data);
   }

    function update()
    {
        $user_id = $this->input->post('user_id');
        $permissions = $this->input->post('permission');

        foreach ($permissions as $value) {
            $result = $this->db->get_where('permission', array('id_user' => $user_id, 'id_halaman' => $value['idHalaman']))->row();

            if ($result && $value['isChecked'] == 'false') {
                // Hapus jika ditemukan dan checkbox tidak dicentang
                $this->db->delete('permission', array('id_user' => $user_id, 'id_halaman' => $value['idHalaman']));
            } elseif (!$result && $value['isChecked'] == 'true') {
                // Simpan jika tidak ditemukan dan checkbox dicentang
                $this->db->insert('permission', array(
                    'id_user' => $user_id,
                    'id_halaman' => $value['idHalaman']
                ));
            }
        }

        //history
        $nama_user = $this->session->userdata('nama');
        $this->m->Save([
            'id_menu' => 7,
            'nama' => $nama_user,
            'keterangan' => $nama_user.' mengupdate permission'
        ], 'history');

        $response = array(
            'status' => 'OK',
            'message' => 'Berhasil mengubah permission'
        );

        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }

}
