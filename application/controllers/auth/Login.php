<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		// if ($this->session->userdata('username') == "") {
		// 	redirect(base_url() . 'login');
		// }
		// $this->load->helper('text');
	}

	public function index()
	{
		$data = array(
			'title' => "Login"
		);
		$this->load->view('auth/login', $data);
	}

	public function verif()
	{
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));

		$where = array(
			'username' => $username,
			'password' => $password,
		);

		$result = $this->model->show_data('seller', null, null, $where);

		if (!isset($_POST['login'])) {
			redirect(base_url() . 'auth/login');
		} else {
			if ($result->num_rows() > 0) {
				foreach ($result->result() as $sess) {
					$sess_data['logged_in'] = 'Sudah Loggin';
					$sess_data['id_user'] = $sess->sel_id;
					$sess_data['username'] = $sess->username;
					$this->session->set_userdata($sess_data);
				}
				$this->model->history('You login to admin pages', $this->session->userdata('id_user'));
				redirect(base_url() . 'admin/dashboard');
			} else {
				$this->session->set_flashdata('message', '<div class="row">
						<div class="col-12 mb-3 mt-2">
							<div class="alert alert-danger alert-dismissible fade show" role="alert">
							<strong>Username and Password </strong> Not Correct
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<i class="ti ti-close"></i>
								</button>
								</div>
							</div>
							</div>');
				redirect(base_url() . 'auth/login');
			}
		}
	}
}
