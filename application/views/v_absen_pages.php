<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $pages[0]['judul'] ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

  <link href="<?php echo base_url() ?>assets/css/signature/jquery.signaturepad.css" rel="stylesheet">

  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/custom.css">

  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
</head>
<?php if ($pages[0]['status_page'] == 0) {
    $this->load->view('v_404');
} else {?>



  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">

        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
    <div class="content mt-5">
      <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-6 col-sm-12">

          <div class="card card-primary">
            <div class="card-header p-5 d-flex justify-content-center text-center">
              <h5 class="card-title">
                <div><strong><?php echo $pages[0]['judul'] ?></strong></div>
                <div>Narasumber :<strong><?php echo $pages[0]['narasumber'] ?></strong></div>
                <div class="mt-2">Tanggal <?php echo date('d F Y', strtotime($pages[0]['tanggal'])) ?></div>
              </h5>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form >
              <div class="card-body">
                <input type="hidden" name="id_kegiatan" id="idKegiatan" value="<?php echo $pages[0]['id'] ?>">
                <?php if ($form[0]['nama'] == 1): ?>
                  <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukan nama anda">
                    <span id="nama_error" class="text-danger"></span>
                  </div>
                <?php endif;?>

                <?php if ($form[0]['email'] == 1): ?>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" name="email" id="email" placeholder="Masukan email anda">
                  <span id="email_error" class="text-danger"></span>
                </div>
                <?php endif;?>

                <?php if ($form[0]['nip'] == 1): ?>
                <div class="form-group">
                  <label for="nip">NIP</label>
                  <input type="text" class="form-control" name="nip" id="nip" placeholder="Masukan NIP 18 Digit anda">
                  <span id="nip_error" class="text-danger"></span>
                </div>
                <?php endif;?>

                <?php if ($form[0]['npwp'] == 1): ?>
                <div class="form-group">
                  <label for="npwp">NPWP</label>
                  <input type="text" class="form-control" name="npwp" id="npwp" placeholder="Masukan NPWP 15 Digit anda">
                  <span id="npwp_error" class="text-danger"></span>
                </div>
                <?php endif;?>

                <?php if ($form[0]['jabatan'] == 1): ?>
                <div class="form-group">
                  <label for="jabatan">Jabatan</label>
                  <input type="text" class="form-control" name="jabatan" id="jabatan" placeholder="Masukan jabatan anda">
                  <span id="jabatan_error" class="text-danger"></span>
                </div>
                <?php endif;?>

                <?php if ($form[0]['instansi'] == 1): ?>
                <div class="form-group">
                  <label for="instansi">Instansi</label>
                  <input type="text" class="form-control" name="instansi" id="instansi" placeholder="Masukan instansi anda">
                  <span id="instansi_error" class="text-danger"></span>
                </div>
                <?php endif;?>

                <?php if ($form[0]['unit_kerja'] == 1): ?>
                <div class="form-group">
                  <label for="unit_kerja">Unit Kerja</label>
                  <input type="text" class="form-control" name="unit_kerja" id="unit_kerja" placeholder="Masukan unit kerja anda">
                  <span id="unit_kerja_error" class="text-danger"></span>
                </div>
                <?php endif;?>

                <?php if ($form[0]['alamat_unit_kerja'] == 1): ?>
                <div class="form-group">
                  <label for="alamat_unit_kerja">Alamat Unit Kerja</label>
                  <input type="text" class="form-control" name="alamat_unit_kerja" id="alamat_unit_kerja" placeholder="Masukan alamat unit kerja anda">
                  <span id="alamat_unit_kerja_error" class="text-danger"></span>
                </div>
                <?php endif;?>

                <?php if ($form[0]['pangkat'] == 1): ?>
                <div class="form-group">
                  <label for="pangkat">Pangkat / Golongan</label>
                  <input type="text" class="form-control" name="pangkat" id="pangkat" placeholder="Masukan pangkat / golongan anda">
                  <span id="pangkat_error" class="text-danger"></span>
                </div>
                <?php endif;?>

                <?php if ($form[0]['tmpt_lahir'] == 1): ?>
                <div class="form-group">
                  <label for="tempat_lahir">Tempat Lahir</label>
                  <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Masukan tempat lahir anda">
                  <span id="tempat_lahir_error" class="text-danger"></span>
                </div>
                <?php endif;?>

                <?php if ($form[0]['tgl_lahir'] == 1): ?>
                <div class="form-group">
                  <label for="tanggal_lahir">Tanggal Lahir</label>
                  <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="Masukan tempat lahir anda">
                  <span id="tanggal_lahir_error" class="text-danger"></span>
                </div>
                <?php endif;?>

                <?php if ($form[0]['alamat_rumah'] == 1): ?>
                <div class="form-group">
                  <label for="alamat_rumah">Alamat Rumah</label>
                  <input type="text" class="form-control" name="alamat_rumah" id="alamat_rumah" placeholder="Masukan alamat rumah anda">
                  <span id="alamat_rumah_error" class="text-danger"></span>
                </div>
                <?php endif;?>

                <?php if ($form[0]['tlp_instansi'] == 1): ?>
                <div class="form-group">
                  <label for="telepon_instansi">Telepon Instansi</label>
                  <input type="text" class="form-control" name="telepon_instansi" id="telepon_instansi" placeholder="Masukan alamat rumah anda">
                  <span id="telepon_instansi_error" class="text-danger"></span>
                </div>
                <?php endif;?>

                <?php if ($form[0]['fax'] == 1): ?>
                <div class="form-group">
                  <label for="fax_instansi">Fax Instansi</label>
                  <input type="text" class="form-control" name="fax_instansi" id="fax_instansi" placeholder="Masukan Fax anda">
                  <span id="fax_instansi_error" class="text-danger"></span>
                </div>
                <?php endif;?>

                <?php if ($form[0]['no_hp'] == 1): ?>
                <div class="form-group">
                  <label for="nomor_hp">Nomor HP</label>
                  <input type="text" class="form-control" name="nomor_hp" id="nomor_hp" placeholder="Masukan Nomor HP anda">
                  <span id="nomor_hp_error" class="text-danger"></span>
                </div>
                <?php endif;?>

                <?php if ($form[0]['no_rekening'] == 1): ?>
                <div class="form-group">
                  <label for="norek">Nomor Rekening</label>
                  <input type="text" class="form-control" name="norek" id="norek" placeholder="Masukan Nomor Rekening anda">
                  <span id="norek_error" class="text-danger"></span>
                </div>
                <?php endif;?>

                <?php if ($form[0]['bank'] == 1): ?>
                <div class="form-group">
                  <label for="bank">BANK</label>
                  <input type="text" class="form-control" name="bank" id="bank" placeholder="Masukan Nomor Rekening anda">
                  <span id="bank_error" class="text-danger"></span>
                </div>
                <?php endif;?>

                <?php if ($form[0]['cabang_bank'] == 1): ?>
                <div class="form-group">
                  <label for="cabang">CABANG (KCP)</label>
                  <input type="text" class="form-control" name="cabang_bank" id="cabang" placeholder="Masukan Nomor Rekening anda">
                  <span id="cabang_error" class="text-danger"></span>
                </div>
                <?php endif;?>

                <?php if ($form[0]['nama_rekening'] == 1): ?>
                <div class="form-group">
                  <label for="nama_rek">Nama Rekening</label>
                  <input type="text" class="form-control" name="nama_rek" id="nama_rek" placeholder="Masukan Nomor Rekening anda">
                  <span id="nama_rek_error" class="text-danger"></span>
                </div>
                <?php endif;?>

                <?php if ($form[0]['upload_file'] == 1): ?>
                <div class="form-group">
                  <label for="nama_rek">Upload PDF/WORD</label>
                  <div class="input-group mb-3">
                    <div class="custom-file">
                      <input type="file" name="upload" id="upload" class="custom-file-input"  aria-describedby="inputGroupFileAddon01" onChange="previewUploadFile()">
                      <label class="custom-file-label" for="upload">Choose file</label>
                    </div>
                  </div>
                  <span id="file_error" class="text-danger"></span>
                </div>
                <?php endif;?>

                <div class="form-group">
                  <div id="signArea">
                    <label for="">Tanda Tangan</label>
                    <div class="sig sigWrapper form-control" style="height:auto; width: auto;">
                      <div class="typed"></div>
                      <canvas class="sign-pad" id="sign-pad" width="270" height="100"></canvas>
                    </div>
                  </div>
                  <div class="btn btn-warning text-white mt-2" id="btnClearSign">Hapus</div>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button id="btn-submit" class="btn btn-primary float-right btn-block btn-lg">Kirim</button>
              </div>
            </form>
          </div>
        </div>
        <div class="col-lg-3"></div>
      </div>
    </div>
  </section>

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->

    <!-- Default to the left -->
    <strong>Copyright &copy; 2020 <a href="https://pdk.cilacapkab.go.id">Dinas Pendidikan dan Kebudayaan Kab. Cilacap</a>.</strong> All rights reserved.
  </footer>

<?php }?>
<!-- SweetAlert2 -->
<script src="<?php echo base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/signature/numeric-1.2.6.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/signature/bezier.js"></script>
<script src="<?php echo base_url() ?>assets/js/signature/jquery.signaturepad.js"></script>
<script type='text/javascript' src="<?php echo base_url() ?>assets/js/signature/html2canvas.js"></script>
<!-- <script src="<?php echo base_url() ?>assets/js/custom.js"></script> -->
<script src="<?php echo base_url() ?>assets/js/signature/json2.min.js"></script>

