<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Invoice extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('level') != '1') {
			redirect('welcome');
		}
	}

	public function index()
	{
		$data['title'] = 'Invoice';
		$data['invoice'] = $this->model_invoice->get();
		$this->load->view('layout/admin/header', $data);
		$this->load->view('admin/payment/invoice', $data);
		$this->load->view('layout/admin/footer');
	}

	public function detail($id_invoice)
	{
		$data['title'] = 'Detail Checkout';
		$data['invoice'] = $this->model_invoice->get_id_invoice($id_invoice);
		$data['pesanan'] = $this->model_invoice->get_id_pesanan($id_invoice);
		$this->load->view('layout/admin/header', $data);
		$this->load->view('admin/payment/detail_invoice', $data);
		$this->load->view('layout/admin/footer');
	}

	public function confirm($id)
	{
		$this->db->update('transaction', ['status' => '1'], ['order_id' => $id]);
		$_SESSION["sukses"] = 'Pesanan berhasil di konfirmasi';
		redirect('admin/invoice');
	}

	public function pdf($id_invoice)
	{
		$data['title'] = 'PDF Report';
		$data['invoice'] = $this->model_invoice->get_id_invoice($id_invoice);
		$data['pesanan'] = $this->model_invoice->get_id_pesanan($id_invoice);
		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "Invoice Bill.pdf";
		$this->pdf->load_view('admin/payment/pdf', $data);
	}
}
