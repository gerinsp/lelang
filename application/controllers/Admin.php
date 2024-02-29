<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Models', 'm');

        date_default_timezone_set('Asia/Jakarta');
        cekuser();
    }

    function pengajuan_harga()
    {
        $table = 'user';
        $where = array(
            'id_user'      =>   $this->session->userdata('id_user')
        );

        $data['user'] = $this->m->Get_Where($where, $table);
        $data['title'] = 'Lelang | Pengajuan Harga';

        $this->db->select('pengajuanharga.*, produk.nama_produk, customer.nama_customer, sales.nama_sales');
        $this->db->from('pengajuanharga');
        $this->db->join('produk', 'produk.id = pengajuanharga.id_produk', 'left');
        $this->db->join('customer', 'customer.id_customer = pengajuanharga.id_customer', 'left');
        $this->db->join('sales', 'sales.id_sales = pengajuanharga.id_sales', 'left');

        $data['pengajuan'] = $this->db->get()->result();

        $this->load->view('templates/head', $data);
        $this->load->view('templates/navigation', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/admin/pengajuan-harga', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/script', $data);
    }
    function pengajuan_terima($id) {
        $table = 'pengajuanharga';
        $where = array(
            'id_pengajuanharga'          => $id
        );

        $data = array(
            'status_approve' => 2
        );
        $this->m->Update($where, $data, $table);

        $this->session->set_flashdata('success', 'Berhasil update status pengajuan');
        redirect('pengajuan');
    }
    function pengajuan_tolak($id) {
        $table = 'pengajuanharga';
        $where = array(
            'id_pengajuanharga'          => $id
        );

        $data = array(
            'status_approve' => 0
        );
        $this->m->Update($where, $data, $table);

        $this->session->set_flashdata('success', 'Berhasil update status pengajuan');
        redirect('pengajuan');
    }
    function akun_sales()
    {
        $table = 'user';
        $where = array(
            'id_user'      =>   $this->session->userdata('id_user')
        );

        $data['user'] = $this->m->Get_Where($where, $table);
        $data['title'] = 'Lelang | Akun Sales';

        $this->db->select('s.id_sales, s.nama_sales, s.no_hp, u.username, u.password, u.id_user');
        $this->db->from('sales as s');
        $this->db->join('user as u', 'u.sales_id = s.id_sales', 'left');

        $data['sales'] = $this->db->get()->result();

        $this->load->view('templates/head', $data);
        $this->load->view('templates/navigation', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/admin/akun-sales', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/script', $data);
    }
    function buat_akun()
    {
        $id_sales = $this->input->post('id_sales');
        $nama_sales = $this->input->post('nama_sales');
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $data = [
            'username' => $username,
            'password' => $password,
            'nama' => $nama_sales,
            'image' => 'default.png',
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'role_id' => 3,
            'is_active' => 1,
            'sales_id' => $id_sales,
            'tanggal_daftar' => date('Y-m-d')
        ];

        $this->db->insert('user', $data);

        if ($this->db->affected_rows() > 0) {
            $message = 'Berhasil membuat akun.';
        } else {
            $message = 'Gagal membuat akun.';
        }
        $response = array(
            'status' => 'OK',
            'message' => $message
        );

        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }

    function reset_password($id)
    {
        $this->db->where('id_user', $id)->update('user', [
            'password' => password_hash('sales', PASSWORD_DEFAULT)
        ]);

        $this->session->set_flashdata('success', 'Berhasil reset password');
        redirect('akunsales');
    }
}