<script>
  function previewUploadFile(){
    const upload = document.querySelector("#upload");
    const nameLabel = document.querySelector(".custom-file-label");
    nameLabel.textContent = upload.files[0].name;
  }
</script>

<script>
  $(document).ready(function() {
    $("#signArea").signaturePad({
      drawOnly: true,
      drawBezierCurves: true,
      lineTop: 90,
    });
  });

  $("#btn-submit").click(function(e) {
    e.preventDefault();
    var form_data = new FormData();
    var idKegiatan	= $("#idKegiatan").val();
    var nama	= $("#nama").val();
    var email	= $("#email").val();
    var nip	= $("#nip").val();
    var npwp	= $("#npwp").val();
    var jabatan	= $("#jabatan").val();
    var instansi	= $("#instansi").val();
    var unit_kerja	= $("#unit_kerja").val();
    var alamat_unit_kerja	= $("#alamat_unit_kerja").val();
    var pangkat	= $("#pangkat").val();
    var tempat_lahir	= $("#tempat_lahir").val();
    var tanggal_lahir	= $("#tanggal_lahir").val();
    var alamat_rumah	= $("#alamat_rumah").val();
    var telepon_instansi	= $("#telepon_instansi").val();
    var fax_instansi	= $("#fax_instansi").val();
    var nomor_hp	= $("#nomor_hp").val();
    var norek	= $("#norek").val();
    var bank	= $("#bank").val();
    var cabang	= $("#cabang").val();
    var nama_rek	= $("#nama_rek").val();
    var fileUpload = <?php if ($form[0]['upload_file'] == 1) {echo "$('#upload').prop('files')[0]";} else {echo "$('#upload').prop('files')";}?>;

    html2canvas([document.getElementById("sign-pad")], {
      onrendered: function(canvas) {
        var canvas_img_data = canvas.toDataURL("image/png");
        var img_data = canvas_img_data.replace(
          /^data:image\/(png|jpg);base64,/,
          ""
        );
        form_data.append("id_kegiatan", idKegiatan);
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
        form_data.append("upload", fileUpload);
        form_data.append('img_data', img_data);

        //ajax call to save image inside folder
        Swal.fire({
          title: "Pastikan data yang diinputkan sudah benar!",
          text: "",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Kirim",
        }).then((result) => {
          $.ajax({
            url: "AbsenPages/absensi",
            data: form_data,
            cache: false,
            contentType: false,
            processData: false,
            type: "post",
            dataType: "json",
            success: function(response) {
              if (result.value) {
                if (response.status === "error") {
                  if (response.nama_error != "") {
                    $("#nama_error").html(response.nama_error);
                    $("#nama").addClass(response.class);
                  } else {
                    $("#nama_error").html("");
                    $("#nama").removeClass(response.class);
                  }

                  if (response.email_error != "") {
                    $("#email_error").html(response.email_error);
                    $("#email").addClass(response.class);
                  } else {
                    $("#email_error").html("");
                    $("#email").removeClass(response.class);
                  }

                  if (response.nip_error != "") {
                    $("#nip_error").html(response.nip_error);
                    $("#nip").addClass(response.class);
                  } else {
                    $("#nip_error").html("");
                    $("#nip").removeClass(response.class);
                  }

                  if (response.npwp_error != "") {
                    $("#npwp_error").html(response.npwp_error);
                    $("#npwp").addClass(response.class);
                  } else {
                    $("#npwp_error").html("");
                    $("#npwp").removeClass(response.class);
                  }

                  if (response.jabatan_error != "") {
                    $("#jabatan_error").html(response.jabatan_error);
                    $("#jabatan").addClass(response.class);
                  } else {
                    $("#jabatan_error").html("");
                    $("#jabatan").removeClass(response.class);
                  }

                  if (response.instansi_error != "") {
                    $("#instansi_error").html(response.instansi_error);
                    $("#instansi").addClass(response.class);
                  } else {
                    $("#instansi_error").html("");
                    $("#instansi").removeClass(response.class);
                  }

                  if (response.unit_kerja_error != "") {
                    $("#unit_kerja_error").html(response.unit_kerja_error);
                    $("#unit_kerja").addClass(response.class);
                  } else {
                    $("#unit_kerja_error").html("");
                    $("#unit_kerja").removeClass(response.class);
                  }

                  if (response.alamat_unit_kerja_error != "") {
                    $("#alamat_unit_kerja_error").html(
                      response.alamat_unit_kerja_error
                    );
                    $("#alamat_unit_kerja").addClass(response.class);
                  } else {
                    $("#alamat_unit_kerja_error").html("");
                    $("#alamat_unit_kerja").removeClass(response.class);
                  }

                  if (response.pangkat_error != "") {
                    $("#pangkat_error").html(response.pangkat_error);
                    $("#pangkat").addClass(response.class);
                  } else {
                    $("#pangkat_error").html("");
                    $("#pangkat").removeClass(response.class);
                  }

                  if (response.tempat_lahir_error != "") {
                    $("#tempat_lahir_error").html(response.tempat_lahir_error);
                    $("#tempat_lahir").addClass(response.class);
                  } else {
                    $("#tempat_lahir_error").html("");
                    $("#tempat_lahir").removeClass(response.class);
                  }

                  if (response.tanggal_lahir_error != "") {
                    $("#tanggal_lahir_error").html(response.tanggal_lahir_error);
                    $("#tanggal_lahir").addClass(response.class);
                  } else {
                    $("#tanggal_lahir_error").html("");
                    $("#tanggal_lahir").removeClass(response.class);
                  }

                  if (response.alamat_rumah_error != "") {
                    $("#alamat_rumah_error").html(response.alamat_rumah_error);
                    $("#alamat_rumah").addClass(response.class);
                  } else {
                    $("#alamat_rumah_error").html("");
                    $("#alamat_rumah").removeClass(response.class);
                  }

                  if (response.telepon_instansi_error != "") {
                    $("#telepon_instansi_error").html(response.telepon_instansi_error);
                    $("#telepon_instansi").addClass(response.class);
                  } else {
                    $("#telepon_instansi_error").html("");
                    $("#telepon_instansi").removeClass(response.class);
                  }

                  if (response.fax_instansi_error != "") {
                    $("#fax_instansi_error").html(response.fax_instansi_error);
                    $("#fax_instansi").addClass(response.class);
                  } else {
                    $("#fax_instansi_error").html("");
                    $("#fax_instansi").removeClass(response.class);
                  }

                  if (response.nomor_hp_error != "") {
                    $("#nomor_hp_error").html(response.nomor_hp_error);
                    $("#nomor_hp").addClass(response.class);
                  } else {
                    $("#nomor_hp_error").html("");
                    $("#nomor_hp").removeClass(response.class);
                  }

                  if (response.norek_error != "") {
                    $("#norek_error").html(response.norek_error);
                    $("#norek").addClass(response.class);
                  } else {
                    $("#norek_error").html("");
                    $("#norek").removeClass(response.class);
                  }

                  if (response.bank_error != "") {
                    $("#bank_error").html(response.bank_error);
                    $("#bank").addClass(response.class);
                  } else {
                    $("#bank_error").html("");
                    $("#bank").removeClass(response.class);
                  }

                  if (response.cabang_error != "") {
                    $("#cabang_error").html(response.cabang_error);
                    $("#cabang").addClass(response.class);
                  } else {
                    $("#cabang_error").html("");
                    $("#cabang").removeClass(response.class);
                  }

                  if (response.nama_rek_error != "") {
                    $("#nama_rek_error").html(response.nama_rek_error);
                    $("#nama_rek").addClass(response.class);
                  } else {
                    $("#nama_rek_error").html("");
                    $("#nama_rek").removeClass(response.class);
                  }

                  if (response.file_error != "") {
                    $("#file_error").html(response.file_error);
                    $("#upload").addClass(response.class);
                  } else {
                    $("#file_error").html("");
                    $("#upload").removeClass(response.class);
                  }

                } else if (response.status === "success") {
                  window.location.href = response.redirect;
                }
              }
            },
          });
        })
      },
    });
  });
  $("#btnClearSign").click(function(e) {
    $("#signArea").signaturePad().clearCanvas();
  });
</script>