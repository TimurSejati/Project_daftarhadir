<?php

class M_Kegiatan extends CI_Model
{
  public function getAll_kegiatan()
  {
    return $this->db->get('kegiatan');
  }

  public function getKegiatan_byId($id)
  {
    return $this->db->get_where('kegiatan', array('id' => $id))->result_array();
  }

  public function input_data($data, $table)
  {
    $this->db->insert($table, $data);
    $idKegiatan = $this->db->insert_id();
    return $idKegiatan;
  }

  public function input_data_form($data, $table)
  {
    $this->db->insert($table, $data);
  }

  public function edit_data($where, $table)
  {
    return $this->db->get_where($table, $where);
  }

  public function update_data($whereForm, $data, $table)
  {
    $this->db->where($whereForm);
    $this->db->update($table, $data);
  }

  public function update_data_form($where, $data, $table)
  {
    $this->db->where($where);
    $this->db->update($table, $data);
  }

  public function hapus_data($where, $table)
  {
    $this->db->where($where);
    $this->db->delete($table);
  }
}
