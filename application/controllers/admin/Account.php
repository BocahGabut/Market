<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Account extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('username') == "") {
			redirect(base_url() . 'ad789');
		}
		$this->load->helper('text');
	}

	public function index()
	{
		$id = $this->session->userdata('id_user');
		$where = array(
			'sel_id' => $id,
		);

		$data = array(
			'title' => "Account",
			'time' => $this,
			'seller' => $this->model->show_data('seller', null, null, $where)
		);
		$this->load->view('admin/account', $data);
	}

	function password()
	{
		$id = $this->session->userdata('id_user');
		$where = array(
			'sel_id' => $id,
		);

		$search = $this->model->show_data('seller', null, null, $where);

		foreach ($search->result() as $rs) {
			if (md5($this->input->post('old_pass')) === $rs->password) {
				$pass = array(
					'sel_id' => $id,
				);

				$data = array(
					'password' => md5($this->input->post('new_pass'))
				);

				$update = $this->model->update('seller', $pass, $data);
				if (!$update) {
					$this->session->set_flashdata('message', '<div class="col-12 mb-3 ">
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						<strong>Update Password Success </strong> You should check now
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<i class="ti ti-close"></i>
						</button>
					</div>
				</div>');
					$this->model->history('your update a password', $this->session->userdata('id_user'));
					redirect(base_url() . 'admin/account');
				} else {
					$this->session->set_flashdata('message', '<div class="col-12 mb-3 ">
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<strong>Update Password Failed </strong> You can try again 
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<i class="ti ti-close"></i>
						</button>
					</div>
				</div>');
					redirect(base_url() . 'admin/account');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="col-12 mb-3 ">
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<strong>Old Password Not Correct </strong> You can try again 
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<i class="ti ti-close"></i>
						</button>
					</div>
				</div>');
				redirect(base_url() . 'admin/account');
			}
		}
	}

	function upload_image($id)
	{
		$config['upload_path']          = './assets/template/data-img/user/';
		$config['allowed_types']        = 'jpg|png|jpeg';
		$config['file_name']            = $id;
		$config['overwrite']            = true;
		// $config['max_size']             = 10000024;
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('file')) {
			return $this->upload->data("file_name");
		} else {
			return $this->upload->data("file_name");
		}
	}

	public function upload()
	{
		$id = $this->session->userdata('id_user');
		$data = array(
			'sell_image' => $this->upload_image($id),
		);
		$where = array(
			'sel_id' => $id
		);

		$this->model->update('seller', $where, $data);
		$this->model->history('your update profile picture', $this->session->userdata('id_user'));
		redirect(base_url() . 'admin/account');
	}

	public function show()
	{
		$id = $this->session->userdata('id_user');
		$where = array(
			'sel_id' => $id,
		);

		$hasil = $this->model->show_data('seller', null, null, $where)->result();
		foreach ($hasil as $has) {
			$resultSet[] = $has;
		}
		echo json_encode($resultSet);
	}

	public function get_time_ago($time)
	{
		$time_difference = time() - $time;

		if ($time_difference < 1) {
			return 'less than 1 second ago';
		}
		$condition = array(
			12 * 30 * 24 * 60 * 60 =>  'year',
			30 * 24 * 60 * 60       =>  'month',
			24 * 60 * 60            =>  'day',
			60 * 60                 =>  'hour',
			60                      =>  'minute',
			1                       =>  'second'
		);

		foreach ($condition as $secs => $str) {
			$d = $time_difference / $secs;

			if ($d >= 1) {
				$t = round($d);
				return  $t . ' ' . $str . ($t > 1 ? 's' : '') . ' ago';
			}
		}
	}

	public function update()
	{
		date_default_timezone_set("Asia/Bangkok");
		$now = strtotime("now");

		$data = array(
			'sel_firstname' => $this->input->post('first'),
			'sel_lastname' => $this->input->post('last'),
			'code_country' => $this->input->post('phone_code'),
			'number_wa' => $this->input->post('wa'),
			'email' => $this->input->post('email'),
			'username' => $this->input->post('username'),
			'address' => $this->input->post('address'),
			'province' => $this->input->post('province'),
			'city' => $this->input->post('city'),
			'sub_district' => $this->input->post('district'),
			'postalcode' => $this->input->post('postal'),
			'sell_shopname' => $this->input->post('shopname'),
			'update_at' => $now,
		);

		$id = $this->session->userdata('id_user');

		$where = array(
			'sel_id' => $id
		);


		if (!isset($_POST['profile'])) {
			redirect(base_url() . 'user/account');
		} else {
			$update = $this->model->update('seller', $where, $data);
			if (!$update) {
				$this->session->set_flashdata('message', '<div class="col-12 mb-3 ">
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					<strong>Update Data Success </strong> You should check now
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<i class="ti ti-close"></i>
					</button>
				</div>
			</div>');
				$this->model->history('your update account data', $this->session->userdata('id_user'));
				redirect(base_url() . 'admin/account');
			} else {
				$this->session->set_flashdata('message', '<div class="col-12 mb-3 ">
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<strong>Update Data Failed </strong> You can try again 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<i class="ti ti-close"></i>
					</button>
				</div>
			</div>');
				redirect(base_url() . 'admin/account');
			}
		}
	}
}
