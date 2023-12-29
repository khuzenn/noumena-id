<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pangkalan_Artikel extends CI_Controller {

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

		$this->load->model('Pangkalan_artikel_model');
		$this->load->helper('download');
     }

	public function detail($id) {
		$this->data['url'] = site_url('pangkalan-artikel');

		$detail_artikel = $this->Pangkalan_artikel_model->getDetailArtikel(decrypt_url($id));

		$this->data['id'] = $detail_artikel->id;
		$this->data['judul'] = $detail_artikel->judul;
		$this->data['foto'] = $detail_artikel->foto;
		$this->data['nama'] = $detail_artikel->nama;
		$this->data['isi'] = $detail_artikel->isi;
		$this->data['biografi_singkat'] = $detail_artikel->biografi_singkat;
		$this->data['email'] = $detail_artikel->email;
		$this->data['no_hp'] = $detail_artikel->no_hp;
		$this->data['instagram'] = $detail_artikel->instagram;
		$this->data['segmen'] = $detail_artikel->segmen;
		$this->data['id_segmen'] = $detail_artikel->id_segmen;
		$this->data['upload_at'] = $detail_artikel->upload_at;

		$this->load->view('dashboard/detail_pangkalan_artikel', $this->data);
	}

	public function delete($id) {
		$result = $this->Pangkalan_artikel_model->deleteArtikel(decrypt_url($id));

		if ($result) {
			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Berhasil Menghapus Artikel!</div>');
			redirect('pangkalan-artikel');
		}
	}

	public function download($id) {
		$download_artikel = $this->Pangkalan_artikel_model->getArtikel($id);

		if ($download_artikel) {
			$file_path = './upload/artikel/' . $download_artikel['isi'];

			force_download($file_path, $data);
		} else {
			echo 'File Tidak Ditemukan.';
		}
	}
	public function downloadFoto($id) {
		$download_foto = $this->Pangkalan_artikel_model->getFoto($id);

		if ($download_foto) {
			$file_path = './upload/photo/' . $download_foto['foto'];

			force_download($file_path, $data);
		} else {
			echo 'File Tidak Ditemukan.';
		}
	}
    
     public function index()
	{
		$this->data['list_artikel'] = $this->Pangkalan_artikel_model->getDataArtikel();

		$this->load->view('dashboard/pangkalan_artikel', $this->data);
	}
}
