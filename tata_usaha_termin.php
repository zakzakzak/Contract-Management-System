
<?php
require('function.php');
$id_kontrak = $_GET["id"];
$hasil_termin   = query("SELECT * FROM termin WHERE id_kontrak = $id_kontrak");

?>


<div class="az-content az-content-mail">
      <div class="container">
        <div class="az-content-body az-content-body-mail">
          <div class="az-mail-header">
            <div>
              <h4 class="az-content-title mg-b-5">Termin list</h4>
              <!-- <p>You have <?php //count($hasil_masalah) ?> problem</p> -->
            </div>
            <div>
            </div>
          </div><!-- az-mail-list-header -->

          <table class="table mg-b-0">
            <tr>
              <td><strong>Judul Kontrak</strong></td>
              <?php
              $kontrak = query("SELECT * FROM kontrak WHERE id_kontrak = $id_kontrak")[0];


               ?>
              <td><strong>:</strong></td>
              <td><?=$kontrak["nama_kontrak"] ?></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <td><strong>Nomor Kontrak</strong></td>
              <?php
              $kontrak = query("SELECT * FROM kontrak WHERE id_kontrak = $id_kontrak")[0];


               ?>
              <td><strong>:</strong></td>
              <td><?= $kontrak["no_kontrak"];?></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <td><strong>Nama Perusahaan</strong></td>
              <?php
              $kontrak = query("SELECT * FROM kontrak WHERE id_kontrak = $id_kontrak")[0];


               ?>
              <td><strong>:</strong></td>
              <td><?php
              $id_perus = $kontrak["id_perusahaan"];
              echo query("SELECT * FROM perusahaan WHERE id_perusahaan = $id_perus")[0]["nama_perusahaan"];
              ?></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <td><strong>Tanggal Pelaksanaan</strong></td>
              <?php
              $kontrak = query("SELECT * FROM kontrak WHERE id_kontrak = $id_kontrak")[0];


               ?>
              <td><strong>:</strong></td>
              <td><?= $kontrak["tgl_mulai"]." - ".$kontrak["tgl_akir"] ?></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
          </table>
          <br><br><br>


          <div class="table-responsive">






              <table id="example1" class="table">
                <thead>
                    <tr>
                      <th class="wd-lg-25p">Termin</th>
                      <th class="wd-lg-25p">Selesai</th>
                      <th class="wd-lg-25p">Status</th>
                      <th class="wd-lg-15p"></th>
                      <th class="wd-lg-15p"></th>

                    </tr>
                </thead>
                <tbody>
                  <?php for ($i=0; $i < count($hasil_termin); $i++) :?>
                    <tr>
                      <td ><?= $hasil_termin[$i]["termin"] ?></td>

                      <td><?= $hasil_termin[$i]["tgl_termin"] ?></td>

                      <?php if ($hasil_termin[$i]["status_cetak_invoice"] == 0 ) :?>
                        <td class="tx-warning">Belum pernah dicetak</td>
                      <?php else: ?>
                        <td class="tx-info">Sudah pernah dicetak</td>
                      <?php endif; ?>

                      <?php
                      $id_termin = $hasil_termin[$i]["id_termin"];
                      $term_ = $hasil_termin[$i]["termin"];
                       ?>
                      <td><center><a href="<?=  base_url()."home/tata_usaha_cetak_invoice?id=$id_termin&id_k=$id_kontrak&trm=$term_" ?>" class="badge badge-success">Cetak invoice</a></center></td>

                      <?php if ($hasil_termin[$i]["status_pembayaran"] == 1  ) :?>
                        <td class="tx-info">SUDAH LUNAS</td>
                      <?php else: ?>
                        <td><center><a href="<?=  base_url()."home/tata_usaha_pembayaran_kontrak?id_k=$id_kontrak&trm=$term_" ?>" class="badge badge-info">Pembayaran</a></center></td>
                      <?php endif; ?>

                    </tr>
                  <?php endfor; ?>

                </tbody>
              </table>
            </div><!-- table-responsive -->



          <div class="mg-lg-b-30"></div>
        </div><!-- az-content-body -->
      </div><!-- container -->
    </div><!-- az-content -->
