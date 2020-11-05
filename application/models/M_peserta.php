<?php

class M_Peserta extends CI_Model
{
    public function getAll_peserta()
    {
        return $this->db->get('peserta');
    }

    // Get peserta by kategori id
    public function get_peserta($id)
    {
        return $this->db->get_where('peserta', array('kegiatan_id' => $id));
    }

    public function get_peserta_byId($idPeserta)
    {
        return $this->db->get_where('peserta', array('id' => $idPeserta));
    }

    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function update_data($whereForm, $data, $table)
    {
        $this->db->where($whereForm);
        $this->db->update($table, $data);
    }

}
