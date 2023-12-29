<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Laman_kerja_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function getAllSegmen()
    {
        $this->db->from('tb_segmen');
        $query = $this->db->get();

        return $query->result();
    }

    function addArtikel($data)
    {
        return $this->db->insert('tb_artikel', $data);
    }
}