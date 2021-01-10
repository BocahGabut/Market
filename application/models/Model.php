<?php

class Model extends CI_Model
{
	public function show_data($table, $field = null, $order = null, $where = null, $limit = null)
	{
		if ($where) {

			$this->db->where($where);
		}

		if ($order) {
			$this->db->order_by($field, $order);
		}

		if ($limit) {
			$this->db->limit($limit);
		}

		return $this->db->get($table);
	}

	public function delete($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function data_like($where, $table)
	{
		$this->db->like($where);
		return $this->db->get($table);
	}

	public function update($table, $where, $data)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	function save($table, $data)
	{
		$this->db->insert($table, $data);
	}

	public function join($table, $field, $data, $where = null, $order = null)
	{

		if ($where) {
			$this->db->where($where);
		}

		if ($order) {
			$this->db->order_by($order);
		}

		$this->db->join($field, $data);
		return $this->db->get($table);
	}

	public function double_join($table, $field, $field1, $data, $data1, $where = null, $order = null, $limit = null)
	{

		if ($where) {
			$this->db->where($where);
		}

		if ($order) {
			$this->db->order_by($order);
		}

		if ($limit) {
			$this->db->limit($limit);
		}

		$this->db->join($field, $data);
		$this->db->join($field1, $data1);
		return $this->db->get($table);
	}

	public function count_data($field, $table)
	{
		$this->db->select_sum($field);
		return $this->db->get($table);
	}

	public function history($history)
	{
		date_default_timezone_set("Asia/Bangkok");
		$skrng = strtotime("now");
		$id = base_convert(microtime(false), 18, 36);
		$data = array(
			'id_history' => $id,
			'history' => $history,
			'seller' => $this->session->userdata('id_user'),
			'date' => $skrng
		);
		$this->db->insert('history', $data);
	}
}


//Diskon code 
// $tgl = date("Y-m-d");
// foreach ($diskon->result() as $dc) {
// 	if ($tgl >= $dc->start && $tgl <= $dc->end && $dc->status === '0') {
// 	} else {
// 		$get_product = $this->model->show_data('product');
// 		foreach ($get_product->result() as $gt) {
// 		}
// 	}
// }
