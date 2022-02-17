<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cuti extends AUTH_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_admin');
        $this->load->model('M_sidebar');
    }

    public function loadkonten($page, $data)
    {

        $data['userdata']     = $this->userdata;
        $ajax = ($this->input->post('status_link') == "ajax" ? true : false);
        if (!$ajax) {
            $this->load->view('Dashboard/layouts/header', $data);
        }
        $this->load->view($page, $data);
        if (!$ajax) $this->load->view('Dashboard/layouts/footer', $data);
    }

    public function index()
    {
        $data['userdata']     = $this->userdata;
        $data['page']         = "Data Cuti";
        $data['judul']         = "Data Cuti";

        $this->loadkonten('cuti', $data);
    }
}
