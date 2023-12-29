<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function getAdmindata($nama)
    {
        $this->db->from('user');
        $this->db->where('nama', $nama);

        $query = $this->db->get();

        return $query->row_array();
    }

    function addAkun($data)
    {
        return $this->db->insert('user', $data);
    }
}