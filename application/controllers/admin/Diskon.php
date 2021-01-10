<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Diskon extends CI_Controller
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
			'title' => "Diskon",
			'diskon' => $this->model->show_data('diskon', 'status', 'ASC', $where)
		);
		$this->load->view('admin/diskon', $data);
	}

	function add()
	{
		$where = array(
			'seller' => $this->session->userdata('id_user')
		);

		// $join_list = "list_diskon.diskon = diskon.id_diskon";
		// $join_product = "list_diskon.product = product.prod_id";

		$data = array(
			'title' => "Add Diskon",
			'product' => $this->model->show_data('product', 'prod_nama', 'ASC', $where)
			// 'diskon' => $this->model->double_join('diskon', 'list_diskon', 'product', $join_list, $join_product),
		);
		$this->load->view('admin/data/add_diskon', $data);
	}

	public function save()
	{
		$id = base_convert(microtime(false), 18, 36);
		$data = array(
			'id_diskon' => $id,
			'start' => $this->input->post('from'),
			'end' => $this->input->post('to'),
			'persen' => $this->input->post('val_disc'),
			'kode' => $this->input->post('dist_code'),
			'seller' => $this->session->userdata('id_user'),
			'status' => '0',
		);


		$prod = $this->input->post('product');

		if (isset($_POST['submit'])) {
			$save = $this->model->save('diskon', $data);
			if (!$save) {
				foreach ($prod as $varianP) {

					$where_prod = array(
						'prod_id' => $varianP
					);

					$prod = array(
						'discount' =>  $id,
					);

					$this->model->update('product', $where_prod, $prod);

					// $varian = array(
					// 	'product' =>  $varianP,
					// 	'diskon' => $id
					// );

					// $where_list = array(
					// 	'product' => $varianP
					// );

					// $get_list = $this->model->show_data('list_diskon', $where_list);

					// $data_upt = array(
					// 	'diskon' => $id
					// );

					// if ($get_list->num_rows() > 0) {
					// 	$this->model->update('list_diskon', $where_list, $data_upt);
					// } else {
					// 	$this->model->save('list_diskon', $varian);
					// }
				}
				$this->model->history('insert discount codes', $this->session->userdata('id_user'));

				$this->session->set_flashdata('message', '<div class="col-12 mb-3 mt-2">
				<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Save Data Success </strong> You should check now
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<i class="ti ti-close"></i>
						</button>
				</div>
				</div>');
			} else {
				$this->session->set_flashdata('message', '<div class="col-12 mb-3 mt-2">
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Save Data Failed </strong> You can try again 
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<i class="ti ti-close"></i>
				</button>
				</div>
				</div>');
			}
			redirect(base_url() . 'admin/diskon');
		} else {
			redirect(base_url() . 'admin/diskon');
		}
	}

	public function edit()
	{
		$id = $this->uri->segment('4');
		$where = array(
			'id_diskon' => $id,
			'seller' => $this->session->userdata('id_user')
		);

		$join_list = "list_diskon.diskon = diskon.id_diskon";
		$join_product = "list_diskon.product = product.prod_id";

		$data = array(
			'title' => "Edit Diskon",
			// 'diskon' => $this->model->double_join('diskon', 'list_diskon', 'product', $join_list, $join_product, null, null, '1'),
			'diskon' => $this->model->show_data('diskon', null, null, $where),
			'product' => $this->model->show_data('product', 'prod_nama', 'ASC')
		);
		$this->load->view('admin/data/edit_diskon', $data);
	}

	public function sts()
	{
		$id = $this->uri->segment('4');
		$stat = $this->uri->segment('5');

		$where = array(
			'id_diskon' => $id
		);

		$data = array(
			'status' => $stat
		);

		$this->model->update('diskon', $where, $data);
		$this->model->history('change status discount codes', $this->session->userdata('id_user'));
		redirect(base_url() . 'admin/diskon');
	}

	public function list()
	{
		$id = $this->input->post('id');

		$where = array(
			'diskon' => '2uqcsor3djy8c00',
		);

		// $resultSet[] = null;
		$hasil = $this->model->show_data('list_diskon', null, null, $where)->result();
		foreach ($hasil as $has) {
			$resultSet[] = $has;
		}
		echo json_encode($resultSet);
	}
}
