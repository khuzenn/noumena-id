<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laman_Kerja extends CI_Controller {

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

		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('Laman_kerja_model');
     }

     public function index()
	{
		$this->form_validation->set_rules('judul','Judul','required');
		$this->form_validation->set_rules('segmen','Segmen','required');
		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('no_hp','No_Hp','required');
		$this->form_validation->set_rules('instagram','Instagram','required');
		$this->form_validation->set_rules('biografi_singkat','Biografi_Singkat','required');
		$this->form_validation->set_rules('isi','Isi','required');
		$this->form_validation->set_rules('sinopsis','Sinopsis','required');

		if ($this->form_validation->run() == TRUE) {
			if (!empty($_FILES['foto']['name'])) {
				$config['upload_path'] = './upload/foto/';
				$config['allowed_types'] = 'jpg|jpeg|png|JPEG';
				$config['max_size'] = '5000';

				$this->load->library('upload', $config);

				$this->upload->initialize($config);

				$upload_foto = [];
				if ($this->upload->do_upload('foto')) {
					$fileDataFoto = $this->upload->data();

					$info_foto = pathinfo($fileDataFoto['file_name']);
					$file_name_foto = $info_foto['filename'];

					$upload_foto = [
						'nama_file' => $fileDataFoto['file_name']
					];
				}
			}

			// KONFIGURASI IMAGE
			if (!empty($_FILES['image']['name'])) {
				$config['upload_path'] = './upload/image/';
				$config['allowed_types'] = 'jpg|jpeg|png|JPEG';
				$config['max_size'] = '5000';

				$this->load->library('upload', $config);

				$this->upload->initialize($config);

				$upload_image = [];
				if ($this->upload->do_upload('image')) {
					$fileDataImage = $this->upload->data();

					$info_image = pathinfo($fileDataImage['file_name']);
					$file_name_image = $info_image['filename'];

					$upload_image = [
						'nama_file' => $fileDataImage['file_name']
					];

					$data = array (
						'id_artikel' => $this->data['id'],
						'judul' => $this->input->POST('judul'),
						'id_segmen' => decrypt_url($this->input->POST('segmen')),
						'nama' => $this->input->POST('nama'),
						'email' => $this->input->POST('email'),
						'no_hp' => $this->input->POST('no_hp'),
						'instagram' => $this->input->POST('instagram'),
						'biografi_singkat' => $this->input->POST('biografi_singkat'),
						'isi' => $this->input->POST('isi'),
						'sinopsis' => $this->input->POST('sinopsis'),
						'foto' => (empty($upload_foto)) ? : $upload_foto['nama_file'],
						'image' => (empty($upload_image)) ? : $upload_image['nama_file'],
						'upload_at' => date('y-m-d')
					);
					$result = $this->Laman_kerja_model->addArtikel($data);
					
					if ($result) {
						$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Berhasil Mengunggah Artikel!</div>');
		
						redirect('laman-kerja');
					}
				}
			}
		} else {
			$this->data['judul'] = $this->input->POST('judul'); 
			$this->data['selected_segmen'] = $this->input->POST('segmen'); 
			$this->data['nama'] = $this->input->POST('nama'); 
			$this->data['email'] = $this->input->POST('email'); 
			$this->data['no_hp'] = $this->input->POST('no_hp'); 
			$this->data['instagram'] = $this->input->POST('instagram');
			$this->data['biografi_singkat'] = $this->input->POST('biografi_singkat');
			$this->data['isi'] = $this->input->POST('isi');
			$this->data['sinopsis'] = $this->input->POST('sinopsis');

		$this->data['list_segmen'] = $this->Laman_kerja_model->getAllSegmen();

		// $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		$this->data['action'] = site_url('laman-kerja');

		$this->load->view('dashboard/laman_kerja', $this->data);
		}
	}
}
