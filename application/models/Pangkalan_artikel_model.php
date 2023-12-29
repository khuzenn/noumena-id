<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pangkalan_artikel_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function getDataArtikel()
    {
        $this->db->select('tb_pangkalan_artikel.*, tb_segmen.segmen');
        $this->db->from('tb_pangkalan_artikel');
        $this->db->join('tb_segmen', 'tb_pangkalan_artikel.id_segmen = tb_segmen.id_segmen');
        $this->db->where('tb_pangkalan_artikel.id_segmen = tb_segmen.id_segmen');
        $this->db->order_by('id', 'DESC');
        
        $query = $this->db->get();

        return $query->result();
    }

    function getArtikel($id)
    {
        $this->db->select("*");
        $this->db->from('tb_pangkalan_artikel');
        $this->db->where('id', $id);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return FALSE;
        }
    }
    function getFoto($id)
    {
        $this->db->select("*");
        $this->db->from('tb_pangkalan_artikel');
        $this->db->where('id', $id);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return FALSE;
        }
    }

    function getDetailArtikel($id)
    {
        $this->db->select('tb_pangkalan_artikel.*, tb_segmen.segmen');
        $this->db->join('tb_segmen', 'tb_pangkalan_artikel.id_segmen = tb_segmen.id_segmen');
        $this->db->where('id', $id);
        $this->db->from('tb_pangkalan_artikel');
        $query = $this->db->get();

        return $query->row();
    }

    function deleteArtikel($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->delete('tb_pangkalan_artikel');

        return $query;
    }
}