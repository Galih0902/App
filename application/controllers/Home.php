<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function index()
	{
		$data['title'] = 'Shoppify Home';
		$data['product'] = $this->model_pembayaran->get('product')->result();
		$this->load->view('layout/home/header', $data);
		$this->load->view('home', $data);
		$this->load->view('layout/home/footer');
	}

	 public function detail_product($id)
    {
        $where = array('id_brg' => $id);
        $data['detail'] = $this->db->query("SELECT * FROM product WHERE id_brg='$id'")->result();
        $data['title'] = "Detail Product";
        $this->load->view('layout/home/header', $data);
		$this->load->view('info_product', $data);
		$this->load->view('layout/home/footer');
    }
}
