<?php
require('function.php');

$hasil_kontrak = query("SELECT * FROM kontrak WHERE status = 'p' ORDER BY id_kontrak DESC");

?>


<div class="az-content az-content-mail">
      <div class="container">
        <div class="az-content-body az-content-body-mail">
<div class="az-mail-header">
  <div>
    <h4 class="az-content-title mg-b-5">PO list</h4>
    <p>You have <?= count($hasil_kontrak) ?> Contract</p>
  </div>
  <div>
  </div>
</div><!-- az-mail-list-header -->
<a href="<?php echo base_url();?>home/tata_usaha_input_po" class="btn btn-success btn-with-icon btn-block"><i class="far fa-file-alt"></i> Tambah PO Baru</a>
<table id="example1" class="table">
  <thead>
      <tr>
        <th class="wd-lg-5p">No.</th>
        <th class="wd-lg-25p">Judul kontrak</th>
        <th class="wd-lg-20p">Nomor kontrak</th>
        <th class="wd-lg-25p">Tanggal Pelaksanaan</th>
        <th class="wd-lg-30p">Perusahaan/client</th>
        <th class="wd-lg-25p">Nilai kontrak</th>
      </tr>
  </thead>
  <tbody>
    <?php for ($i=0; $i < count($hasil_kontrak); $i++) :?>
      <tr>
        <td><?= $i+1 ?></td>
        <td ><a href="<?= base_url().'home/afin_detail_kontrak?id='.$hasil_kontrak[$i]["id_kontrak"] ?>"><?= $hasil_kontrak[$i]["nama_kontrak"] ?></a></td>
        <td><strong><?= $hasil_kontrak[$i]["no_kontrak"] ?></strong><br/>Tanggal : <?= $hasil_kontrak[$i]["tgl_ttd"] ?></td>
        <td><?= $hasil_kontrak[$i]["tgl_mulai"]." - ". $hasil_kontrak[$i]["tgl_akir"]?></td>
        <td><?php
        $id_perus = $hasil_kontrak[$i]["id_perusahaan"];
        echo query("SELECT * FROM perusahaan WHERE id_perusahaan = $id_perus")[0]["nama_perusahaan"];
        ?></td>
        <td><?= "Rp.".number_format($hasil_kontrak[$i]["nilai_kontrak"]).",-" ?></td>
      </tr>
    <?php endfor; ?>
  </tbody>
</table>
</div>
</div>

</div>
