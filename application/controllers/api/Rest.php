<?php

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . '/libraries/Format.php';

use Restserver\Libraries\REST_Controller;

class Rest extends REST_Controller
{
	public function index_get()
	{
		$uri = $this->uri->segment('3');
		$id = $this->get('id');

		switch ($uri) {
			case "product":
				$this->Product();
				break;
			case "product_detail":
				$this->detail_prod($id);
				break;
			case "slider":
				$this->slider();
				break;
			case "more":
				$this->more($id);
				break;
		}
	}

	function product()
	{
		$where = array(
			'status' => '1',
		);
		$product = $this->model_api->get_all('product', $where);
		if ($product->num_rows() > 0) {
			foreach ($product->result() as $pr) {
				$data[] = array(
					'id' => $pr->prod_id,
					'nama' => $pr->prod_nama,
					'price' => $pr->prod_price,
					'thumb_img' => base_url() . 'assets/template/data-img/thumb-img/' . $pr->thumb_image,
				);
			}
			$result = $data;
		} else {
			$result = $product->result_array();
		}

		if ($result) {
			$this->response([
				'status' => TRUE,
				'data' => $result
			], REST_Controller::HTTP_OK);
		} else {
			$this->response([
				'status' => FALSE,
				'message' => 'data not found'
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}

	function detail_prod($id)
	{
		$where = array(
			'prod_id' => $id
		);

		$image = array(
			'product' => $id
		);

		$base = base_url() . 'assets/template/data-img/';

		$image = $this->model_api->get_all('product_image', $image);
		$product = $this->model_api->get_all('product', $where);

		if ($product->num_rows() > 0) {

			foreach ($product->result() as $pr) {
				$where = array(
					'sel_id' => $pr->seller
				);
				$seller = $this->model_api->get_all('seller', $where);

				$dsc = array(
					'id_diskon' => $pr->discount
				);

				$diskon = $this->model_api->get_all('diskon', $dsc);

				foreach ($seller->result() as $sl) {
					$sell[] = array(
						'name' => $sl->sel_firstname . ' ' . $sl->sel_lastname,
						'shop' => $sl->sell_shopname,
						'notes' => $sl->notes,
						'province' => $sl->province,
						'city' => $sl->city,
						'number_wa' => $sl->code_country . $sl->number_wa,
						'avatar' => base_url() . 'assets/template/data-img/user/' . $sl->sell_image,
					);
				}
			}


			$data[] = array(
				'base' => $base,
				'seller' => $sell,
				'product' => $product->result_array(),
				'discount' => $diskon->result_array(),
				'image' => $image->result_array()
			);
			$result = $data;
		} else {
			$result = $product;
		}

		if ($product) {
			$this->response([
				'status' => TRUE,
				'data' => $result,
			], REST_Controller::HTTP_OK);
		} else {
			$this->response([
				'status' => FALSE,
				'message' => 'data not found'
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}

	function slider()
	{
		$where = array(
			'slider' => '1'
		);
		$product = $this->model_api->get_all('product', $where);
		if ($product->num_rows() > 0) {
			foreach ($product->result() as $pr) {
				$data[] = array(
					'id' => $pr->prod_id,
					'nama' => $pr->prod_nama,
					'price' => $pr->prod_price,
					'thumb_img' => base_url() . 'assets/template/data-img/thumb-img/' . $pr->thumb_image,
				);
			}
			$result = $data;
		} else {
			$result = $product->result_array();
		}

		if ($result) {
			$this->response([
				'status' => TRUE,
				'data' => $result
			], REST_Controller::HTTP_OK);
		} else {
			$this->response([
				'status' => FALSE,
				'message' => 'data not found'
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}

	function more($id)
	{
		$where = array(
			'seller' => $id,
			'status' => '1'
		);
		$product = $this->model_api->get_all('product', $where);
		if ($product->num_rows() > 0) {
			foreach ($product->result() as $pr) {
				$data[] = array(
					'id' => $pr->prod_id,
					'nama' => $pr->prod_nama,
					'price' => $pr->prod_price,
					'thumb_img' => base_url() . 'assets/template/data-img/thumb-img/' . $pr->thumb_image,
				);
			}
			$result = $data;
		} else {
			$result = $product->result_array();
		}

		if ($result) {
			$this->response([
				'status' => TRUE,
				'data' => $result
			], REST_Controller::HTTP_OK);
		} else {
			$this->response([
				'status' => FALSE,
				'message' => 'data not found'
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}
}
