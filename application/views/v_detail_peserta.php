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
    <div class="swal" data-swal="<?= $this->session->flashdata('message') ?>"></div>
    <div class="card">
      <!-- /.card-header -->
      <div class="card-body">
        <h5 class="text-gray">Kegiatan - Daftar Hadir</h5>
        <hr>
        <div class="mb-5 text-center text-uppercase mt-5">
          <h5><strong>Kegiatan <?= $kegiatan[0]['judul'] ?> </strong></h5>
          <h5><strong>Pelaksanaan tanggal <?= date('d F Y', strtotime($kegiatan[0]['tanggal'])) ?></strong></h5>
          <h5><strong>Narasumber <?= $kegiatan[0]['narasumber'] ?></strong> </h5>
        </div>
        <div class="row">
          <div class="col-sm-12">
          
            <table id="tableKegiatan" class="table table-bordered dataTable dtr-inline <?= $count > 5 ? 'table-responsive' : '' ?>" role="grid" aria-describedby="example1_info">
              <thead>
                <tr role="row">
                  <th style="text-align:center;width: 20px;">No</th>
                  <th style="text-align:center; min-width: 125px;">Aksi</th>
                  <?php if($form[0]['nama']) : ?>
                    <th style="min-width: 280px;">Nama</th>
                  <?php endif; ?>

                  <?php if($form[0]['email']) : ?>
                    <th style="min-width: 150px;">Email</th>
                  <?php endif; ?>

                  <?php if($form[0]['nip']) : ?>
                    <th style="min-width: 150px;">NIP</th>
                  <?php endif; ?>

                  <?php if($form[0]['npwp']) : ?>
                    <th style="min-width: 150px;">NPWP</th>
                  <?php endif; ?>

                  <?php if($form[0]['jabatan']) : ?>
                    <th style="min-width: 150px;">Jabatan</th>
                  <?php endif; ?>

                  <?php if($form[0]['instansi']) : ?>
                    <th style="min-width: 150px;">Instansi</th>
                  <?php endif; ?>

                  <?php if($form[0]['unit_kerja']) : ?>
                    <th style="min-width: 150px;">Unit Kerja</th>
                  <?php endif; ?>

                  <?php if($form[0]['alamat_unit_kerja']) : ?>
                    <th style="min-width: 150px;">Alamat Unit Kerja</th>
                  <?php endif; ?>
                  
                  <?php if($form[0]['pangkat']) : ?>
                    <th style="min-width: 150px;">Pangkat</th>
                  <? endif; ?>

                  <?php if($form[0]['tmpt_lahir']) : ?>
                    <th style="min-width: 150px;">Tempat Lahir</th>
                  <?php endif; ?>
                  
                  <?php if($form[0]['tgl_lahir']) : ?>
                    <th style="min-width: 150px;">Tanggal Lahir</th>
                  <?php endif; ?>

                  <?php if($form[0]['alamat_rumah']) : ?>
                    <th style="min-width: 150px;">Alamat Rumah</th>
                  <?php endif; ?>
            
                  <?php if($form[0]['tlp_instansi']) : ?>
                    <th style="min-width: 150px;">Telepon Instansi</th>
                  <?php endif; ?>
            
                  <?php if($form[0]['fax']) : ?>
                    <th style="min-width: 150px;">FAX Instansi</th>
                  <?php endif; ?>
            
                  <?php if($form[0]['no_hp']) : ?>
                    <th style="min-width: 150px;">Nomor HP</th>
                  <?php endif; ?>

                  <?php if($form[0]['bank']) : ?>
                    <th style="min-width: 150px;">Bank</th>
                  <?php endif; ?>

                  <?php if($form[0]['cabang_bank']) : ?>
                    <th style="min-width: 150px;">Cabang Bank</th>
                  <?php endif; ?>

                  <?php if($form[0]['no_rekening']) : ?>
                    <th style="min-width: 150px;">Nomor Rekening</th>
                  <?php endif; ?>

                  <?php if($form[0]['nama_rekening']) : ?>
                    <th style="min-width: 150px;">Nama Rekening</th>
                  <?php endif; ?>

                  <?php if($form[0]['upload_file']) : ?>
                    <th style="min-width: 80px;">Upload File</th>
                  <?php endif; ?>

                  <th style="text-align:center;min-width: 100px;">Tanda Tangan</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                foreach ($peserta as $row) :
                  ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td style="text-align: center;">
                      <button class="btn btn-warning btn-sm text-white" data-toggle="modal" data-target="#modalUbahKegiatan" onClick="ubahForm('<?= $row->id; ?>')"><i class="fas fa-edit"></i> Ubah</button>
                      <a href="#" class="btn btn-danger btn-sm " onClick="hapus('<?= $row->id; ?>','<?= $row->kegiatan_id; ?>')"><i class="fas fa-trash"></i> Hapus</a>
                    </td>

                    <?php if($form[0]['nama']) : ?>
                      <td><?= $row->nama ?></td>
                    <?php endif; ?>

                    <?php if($form[0]['email']) : ?>
                      <td><?= $row->email ?></td>
                    <?php endif; ?>

                    <?php if($form[0]['nip']) : ?>
                      <td><?= $row->nip ?></td>
                    <?php endif; ?>

                    <?php if($form[0]['npwp']) : ?>
                      <td><?= $row->npwp ?></td>
                    <?php endif; ?>

                    <?php if($form[0]['jabatan']) : ?>
                      <td><?= $row->jabatan ?></td>
                    <?php endif; ?>

                    <?php if($form[0]['instansi']) : ?>
                      <td><?= $row->instansi ?></td>
                    <?php endif; ?>

                    <?php if($form[0]['unit_kerja']) : ?>
                      <td><?= $row->unit_kerja ?></td>
                    <?php endif; ?>

                    <?php if($form[0]['alamat_unit_kerja']) : ?>
                      <td><?= $row->alamat_unit_kerja ?></td>
                    <?php endif; ?>
                    
                    <?php if($form[0]['pangkat']) : ?>
                      <td><?= $row->pangkat ?></td>
                    <? endif; ?>

                    <?php if($form[0]['tmpt_lahir']) : ?>
                      <td><?= $row->tempat_lahir ?></td>
                    <?php endif; ?>
                    
                    <?php if($form[0]['tgl_lahir']) : ?>
                      <td><?= $row->tanggal_lahir ?></td>
                    <?php endif; ?>

                    <?php if($form[0]['alamat_rumah']) : ?>
                      <td><?= $row->alamat_rumah ?></td>
                    <?php endif; ?>
              
                    <?php if($form[0]['tlp_instansi']) : ?>
                      <td><?= $row->telepon_instansi ?></td>
                    <?php endif; ?>
              
                    <?php if($form[0]['fax']) : ?>
                      <td><?= $row->fax_instansi ?></td>
                    <?php endif; ?>
              
                    <?php if($form[0]['no_hp']) : ?>
                      <td><?= $row->nomor_hp ?></td>
                    <?php endif; ?>

                    <?php if($form[0]['bank']) : ?>
                      <td><?= $row->bank ?></td>
                    <?php endif; ?>

                    <?php if($form[0]['cabang_bank']) : ?>
                      <td><?= $row->cabang_bank ?></td>
                    <?php endif; ?>

                    <?php if($form[0]['no_rekening']) : ?>
                      <td><?= $row->norek ?></td>
                    <?php endif; ?>

                    <?php if($form[0]['nama_rekening']) : ?>
                      <td><?= $row->nama_rek ?></td>
                    <?php endif; ?>

                    <?php if($form[0]['upload_file']) : ?>
                      <td><a href="<?= base_url('assets/fileUpload/' . $row->upload_file) ?>" class="btn btn-success btn-sm">Lihat file <i class="fa fa-eye"></i></a></td>
                    <?php endif; ?>

                    
                    <td>
                      <img src=" <?php echo base_url()  . $row->tanda_tangan ?>">
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
            </div>
        </div>
      </div>
    </div>
