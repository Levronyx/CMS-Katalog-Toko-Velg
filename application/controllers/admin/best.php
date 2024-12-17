<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Best extends CI_Controller {
    public function __construct(){
        parent::__construct();
        if($this->session->userdata('level') == NULL){
            redirect('admin/auth');
        }
    }

    public function index(){
        // Fetch categories (kategori)
        $this->db->select('*')->from('kategori');
        $this->db->order_by('nama_kategori', 'ASC');
        $kategori = $this->db->get()->result_array();

        // Fetch 'best' items with related data (kategori, user)
        $this->db->select('*')->from('best a');
        $this->db->join('kategori b', 'a.id_kategori=b.id_kategori', 'left');
        $this->db->join('user c', 'a.username=c.username', 'left');
        $this->db->order_by('tanggal', 'DESC');
        $best = $this->db->get()->result_array();

        // Ensure every 'best' item contains 'id_best' key
        foreach ($best as $key => $item) {
            if (!isset($item['id_best'])) {
                // Handle missing 'id_best' (optional: log it or set a default)
                $best[$key]['id_best'] = null; // Set it to null or a default value
            }
        }

        // Prepare data to pass to the view
        $data = array(
            'title'    => 'Halaman best',
            'judul'    => 'Halaman best',
            'kategori' => $kategori,
            'best'     => $best
        );

        // Load the view with data
        $this->template->load('dashboard', 'admin/best_index', $data);
    }

    public function simpan(){
        $namafoto = date('YmdHis') . '.jpg';
        $config['upload_path']   = 'Modernize/best/';
        $config['max_size']      = 500 * 1024; // 500 KB
        $config['file_name']     = $namafoto;
        $config['allowed_types'] = 'jpg|jpeg|png|gif'; // Membatasi tipe file gambar
        $this->load->library('upload', $config);

        // Periksa apakah ukuran file melebihi batas
        if ($_FILES['foto']['size'] >= 500 * 1024) {
            $this->session->set_flashdata('alert', '
                <div class="alert alert-danger alert-dismissible" role="alert">
                    Ukuran foto terlalu besar, upload ulang foto dengan ukuran yang kurang dari 500 KB.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            ');
            redirect('admin/best');  
        } elseif (! $this->upload->do_upload('foto')) {
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('alert', '
                <div class="alert alert-danger alert-dismissible" role="alert">
                    Upload foto gagal. ' . $error['error'] . '
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            ');
            redirect('admin/best');
        } else {
            $data = array('upload_data' => $this->upload->data());
        }

        // Cek jika judul sudah ada di tabel best
        $this->db->where('judul', $this->input->post('judul'));
        $this->db->from('best');
        $cek = $this->db->get()->row();
        
        if ($cek == NULL) {
            // Menyimpan data baru jika judul belum ada
            $data = array(
                'judul'      => $this->input->post('judul'),
                'id_kategori'=> $this->input->post('id_kategori'),
                'keterangan' => $this->input->post('keterangan'),
                'tanggal'    => date('Y-m-d'),
                'foto'       => $namafoto,
                'username'   => $this->session->userdata('username'),
                'slug'       => str_replace(' ', '-', $this->input->post('judul')),
                'harga'      => $this->input->post('harga')
            );
            $this->db->insert('best', $data);
            $this->session->set_flashdata('alert', '
                <div class="alert alert-success" role="alert">
                    Berhasil Menambahkan best!
                </div>
            ');
        } else {
            // Jika judul sudah ada
            $this->session->set_flashdata('alert', '
                <div class="alert alert-danger" role="alert">
                    Judul best Sudah Ada
                </div>
            ');
        }
        redirect('admin/best');
    }

    public function hapus($id){
        $filename = FCPATH . '/assets/upload/best/' . $id;
        if (file_exists($filename)) {
            unlink("./assets/upload/best/" . $id);
        }
        $where = array('foto' => $id);
        $this->db->delete('best', $where);
        $this->session->set_flashdata('alert', '
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <i class="fa fa-exclamation-circle me-2"></i>BERHASIL DIHAPUS
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        ');
        redirect('admin/best');
    }

    public function update() {
        // Ambil nama foto lama
        $namafoto = $this->input->post('nama_foto');
        $config['upload_path']   = 'Modernize/best/';
        $config['max_size']      = 500; // dalam KB
        $config['allowed_types'] = 'jpg|jpeg|png|gif'; // Membatasi tipe file gambar
        $this->load->library('upload', $config);
    
        // Jika ada foto baru, proses upload
        if (!empty($_FILES['foto']['name'])) {
            // Periksa ukuran file secara manual
            if ($_FILES['foto']['size'] > (500 * 1024)) { // 500 KB
                $this->session->set_flashdata('alert', '
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        Ukuran foto terlalu besar, upload ulang foto dengan ukuran kurang dari 500 KB.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                ');
                redirect('admin/best');
            }
    
            // Upload file foto baru
            if (!$this->upload->do_upload('foto')) {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('alert', '
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        Upload foto gagal. ' . $error . '
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                ');
                redirect('admin/best');
            }
    
            // Ambil nama foto yang baru
            $data = $this->upload->data();
            $namafoto = $data['file_name'];
    
            // Hapus foto lama jika ada
            $old_foto = $this->input->post('nama_foto');
            if ($old_foto && file_exists(FCPATH . 'assets/upload/best/' . $old_foto)) {
                unlink(FCPATH . 'assets/upload/best/' . $old_foto);
            }
        }
    
        // Data baru untuk disimpan
        $data_update = array(
            'judul'      => $this->input->post('judul'),
            'id_kategori'=> $this->input->post('id_kategori'),
            'keterangan' => $this->input->post('keterangan'),
            'slug'       => str_replace(' ', '-', $this->input->post('judul')),
            'harga'      => $this->input->post('harga'),
            'foto'       => $namafoto // Menyimpan foto yang baru atau foto lama
        );
    
        // Update data di database
        $where = array('foto' => $this->input->post('nama_foto'));
        $this->db->update('best', $data_update, $where);
    
        // Menampilkan pesan sukses
        $this->session->set_flashdata('alert', '
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                Best Berhasil Diperbarui !!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        ');
    
        // Redirect ke halaman best
        redirect('admin/best');
    }
    
}
