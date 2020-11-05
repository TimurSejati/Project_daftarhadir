<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }

    td,
    th {
      border: 1px solid black;
      text-align: left;
      padding: 8px;
    }

    .title {
      text-align: center;
      margin-bottom: 10px;
    }
  </style>
  </style>
</head>

<body>
  <div class="title">
    <div>
      <h4><strong><?=$kegiatan[0]['judul']?> </strong></h4>
    </div>
    <div style="margin-top: -30px;">
      <h4><strong>Pelaksanaan tanggal <?=date('d F Y', strtotime($kegiatan[0]['tanggal']))?></strong></h4>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-12">
      <table>
        <thead>
          <tr>
            <th style="width: 20px;">No</th>
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
          <?php if ($peserta == null) {?>
            <tr>
              <td colspan="5" style="text-align: center;">Belum ada peserta</td>
            </tr>
          <?php } else {?>
            <?php
$no = 1;
    foreach ($peserta as $row):
    ?>
              <tr>
                <td style="text-align:center;"><?=$no++?></td>
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
                <center><img height="50px" src=" <?=base_url() . $row->tanda_tangan?>"></center>
                </td>
              </tr>
            <?php endforeach;?>
        </tbody>
      <?php }?>
      </table>
    </div>
  </div>
</body>

</html>