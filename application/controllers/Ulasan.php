<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ulasan extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	
     public function __construct()
     {
        parent::__construct();

		$this->load->model('Ulasan_model');
     }

	public function detail ($id_artikel) { 
		$this->data['url'] = site_url('ulasan');

		$detail_artikel = $this->Ulasan_model->getDetailArtikel(decrypt_url($id_artikel));

		$this->data['id_artikel'] = $detail_artikel->id_artikel;
		$this->data['judul'] = $detail_artikel->judul;
		$this->data['foto'] = $detail_artikel->foto;
		$this->data['image'] = $detail_artikel->image;
		$this->data['nama'] = $detail_artikel->nama;
		$this->data['isi'] = $detail_artikel->isi;
		$this->data['sinopsis'] = $detail_artikel->sinopsis;
		$this->data['biografi_singkat'] = $detail_artikel->biografi_singkat;
		$this->data['email'] = $detail_artikel->email;
		$this->data['no_hp'] = $detail_artikel->no_hp;
		$this->data['instagram'] = $detail_artikel->instagram;
		$this->data['segmen'] = $detail_artikel->segmen;
		$this->data['id_segmen'] = $detail_artikel->id_segmen;
		$this->data['upload_at'] = $detail_artikel->upload_at;

		$this->load->view('template/header');
        $this->load->view('template/nav');
        $this->load->view('ulasan/detail', $this->data);
        $this->load->view('template/footer');
	}

	private function limitWords($string, $word_limit) {
		$words = explode(" ", $string);
		return implode(" ", array_splice($words, 0, $word_limit));
	}

	public function load_more()
    {
        $offset = $this->input->post('offset'); // Ambil offset untuk memuat artikel selanjutnya
        $limit = 3; // Jumlah artikel yang akan dimuat setiap kali tombol "Load More" ditekan

        $articles = $this->Ulasan_model->getMoreArtikelUlasan($limit, $offset);

        $this->data['list_artikel'] = $articles;

		foreach ($this->data['list_artikel'] as &$article) {
			$article->isi = $this->limitWords($article->isi, 50); 
		}

        $this->load->view('ulasan/load_more', $this->data);
    }

    public function index()
	{
		$limit = $this->session->userdata('limit') ? $this->session->userdata('limit') : 3;
		$this->data['list_artikel'] = $this->Ulasan_model->getArtikelUlasan($limit);

		foreach ($this->data['list_artikel'] as &$article) {
			$article->isi = $this->limitWords($article->isi, 50); 
		}

		$this->load->view('template/header');
        $this->load->view('template/nav');
        $this->load->view('ulasan/views', $this->data);
        $this->load->view('template/footer');
	}
}
