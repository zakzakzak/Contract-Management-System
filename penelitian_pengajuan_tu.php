<?php
require('function.php');
$hasil_pengajuan = query("SELECT * FROM pengajuan2");
$baseurl = base_url()."home";
?>

<div class="az-content-body az-content-body-mail">
  <div class="az-mail-header">
    <div>
      <h4 class="az-content-title mg-b-5">Pengajuan</h4>
    </div>
    <div>
    </div>
  </div><!-- az-mail-list-header -->
  <div class="mg-lg-b-40"></div>

  <br/>
  <table id="example1" class="table">
    <thead>
        <tr>
          <th class="wd-lg-5p">No.</th>
          <th class="wd-lg-25p">Pengajuan</th>
          <th class="wd-lg-20p">Jumlah</th>
          <th class="wd-lg-20p">Tanggal Pengajuan</th>
          <th class="wd-lg-20p">Status Pengajuan</th>
          <th></th>
        </tr>
    </thead>
    <tbody>
      <?php for ($i=0; $i < count($hasil_pengajuan); $i++) :?>
        <tr>
          <td><?= $i+1 ?></td>
          <td><?= $hasil_pengajuan[$i]["keterangan"] ?></td>
          <td><?= number_format($hasil_pengajuan[$i]["jumlah"]) ?></td>
          <td><?= $hasil_pengajuan[$i]["tgl_pengajuan"] ?></td>
          <?php
          $id_pengajuan = $hasil_pengajuan[$i]["id_pengajuan"];
           ?>


            <?php if ($hasil_pengajuan[$i]["status_pengajuan"] == 1): ?>
              <td class="tx-info"><Strong>Diterima</strong></td>
            <?php elseif ($hasil_pengajuan[$i]["status_pengajuan"] == 2): ?>
              <td class="tx-danger"><strong>Ditolak</strong></td>
              <td></td>
            <?php elseif ($hasil_pengajuan[$i]["status_pengajuan"] == 3): ?>
              <td colspan="2" class="tx-success"><strong>Sudah Masuk Kontrak</strong></td>
            <?php endif; ?>

          <td>
            <?php if ($hasil_pengajuan[$i]["status_pengajuan"] == 1): ?>
              <a href="<?= base_url()."home/penelitian_pilih_kontrak_pengajuan_umum?id=$id_pengajuan" ?>" class="btn btn-info btn-with-icon btn-block rounded-5"><i class="far fa-file-alt"></i> Pilih Kontrak</a>
            <?php endif; ?>
          </td>

        </tr>
      <?php endfor; ?>
    </tbody>
  </table>


  <a href="<?php echo base_url();?>home/penelitian_input_pengajuan_tu" class="btn btn-success btn-with-icon btn-block"><i class="far fa-file-alt"></i> Tambah Pengajuan</a>

</div><!-- az-content-body -->
