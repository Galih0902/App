<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Publisher extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('level') != '0') {
            redirect('welcome');
        }
    }

    public function index()
    {
        $data['title'] = 'Dashboard Publisher';
        $id = $this->session->userdata('id_user');
        $data['user'] = $this->db->query("SELECT * FROM user 
			WHERE id_user='$id'")->result();
        $this->load->view('layout/publisher/header', $data);
        $this->load->view('publisher', $data);
        $this->load->view('layout/publisher/footer');
    }

    public function activation($id)
    {
        $this->db->update('user', ['level' => '2'], ['id_user' => $id]);
        $this->session->sess_destroy();
        redirect('welcome');
    }
}
