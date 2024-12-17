<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    public function __construct(){
        parent::__construct();
        if($this->session->userdata('level') != 'Admin'){
           redirect('auth');
        }
    }
	public function index()
	{
        $this->db->select('*')->from('user');
		$this->db->order_by('nama','ASC');
		$user = $this->db->get()->result_array();
        $data = array(
            'title'    => 'Data User',
            'judul'    => 'Halaman User',
            'user'     => $user
        );
    $this->template->load('dashboard','admin/user_index',$data);
	}
    public function tambah(){
        $data = array(
            'title'    => 'Form Tambah Pengguna',
            'judul'    => 'Halaman Tambah User'
        );
        $this->template->load('admin/dashboard','admin/tambah_user',$data);
    }
    public function edit($id){
        $this->db->select('*')->from('user');
        $this->db->where('id_user', $id);
        $user = $this->db->get()->result_array();
        $data = array('user' => $user);
		$this->template->load('layout/template','user_edit',$data);
    }
	public function hapus($id){
		$where = array('id_user' => $id);
		$this->db->delete('user',$where);
        $this->session->set_flashdata('alert','
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fa fa-exclamation-circle me-2"></i>Berhasil Dihapus!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        ');
		redirect('admin/user/index');
    }
    public function update(){
        $data = array(
            'nama'      => $this->input->post('nama'),
            'username'     => $this->input->post('username'),
        );
        $where = array(
            'id_user' => $this->input->post('id_user')
        );
        $this->db->update('user',$data,$where);
        $this->session->set_flashdata('alert','
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fa fa-exclamation-circle me-2"></i>Berhasil Diubah!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        ');
        redirect('admin/user');
	}
    public function simpan(){
        $this->db->where('username',$this->input->post('username'));
        $this->db->from('user');
        $cek = $this->db->get()->row();
        //jika variable $cek null maka username belum ada
        if($cek==NULL){
            //kondisi username sudah digunakan
            $data = array(
                'username'     => $this->input->post('username'),
                'password'     => md5($this->input->post('password')),
                'nama'     => $this->input->post('nama'),
                'level'     => $this->input->post('level')
            );
            $this->db->insert('user',$data);
            $this->session->set_flashdata('alert','
            <div class="alert alert-success" role="alert">
                    Berhasil disimpan!!!
                  </div>
            ');
        } else {
            //kondisi username sudah digunakan
            $this->session->set_flashdata('alert','
            <div class="alert alert-danger" role="alert">
                    Username sudah digunakan!!!
                  </div>
            ');
        }
            redirect('admin/user');
}
}