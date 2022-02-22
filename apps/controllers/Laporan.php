<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_admin');
    }
    public function index()
    {
        $this->load->library('Mypdf');
        $this->mypdf->generate('Laporan/dompdf');
    }
}
