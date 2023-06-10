<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bill extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('level') != '2') {
			redirect('welcome');
		}
	}

	public function index()
	{
		$data['title'] = 'Billing History';
		$id = $this->session->userdata('id_user');
		$data['bill'] = $this->db->query("SELECT * FROM transaction 
			WHERE transaction.id_user='$id' AND status='0'")->result();
		$this->load->view('layout/user/header', $data);
		$this->load->view('bill', $data);
		$this->load->view('layout/user/footer');
	}

	public function detail($id_invoice)
	{
		$data['title'] = 'Detail Checkout';
		$data['invoice'] = $this->model_invoice->get_id_invoice($id_invoice);
		$data['pesanan'] = $this->model_invoice->get_id_pesanan($id_invoice);
		$this->load->view('layout/user/header', $data);
		$this->load->view('invoice', $data);
		$this->load->view('layout/user/footer');
	}

	public function upload()
	{
		$id			= $this->input->post('order_id');
		$gambar		= $_FILES['gambar']['name'];
		if ($gambar = '') {
		} else {
			$config['upload_path'] = './uploads';
			$config['allowed_types'] = 'jpg|jpeg|png';

			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('gambar')) {
				echo "File tidak dapat di upload!";
			} else {
				$gambar = $this->upload->data('file_name');
			}
		}

		$data = array(
			'gambar' 			=> $gambar
		);

		$where = array(
			'order_id' => $id
		);

		$this->model_pembayaran->update('transaction', $data, $where);
		$_SESSION["sukses"] = 'Bukti transfer berhasil di upload';
		redirect('bill');
	}
}
