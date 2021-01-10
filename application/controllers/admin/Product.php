<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
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
			'title' => "Product",
			'product' => $this->model->show_data('product', 'prod_nama', 'ASC', $where),
		);
		$this->load->view('admin/product', $data);
	}

	public function optional_prod()
	{
		$this->load->view('admin/data/get_optional');
	}

	public function productadd()
	{
		$data = array(
			'title' => "Add Product"
		);
		$this->load->view('admin/data/product_add', $data);
	}

	public function save()
	{
		date_default_timezone_set("Asia/Bangkok");
		$skrng = strtotime("now");
		$id = base_convert(microtime(false), 18, 36);

		$data = array(
			'prod_id' => $id,
			'prod_nama' => $this->input->post('prod_name'),
			'prod_price' => str_replace(".", "", $this->input->post('prod_price')),
			'prod_weight' => $this->input->post('prod_weight'),
			'seller' => $this->session->userdata('id_user'),
			'prod_unit' => $this->input->post('prod_unit'),
			'thumb_image' => $this->upload_image($id),
			'stock' => $this->input->post('prod_stock'),
			'merk' => $this->input->post('prod_merk'),
			'kondisi' => $this->input->post('kondisi'),
			'asuransi' => $this->input->post('asuransi'),
			'description' => $this->input->post('description'),
			'create_at' => $skrng,
			'update_at' => '',
			'status' => '0'
		);

		$opt_prod = array(
			'optional_id' => $id . '1a',
			'product' => $id,
			'bentuk' => $this->input->post('prod_bnt'),
			'kadaluarsa' => $this->input->post('prod_expired'),
			'lama_simpan' => $this->input->post('prod_lsp'),
			'ket_simpan' => $this->input->post('prod_ksp'),
		);

		if (isset($_POST['submit'])) {
			if ($this->input->post('switch8') == true) {
				$this->model->save('prod_optional', $opt_prod);
			} else {
				//nothing
			}

			$save = $this->model->save('product', $data);
			if (!$save) {
				$this->session->set_flashdata('message', '<div class="col-12 mb-3 mt-2">
				<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Save Data Success </strong> You should check now
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<i class="ti ti-close"></i>
						</button>
				</div>
				</div>');
				$this->model->history('Your add a product ' . $this->input->post('prod_name'), $this->session->userdata('id_user'));
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
			redirect(base_url() . 'admin/product');
		} else {
			redirect(base_url() . 'admin/product');
		}
	}

	public function edit()
	{
		$id = $this->uri->segment('4');
		$where = array(
			'prod_id' => $id,
			'seller' => $this->session->userdata('id_user')
		);

		$data = array(
			'title' => "Edit Product",
			'product' => $this->model->show_data('product', 'prod_nama', 'ASC', $where),
		);
		$this->load->view('admin/data/edit', $data);
	}

	public function update()
	{
		$id = $this->uri->segment('4');
		date_default_timezone_set("Asia/Bangkok");
		$skrng = strtotime("now");

		$where = array(
			'prod_id' => $id,
		);

		if (!$this->input->post('new_image') == null) {
			unlink('./assets/template/data-img/thumb-img/' . $this->input->post('old_image'));
			$image = $this->upload_image($id);
		} else {
			$image = $this->input->post('old_image');
		}

		$data = array(
			'prod_nama' => $this->input->post('prod_name'),
			'prod_price' => str_replace(".", "", $this->input->post('prod_price')),
			'prod_weight' => $this->input->post('prod_weight'),
			'seller' => $this->session->userdata('id_user'),
			'prod_unit' => $this->input->post('prod_unit'),
			'thumb_image' => $image,
			'stock' => $this->input->post('prod_stock'),
			'merk' => $this->input->post('prod_merk'),
			'kondisi' => $this->input->post('kondisi'),
			'asuransi' => $this->input->post('asuransi'),
			'description' => $this->input->post('description'),
			// 'create_at' => '',
			'update_at' => $skrng,
			'status' => '0'
		);

		$opt_prod = array(
			'optional_id' => $id . '1a',
			'product' => $id,
			'bentuk' => $this->input->post('prod_bnt'),
			'kadaluarsa' => $this->input->post('prod_expired'),
			'lama_simpan' => $this->input->post('prod_lsp'),
			'ket_simpan' => $this->input->post('prod_ksp'),
		);

		if (isset($_POST['submit'])) {
			$update = $this->model->update('product', $where, $data);

			$opt = array(
				'product' => $id
			);
			$prod_opt = $this->model->show_data('prod_optional', null, null, $opt);

			if ($this->input->post('prod_bnt') === null && $this->input->post('prod_expired') === '' && $this->input->post('prod_lsp') === '' && $this->input->post('prod_ksp') === '') {
			} else {
				if ($prod_opt->num_rows() > 0) {
					$this->model->update('prod_optional', $opt, $opt_prod);
				} else {
					$this->model->save('prod_optional', $opt_prod);
				}
			}

			if (!$update) {
				$this->session->set_flashdata('message', '<div class="col-12 mb-3 mt-2">
				<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Update Data Success </strong> You should check now
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<i class="ti ti-close"></i>
						</button>
				</div>
				</div>');
				$this->model->history('Your update a product ' . $this->input->post('prod_name'), $this->session->userdata('id_user'));
			} else {
				$this->session->set_flashdata('message', '<div class="col-12 mb-3 mt-2">
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Update Data Failed </strong> You can try again 
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<i class="ti ti-close"></i>
				</button>
				</div>
				</div>');
			}
			redirect(base_url() . 'admin/product');
		}
	}

	public function detail()
	{
		$id = $this->uri->segment('4');
		$where = array(
			'prod_id' => $id
		);
		$data = array(
			'title' => "Detail Product",
			'product' => $this->model->show_data('product', null, null, $where),
			'time' => $this,
		);
		$this->load->view('admin/data/detail', $data);
	}

	function delete()
	{
		$id = $this->input->post('id');
		// $id = $this->uri->segment('4');
		$where = array(
			'prod_id' => $id
		);

		$prod = array(
			'product' => $id
		);

		$result = $this->model->show_data('product', null, null, $where);

		foreach ($result->result() as $image) {
			unlink('./assets/template/data-img/thumb-img/' . $image->thumb_image);
			delete_files('./assets/template/data-img/upload/' . $image->prod_id, true); // delete all files/folders
			rmdir('./assets/template/data-img/upload/' . $image->prod_id); // delete all files/folders
			$this->model->delete($prod, 'product_image');
			$this->model->delete($prod, 'prod_optional');
			$this->model->history('Your delete a product ' . $image->prod_nama, $this->session->userdata('id_user'));
		}

		$this->model->delete($where, 'product');
	}

	function upload_image($id)
	{
		$config['upload_path']          = './assets/template/data-img/thumb-img/';
		$config['allowed_types']        = 'jpg|png|jpeg';
		$config['file_name']            = $id;
		$config['overwrite']            = false;
		$config['max_size']             = 10000024;
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('file')) {
			return $this->upload->data("file_name");
		} else {
			return $this->upload->data("file_name");
		}
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

	// Start Image
	function upload_images($id)
	{
		$id_prod = $this->uri->segment('4');
		$config['upload_path']          = './assets/template/data-img/upload/' . $id_prod;
		$config['allowed_types']        = 'jpg|png|jpeg';
		$config['file_name']            = $id;
		$config['overwrite']            = true;
		$config['max_size']             = 100024;
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;

		$this->load->library('upload', $config);

		if (!is_dir('assets/template/data-img/upload/' . $id_prod)) {
			mkdir('./assets/template/data-img/upload/' . $id_prod, 0777, TRUE);
			if (!$this->upload->do_upload('file')) {
				return $this->upload->data("file_name");
			} else {
				return $this->upload->data("file_name");
			}
		} else {
			if (!$this->upload->do_upload('file')) {
				return $this->upload->data("file_name");
			} else {
				return $this->upload->data("file_name");
			}
		}
	}

	public function upload()
	{
		$id = base_convert(microtime(false), 18, 36);
		$id_prod = $this->uri->segment('4');
		$data = array(
			'id_image' => $id,
			'product' => $id_prod,
			'path' => $id_prod,
			'image' => $this->upload_images($id),
		);

		$where = array(
			'prod_id' => $id_prod
		);

		$product = $this->model->show_data('product', null, null, $where);

		foreach ($product->result() as $pr) {
			$this->model->history('Your upload a image for product ' . $pr->prod_nama, $this->session->userdata('id_user'));
		}

		$this->model->save('product_image', $data);
		// redirect(base_url() . 'user/product/image/' . $id_prod);
	}

	public function delete_image()
	{
		$id = $this->uri->segment('4');
		$id_prod = $this->uri->segment('5');
		$where = array(
			'id_image' => $id
		);

		$result = $this->model->show_data('product_image', null, null, $where);

		foreach ($result->result() as $image) {
			unlink('./assets/template/data-img/upload/' . $image->path . '/' . $image->image);
			$this->model->history('Your delete a image ' . $image->image, $this->session->userdata('id_user'));
		}

		$this->model->delete($where, 'product_image');
		redirect(base_url() . 'admin/product/image/' . $id_prod);
	}

	public function image()
	{
		$id = $this->uri->segment('4');
		$where = array(
			'product' => $id
		);
		$data = array(
			'title' => "Upload Image",
			'image' => $this->model->show_data('product_image', null, null, $where),
		);
		$this->load->view('admin/data/upload', $data);
	}
	// End Image

}
