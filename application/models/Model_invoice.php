<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_invoice extends CI_Model
{
	public function index()
	{
		date_default_timezone_set('Asia/Jakarta');
		$order_id = $this->input->post('order_id');
		$id_user = $this->input->post('id_user');
		$name = $this->input->post('name');
		$alamat = $this->input->post('alamat');
		$city = $this->input->post('kota');
		$kode_pos = $this->input->post('kode_pos');
		$payment_method = $this->input->post('payment_method');
		$ekspedisi = $this->input->post('ekspedisi');
		$mobile_phone = $this->input->post('mobile_phone');
		$tracking_id = $this->input->post('tracking_id');
		$email = $this->input->post('email');
		$status = $this->input->post('status');

		$invoice = array (
			'order_id' 			=> $order_id,
			'id_user' 			=> $id_user,
			'name' 				=> $name,
			'alamat' 			=> $alamat,
			'city' 				=> $city,
			'kode_pos' 			=> $kode_pos,
			'payment_method' 	=> $payment_method,
			'ekspedisi' 		=> $ekspedisi,
			'mobile_phone' 		=> $mobile_phone,
			'tracking_id' 		=> $tracking_id,
			'email' 			=> $email,
			'status' 			=> $status,
			'transaction_time' 	=> date('Y-m-d H:i:s'),
			'payment_limit' 	=> date('Y-m-d H:i:s', mktime( date('H'), date('i'), date('s'), date('m'), date('d') + 1, date('Y'))),
		);

		$this->db->insert('transaction', $invoice);
		$id_invoice = $this->db->insert_id();

		foreach ($this->cart->contents() as $item) {
			$data = array (
				'id_invoice' 	=> $order_id,
				'id_user' 		=> $id_user,
				'id_brg' 		=> $item['id'],
				'nama_brg' 		=> $item['name'],
				'jumlah' 		=> $item['qty'],
				'harga' 		=> $item['price'],
			);

			$this->db->insert('cart', $data);

		}

		return TRUE;

	}

	public function get()
	{
		$result = $this->db->get('transaction');
		if($result->num_rows() > 0){
			return $result->result();
		} else {
			return false;
		}
	}

	public function get_id_invoice($id_invoice)
	{
		$result = $this->db->where('order_id', $id_invoice)->limit(1)->get('transaction');
		if ($result->num_rows() > 0){
			return $result->row();
		} else {
			return false;
		}
	}

	public function get_id_pesanan($id_invoice)
	{
		$result = $this->db->where('id_invoice', $id_invoice)->get('cart');
		if ($result->num_rows() > 0){
			return $result->result();
		} else {
			return false;
		}
	}
}
