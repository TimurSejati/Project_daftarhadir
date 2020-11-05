<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cetak extends CI_Controller
{

    public function cetakPDF($id)
    {
        $mpdf = new \Mpdf\Mpdf();
        $data['kegiatan'] = $this->M_kegiatan->getKegiatan_byId($id);

        $data['peserta'] = $this->M_peserta->get_peserta($id)->result();
        $data['form'] = $this->M_page_absensi->getFormIsActive($id);
        $view = $this->load->view('cetakPDF', $data, true);
        $mpdf->WriteHTML($view);
        $mpdf->Output('Laporan Daftar Hadir Kegiatan (' . $data['kegiatan'][0]['nama_kegiatan'] . ').pdf', 'I');
        // $this->load->library('dompdf_gen');

        // $paperSize = 'A4';
        // $orientation = 'landscape';
        // $html =  $this->output->get_output();
        // $this->dompdf->set_paper($paperSize, $orientation);
        // $this->dompdf->load_html($html);
        // $this->dompdf->render();
        // $this->dompdf->stream('Laporan.pdf', array('Attachment' => 0));
        // $this->load->library('pdf');
        // $this->pdf->set_option('isRemoteEnabled', TRUE);
        // $this->pdf->setPaper('A4', 'landscape');
        // $this->pdf->filename = "Laporan-Dompdf-Codeigniter.pdf";
        // $this->pdf->load_view('cetakPDF', $data);
    }
}
