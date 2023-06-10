<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
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
        $data['title'] = 'My Profile';
        $id = $this->session->userdata('id_user');
        $data['profile'] = $this->db->query("SELECT * FROM user 
			WHERE user.id_user='$id'")->result();

        $data['bill'] = $this->db->query("SELECT * FROM transaction 
        WHERE transaction.id_user='$id' AND status='0' LIMIT 3")->result();

        $this->load->view('layout/user/header', $data);
        $this->load->view('profile', $data);
        $this->load->view('layout/user/footer');
    }

    public function update()
    {
        $id             = $this->input->post('id_user');
        $nama_user      = $this->input->post('nama_user');
        $email          = $this->input->post('email');
        $address        = $this->input->post('address');

        $data = array(
            'nama_user'         => $nama_user,
            'email'             => $email,
            'address'           => $address
        );

        $where = array(
            'id_user' => $id
        );

        $this->model_pembayaran->update('user', $data, $where);
        $this->session->sess_destroy();
        redirect('welcome');
    }
}
