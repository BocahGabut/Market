<?php
defined('BASEPATH') or exit('No direct script access allowed');

class F5bf48aa40cad7891eb709fcf1fde128 extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// if ($this->session->userdata('username') == "") {
		// 	redirect(base_url() . 'auth');
		// }
		// $this->load->helper('text');
	}

	public function index()
	{
		$where = array(
			'status' => '1'
		);

		$data = array(
			'product' => $this->model->show_data('product', 'prod_nama', 'ASC', $where),
		);
		$this->load->view('product', $data);
	}

	public function detail()
	{
		$id = $this->uri->segment('3');

		$where = array(
			'prod_id' =>
			$id
		);

		$data = array(
			'product' => $this->model->show_data('product', 'prod_nama', 'ASC', $where),
		);
		$this->load->view('details', $data);
	}

	public function search()
	{
		$this->load->view('search');
	}

	public function get_data()
	{
		$kode = $this->uri->segment('4');
		$where = array(
			'prod_nama' => $kode
		);

		$data = array(
			'list' => $this->model->data_like($where, 'product')
		);
		$this->load->view('list__', $data);
	}
}
