<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">

        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <section class="content">

    <div class="swal" data-swal="<?=$this->session->flashdata('message')?>"></div>
    <div class="card">
      <!-- /.card-header -->
      <div class="card-body">
        <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#modalTambahKegiatan"><i class="fas fa-plus"></i> Tambah Kegiatan</button>
        <?php if (validation_errors()) {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <strong>' . validation_errors() . '
        </div>';
}?>
        <div class="row">
          <div class="col-sm-12">

            <table id="tableKegiatan" class="table table-bordered dataTable dtr-inline" role="grid" aria-describedby="example1_info">
              <thead>
                <tr role="row">
                  <th>No</th>
                  <th>Nama Kegiatan</th>
                  <th>Slug</th>
                  <th style="width: 120px;">Daftar Absensi</th>
                  <th>Narasumber</th>
                  <th>Tanggal</th>
                  <th>Status</th>
                  <th style="text-align:center;width: 130px;">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
$no = 1;
foreach ($kegiatan as $row):
?>
                  <?php
$this->db->from('form')->where('kegiatan_id', $row->id);
$dataForm = $this->db->get()->result_array();
?>
                  <tr>
                    <td><?php echo $no++ ?></td>

                    <td><?php echo $row->judul ?></td>
                    <td><a href="<?php echo base_url() . $row->slug ?>"><?php echo base_url() . $row->slug ?></a></td>
                    <td> <a href="<?=site_url('peserta/detail_peserta/' . $row->id)?>" class="btn btn-info btn-sm"> <i class="fas fa-eye"></i> Lihat Peserta</a></td>
                    <td><?php echo $row->narasumber ?></td>
                    <td><?php echo date('d-m-Y', strtotime($row->tanggal)) ?></td>
                    <td>
                      <?php if ($row->status_page == 1) {
    echo '<div class="badge badge-success btn-sm text-white">Dibuka</div>';
} else {
    echo '<div class="badge badge-danger btn-sm text-white">Ditutup</div>';
}?>

                    </td>
                    <td>
                      <!-- <button class="btn btn-info btn-sm" onclick="Swal.fire()"> <i class="fas fa-eye"></i> Detail</button> -->
                      <button class="btn btn-warning btn-sm text-white" data-toggle="modal" data-target="#modalUbahKegiatan" data-id="<?=$row->id?>" data-judul="<?=$row->judul?>" data-slug="<?=$row->slug?>" data-narasumber="<?=$row->narasumber?>" data-tanggal="<?=$row->tanggal?>" data-publish="<?=$row->status_page?>" data-nama="<?=$dataForm[0]['nama']?>" data-email="<?=$dataForm[0]['email']?>" data-nip="<?=$dataForm[0]['nip']?>" data-npwp="<?=$dataForm[0]['npwp']?>" data-jabatan="<?=$dataForm[0]['jabatan']?>" data-instansi="<?=$dataForm[0]['instansi']?>" data-unit_kerja="<?=$dataForm[0]['unit_kerja']?>" data-alamat_unit_kerja="<?=$dataForm[0]['alamat_unit_kerja']?>" data-pangkat="<?=$dataForm[0]['pangkat']?>" data-tmpt_lahir="<?=$dataForm[0]['tmpt_lahir']?>" data-tgl_lahir="<?=$dataForm[0]['tgl_lahir']?>" data-alamat_rumah="<?=$dataForm[0]['alamat_rumah']?>" data-tlp_instansi="<?=$dataForm[0]['tlp_instansi']?>" data-fax="<?=$dataForm[0]['fax']?>" data-no_hp="<?=$dataForm[0]['no_hp']?>" data-bank="<?=$dataForm[0]['bank']?>"  data-cabang_bank="<?=$dataForm[0]['cabang_bank']?>" data-no_rekening="<?=$dataForm[0]['no_rekening']?>" data-nama_rekening="<?=$dataForm[0]['nama_rekening']?>" data-upload_file="<?=$dataForm[0]['upload_file']?>" id="btn-edit"><i class="fas fa-edit"></i> Ubah</button>
                      <!-- <?php echo anchor('kegiatan/form_ubah_kegiatan/' . $row->id, '<div class="btn btn-warning btn-sm text-white"> <i class="fas fa-edit"></i> Ubah</div>') ?> -->
                      <a href="<?=site_url('kegiatan/hapus_kegiatan/' . $row->id)?>" class="btn btn-danger btn-sm btn-hapus"><i class="fas fa-trash"></i> Hapus</a>
                    </td>
                  </tr>
                <?php endforeach;?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- /.card-body -->
