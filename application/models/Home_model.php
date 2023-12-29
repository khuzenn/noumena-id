<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function getArtikel($limit)
    {
        $this->db->select('tb_artikel.*, tb_segmen.segmen');
        $this->db->from('tb_artikel');
        $this->db->join('tb_segmen', 'tb_artikel.id_segmen = tb_segmen.id_segmen');
        $this->db->where('tb_artikel.id_segmen = tb_segmen.id_segmen');
        $this->db->order_by('id_artikel','DESC');
        $this->db->limit($limit);

        $offset = 2;
        $this->db->limit($limit, $offset);

        $query = $this->db->get();

        return $query->result();

        if (!empty($result)) {
            $card_artikel = $result[0];
            // Potong isi artikel menjadi 50 kata pertama
            $card_artikel->isi = $this->limitWords($card_artikel->isi, 50);
        }
    
        return $result;
    }

    function getMoreArtikel($limit, $offset)
    {
        $this->db->select('tb_artikel.*, tb_segmen.segmen');
        $this->db->from('tb_artikel');
        $this->db->join('tb_segmen', 'tb_artikel.id_segmen = tb_segmen.id_segmen');
        $this->db->where('tb_artikel.id_segmen = tb_segmen.id_segmen'); // Tambahkan kondisi WHERE
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

    function countAllArtikel()
    {
        $this->db->select('COUNT(*) as total');
        $this->db->from('tb_artikel');
        $this->db->join('tb_segmen', 'tb_artikel.id_segmen = tb_segmen.id_segmen');
        // $this->db->where('tb_segmen.segmen', 'Ulasan');
        $query = $this->db->get();
        $result = $query->row();

        return $result->total;
    }

    function getArtikelPopuler()
    {
        $this->db->select('tb_artikel.*, tb_segmen.segmen');
        $this->db->from('tb_artikel');
        $this->db->join('tb_segmen', 'tb_artikel.id_segmen = tb_segmen.id_segmen');
        $this->db->where('tb_artikel.id_segmen = tb_segmen.id_segmen');
        $this->db->order_by('RAND()');
        $this->db->limit(1);
        $query = $this->db->get();

        return $query->result();

        if (!empty($result)) {
            $artikel = $result[0];
            // Potong isi artikel menjadi 50 kata pertama
            $artikel->isi = $this->limitWords($artikel->isi, 50);
        }
    
        return $result;
    }

    public function limitWords($string, $word_limit)
    {
        $words = explode(" ", $string);
        if (count($words) > $word_limit) {
            $words = array_splice($words, 0, $word_limit);
            $string = implode(" ", $words) . '...';
        } else {
            $string = implode(" ", $words);
        }
        return $string;
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

    function getArtikelKeluhKasih()
    {
        $this->db->select('tb_artikel.*, tb_segmen.segmen');
        $this->db->from('tb_artikel');
        $this->db->join('tb_segmen', 'tb_artikel.id_segmen = tb_segmen.id_segmen');
        $this->db->where('tb_segmen.segmen', 'Keluh Kasih'); // Tambahkan kondisi WHERE
        $this->db->order_by('id_artikel', 'DESC');
        $this->db->limit(6);
        $query = $this->db->get();

        return $query->result();
    }

    function getDataSlideshow(){
        $this->db->select('tb_artikel.*, tb_segmen.segmen');
        $this->db->from('tb_artikel');
        $this->db->join('tb_segmen', 'tb_artikel.id_segmen = tb_segmen.id_segmen');
        $this->db->where('tb_artikel.id_segmen = tb_segmen.id_segmen'); // Tambahkan kondisi WHERE
        $this->db->order_by('id_artikel', 'DESC');
        $this->db->limit(3);
        $query = $this->db->get();

        return $query->result();
    }
}
