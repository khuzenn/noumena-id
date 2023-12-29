<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Keluh_kasih_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function getArtikelKeluhKasih($limit)
    {
        $this->db->select('tb_artikel.*, tb_segmen.segmen');
        $this->db->from('tb_artikel');
        $this->db->join('tb_segmen', 'tb_artikel.id_segmen = tb_segmen.id_segmen');
        $this->db->where('tb_segmen.segmen', 'Keluh Kasih'); // Tambahkan kondisi WHERE
        $this->db->order_by('id_artikel', 'DESC');
        $this->db->limit($limit);
        $query = $this->db->get();

        return $query->result();

        if (!empty($result)) {
            $artikel = $result[0];
            // Potong isi artikel menjadi 50 kata pertama
            $artikel->isi = $this->limitWords($artikel->isi, 50);
        }
    
        return $result;
    }

    function getMoreArtikelKeluhKasih($limit, $offset)
    {
        $this->db->select('tb_artikel.*, tb_segmen.segmen');
        $this->db->from('tb_artikel');
        $this->db->join('tb_segmen', 'tb_artikel.id_segmen = tb_segmen.id_segmen');
        $this->db->where('tb_segmen.segmen', 'Keluh Kasih'); // Tambahkan kondisi WHERE
        $this->db->order_by('id_artikel', 'DESC');
        $this->db->limit($limit, $offset);
        $query = $this->db->get();

        return $query->result();

        if (!empty($result)) {
            $artikel = $result[0];
            // Potong isi artikel menjadi 50 kata pertama
            $artikel->isi = $this->limitWords($artikel->isi, 50);
        }
    
        return $result;
    }

    function getDetailArtikel($id_artikel)
    {
        $this->db->select('tb_artikel.*, tb_segmen.segmen');
        $this->db->join('tb_segmen', 'tb_artikel.id_segmen = tb_segmen.id_segmen');
        $this->db->where('id_artikel', $id_artikel);
        $this->db->from('tb_artikel');
        $query = $this->db->get();

        return $query->row();
    }
}