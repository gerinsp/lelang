<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Banner extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('Models', 'm');

      date_default_timezone_set('Asia/Jakarta');
      cekuser();
   }

   function banner()
   {
      $table = 'user';
      $where = array(
         'id_user'      =>   $this->session->userdata('id_user')
      );

      $data['user'] = $this->m->Get_Where($where, $table);
      $data['title'] = 'Lelang | Upload Banner';

      $data['banner'] = $this->db->select('*')->from('banner')->get()->result();

      $this->load->view('templates/head', $data);
      $this->load->view('templates/navigation', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('pages/master/banner/banner', $data);
      $this->load->view('templates/footer');
      $this->load->view('templates/script', $data);
   }

    public function createbanner()
    {
        date_default_timezone_set('Asia/Jakarta');
        $now = date('Y-m-d H:i:s');

        $config['upload_path'] = './assets/file/banner';
        $config['max_size'] = 3145728; // set max size allowed in Kilobytes
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['encrypt_name'] = true; // encrypt the file name to avoid conflicts
        $this->load->library('upload', $config);

        $file_input_name = 'image-banner';

        if (!empty($_FILES[$file_input_name]['name'])) {
            $size = $_FILES[$file_input_name]['size'];
            $nama = $_FILES[$file_input_name]['name'];

            $format = pathinfo($nama, PATHINFO_EXTENSION);
            if ($size > 3145728) {
                $this->session->set_flashdata('error', 'Gambar terlalu besar');
                redirect('banner');
            } elseif (!in_array(strtolower($format), ['jpg', 'jpeg', 'png'])) {
                $this->session->set_flashdata('error', 'Format gambar tidak sesuai');
                redirect('banner');
            }

            if (!$this->upload->do_upload($file_input_name)) {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('error', $error);
                redirect('banner');
            }

            $data = $this->upload->data();

            $uploaded_files['gambar'] = $data['file_name'];

            $data = array(
                'image' => $data['file_name']
            );

            $this->m->Save($data, 'banner');

            //history
            $nama_user = $this->session->userdata('nama');
            $this->m->Save([
                'id_menu' => 1,
                'nama' => $nama_user,
                'keterangan' => $nama_user.' mengupload banner'
            ], 'history');

            $this->session->set_flashdata('success', 'Data banner berhasil ditambah');
            redirect('banner');
        } else {
            $this->session->set_flashdata('error', 'Tidak ada gambar yang diupload');
            redirect('banner');
        }
    }

    function deletebanner()
   {
      $id_banner =  $this->input->post('id');

      $table = 'banner';
      $where = array(
         'id'          =>  $id_banner
      );
      $this->m->Delete($where, $table);

       //history
       $nama_user = $this->session->userdata('nama');
       $this->m->Save([
           'id_menu' => 1,
           'nama' => $nama_user,
           'keterangan' => $nama_user.' menghapus banner'
       ], 'history');

      $this->session->set_flashdata('success', 'Data banner berhasil dihapus');
      redirect('banner');
   }
}
