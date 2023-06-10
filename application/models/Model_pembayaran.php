<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_pembayaran extends CI_Model
{

	public function cek_login()
	{
		$email 		= set_value('email');
		$password 	= set_value('password');

		$result 	= $this->db->where('email', $email)
			->where('password', md5($password))
			->limit(1)
			->get('user');
		if ($result->num_rows() > 0) {
			return $result->row();
		} else {
			return FALSE;
		}
	}

	public function get($table)
	{
		return $this->db->get($table);
	}

	public function insert($data, $table)
	{
		$this->db->insert($table, $data);
	}

	public function update($table, $data, $where)
	{
		$this->db->update($table, $data, $where);
	}

	public function delete($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function find($id)
	{
		$result = $this->db->where('id_brg', $id)
			->limit(1)
			->get('product');
		if ($result->num_rows() > 0) {
			return $result->row();
		} else {
			return array();
		}
	}

	public function count_order()
	{
		$sql = "SELECT count(order_id) as order_id FROM transaction";
		$result = $this->db->query($sql);

		return $result->row()->order_id;
	}

	public function count_pending()
	{
		$sql = "SELECT count(order_id) as order_id FROM transaction WHERE status='0'";
		$result = $this->db->query($sql);

		return $result->row()->order_id;
	}

	public function count_success()
	{
		$sql = "SELECT count(order_id) as order_id FROM transaction WHERE status='1'";
		$result = $this->db->query($sql);

		return $result->row()->order_id;
	}
}
