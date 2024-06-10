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

      $this->db->where('status_show', 1)->from('kategori');
      $data['kategori'] = $this->db->get()->result_array();

       $this->db->select('
            p.*,
            (SELECT harga FROM tbl_pengajuanharga WHERE id_produk = p.id AND status_approve = 2 ORDER BY tanggal_pengajuan ASC LIMIT 1) as harga_awal,
            MAX(ph.harga) as harga_tertinggi,
            (SELECT harga FROM tbl_pengajuanharga WHERE id_produk = p.id AND status_approve = 2 ORDER BY tanggal_pengajuan DESC LIMIT 1) as penawaran_terakhir
       ')
           ->from('produk as p')
           ->join('tbl_pengajuanharga ph', 'p.id = ph.id_produk AND ph.status_approve = 2', 'left')
           ->where('p.status_show', 1)
           ->where('(NOW() - INTERVAL p.durasi_iklan DAY) <= p.update_date')
           ->group_by('p.id');
      $data['live_produk'] = $this->db->get()->result_array();

       $this->db->select('
            p.id,
            p.gambar1,
            p.nama_produk,
            p.deskripsi_produk,
            MAX(ph.harga) as harga_tertinggi,
       ')
           ->from('produk as p')
           ->join('tbl_pengajuanharga ph', 'p.id = ph.id_produk AND ph.status_approve = 2', 'left')
           ->where('p.status_show', 1)
           ->where('p.update_date < DATE_SUB(NOW(), INTERVAL p.durasi_iklan DAY)', NULL, FALSE)
           ->group_by('p.id')
           ->limit(8);
       $data['katalog'] = $this->db->get()->result_array();

       $data['banner'] = $this->db->select('*')->get('banner')->result_array();
//      dd($data['katalog']);

      $this->load->view('templates/user/navbar', $data);
      $this->load->view('pages/user/home', $data);
      $this->load->view('templates/user/footer', $data);
   }
   function detail_product($id)
   {
       $table = 'user';
       $where = array(
           'id_user'      =>   $this->session->userdata('id_user')
       );

       $data['user'] = $this->m->Get_Where($where, $table);
       $data['title'] = 'Detail Produk | Lelang';

       $this->db->select('
            p.*,
            GROUP_CONCAT(ph.harga ORDER BY ph.harga DESC) as harga_tertinggi
       ')
           ->from('produk as p')
           ->join('tbl_pengajuanharga ph', 'p.id = ph.id_produk AND ph.status_approve = 2', 'left')
           ->where('p.status_show', 1)
           ->where('p.id', $id)
           ->group_by('p.id');
       $data['detail'] = $this->db->get()->row();
       $harga_tertinggi_array = explode(',', $data['detail']->harga_tertinggi);
       $data['harga_tertinggi'] = array_slice($harga_tertinggi_array, 0, 3);
//       dd($data['detail']);

       $detail = $this->db->select('detail_produk')->where('id', $id)->get('produk')->result_array();
       $detail = isset($detail[0]['detail_produk']) ? json_decode($detail[0]['detail_produk']) : '';

       $data['detail_produk'] = $detail;

       $this->load->view('templates/user/navbar', $data);
       $this->load->view('pages/user/detail-product', $data);
       $this->load->view('templates/user/footer', $data);
   }
   function product($urutan = null)
   {
       $table = 'user';
       $where = array(
           'id_user'      =>   $this->session->userdata('id_user')
       );
       $data['title_kategori'] = 'Semua Kategori';

       $data['user'] = $this->m->Get_Where($where, $table);
       $data['title'] = 'Product | Lelang';

       $data['kategori'] = $this->db->select('*')->from('kategori')->get()->result();

       $limit = 16;
       if ($urutan == 'limit') {
           $limit += 16;
           $this->session->set_userdata('limit', $limit);
       } else {
           $this->session->unset_userdata('limit');
       }

       $limit = $this->session->userdata('limit');

       if (empty($limit)) {
           $limit = 16;
       }
       $this->db->select('
            p.id,
            p.gambar1,
            p.nama_produk,
            p.deskripsi_produk,
            MAX(ph.harga) as harga_tertinggi,
       ')
           ->from('produk as p')
           ->join('tbl_pengajuanharga ph', 'p.id = ph.id_produk AND ph.status_approve = 2', 'left')
           ->where('p.status_show', 1)
           ->where('p.update_date < DATE_SUB(NOW(), INTERVAL p.durasi_iklan DAY)', NULL, FALSE)
           ->group_by('p.id')
           ->limit($limit);
       if ($urutan == 'terbaru') {
           $this->db->order_by('p.create_date', 'DESC');
       } elseif ($urutan == 'termurah') {
           $this->db->order_by('harga_tertinggi', 'ASC');
       } elseif ($urutan == 'termahal') {
           $this->db->order_by('harga_tertinggi', 'DESC');
       }
       $data['produk'] = $this->db->get()->result_array();

       $this->db->select('
            p.id,
            p.gambar1,
            p.nama_produk,
            p.deskripsi_produk,
            MAX(ph.harga) as harga_tertinggi,
       ')
           ->from('produk as p')
           ->join('tbl_pengajuanharga ph', 'p.id = ph.id_produk AND ph.status_approve = 2', 'left')
           ->where('p.status_show', 1)
           ->where('p.update_date < DATE_SUB(NOW(), INTERVAL p.durasi_iklan DAY)', NULL, FALSE)
           ->group_by('p.id');

       // Tambahkan kondisional order_by
       if ($urutan == 'terbaru') {
           $this->db->order_by('p.create_date', 'DESC');
       } elseif ($urutan == 'termurah' || $urutan == 'termahal') {
           $this->db->order_by('harga_tertinggi', ($urutan == 'termurah') ? 'ASC' : 'DESC');
       }

       // Eksekusi kueri tanpa batasan
       $data['produk_all'] = $this->db->get()->result_array();

       $this->load->view('templates/user/navbar', $data);
       $this->load->view('pages/user/product', $data);
       $this->load->view('templates/user/footer', $data);
   }

    function kategori($id_kategori = null, $urutan = null)
    {
        $table = 'user';
        $where = array(
            'id_user'      =>   $this->session->userdata('id_user')
        );

        $kategori = $this->db->select('id_kategori, nama_kategori')->get_where('kategori', ['id_kategori' => $id_kategori])->row();
        $data['id_kategori'] = $kategori->id_kategori;
        $data['title_kategori'] = 'Kategori '.ucwords(strtolower($kategori->nama_kategori));

        $data['user'] = $this->m->Get_Where($where, $table);
        $data['title'] = 'Product | Lelang';

        $data['kategori'] = $this->db->select('*')->from('kategori')->get()->result();

        $limit = 16;
        if ($urutan == 'limit') {
            $limit += 16;
            $this->session->set_userdata('limit', $limit);
        } else {
            $this->session->unset_userdata('limit');
        }

        $limit = $this->session->userdata('limit');

        if (empty($limit)) {
            $limit = 16;
        }
        $this->db->select('
            p.id,
            p.gambar1,
            p.nama_produk,
            p.deskripsi_produk,
            MAX(ph.harga) as harga_tertinggi,
       ')
            ->from('produk as p')
            ->join('tbl_pengajuanharga ph', 'p.id = ph.id_produk AND ph.status_approve = 2', 'left')
            ->where('p.status_show', 1)
            ->where('p.id_kategori', $id_kategori)
            ->where('p.update_date < DATE_SUB(NOW(), INTERVAL p.durasi_iklan DAY)', NULL, FALSE)
            ->group_by('p.id')
            ->limit($limit);
        if ($urutan == 'terbaru') {
            $this->db->order_by('p.create_date', 'DESC');
        } elseif ($urutan == 'termurah') {
            $this->db->order_by('harga_tertinggi', 'ASC');
        } elseif ($urutan == 'termahal') {
            $this->db->order_by('harga_tertinggi', 'DESC');
        }
        $data['produk'] = $this->db->get()->result_array();

        $this->db->select('
            p.id,
            p.gambar1,
            p.nama_produk,
            p.deskripsi_produk,
            MAX(ph.harga) as harga_tertinggi,
       ')
            ->from('produk as p')
            ->join('tbl_pengajuanharga ph', 'p.id = ph.id_produk AND ph.status_approve = 2', 'left')
            ->where('p.status_show', 1)
            ->where('p.id_kategori', $id_kategori)
            ->where('p.update_date < DATE_SUB(NOW(), INTERVAL p.durasi_iklan DAY)', NULL, FALSE)
            ->group_by('p.id');
        if ($urutan == 'terbaru') {
            $this->db->order_by('p.create_date', 'DESC');
        } elseif ($urutan == 'termurah') {
            $this->db->order_by('harga_tertinggi', 'ASC');
        } elseif ($urutan == 'termahal') {
            $this->db->order_by('harga_tertinggi', 'DESC');
        }
        $data['produk_all'] = $this->db->get()->result_array();

        $this->load->view('templates/user/navbar', $data);
        $this->load->view('pages/user/kategori', $data);
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

       $data['tentangkami'] = $this->db->select('*')->get('tentangkami')->row();

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

       $data['info'] = $this->db->select('*')->from('info')->get()->row();

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

       $sales = $this->m->Get_Where(['id_sales' => $id_sales], 'sales');

       $data['user'] = $this->m->Get_Where($where, $table);
       $data['title'] = 'Daftar Member | Lelang';
       $data['id_sales'] = $id_sales;

       if ($sales) {
           $this->load->view('templates/user/navbar', $data);
           $this->load->view('pages/user/daftar-member', $data);
           $this->load->view('templates/user/footer', $data);
       } else {
           $this->load->view('templates/user/navbar', $data);
           $this->load->view('pages/user/error-page', $data);
           $this->load->view('templates/user/footer', $data);
       }

   }

   function tambah_member()
   {
       date_default_timezone_set('Asia/Jakarta');
       $now = date('Y-m-d H:i:s');

       $config['upload_path']          = 'assets/file/customer';
       $config['max_size']             = 3145728; //set max size allowed in Kilob
       $config['allowed_types']        = '*';
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
       $diri = $_FILES['gambar2']['name'];
       $kk = $_FILES['gambar3']['name'];

       $data = array(
           'nik'               => $this->input->post('nik'),
           'nama_customer'     => $this->input->post('nama_customer'),
           'jenis_kelamin'     => $this->input->post('jenis_kelamin'),
           'no_hp'             => $this->input->post('no_hp'),
           'alamat'            => $this->input->post('alamat'),
           'id_sales'          => $this->input->post('id_sales'),
           'foto_ktp'          => $ktp,
           'foto_kk'           => $kk,
           'foto_diri'         => $diri,
           'status'            => 2
       );
       $this->m->Save($data, 'customer');

       $data['title'] = 'Berhasil Mendaftar | Lelang';
       $this->load->view('templates/user/navbar', $data);
       $this->load->view('pages/user/daftar-sukses', $data);
       $this->load->view('templates/user/footer', $data);
   }
}
