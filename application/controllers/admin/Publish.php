<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Publish extends CI_Controller
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
			'status' => '0',
			'seller' => $this->session->userdata('id_user')
		);

		$pub = array(
			'status' => '1'
		);

		$data = array(
			'title' => "Publish Product",
			'product' => $this->model->show_data('product', 'prod_nama', 'ASC', $where),
			'product_pub' => $this->model->show_data('product', 'prod_nama', 'ASC', $pub),
		);
		$this->load->view('admin/publish', $data);
	}

	public function list()
	{
		$id = $this->uri->segment('4');
		$stat = $this->uri->segment('5');
		$data = array(
			'prod_id' => $id,
			'status' => $stat,
		);

		$where = array(
			'prod_id' => $id
		);

		$this->model->update('product', $where, $data);
		if ($stat === '0') {
			$this->model->history('Your change a product status to deactive for ' . $id, $this->session->userdata('id_user'));
		} else {
			$this->model->history('Your change a product status to active for ' . $id, $this->session->userdata('id_user'));
		}
		redirect(base_url() . 'admin/publish');
	}
}
