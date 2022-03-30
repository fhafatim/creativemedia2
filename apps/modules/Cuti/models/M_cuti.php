<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_cuti extends CI_Model
{
    var $table = 'cuti';


    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    function get_data()
    {
        $sql = "SELECT * FROM cuti";
        $data = $this->db->query($sql);
        return $data->result();
    }

    public function get_kode()
    {
        $kode = "SIC";
        $query = "SELECT max(no_surat) as kode_auto FROM cuti";
        $data = $this->db->query($query)->row_array();
        $max_kode = $data['kode_auto'];
        $max_kode2 = (int)substr($max_kode, 4);
        $kodecount = $max_kode2 + 1;
        $kode_auto = $kode . "-" . sprintf('%04s', $kodecount);
        return $kode_auto;
    }

    function simpan_data($data)
    {
        $result = $this->db->insert('cuti', $data);
        return $result;
    }
}
