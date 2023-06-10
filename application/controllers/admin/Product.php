<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
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
		$data['title'] = 'List Product';
		$data['product'] = $this->model_pembayaran->get('product')->result();
		$this->load->view('layout/admin/header', $data);
		$this->load->view('admin/product/view', $data);
		$this->load->view('layout/admin/footer');
	}

	public function add()
	{
		$data['title'] = 'Add Product';
		$this->load->view('layout/admin/header', $data);
		$this->load->view('admin/product/add', $data);
		$this->load->view('layout/admin/footer');
	}

	public function insert()
	{
		$nama_brg 	= $this->input->post('nama_brg');
		$keterangan = $this->input->post('keterangan');
		$kategori 	= $this->input->post('kategori');
		$harga 		= $this->input->post('harga');
		$stok 		= $this->input->post('stok');
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
			'nama_brg' 	=> $nama_brg,
			'keterangan' 	=> $keterangan,
			'kategori' 	=> $kategori,
			'harga' 	=> $harga,
			'stok' 	=> $stok,
			'gambar' 	=> $gambar
		);

		$this->model_pembayaran->insert($data, 'product');
		$_SESSION["sukses"] = 'Product berhasil di tambahkan';
		redirect('admin/product');
	}

	public function update($id)
	{
		$where = array('id_brg' => $id);
		$data['title'] = 'Update Product';
		$data['product'] = $this->db->query("SELECT * FROM product WHERE id_brg = '$id'")->result();
		$this->load->view('layout/admin/header', $data);
		$this->load->view('admin/product/update', $data);
		$this->load->view('layout/admin/footer');
	}

	public function insert_update()
	{
		$id				= $this->input->post('id_brg');
		$nama_brg 		= $this->input->post('nama_brg');
		$keterangan 	= $this->input->post('keterangan');
		$kategori 		= $this->input->post('kategori');
		$harga 			= $this->input->post('harga');
		$stok 			= $this->input->post('stok');

		$data = array(
			'nama_brg' 		=> $nama_brg,
			'keterangan' 	=> $keterangan,
			'kategori' 		=> $kategori,
			'harga' 		=> $harga,
			'stok' 			=> $stok
		);

		$where = array(
			'id_brg' => $id
		);

		$this->model_pembayaran->update('product', $data, $where);
		redirect('admin/product');
	}

	public function delete($id)
	{
		$where = array('id_brg' => $id);
		$this->model_pembayaran->delete($where, 'product');
		redirect('admin/product');
	}
}
