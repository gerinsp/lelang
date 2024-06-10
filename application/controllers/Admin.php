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

        if ($this->session->userdata('role_id') == 3) {
            $this->db->select('*');
            $this->db->where('id_sales', $this->session->userdata('sales_id'));
            $this->db->from('customer');
            $data['customer'] = $this->db->get()->result();
        } else if ($this->session->userdata('role_id') != 3) {
            $this->db->select('*');
            $this->db->from('customer');
            $data['customer'] = $this->db->get()->result();
        }

        $this->db->select('*');
        $this->db->from('sales');
        $data['sales'] = $this->db->get()->result();

        if ($this->session->userdata('role_id') != 3) {
            $this->db->select('pengajuanharga.*, produk.nama_produk, customer.nama_customer, customer.jenis_kelamin as jeniskelamincustomer, customer.alamat as alamatcustomer, customer.no_hp as nohpcustomer, customer.nik as nikcustomer, sales.nama_sales');
            $this->db->from('pengajuanharga');
            $this->db->join('produk', 'produk.id = pengajuanharga.id_produk', 'left');
            $this->db->join('customer', 'customer.id_customer = pengajuanharga.id_customer', 'left');
            $this->db->join('sales', 'sales.id_sales = pengajuanharga.id_sales', 'left');

            $data['pengajuan'] = $this->db->get()->result();
        } else if ($this->session->userdata('role_id') == 3) {
            $this->db->select('pengajuanharga.*, produk.nama_produk, customer.nama_customer, customer.jenis_kelamin as jeniskelamincustomer, customer.alamat as alamatcustomer, customer.no_hp as nohpcustomer, customer.nik as nikcustomer, sales.nama_sales');
            $this->db->from('pengajuanharga');
            $this->db->join('produk', 'produk.id = pengajuanharga.id_produk', 'left');
            $this->db->join('customer', 'customer.id_customer = pengajuanharga.id_customer', 'left');
            $this->db->join('sales', 'sales.id_sales = pengajuanharga.id_sales', 'left');
            $this->db->where('customer.id_sales', $this->session->userdata('sales_id'));

            $data['pengajuan'] = $this->db->get()->result();
        }

        $this->load->view('templates/head', $data);
        $this->load->view('templates/navigation', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/admin/pengajuan-harga', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/script', $data);
    }
    function filterpengajuanharga()
    {
        $table = 'user';
        $where = array(
            'id_user'      =>   $this->session->userdata('id_user')
        );

        $data['user'] = $this->m->Get_Where($where, $table);
        $data['title'] = 'Lelang | Pengajuan Harga';

        $this->db->select('*');
        $this->db->from('customer');
        $data['customer'] = $this->db->get()->result();

        $this->db->select('*');
        $this->db->from('sales');
        $data['sales'] = $this->db->get()->result();

        if ($this->session->userdata('role_id') != 3) {
            $sales = $this->input->post("sales");
            $customer = $this->input->post("customer");
            $from = $this->input->post("from");
            $to = $this->input->post("to");

            if (!empty($sales)) {
                $this->db->where('tbl_pengajuanharga.id_sales', $sales);
            }
            if (!empty($customer)) {
                $this->db->where('tbl_pengajuanharga.id_customer', $customer);
            }
            if (!empty($from) && !empty($to)) {
                $this->db->where('DATE(tanggal_pengajuan) BETWEEN "' . $from . '" AND "' . $to . '"');
            }

            $this->db->select('pengajuanharga.*, produk.nama_produk, customer.nama_customer, customer.jenis_kelamin as jeniskelamincustomer, customer.alamat as alamatcustomer, customer.no_hp as nohpcustomer, customer.nik as nikcustomer, sales.nama_sales');
            $this->db->from('pengajuanharga');
            $this->db->join('produk', 'produk.id = pengajuanharga.id_produk', 'left');
            $this->db->join('customer', 'customer.id_customer = pengajuanharga.id_customer', 'left');
            $this->db->join('sales', 'sales.id_sales = pengajuanharga.id_sales', 'left');

            $data['pengajuan'] = $this->db->get()->result();
        } else if ($this->session->userdata('role_id') == 3) {
            $customer = $this->input->post("customer");
            $from = $this->input->post("from");
            $to = $this->input->post("to");

            if (!empty($customer)) {
                $this->db->where('tbl_pengajuanharga.id_customer', $customer);
            }
            if (!empty($from) && !empty($to)) {
                $this->db->where('DATE(tanggal_pengajuan) BETWEEN "' . $from . '" AND "' . $to . '"');
            }
            $this->db->select('pengajuanharga.*, produk.nama_produk, customer.nama_customer, customer.jenis_kelamin as jeniskelamincustomer, customer.alamat as alamatcustomer, customer.no_hp as nohpcustomer, customer.nik as nikcustomer, sales.nama_sales');
            $this->db->from('pengajuanharga');
            $this->db->join('produk', 'produk.id = pengajuanharga.id_produk', 'left');
            $this->db->join('customer', 'customer.id_customer = pengajuanharga.id_customer', 'left');
            $this->db->join('sales', 'sales.id_sales = pengajuanharga.id_sales', 'left');
            $this->db->where('customer.id_sales', $this->session->userdata('sales_id'));

            $data['pengajuan'] = $this->db->get()->result();
        }

        $this->load->view('pages/admin/filter_pengajuan-harga', $data);
    }
    function pengajuan_terima($id)
    {
        $table = 'pengajuanharga';
        $where = array(
            'id_pengajuanharga'          => $id
        );

        $data = array(
            'status_approve' => 2
        );
        $this->m->Update($where, $data, $table);

        //history
        $nama_user = $this->session->userdata('nama');
        $this->m->Save([
            'id_menu' => 10,
            'nama' => $nama_user,
            'keterangan' => $nama_user.' menerima pengajuan harga'
        ], 'history');

        $this->session->set_flashdata('success', 'Berhasil update status pengajuan');
        redirect('pengajuan');
    }
    function pengajuan_tolak($id)
    {
        $table = 'pengajuanharga';
        $where = array(
            'id_pengajuanharga'          => $id
        );

        $data = array(
            'status_approve' => 0
        );
        $this->m->Update($where, $data, $table);

        //history
        $nama_user = $this->session->userdata('nama');
        $this->m->Save([
            'id_menu' => 10,
            'nama' => $nama_user,
            'keterangan' => $nama_user.' menolak pengajuan harga'
        ], 'history');

        $this->session->set_flashdata('success', 'Berhasil update status pengajuan');
        redirect('pengajuan');
    }
    function get_customer()
    {
        $postData = $this->input->post();

        // get data
        $data = $this->m->getCustomer($postData);

        echo json_encode($data);
    }
    function get_produk()
    {
        $postData = $this->input->post();

        // get data
        $data = $this->m->getProduk($postData);

        echo json_encode($data);
    }
    function create_pengajuan_harga()
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
            $data['title'] = 'Lelang | Tambah Data Pengajuan Harga';

            $this->load->view('templates/head', $data);
            $this->load->view('templates/navigation', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('pages/pengajuanharga/createpengajuanharga', $data);
            $this->load->view('templates/footer');
            $this->load->view('templates/script', $data);
        } else {
            date_default_timezone_set('Asia/Jakarta');
            $now = date('Y-m-d H:i:s');

            $data = array(
                'id_customer'       =>   $this->input->post('idcustomer'),
                'id_produk'         =>   $this->input->post('idproduk'),
                'id_sales'          =>   $this->session->userdata('sales_id'),
                'harga'             =>   str_replace(',', '.', str_replace('.', '', $this->input->post('harga'))),
                'status_approve'    =>   1,
                'tanggal_pengajuan' =>   $now
            );

            $this->m->Save($data, 'pengajuanharga');

            //history
            $nama_user = $this->session->userdata('nama');
            $this->m->Save([
                'id_menu' => 10,
                'nama' => $nama_user,
                'keterangan' => $nama_user.' menginput data pengajuan harga'
            ], 'history');

            $this->session->set_flashdata('success', 'Data pengajuan harga berhasil ditambah');
            redirect('pengajuan');
        }
    }
    function edit_pengajuan_harga($id_pengajuanharga)
    {

        $data = [
            'title' => 'Lelang | Edit Data Pengajuan Harga'
        ];
        $role_id = $this->session->userdata('role_id');

        $table = 'user';
        $where = array(
            'id_user'      =>   $this->session->userdata('id_user')
        );

        $data['user'] = $this->m->Get_Where($where, $table);

        $this->db->select('pengajuanharga.*, produk.nama_produk, produk.id,customer.nik,customer.nama_customer');
        $this->db->from('pengajuanharga');
        $this->db->join('produk', 'produk.id = pengajuanharga.id_produk', 'left');
        $this->db->join('customer', 'customer.id_customer = pengajuanharga.id_customer', 'left');
        $this->db->where('pengajuanharga.id_pengajuanharga', $id_pengajuanharga);
        $data['pengajuan'] = $this->db->get()->result();

        $this->load->view('templates/head', $data);
        $this->load->view('templates/navigation', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/pengajuanharga/updatepengajuanharga', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/script', $data);
    }
    function updatedatapengajuan()
    {

        $table = 'pengajuanharga';
        $where = array(
            'id_pengajuanharga'          =>   $this->input->post('idpengajuanharga')
        );
        $data = array(
            'id_customer'       =>   $this->input->post('idcustomer'),
            'id_produk'         =>   $this->input->post('idproduk'),
            'id_sales'          =>   $this->session->userdata('sales_id'),
            'harga'             =>   str_replace(',', '.', str_replace('.', '', $this->input->post('harga'))),
        );
        $this->m->Update($where, $data, $table);

        //history
        $nama_user = $this->session->userdata('nama');
        $this->m->Save([
            'id_menu' => 10,
            'nama' => $nama_user,
            'keterangan' => $nama_user.' mengupdate data pengajuan harga'
        ], 'history');

        $this->session->set_flashdata('success', 'Data pengajuan harga berhasil diubah');
        redirect('pengajuan');
    }
    function akun_admin()
    {
        $table = 'user';
        $where = array(
            'id_user'      =>   $this->session->userdata('id_user')
        );

        $data['user'] = $this->m->Get_Where($where, $table);
        $data['title'] = 'Lelang | Akun Admin';

        $this->db->select('*');
        $this->db->where('role_id', '2');
        $this->db->from('user');
        $data['admin'] = $this->db->get()->result();

        $this->load->view('templates/head', $data);
        $this->load->view('templates/navigation', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/admin/akun-admin', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/script', $data);
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

        //history
        $nama_user = $this->session->userdata('nama');
        $this->m->Save([
            'id_menu' => 12,
            'nama' => $nama_user,
            'keterangan' => $nama_user.' menambah data akun sales'
        ], 'history');

        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }

    function buat_akunadmin()
    {
        $nama = $this->input->post('namaakunadmin');
        $username = $this->input->post('username');

        $data = [
            'username' => $username,
            'nama'     => $nama,
            'password' => password_hash("12345", PASSWORD_DEFAULT),
            'role_id' => 2,
            'image'   => "default.png",
            'is_active' => 1,
            'tanggal_daftar' => date('Y-m-d')
        ];

        $this->db->insert('user', $data);

        //history
        $nama_user = $this->session->userdata('nama');
        $this->m->Save([
            'id_menu' => 9,
            'nama' => $nama_user,
            'keterangan' => $nama_user.' menambah data akun admin'
        ], 'history');

        $this->session->set_flashdata('success', 'Berhasil membuat akun admin');
        redirect('akunadmin');
    }
    function update_akunadmin()
    {
        $nama = $this->input->post('namaakunadminedit');
        $username = $this->input->post('usernameadminedit');

        $where = [
            'id_user' => $this->input->post('iduseredit')
        ];
        $data = [
            'username' => $username,
            'nama'     => $nama,

        ];
        $this->m->Update($where, $data, 'user');

        //history
        $nama_user = $this->session->userdata('nama');
        $this->m->Save([
            'id_menu' => 9,
            'nama' => $nama_user,
            'keterangan' => $nama_user.' mengupdate data akun admin'
        ], 'history');

        $this->session->set_flashdata('success', 'Berhasil mengubah akun admin');
        redirect('akunadmin');
    }
    function delete_akunadmin()
    {
        $id_user =  $this->input->post('id');

        $table = 'user';
        $where = array(
            'id_user'          =>  $id_user
        );
        $this->m->Delete($where, $table);

        //history
        $nama_user = $this->session->userdata('nama');
        $this->m->Save([
            'id_menu' => 9,
            'nama' => $nama_user,
            'keterangan' => $nama_user.' menghapus data akun admin'
        ], 'history');

        $this->session->set_flashdata('success', 'Berhasil menghapus akun admin');
        redirect('akunadmin');
    }
    function reset_password($id)
    {
        $this->db->where('id_user', $id)->update('user', [
            'password' => password_hash('sales', PASSWORD_DEFAULT)
        ]);

        //history
        $nama_user = $this->session->userdata('nama');
        $this->m->Save([
            'id_menu' => 12,
            'nama' => $nama_user,
            'keterangan' => $nama_user.' melakukan reset password pada akun sales'
        ], 'history');

        $this->session->set_flashdata('success', 'Berhasil reset password');
        redirect('akunsales');
    }
}