</div>
</section>


<!-- Modal Tambah Acara -->
<div class="modal fade" id="modalTambahKegiatan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Kegiatan Acara</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" autocomplete="off" action="<?php echo site_url('kegiatan/tambah_kegiatan') ?>">
          <div class="form-group">
            <label for="nama_kegiatan">Judul</label>
            <input type="text" name="judul" class="form-control" id="nama_kegiatan">
          </div>
          <div class="form-group">
            <label for="nama_kegiatan">Slug</label>
            <input type="text" name="slug" class="form-control" id="nama_kegiatan">
          </div>
          <div class="form-group">
            <label for="nama_kegiatan">Narasumber</label>
            <input type="text" name="narasumber" class="form-control" id="nama_kegiatan">
          </div>
          <div class="form-group">
            <label for="nama_kegiatan">Tanggal Kegiatan Acara</label>
            <div class="input-group date" id="tglKegiatan" data-target-input="nearest">
              <input type="text" name="tanggal" class="form-control datetimepicker-input" data-target="#tglKegiatan" data-toggle="datetimepicker">
              <div class="input-group-append" data-target="#tglKegiatan" data-toggle="datetimepicker">
                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label>Form Active <small>(Ceklist untuk menggunakan form pada daftar hadir)</small></label>
            <div class="row mt-4">
              <div class="col-3">
                <div class="form-group">
                  <input type="checkbox" id="tnama" name="nama" value="1">
                  <label for="tnama">Nama</label>
                </div>
                <div class="form-group">
                  <input type="checkbox" id="tjabatan" name="jabatan" class="mr-1" value="1">
                  <label for="tjabatan">Jabatan </label>
                </div>
                <div class="form-group">
                  <input type="checkbox" id="tpangkat" name="pangkat" class="mr-1" value="1">
                  <label for="tpangkat">Pangkat </label>
                </div>
                <div class="form-group">
                  <input type="checkbox" id="ttlp_instansi" name="tlp_instansi" class="mr-1" value="1">
                  <label for="ttlp_instansi">Telpon Instansi </label>
                </div>
                <div class="form-group">
                  <input type="checkbox" id="tcabang_bank" name="cabang_bank" class="mr-1" value="1">
                  <label for="tcabang_bank">Cabang Bank</label>
                </div>
              </div>

              <div class="col-3">
                <div class="form-group">
                  <input type="checkbox" id="temail" name="email" class="mr-1" value="1">
                  <label for="temail">Email</label>
                </div>
                <div class="form-group">
                  <input type="checkbox" id="tinstansi" name="instansi" class="mr-1" value="1">
                  <label for="tinstansi">Instansi</label>
                </div>
                <div class="form-group">
                  <input type="checkbox" id="ttmpt_lahir" name="tmpt_lahir" class="mr-1" value="1">
                  <label for="ttmpt_lahir">Tempat Lahir</label>
                </div>
                <div class="form-group">
                  <input type="checkbox" id="tfax" name="fax" class="mr-1" value="1">
                  <label for="tfax">FAX Instansi</label>
                </div>
                <div class="form-group">
                  <input type="checkbox" id="tno_rekening" name="no_rekening" class="mr-1" value="1">
                  <label for="tno_rekening">Nomor Rekening</label>
                </div>
              </div>

              <div class="col-3">
                <div class="form-group">
                  <input type="checkbox" id="tnip" name="nip" class="mr-1" value="1">
                  <label for="tnip">NIP</label>
                </div>
                <div class="form-group">
                  <input type="checkbox" id="tunit_kerja" name="unit_kerja" class="mr-1" value="1">
                  <label for="tunit_kerja">Unit Kerja</label>
                </div>
                <div class="form-group">
                  <input type="checkbox" id="ttgl_lahir" name="tgl_lahir" class="mr-1" value="1">
                  <label for="ttgl_lahir">Tanggal Lahir</label>
                </div>
                <div class="form-group">
                  <input type="checkbox" id="tno_hp" name="no_hp" class="mr-1" value="1">
                  <label for="tno_hp">Nomor Handphone</label>
                </div>
                <div class="form-group">
                  <input type="checkbox" id="tnama_rekening" name="nama_rekening" class="mr-1" value="1">
                  <label for="tnama_rekening">Nama Rekening</label>
                </div>
              </div>

              <div class="col-3">
                <div class="form-group">
                  <input type="checkbox" id="tnpwp" name="npwp" class="mr-1" value="1">
                  <label for="tnpwp">NPWP</label>
                </div>
                <div class="form-group">
                  <input type="checkbox" id="talamat_unit_kerja" name="alamat_unit_kerja" class="mr-1" value="1">
                  <label for="talamat_unit_kerja">Alamat Unit Kerja</label>
                </div>
                <div class="form-group">
                  <input type="checkbox" id="talamat_rumah" name="alamat_rumah" class="mr-1" value="1">
                  <label for="talamat_rumah">Alamat Rumah</label>
                </div>
                <div class="form-group">
                  <input type="checkbox" id="tbank" name="bank" class="mr-1" value="1">
                  <label for="tbank">Bank</label>
                </div>
                <div class="form-group">
                  <input type="checkbox" id="tupload_file" name="upload_file" class="mr-1" value="1">
                  <label for="tupload_file">Upload File</label>
                </div>
              </div>
            </div>
          </div>

          <div class="mt-4 float-right">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" name="tambah" class="btn btn-primary">Buat Absensi</button>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal Ubah Kegiatan -->
