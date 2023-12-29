<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
		$this->load->model('Admin_model');
	}

	public function register()
	{
		$this->form_validation->set_rules('nama','Nama','required|trim');
		$this->form_validation->set_rules('email','Email','required|trim|valid_email|is_unique[user.email]',[
			'is_unique' => 'Email Ini Telah terdaftar!'
		]);
		$this->form_validation->set_rules('password1','Password','required|trim|min_length[8]|matches[password2]',[
			'matches' => 'Password Tidak Sama!',
			'min_length' => 'Password Terlalu Pendek!'
		]);
		$this->form_validation->set_rules('password2','Password','required|trim|matches[password1]');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('template/header');
			$this->load->view('admin_register');
		} else {
			$data = [
				'nama' => htmlspecialchars($this->input->POST('nama', true)),
				'email' => htmlspecialchars($this->input->POST('email', true)),
				'password' => password_hash($this->input->POST('password1'), PASSWORD_DEFAULT),
				'foto' => 'default.jpg',
				'is_active' => '1',
				'date_created' => date('d-m-y')
			];

			$result = $this->Admin_model->addAkun($data);

			if ($result) {
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Membuat Akun, Silahkan Masuk.</div>');
				redirect('admin');
			}
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('nama');

		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
    	$this->output->set_header('Pragma: no-cache');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Keluar.</div>');
		redirect('admin');		
	}

	public function index()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');
		
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('template/header');
			$this->load->view('admin');
		} else {
			$nama = $this->input->post('nama');
			$password = $this->input->post('password');

			$user = $this->Admin_model->getAdmindata($nama);

			// Validasi User
			if ($user) {
				// Jika User Aktif
				if ($user['is_active'] == 1) {
					// Password Validation
					if(password_verify($password, $user['password'])){
						$data = [
							'nama' => $user['nama']
						];
						$this->session->set_userdata($data);
						redirect('dashboard');
					} else {
						$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Yang Anda Masukkan Salah!</div>');
						redirect('admin');
					}
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username Belum Diaktifkan!</div>');
					redirect('admin');
				}

				$this->session->set_flashdata('message', 'Anda Berhasil Melakukan Login');
				
				// redirect('home'); // Ganti 'dashboard' dengan halaman yang sesuai
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username Tidak Terdaftar!</div>');
				redirect('admin');
			}
		}
	}

}
