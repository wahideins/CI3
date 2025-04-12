<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_model extends CI_Model {

    public function get_laporan($tahun) {
        $this->db->select("m.nama, m.kategori, 
            SUM(CASE WHEN MONTH(p.tanggal) = 1 THEN d.total ELSE 0 END) AS Jan,
            SUM(CASE WHEN MONTH(p.tanggal) = 2 THEN d.total ELSE 0 END) AS Feb,
            SUM(CASE WHEN MONTH(p.tanggal) = 3 THEN d.total ELSE 0 END) AS Mar,
            SUM(CASE WHEN MONTH(p.tanggal) = 4 THEN d.total ELSE 0 END) AS Apr,
            SUM(CASE WHEN MONTH(p.tanggal) = 5 THEN d.total ELSE 0 END) AS Mei,
            SUM(CASE WHEN MONTH(p.tanggal) = 6 THEN d.total ELSE 0 END) AS Jun,
            SUM(CASE WHEN MONTH(p.tanggal) = 7 THEN d.total ELSE 0 END) AS Jul,
            SUM(CASE WHEN MONTH(p.tanggal) = 8 THEN d.total ELSE 0 END) AS Ags,
            SUM(CASE WHEN MONTH(p.tanggal) = 9 THEN d.total ELSE 0 END) AS Sep,
            SUM(CASE WHEN MONTH(p.tanggal) = 10 THEN d.total ELSE 0 END) AS Okt,
            SUM(CASE WHEN MONTH(p.tanggal) = 11 THEN d.total ELSE 0 END) AS Nov,
            SUM(CASE WHEN MONTH(p.tanggal) = 12 THEN d.total ELSE 0 END) AS Des,
            SUM(d.total) AS Total
        ");
        $this->db->from('t_pesanan_detail d');
        $this->db->join('t_pesanan p', 'd.t_pesanan_id = p.id', 'left');
        $this->db->join('m_menu m', 'd.m_menu_id = m.id', 'left');
        $this->db->where('YEAR(p.tanggal)', $tahun);
        $this->db->group_by('m.nama, m.kategori');
        $this->db->order_by('m.kategori');
        return $this->db->get()->result();
    }
}