</div>


<!-- Modal ubah data peserta -->

<div class="modal fade" id="modalUbahPeserta" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Kegiatan Acara</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <input type="hidden" id="idPeserta">
          <input type="hidden" id="idKegiatan">
          <?php if($form[0]['nama']) : ?>
            <div class="form-group">
              <label for="old_nama">Nama</label>
              <input type="text" name="nama" class="form-control" id="old_nama">
              <span id="nama_error" class="text-danger"></span>
            </div>
          <?php endif; ?>

          <?php if($form[0]['email']) : ?>
            <div class="form-group">
              <label for="old_email">Email</label>
              <input type="email" name="email" class="form-control" id="old_email">
              <span id="email_error" class="text-danger"></span>
            </div>
          <?php endif; ?>

          <?php if($form[0]['nip']) : ?>
            <div class="form-group">
              <label for="old_nip">NIP</label>
              <input type="text" name="nip" class="form-control" id="old_nip">
              <span id="nip_error" class="text-danger"></span>
            </div>
          <?php endif; ?>

          <?php if($form[0]['npwp']) : ?>
            <div class="form-group">
              <label for="old_npwp">NPWP</label>
              <input type="text" name="npwp" class="form-control" id="old_npwp">
              <span id="npwp_error" class="text-danger"></span>
            </div>
          <?php endif; ?>

          <?php if($form[0]['jabatan']) : ?>
            <div class="form-group">
              <label for="old_jabatan">Jabatan</label>
              <input type="text" name="jabatan" class="form-control" id="old_jabatan">
              <span id="jabatan_error" class="text-danger"></span>
            </div>
          <?php endif; ?>

          <?php if($form[0]['instansi']) : ?>
            <div class="form-group">
              <label for="old_instansi">Instansi</label>
              <input type="text" name="instansi" class="form-control" id="old_instansi">
              <span id="instansi_error" class="text-danger"></span>
            </div>
          <?php endif; ?>

          <?php if($form[0]['unit_kerja']) : ?>
            <div class="form-group">
              <label for="old_unit_kerja">Unit Kerja</label>
              <input type="text" name="unit_kerja" class="form-control" id="old_unit_kerja">
              <span id="unit_kerja_error" class="text-danger"></span>
            </div>
          <?php endif; ?>

          <?php if($form[0]['alamat_unit_kerja']) : ?>
            <div class="form-group">
              <label for="old_alamat_unit_kerja">Alamat Unit Kerja</label>
              <input type="text" name="alamat_unit_kerja" class="form-control" id="old_alamat_unit_kerja">
              <span id="alamat_unit_kerja_error" class="text-danger"></span>
            </div>
          <?php endif; ?>
          
          <?php if($form[0]['pangkat']) : ?>
            <div class="form-group">
              <label for="old_pangkat">Pangkat</label>
              <input type="text" name="pangkat" class="form-control" id="old_pangkat">
              <span id="pangkat_error" class="text-danger"></span>    
            </div>
          <? endif; ?>

          <?php if($form[0]['tmpt_lahir']) : ?>
            <div class="form-group">
              <label for="old_tmpt_lahir">Tempat Lahir</label>
              <input type="text" name="tmpt_lahir" class="form-control" id="old_tmpt_lahir">
              <span id="tmpt_lahir_error" class="text-danger"></span>    
            </div>
          <?php endif; ?>
          
          <?php if($form[0]['tgl_lahir']) : ?>
            <div class="form-group">
              <label for="old_tgl_lahir">Tanggal Lahir</label>
              <input type="date" name="tgl_lahir" class="form-control" id="old_tgl_lahir">
              <span id="tgl_lahir_error" class="text-danger"></span>    
            </div>
          <?php endif; ?>

          <?php if($form[0]['alamat_rumah']) : ?>
            <div class="form-group">
              <label for="old_alamat_rumah">Alamat Rumah</label>
              <input type="text" name="alamat_rumah" class="form-control" id="old_alamat_rumah">
              <span id="alamat_rumah_lahir_error" class="text-danger"></span>    
            </div>
          <?php endif; ?>
    
          <?php if($form[0]['tlp_instansi']) : ?>
            <div class="form-group">
              <label for="old_tlp_instansi">Telepon Instansi</label>
              <input type="text" name="telepon_instansi" class="form-control" id="old_tlp_instansi">
              <span id="tlp_instansi_error" class="text-danger"></span>    
            </div>
          <?php endif; ?>
    
          <?php if($form[0]['fax']) : ?>
            <div class="form-group">
              <label for="old_fax">FAX Instansi</label>
              <input type="text" name="fax" class="form-control" id="old_fax">
              <span id="fax_error" class="text-danger"></span>    
            </div>
          <?php endif; ?>
    
          <?php if($form[0]['no_hp']) : ?>
            <div class="form-group">
              <label for="old_noHP">No HP</label>
              <input type="text" name="no_hp" class="form-control" id="old_noHP">
              <span id="no_HP_error" class="text-danger"></span>    
            </div>
          <?php endif; ?>

          <?php if($form[0]['bank']) : ?>
            <div class="form-group">
              <label for="old_bank">Bank</label>
              <input type="text" name="bank" class="form-control" id="old_bank">
              <span id="bank_error" class="text-danger"></span>    
            </div>
          <?php endif; ?>

          <?php if($form[0]['cabang_bank']) : ?>
            <div class="form-group">
              <label for="old_cabang_bank">Cabang Bank</label>
              <input type="text" name="cabang_bank" class="form-control" id="old_cabang_bank">
              <span id="cabang_bank_error" class="text-danger"></span>    
            </div>
          <?php endif; ?>

          <?php if($form[0]['no_rekening']) : ?>
            <div class="form-group">
              <label for="old_no_rek">Nomor Rekening</label>
              <input type="text" name="no_rek" class="form-control" id="old_no_rek">
              <span id="no_rek_error" class="text-danger"></span>    
            </div>
          <?php endif; ?>

          <?php if($form[0]['nama_rekening']) : ?>
            <div class="form-group">
              <label for="old_nama_rek">Nama Rekening</label>
              <input type="text" name="nama_rek" class="form-control" id="old_nama_rek">
              <span id="nama_rek_error" class="text-danger"></span>    
            </div>
          <?php endif; ?>
  

          <div class="mt-4 float-right">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="button" name="tambah" class="btn btn-primary" id="btn-ubahPeserta">Ubah Data Peserta</button>
          </div>
          
        </form>
      </div>
    </div>
  </div>
