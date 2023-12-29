<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berbagi_Pandangan extends CI_Controller {

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
		$this->load->model('Berbagi_pandangan_model');
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
		$this->form_validation->set_rules('isi','Isi','callback_check_docx','required');

		if ($this->form_validation->run() == TRUE) {
			// Konfigurasi Upload Foto
			if (!empty($_FILES['foto']['name'])) {
				$config['upload_path'] = './upload/photo/';
				$config['allowed_types'] = 'jpg|jpeg|png|JPEG';
				$config['max_size'] = '5000';

				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if ($this->upload->do_upload('foto')) {
					$fileDataFoto = $this->upload->data();
					$data['foto'] = $fileDataFoto['file_name'];
					$upload_foto = [
						'nama_file' => $fileDataFoto['file_name']
					];
				}
			}
			// Konfigurasi Upload File 
			if (!empty($_FILES['isi']['name'])) {
				$config['upload_path'] = './upload/artikel/';
				$config['allowed_types'] = 'doc|docx';
				$config['max_size'] = '5000';

				$this->load->library('upload', $config);

				$this->upload->initialize($config);

				if ($this->upload->do_upload('isi')) {
					$fileDataArtikel = $this->upload->data();

					$data = array (
						'id' => $this->data['id'],
						'id_segmen' => decrypt_url($this->input->POST('segmen')),
						'judul' => $this->input->POST('judul'),
						'foto' => (empty($upload_foto)) ? : $upload_foto['nama_file'],
						'biografi_singkat' => $this->input->POST('biografi_singkat'),
						'isi' => $fileDataArtikel['file_name'],
						'nama' => $this->input->POST('nama'),
						'email' => $this->input->POST('email'),
						'no_hp' => $this->input->POST('no_hp'),
						'instagram' => $this->input->POST('instagram'),
						'upload_at' => date('y-m-d')
					);
					$result = $this->Berbagi_pandangan_model->addArtikel($data);

					if ($result) {
						$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Berhasil Mengunggah Artikel!</div>');
						redirect('berbagi-pandangan');
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

		$this->data['list_segmen'] = $this->Berbagi_pandangan_model->getAllSegmen();

		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		$this->data['action'] = site_url('berbagi-pandangan');

		$this->load->view('template/header');
        $this->load->view('template/nav');
        $this->load->view('berbagi-pandangan/views',$this->data);
        $this->load->view('template/footer');
		}
	}

	public function check_docx()
	{
		if (!empty($_FILES['isi']['name'])) {
			$config['upload_path'] = './upload/artikel/';
			$config['allowed_types'] = 'docx';
			$config['max_size'] = '5000';

			$this->load->library('upload', $config);

			$this->upload->initialize($config);

			if (!$this->upload->do_upload('isi')) {
				$this->form_validation->set_message('check_docx','Gagal mengunggah file. Pastikan file valid dan tidak melebihi 5 MB');
				return FALSE;
			}
		}
		return TRUE;
	}
}
