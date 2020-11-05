<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kegiatan extends CI_Controller
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
        $this->load->view('v_kegiatan', $data);
        $this->load->view('_partials/footer');
    }

    public function tambah_kegiatan()
    {
        if (isset($_POST['tambah'])) {
            $this->form_validation->set_rules('judul', 'judul', 'required', array('required' => 'Form %s harus di isi'));
            $this->form_validation->set_rules('narasumber', 'narasumber', 'required', array('required' => ' Form %s harus di isi'));
            $this->form_validation->set_rules('tanggal', 'tanggal', 'required', array('required' => 'Form %s harus di isi'));
            if ($this->form_validation->run() == false) {
                $data['kegiatan'] = $this->M_kegiatan->getAll_kegiatan()->result();
                $this->load->view('_partials/header');
                $this->load->view('_partials/sidebar');
                $this->load->view('v_kegiatan', $data);
                $this->load->view('_partials/footer');
            } else {
                $data['judul'] = $this->input->post('judul');
                $data['narasumber'] = $this->input->post('narasumber');
                $tanggal = $this->input->post('tanggal');
                $data['tanggal'] = date('Y-m-d', strtotime($tanggal));

                $data['slug'] = $this->input->post('slug');
                $check_page = $this->M_page_absensi->check_page($data);

                $dataForm['nama'] = $this->input->post('nama') == null ? '0' : $this->input->post('nama');
                $dataForm['email'] = $this->input->post('email') == null ? '0' : $this->input->post('email');
                $dataForm['nip'] = $this->input->post('nip') == null ? '0' : $this->input->post('nip');
                $dataForm['npwp'] = $this->input->post('npwp') == null ? '0' : $this->input->post('npwp');

                $dataForm['jabatan'] = $this->input->post('jabatan') == null ? '0' : $this->input->post('jabatan');
                $dataForm['instansi'] = $this->input->post('instansi') == null ? '0' : $this->input->post('instansi');
                $dataForm['unit_kerja'] = $this->input->post('unit_kerja') == null ? '0' : $this->input->post('unit_kerja');
                $dataForm['alamat_unit_kerja'] = $this->input->post('alamat_unit_kerja') == null ? '0' : $this->input->post('alamat_unit_kerja');

                $dataForm['pangkat'] = $this->input->post('pangkat') == null ? '0' : $this->input->post('pangkat');
                $dataForm['tmpt_lahir'] = $this->input->post('tmpt_lahir') == null ? '0' : $this->input->post('tmpt_lahir');
                $dataForm['tgl_lahir'] = $this->input->post('tgl_lahir') == null ? '0' : $this->input->post('tgl_lahir');
                $dataForm['alamat_rumah'] = $this->input->post('alamat_rumah') == null ? '0' : $this->input->post('alamat_rumah');

                $dataForm['tlp_instansi'] = $this->input->post('tlp_instansi') == null ? '0' : $this->input->post('tlp_instansi');
                $dataForm['fax'] = $this->input->post('fax') == null ? '0' : $this->input->post('fax');
                $dataForm['no_hp'] = $this->input->post('no_hp') == null ? '0' : $this->input->post('no_hp');
                $dataForm['bank'] = $this->input->post('bank') == null ? '0' : $this->input->post('bank');

                $dataForm['cabang_bank'] = $this->input->post('cabang_bank') == null ? '0' : $this->input->post('cabang_bank');
                $dataForm['no_rekening'] = $this->input->post('no_rekening') == null ? '0' : $this->input->post('no_rekening');
                $dataForm['nama_rekening'] = $this->input->post('nama_rekening') == null ? '0' : $this->input->post('nama_rekening');
                $dataForm['upload_file'] = $this->input->post('upload_file') == null ? '0' : $this->input->post('upload_file');

                if ($check_page->num_rows() > 0) {
                    echo 'Page sudah tersedia';
                } else {
                    // $dataFormId = $this->M_kegiatan->input_data_form($dataForm, 'form');
                    // $data['form_id'] = $dataFormId;
                    $add_page = $this->M_kegiatan->input_data($data, 'kegiatan');
                    $dataForm['kegiatan_id'] = $add_page;
                    $this->M_kegiatan->input_data_form($dataForm, 'form');

                    if ($add_page) {
                        // $this->save_route();
                        $this->session->set_flashdata('message', 'Kegiatan baru berhasil ditambahkan');
                        redirect('kegiatan/list');
                    } else {
                        $this->session->set_flashdata('message', 'Error');
                        redirect('kegiatan/list');
                    }
                }
            }
        }
    }

    private function seoURL($text)
    {
        $text = strtolower(htmlentities($text));
        $text = str_replace(' ', '-', $text);

        return $text;
    }

    // private function save_route()
    // {
    //   $routes = $this->m_page_absensi->get_all_routes();
    //   $data = array();
    //   if (!empty($routes)) {
    //     $data[] = '<?php ';
    //     foreach ($routes as $route) {
    //       $data[] = '$route[\'' . $route['slug'] . '\'] = \'' . 'absenpages' . '/' . 'index/' . $route['id'] . '\';';
    //     }
    //     $output = implode("\n", $data);
    //     write_file(APPPATH . 'cache/routes.php', $output);
    //   }
    // }

    public function form_ubah_kegiatan($id)
    {
        $where = array('id' => $id);
        $data['kegiatan'] = $this->M_kegiatan->edit_data($where, 'kegiatan')->result();
        $this->load->view('_partials/header');
        $this->load->view('_partials/sidebar');
        $this->load->view('v_kegiatan_ubah', $data);
        $this->load->view('_partials/footer');
    }

    public function update_kegiatan()
    {
        $this->form_validation->set_rules('judul', 'judul', 'required', array('required' => 'Form %s harus di isi'));
        $this->form_validation->set_rules('slug', 'slug', 'required', array('required' => 'Form %s harus di isi'));
        $this->form_validation->set_rules('narasumber', 'narasumber', 'required', array('required' => ' Form %s harus di isi'));
        $this->form_validation->set_rules('tanggal', 'tanggal', 'required', array('required' => 'Form %s harus di isi'));
        if ($this->form_validation->run() == false) {
            $data['kegiatan'] = $this->M_kegiatan->getAll_kegiatan()->result();
            $this->load->view('_partials/header');
            $this->load->view('_partials/sidebar');
            $this->load->view('v_kegiatan', $data);
            $this->load->view('_partials/footer');
        } else {
            $id = $this->input->post('id');
            $judul = $this->input->post('judul');
            $slug = $this->input->post('slug');
            $narasumber = $this->input->post('narasumber');
            $tanggal = $this->input->post('tanggal');
            $ubahTanggal = date('Y-m-d', strtotime($tanggal));
            if ($publish = $this->input->post('publish') == null) {
                $valuePublish = 0;
            } else {
                $valuePublish = 1;
            }

            $data = array(
                'judul' => $judul,
                'slug' => $slug,
                'narasumber' => $narasumber,
                'tanggal' => $ubahTanggal,
                'status_page' => $valuePublish,
            );

            if ($nama = $this->input->post('nama') == null) {
                $valueNama = 0;
            } else {
                $valueNama = 1;
            }

            if ($email = $this->input->post('email') == null) {
                $valueEmail = 0;
            } else {
                $valueEmail = 1;
            }

            if ($nip = $this->input->post('nip') == null) {
                $valueNip = 0;
            } else {
                $valueNip = 1;
            }

            if ($npwp = $this->input->post('npwp') == null) {
                $valueNPWP = 0;
            } else {
                $valueNPWP = 1;
            }

            if ($jabatan = $this->input->post('jabatan') == null) {
                $valueJabatan = 0;
            } else {
                $valueJabatan = 1;
            }

            if ($instansi = $this->input->post('instansi') == null) {
                $valueInstansi = 0;
            } else {
                $valueInstansi = 1;
            }

            if ($unit_kerja = $this->input->post('unit_kerja') == null) {
                $valueUnitKerja = 0;
            } else {
                $valueUnitKerja = 1;
            }

            if ($alamat_unit_kerja = $this->input->post('alamat_unit_kerja') == null) {
                $valueAlamatUnitKerja = 0;
            } else {
                $valueAlamatUnitKerja = 1;
            }

            if ($pangkat = $this->input->post('pangkat') == null) {
                $valuePangkat = 0;
            } else {
                $valuePangkat = 1;
            }

            if ($tmpt_lahir = $this->input->post('tmpt_lahir') == null) {
                $valueTempatLahir = 0;
            } else {
                $valueTempatLahir = 1;
            }

            if ($tgl_lahir = $this->input->post('tgl_lahir') == null) {
                $valueTanggalLahir = 0;
            } else {
                $valueTanggalLahir = 1;
            }

            if ($alamat_rumah = $this->input->post('alamat_rumah') == null) {
                $valueAlamatRumah = 0;
            } else {
                $valueAlamatRumah = 1;
            }

            if ($tlp_instansi = $this->input->post('tlp_instansi') == null) {
                $valueTelponInstansi = 0;
            } else {
                $valueTelponInstansi = 1;
            }

            if ($fax = $this->input->post('fax') == null) {
                $valueFax = 0;
            } else {
                $valueFax = 1;
            }

            if ($no_hp = $this->input->post('no_hp') == null) {
                $valuNoHP = 0;
            } else {
                $valuNoHP = 1;
            }

            if ($bank = $this->input->post('bank') == null) {
                $valuBank = 0;
            } else {
                $valuBank = 1;
            }

            if ($cabang_bank = $this->input->post('cabang_bank') == null) {
                $valueCabangBank = 0;
            } else {
                $valueCabangBank = 1;
            }

            if ($no_rekening = $this->input->post('no_rekening') == null) {
                $valueNoRekening = 0;
            } else {
                $valueNoRekening = 1;
            }

            if ($nama_rekening = $this->input->post('nama_rekening') == null) {
                $valueNamaRekening = 0;
            } else {
                $valueNamaRekening = 1;
            }

            if ($upload_file = $this->input->post('upload_file') == null) {
                $valueUploadFile = 0;
            } else {
                $valueUploadFile = 1;
            }

            $dataForm = array(
                'nama' => $valueNama,
                'email' => $valueEmail,
                'nip' => $valueNip,
                'npwp' => $valueNPWP,
                'jabatan' => $valueJabatan,
                'instansi' => $valueInstansi,
                'unit_kerja' => $valueUnitKerja,
                'alamat_unit_kerja' => $valueAlamatUnitKerja,
                'pangkat' => $valuePangkat,
                'tmpt_lahir' => $valueTempatLahir,
                'tgl_lahir' => $valueTanggalLahir,
                'alamat_rumah' => $valueAlamatRumah,
                'tlp_instansi' => $valueTelponInstansi,
                'fax' => $valueFax,
                'no_hp' => $valuNoHP,
                'bank' => $valuBank,
                'cabang_bank' => $valueCabangBank,
                'no_rekening' => $valueNoRekening,
                'nama_rekening' => $valueNamaRekening,
                'upload_file' => $valueUploadFile,
            );

            $where = array('id' => $id);
            $whereForm = array('kegiatan_id' => $id);
            $this->M_kegiatan->update_data($where, $data, 'kegiatan');
            $this->M_kegiatan->update_data_form($whereForm, $dataForm, 'form');
            $this->session->set_flashdata('message', 'Data Kegiatan Berhasil Diubah');
            redirect('kegiatan/list');
        }
    }

    public function hapus_kegiatan($id)
    {
        $where = array('id' => $id);
        $dataFile = $this->M_peserta->get_peserta($id)->result_array();
        // Hapus file img tanda tangan
        foreach ($dataFile as $row) {
            unlink(FCPATH . $row['tanda_tangan']);
        }

        // Hapus file upload
        foreach ($dataFile as $row) {
            unlink(FCPATH . 'assets/fileUpload/' . $row['upload_file']);
        }

        $this->M_kegiatan->hapus_data($where, 'kegiatan');
        $this->session->set_flashdata('message', 'Kegiatan berhasil dihapus');
        redirect('kegiatan/list');
    }
}
