<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {
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
        $data = array(
            'title'        => 'Kategori',
            'judul'        => 'Kategori Konten',
            'kategori'     => $kategori
        );
    $this->template->load('dashboard','admin/kategori_index',$data);
	}
    public function tambah(){
        $data = array(
            'title'    => 'Form Tambah Pengguna',
            'judul'    => 'Halaman Tambah User'
        );
        $this->template->load('dashboard','admin/tambah_user',$data);
    }
    public function simpan(){
        $this->db->where('nama_kategori', $this->input->post('nama_kategori'));
        $this->db->from('kategori');
        $cek = $this->db->get()->row();
        //jika var $cek null maka username belum ada
        if($cek==NULL){
            //kondisi username belum ada
            $data = array(
                'nama_kategori'      => $this->input->post('nama_kategori')
            );
            $this->db->insert('kategori',$data);
            $this->session->set_flashdata('alert','
            <div class="alert alert-success" role="alert">
                    Berhasil Menambahkan Kategori!
                  </div>
            ');
    } else{
        //kondisi usrname sudah ada
        $this->session->set_flashdata('alert','
        <div class="alert alert-danger" role="alert">
                    Kategori Konten Sudah Digunakan!
                  </div>
        ');
    }
        redirect('admin/kategori');
    }
    public function hapus($id){
		$where = array('id_kategori' => $id);
		$this->db->delete('kategori',$where);
		$this->session->set_flashdata('alert', '
		<div class="alert alert-primary alert-dismissible fade show" role="alert">
			<i class="fa fa-exclamation-circle me-2"></i>Kategori Berhasil Dihapus
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
		');
		redirect('admin/kategori');
	}       
    public function update(){
        $where = array(
			'id_kategori'  => $this->input->post('id_kategori'),
		);
		$data = array(
			'nama_kategori'   => $this->input->post('nama_kategori'),
		);
		$this->db->update('kategori',$data,$where);
		$this->session->set_flashdata('alert', '
		<div class="alert alert-primary alert-dismissible fade show" role="alert">
			<i class="fa fa-exclamation-circle me-2"></i>Kategori Berhasil Diupdate
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
		');
		redirect('admin/kategori');
    }
}