</div>



<script>
  function ubahForm(idPeserta){
    $.ajax({
      type: 'post',
      url: "<?= site_url('peserta/formEditPeserta'); ?>",
      data: {
          idPeserta: idPeserta
      },
      dataType: 'json',
      success: function(response) {
          if (response.success == true) {
              $('#modalUbahPeserta').modal('show');
              console.log(response.oldData);
              $('#idPeserta').val(response.oldData.id);
              $('#idKegiatan').val(response.oldData.kegiatan_id);
              $('#old_nama').val(response.oldData.nama);
              $('#old_email').val(response.oldData.email);
              $('#old_nip').val(response.oldData.nip);
              $('#old_npwp').val(response.oldData.npwp);
              $('#old_jabatan').val(response.oldData.jabatan);
              $('#old_instansi').val(response.oldData.instansi);
              $('#old_unit_kerja').val(response.oldData.unit_kerja);
              $('#old_alamat_unit_kerja').val(response.oldData.alamat_unit_kerja);
              $('#old_pangkat').val(response.oldData.pangkat);
              $('#old_tmpt_lahir').val(response.oldData.tempat_lahir);
              $('#old_tgl_lahir').val(response.oldData.tanggal_lahir);
              $('#old_alamat_rumah').val(response.oldData.alamat_rumah);
              $('#old_tlp_instansi').val(response.oldData.telepon_instansi);
              $('#old_fax').val(response.oldData.fax_instansi);
              $('#old_noHP').val(response.oldData.nomor_hp);
              $('#old_bank').val(response.oldData.bank);
              $('#old_cabang_bank').val(response.oldData.cabang_bank);
              $('#old_no_rek').val(response.oldData.norek);
              $('#old_nama_rek').val(response.oldData.nama_rek);

          }
      },
      error: function(xhr, ajaxOptions, thrownError) {
          alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError)
      }

    })
  }


  $("#btn-ubahPeserta").click(function(e){
    e.preventDefault()
    var form_data = new FormData();
    var idPeserta = $('#idPeserta').val();
    var idKegiatan = $('#idKegiatan').val();
    var nama	= $("#old_nama").val();
    var email	= $("#old_email").val();
    var nip	= $("#old_nip").val();
    var npwp	= $("#old_npwp").val();
    var jabatan	= $("#old_jabatan").val();
    var instansi	= $("#old_instansi").val();
    var unit_kerja	= $("#old_unit_kerja").val();
    var alamat_unit_kerja	= $("#old_alamat_unit_kerja").val();
    var pangkat	= $("#old_pangkat").val();
    var tempat_lahir	= $("#old_tmpt_lahir").val();
    var tanggal_lahir	= $("#old_tgl_lahir").val();
    var alamat_rumah	= $("#old_alamat_rumah").val();
    var telepon_instansi	= $("#old_tlp_instansi").val();
    var fax_instansi	= $("#old_fax").val();
    var nomor_hp	= $("#old_noHP").val();
    var norek	= $("#old_no_rek").val();
    var bank	= $("#old_bank").val();
    var cabang	= $("#old_cabang_bank").val();
    var nama_rek	= $("#old_nama_rek").val();

    form_data.append("idPeserta", idPeserta);
    form_data.append("idKegiatan", idKegiatan);
    form_data.append("nama", nama);
    form_data.append("email", email);
    form_data.append("nip", nip);
    form_data.append("npwp", npwp);
    form_data.append("jabatan", jabatan);
    form_data.append("instansi", instansi);
    form_data.append("unit_kerja", unit_kerja);
    form_data.append("alamat_unit_kerja", alamat_unit_kerja);
    form_data.append("pangkat", pangkat);
    form_data.append("tempat_lahir", tempat_lahir);
    form_data.append("tanggal_lahir", tanggal_lahir);
    form_data.append("alamat_rumah", alamat_rumah);
    form_data.append("telepon_instansi", telepon_instansi);
    form_data.append("fax_instansi", fax_instansi);
    form_data.append("nomor_hp", nomor_hp);
    form_data.append("norek", norek);
    form_data.append("bank", bank);
    form_data.append("cabang_bank", cabang);
    form_data.append("nama_rek", nama_rek);

    Swal.fire({
          title: "Anda yakin akan mengubah data peserta ini",
          text: "",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Kirim",
        }).then((result) => {
          $.ajax({
            url: "<?= site_url('peserta/update'); ?>",
            data: form_data,
            cache: false,
            contentType: false,
            processData: false,
            type: "post",
            dataType: "json",
            success: function(response) {
              if(response.success){
                Swal.fire({
                  icon: 'success',
                  title: 'Berhasil',
                  text: response.nip
                }).then((result) => {
                  $('#modalUbahPeserta').modal('hide');
                  window.location = '/daftarhadir/peserta/detail_peserta/'+response.idKegiatan;
                })
              }else{
                if (response.error.error_nama != "") {
                  $("#nama_error").html(response.error.error_nama);
                  $("#old_nama").addClass(response.error.class);
                } else {
                  $("#nama_error").html("");
                  $("#old_nama").removeClass(response.error.class);
                }
              }
              
            },
            error: function(xhr, ajaxOptions, thrownError) {
              alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError)
            }
        })
      })

  })

  function hapus(pesertaId,kegiatanId) {
    Swal.fire({
            title: 'Hapus',
            text: `Yakin menghapus data peserta ini ?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: 'post',
                    url: "<?= site_url('peserta/hapus'); ?>",
                    data: {
                        idPeserta: pesertaId,
                        idKegiatan: kegiatanId,
                    },
                    dataType: 'json',
                    success: function(response) {
                      if (response.success) {
                        // console.log(response.idPeserta);
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: response.success
                            }).then((result) => {
                              window.location = '/daftarhadir/peserta/detail_peserta/'+response.idKegiatan;
                            })
                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError)
                    }

                })
            }
        })
  }
</script>

<script>

</script>