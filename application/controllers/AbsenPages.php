<?php

class AbsenPages extends CI_Controller
{
    public function index($slug)
    {
        $page = $this->M_page_absensi->getPageById($slug);
        $data['pages'] = $page;
        // $data['pages'] = $page;
        // $dataFormId = $page[0]['form_id'];
        $idKegiatan = $page[0]['id'];
        $data['form'] = $this->M_page_absensi->getFormIsActive($idKegiatan);

        if ($data['pages']) {
            $this->load->view('v_absen_pages', $data);
        } else {
            $this->load->view('v_404');
        }
    }

    public function absensi()
    {

        $config['upload_path'] = './assets/fileUpload';
        $config['allowed_types'] = 'pdf|docx';
        $config['max_size'] = '2048';
        $this->load->library('upload', $config);

        $idKegiatan = $this->input->post('id_kegiatan');
        $data = $this->M_page_absensi->getFormIsActive($idKegiatan);

        if ($data[0]['nama'] == 1) {
            $this->form_validation->set_rules('nama', 'nama', 'required', array('required' => 'Form %s harus disi'));
        }

        if ($data[0]['email'] == 1) {
            $this->form_validation->set_rules('email', 'email', 'required', array('required' => 'Form %s harus disi'));
        }

        if ($data[0]['nip'] == 1) {
            $this->form_validation->set_rules('nip', 'nip', 'required|integer|min_length[1]|max_length[18]', array(
                'required' => 'Form %s harus disi',
                'integer' => 'Nip harus berupa angka',
                'min_length' => 'Masukan NIP anda dengan benar',
                'max_length' => 'Masukan NIP anda dengan benar',
            ));
        }

        if ($data[0]['npwp'] == 1) {
            $this->form_validation->set_rules('npwp', 'npwp', 'required|integer|min_length[17]|max_length[17]', array(
                'required' => 'Form %s harus di isi',
                'integer' => 'NPWP harus berupa angka',
                'min_length' => 'Masukan NPWP anda dengan benar',
                'max_length' => 'Masukan NPWP anda dengan benar',
            ));
        }

        if ($data[0]['jabatan'] == 1) {
            $this->form_validation->set_rules('jabatan', 'jabatan', 'required', array('required' => 'Form %s harus disi'));
        }

        if ($data[0]['instansi'] == 1) {
            $this->form_validation->set_rules('instansi', 'instansi', 'required', array('required' => 'Form %s harus disi'));
        }

        if ($data[0]['unit_kerja'] == 1) {
            $this->form_validation->set_rules('unit_kerja', 'unit kerja', 'required', array('required' => 'Form %s harus disi'));
        }

        if ($data[0]['alamat_unit_kerja'] == 1) {
            $this->form_validation->set_rules('alamat_unit_kerja', 'alamat unit kerja', 'required', array('required' => 'Form %s harus disi'));
        }

        if ($data[0]['pangkat'] == 1) {
            $this->form_validation->set_rules('pangkat', 'pangkat', 'required', array('required' => 'Form %s harus disi'));
        }

        if ($data[0]['tmpt_lahir'] == 1) {
            $this->form_validation->set_rules('tempat_lahir', 'tempat lahir', 'required', array('required' => 'Form %s harus disi'));
        }

        if ($data[0]['tgl_lahir'] == 1) {
            $this->form_validation->set_rules('tanggal_lahir', 'tanggal lahir', 'required', array('required' => 'Form %s harus disi'));
        }

        if ($data[0]['alamat_rumah'] == 1) {
            $this->form_validation->set_rules('alamat_rumah', 'alamat rumah', 'required', array('required' => 'Form %s harus disi'));
        }

        if ($data[0]['tlp_instansi'] == 1) {
            $this->form_validation->set_rules('telepon_instansi', 'telepon instansi', 'required|integer|min_length[13]|max_length[13]', array(
                'required' => 'Form %s harus di isi',
                'integer' => 'Nomor telepon harus berupa angka',
                'min_length' => 'Masukan nomor telepon anda dengan benar',
                'max_length' => 'Masukan nomor telepon anda dengan benar',
            ));
        }

        if ($data[0]['fax'] == 1) {
            $this->form_validation->set_rules('fax_instansi', 'fax instansi', 'required|integer|min_length[13]|max_length[13]', array(
                'required' => 'Form %s harus di isi',
                'integer' => 'Fax instansi telepon harus berupa angka',
                'min_length' => 'Masukan fax instansi anda dengan benar',
                'max_length' => 'Masukan fax instansi anda dengan benar',
            ));
        }

        if ($data[0]['no_hp'] == 1) {
            $this->form_validation->set_rules('nomor_hp', 'nomor hp', 'required|integer|min_length[13]|max_length[13]', array(
                'required' => 'Form %s harus di isi',
                'integer' => 'Nomor handphone harus berupa angka',
                'min_length' => 'Masukan nomor handphone anda dengan benar',
                'max_length' => 'Masukan nomor handphone anda dengan benar',
            ));
        }

        if ($data[0]['no_rekening'] == 1) {
            $this->form_validation->set_rules('norek', 'no rekening', 'required|integer|min_length[20]|max_length[20]', array(
                'required' => 'Form %s harus di isi',
                'integer' => 'No rekening harus berupa angka',
                'min_length' => 'Masukan no rekening anda dengan benar',
                'max_length' => 'Masukan no rekening anda dengan benar',
            ));
        }

        if ($data[0]['bank'] == 1) {
            $this->form_validation->set_rules('bank', 'bank', 'required', array('required' => 'Form %s harus disi'));
        }

        if ($data[0]['cabang_bank'] == 1) {
            $this->form_validation->set_rules('cabang_bank', 'cabang', 'required', array('required' => 'Form %s harus disi'));
        }

        if ($data[0]['nama_rekening'] == 1) {
            $this->form_validation->set_rules('nama_rek', 'nama rekening', 'required', array('required' => 'Form %s harus disi'));
        }

        if ($data[0]['upload_file'] == 1) {
            if (!$this->upload->do_upload('upload')) {
                $this->form_validation->set_rules('upload', 'upload', 'required|cekRequired', array('required' => 'Form %s harus dalam bentuk format pdf/docx', 'cekRequired' => 'Form %s harus di isi'));
                // $error = $this->upload->display_errors();
            } else {
                // $this->upload->do_upload('upload');
                $dataupload = $this->upload->data();
                $result['upload_file'] = $dataupload['file_name'];
            }
        }

        $response = array();
        if ($this->form_validation->run() == false) {
            $response['status'] = 'error';
            $response['nama_error'] = form_error('nama');
            $response['email_error'] = form_error('email');
            $response['nip_error'] = form_error('nip');
            $response['npwp_error'] = form_error('npwp');
            $response['jabatan_error'] = form_error('jabatan');
            $response['instansi_error'] = form_error('instansi');
            $response['unit_kerja_error'] = form_error('unit_kerja');
            $response['alamat_unit_kerja_error'] = form_error('alamat_unit_kerja');
            $response['pangkat_error'] = form_error('pangkat');
            $response['tempat_lahir_error'] = form_error('tempat_lahir');
            $response['tanggal_lahir_error'] = form_error('tanggal_lahir');
            $response['alamat_rumah_error'] = form_error('alamat_rumah');
            $response['telepon_instansi_error'] = form_error('telepon_instansi');
            $response['fax_instansi_error'] = form_error('fax_instansi');
            $response['nomor_hp_error'] = form_error('nomor_hp');
            $response['norek_error'] = form_error('norek');
            $response['bank_error'] = form_error('bank');
            $response['cabang_error'] = form_error('cabang_bank');
            $response['nama_rek_error'] = form_error('nama_rek');
            $response['file_error'] = form_error('upload');
            $response['class'] = 'is-invalid';
            echo json_encode($response);
        } else {
            $result['kegiatan_id'] = $this->input->post('id_kegiatan');
            $result['nama'] = $this->input->post('nama') == 'undefined' ? null : $this->input->post('nama');
            $result['email'] = $this->input->post('email') == 'undefined' ? null : $this->input->post('email');
            $result['nip'] = $this->input->post('nip') == 'undefined' ? null : $this->input->post('nip');
            $result['npwp'] = $this->input->post('npwp') == 'undefined' ? null : $this->input->post('npwp');
            $result['jabatan'] = $this->input->post('jabatan') == 'undefined' ? null : $this->input->post('jabatan');
            $result['instansi'] = $this->input->post('instansi') == 'undefined' ? null : $this->input->post('instansi');
            $result['unit_kerja'] = $this->input->post('unit_kerja') == 'undefined' ? null : $this->input->post('unit_kerja');
            $result['alamat_unit_kerja'] = $this->input->post('alamat_unit_kerja') == 'undefined' ? null : $this->input->post('alamat_unit_kerja');
            $result['pangkat'] = $this->input->post('pangkat') == 'undefined' ? null : $this->input->post('pangkat');
            $result['tempat_lahir'] = $this->input->post('tempat_lahir') == 'undefined' ? null : $this->input->post('tempat_lahir');
            $result['tanggal_lahir'] = $this->input->post('tanggal_lahir');
            $result['alamat_rumah'] = $this->input->post('alamat_rumah') == 'undefined' ? null : $this->input->post('alamat_rumah');
            $result['telepon_instansi'] = $this->input->post('telepon_instansi') == 'undefined' ? null : $this->input->post('telepon_instansi');
            $result['fax_instansi'] = $this->input->post('fax_instansi') == 'undefined' ? null : $this->input->post('fax_instansi');
            $result['nomor_hp'] = $this->input->post('nomor_hp') == 'undefined' ? null : $this->input->post('nomor_hp');
            $result['norek'] = $this->input->post('norek') == 'undefined' ? null : $this->input->post('norek');
            $result['bank'] = $this->input->post('bank') == 'undefined' ? null : $this->input->post('bank');
            $result['cabang_bank'] = $this->input->post('cabang_bank') == 'undefined' ? null : $this->input->post('cabang_bank');
            $result['nama_rek'] = $this->input->post('nama_rek') == 'undefined' ? null : $this->input->post('nama_rek');

            $imagedata = base64_decode($_POST['img_data']);
            $filename = md5(date("dmYhisA"));
            //Location to where you want to created sign image
            $file_name = './assets/images/' . $filename . '.png';
            file_put_contents($file_name, $imagedata);
            $filenameReplace = str_replace("./", "", $file_name);
            $result['tanda_tangan'] = $filenameReplace;

            $addKehadiran = $this->M_absen->input_data($result, 'peserta');
            $response['status'] = 'success';
            $response['redirect'] = site_url('AbsenPages/success_absen');
            echo json_encode($response);
        }
    }

    public function success_absen()
    {
        $this->load->view('v_success_absen_page');
    }
}
