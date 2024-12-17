<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karaousel extends CI_Controller {
    public function __construct(){
        parent::__construct();
        if($this->session->userdata('level')==NULL){
            redirect('admin/auth');
        }
    }
    
	public function index()
	{
        $this->db->select('*')->from('karaousel');
		$karaousel = $this->db->get()->result_array();
            $data = array(
                  'judul_halaman'   => 'Halaman karaousel',
                  'karaousel'        => $karaousel
            );
    $this->template->load('dashboard','admin/karaousel_index',$data);
	}
    
    public function simpan(){
        $namafoto = date('YmdHis').'.jpg';
        $config['upload_path']          = 'Modernize/karaousel/';
        $config['max_size'] =  5 * 1024 * 1024; //3 * 1024 * 1024; //3Mb; 0=unlimited
        $config['file_name']            = $namafoto;
        $config['allowed_types']        = '*';
        $this->load->library('upload', $config);
        if($_FILES['foto']['size'] >=  5 * 1024 * 1024){
            $this->session->set_flashdata('alert', '
                <div class="alert alert-danger alert-dismissible" role="alert">
                Ukuran foto terlalu besar, upload ulang foto dengan ukuran yang kurang dari 500 KB.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                    ');
            redirect('admin/karaousel');  
        }  elseif( ! $this->upload->do_upload('foto')){
            $error = array('error' => $this->upload->display_errors());
        }else{
            $data = array('upload_data' => $this->upload->data());
        }   
 
        $this->db->where('judul', $this->input->post('judul'));
        $this->db->from('karaousel');
        $cek = $this->db->get()->row();
        //jika var $cek null maka username belum ada
        if($cek==NULL){
            //kondisi username belum ada
            $data = array(
                'judul'      => $this->input->post('judul'),
                'foto'      => $namafoto,
            );
            $this->db->insert('karaousel',$data);
            $this->session->set_flashdata('alert','
            <div class="alert alert-success" role="alert">
                    Berhasil Menambahkan karaousel!
                  </div>
            ');
    } else{
        //kondisi usrname sudah ada
        $this->session->set_flashdata('alert','
        <div class="alert alert-danger" role="alert">
                    Judul karaousel Sudah Ada
                  </div>
        ');
    }
        redirect('admin/karaousel');
    }
    public function hapus($id){
        $filename=FCPATH.'/assets/upload/karaousel/'.$id;
            if (file_exists($filename)){
                unlink("./assets/upload/karaousel/".$id);
            }
		$where = array('foto' => $id);
		$this->db->delete('karaousel',$where);
		$this->session->set_flashdata('alert', '
		<div class="alert alert-primary alert-dismissible fade show" role="alert">
			<i class="fa fa-exclamation-circle me-2"></i>Berhasil dihapus
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
		');
		redirect('admin/karaousel');
	}       
}
