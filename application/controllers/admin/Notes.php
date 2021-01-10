<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Notes extends CI_Controller
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
			'title' => "Notes",
			'notes' => $this->model->show_data('seller', null, null, $where)
		);
		$this->load->view('admin/catatan', $data);
	}

	public function update()
	{
		date_default_timezone_set("Asia/Bangkok");
		$now = strtotime("now");
		$id = $this->session->userdata('id_user');
		$where = array(
			'sel_id' => $id,
		);

		$data = array(
			'notes' => $this->input->post('notes'),
			'update_at' => $now
		);

		$this->model->history('Update a notes', $this->session->userdata('id_user'));
		$this->model->update('seller', $where, $data);
		redirect(base_url() . 'admin/notes');
	}
}
