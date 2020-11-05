<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peserta extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        isLogin();
    }

    function list() {
        $data['kegiatan'] = $this->M_kegiatan->getAll_kegiatan()->result();
        $this->load->view('_partials/header');
        $this->load->view('_partials/sidebar');
        $this->load->view('v_list_peserta', $data);
        $this->load->view('_partials/footer');
    }

    public function detail_peserta($id)
    {
        $cekId = $this->M_kegiatan->getKegiatan_byId($id);
        // print_r($cekId);
        // die();
        if ($cekId != null) {
            $data['kegiatan'] = $this->M_kegiatan->getKegiatan_byId($id);
            $data['peserta'] = $this->M_peserta->get_peserta($id)->result();
            $data['form'] = $this->M_page_absensi->getFormIsActive($id);
            $dataCount = $this->M_page_absensi->countFormActvie($id)->result_array();

            $data['count'] = array_count_values($dataCount[0])[1];

            // print_r($dataCount);
            // die();

            $this->load->view('_partials/header');
            $this->load->view('_partials/sidebar');
            $this->load->view('v_detail_peserta', $data);
            $this->load->view('_partials/footer');
        } else {
            echo '<h1>404 Page Not Found</h1>';
        }

    }

    public function formEditPeserta()
    {
        if ($this->input->is_ajax_request()) {
            $id = $this->input->post('idPeserta');
            $oldData = $this->M_peserta->get_peserta_byId($id)->row();
            $msg = ['success' => true, 'oldData' => $oldData];
            echo json_encode($msg);
        } else {
            exit('Maaf tidak dapat diproses');
        }
    }

    public function update()
    {
        if ($this->input->is_ajax_request()) {
            $id = $this->input->post('idPeserta');
            $idKegiatan = $this->input->post('idKegiatan');
            $formActive = $this->M_page_absensi->getFormIsActive($idKegiatan);

            // if ($formActive[0]['nama'] == 1) {
            $this->form_validation->set_rules('nama', 'nama', 'required', array('required' => 'Form %s harus disi'));
            // }

            $response = array();
            if ($this->form_validation->run() == false) {
                $response['error_nama'] = form_error('nama');
                $response['class'] = 'is-invalid';
                $msg = ['error' => $response];
                echo json_encode($msg);
            } else {
                $data['nama'] = $this->input->post('nama') == 'undefined' ? null : $this->input->post('nama');
                $data['email'] = $this->input->post('email') == 'undefined' ? null : $this->input->post('email');
                $data['nip'] = $this->input->post('nip') == 'undefined' ? null : $this->input->post('nip');
                $data['npwp'] = $this->input->post('npwp') == 'undefined' ? null : $this->input->post('npwp');
                $data['jabatan'] = $this->input->post('jabatan') == 'undefined' ? null : $this->input->post('jabatan');
                $data['instansi'] = $this->input->post('instansi') == 'undefined' ? null : $this->input->post('instansi');
                $data['unit_kerja'] = $this->input->post('unit_kerja') == 'undefined' ? null : $this->input->post('unit_kerja');
                $data['alamat_unit_kerja'] = $this->input->post('alamat_unit_kerja') == 'undefined' ? null : $this->input->post('alamat_unit_kerja');
                $data['pangkat'] = $this->input->post('pangkat') == 'undefined' ? null : $this->input->post('pangkat');
                $data['tempat_lahir'] = $this->input->post('tempat_lahir') == 'undefined' ? null : $this->input->post('tempat_lahir');
                $data['tanggal_lahir'] = $this->input->post('tanggal_lahir');
                $data['alamat_rumah'] = $this->input->post('alamat_rumah') == 'undefined' ? null : $this->input->post('alamat_rumah');
                $data['telepon_instansi'] = $this->input->post('telepon_instansi') == 'undefined' ? null : $this->input->post('telepon_instansi');
                $data['fax_instansi'] = $this->input->post('fax_instansi') == 'undefined' ? null : $this->input->post('fax_instansi');
                $data['nomor_hp'] = $this->input->post('nomor_hp') == 'undefined' ? null : $this->input->post('nomor_hp');
                $data['norek'] = $this->input->post('norek') == 'undefined' ? null : $this->input->post('norek');
                $data['bank'] = $this->input->post('bank') == 'undefined' ? null : $this->input->post('bank');
                $data['cabang_bank'] = $this->input->post('cabang_bank') == 'undefined' ? null : $this->input->post('cabang_bank');
                $data['nama_rek'] = $this->input->post('nama_rek') == 'undefined' ? null : $this->input->post('nama_rek');
                $where = array('id' => $id);

                $this->M_peserta->update_data($where, $data, 'peserta');

                $msg = ['success' => 'Berhasil mengubah data peserta', 'data' => $data['nama'], 'idKegiatan' => $idKegiatan];
                echo json_encode($msg);
            }

        } else {
            exit('Maaf tidak dapat diproses');
        }
    }

    public function hapus()
    {
        if ($this->input->is_ajax_request()) {
            $idPeserta = $this->input->post('idPeserta');
            $idKegiatan = $this->input->post('idKegiatan');

            $data = $this->M_peserta->get_peserta_byId($idPeserta)->row();
            // $msg = ['idPeserta' => $data];

            // Hapus file img tanda tangan
            if ($data->tanda_tangan != null) {
                unlink(FCPATH . $data->tanda_tangan);
            }

            //Hapus file upload
            if ($data->upload_file != null) {
                unlink(FCPATH . 'assets/fileUpload/' . $data->upload_file);
            }

            $where = array('id' => $idPeserta);
            $this->M_peserta->hapus_data($where, 'peserta');
            $msg = ['success' => 'Berhasil menghapus data peserta', 'idKegiatan' => $idKegiatan];
            echo json_encode($msg);
        } else {
            exit('Maaf tidak dapat diproses');
        }
    }
}
