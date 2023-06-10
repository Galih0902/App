<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
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
		$data['title'] = 'Dashboard Admin';
		$data['bill'] = $this->db->query("SELECT * FROM transaction
        WHERE status='0' ORDER BY order_id DESC LIMIT 4")->result();
		$data['count'] = $this->model_pembayaran->count_order();
		$data['pending'] = $this->model_pembayaran->count_pending();
		$data['sukses'] = $this->model_pembayaran->count_success();
		$this->load->view('layout/admin/header', $data);
		$this->load->view('admin/dashboard/dashboard', $data);
		$this->load->view('layout/admin/footer');
	}
}
