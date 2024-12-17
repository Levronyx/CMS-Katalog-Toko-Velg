<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->db->from('konfigurasi');
        $konfig = $this->db->get()->row();

        $this->db->from('caraousel');
        $caraousel = $this->db->get()->result_array();

        $this->db->from('karaousel');
        $karaousel = $this->db->get()->result_array();

        $this->db->from('galeri');
        $galeri = $this->db->get()->result_array();

        $this->db->from('kategori');
        $kategori = $this->db->get()->result_array();

        $this->db->select('*')->from('konten a');
        $this->db->join('kategori b', 'a.id_kategori=b.id_kategori', 'left');
        $this->db->join('user c', 'a.username=c.username', 'left');
        $this->db->order_by('tanggal', 'DESC');
        $konten = $this->db->get()->result_array();

        $this->db->select('*')->from('best a');
        $this->db->join('kategori b', 'a.id_kategori=b.id_kategori', 'left');
        $this->db->join('user c', 'a.username=c.username', 'left');
        $this->db->order_by('tanggal', 'DESC');
        $best = $this->db->get()->result_array();

        $data = array(
            'judul'     => "Beranda | pabian",
            'konfig'    => $konfig,
            'kategori'  => $kategori,
            'caraousel' => $caraousel,
            'karaousel' => $karaousel,
            'konten'    => $konten,
            'best'      => $best,
            'galeri'    => $galeri
        );

        $this->load->view('beranda', $data);
    }

    public function kategori($id) {
        $this->db->from('konfigurasi');
        $konfig = $this->db->get()->row();

        $this->db->from('kategori');
        $kategori = $this->db->get()->result_array();

        $this->db->from('konten a');
        $this->db->join('kategori b', 'a.id_kategori=b.id_kategori', 'left');
        $this->db->join('user c', 'a.username=c.username', 'left');
        $this->db->where('a.id_kategori', $id);
        $konten = $this->db->get()->result_array();

        $data = array(
            'judul'    => "Beranda | Pipapip",
            'konfig'   => $konfig,
            'kategori' => $kategori,
            'konten'   => $konten
        );

        $this->load->view('kategori', $data);
    }

    public function artikel($id) {
	$this->db->from('konfigurasi');
	$konfig = $this->db->get()->row();
  
	$this->db->from('kategori');
	$kategori = $this->db->get()->result_array();
  
	// Fetch detail konten
	$this->db->select('*')->from('konten a');
	$this->db->join('kategori b', 'a.id_kategori=b.id_kategori', 'left');
	$this->db->join('user c', 'a.username=c.username', 'left');
	$this->db->where('slug', $id);
	$konten = $this->db->get()->row();
  
	// Fetch similar products
	$this->db->select('a.*, b.nama_kategori')
	    ->from('konten a')
	    ->join('kategori b', 'a.id_kategori=b.id_kategori', 'left')
	    ->where('a.id_kategori', $konten->id_kategori)
	    ->where('a.slug !=', $id) // Exclude current item
	    ->limit(4);
	$similar_products = $this->db->get()->result_array();
  
	$data = array(
	    'judul' => $konten->judul . " | pabian",
	    'konfig' => $konfig,
	    'kategori' => $kategori,
	    'konten' => $konten,
	    'rekomendasi' => $similar_products // Pass to view
	);
  
	$this->load->view('detail', $data);
  }
  
}
