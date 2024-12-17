<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konten extends CI_Controller {
    public function __construct(){
        parent::__construct();
        if($this->session->userdata('level')==NULL){
            redirect('admin/auth');
        }
    }
    
	public function index()
	{
        $this->db->select('*')->from('kategori');
		$this->db->order_by('nama_kategori','ASC');
		$kategori = $this->db->get()->result_array();

        $this->db->select('*')->from('konten a');
        $this->db->join('kategori b','a.id_kategori=b.id_kategori','left');
        $this->db->join('user c','a.username=c.username','left');
		$this->db->order_by('tanggal','DESC');
		$konten = $this->db->get()->result_array();

        $data = array(
            'title'        => 'Halaman Konten',
            'judul'        => 'Halaman Konten',
            'kategori'     => $kategori,
            'konten'       => $konten
        );
    $this->template->load('dashboard','admin/konten_index',$data);
	}
    
    public function simpan(){
        $namafoto = date('YmdHis').'.jpg';
        $config['upload_path']          = 'Modernize/konten/';
        $config['max_size'] = 500 * 1024; //3 * 1024 * 1024; //3Mb; 0=unlimited
        $config['file_name']            = $namafoto;
        $config['allowed_types']        = '*';
        $this->load->library('upload', $config);
    
        if($_FILES['foto']['size'] >= 500 * 1024){
            $this->session->set_flashdata('alert', '
                <div class="alert alert-danger alert-dismissible" role="alert">
                Ukuran foto terlalu besar, upload ulang foto dengan ukuran yang kurang dari 500 KB.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                    ');
            redirect('admin/konten');  
        } elseif( ! $this->upload->do_upload('foto')){
            $error = array('error' => $this->upload->display_errors());
        }else{
            $data = array('upload_data' => $this->upload->data());
        }   
    
        // Cek jika judul sudah ada di tabel konten
        $this->db->where('judul', $this->input->post('judul'));
        $this->db->from('konten');
        $cek = $this->db->get()->row();
        if($cek == NULL){
            // Menyimpan data baru jika judul belum ada
            $data = array(
                'judul'      => $this->input->post('judul'),
                'id_kategori'=> $this->input->post('id_kategori'),
                'keterangan' => $this->input->post('keterangan'),
                'tanggal'    => date('Y-m-d'),
                'foto'       => $namafoto,
                'username'   => $this->session->userdata('username'),
                'slug'       => str_replace(' ', '-', $this->input->post('judul')),
                'harga'   => $this->input->post('harga')  // Menambahkan harga
            );
            $this->db->insert('konten', $data);
            $this->session->set_flashdata('alert','
            <div class="alert alert-success" role="alert">
                    Berhasil Menambahkan Konten!
                  </div>
            ');
        } else {
            // Jika judul sudah ada
            $this->session->set_flashdata('alert','
            <div class="alert alert-danger" role="alert">
                        Judul Konten Sudah Ada
                      </div>
            ');
        }
        redirect('admin/konten');
    }
    
    public function hapus($id){
        $filename=FCPATH.'/assets/upload/konten/'.$id;
            if (file_exists($filename)){
                unlink("./assets/upload/konten/".$id);
            }
		$where = array('foto' => $id);
		$this->db->delete('konten',$where);
		$this->session->set_flashdata('alert', '
		<div class="alert alert-primary alert-dismissible fade show" role="alert">
			<i class="fa fa-exclamation-circle me-2"></i>BERHASIL DIHAPUS
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
		');
		redirect('admin/konten');
	}       
    public function update() {
        $namafoto = $this->input->post('nama_foto');
        $config['upload_path'] = 'Modernize/konten/';
        $config['max_size'] = 500; // dalam KB
        $config['file_name'] = $namafoto;
        $config['overwrite'] = true;
        $config['allowed_types'] = '*'; // Jenis file yang diizinkan
    
        $this->load->library('upload', $config);
    
        // Periksa ukuran file secara manual
        if ($_FILES['foto']['size'] > (500 * 1024)) { // 500 KB
            $this->session->set_flashdata('alert', 
                '<div class="alert alert-danger alert-dismissible" role="alert">
                    Ukuran foto terlalu besar, upload ulang foto dengan ukuran kurang dari 500 KB.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>'
            );
            redirect('admin/konten');
        }
    
        // Upload file
        if (!$this->upload->do_upload('foto')) {
            $error = $this->upload->display_errors();
            echo "Upload gagal: " . $error;
        }
    
        $data = $this->upload->data();
        echo "Upload berhasil: ";
        print_r($data);
    
        // Data baru untuk disimpan
        $data = array(
            'judul'      => $this->input->post('judul'),
            'id_kategori'=> $this->input->post('id_kategori'),
            'keterangan' => $this->input->post('keterangan'),
            'slug'       => str_replace(' ', '-',$this->input->post('judul')),
            'harga'   => $this->input->post('harga')  // Menambahkan harga
        );
        $where = array(
            'foto' => $this->input->post('nama_foto')
        );
        // Menyimpan data ke tabel 'kategori'
        $this->db->update('konten', $data, $where);
    
        // Menampilkan pesan sukses
        $this->session->set_flashdata('alert', 
            '<div class="alert alert-primary alert-dismissible fade show" role="alert">
                 Konten Berhasil Diperbarui !!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>'
        );
        redirect('admin/konten'); // Redirect ke halaman kategori
    }
    
}
