<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function getDataSegmen()
    {
        $this->db->from('tb_artikel');
        
        $query = $this->db->get();

        return $query->num_rows();
    }

    function getDataMisuh()
    {
        $this->db->from('tb_artikel');
        $this->db->where('id_segmen', '1');
        
        $query = $this->db->get();

        return $query->num_rows();
    }

    function getDataKeluhkasih()
    {
        $this->db->from('tb_artikel');
        $this->db->where('id_segmen', '2');
        
        $query = $this->db->get();

        return $query->num_rows();
    }

    function getDataCatatansipil()
    {
        $this->db->from('tb_artikel');
        $this->db->where('id_segmen', '3');
        
        $query = $this->db->get();

        return $query->num_rows();
    }

    function getDataUlasan()
    {
        $this->db->from('tb_artikel');
        $this->db->where('id_segmen', '4');
        
        $query = $this->db->get();

        return $query->num_rows();
    }
}