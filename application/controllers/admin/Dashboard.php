<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
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
		$where = array(
			'seller' => $this->session->userdata('id_user')
		);

		$data = array(
			'title' => "Dashboard",
			'diskon' => $this->model->show_data('diskon', 'status', 'ASC', $where),
			'history' => $this->model->show_data('history', 'date', 'DESC', $where, '7'),
			'get' => $this,
		);
		$this->load->view('admin/dashboard', $data);
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

	public function logout()
	{
		$this->session->unset_userdata('username');
		session_destroy();
		$this->model->history('You logout from admin pages', $this->session->userdata('id_user'));
		redirect(base_url('auth/login'));
	}
}