<div class="modal fade" id="modalUbahKegiatan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ubah Kegiatan Acara</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo site_url('kegiatan/update_kegiatan') ?>">
          <input type="hidden" name="id" id="id-kegiatan">
          <div class="form-group">
            <label for="judul">Judul</label>
            <input type="text" name="judul" class="form-control" id="judul">
          </div>
          <div class=" form-group">
            <label for="nama_kegiatan">Ubah Link Kegiatan</label>
            <input type="text" name="slug" class="form-control" id="slug">
          </div>

          <div class="form-group">
            <label for="narasumber">Narasumber</label>
            <input type="text" name="narasumber" class="form-control" id="narasumber">
          </div>

          <div class="form-group">
            <label for="nama_kegiatan">Tanggal Kegiatan Acara</label>
            <div class="input-group date" id="tglKegiatanUbah" data-target-input="nearest">
              <input type="text" name="tanggal" class="form-control datetimepicker-input" data-target="#tglKegiatanUbah" data-toggle="datetimepicker" id="tanggal">
              <div class="input-group-append" data-target="#tglKegiatanUbah" data-toggle="datetimepicker">
                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
              </div>
            </div>
          </div>


          <div class="form-group">
            <label for="">Status</label>
            <div class="custom-control custom-checkbox mr-sm-2">
              <input type="checkbox" class="custom-control-input" name="publish" type="checkbox" id="publish">
              <label class="custom-control-label" for="publish">Dibuka</label>
            </div>
          </div>

          <div class="form-group">
            <label>Form Active <small>(Ceklist untuk menggunakan form pada daftar hadir)</small></label>
            <div class="row mt-1">
              <div class="col-3">
                <div class="form-group">
                  <input type="checkbox" name="nama" id="nama" value="1">
                  <label for="nama">Nama</label>
                </div>
                <div class="form-group">
                  <input type="checkbox" id="jabatan" name="jabatan" class="mr-1" value="1">
                  <label for="jabatan">Jabatan </label>
                </div>
                <div class="form-group">
                  <input type="checkbox" id="pangkat" name="pangkat" class="mr-1" value="1">
                  <label for="pangkat">Pangkat </label>
                </div>
                <div class="form-group">
                  <input type="checkbox" id="tlp_instansi" name="tlp_instansi" class="mr-1" value="1">
                  <label for="tlp_instansi">Telpon Instansi </label>
                </div>
                <div class="form-group">
                  <input type="checkbox" id="cabang_bank" name="cabang_bank" class="mr-1" value="1">
                  <label for="cabang_bank">Cabang Bank</label>
                </div>
              </div>

              <div class="col-3">
                <div class="form-group">
                  <input type="checkbox" id="email" name="email" class="mr-1" value="1">
                  <label for="email">Email</label>
                </div>
                <div class="form-group">
                  <input type="checkbox" id="instansi" name="instansi" class="mr-1" value="1">
                  <label for="instansi">Instansi</label>
                </div>
                <div class="form-group">
                  <input type="checkbox" id="tmpt_lahir" name="tmpt_lahir" class="mr-1" value="1">
                  <label for="tmpt_lahir">Tempat Lahir</label>
                </div>
                <div class="form-group">
                  <input type="checkbox" id="fax" name="fax" class="mr-1" value="1" >
                  <label for="fax">FAX Instansi</label>
                </div>
                <div class="form-group">
                  <input type="checkbox" id="no_rekening" name="no_rekening" class="mr-1" value="1">
                  <label for="no_rekening">Nomor Rekening</label>
                </div>
              </div>

              <div class="col-3">
                <div class="form-group">
                  <input type="checkbox" id="nip" name="nip" class="mr-1" value="1">
                  <label for="nip">NIP</label>
                </div>
                <div class="form-group">
                  <input type="checkbox" id="unit_kerja" name="unit_kerja" class="mr-1" value="1">
                  <label for="unit_kerja">Unit Kerja</label>
                </div>
                <div class="form-group">
                  <input type="checkbox" id="tgl_lahir" name="tgl_lahir" class="mr-1" value="1">
                  <label for="tgl_lahir">Tanggal Lahir</label>
                </div>
                <div class="form-group">
                  <input type="checkbox" id="no_hp" name="no_hp" class="mr-1" value="1">
                  <label for="no_hp">Nomor Handphone</label>
                </div>
                <div class="form-group">
                  <input type="checkbox" id="nama_rekening" name="nama_rekening" class="mr-1" value="1">
                  <label for="nama_rekening">Nama Rekening</label>
                </div>
              </div>

              <div class="col-3">
                <div class="form-group">
                  <input type="checkbox" id="npwp" name="npwp" class="mr-1" value="1">
                  <label for="npwp">NPWP</label>
                </div>
                <div class="form-group">
                  <input type="checkbox" id="alamat_unit_kerja" name="alamat_unit_kerja" class="mr-1" value="1">
                  <label for="alamat_unit_kerja">Alamat Unit Kerja</label>
                </div>
                <div class="form-group">
                  <input type="checkbox" id="alamat_rumah" name="alamat_rumah" class="mr-1" value="1">
                  <label for="alamat_rumah">Alamat Rumah</label>
                </div>
                <div class="form-group">
                  <input type="checkbox" id="bank" name="bank" class="mr-1" value="1">
                  <label for="bank">Bank</label>
                </div>
                <div class="form-group">
                  <input type="checkbox" id="upload_file" name="upload_file" class="mr-1" value="1">
                  <label for="upload_file">Upload File</label>
                </div>
              </div>
            </div>
          </div>

          <div class="mt-4 float-right">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Ubah</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>