<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri extends CI_Controller {
    public function __construct(){
        parent::__construct();
        if($this->session->userdata('level') == NULL){
            redirect('admin/auth');
        }
    }
    
    public function index()
    {
        // Ambil data dari tabel galeri
        $this->db->select('*')->from('galeri');
        $this->db->order_by('tanggal', 'DESC');
        $galeri = $this->db->get()->result_array();
    
        $data = array(
            'title'   => 'Halaman Galeri',
            'judul'   => 'Daftar Galeri',
            'galeri'  => $galeri
        );
    
        $this->template->load('dashboard', 'admin/galeri_index', $data);
    }

    public function simpan()
    {
        $namafoto = date('YmdHis') . '.jpg';
        $config['upload_path'] = 'Modernize/galeri/';
        $config['max_size'] = 5000 * 1024; // 500 KB
        $config['file_name'] = $namafoto;
        $config['allowed_types'] = '*';
        $this->load->library('upload', $config);
    
        if ($_FILES['foto']['size'] >= 5000 * 1024) {
            $this->session->set_flashdata('alert', '
                <div class="alert alert-danger alert-dismissible" role="alert">
                    Ukuran foto terlalu besar, upload ulang foto dengan ukuran kurang dari 500 KB.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            ');
            redirect('admin/galeri');
        } elseif (!$this->upload->do_upload('foto')) {
            $this->session->set_flashdata('alert', '
                <div class="alert alert-danger alert-dismissible" role="alert">
                    Gagal mengunggah foto: '.$this->upload->display_errors().'
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            ');
            redirect('admin/galeri');
        } else {
            $data = array(
                'foto'      => $namafoto,
                'judul'     => $this->input->post('judul'),
                'tanggal'   => date('Y-m-d'),
                'username'  => $this->session->userdata('username')
            );
            $this->db->insert('galeri', $data);
            $this->session->set_flashdata('alert', '
                <div class="alert alert-success alert-dismissible" role="alert">
                    Foto berhasil ditambahkan ke galeri!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            ');
            redirect('admin/galeri');
        }
    }

    public function hapus($id)
    {
        $galeri = $this->db->get_where('galeri', array('id_galeri' => $id))->row_array();
        if ($galeri) {
            $filename = FCPATH . 'Modernize/galeri/' . $galeri['foto'];
            if (file_exists($filename)) {
                unlink($filename); // Hapus file dari server
            }
            $this->db->delete('galeri', array('id_galeri' => $id)); // Hapus dari database
            $this->session->set_flashdata('alert', '
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    Foto berhasil dihapus!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            ');
        } else {
            $this->session->set_flashdata('alert', '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    File tidak ditemukan di server atau database!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            ');
        }
        redirect('admin/galeri');
    }

    public function update()
    {
        $id_galeri = $this->input->post('id_galeri');
        $judul = $this->input->post('judul');
    
        // Upload foto jika ada file baru
        if (!empty($_FILES['foto']['name'])) {
            $config['upload_path'] = './Modernize/galeri/';
            $config['allowed_types'] = 'jpeg|jpg|png';
            $this->load->library('upload', $config);
    
            if ($this->upload->do_upload('foto')) {
                $data_foto = $this->upload->data();
                $foto = $data_foto['file_name'];
    
                // Update dengan foto baru
                $this->db->set('foto', $foto);
            } else {
                echo $this->upload->display_errors();
                return;
            }
        }
    
        // Update data judul
        $this->db->set('judul', $judul);
        $this->db->where('id_galeri', $id_galeri);
        $this->db->update('galeri');
    
        $this->session->set_flashdata('alert', 'Data berhasil diupdate');
        redirect('admin/galeri');
    }
    
}
